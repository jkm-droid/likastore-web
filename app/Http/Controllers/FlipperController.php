<?php

namespace App\Http\Controllers;

use App\Models\Flipper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class FlipperController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $flippers = Flipper::latest()->paginate(10);

        return view('flippers.index', compact('flippers'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('flippers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $request->validate(
            [
                'poster_name'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $data = $request->all();

        $imageName = $data['poster_name'].'.'.$request->image->extension();
        $request->image->move(public_path('posters'), $imageName);

        $poster_header = env("APP_POSTERS_URL", "https://likastore.mblog.co.ke/posters/");
        $data['poster_url'] = $poster_header .''.$imageName;
        $data['poster_name'] = $imageName;

        Flipper::create($data);

        return redirect()->route('flippers.index')->with('success', 'Flipper created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param Flipper $flipper
     * @return Response
     */
    public function show(Flipper $flipper)
    {
        return view('flippers.show', compact('flipper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Flipper $flipper
     * @return Response
     */
    public function edit(Flipper $flipper)
    {
        return view('flippers.edit', compact('flipper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Flipper $flipper
     * @return RedirectResponse
     */
    public function update(Request $request, Flipper $flipper)
    {
        $request->validate(
            [
                'poster_name'=>'required',
            ]
        );

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = $data['poster_name'] . '.' . $request->image->extension();
            $request->image->move(public_path('posters'), $imageName);
            //delete the old poster
            File::delete($flipper->poster_name);

            $poster_header = env("APP_POSTERS_URL", "https://likastore.mblog.co.ke/posters/");
            $data['poster_url'] = $poster_header . '' . $imageName;
            $data['poster_name'] = $imageName;
        }

        unset($data['image']);
        $flipper->update($data);

        return redirect()->route('flippers.index')->with('success','Flipper updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flipper $flipper
     * @return RedirectResponse
     */
    public function destroy(Flipper $flipper)
    {
        $flipper->delete();
        return redirect()->route('flippers.index')->with('success','Flipper deleted successfully');
    }
}
