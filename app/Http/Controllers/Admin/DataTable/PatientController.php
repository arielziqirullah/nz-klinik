<?php

namespace App\Http\Controllers\Admin\DataTable;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = Patient::orderby('id', 'desc');

        return datatables()->of($categories)
            ->addColumn('action', 'back.templates.partials.DT-action-patient')
            ->editColumn('created_at', function($data){ 
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y H:i:s'); return $formatedDate; 
            })
            ->addIndexColumn()
            ->toJson();
    }
}
