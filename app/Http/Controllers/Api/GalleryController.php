<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gallery::orderBy('id')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'data succcesfully loaded',
            'data' => $data
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataGallery = new Gallery();
        $dataGallery->culture_name = $request->culture_name;
        $dataGallery->category = $request->category;
        $dataGallery->culture_image = $request->culture_image;
        $dataGallery->province = $request->province;

        $post = $dataGallery->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataGallery
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Gallery::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data successfully loaded',
                'data' => $data    
            ], 200);
        }
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
        $dataGallery = Gallery::find($id);
        $dataGallery->culture_name = $request->culture_name;
        $dataGallery->category = $request->category;
        $dataGallery->culture_image = $request->culture_image;
        $dataGallery->province = $request->province;

        $post = $dataGallery->save();

        return response()->json([
            'status' => true,
            'message' => 'data updated',
            'data' => $dataGallery
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataGallery = Gallery::find($id);
        if (empty($dataGallery)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataGallery->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
