<?php

namespace App\Http\Controllers\Subadmin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLeadController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $leadslist = Lead::all();
    //     return view('subadmin.leads.index', compact('leadslist'));
    // }
    public function index(Request $request) {
        $leads = Lead::where('assign_for', auth()->id())->get(); // Subadmin sees assigned leads.
        return view('subadmin.leads.index', compact('leads'));
        // $userId = Auth::user()->id;
        // $query = Lead::query();

        // if ($request->has('start_date') && $request->has('end_date')) {
        //     $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        // }

        // $leadslist = $query->get();

        // return view('subadmin.leads.index', compact('leadslist', 'userId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = User::all(); // Fetch all users for assignment

        return view('subadmin.leads.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'         => 'required',
            'phone'        => 'required',
            'company_name' => 'required',

        ]);

        // Create a new SrShop instance and save the data
        $shop = new Lead();
        $shop->name = $request->name;
        $shop->phone = $request->phone;
        $shop->email = $request->email;
        $shop->location = $request->location;
        $shop->company_name = $request->company_name;
        $shop->designation = $request->designation;
        $shop->service = $request->service;
        $shop->assign_for = auth()->id();
        $shop->comments = $request->comments;
        $shop->save();

        // Redirect back to the index route with success message
        return redirect()->route('subadmin.leads.index')->with('successMsg', 'Lead Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $lead = Lead::findOrFail($id); // Find the lead by ID
        $users = User::all(); // Get all users for "Assign For"
        return view('subadmin.leads.edit', compact('lead', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // Validate the incoming data
        $this->validate($request, [
            'name'         => 'required',
            'phone'        => 'required',
            'company_name' => 'required',
        ]);

        // Find the lead by ID and update it
        $lead = Lead::findOrFail($id);
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->location = $request->location;
        $lead->company_name = $request->company_name;
        $lead->designation = $request->designation;
        $lead->service = $request->service;
        $lead->assign_for = auth()->id();
        $lead->comments = $request->comments;
        $lead->save();

        // Redirect back to the index route with a success message
        return redirect()->route('subadmin.leads.index')->with('successMsg', 'Lead Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // Find the lead by ID and delete it
        $lead = Lead::findOrFail($id);
        $lead->delete();

        // Redirect back to the index route with a success message
        return redirect()->route('subadmin.leads.index')->with('successMsg', 'Lead Successfully Deleted');
    }
}
