<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryStateCityController extends Controller
{
    public function index()
    {
        $data['countries'] = DB::table('lk_country')->get(["nameAr", "id"]);
        return view('test.country-state-city',$data);
    }

    public function getState(Request $request)
    {
        $data['states'] = DB::table('lk_state')->where("country_id",$request->country_id)
                    ->get(["nameAr", "nameEng","id"]);
        return response()->json($data);
    }
}
