<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class elevatorTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elevatorTypes = DB::table('lk_elevator_types')->get();
        return view('admin.pages.elevatorTypes.index', compact('elevatorTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.elevatorTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('lk_elevator_types')->insert([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en
        ]);
        return redirect()->back()->with('success', "تم الاضافة بنجاح");
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
        $elevatorTypes = DB::table('lk_elevator_types')->find($id);
        return view('admin.pages.elevatorTypes.edit', compact('elevatorTypes'));
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
        DB::table('lk_elevator_types')->where('id', $id)->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en
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
        DB::table('lk_elevator_types')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
