<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get UserID
        $userID = auth('web')->id();
        // Get My Order
        $myOrder = DB::select("Call SP_GetMyOrderByUserID($userID)");
        if (count($myOrder) === 0) {
            $ItemsTotal = 0;
            $arr = [0];
            return view('user.pages.cart.index', compact('myOrder', 'ItemsTotal', 'arr'));
        }
        else
        {
            $ItemsTotal = DB::table('cart')->where('user_id', $userID)->sum('mount');
            return view('user.pages.cart.index', compact('myOrder', 'ItemsTotal'));
        }
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
        // Get Product ID
        $product_id = $_GET['prod_id'];
        // Get User ID
        $userID = auth('web')->id();

        $productExists = DB::table('cart')->where('product_id', $product_id)->where('user_id', $userID)->get(['product_id', 'mount']);
        $productCount = $productExists->count() > 0;

        // Check if this product is already exist in my Order => add one of mount
        if ($productCount)
        {
            // Mount Of Product
            $mount = DB::table('cart')->where('product_id', $product_id)->where('user_id', $userID)->get(['mount'])->first()->mount + 1;
            // Update Record
            DB::table('cart')->where('product_id', $product_id)->where('user_id', $userID)->update([
                'mount' => $mount,
                'updated_at' => now()
            ]);
        }
        else
        {
            DB::table('cart')->insert([
                'product_id' => $product_id,
                'user_id' => $userID,
                'created_at' => now()
            ]);
        }
        return redirect()->back()->with('success', "تم اضافة المنتج الى العربة");
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
        // dd($request->mount);
        DB::table('cart')->where('id', $id)->update([
            'mount' => $request->mount,
            'updated_at' => now()
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        DB::table('cart')->delete($id);
        return redirect()->back()->with("success");
    }
}
