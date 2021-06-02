<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $slide = Slider::orderby('id','desc');

        return datatables()->of($slide)
            ->addColumn('action', 'back.templates.partials.DT-action')
            ->addColumn('image', function (Slider $model) {
                return '<img src="'. $model->getImage() .'" height="150px">';
            })
            ->addIndexColumn()
            ->rawColumns(['image', 'action'])
            ->toJson();
    }
}
