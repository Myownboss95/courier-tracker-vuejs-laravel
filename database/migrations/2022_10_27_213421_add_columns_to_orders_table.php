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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('not_collected_country')->nullable();
            $table->string('pending_country')->nullable();
            $table->string('delivered_country')->nullable();
            $table->string('custom_clearance_country')->nullable();
            $table->string('custom_clearance_paid')->nullable();
            $table->string('custom_clearance_status')->nullable();
            $table->string('departed_country')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('not_collected_country');
            $table->dropColumn('pending_country');
            $table->dropColumn('delivered_country');
            $table->dropColumn('custom_clearance_country');
            $table->dropColumn('custom_clearance_paid');
            $table->dropColumn('custom_clearance_status');
            $table->dropColumn('departed_country');
        });
    }
};
