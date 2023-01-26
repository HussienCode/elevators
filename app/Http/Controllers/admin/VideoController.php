<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
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
        return view('admin.pages.videos.productCreate', compact('id'));
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
        // dd($request->file('productVideos'));

        // Upload Image
        if ($request->file('productVideos'))
        {
            $file_extension = $request->file('productVideos')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'uploads/videos';
            $request->file('productVideos')->move($path, $file_name);

            DB::table('lk_product_videos')->insert([
                'name' => $file_name,
                'extension' => $file_extension,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                // 'src' => public_path() . '\uploads\videos\\' . $videoName,
                'product_id' => $product_id,
            ]);
            return redirect()->back()->with('success', "تم الاضافة بنجاح");
        }
        else
        {
            return redirect()->back()->with('success', "هناك خطأ");
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
        $videos = DB::table('lk_product_videos')->where('product_id', $id)->get();
        return view('admin.pages.videos.products', compact('videos', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productVideo = DB::table('lk_product_videos')->find($id);
        return view('admin.pages.videos.productEdit', compact('productVideo'));
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
        // dd($request->file('productVideos'));
        if (is_null($request->file('productVideos')))
        {
            DB::table('lk_product_videos')->where('id', $id)->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
            ]);
            return redirect()->back()->with('success', "تم التعديل بنجاح");
        }
        else
        {
            // if Video is exist
            if ($request->file('productVideos')) {
                $old_video = DB::table('lk_product_videos')->find($id);
                unlink('uploads/videos/' . $old_video->name);

                $file_extension = $request->file('productVideos')->getClientOriginalExtension();
                $file_name = time() . '.' . $file_extension;
                $path = 'uploads/videos';
                $request->file('productVideos')->move($path, $file_name);

                DB::table('lk_product_videos')->where('id', $id)->update([
                    'name' => $file_name,
                    'extension' => $file_extension,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'description_ar' => $request->description_ar,
                    'description_en' => $request->description_en
                ]);
                return redirect()->back()->with('success', "تم التعديل بنجاح");
            }
            else
            {
                return redirect()->back()->with('success', "حدث خطأ");
            }
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
        $video = DB::table('lk_product_videos')->find($id);
        unlink('uploads/videos/' . $video->name);
        DB::table('lk_product_videos')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
