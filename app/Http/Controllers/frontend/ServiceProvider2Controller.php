<?php

namespace App\Http\Controllers\frontend;

use App\user_information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use App\sp_terms_condition;
use App\sp_help;
use App\sp_announcement;

class ServiceProvider2Controller extends Controller
{
    public function spTermsCondition()
    {
        $spTermsCondition = sp_terms_condition::orderBy('id', 'DESC')->get();

        return view('frontend.sp_panel.termsCondition', compact('spTermsCondition'));
    }

    public function spHelp(Request $request)
    {
        if ($request->delete) {
            $spHelp = sp_help::find($request->delete);
            $spHelp->delete();
            Session::flash('message', 'Help message Delete Successfully');
            return redirect('/spHelp');
        }else {
            $spHelp = sp_help::orderBy('id', 'DESC')->get();
            return view('frontend.sp_panel.help',compact('spHelp'));
        }
    }


    public function spAnnouncement()
    {
        $spAnnouncement = sp_announcement::orderBy('id', 'DESC')->get();

        return view('frontend.sp_panel.announcement', compact('spAnnouncement'));
    }
}
