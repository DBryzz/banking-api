<?php

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('type')->default(Transaction::TYPE_WITHDRAWAL);
            $table->string('status')->default(Transaction::STATUS_FAIL);
            $table->foreignIdFor(Account::class);
            $table->string('reference', 10)->unique();
            $table->string('transfer_motive', 255)->default('No Motive');
            $table->string('receiver_account', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};