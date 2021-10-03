<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoItemTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_item_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('po_num');
            $table->string('sku_code');
            $table->string('sku_name');
            $table->string('quntity');
            $table->string('unit_price');
            $table->string('unit_total_price');
            $table->string('remove_status')->default('0');
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
        Schema::dropIfExists('po_item_tbls');
    }
}
