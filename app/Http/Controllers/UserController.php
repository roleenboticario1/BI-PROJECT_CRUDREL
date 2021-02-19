<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['users' =>  User::all()], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
             'surname' => 'required',
             'given_name' => 'required',
             'middle_name' => 'required',
             'nationality' => 'required',
             'sex' => 'required',
             'date_of_birth' => 'required',
             'place_of_birth' => 'required',
        ]);

        try {
             $user = new User;
             $user->surname = $request->input('surname');
             $user->given_name = $request->input('given_name');
             $user->middle_name = $request->input('middle_name');
             $user->nationality = $request->input('nationality');
             $user->sex = $request->input('sex');
             $user->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
             $user->place_of_birth = $request->input('place_of_birth');
             $user->save();

             return response()->json(['user' => $user, 'message' => 'User Created Successfully'], 201);

        } catch (\Exception $e) {

             return response()->json(['message' => 'User Created Failed!'], 409);
        }
    }

    public function show($id)
    {
        try {
             $user = User::findOrFail($id);
             return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
             return response()->json(['message' => 'User not found!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
             'surname' => 'required',
             'given_name' => 'required',
             'middle_name' => 'required',
             'nationality' => 'required',
             'sex' => 'required',
             'date_of_birth' => 'required',
             'place_of_birth' => 'required',
        ]);

       // try {
             $user = User::findOrFail($id);
             $user->surname = $request->input('surname');
             $user->given_name = $request->input('given_name');
             $user->middle_name = $request->input('middle_name');
             $user->nationality = $request->input('nationality');
             $user->sex = $request->input('sex');
             $user->date_of_birth = date('Y-m-d', strtotime($request->input('date_of_birth')));
             $user->place_of_birth = $request->input('place_of_birth');
             $user->save();

             return response()->json($user);

        // } catch (\Exception $e) {

             //return response()->json(['message' => 'User Updated Failed!'], 409);
        // }
    }

    public function destroy(Request $request, $id)
    { 
    	 try {
              $user = User::findOrFail($id)->delete();
              return response()->json(['user' => $user,  'message' => 'User Deleted Successfully'], 200);
         } catch (\Exception $e) {
              return response()->json(['message' => 'User not found!'], 404);
         }
    }

}
