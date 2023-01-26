<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
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
    public function create($id)
    {
        return view('admin.pages.photos.productCreate', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // Get Product_id
        $product_id = $_GET['product_id'];

        // Upload Image
        if ($request->file('productImage'))
        {
            $file_extension = $request->file('productImage')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'uploads/images';
            $request->file('productImage')->move($path, $file_name);

            DB::table('lk_product_photos')->insert([
                'name' => $file_name,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                // 'src' => public_path() . '\uploads\images\\' . $imageName,
                'product_id' => $product_id,
            ]);
        }

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
        $photos = DB::table('lk_product_photos')->where('product_id', $id)->get();
        // dd($photos);
        return view('admin.pages.photos.products', compact('photos', 'id', ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productImage = DB::table('lk_product_photos')->find($id);
        return view('admin.pages.photos.productEdit', compact('productImage'));
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

        if (is_null($request->productImage))
        {
            DB::table('lk_product_photos')->where('id', $id)->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
            ]);
        }
        else
        {
            if ($request->file('productImage')) {
                $imageName = DB::table('lk_product_photos')->find($id);
                unlink('uploads/images/' . $imageName->name);
                // delete Last Image And Update New Image
                $file_extension = $request->file('productImage')->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'uploads/images';
                $request->file('productImage')->move($path, $file_name);

                DB::table('lk_product_photos')->where('id', $id)->update([
                    'name' => $file_name,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'description_ar' => $request->description_ar,
                    'description_en' => $request->description_en,
                ]);
            }
        }

        return redirect()->back()->with('success', "تم التعديل بنجاح");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imageName = DB::table('lk_product_photos')->find($id);
        unlink('uploads/images/' . $imageName->name);
        DB::table('lk_product_photos')->delete($id);
        return redirect()->back()->with("success", "تم الحذف بنجاح");
    }
}
