<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUndanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan', function (Blueprint $table){
            $table->increments('id')
                ->unique();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
            $table->string('nama_agenda');
            $table->string('nama_pengirim');
            $table->bigInteger('lat');
            $table->bigInteger('lng');
            $table->string('alamat');
            $table->string('tanggal');
            $table->time('jam');
            $table->text('keterangan');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('undangan');
    }
}
