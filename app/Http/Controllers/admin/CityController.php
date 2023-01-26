<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::select('Call SP_GetCities()');
        // dd($cities);
        return view('admin.pages.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // View All Countries
        $data['countries'] = DB::table('lk_country')->get(["name_ar","name_en","id"]);
        return view('admin.pages.cities.create', $data);

        // return view('test.country-state-city',$data);
    }

    public function getStates(Request $request)
    {
        $data['states'] = DB::table('lk_state')->where("country_id",$request->country_id)
                    ->get(["name_ar","id"]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);

        DB::table('lk_city')->insert([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'state_id' => $request->state
        ]);

        return redirect()->back()->with('success', "تمت الاضافة بنجاح");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = DB::select("Call SP_EditCityByID($id)");
        $countries = DB::table('lk_country')->get();
        $states = DB::table('lk_state')->get();
        // dd($city);

        return view('admin.pages.cities.edit', compact('city','countries', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required',
            'state' => 'required',
            'countries' => 'required',
        ]);


        DB::table('lk_city')->where('id', $id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'state_id' => $request->state,
        ]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lk_city')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
