<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date')->nullable();
            $table->decimal('amount_paid', 12, 2)->default(0);

            $table->string('payment_number')->nullable();        // e.g. Nagad or Bank account number
            $table->string('transaction_number')->nullable();    // e.g. mobile transaction ID
            $table->string('transaction_id')->nullable();        // optional reference id
            $table->string('transfer_number')->nullable();       // e.g. sender number

            $table->string('payment_type')->nullable();            // e.g. Bank or Nagad
            $table->string('reason')->nullable();                // e.g. registaion, annual fee
            $table->text('message')->nullable();
            $table->string('slip')->nullable();                  // file name/path for bank slip
            $table->boolean('status')->default(false);           // 0 = pending, 1 = approved

            $table->unsignedBigInteger('registration_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            // Add foreign keys if those tables exist
            // $table->foreign('registration_id')->references('id')->on('registrations')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
