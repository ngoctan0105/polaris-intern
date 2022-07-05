php artisan db:seed --force<?php

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
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->uuid('book_id');
            $table->foreign('book_id')->references('id')->on('books');

            $table->integer('quantity');
            $table->integer('fee');
            $table->timestamps();
            $table->timestamp('end_date')->useCurrent();
            $table->timestamp('return_date')->nullable();
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
