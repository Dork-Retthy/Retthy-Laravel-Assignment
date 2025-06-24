<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public $users = [
        ['id'=> 1, 'name'=> 'user 01', 'email'=> 'user01@example.com', 'membershipDate'=> '2023-01-15'],
        ['id'=> 2, 'name'=> 'user 02', 'email'=> 'user02@example.com', 'membershipDate'=> '2023-02-20'],
        ['id'=> 3, 'name'=> 'user 03', 'email'=> 'user03@example.com', 'membershipDate'=> '2023-03-25'],
    ];
    public function index() {
        return response()->json([
            'message' => 'Users retrieved successfully!',
            'data' => $this->users
        ], 200);
    }
    public function show(int $id) {
        $user = collect($this->users)->firstWhere('id', $id);
        if ($user) {
            return response()->json([
                'message' => 'User found!',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
    }

    ///Create user
    // public function createUser(Request $request) {
    //     return response() -> json([
    //         "message" => "Successful",
    //         "data" => [
    //             "name" => $request->name,
    //             "email" => $request->email,
    //             "membershipDate" => $request->membershipDate
    //         ]
    //     ], 201);
    // }

    public function createUser(StoreUserRequest $request){
        $user = UserModel::create($request->all());
        return response()->json([
            "message" => "User created successfully!",
            "data" => $user,
        ], 201);
    }

    public function edit(Request $request, int $id){
        return response()-> json([
            "id" => $id,
            "data" => [
                "name" => $request->name,
                "email" => $request->email,
                "membershipDate" => $request->membershipDate
            ]
            ], 200);
    }
    public function delete(int $id){
        return response()->json([
            "message" => "User with id $id deleted successfully",
            "data" => [
                "id" => $id
            ]
        ], 200);
    }
    public function countUsers() {
        return response()->json([
            'message' => 'Total users count retrieved successfully!',
            'data' => ['count' => count($this->users)]
        ], 200);
    }
}
