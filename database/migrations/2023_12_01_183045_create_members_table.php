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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('reg_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('id_number');
            $table->string('phone_number');
            $table->string('county');
            $table->string('ward');
            $table->string('location');

            $table->string('kin_name');
            $table->string('kin_number');
            $table->string('kin_id');
            $table->string('kin_relationship');

            $table->string('payment_number');
            $table->string('payment_name');
            $table->string('amount');
            $table->string('code');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
