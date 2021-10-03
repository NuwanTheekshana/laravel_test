<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('po_num');
            $table->string('zone');
            $table->string('region');
            $table->string('territory');
            $table->string('distributor');
            $table->string('remark');
            $table->decimal('total_amount', 8,2);
            $table->datetime('datetime');
            $table->string('created_user_id');
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
        Schema::dropIfExists('po_tbls');
    }
}
