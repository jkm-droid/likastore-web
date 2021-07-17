<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(12);

        return view('orders.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 12);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
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
        $request->validate(
            [
                'order_id'=>'required',
                'phone_number'=>'required',
                'location'=>'required',
                'payment_method'=>'required',
                'total_price'=>'required',
                'drinks'=>'required',
                'order_status'=>'required',
            ]
        );

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success','Order updated successfully');
    }

    /**
     * Confirm the order status, change from pending to confirmed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, $order_id)
    {

        DB::table('orders')->where('id', $order_id)->update(['paid'=>1]);

        return redirect()->route('orders.index')->with('success', 'Order paid successfully');
    }

    /**
     * Confirm the order status, change from pending to confirmed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, $order_id)
    {

        DB::table('orders')->where('id', $order_id)->update(['order_status'=>'confirmed']);

        return redirect()->route('orders.index')->with('success', 'Order confirmed successfully');
    }

    /**
     * Change the status from confirmed to delivered
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function deliver(Request $request, $order_id)
    {
        DB::table('orders')->where('id', $order_id)->update(['order_status'=>'delivered']);

        return redirect()->route('orders.index')->with('success','Order delivered successfully');
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
        return redirect()->route('orders.index')->with('success','Order deleted successfully');

    }
}
