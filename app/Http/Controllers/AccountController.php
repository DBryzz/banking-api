<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //

    private $accountTypeArray = [Account::TYPE_CURRENT, Account::TYPE_SAVINGS];
    private $accountStatusArray = [Account::STATUS_PENDING, Account::STATUS_APPROVED, Account::STATUS_BLOCKED];
    public function create(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        if (!array_key_exists('initialDeposit', $data) || $data['initialDeposit'] <= 10000) {
            return response()->json([
                'success' => false,
                'message' => 'initial deposite must be atleast xaf 10000'
            ], 200);
        }

        if (!array_key_exists('type', $data) || !in_array($data['type'], $this->accountTypeArray)) {
            return response()->json([
                'success' => false,
                'message' => 'account type can either be savings or current'
            ], 200);
        }

        $type = $data['type'];
        $initDep = $data['initialDeposit'];

        $initLetters = strtoupper(substr($type, 0, 2));

        $authUser = Auth::user();
        $user = User::findOrFail($authUser->getAuthIdentifier());
        $accountNumber = $initLetters . $authUser->getAuthIdentifier() . "." . str_pad(rand(0, pow(10, 5) - 1), 5, '0', STR_PAD_LEFT);


        $payload = [
            'type' => $type,
            'account_number' => $accountNumber,
            'balance' => $initDep,
            "user_id" => $authUser->getAuthIdentifier()
        ];

        // $acc = new Account();
        // $acc->user = $user;
        // dd($acc);

        $account = Account::create($payload);

        return response()->json([
            'success' => true,
            'message' => 'account created',
            'status' => $account->status,
            'accountInfo' => $account
        ], 201);
    }

    public function changeAccountStatus(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        if (!array_key_exists('accountId', $data) || $data['accountId'] == null) {
            return response()->json([
                'success' => false,
                'message' => 'accountId required'
            ], 200);
        }
        if (!array_key_exists('status', $data) || !in_array($data['status'], $this->accountStatusArray)) {
            return response()->json([
                'success' => false,
                'message' => 'account status can either be blocked, pending or approved'
            ], 200);
        }

        $accountId = $data['accountId'];
        $status = $data['status'];

        $account = Account::findorFail($accountId);
        $account->status = $status;
        $account->save();

        return response()->json([
            'success' => true,
            'message' => 'account status updated',
            'status' => $account->status,
            'accountInfo' => $account
        ], 201);
    }

    public function retrieveBalance($id)
    {
        $account = Account::findorFail($id);

        return response()->json([
            'success' => true,
            'message' => 'success',
            'accountNumber' => $account->account_number,
            'balance' => $account->balance
        ], 200);
    }

    public function getMyBalance(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (!array_key_exists('accountId', $data) || $data['accountId'] == null) {
            return response()->json([
                'success' => false,
                'message' => 'accountId required'
            ], 200);
        }
        $accountId = $data['accountId'];

        $authUser = Auth::user();

        $account = Account::findorFail($accountId);
        if ($account->user->id !== $authUser->getAuthIdentifier()) {
            return response()->json([
                'success' => false,
                'message' => 'you do not have account ' . $account->account_number
            ], 200);
        }


        return response()->json([
            'success' => true,
            'message' => 'success',
            'accountNumber' => $account->account_number,
            'balance' => $account->balance
        ], 200);
    }
}