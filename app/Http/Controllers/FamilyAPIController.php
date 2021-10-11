<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelper;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Family::orderBy('id', 'desc')->get();
        $response = APIHelper::createAPIResponse(false, 200, "Show success", $result);
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:families',
        ]);
        $save = Family::create($request->all());
        if ($save)
            $response = APIHelper::createAPIResponse(false, 200, "Save success", $save);
        else
            $response = APIHelper::createAPIResponse(true, 500, "Save failed", $request);
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Family::findOrFail($id);
        $response = APIHelper::createAPIResponse(false, 200, "Show success", $result);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255|unique:families,name,' . $id
        ]);
        $family = Family::find($id);
        $update = $family->update($request->all());
        if ($update)
            $response = APIHelper::createAPIResponse(false, 200, "Update success", $family);
        else
            $response = APIHelper::createAPIResponse(true, 500, "Update failed", $request);
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = Family::findOrFail($id);
        $delete = $family->delete();
        if ($delete)
            $response = APIHelper::createAPIResponse(false, 200, "Delete success", $family);
        else
            $response = APIHelper::createAPIResponse(true, 500, "Delete failed", $family);
        return response()->json($response, 200);
    }
}
