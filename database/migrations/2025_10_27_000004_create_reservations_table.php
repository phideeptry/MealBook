<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->dateTime('reservation_time');
            $table->integer('party_size');
            $table->unsignedBigInteger('dining_table_id')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, seated, cancelled, completed
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('dining_table_id')->references('id')->on('dining_tables')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
