<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travel;


class TravelController extends Controller
{
    public function index()
    {
        return response()->json(['travels' =>  Travel::all()], 200);
    }

    public function store(Request $request)
    {
    	 $this->validate($request, [
             'purpose_of_visit' => 'required',
             'length_of_stay' => 'required',
             'port_of_stay' => 'required',
             'last_port_of_stay' => 'required',
             'user_id' => 'required',
        ]);

        try {
             $travel = new Travel;
             $travel->purpose_of_visit = $request->input('purpose_of_visit');
             $travel->length_of_stay = $request->input('length_of_stay');
             $travel->port_of_stay = $request->input('port_of_stay');
             $travel->last_port_of_stay = $request->input('last_port_of_stay');
             $travel->user_id = $request->input('user_id');
             $travel->save();

             return response()->json(['travel' => $travel, 'message' => 'Travel Created Successfully'], 201);

        } catch (\Exception $e) {

             return response()->json(['message' => 'Travel Created Failed!'], 409);
        }
    }

    public function show($id)
    {
    	try {
             $travel = Travel::findOrFail($id);
             return response()->json(['travel' => $travel], 200);
        } catch (\Exception $e) {
             return response()->json(['message' => 'Travel not found!'], 404);
        }
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
             'purpose_of_visit' => 'required',
             'length_of_stay' => 'required',
             'port_of_stay' => 'required',
             'last_port_of_stay' => 'required',
             'user_id' => 'required',
        ]);

        try {
             $travel = Travel::findOrFail($id);
             $travel->purpose_of_visit = $request->input('purpose_of_visit');
             $travel->length_of_stay = $request->input('length_of_stay');
             $travel->port_of_stay = $request->input('port_of_stay');
             $travel->last_port_of_stay = $request->input('last_port_of_stay');
             $travel->user_id = $request->input('user_id');
             $travel->save();

             return response()->json(['travel' => $travel, 'message' => 'Travel Updated Successfully'], 201);

        } catch (\Exception $e) {

             return response()->json(['message' => 'Travel Registration Failed!'], 409);
        }
    }

    public function destroy(Request $request, $id)
    {
    	try {
              $travel = Travel::findOrFail($id)->delete();
              return response()->json(['travel' => $travel,  'message' => 'Travel Deleted Successfully'], 200);
        } catch (\Exception $e) {
              return response()->json(['message' => 'Travel not found!'], 404);
        }
    }
}
