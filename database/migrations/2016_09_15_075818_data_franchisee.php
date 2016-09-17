<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataFranchisee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_franchisee', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('user_id') -> unsigned() -> default(0);
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('npwp')->nullable();
            $table->string('tanggal_mulai')->nullable();
             $table->string('status_aktif')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
    {
        Schema::drop('data_franchisee');
    }
}
