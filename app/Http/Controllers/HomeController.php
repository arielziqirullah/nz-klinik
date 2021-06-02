<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('back.dashboard.index',[
            'patient' => Patient::query()->count(),
            'product' => Product::query()->count(),
            'category' => Category::query()->count(),
            'slider' => Slider::query()->count()
        ]);
    }
}
