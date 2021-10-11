<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use DataTables;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $families = Family::orderBy('id', 'desc')->get();
            $datatables = Datatables::of($families)
                ->addIndexColumn()
                ->addColumn('action', function ($family) {
                    return view('components.table-action', ['family' => $family]);
                });
            return $datatables->rawColumns(['action'])->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
        Family::create($request->all());
        return redirect('/')->with(['success' => $request->name . " berhasil dibuat"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = Family::findOrFail(decrypt($id));
        return view('edit', compact('family'));
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
            'name' => 'required|string|max:255|unique:families,name,' . decrypt($id)
        ]);
        Family::find(decrypt($id))->update($request->all());
        return redirect('/')->with(['success' => $request->name . " berhasil diperbarui"]);
    }

    /**
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();
  
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = Family::findOrFail(decrypt($id));
        $family->delete();
        return redirect('/')->with(['success' => $family->name . " berhasil dihapus"]);
    }
}
