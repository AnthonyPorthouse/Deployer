<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->string('id', 36);
            $table->string('token');
            $table->string('type');
            $table->string('user_id')->foreign();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tokens');
    }
}
