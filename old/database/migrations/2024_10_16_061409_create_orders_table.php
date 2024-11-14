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
            $table->id(); // Creates an auto-incrementing BIGINT column for the order ID

            // Adding a foreign key for user_id with cascade on delete
            $table->integer('user_id');

            // Adding a foreign key for shop_id with cascade on delete
            $table->integer('shop_id');

            // Define other necessary fields
            $table->decimal('total_amount', 8, 2); // Total amount of the order
            $table->decimal('discount', 8, 2)->default(0); // Discount applied to the order
            $table->decimal('final_total', 8, 2); // Final total after discount
            $table->string('status'); // Status of the order (e.g., pending, completed)

            // Timestamps for created_at and updated_at
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
        Schema::dropIfExists('orders'); // Drop the orders table if it exists
    }
}
