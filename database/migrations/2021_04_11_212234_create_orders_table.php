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
            $table->id();
            $table->string('Vessel')->nullable();
            $table->string('Voyage')->nullable();
            $table->string('booking_number');
            $table->string('equipment');
            $table->string('mil_reference')->nullable();
            $table->string('unit_number');
            $table->string('origin_ramp');
            $table->string('destination_ramp');
            $table->string('rail_route')->nullable();
            $table->string('consignee_city')->nullable();
            $table->string('consignee_state')->nullable();
            $table->string('ramp')->nullable();
            $table->string('chassis')->nullable();
            $table->string('work_price')->nullable();
            $table->string('driver_paid')->nullable();
            $table->string('fuel_cost')->nullable();
            $table->string('status')->default('En espera');
            $table->string('type')->default('No asignado');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('orders');
    }
}
