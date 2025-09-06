<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return [
            "data" => $categories,
            "message" => "Show all data successfully"
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category();

        $categories->name = $request->input("name");
        $categories->description = $request->input("description");
        $categories->status = $request->input("status");
        $categories->parent_id = $request->input("parent_id");

        $categories->save();

        return [
            "data" => $categories,
            "meassage" => "Create data successfully",
            "status" => true
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return [
                "message" => "Data not found"
            ];
        }

        return [
            "data" => $categories,
            "message" => "Data was found"
        ];
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
        $categories = Category::find($id);

        if (!$categories) {
            return [
                "message" => "Data not found"
            ];
        }

        $categories->name = $request->input("name");
        $categories->description = $request->input("description");
        $categories->status = $request->input("status");
        $categories->parent_id = $request->input("parent_id");

        $categories->update();

        return [
            "data" => $categories,
            "message" => "Data updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return [
                "message" => "Data not found"
            ];
        }

        $categories->delete();

        return [
            "data" => $categories,
            "message" => "Data of id $id was deletes successfully"
        ];
    }
}
