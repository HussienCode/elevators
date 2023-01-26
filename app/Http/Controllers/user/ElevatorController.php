<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElevatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = DB::table('products')->where('id', $id)->get(['id', 'mainPhoto','mPhT_' . app()->getLocale() . ' as imageTitle', 'name_' . app()->getLocale() . ' as name', 'description_' . app()->getLocale() . ' as description', app()->getLocale() == 'ar'? 'localPrice as price': 'forignPrice as price' ])->first();
        $category = DB::table('lk_category')->join('products', 'lk_category.id', '=', 'products.cat_id')->where('products.id', '=', $id)->get(['lk_category.id', 'lk_category.name_' . app()->getLocale() . ' as name'])->first();
        $type = DB::table('lk_type')->join('products', 'lk_type.id', '=', 'products.type_id')->where('products.id', '=', $id)->get(['lk_type.id', 'lk_type.name_' . app()->getLocale() . ' as name'])->first();
        $company = DB::table('lk_company')->join('products', 'lk_company.id', '=', 'products.company_id')->where('products.id', $id)->get(['lk_company.id', 'lk_company.name_' . app()->getLocale() . ' as name'])->first();
        $size = DB::table('lk_size')->join('products', 'lk_size.id', '=', 'products.size_id', 'inner')->where('products.id', '=', $id)->get(['lk_size.id','sizeNum', 'unit'])->first();
        $country = DB::table('lk_country')->join('products', 'lk_country.id', '=', 'products.country_id')->where('products.id', '=', $id)->get(['lk_country.id', 'lk_country.name_' . app()->getLocale() . ' as name'])->first();
        $design = DB::table('lk_design')->join('products', 'lk_design.id', '=', 'products.design_id')->where('products.id', $id)->get(['lk_design.id', 'lk_design.name_' . app()->getLocale() . ' as name'])->first();
        $model = DB::table('lk_type')->join('products', 'lk_type.id', '=', 'products.type_id')->where('products.id', $id)->get(['lk_type.id', 'lk_type.name_' . app()->getLocale() . ' as name'])->first();

        return view('user.pages.elevator.index', compact('product', 'size', 'model', 'category', 'design', 'country', 'company', 'type'));
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


    public function showAllPhotos($id)
    {
        $photos = DB::table('lk_product_photos')->where('product_id', $id)->get(['name', 'title_' . app()->getLocale() . ' as title', 'description_' . app()->getLocale() . ' as description']);
        $mainPhoto = DB::table('products')->find($id, ['mainPhoto', 'mPhT_' . app()->getLocale() . ' as imageTitle', 'mPhD_' . app()->getLocale() . ' as imageDescription']);
        // dd($mainPhoto);
        return view('user.pages.products.photos', compact('photos', 'mainPhoto'));
    }

    public function showAllVideos($id)
    {
        $videos = DB::table('lk_product_videos')->where('product_id', $id)->get(['name', 'title_' . app()->getLocale() . ' as title', 'description_' . app()->getLocale() . ' as description']);
        return view('user.pages.products.videos', compact('videos'));
    }

    public function showAllFiles($id)
    {
        $files = DB::table('lk_product_files')->where('product_id', $id)->get(['id','name', 'title_' . app()->getLocale() . ' as title', 'description_' . app()->getLocale() . ' as description', 'extension', 'src']);
        return view('user.pages.products.files', compact('files'));
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
