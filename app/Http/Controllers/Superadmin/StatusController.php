<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('superadmin.status.index', compact('statuses'));
    }

    public function create()
    {
        return view('superadmin.status.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:statuses,name']);
        Status::create($request->all());
        return redirect()->route('statuses.index')->with('success', 'Status created successfully!');
    }

    public function edit(Status $status)
    {
        return view('superadmin.status.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $request->validate(['name' => 'required|unique:statuses,name,' . $status->id]);
        $status->update($request->all());
        return redirect()->route('statuses.index')->with('success', 'Status updated successfully!');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully!');
    }
}
