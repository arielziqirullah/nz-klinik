<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = Product::latest();

        return datatables()->of($products)
            ->addColumn('action', 'back.templates.partials.DT-action')
            ->addColumn('image', function (Product $model) {
                return '<img src="'. $model->getImage() .'" height="150px">';
            })
            ->addIndexColumn()
            ->rawColumns(['image', 'action'])
            ->toJson();
    }
}
