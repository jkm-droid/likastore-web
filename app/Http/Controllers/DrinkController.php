<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DrinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::latest()->paginate(11);

        return view('drinks.index', compact('drinks'))
            ->with('i', (request()->input('page', 1) - 1) * 11);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'drink_name'=>'required',
                'drink_price'=>'required',
                'drink_category'=>'required',
                'drink_description'=>'required',
                'image' => 'required|image|file',
            ]
        );

        $data = $request->all();
        $imageName = str_replace(' ','_',$data['drink_name']).'.'.$request->image->extension();
        $request->image->move(public_path('dimages'), $imageName);

        $poster_header = env("APP_IMAGES_URL", "https://likastore.mblog.co.ke/dimages/");
        $data['poster_url'] = $poster_header .''.$imageName;
        $data['image_name'] = $imageName;

        Drink::create($data);

        return redirect()->route('drinks.index')->with('success', 'Drink created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drinks
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        return view('drinks.show', compact('drink'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $drinks
     * @return \Illuminate\Http\Response
     */
    public function category(Drink $drink, $category){
        $drinks_cat = Drink::latest()->where('drink_category', $category)->paginate(10);

        return view('drinks.category', compact('drinks_cat'))
            ->with('i', (request()->input('page', 1) - 1) * 10)->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        return view('drinks.edit', compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $request->validate(
            [
                'drink_name'=>'required',
                'drink_price'=>'required',
                'drink_category'=>'required',
                'drink_description'=>'required',
            ]
        );

        $data = $request->all();

        if ($request->hasFile('image')){
            $imageName = str_replace(' ','_',$data['drink_name']).'.'.$request->image->extension();
            $request->image->move(public_path('dimages'), $imageName);
            File::delete($drink->image_name);

            $poster_header = env("APP_IMAGES_URL", "https://likastore.mblog.co.ke/dimages/");
            $data['poster_url'] = $poster_header .''.$imageName;
            $data['image_name'] = $imageName;
        }
        unset($data['image']);
        $drink->update($data);

        return redirect()->route('drinks.index')->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();

        return redirect()->route('drinks.index')->with('success', "Drink deleted successfully");
    }
}
