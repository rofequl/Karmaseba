<?php

namespace App\Http\Controllers\frontend;

use App\add_resource;
use App\add_service;
use App\business_plan;
use App\operation_information;
use App\user_information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\register_user;
use App\sp_shedule;
use Validator;
use Session;

class RegisterUserController extends Controller
{
    public function LoginCheck(Request $request)
    {

        $admin = register_user::where('phone', $request->phone)
            ->first();

        if (!empty($admin)) {
            if ($admin && Hash::check($request->password, $admin->password)) {
                Session::put('phone', $request->phone);
                Session::put('user_id', $admin->user_id);
                return redirect('/getInfo1');
            } else {
                $request->session()->flash('login_error', 'password not match');
                return redirect('/sp');
            }
        } else {
            $request->session()->flash('login_error', 'User name not match');
            return redirect('/sp');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:register_users'
        ]);
        if ($validator->fails()) {
            return redirect('sp')
                ->withErrors($validator)
                ->withInput();
        } else {
            $days = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

            $random_id = rand(100, 999);

            $register_user = new register_user;
            $register_user->phone = $request->phone;
            $register_user->verification_code = rand(1000, 9999);
            $register_user->user_id = $random_id;
            $register_user->status = 2;
            $register_user->password = Hash::make($request->password);
            $register_user->save();

            $userInformation = new user_information;
            $userInformation->user_id = $random_id;
            $userInformation->save();

            $operationInformation = new operation_information;
            $operationInformation->user_id = $random_id;
            $operationInformation->save();

            $businessPlan = new business_plan;
            $businessPlan->user_id = $random_id;
            $businessPlan->save();

            $addService = new add_service;
            $addService->user_id = $random_id;
            $addService->save();

            $addResource = new add_resource;
            $addResource->user_id = $random_id;
            $addResource->save();


            for ($i = 0; 7 > $i; $i++) {
                $day = $days[$i];
                $update = new sp_shedule;
                $update->user_id = $random_id;
                $update->day = $day;
                $update->save();
            }


            Session::put('phone', $request->phone);
            Session::put('user_id', $random_id);

            Session::flash('message', 'Register Successfully!');
            return redirect('/getInfo1');
        }
    }


    public function PersonalInformation($data = false)
    {
        $userInformation = user_information::where('user_id',  Session('user_id'))
            ->first();
        return view('frontend.sp_panel.personalInformation',compact('userInformation'));

    }

    public function UpdateSpProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:35',
            'nationalId_Number' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/resourceCrud')
                ->withErrors($validator)
                ->withInput();
        } else {
            $update = user_information::find($request->id);

            if ($request->hasFile('nationalId_image1')) {
                $extension = $request->file('nationalId_image1')->getClientOriginalExtension();
                $fileStore = rand(10, 100) . time() . "." . $extension;
                $request->file('nationalId_image1')->storeAs('public/nationalId', $fileStore);
                $update->nationalId_image1 = $fileStore;
            }

            if ($request->hasFile('nationalId_image2')) {
                $extension = $request->file('nationalId_image2')->getClientOriginalExtension();
                $fileStore2 = rand(10, 100) . time() . "." . $extension;
                $request->file('nationalId_image2')->storeAs('public/nationalId', $fileStore2);
                $update->nationalId_image2 = $fileStore2;
            }

            if ($request->hasFile('user_image')) {
                $extension = $request->file('user_image')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('user_image')->storeAs('public/nationalId', $fileStore3);
                $update->user_image = $fileStore3;
            }
            $update->name = $request->name;
            $update->nationalId_Number = $request->nationalId_Number;
            $update->save();
        }

        Session::flash('message', 'Profile Update Successfully');
        return redirect('/PersonalInformation');

    }

    public function Logout()
    {
        Session::forget('phone');
        return redirect('sp');
    }
}
