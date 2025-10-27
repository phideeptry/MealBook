<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiningTablesTable extends Migration
{
    public function up()
    {
        Schema::create('dining_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->unique();
            $table->integer('seats')->default(2);
            $table->string('location')->nullable();
            $table->string('status')->default('available'); // available, reserved, occupied, out_of_service
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dining_tables');
    }
}
