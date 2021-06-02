<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dentist;

class DentistController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $dentist = Dentist::orderby('id','desc');

        return datatables()->of($dentist)
            ->addColumn('action', 'back.templates.partials.DT-action')
            ->addColumn('image', function (Dentist $model) {
                return '<img src="'. $model->getImage() .'" height="150px">';
            })
            ->addIndexColumn()
            ->rawColumns(['image', 'action'])
            ->toJson();
    }
}
