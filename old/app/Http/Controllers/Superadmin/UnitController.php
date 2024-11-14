<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('superadmin.unit.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:units,name',
        ], [
            'name.unique' => 'Unit Name already exists.'
        ]);
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->save();
        return redirect()->route('unit.index')->with('successMsg','Unit Successfully Saved');
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
        $unit =   Unit::find($id);
        return view('superadmin.unit.edit',compact('unit'));
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
        $this->validate($request, [
            'name' => 'required|unique:units,name,' . $id,
        ], [
            'name.unique' => 'Unit Name already exists.'
        ]);
        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->save();
        return redirect()->route('unit.index')->with('successMsg','Unit Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitlist = Unit::find($id);
        $unitlist->delete();
        return redirect()->back()->with('dangerMsg','Unit Successfully Deleted');
    }
}
