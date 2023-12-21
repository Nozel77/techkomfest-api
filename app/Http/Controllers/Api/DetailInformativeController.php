<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailInformative;
use Illuminate\Http\Request;

class DetailInformativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DetailInformative::orderBy('id')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'detail data succcesfully loaded',
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
        $dataDetailInformative = new DetailInformative();
        $dataDetailInformative->province = $request->province;
        $dataDetailInformative->history = $request->history;
        $dataDetailInformative->geography = $request->geography;
        $dataDetailInformative->demographics = $request->demographics;
        $dataDetailInformative->artculture = $request->artculture;
        $dataDetailInformative->detail_description = $request->detail_description;

        $post = $dataDetailInformative->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailInformative
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
        $data = DetailInformative::find($id);
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
        $dataDetailInformative = DetailInformative::find($id);
        $dataDetailInformative->province = $request->province;
        $dataDetailInformative->history = $request->history;
        $dataDetailInformative->geography = $request->geography;
        $dataDetailInformative->demographics = $request->demographics;
        $dataDetailInformative->artculture = $request->artculture;
        $dataDetailInformative->detail_description = $request->detail_description;

        $post = $dataDetailInformative->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataDetailInformative
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
        $dataDetailInformative = DetailInformative::find($id);
        if (empty($dataDetailInformative)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataDetailInformative->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
