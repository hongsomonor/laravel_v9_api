<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return $roles;
    }


    public function store(Request $request)
    {
        // "request-body" => $request->input("name") get only name
        // "request-body" => $request->input() // get all json data

        $roles = new Role();
        $roles->name = $request->input("name");
        $roles->code = $request->input("code");
        $roles->description = $request->input("description");
        $roles->status = $request->input("status");
        $roles->test = $request->input("test");

        $roles->save();

        return [
            "data" => $roles
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
