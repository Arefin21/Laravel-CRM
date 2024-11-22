<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test()
    {
         $todayLeads = Lead::whereDate('created_at', Carbon::today())->get();

         if ($todayLeads->isEmpty()) {
            // Pass an empty collection instead of just the message
            return view('superadmin.test.test', [
                'message' => 'No leads found for today.',
                'todayLeads' => collect(), // Empty collection to avoid errors in the view
            ]);
        }
    
        return view('superadmin.test.test', compact('todayLeads'));
}
}