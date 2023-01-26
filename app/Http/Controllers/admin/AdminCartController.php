<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::select('Call SP_GetAllOrders()');
        $localArr = [];
        $forignArr = [];
        return view('admin.pages.cart.index', compact('orders', 'localArr', 'forignArr'));
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
        $order = DB::select("Call SP_GetOrderById($id)")[0];
        // dd($order);
        return view('admin.pages.cart.edit', compact('order'));
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
        DB::table('cart')->where('id', $id)->update([
            'status' => '1',
            'replay' => $request->replay,
            'replayDate' => now()
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
        DB::table('cart')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
