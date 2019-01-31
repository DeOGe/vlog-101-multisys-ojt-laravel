<?php

namespace App\Modules\Vlog\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Vlog\Models\Vlog;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;

class VlogController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function index()
    {
        $vlogs = Vlog::getOrPaginate();
        return (new ApiResponse)->resource($vlogs);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function store(Request $request)
    {
        $payload = $request->only('title', 'body');
        $rules = [
            'title'   => 'required',
            'body' => 'required'
        ];

        $validator = Validator::make($payload, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "message" => "Unprocessable Entity",
                    "errors" => $errors
                ],
                422
            );
        }

        $payload = $request->all();
        $vlog = Vlog::create($payload);
        return (new ApiResponse)->resource($vlog);
    }

    /**
    * Display the specified resource.
    *
    * @param int  $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function show($id)
    {
        $vlog = Vlog::findOrFail($id);
        return (new ApiResponse)->resource($vlog);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int                       $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function update(VlogRequest $request, $id)
    {
        $payload = $request->only('title', 'body');
        $rules = [
            'title'   => 'required',
            'body' => 'required'
        ];

        $validator = Validator::make($payload, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "message" => "Unprocessable Entity",
                    "errors" => $errors
                ],
                422
            );
        }

        $payload = $request->all();
        $vlog = Vlog::findOrFail($id);
        $vlog->update($payload);
        return (new ApiResponse)->resource($vlog);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int  $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function destroy($id)
    {
        $vlog = Vlog::findOrFail($id);
        $vlog->delete();
        return (new ApiResponse)->resource($vlog);
    }
}
