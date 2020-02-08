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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('ticket_id');
                $table->integer('amount')->default(1);
                $table->string('name');
                $table->string('email');
                $table->enum('customer_type', ['person', 'organization']);
                $table->string('company')->nullable();
                $table->string('inn', 12)->nullable();
                $table->string('ogrn', 15)->nullable();
                $table->string('rs', 20)->nullable();
                $table->string('ks', 20)->nullable();
                $table->string('bik', 9)->nullable();
                $table->string('kpp', 9)->nullable();
                $table->string('bank')->nullable();
                $table->string('address', 750)->nullable();
                $table->string('post_address', 750)->nullable();
                $table->string('phone')->nullable();
                $table->string('general_manager')->nullable();
                $table->string('position')->nullable();
                $table->string('reason', 750)->nullable();
                $table->boolean('paid')->nullable();
                $table->string('filename', 32)->nullable();
                $table->timestamps();

                $table->foreign('ticket_id')->references('id')->on('tickets');
            });
        }
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
