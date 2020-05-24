<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->integer('section')->default(0);
            $table->integer('father')->default(0);
            $table->integer('group')->default(0);
            $table->text('incono');
            $table->text('description');
            $table->text('note');
            $table->integer('modified_by')->default(1);
            $table->foreign('modified_by')->references('id')->on('users');
            $table->integer('created_by')->default(1);
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('mains');
    }
}
