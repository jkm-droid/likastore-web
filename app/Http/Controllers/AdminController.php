<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Order;
use App\Models\SoldDrink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        if(Auth::check()){
        //get count drinks
        $drinks = Drink::count();
        //get count orders
        $orders = Order::count();

        //get the latest orders
        $latest_orders  = Order::orderBy('created_at', 'desc')->take(6)->get();

        //get the recently added products
        $recent_drinks  = Drink::orderBy('created_at', 'desc')->take(9)->get();

        //get drinks sold
        $sold_drinks = SoldDrink::count();

        //get the latest drinks sold
        $latest_drinks_sold = SoldDrink::orderBy('created_at', 'desc')->take(5)->get();

        //revenue
            $revenue = Order::where('order_status', 'delivered')->get();
            $total_revenue = 0;
            for($i = 0;$i < count($revenue);$i++){
                $price = str_replace('Kshs',' ',$revenue[$i]->total_price);
                if (preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', trim($price))){
                    $price = str_replace(',', '', $price);
                }
                $total_revenue += $price;
            }

        return view('dashboard.admin', compact('latest_orders', 'recent_drinks', 'latest_drinks_sold'))->
        with('drinks', $drinks)->with('orders', $orders)->with('sold_drinks', $sold_drinks)->with('total_revenue', $total_revenue);
        }

        return redirect()->route('show.login')->with('error', 'Error, Access denied');
    }
}
