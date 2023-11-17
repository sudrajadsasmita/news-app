<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(News $news, Category $category)
    {

        $category = Category::all();
        $news = News::all();
        $data = [
            'news'      => $news,
            'category'  => $category,
        ];

        return view('pages.admin.news', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'category_id'   => 'required',
            'content'       => 'required',
            'picture'       => 'required',
            'created_by'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->picture) {

            $imageName                 = round(microtime(true) * 1000) . '-' . $request->file('picture')->getClientOriginalName();
            $request->picture->move(public_path('news'), $imageName);

            $upload                    = new News();
            $upload->title             = $request->title;
            $upload->category_id       = $request->category_id;
            $upload->content           = $request->content;
            $upload->picture           = $imageName;
            $upload->created_by        = $request->created_by;
            $simpan                    = $upload->save();
        }

        if ($simpan) {
            return redirect()->route('news')->with('success', 'Data Berhasil Ditambah');
        } else {
            return redirect()->route('news')->with('failed', 'Data Tidak Ditambah');
        }

        //return response
        return redirect('admin-news');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data   = News::findOrFail($id);
        $data->title             = $request->title;
        $data->category_id       = $request->category_id;
        $data->content           = $request->content;
        $data->created_by        = $request->created_by;

        if ($request->picture) {
            $file       = $request->file('picture');
            $imageName  = round(microtime(true) * 1000) . '-' . $file->getClientOriginalName();

            if ($data->picture != "") {
                $file->move(public_path() . '/news/', $imageName);
                File::delete(public_path('news/' . $data->foto));
            } else {
                $file->move(public_path() . '/news/', $imageName);
            }

            $data->picture   = $imageName;
        }

        // return 'done';
        $response = $data->save();

        if ($response) {
            return redirect()->route('news')->with('success', 'Data Berhasil Ditambah');
        } else {
            return redirect()->route('news')->with('failed', 'Data Tidak Ditambah');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = News::find($id);
        if ($delete->picture == "") {
            $delete->delete();
        } elseif ($delete->picture != 'default.png') {
            $file = public_path('news/' . $delete->foto);

            if (File::exists($file)) {
                File::delete($file);
            }

            $delete->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data successfully deleted',
        ]);
    }
}
