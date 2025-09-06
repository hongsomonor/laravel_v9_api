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
            "data" => $roles,
            "message" => "Inserting data successfully"
        ];
    }


    public function show($id)
    {
        $role = Role::find($id);
        return [
            "data" => $role,
            "message" => "Successfully found record of id $id",
            "status" => true
        ];
    }


    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if(!$role) {
            return [
                "error" => true,
                "message" => "Cannot find that record",
            ];
        } else {
            $role->name = $request->input("name");
            $role->code = $request->input("code");
            $role->description = $request->input("description");
            $role->status = $request->input("status");
            $role->test = $request->input("test");

            $role->update();
        }

        return [
            "data" => $role,
            "message" => "Data updated successfully",
            "status" => true
        ];
    }


    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return [
                "error" => true,
                "message" => "Connot find that record"
            ];
        } else {
            $role->delete();
        }

        return [
            "message" => "Deleted data successfully",
            "status" => true
        ];
    }

    public function search() {}

    // change status to know role was remove from company
    public function changeStatus(Request $request , $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return ["error" => true , "message" => "Data not found"];
        } else {
            $role->status = $request->input("status");
            $role->update();
        }

        return [
            "data" => $role,
            "message" => "Status was change to -> $role->status"
        ];
    }
}
