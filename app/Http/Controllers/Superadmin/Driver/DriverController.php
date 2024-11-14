<?php

namespace App\Http\Controllers\Superadmin\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Unit;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        return view('superadmin.Driver.index', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.Driver.create');
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
            'name' => 'required',  // assuming `name` is unique
            'mobile' => 'required',
            'licence' => 'required',
            'car' => 'required',
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'document' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $driver = new Driver();
        $driver->name = $request->name;
        $driver->mobile = $request->mobile;
        $driver->licence = $request->licence;
        $driver->car = $request->car;
        $driver->address = $request->address;
        $driver->nid = $request->nid;

        // File uploads
        if ($request->hasFile('photo')) {
            $photoName = time() . '_photo.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/drivers'), $photoName);
            $driver->photo = $photoName;
        }

        if ($request->hasFile('document')) {
            $docName = time() . '_document.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('uploads/drivers'), $docName);
            $driver->document = $docName;
        }

        $driver->save();

        return redirect()->route('driver.index')->with('successMsg', 'Driver Successfully Saved');
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
        $unit =   Driver::find($id);
        return view('superadmin.Driver.edit',compact('unit'));
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
            'mobile' => 'required',
            'licence' => 'required',
            'car' => 'required',
            'address' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'document' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $driver = Driver::findOrFail($id);
        $driver->name = $request->name;
        $driver->mobile = $request->mobile;
        $driver->licence = $request->licence;
        $driver->car = $request->car;
        $driver->address = $request->address;
        $driver->nid = $request->nid;

        // Update photo if new file is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($driver->photo && file_exists(public_path('uploads/drivers/' . $driver->photo))) {
                unlink(public_path('uploads/drivers/' . $driver->photo));
            }

            // Save the new photo
            $photoName = time() . '_photo.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/drivers'), $photoName);
            $driver->photo = $photoName;
        }

        // Update document if new file is uploaded
        if ($request->hasFile('document')) {
            // Delete the old document if it exists
            if ($driver->document && file_exists(public_path('uploads/drivers/' . $driver->document))) {
                unlink(public_path('uploads/drivers/' . $driver->document));
            }

            // Save the new document
            $docName = time() . '_document.' . $request->document->getClientOriginalExtension();
            $request->document->move(public_path('uploads/drivers'), $docName);
            $driver->document = $docName;
        }

        $driver->save();

        return redirect()->route('driver.index')->with('successMsg', 'Driver Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitlist = Driver::find($id);
        $unitlist->delete();
        return redirect()->back()->with('dangerMsg','Driver Successfully Deleted');
    }
}
