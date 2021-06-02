<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Category::orderBy('name', 'asc');

        return datatables()->of($categories)
            ->addColumn('action', 'back.templates.partials.DT-action')
            ->addIndexColumn()
            ->toJson();
    }
}
