<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;
use App\Exports\ReferralExport;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\BusinessController;

class ReferralController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->ajax()){

            return \DataTables::of(Referral::getReferrals())->make(true);  

         }
        return view('referral.allreferrals', ['data' => Referral::getReferrals(), 'timeseries' => (new BusinessController)->timeSeries()]);
    }

    public function getCompleteReferrals()
    {
        // code...
    }

    public function getIncompleteReferrals()
    {
        // code...
    }

    public function completeReferrals()
    {
        // code...
    }

    public function downloadReferalIndex()
    {
        return view('referral.download');
    }

    public function downloadExcelFileOfReferral($id, Excel $excel)
    {
        return $excel->download(new ReferralExport($id), 'Referrals.xlsx');
    }
}
