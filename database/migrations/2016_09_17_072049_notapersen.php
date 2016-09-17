<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notapersen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notapersen', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('user_id') -> unsigned() -> default(0);
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table -> integer('buku_id') -> unsigned() -> default(0);
            $table->foreign('buku_id')
                    ->references('id')->on('pembukuan')
                    ->onDelete('cascade');
            $table->string('tanggal')->nullable();
            $table->string('presentase1')->nullable();
            $table->string('presentase2')->nullable();
            $table->string('filename')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->string('deskripsi')->nullable();
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
        Schema::drop('notapersen');
    }
}
