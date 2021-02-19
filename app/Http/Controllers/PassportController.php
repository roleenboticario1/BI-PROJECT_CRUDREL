<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Passport;
class PassportController extends Controller
{
  public function index()
    {
        return response()->json(['Passport' =>  Passport::all()], 200);
    }
  
    public function store(Request $request)
    {
        $this->validate($request, [
             'type'=> 'required',
             'country_code' => 'required',
             'passpost_no' => 'required',
             //'passposrt_image' => 'required',
             'issue_date' => 'required',
             'expiration_date' => 'required',
             'user_id' => 'required',
        ]);

        try {
             $passport = new Passport;
             $passport->type = $request->input('type');
             $passport->country_code = $request->input('country_code');
             $passport->passpost_no = $request->input('passpost_no');
             $passport->issue_date = date('Y-m-d', strtotime($request->input('issue_date')));
             $passport->expiration_date = date('Y-m-d', strtotime($request->input('expiration_date')));
             $passport->user_id= $request->input('user_id');
             $passport->save();

             return response()->json(['user' => $passport, 'message' => 'Passport Created Successfully'], 201);

        } catch (\Exception $e) {

             return response()->json(['message' => 'Passport Registration Failed!'], 409);
        }
    }

    public function show($id)
    {
        try {
             $user = Passport::findOrFail($id);
             return response()->json(['Passport' => $user], 200);
        } catch (\Exception $e) {
             return response()->json(['message' => 'Passport not found!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'type'=> 'required',
             'country_code' => 'required',
             'passpost_no' => 'required',
             //'passposrt_image' => 'required',
             'issue_date' => 'required',
             'expiration_date' => 'required',
             'user_id' => 'required',
        ]);

        try {
             $passport = Passport::findOrFail($id);
             $passport->type = $request->input('type');
             $passport->country_code = $request->input('country_code');
             $passport->passpost_no = $request->input('passpost_no');
             $passport->issue_date = date('Y-m-d', strtotime($request->input('issue_date')));
             $passport->expiration_date = date('Y-m-d', strtotime($request->input('expiration_date')));
             $passport->user_id= $request->input('user_id');
             $passport->save();

             return response()->json(['Passport' => $passport, 'message' => 'Passport Updated Successfully'], 201);

        } catch (\Exception $e) {

             return response()->json(['message' => 'Passport Updated Failed!'], 409);
        }
    }

    public function destroy(Request $request, $id)
    { 
         try {
              $user = Passport::findOrFail($id)->delete();
              return response()->json(['Passport' => $user,  'message' => 'Passport Deleted Successfully'], 200);
         } catch (\Exception $e) {
              return response()->json(['message' => 'User not found!'], 404);
         }
    }
}
