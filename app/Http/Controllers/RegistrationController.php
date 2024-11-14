<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Auth;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'postalcode' => 'required|max:8',
            'contact' => 'required|digits:11|starts_with:0',
            'email' => 'required|email|unique:registrations'
        ]);
        $user = new \App\Models\Registration();
        $user->entrepreneur_name = $request->entrepreneur_name;
        $user->subscriber_id = $request->subscriber_id;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->certificate = $request->certificate;
        $user->residentaddress = $request->residentaddress;
        $user->permanentaddress = $request->permanentaddress;
        $user->duelnationality = $request->duelnationality;
        $user->district = $request->district;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        $user->facebook = $request->facebook;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->since = $request->since;
        $user->bloodgroup = $request->bloodgroup;
        $user->donateblood = $request->donateblood;
        $user->nid = $request->nid;
        $user->maritalstatus = $request->maritalstatus;
        $user->passport = $request->passport;
        $user->step1 = $request->step1;
        $user->spouse_guardian = $request->spouse_guardian;
        $user->spouse_guardian_contact = $request->spouse_guardian_contact;
        $user->occupation_spouse_guardian = $request->occupation_spouse_guardian;
        $user->children = $request->children;
        $user->income = $request->income;
        $user->company_name = $request->company_name;
        $user->office_address = $request->office_address;
        $user->office_district = $request->office_district;
        $user->office_postal = $request->office_postal;
        $user->office_phone = $request->office_phone;
        $user->office_mobile = $request->office_mobile;
        $user->company_email = $request->company_email;
        $user->website = $request->website;
        $user->company_facebook = $request->company_facebook;
        $user->companypagelink = $request->companypagelink;
        $user->facebook_group = $request->facebook_group;
        $user->company_linkedin = $request->company_linkedin;
        $user->product_category = $request->product_category;
        $user->product = $request->product;
        $user->company_year = $request->company_year;
        $user->turnover = $request->turnover;
        $user->monthly_order = $request->monthly_order;
        $user->channel = $request->channel;
        $user->export = $request->export;
        $user->involvement = $request->involvement;
        $user->joining_date = $request->joining_date;
        $user->total_sale = $request->total_sale;
        $user->totalinpost = $request->totalinpost;
        $user->ref1 = $request->ref1;
        $user->ref2 = $request->ref2;

        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'First Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }
    public function nonstore(Request $request)
    {

        $request->validate([
            'postalcode' => 'required|max:8',
            'contact' => 'required|digits:11|starts_with:0',
            'email' => 'required|email|unique:registrations'
        ]);
        $user = new \App\Models\Registration();
        $user->entrepreneur_name = $request->entrepreneur_name;
        $user->subscriber_id = $request->subscriber_id;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->certificate = $request->certificate;
        $user->residentaddress = $request->residentaddress;
        $user->permanentaddress = $request->permanentaddress;
        $user->duelnationality = $request->duelnationality;
        $user->district = $request->district;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        $user->facebook = $request->facebook;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->since = $request->since;
        $user->bloodgroup = $request->bloodgroup;
        $user->donateblood = $request->donateblood;
        $user->nid = $request->nid;
        $user->maritalstatus = $request->maritalstatus;
        $user->passport = $request->passport;
        $user->step1 = $request->step1;
        $user->spouse_guardian = $request->spouse_guardian;
        $user->spouse_guardian_contact = $request->spouse_guardian_contact;
        $user->occupation_spouse_guardian = $request->occupation_spouse_guardian;
        $user->children = $request->children;
        $user->income = $request->income;
        $user->company_name = $request->company_name;
        $user->office_address = $request->office_address;
        $user->office_district = $request->office_district;
        $user->office_postal = $request->office_postal;
        $user->office_phone = $request->office_phone;
        $user->office_mobile = $request->office_mobile;
        $user->company_email = $request->company_email;
        $user->website = $request->website;
        $user->company_facebook = $request->company_facebook;
        $user->companypagelink = $request->companypagelink;
        $user->facebook_group = $request->facebook_group;
        $user->company_linkedin = $request->company_linkedin;
        $user->product_category = $request->product_category;
        $user->product = $request->product;
        $user->company_year = $request->company_year;
        $user->turnover = $request->turnover;
        $user->monthly_order = $request->monthly_order;
        $user->channel = $request->channel;
        $user->export = $request->export;
        $user->involvement = $request->involvement;
        $user->joining_date = $request->joining_date;
        $user->total_sale = $request->total_sale;
        $user->totalinpost = $request->totalinpost;
        $user->ref1 = $request->ref1;
        $user->ref2 = $request->ref2;

        $user->save();
        return redirect(route('nonsecond_step'))->with(session()->flash('alert-success', 'First Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }

    public function first_update(Request $request)
    {

        $request->validate([
            'postalcode' => 'required|max:8',
            'contact' => 'required|digits:11|starts_with:0',
            'email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->entrepreneur_name = $request->entrepreneur_name;
        $user->subscriber_id = $request->subscriber_id;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->certificate = $request->certificate;
        $user->residentaddress = $request->residentaddress;
        $user->permanentaddress = $request->permanentaddress;
        $user->duelnationality = $request->duelnationality;
        $user->district = $request->district;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        $user->facebook = $request->facebook;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->since = $request->since;
        $user->bloodgroup = $request->bloodgroup;
        $user->donateblood = $request->donateblood;
        $user->nid = $request->nid;
        $user->maritalstatus = $request->maritalstatus;
        $user->passport = $request->passport;
        $user->step1 = $request->step1;




        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'First Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }

    public function nonfirst_update(Request $request)
    {

        $request->validate([
            'postalcode' => 'required|max:8',
            'contact' => 'required|digits:11|starts_with:0',
            'email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->entrepreneur_name = $request->entrepreneur_name;
        $user->subscriber_id = $request->subscriber_id;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->certificate = $request->certificate;
        $user->residentaddress = $request->residentaddress;
        $user->permanentaddress = $request->permanentaddress;
        $user->duelnationality = $request->duelnationality;
        $user->district = $request->district;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        $user->facebook = $request->facebook;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->since = $request->since;
        $user->bloodgroup = $request->bloodgroup;
        $user->donateblood = $request->donateblood;
        $user->nid = $request->nid;
        $user->maritalstatus = $request->maritalstatus;
        $user->passport = $request->passport;
        $user->step1 = $request->step1;




        $user->save();
        return redirect(route('nonsecond_step'))->with(session()->flash('alert-success', 'First Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }

    public function personal_update(Request $request)
    {

        $request->validate([
            'postalcode' => 'required|max:8',
            'contact' => 'required|digits:11|starts_with:0',
            'email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->entrepreneur_name = $request->entrepreneur_name;
        $user->subscriber_id = $request->subscriber_id;
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->certificate = $request->certificate;
        $user->residentaddress = $request->residentaddress;
        $user->permanentaddress = $request->permanentaddress;
        $user->duelnationality = $request->duelnationality;
        $user->district = $request->district;
        $user->country = $request->country;
        $user->postalcode = $request->postalcode;
        $user->facebook = $request->facebook;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->since = $request->since;
        $user->bloodgroup = $request->bloodgroup;
        $user->donateblood = $request->donateblood;
        $user->nid = $request->nid;
        $user->maritalstatus = $request->maritalstatus;
        $user->passport = $request->passport;



        $user->save();
        return redirect(route('PersonalInformation'))->with(session()->flash('alert-success', 'Personal Information Successfully Update!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }

    public function second_step()
    {
        $id = Auth::user()->id;
        $subscriptionfee =   DB::table('subscriptions')->where('userid', $id)->first();
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('second',compact('subscriber','subscriptionfee'));
    }

    public function nonsecond_step()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('nonsecond',compact('subscriber'));
    }


    public function second_update(Request $request)
    {

        $request->validate([

            'spouse_guardian_contact' => 'required|digits:11|starts_with:0'
        ]);

        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

//        $user = new \App\Models\Registration();

        $user->subscriber_id = $request->subscriber_id;
        $user->step1 = $request->step1;
        $user->spouse_guardian = $request->spouse_guardian;
        $user->spouse_guardian_contact = $request->spouse_guardian_contact;
        $user->occupation_spouse_guardian = $request->occupation_spouse_guardian;
        $user->children = $request->children;

        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'Second Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }
    public function nonsecond_update(Request $request)
    {

        $request->validate([

            'spouse_guardian_contact' => 'required|digits:11|starts_with:0'
        ]);

        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

//        $user = new \App\Models\Registration();

        $user->subscriber_id = $request->subscriber_id;
        $user->step1 = $request->step1;
        $user->spouse_guardian = $request->spouse_guardian;
        $user->spouse_guardian_contact = $request->spouse_guardian_contact;
        $user->occupation_spouse_guardian = $request->occupation_spouse_guardian;
        $user->children = $request->children;

        $user->save();
        return redirect(route('nonthird_step'))->with(session()->flash('alert-success', 'Second Step Successfully Completed!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }
    public function familydetails_update(Request $request)
    {

        $request->validate([

            'spouse_guardian_contact' => 'required|digits:11|starts_with:0'
        ]);

        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

//        $user = new \App\Models\Registration();

        $user->subscriber_id = $request->subscriber_id;
        $user->spouse_guardian = $request->spouse_guardian;
        $user->spouse_guardian_contact = $request->spouse_guardian_contact;
        $user->occupation_spouse_guardian = $request->occupation_spouse_guardian;
        $user->children = $request->children;

        $user->save();
        return redirect(route('FamilyDetails'))->with(session()->flash('alert-success', 'Family Details Updated Successfully!'));
//        return redirect()->back()->with(session()->flash('alert-success', 'First Step Successfully Completed!'));

    }

    public function third_update(Request $request)
    {
        $request->validate([

            'income' => 'required'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

        $user->subscriber_id = $request->subscriber_id;
        $user->income = $request->income;
        $user->step1 = $request->step1;

        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'Second Step Successfully Completed!'));
    }

    public function nonthird_update(Request $request)
    {
        $request->validate([

            'income' => 'required'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

        $user->subscriber_id = $request->subscriber_id;
        $user->income = $request->income;
        $user->step1 = $request->step1;

        $user->save();
        return redirect(route('nonsecond_step'))->with(session()->flash('alert-success', 'Second Step Successfully Completed!'));
    }

    public function incomedetails_update(Request $request)
    {
        $request->validate([

            'income' => 'required'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

        $user->subscriber_id = $request->subscriber_id;
        $user->income = $request->income;

        $user->save();
        return redirect(route('IncomeDetails'))->with(session()->flash('alert-success', 'Income Details Successfully Updated!'));
    }


    public function fourth_update(Request $request)
    {
        $request->validate([

            'company_email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->subscriber_id = $request->subscriber_id;
        $user->step1 = $request->step1;
        $user->company_name = $request->company_name;
        $user->office_address = $request->office_address;
        $user->office_district = $request->office_district;
        $user->office_postal = $request->office_postal;
        $user->office_phone = $request->office_phone;
        $user->office_mobile = $request->office_mobile;
        $user->company_email = $request->company_email;
        $user->website = $request->website;
        $user->company_facebook = $request->company_facebook;
        $user->companypagelink = $request->companypagelink;
        $user->facebook_group = $request->facebook_group;
        $user->company_linkedin = $request->company_linkedin;
        $user->product_category = $request->product_category;
        $user->product = $request->product;
        $user->company_year = $request->company_year;
        $user->turnover = $request->turnover;
        $user->monthly_order = $request->monthly_order;
        $user->channel = $request->channel;
        $user->export = $request->export;
        $user->involvement = $request->involvement;
        $user->joining_date = $request->joining_date;
        $user->total_sale = $request->total_sale;
        $user->totalinpost = $request->totalinpost;
        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'Fourth Step Successfully Completed!'));
    }
    public function nonfourth_update(Request $request)
    {
        $request->validate([

            'company_email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->subscriber_id = $request->subscriber_id;
        $user->step1 = $request->step1;
        $user->company_name = $request->company_name;
        $user->office_address = $request->office_address;
        $user->office_district = $request->office_district;
        $user->office_postal = $request->office_postal;
        $user->office_phone = $request->office_phone;
        $user->office_mobile = $request->office_mobile;
        $user->company_email = $request->company_email;
        $user->website = $request->website;
        $user->company_facebook = $request->company_facebook;
        $user->companypagelink = $request->companypagelink;
        $user->facebook_group = $request->facebook_group;
        $user->company_linkedin = $request->company_linkedin;
        $user->product_category = $request->product_category;
        $user->product = $request->product;
        $user->company_year = $request->company_year;
        $user->turnover = $request->turnover;
        $user->monthly_order = $request->monthly_order;
        $user->channel = $request->channel;
        $user->export = $request->export;
        $user->involvement = $request->involvement;
        $user->joining_date = $request->joining_date;
        $user->total_sale = $request->total_sale;
        $user->totalinpost = $request->totalinpost;
        $user->save();
        return redirect(route('nonsecond_step'))->with(session()->flash('alert-success', 'Fourth Step Successfully Completed!'));
    }

    public function companyinformation_update(Request $request)
    {
        $request->validate([

            'company_email' => 'required|email'
        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->subscriber_id = $request->subscriber_id;
        $user->company_name = $request->company_name;
        $user->office_address = $request->office_address;
        $user->office_district = $request->office_district;
        $user->office_postal = $request->office_postal;
        $user->office_phone = $request->office_phone;
        $user->office_mobile = $request->office_mobile;
        $user->company_email = $request->company_email;
        $user->website = $request->website;
        $user->company_facebook = $request->company_facebook;
        $user->companypagelink = $request->companypagelink;
        $user->facebook_group = $request->facebook_group;
        $user->company_linkedin = $request->company_linkedin;
        $user->product_category = $request->product_category;
        $user->product = $request->product;
        $user->company_year = $request->company_year;
        $user->turnover = $request->turnover;
        $user->monthly_order = $request->monthly_order;
        $user->channel = $request->channel;
        $user->export = $request->export;
        $user->involvement = $request->involvement;
        $user->joining_date = $request->joining_date;
        $user->total_sale = $request->total_sale;
        $user->totalinpost = $request->totalinpost;
        $user->save();
        return redirect(route('CompanyInformation'))->with(session()->flash('alert-success', 'Company Information Successfully Updated'));
    }

    public function fifth_update(Request $request)
    {
        $request->validate([


        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->ref1 = $request->ref1;
        $user->ref2 = $request->ref2;
        $user->step1 = $request->step1;
        $user->save();
        return redirect(route('second_step'))->with(session()->flash('alert-success', 'Fifth Step Successfully Completed!'));
    }

    public function nonfifth_update(Request $request)
    {
        $request->validate([


        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->ref1 = $request->ref1;
        $user->ref2 = $request->ref2;
        $user->step1 = $request->step1;
        $user->save();
        return redirect(route('nonsecond_step'))->with(session()->flash('alert-success', 'Fifth Step Successfully Completed!'));
    }
    public function reference_update(Request $request)
    {
        $request->validate([


        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();
        $user->ref1 = $request->ref1;
        $user->ref2 = $request->ref2;
        $user->save();
        return redirect(route('Reference'))->with(session()->flash('alert-success', 'Reference successfully Updated!'));
    }

    public function sixth_update(Request $request)
    {
        $request->validate([


        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

        $user->step1 = $request->step1;
        $user->save();



        return redirect(route('second_step'))->with(session()->flash('alert-success', 'All Step Successfully Completed!'));
    }

    public function nonsixth_update(Request $request)
    {
        $request->validate([


        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();

        $user->step1 = $request->step1;
        $user->save();



        return redirect(route('non-subscriber-dashboard'))->with(session()->flash('alert-success', 'All Step Successfully Completed!'));
    }

    public function upload_update(Request $request)
    {
        $request->validate([
            'logo' => 'mimes:jpg,png|dimensions:max_width=400,max_height=400 ',
            'owner' => 'image|mimes:jpg,png',
            'product1' => 'image|mimes:jpg,png',
            'product2' => 'image|mimes:jpg,png',
            'product3' => 'image|mimes:jpg,png',
            'product4' => 'image|mimes:jpg,png'

        ]);
        $id = Auth::user()->id;
        $user = Registration::where('subscriber_id', $id)->first();


        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $subscriber_logo = $request->subscriber_logo;
            if (isset($logo)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $id . '-' . $currentDate . '-' . uniqid() . '.' . $logo->getClientOriginalExtension();
                if (!file_exists('uploads/logo')) {
                    mkdir('uploads/logo', 0777, true);
                }
                if (file_exists('uploads/logo/' . $subscriber_logo)) {
                    unlink('uploads/logo/' . $subscriber_logo);
                }
                $logo->move('uploads/logo', $imagename);
            } else {
                $imagename = $logo->logo;
            }
            $user->logo = $imagename;
        }

        if ($request->hasFile('product1')) {
            $product1 = $request->file('product1');
            $subscriber_product1 = $request->product1;
            if (isset($product1)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename1 = $id . '-' . $currentDate . '-' . uniqid() . '.' . $product1->getClientOriginalExtension();
                if (!file_exists('uploads/product1')) {
                    mkdir('uploads/product1', 0777, true);
                }
                if (file_exists('uploads/product1/' . $subscriber_product1)) {
                    unlink('uploads/product1/' . $subscriber_product1);
                }
                $product1->move('uploads/product1', $imagename1);
            } else {
                $imagename1 = $product1->product1;
            }
            $user->product1 = $imagename1;
        }
        if ($request->hasFile('product2')) {
            $product2 = $request->file('product2');
            $subscriber_product2 = $request->product2;
            if (isset($product2)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename2 = $id . '-' . $currentDate . '-' . uniqid() . '.' . $product2->getClientOriginalExtension();
                if (!file_exists('uploads/product2')) {
                    mkdir('uploads/product2', 0777, true);
                }
                if (file_exists('uploads/product2/' . $subscriber_product2)) {
                    unlink('uploads/product2/' . $subscriber_product2);
                }
                $product2->move('uploads/product2', $imagename2);
            } else {
                $imagename2 = $product2->product2;
            }
            $user->product2 = $imagename2;
        }

        if ($request->hasFile('product3')) {
            $product3 = $request->file('product3');
            $subscriber_product3 = $request->product3;
            if (isset($product3)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename3 = $id . '-' . $currentDate . '-' . uniqid() . '.' . $product3->getClientOriginalExtension();
                if (!file_exists('uploads/product3')) {
                    mkdir('uploads/product3', 0777, true);
                }
                if (file_exists('uploads/product3/' . $subscriber_product3)) {
                    unlink('uploads/product3/' . $subscriber_product3);
                }
                $product3->move('uploads/product3', $imagename3);
            } else {
                $imagename3 = $product3->product3;
            }
            $user->product3 = $imagename3;
        }

        if ($request->hasFile('product4')) {
            $product4 = $request->file('product4');
            $subscriber_product4 = $request->product4;
            if (isset($product4)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename4 = $id . '-' . $currentDate . '-' . uniqid() . '.' . $product4->getClientOriginalExtension();
                if (!file_exists('uploads/product3')) {
                    mkdir('uploads/product3', 0777, true);
                }
                if (file_exists('uploads/product4/' . $subscriber_product4)) {
                    unlink('uploads/product4/' . $subscriber_product4);
                }
                $product4->move('uploads/product4', $imagename4);
            } else {
                $imagename4 = $product4->product4;
            }
            $user->product4 = $imagename4;
        }


        if ($request->hasFile('owner')) {
            $owner = $request->file('owner');
            $subscriber_owner = $request->owner;
            if (isset($owner)) {
                $currentDate = Carbon::now()->toDateString();
                $imagename2 = $id . '-' . $currentDate . '-' . uniqid() . '.' . $owner->getClientOriginalExtension();
                if (!file_exists('uploads/owner')) {
                    mkdir('uploads/owner', 0777, true);
                }
                if (file_exists('uploads/owner/' . $subscriber_owner)) {
                    unlink('uploads/owner/' . $subscriber_owner);
                }
                $owner->move('uploads/owner', $imagename2);
            } else {
                $imagename2 = $owner->owner;
            }
            $user->owner = $imagename2;
        }


        $user->save();
        return redirect(route('Upload'))->with(session()->flash('alert-success', 'Photo Uploaded Successfully'));
    }

    public function third_step()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('third',compact('subscriber'));
    }

    public function nonthird_step()
{
    $id = Auth::user()->id;
    $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
    return view('nonthird',compact('subscriber'));
}

    public function fourth_step()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('fourth',compact('subscriber'));
    }

    public function fifth_step()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('fifth',compact('subscriber'));
    }
    public function sixth_step()
    {
        $id = Auth::user()->id;
//        $subscriber =   Registration::find($id);
        $subscriber =   DB::table('registrations')->where('subscriber_id', $id)->first();
        return view('six',compact('subscriber'));


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
