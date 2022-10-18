<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\LocationService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    // 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::latest()->paginate();
        return inertia('admin.orders.index', [
            'orders' => $order
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return inertia('admin.orders.create');
        $service = new LocationService();
        return inertia('admin.orders.create', ['countries' => $service->countries()]);
   }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            // 'order_name' => ['required', 'string', 'unique:bots'],
            'order_name' => ['required', 'string'],
            // 'order_num' => ['required', 'numeric'],
            'order_status' => ['required'],
            'order_notes' => ['required'],
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'delivery_date' => ['required'],
            'departure_time' => ['required'],
            'courier_diplomat' => ['required'],
            'destination' => ['required'],
            'carrier_diplomat' => ['required'],
            'shipper_name' => ['required'],
            'consignee_name' => ['required'],
            'shipper_country' => ['required'],
            'consignee_country' => ['required'],
            'shipper_num' => ['required'],
            'consignee_num' => ['required'],
            'type_of_shipment' => ['required'],
            'packages' => ['required'],
            'product' => ['required'],
            'weight' => ['required','numeric'],
            'total_freight_amount' => ['required','numeric'],
            'quantity' => ['required','numeric'],
            'payment_mode' => ['required'],
            'mode' => ['required'],
            'carrier_ref_no' => ['required'],
            'origin' => ['required'],
            // 'order_notes' => ['required', 'numeric', 'max:4']
        ]);

        Order::create(array_merge($valid,
        [
            'order_num' => strtoupper(Str::random(15))
        ] 
        ));
        session()->flash('success', 'Orders created successfully');
        return redirect()->route('admin.orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $bot
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $service = new LocationService();
        return inertia('admin.orders.edit', [
            'order' => $order,
            'countries' => $service->countries()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $bot
     * @return \Illuminate\Http\Response
     */
    public function reciept(Order $order, $id)
    {    
        
        $info = Order::where('order_num', $id)->firstOrFail();
        //  dd($info);
        $pdf = Pdf::loadView('front.reciept', compact('info'))->setPaper('a4', 'landscape');
        return $pdf->download();
    //    return view("front.reciept", compact('info'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $valid = $request->validate([
            // 'name' => ['required', 'string', Rule::unique('bots')->ignore($order)],
            // 'description' => ['required', 'string'],
            'order_name' => ['required', 'string'],
            // 'order_num' => ['required', 'numeric'],
            'order_status' => ['required'],
            'order_notes' => ['required'],
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'delivery_date' => ['required'],
            'departure_time' => ['required'],
            'courier_diplomat' => ['required'],
            'destination' => ['required'],
            'carrier_diplomat' => ['required'],
            'shipper_name' => ['required'],
            'consignee_name' => ['required'],
            'shipper_country' => ['required'],
            'consignee_country' => ['required'],
            'shipper_num' => ['required'],
            'consignee_num' => ['required'],
            'type_of_shipment' => ['required'],
            'packages' => ['required'],
            'product' => ['required'],
            'weight' => ['required','numeric'],
            'total_freight_amount' => ['required','numeric'],
            'quantity' => ['required','numeric'],
            'payment_mode' => ['required'],
            'mode' => ['required'],
            'carrier_ref_no' => ['required'],
            'origin' => ['required'],
        ]);

        $order->update($valid);
        session()->flash('success', 'Order updated successfully');
        return redirect()->route('admin.orders.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

}
