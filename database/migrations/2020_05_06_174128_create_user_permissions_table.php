<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_permissions');
            $table->foreign('id_permissions')->references('id')->on('permissions');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('user_permissions');
    }
}
