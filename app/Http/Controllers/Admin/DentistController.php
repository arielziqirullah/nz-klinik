<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dentist;
use App\Http\Requests\DentistFormRequest;
use Illuminate\Support\Facades\Storage;

class DentistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.dentist.index');
    }

    public function create()
    {
        return view('back.dentist.create');
    }

    public function store(DentistFormRequest $request)
    {
        $image = null;
        if($request->hasFile('image')){
            $image =  $request->file('image')->store('dentist');
        }

        $product = Dentist::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'isDiscount' => $request->isDiscount,
            'image' => $image
        ]);

        session()->flash('message', 'Data Tindakan berhasil ditambahkan');

        return redirect()->route('tindakan_index');
    }

    public function edit(Dentist $dentist)
    {
        return view('back.dentist.edit', [
            'dentist' => $dentist,
        ]);
    }

    public function update(DentistFormRequest $request,Dentist $dentist)
    {
        $image = $dentist->image ?? null;

        if($request->hasFile('image')){
            if($dentist->image){
                Storage::delete($dentist->image);
            }
            $image = $request->file('image')->store('dentist');
        }

        $dentist->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'isDiscount' => $request->isDiscount,
            'image' => $image
        ]);

        session()->flash('message', 'Berhasil mengubah tindakan.');

        return redirect()->route('tindakan_index');
    }

    public function destroy(Dentist $dentist)
    {
        if($dentist->image){
            Storage::disk('local')->delete( $dentist->image);
        }
        $dentist->delete();

        return response()->json(['success' => true]);
    }
}
