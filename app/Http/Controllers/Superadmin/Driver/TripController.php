<?php

namespace App\Http\Controllers\Superadmin\Driver;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Trip::all();
        return view('superadmin.Trip.index', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.Trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required',
            'fare' => 'required',
            'driver' => 'required',
            'route' => 'required',
            'description' => 'required',
            'daTe' => 'required|date',
        ]);

        $trip = new Trip();
        $trip->name = $request->name;
        $trip->fare = $request->fare;
        $trip->driver = $request->driver;
        $trip->route = $request->route;
        $trip->description = $request->description;
        $trip->daTe = $request->daTe;

        $trip->save();

        return redirect()->route('trip.index')->with('successMsg', 'Trip Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit =   Trip::find($id);
        return view('superadmin.Trip.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit =   Trip::find($id);
        return view('superadmin.Trip.edit',compact('unit'));
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
        // Validation
        $this->validate($request, [
            'name' => 'required',
            'fare' => 'required',
            'driver' => 'required',
            'route' => 'required',
            'description' => 'required',
            'daTe' => 'required|date',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->name = $request->name;
        $trip->fare = $request->fare;
        $trip->driver = $request->driver;
        $trip->route = $request->route;
        $trip->description = $request->description;
        $trip->daTe = $request->daTe;


        $trip->save();

        return redirect()->route('trip.index')->with('successMsg', 'Trip Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitlist = Trip::find($id);
        $unitlist->delete();
        return redirect()->back()->with('dangerMsg','Trip Successfully Deleted');
    }
}
