<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamu', function (Blueprint $table) {
            $table->increments('id')
            ->unique();
            $table->unsignedInteger('undangan_id');
            $table->foreign('undangan_id')
                ->references('id')
                ->on('undangan')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
            $table->string('email')
                ->default('');
            $table->boolean('konfirmasi_undangan');
            $table->boolean('konfirmasi_kedatangan');
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
        Schema::dropIfExists('tamu');
    }
}
