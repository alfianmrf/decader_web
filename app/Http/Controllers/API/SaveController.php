<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Save;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class SaveController extends Controller
{
    public function create(Request $request)
    {
        $save = new Save;
        $user = Auth::user();
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'plan' => 'required',
            'target_date' => 'required',
            'target_total' => 'required',
            'current_save' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            // return response
            $response = [
                'success' => false,
                'message' => 'Validation Error.', $validator->errors(),
            ];
            return response()->json($response, 404);
        }

        $save->title = $input['title'];
        $save->plan = $input['plan'];
        $save->target_date = $input['target_date'];
        $save->target_total = $input['target_total'];
        $save->current_save = $input['current_save'];
        $save->description = $input['description'];
        $save->image = $input['image'];
        $save->user_id = $user->id;
        $save->save();

        // return response
        $response = [
            'success' => true,
            'message' => 'Save created successfully.',
        ];
        return response()->json($response, 200);
    }

    public function read()
    {
        $user = Auth::user();
        $saves = Save::where('user_id', $user->id)->get();

        // return response
        $response = [
            'success' => true,
            'message' => 'Saves retrieved successfully.',
            'data' => $saves,
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        $save = Save::firstWhere('id', $request->id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'plan' => 'required',
            'target_date' => 'required',
            'target_total' => 'required',
            'current_save' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            // return response
            $response = [
                'success' => false,
                'message' => 'Validation Error.', $validator->errors(),
            ];
            return response()->json($response, 404);
        }

        if($save){
            $save = Save::find($request->id);
            $save->title = $input['title'];
            $save->plan = $input['plan'];
            $save->target_date = $input['target_date'];
            $save->target_total = $input['target_total'];
            $save->current_save = $input['current_save'];
            $save->description = $input['description'];
            $save->image = $input['image'];
            $save->save();
            return response([
                'success' => true,
            'message' => 'Save updated successfully.',
            ], 200);
        }
    }

    public function delete(Request $request)
    {
        $save = Save::firstWhere('id', $request->id);

        if($save){
            Save::destroy($request->id);
            return response([
                'success' => true,
                'message' => 'Save deleted successfully.',
            ], 200);
        }
    }
}
