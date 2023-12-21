<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Informative;
use Illuminate\Http\Request;

class InformativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Informative::orderBy('id')->get();
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
        $dataInformative = new Informative();
        $dataInformative->province = $request->province;
        $dataInformative->description = $request->description;
        $dataInformative->image = $request->image;
        $dataInformative->link = $request->link;

        $post = $dataInformative->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataInformative
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
        $data = Informative::find($id);
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
        $dataInformative = Informative::find($id);
        $dataInformative->province = $request->province;
        $dataInformative->description = $request->description;
        $dataInformative->image = $request->image;
        $dataInformative->link = $request->link;

        $post = $dataInformative->save();

        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataInformative
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
        $dataInformative = Informative::find($id);
        if (empty($dataInformative)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataInformative->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }

}
