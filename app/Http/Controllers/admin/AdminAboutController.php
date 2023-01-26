<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('about')->get();
        return view('admin.pages.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $about = DB::table('about')->find($id);
        return view('admin.pages.about.edit', compact('about'));
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

        if($request->file('about'))
        {
            $file_extension = $request->file('about')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'uploads/about';
            $request->file('about')->move($path, $file_name);

            DB::table('about')->where('id', $id)->update([
                'image' => $file_name,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'description_ar' => $request->description_ar,
                'name_en' => $request->name_en,
            ]);
        }
        else
        {
            DB::table('about')->where('id', $id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'description_ar' => $request->description_ar,
                'name_en' => $request->name_en,
            ]);
        }
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
        //
    }
}
