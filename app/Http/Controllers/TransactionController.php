<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    private $transactionTypeArray = [Transaction::TYPE_DEPOSIT, Transaction::TYPE_WITHDRAWAL, Transaction::TYPE_TRANSFER];
    private $transactionStatusArray = [Transaction::STATUS_SUCCESS, Transaction::STATUS_FAIL];
    // private $accountStatusArray = [Account::STATUS_PENDING, Account::STATUS_APPROVED, Account::STATUS_BLOCKED];
    public function makeTransaction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $fromAccountId = "";
        $transactionType = "";

        if (!array_key_exists('accountId', $data) || $data['accountId'] == null) {
            return response()->json([
                'success' => false,
                'message' => 'accountId required'
            ]);
        }

        if (!array_key_exists('transactionType', $data) || !in_array($data['transactionType'], $this->transactionTypeArray)) {
            return response()->json([
                'success' => false,
                'message' => 'transaction type can either be [' . implode(' ,', $this->transactionTypeArray) . ']'
            ]);
        }

        if (!array_key_exists('amount', $data) || $data['amount'] <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'amount must be greater than 0'
            ]);
        }

        $fromAccountId = $data['accountId'];
        $transactionType = $data['transactionType'];
        $amount = $data['amount'];

        $fromAccount = Account::findorFail($fromAccountId);

        $transaction = new Transaction();

        $transaction->type = $transactionType;
        $transaction->account_id = $fromAccount->id;
        $transaction->amount = $amount;
        $transaction->reference = strtoupper(bin2hex(random_bytes(5)));

        $authUser = Auth::user();
        $account = Account::findOrFail($fromAccountId);
        if ($account->user->id !== $authUser->getAuthIdentifier()) {
            return response()->json([
                'success' => false,
                'message' => 'you do not have account ' . $account->account_number
            ], 200);
        }

        if ($transactionType === Transaction::TYPE_TRANSFER) {
            if (!array_key_exists('toAccountNumber', $data) || $data['toAccountNumber'] == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'toAccountNumber required'
                ]);
            }

            $transferMotive = (array_key_exists('transferMotive', $data) && ($data['transferMotive'] != null)) ? $data['transferMotive'] : null;

            $toAccountNumber = $data['toAccountNumber'];
            $toAccount = Account::where('account_number', $toAccountNumber)->firstOrFail();

            $is_debited = $fromAccount->reduceBalance($amount);
            $is_added = $toAccount->addBalance($amount);

            $transaction->receiver_account = $toAccount->account_number;
            $transaction->transfer_motive = $transferMotive;

            if (!$is_debited) {
                $transaction->status = Transaction::STATUS_FAIL;
                $transaction->save();
                return response()->json([
                    'success' => false,
                    'message' => 'insufficient amount',
                    'status' => $transaction->status,
                    'transactionDetail' => $transaction
                ], 200);
            }

            // $fromAccount->save();
            $toAccount->save();
        }


        // $is_success = $transactionType === Transaction::TYPE_WITHDRAWAL ? $fromAccount->reduceBalance($amount) : $fromAccount->addBalance($amount);
        if ($transactionType === Transaction::TYPE_WITHDRAWAL) {
            $is_success = $fromAccount->reduceBalance($amount);
            if (!$is_success) {
                $transaction->status = Transaction::STATUS_FAIL;
                $transaction->save();
                return response()->json([
                    'success' => false,
                    'message' => 'insufficient amount',
                    'status' => $transaction->status,
                    'transactionDetail' => $transaction
                ], 200);
            }
        }

        if ($transactionType === Transaction::TYPE_DEPOSIT) {
            $fromAccount->addBalance($amount);
        }

        $transaction->status = Transaction::STATUS_SUCCESS;
        $fromAccount->save();
        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'transaction successful',
            'status' => $transaction->status,
            'transactionDetail' => $transaction
        ], 201);
    }


    public function getMyTransfers(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (!array_key_exists('accountId', $data) || $data['accountId'] == null) {
            return response()->json([
                'success' => false,
                'message' => 'accountId required'
            ]);
        }
        $accountId = $data['accountId'];

        $authUser = Auth::user();
        $account = Account::findOrFail($accountId);
        if ($account->user->id !== $authUser->getAuthIdentifier()) {
            return response()->json([
                'success' => false,
                'message' => 'you do not have account ' . $account->account_number
            ], 200);
        }

        $transactions = $account->transactions()->where('type', Transaction::TYPE_TRANSFER)->get();

        return response()->json([
            'success' => true,
            'transactions' => $transactions
        ], 200);
    }

    public function getTransfers($id)
    {
        $account = Account::findOrFail($id);
        $transactions = $account->transactions()->where('type', Transaction::TYPE_TRANSFER)->get();

        return response()->json([
            'success' => true,
            'transactions' => $transactions
        ], 200);
    }
}