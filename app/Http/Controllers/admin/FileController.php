<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
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

    public function download($id)
    {
        // dd($id);
        $file = DB::table('lk_product_files')->find($id);
        // dd($file);
        $path = 'uploads/files/' . $file->name;
        return response()->download($path, $file->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.pages.files.productCreate', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get Product_id
        $product_id = $_GET['product_id'];

        // Validation
        $this->validate($request, [
            'title_ar'           => 'required',
            'title_en'          => 'required',
            'description_ar'     => 'required',
            'description_en'    => 'required',
        ]);

        // Upload Image
        if ($request->file('productFile')) {
            $file_extension = $request->file('productFile')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'uploads/files';
            $request->file('productFile')->move($path, $file_name);

            DB::table('lk_product_files')->insert([
                'name' => $file_name,
                'extension' => $file_extension,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                // 'src' => public_path() . '\products\\' . $file,
                'product_id' => $product_id,
            ]);
            return redirect()->back()->with('success', "تم الاضافة بنجاح");
        }
        else
        {
            return redirect()->back()->with('success', "حدث خطأ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = DB::table('lk_product_files')->where('product_id', $id)->get();
        // dd($files);
        return view('admin.pages.files.products', compact('files', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productFile = DB::table('lk_product_files')->find($id);
        return view('admin.pages.files.productEdit', compact('productFile'));
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

        if (is_null($request->file('productFile')))
        {
            DB::table('lk_product_files')->where('id', $id)->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
            ]);
            return redirect()->back()->with('success', "تم التعديل بنجاح");
        }
        else
        {
            if ($request->file('productFile')) {
                $fileName = DB::table('lk_product_files')->find($id);
                unlink('uploads/files/' . $fileName->name);

                $file_extension = $request->file('productFile')->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'uploads/files';
                $request->file('productFile')->move($path, $file_name);

                DB::table('lk_product_files')->where('id', $id)->update([
                    'name' => $file_name,
                    'extension' => $file_extension,
                    // 'src' => public_path() . '\products\\' . $fileName,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'description_ar' => $request->description_ar,
                    'description_en' => $request->description_en
                ]);
                return redirect()->back()->with('success', "تم التعديل بنجاح");
            }
            return redirect()->back()->with('success', "حدث خطأ");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = DB::table('lk_product_files')->find($id);
        unlink('uploads/files/' . $file->name);
        DB::table('lk_product_files')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
