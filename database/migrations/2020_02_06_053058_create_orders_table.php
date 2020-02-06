<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('inn', 12);
            $table->string('ogrn', 15);
            $table->string('rs', 20);
            $table->string('ks', 20);
            $table->string('bik', 9);
            $table->string('kpp', 9)->nullable();
            $table->string('bank');
            $table->string('address', 750);
            $table->string('post_address', 750);
            $table->string('phone');
            $table->string('general_manager');
            $table->string('position');
            $table->string('reason', 750);
            $table->boolean('paid');
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
