<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolepermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolepermissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id')->index()->unsigned();
            $table->string('permission')->nullable();
            $table->string('permissiontitle')->nullable();
            $table->timestamps();
             $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolepermissions');
    }
}
