<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pembukuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pembukuan', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('user_id') -> unsigned() -> default(0);
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->string('tanggal')->nullable();
            $table->string('uraian')->nullable();
            $table->string('debet')->nullable();
            $table->string('kredit')->nullable();
             $table->string('saldo')->nullable();
             $table->string('total_debet')->nullable();
             $table->string('total_kredit')->nullable();
            $table->string('total')->nullable();
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
         Schema::drop('pembukuan');
    }
}
