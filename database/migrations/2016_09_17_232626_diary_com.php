<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryCom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary_com', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('on_post') -> unsigned() -> default(0);
            $table->foreign('on_post')
                    ->references('id')->on('diary')
                    ->onDelete('cascade');
            $table -> integer('from_user') -> unsigned() -> default(0);
            $table->foreign('from_user')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->text('body');
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
        Schema::drop('diary_com');
    }
}
