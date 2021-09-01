<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\SoldDrink;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class DrinkSoldController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function get_drinks_sold(){
        $sold_drinks = SoldDrink::get();

        $drinks_array = [];
        for($i = 0;$i < count($sold_drinks);$i++){
            $drinks_array[] =  Drink::where('id', $sold_drinks[$i]->drink_id)->first();
        }
        
        foreach($sold_drinks as $sold){
            $drink_date = $sold->drink_date;
        }

        $drinks = $this->paginate($drinks_array);
        return view('drinks.sold_drinks', compact('drinks', 'sold_drinks'));
    }

    public function paginate($items, $perPage = 11, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
