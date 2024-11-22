<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Mail\AdminRegistrationMail;
use App\Models\Comment;
use App\Models\Lead;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SuperadminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }
    // public function signle_sr($id)
    // {

    //     $srshop = SrShop::where('srId', $id)->get();
    //     return view('superadmin.shop.index', compact('srshop'));
    // }

    //crm single admin
    public function signle_admin($id) {

        $adminlead = Lead::where('assign_for', $id)->get();
        return view('superadmin.shop.index', compact('adminlead'));
    }

    public function Signin() {
        return view('auth.login');
    }
    public function dashboard() {
        $totalSale = Orders::sum('final_total');
        $totalCollection = Payment::sum('amount');
        $totalDue = $totalSale - $totalCollection;
        $totalStock = Product::count();

        // Prepare data for the charts
        $dailySales = Orders::selectRaw('DATE(created_at) as date, SUM(final_total) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7) // Last 7 days
            ->get();

        $dailyCollections = Payment::selectRaw('DATE(payment_date) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7)
            ->get();

        return view('superadmin.dashboard', compact(
            'totalSale', 'totalCollection', 'totalDue', 'totalStock',
            'dailySales', 'dailyCollections'
        ));
    }

    public function sr_add() {
        return view('superadmin.sr.create');
    }
    public function srlist() {
        $srlist = User::where('is_admin', '2')->get();
        return view('superadmin.sr.index', compact('srlist'));
    }

    public function sr_registration(Request $request) {
        // Validate the request inputs
        $request->validate([
            'srName'   => 'required|string|max:255',
            //'warehouse' => 'required|integer',
            //'srMobile' => 'required|string|max:15',
            //'srEmail' => 'required|email|max:255',
            //'srAddress' => 'required|string|max:255',
            //'srNid' => 'required|string|max:20',
            //'srEducation' => 'required|string|max:50',
            //'certificate' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            //'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name = $request->srName;
        $user->warehouse = $request->warehouse;
        $user->mobile = $request->srMobile;
        $user->email = $request->srEmail;
        $user->srAddress = $request->srAddress;
        $user->srNid = $request->srNid;
        $user->srEducation = $request->srEducation;
        $user->is_verified = 1;
        $user->is_admin = 2;
        $user->password = Hash::make($request->password);

        // Handle certificate upload
        // if ($request->hasFile('certificate')) {
        //     $certificate = $request->file('certificate');
        //     $certificateFileName = time() . '_certificate.' . $certificate->getClientOriginalExtension();
        //     $certificate->move(public_path('uploads/certificates'), $certificateFileName);
        //     $user->certificate = 'uploads/certificates/' . $certificateFileName;
        // }

// Handle SR photo upload
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageFileName = time() . '_photo.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/sr_photos'), $imageFileName);
        //     $user->image = 'uploads/sr_photos/' . $imageFileName;
        // }

        $user->save();
        Mail::to($request->srEmail)->send(new AdminRegistrationMail($request->srEmail, $request->password));

        return redirect()->route('sr.list')->with('successMsg', 'Admin successfully registered!');
    }
    public function sredit($id) {
        $sr = User::find($id);
        return view('superadmin.sr.edit', compact('sr'));
    }
    public function srdelete($id) {
        $seminar = User::find($id);
        $seminar->delete();
        return redirect()->route('sr.list')->with(session()->flash('dangerMsg', 'Admin Successfully Deleted!'));
    }
    public function srupdate(Request $request, $id) {
        // Validate incoming request
        $request->validate([
            'srName' => 'required|string|max:255',
            // 'warehouse' => 'required|integer',
            //'srMobile' => 'required|string|max:15',
            //'srEmail' => 'required|email|max:255',
            // 'srAddress' => 'required|string|max:255',
            // 'srNid' => 'required|string|max:20',
            // 'srEducation' => 'required|string|max:50',
            //'certificate' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            // 'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',

        ]);

        // Retrieve the existing user
        $user = User::findOrFail($id);

        // Update the user details
        $user->name = $request->srName;
        $user->warehouse = $request->warehouse;
        $user->mobile = $request->srMobile;
        $user->email = $request->srEmail;
        $user->srAddress = $request->srAddress;
        $user->srNid = $request->srNid;
        $user->srEducation = $request->srEducation;

        // Handle certificate upload
        // if ($request->hasFile('certificate')) {
        //     // Delete old certificate if exists
        //     if ($user->certificate) {
        //         \File::delete(public_path($user->certificate));
        //     }
        //     $certificate = $request->file('certificate');
        //     $certificateFileName = time() . '_certificate.' . $certificate->getClientOriginalExtension();
        //     $certificate->move(public_path('uploads/certificates'), $certificateFileName);
        //     $user->certificate = 'uploads/certificates/' . $certificateFileName;
        // }

        // Handle SR photo upload
        // if ($request->hasFile('image')) {
        //     // Delete old image if exists
        //     if ($user->image) {
        //         \File::delete(public_path($user->image));
        //     }
        //     $image = $request->file('image');
        //     $imageFileName = time() . '_photo.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/sr_photos'), $imageFileName);
        //     $user->image = 'uploads/sr_photos/' . $imageFileName;
        // }

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save updated user details
        $user->save();

        // Redirect with success message
        Mail::to($request->srEmail)->send(new AdminRegistrationMail($request->srEmail, $request->password));

        return redirect()->route('sr.list', $id)->with(session()->flash('successMsg', 'Admin Successfully Updated!'));
    }

    public function showComments($leadId) {
        $lead = Lead::find($leadId);
        if (!$lead) {
            abort(404, 'Lead not found.');
        }

        $comments = Comment::where('lead_id', $leadId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('superadmin.comment.view', [
            'lead'     => $lead,
            'comments' => $comments,
        ]);

        return view('superadmin.comment.view', compact('lead', 'comments'));
    }


// Support Admin Update


    public function supportAdmin() {

        $supportadmin = User::where('is_admin', '3')->get();
        return view('superadmin.supportadmin.index', compact('supportadmin'));
    }


        public function supportAdminedit($id) {
        $sr = User::find($id);
        return view('superadmin.supportadmin.edit', compact('sr'));
    }
    // public function srdelete($id) {
    //     $seminar = User::find($id);
    //     $seminar->delete();
    //     return redirect()->route('sr.list')->with(session()->flash('dangerMsg', 'Admin Successfully Deleted!'));
    // }
    public function supportAdminupdate(Request $request, $id) {
        
        $request->validate([
            'srName' => 'required|string|max:255',
            

        ]);

        
        $user = User::findOrFail($id);
       
        $user->name = $request->srName;
        $user->warehouse = $request->warehouse;
        $user->mobile = $request->srMobile;
        $user->email = $request->srEmail;
        $user->srAddress = $request->srAddress;
        $user->srNid = $request->srNid;
        $user->srEducation = $request->srEducation;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        
        Mail::to($request->srEmail)->send(new AdminRegistrationMail($request->srEmail, $request->password));

        return redirect()->route('supportadmin.leads.index', $id)->with(session()->flash('successMsg', 'Admin Successfully Updated!'));
    }

}
