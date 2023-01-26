<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doorTypes = DB::table('lk_door_types')->get(['id', 'name_' . app()->getLocale() . ' as name']);
        $elevatorTypes = DB::table('lk_elevator_types')->get(['id', 'name_' . app()->getLocale() . ' as name']);
        return view('user.pages.prices.index', compact('doorTypes', 'elevatorTypes'));
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
        $doorTypes = DB::table('lk_door_types')->get(['id', 'name_' . app()->getLocale() . ' as name']);
        // dd($doorTypes);
        DB::table('prices')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'floorNum' => $request->floorNum,
            'peopleNum' => $request->peopleNum,
            'doorsNum' => $request->doorsNum,
            'doorType_id' => $request->doorType_id,
            'elevatorType_id' => $request->elevatorType_id,
            'notes' => $request->notes,
            'status' => '0',
            'created_at' => now()
        ]);
        return redirect()->back()->with('success', "تم ارسال طلبك بنجاح");
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
        //
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
        //
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
