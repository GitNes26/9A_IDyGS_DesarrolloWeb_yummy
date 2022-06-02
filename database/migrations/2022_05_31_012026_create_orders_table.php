<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("order_id");
            $table->foreignId("order_employee_id")->constrained("users");
            $table->foreignId("order_table_id")->constrained("users");
            $table->foreignId("order_bo_id")->constrained("branch_offices");
            $table->foreignId("order_os_id")->constrained("order_status");
            $table->boolean("order_active");
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
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
};
