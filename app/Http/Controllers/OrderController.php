<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::latest()->paginate(12);
        $drinks = [];
        foreach ($orders as $order){
            $drinks = explode('/', $order->drinks);
        }
//        for ($i = 0;$i < count($drinks); $i++){
////            print($drinks[$i]);
//        }

        return view('orders.index', compact('orders', 'drinks'))
            ->with('i', (request()->input('page', 1) - 1) * 12);
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


    public function pay($order_id)
    {

        DB::table('orders')->where('id', $order_id)->update(['paid'=>1]);

        return redirect()->route('orders.index')->with('success', 'Order paid successfully');
    }

    public function confirm($order_id)
    {

        DB::table('orders')->where('id', $order_id)->update(['order_status'=>'confirmed']);

        return redirect()->route('orders.index')->with('success', 'Order confirmed successfully');
    }

    public function deliver($order_id)
    {
        DB::table('orders')->where('id', $order_id)->update(['order_status'=>'delivered']);

        return redirect()->route('orders.index')->with('success','Order delivered successfully');
    }


    public function destroy(Order $order){
//        if (Auth::attempt()) {
            $order->delete();
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
//        }

//        return redirect()->route('orders.index')->with('error', 'incorrect passcode');
    }

    public function search_order(Request $request){
        $search_term = trim($request->term);

        $orders = DB::table('orders')
            ->where('order_id', 'LIKE', '%'.$search_term.'%')
            ->orWhere('phone_number','LIKE', '%'.$search_term.'%')->get();

        if (!$orders->isEmpty()){
            $data = '';
            foreach ($orders as $order) {
                $data .='<tr>'.
                    '<td><a href="'.route('orders.show', $order->id).'" >'.$order->order_id.'</a></td>'.
                    '<td>'.$order->phone_number.'</td>'.
                    '<td>'.$order->location.'</td>'.
                    '<td>'.$order->payment_method.'</td>'.
                    '<td>'.$order->total_price.'</td>'.
                    '<td>'.$order->drinks.'</td>'.
                    '<td>'.$order->payment_code.'</td>'.
                    '<td>'.$order->order_status.'</td>'.
                    '</tr>';
            }

            return response($data);
        }else {
            return response()->json(array(
                'status_code' => 201,
                'message' => 'success'
            ));
        }
    }

}
