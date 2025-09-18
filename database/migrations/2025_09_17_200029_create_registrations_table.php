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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('member_code')->unique();
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('father_or_husband')->nullable();
            $table->string('mother')->nullable();
            $table->string('nid')->nullable();
            $table->string('education')->nullable();
            $table->date('dob')->nullable();
            $table->string('occupation')->nullable();
            $table->string('religion')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('post_office')->nullable();
            $table->foreignId('division_id')->nullable()->constrained('divisions');
            $table->foreignId('district_id')->nullable()->constrained('districts');
            $table->foreignId('upazila_id')->nullable()->constrained('upazilas');
            $table->foreignId('union_id')->nullable()->constrained('unions');
            $table->text('present_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->string('password'); // hashed password
            $table->boolean('status')->default(true); // active or inactive
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
