<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();

        return response()->json([
            "data" => $provinces,
            "message" => "All province"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validation = $request->validate([
            "name" => "required|string",
            "code" => "required|string",
            "description" => "nullable|string",
            "distance_from_city" => "required|numeric",
            "status" => "required|boolean"
        ]);

        $data = Province::create($validation);

        return response()->json([
            "data" => $data,
            "message" => "Create data success"
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $province = Province::find($id);

        if(!$province) {
            return response(["message" => "Data not found"]);
        }

        return response()->json(["data" => $province]);
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
        $province = Province::find($id);

        if(!$province) {
            return response()->json([
                "message" => "Data not found by that ID"
            ]);
        }

        $validation = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'description' => 'nullable|string',
            'distance_from_city' => 'required|numeric',
            'status' => 'required|boolean'
        ]);

        $province->update($validation);

        return response()->json([
            "data" => $province,
            "message" => "Update success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::find($id);

        if(!$province) {
            return response(["message" => "Data not found"]);
        }

        $province->delete();

        return response()->json([
            "data" => $province,
            "message" => "data was delete"
        ]);
    }
}
