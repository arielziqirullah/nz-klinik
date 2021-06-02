<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.slide.index');
    }

    public function create()
    {
        return view('back.slide.create');
    }

    public function store(SliderFormRequest $request)
    {
        $image = null;
        if($request->hasFile('image')){
            $image =  $request->file('image')->store('carousel');
        }

        $product = Slider::create([
            'name' => $request->name,
            'image' => $image
        ]);

        session()->flash('message', 'Slide berhasil ditambahkan');

        return redirect()->route('slider_index');
    }

    public function edit(Slider $slider)
    {
        return view('back.slide.edit', [
            'slide' => $slider,
        ]);
    }

    public function update(SliderFormRequest $request,Slider $slide)
    {
        $image = $slide->image ?? null;

        if($request->hasFile('image')){
            if($slide->image){
                Storage::delete($slide->image);
            }
            $image = $request->file('image')->store('products');
        }

        $slide->update([
            'name' => $request->name,
            'image' => $image
        ]);

        session()->flash('message', 'Berhasil mengubah slide.');

        return redirect()->route('slider_index');
    }

    public function destroy(Slider $slide)
    {
        if($slide->image){
            // Storage::delete($slide->image);
            Storage::disk('local')->delete( $slide->image);
        }
        $slide->delete();

        return response()->json(['success' => true]);
    }
}
