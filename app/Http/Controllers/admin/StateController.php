<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = DB::select("Call lk_states_countries()");
        return view('admin.pages.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('lk_country')->select()->get();
        return view('admin.pages.states.create',compact('countries'));
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
            'countries' => 'required'
        ]);

        DB::table('lk_state')->insert([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'country_id' => $request->countries
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
        $state = DB::table('lk_state')->find($id); // 1Row
        $countries = DB::table('lk_country')->where('id', $state->country_id)->get();
        return view('admin.pages.states.edit', compact('state', 'countries'));
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
            'countries' => 'required'
        ]);

        DB::table('lk_state')->where('id', $id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'country_id' => $request->countries
        ]);
        return redirect()->back()->with('success', "تم التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lk_state')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
