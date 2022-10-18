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
            $table->string('pickup_date')->nullable()->after('order_notes');
            $table->string('pickup_time')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('courier_diplomat')->nullable();
            $table->string('destination')->nullable();
            $table->string('carrier_diplomat')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('shipper_name')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('shipper_country')->nullable();
            $table->string('consignee_country')->nullable();
            $table->string('shipper_num')->nullable();
            $table->string('consignee_num')->nullable();
            $table->string('type_of_shipment')->nullable();
            $table->string('packages')->nullable();
            $table->string('product')->nullable();
            $table->string('weight')->nullable();
            $table->string('total_freight_amount')->nullable();
            $table->string('quantity')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('mode')->nullable();
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
           
            $table->dropColumn('pickup_date');
            $table->dropColumn('pickup_time');
            $table->dropColumn('delivery_date');
            $table->dropColumn('courier_diplomat');
            $table->dropColumn('destination');
            $table->dropColumn('carrier_diplomat');
            $table->dropColumn('departure_time');
            $table->dropColumn('shipper_name');
            $table->dropColumn('consignee_name'); 
            $table->dropColumn('shipper_country');
            $table->dropColumn('consignee_country');
            $table->dropColumn('shipper_num');
            $table->dropColumn('consignee_num');
            $table->dropColumn('type_of_shipment');
            $table->dropColumn('packages');
            $table->dropColumn('product');
            $table->dropColumn('weight');
            $table->dropColumn('total_freight_amount');
            $table->dropColumn('quantity');
            $table->dropColumn('payment_mode');
            $table->dropColumn('mode');
        });
    }
};
