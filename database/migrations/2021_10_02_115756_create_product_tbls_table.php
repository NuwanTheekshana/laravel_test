<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('sku_id');
            $table->string('sku_code');
            $table->string('sku_name');
            $table->decimal('MRP', 8,2);
            $table->decimal('distribution_price', 8,2);
            $table->string('weight');
            $table->string('volume');
            $table->boolean('remove_status')->default('0');
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
        Schema::dropIfExists('product_tbls');
    }
}
