<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('company')->nullable();
            $table->string('country', 255);
            $table->string('prefix', 10);
            $table->string('phone_number', 20);
            $table->string('email', 255);
            $table->timestamps();

            // Add index on email column for faster lookups
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('form_data');
    }
};
