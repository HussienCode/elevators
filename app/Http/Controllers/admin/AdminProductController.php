<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select('Call SP_GetProductData()');
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('lk_category')->select(['*'])->get();
        $designs = DB::table('lk_design')->select(['*'])->get();
        $countries = DB::table('lk_country')->select(['*'])->get();
        $types = DB::table('lk_type')->select(['*'])->get();
        $sizes = DB::table('lk_size')->select(['*'])->get();
        $models = DB::table('lk_model')->select(['*'])->get();
        $companies = DB::table('lk_company')->select(['*'])->get();

        return view('admin.pages.products.create', compact('categories', 'designs', 'countries', 'types', 'sizes', 'models', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Upload main Photo
        $file_extension = $request->file('mainPhoto')->getClientOriginalExtension();
        $file_name = time() . "." . $file_extension;
        $path = "uploads/images";
        $request->file('mainPhoto')->move($path, $file_name);

        // Insert into Products
        DB::table('products')->insertGetId([
            'mainPhoto'         => $file_name,
            'mPhT_ar'           => $request->mainPhotoTitle_ar,
            'mPhT_en'           => $request->mainPhotoTitle_en,
            'mPhD_ar'           => $request->mainPhotoDescription_ar,
            'mPhD_en'           => $request->mainPhotoDescription_en,

            'name_ar'           => $request->name_ar,
            'name_en'           => $request->name_en,
            'description_ar'    => $request->description_ar,
            'description_en'    => $request->description_en,
            'code'              => $request->code,
            'productionYear'    => $request->productionYear,
            'localPrice'        => $request->localPrice,
            'forignPrice'       => $request->forignPrice,

            'cat_id'            => $request->categories,
            'design_id'         => $request->designs,
            'country_id'        => $request->countries,
            'type_id'           => $request->types,
            'size_id'           => $request->sizes,
            'model_id'          => $request->models,
            'company_id'        => $request->companies,
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
        $product = DB::table('products')->find($id);

        $catValue = DB::table('lk_category')->select(['name_ar', 'name_en'])->where('id', $product->cat_id)->get()[0];
        $designValue = DB::table('lk_design')->select(['name_ar', 'name_en'])->where('id', $product->design_id)->get()[0];
        $typeValue = DB::table('lk_type')->select(['name_ar', 'name_en'])->where('id', $product->type_id)->get()[0];
        $modelValue = DB::table('lk_model')->select(['name_ar', 'name_en'])->where('id', $product->model_id)->get()[0];
        $sizeValue = DB::table('lk_size')->select(['sizeNum', 'unit'])->where('id', $product->size_id)->get()[0];
        $countryValue = DB::table('lk_country')->select(['name_ar', 'name_en'])->where('id', $product->country_id)->get()[0];
        $companyValue = DB::table('lk_company')->select(['name_ar', 'name_en'])->where('id', $product->company_id)->get()[0];
        return view('admin.pages.products.show', compact(
            'product',
            'catValue',
            'designValue',
            'countryValue',
            'typeValue',
            'sizeValue',
            'modelValue',
            'companyValue'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = DB::table('products')->find($id);
        $categories = DB::table('lk_category')->select(['*'])->get();
        $designs = DB::table('lk_design')->select(['*'])->get();
        $countries = DB::table('lk_country')->select(['*'])->get();
        $types = DB::table('lk_type')->select(['*'])->get();
        $sizes = DB::table('lk_size')->select(['*'])->get();
        $models = DB::table('lk_model')->select(['*'])->get();
        $companies = DB::table('lk_company')->select(['*'])->get();

        $catValue = DB::table('lk_category')->select(['name_ar', 'name_en'])->where('id', $products->cat_id)->get();
        $designValue = DB::table('lk_design')->select(['name_ar', 'name_en'])->where('id', $products->design_id)->get();
        $typeValue = DB::table('lk_type')->select(['name_ar', 'name_en'])->where('id', $products->type_id)->get();
        $modelValue = DB::table('lk_model')->select(['name_ar', 'name_en'])->where('id', $products->model_id)->get();
        $sizeValue = DB::table('lk_size')->select(['sizeNum', 'unit'])->where('id', $products->size_id)->get();
        $countryValue = DB::table('lk_country')->select(['name_ar', 'name_en'])->where('id', $products->country_id)->get();
        $companyValue = DB::table('lk_company')->select(['name_ar', 'name_en'])->where('id', $products->company_id)->get();
        return view('admin.pages.products.edit', compact(
            'products',
            'categories',
            'catValue',
            'designs',
            'designValue',
            'countries',
            'countryValue',
            'types',
            'typeValue',
            'sizes',
            'sizeValue',
            'models',
            'modelValue',
            'companies',
            'companyValue'
        ));
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

        $file_extension = $request->file('mainPhoto')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'uploads/images';
        $request->file('mainPhoto')->move($path, $file_name);

        DB::table('products')->where('id', $id)->update([
            'mainPhoto' => $file_name,
            'name_ar'         => $request->name_ar,
            'name_en'        => $request->name_en,
            'description_ar'  => $request->description_ar,
            'description_en' => $request->description_en,
            'code'           => $request->code,
            'productionYear' => $request->productionYear,
            'localPrice'     => $request->localPrice,
            'forignPrice'    => $request->forignPrice,

            'cat_id'         => $request->categories,
            'design_id'      => $request->designs,
            'country_id'     => $request->countries,
            'type_id'        => $request->types,
            'size_id'        => $request->sizes,
            'model_id'       => $request->models,
            'company_id'     => $request->companies,
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
        DB::table('products')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
