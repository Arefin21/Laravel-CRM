<?php

namespace App\Http\Controllers;

use App\Models\SrShop;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function totalsale()
    {

        return view('superadmin.report.totalsale');
    }

    public function subtotalsale()
    {

        return view('superadmin.report.subtotalsale');
    }

    public function totalcollection()
    {

        return view('superadmin.report.totalcollection');
    }
    public function subtotalcollection()
    {

        return view('superadmin.report.subtotalcollection');
    }
    public function totaldue()
    {

        return view('superadmin.report.totaldue');
    }
    public function subtotaldue()
    {

        return view('superadmin.report.subtotaldue');
    }
}
