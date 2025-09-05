<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        return "Role in Index function";
    }


    public function store(Request $request)
    {
        // "request-body" => $request->input("name") get only name
        // "request-body" => $request->input() // get all json data
        return [
            "request-body" => $request->input() // get all json data
        ];
    }


    public function show($id)
    {
        return "Show id = " . $id;
    }


    public function update(Request $request, $id)
    {
        return "Update id = " . $id;
    }


    public function destroy($id)
    {
        return "Destroy id = " . $id;
    }

    public function search() {}

    public function changeStatus(Request $request)
    {
        return "Change Status";
    }
}
