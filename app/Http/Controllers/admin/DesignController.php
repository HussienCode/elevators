<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs = DB::select('select * from lk_design');
        return view('admin.pages.designs.index', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.designs.create');
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
            'name_en' => 'required'
        ]);

        DB::table('lk_design')->insert([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en
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
        $designs = DB::table('lk_design')->find($id);
        // dd($designs);
        return view('admin.pages.designs.edit', compact('designs'));
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
            'name_en' => 'required'
        ]);

        DB::table('lk_design')->where('id', $id)->update([
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
        DB::table('lk_design')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
