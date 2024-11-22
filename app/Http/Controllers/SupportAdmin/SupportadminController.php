<?php

namespace App\Http\Controllers\SupportAdmin;

use DB;
use App\Models\Lead;
use App\Models\Orders;
use App\Models\Comment;
use App\Models\Payment;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Warehouse;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Exports\NonListExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\MailController;

class SupportadminController extends Controller
{
    public function dashboard()
    {
        

        return view('supportadmin.dashboard');
    }
    
 

//     public function createComment($leadId)
//     {
//         $lead = Lead::findOrFail($leadId); 
//         return view('subadmin.comment.add', compact('lead')); 
//     }
    
//     public function addComment(Request $request, $leadId)
// {
//     $request->validate([
//         'comment' => 'required',
//         'status' => 'required|string'
//     ]);

//     Comment::create([
//         'lead_id' => $leadId,
//         'user_id' => auth()->id(), 
//         'comment' => $request->comment,
//         'status' => $request->status,
//         'status_updated_at' => now(),
//     ]);

//     return redirect()-> route('subadmin.leads.index')->with('success', 'Comment added successfully!');
// }


// public function showComments($leadId)
// {
   
//     $lead = Lead::findOrFail($leadId); 
//     $comments = Comment::where('lead_id', $leadId)->get(); 
//     //dd($lead, $comments);
    
//     return view('subadmin.comment.add', compact('lead', 'comments'));
// }


// public function updateComment(Request $request, $commentId)
// {
//     $request->validate([
//         'status' => 'required|in:' . implode(',', Comment::STATUSES),
//         'comment' => 'nullable',
//     ]);

//     $comment = Comment::findOrFail($commentId);

//     $statusUpdated = $comment->status !== $request->status;

//     $comment->update([
//         'status' => $request->status,
//         'comment' => $request->comment ?? $comment->comment,
//         'status_updated_at' => $statusUpdated ? now() : $comment->status_updated_at,
//     ]);

//     return back()->with('success', 'Comment status updated successfully!');
// }

// public function signleLeadView($id){
//     //$adminlead = Lead::where('assign_for', $id)->get();
//     $adminlead = Lead::findOrFail($id); 
//     return view('subadmin.leads.single_details',compact('adminlead'));
// }


}
