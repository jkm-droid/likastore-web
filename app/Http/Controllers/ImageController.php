<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $images = Image::latest()->paginate(10);
        return view('images.index', compact('images'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request){
        $this->validate($request,[
            'image'=>'required|image|file'
        ]);

        if ($request->hasFile('image')){
            $images = $request->file('image');
            foreach ($images as $image){
                $image_name = $image->getClientOriginalName();
                $image->move(public_path('dimages'), $image_name);
                Image::create([
                    'image_name'=>$image_name
                ]);
            }
        }

        return redirect()->route('images.index')->with('success', 'images uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Image $image
     * @return Response
     */
    public function show(Image $image)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Image $image
     * @return Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Image $image
     * @return Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     * @return Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
