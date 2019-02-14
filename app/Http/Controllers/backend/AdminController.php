<?php

namespace App\Http\Controllers\backend;

use App\user_information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use App\admin_panel;
use App\register_user;
use App\sp_help;
use App\sp_terms_condition;
use App\sp_announcement;

class AdminController extends Controller
{
    public function index()
    {
        $data = admin_panel::all()->count();
        if ($data > 0) {
            if (Session::get('email') != null) {
                return redirect('/dashboard');
            } else {
                return view('backend.login');
            }
        } else {
            return view('backend.register');
        }

    }

    public function LoginCheck(Request $request)
    {
        $admin = admin_panel::where('email', $request->email)
            ->first();

        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('email', $request->email);
                Session::put('name', $admin->name);
                return redirect('/dashboard');
            } else {
                $request->session()->flash('login_error', 'password not match');
                return redirect('/admin');
            }
        } else {
            $request->session()->flash('login_error', 'User name not match');
            return redirect('/admin');
        }
    }

    public function AdminUserRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:16',
        ]);
        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator)
                ->withInput();
        } else {
            $register_user = new admin_panel;
            $register_user->name = $request->name;
            $register_user->email = $request->email;
            $register_user->password = Hash::make($request->password);
            $register_user->save();
        }
        Session::put('name', $request->name);
        Session::put('email', $request->email);
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        return view('backend.index');
    }

    public function spApprove($data = false)
    {
        $sp_register = register_user::orderBy('id', 'DESC')->where('status', 1)->get();
        if ($data) {
            $spRegisterProfile = register_user::find($data);
            return view('backend.spApprove', compact('sp_register', 'spRegisterProfile'));
        } else {
            return view('backend.spApprove', compact('sp_register'));
        }
    }

    public function spNotApprove($data = false)
    {
        $sp_register = register_user::orderBy('id', 'DESC')->where('status', 0)->get();
        if ($data) {
            $spRegisterProfile = register_user::find($data);
            return view('backend.spNotApprove', compact('sp_register', 'spRegisterProfile'));
        } else {
            return view('backend.spNotApprove', compact('sp_register'));
        }
    }

    public function AdminSPUpdate(Request $request)
    {
        if ($request->updateA) {
            $register_user = register_user::find($request->updateA);
            $register_user->status = 1;
            $register_user->save();

            return redirect('/spNotApprove');
        } elseif ($request->updateB) {
            $register_user = register_user::find($request->updateB);
            $register_user->status = 0;
            $register_user->save();

            return redirect('/spApprove');
        } else {
            echo "Something Wrong";
        }
    }

    public function termsCondition($data = false)
    {
        $spTermsCondition = sp_terms_condition::all();
        $spTermsConditionUpdate = sp_terms_condition::find($data);
        if ($data){
            return view('backend.termsCondition', compact('spTermsCondition','spTermsConditionUpdate'));
        }else{
            return view('backend.termsCondition', compact('spTermsCondition'));
        }
    }

    public function AddTermsCondition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'message' => 'required|max:9999',
        ]);
        if ($validator->fails()) {
            return redirect('/termsCondition')
                ->withErrors($validator)
                ->withInput();
        } else {

            $termsSondition = new sp_terms_condition;
            $termsSondition->title = $request->title;
            $termsSondition->message = $request->message;
            $termsSondition->save();
            Session::flash('message', 'Terms and Conditions Add Successfully');
            return redirect('/termsCondition');

        }
    }

    public function DeleteTermsCon(Request $request)
    {
        if ($request->delete) {
            $termsSondition = sp_terms_condition::find($request->delete);
            $termsSondition->delete();
            Session::flash('message', 'Terms and Conditions Delete Successfully');
            return redirect('/termsCondition');
        }else {
            echo "Something Wrong";
        }
    }

    public function UpdateTermsCondition(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'message' => 'required|max:9999',
        ]);
        if ($validator->fails()) {
            return redirect('/termsCondition')
                ->withErrors($validator)
                ->withInput();
        } else {

            $termsSondition = sp_terms_condition::find($request->id);
            $termsSondition->title = $request->title;
            $termsSondition->message = $request->message;
            $termsSondition->save();
            Session::flash('message', 'Terms and Conditions Update Successfully');
            return redirect('/termsCondition');

        }
    }

    public function AdminSpHelp(Request $request)
    {

        if ($request->delete) {
            $spHelp = sp_help::find($request->delete);
            $spHelp->delete();
            Session::flash('message', 'Help message Delete Successfully');
            return redirect('/AdminSpHelp');
        }else {
            $spHelp = sp_help::orderBy('id', 'DESC')->get();
            return view('backend.help',compact('spHelp'));
        }
    }

    public function SendHelp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'help' => 'required|max:9999',
        ]);
        if ($validator->fails()) {
            return redirect('/AdminSpHelp')
                ->withErrors($validator)
                ->withInput();
        } else {

            $spHelp = new sp_help;
            $spHelp->title = $request->title;
            $spHelp->help = $request->help;
            $spHelp->save();

            Session::flash('message', 'Help message send to successfully');
            return redirect('/AdminSpHelp');

        }
    }

    public function announcement($data = false)
    {
        $spAnnouncement = sp_announcement::all();
        $spAnnouncementUpdate = sp_announcement::find($data);
        $sp_register = register_user::all()->where('status', 1);
        if ($data){
            return view('backend.announcement', compact('sp_register','spAnnouncement','spAnnouncementUpdate'));
        }else{
            return view('backend.announcement', compact('sp_register','spAnnouncement'));
        }
    }

    public function AddAnnouncement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'description' => 'required|max:9999',
        ]);
        if ($validator->fails()) {
            return redirect('/announcement')
                ->withErrors($validator)
                ->withInput();
        } else {

            $spAnnouncement = new sp_announcement;
            $spAnnouncement->user_id = $request->user_id;
            $spAnnouncement->title = $request->title;
            $spAnnouncement->description = $request->description;
            $spAnnouncement->save();
            Session::flash('message', 'Announcement Add Successfully');
            return redirect('/announcement');

        }
    }

    public function DeleteAnnouncement(Request $request)
    {
        if ($request->delete) {
            $spAnnouncement = sp_announcement::find($request->delete);
            $spAnnouncement->delete();
            Session::flash('message', 'Announcement Delete Successfully');
            return redirect('/announcement');
        }else {
            echo "Something Wrong";
        }
    }

    public function UpdateAnnouncement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'description' => 'required|max:9999',
        ]);
        if ($validator->fails()) {
            return redirect('/announcement')
                ->withErrors($validator)
                ->withInput();
        } else {

            $spAnnouncement = sp_announcement::find($request->id);
            $spAnnouncement->title = $request->title;
            $spAnnouncement->description = $request->description;
            $spAnnouncement->save();
            Session::flash('message', 'Announcement Update Successfully');
            return redirect('/announcement');

        }
    }

    public function Logout()
    {
        Session::forget('email');
        return redirect('/admin');
    }
}
