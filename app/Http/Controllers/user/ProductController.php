<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Filter Data
        // dd($_GET['cat_id']);
        if ($_GET['cat_id'] == 0)
        {
            $products = DB::table('products')->where(function ($query) use ($request) {
                return $request->company ?
                    $query->from('company_id')->where('company_id', $request->company) : '';
            })->where(function ($query) use ($request) {
                return $request->design ?
                    $query->from('design_id')->where('design_id', $request->design) : '';
            })->where(function ($query) use ($request) {
                return $request->country ?
                    $query->from('country_id')->where('country_id', $request->country) : '';
            })->where(function ($query) use ($request) {
                return $request->size ?
                    $query->from('size_id')->where('size_id', $request->size) : '';
            })->where(function ($query) use ($request) {
                if (app() -> getLocale() == 'ar')
                {
                    $price = 'localPrice';
                }
                else
                {
                    $price = 'forignPrice';
                }
                return $request->price ?
                    $query->from($price)->where($price, $request->price) : '';
            })
                ->get(['id', 'mainPhoto', 'name_' . app()->getLocale() . ' as name', app()->getLocale() == 'ar' ? 'localPrice as price' : 'forignPrice as price']);
            // dd($product);
        }
        else
        {
            $products = DB::table('products')->where(function ($query) use ($request) {
                return $request->company ?
                    $query->from('company_id')->where('company_id', $request->company) : '';
            })->where(function ($query) use ($request) {
                return $request->design ?
                    $query->from('design_id')->where('design_id', $request->design) : '';
            })->where(function ($query) use ($request) {
                return $request->country ?
                    $query->from('country_id')->where('country_id', $request->country) : '';
            })->where(function ($query) use ($request) {
                return $request->size ?
                    $query->from('size_id')->where('size_id', $request->size) : '';
            })->where(function ($query) use ($request) {
                if (app() -> getLocale() == 'ar')
                {
                    $price = 'localPrice';
                }
                else
                {
                    $price = 'forignPrice';
                }
                return $request->price ?
                    $query->from($price)->where($price, $request->price) : '';
            })->where('cat_id', $_GET['cat_id'])
                ->get(['id', 'mainPhoto', 'name_' . app()->getLocale() . ' as name', app()->getLocale() == 'ar' ? 'localPrice as price' : 'forignPrice as price']);
            // dd($product);
        }

        return redirect()->back()->with('products', $products);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        if ($id == 0) {
            // All Products
            $products = DB::table('products')->get(['mainPhoto', 'products.id', 'products.name_' . app()->getLocale() . ' as name', 'productionYear', app()->getLocale() == 'ar' ? 'localPrice as price' : 'forignPrice as price']);
            $sizes = DB::table('lk_size')->get();
            $countries = DB::table('lk_country')->get(['id', 'name_' . app()->getLocale() . ' as name']);
            $designs = DB::table('lk_design')->get(['id', 'name_' . app()->getLocale() . ' as name']);
            $companies = DB::table('lk_company')->get(['id', 'name_' . app()->getLocale() . ' as name']);

            return view('user.pages.products.all', compact('products', 'companies', 'sizes', 'designs', 'countries'));
        } else {
            $category = DB::table('lk_category')->find($id, ['id', 'name_' . app()->getLocale() . ' as name']);
            $products = DB::table('products')->where('cat_id', $id)->get(['mainPhoto', 'products.id', 'products.name_' . app()->getLocale() . ' as name', app()->getLocale() == 'ar' ? 'localPrice as price' : 'forignPrice as price']);
            $sizes = DB::table('lk_size')->get();
            $countries = DB::table('lk_country')->get(['id', 'name_' . app()->getLocale() . ' as name']);
            $designs = DB::table('lk_design')->get(['id', 'name_' . app()->getLocale() . ' as name']);
            $companies = DB::table('lk_company')->get(['id', 'name_' . app()->getLocale() . ' as name']);
            return view('user.pages.products.index', compact('category', 'products', 'countries', 'sizes', 'designs', 'companies'));
        }
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
