<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use DateTime;
use Illuminate\Support\Facades\Hash;
use App\resource_sp;
use App\add_resource;
use App\sp_shedule;
use App\sp_leave;

class ServiceProviderController extends Controller
{
    public function resourceCrud($data = false)
    {

        $resource_id = add_resource::where('user_id', Session('user_id'))->first();
        if ($data) {
            $resource_sp = resource_sp::all()->where('resource_id', $resource_id->id);
            $resourceUpdate = resource_sp::find($data);
            return view('frontend.sp_panel.resourceCrud', compact('resource_sp', 'resourceUpdate'));
        } else {
            $resource_sp = resource_sp::all()->where('resource_id', $resource_id->id);
            return view('frontend.sp_panel.resourceCrud', compact('resource_sp'));
        }
    }

    public function AddNewResource(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:15',
            'name' => 'required|max:35',
            'nationalId_Number' => 'required|max:50|unique:resource_sps',
            'nationalId_image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'nationalId_image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);
        if ($validator->fails()) {
            return redirect('/resourceCrud')
                ->withErrors($validator)
                ->withInput();
        } else {
            $update = new resource_sp;
            $resource_id = add_resource::where('user_id', Session('user_id'))->first();

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
            $update->resource_id = $resource_id->id;
            $update->nationalId_Number = $request->nationalId_Number;
            $update->phone = $request->phone;
            $update->save();
        }

        Session::flash('message', 'resource Add');
        return redirect('/resourceCrud');

    }

    public function UpdateResource(Request $request)
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
            $update = resource_sp::find($request->id);

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

        Session::flash('message', 'Resource Update Successfully');
        return redirect('/resourceCrud');

    }


    public function deleteResource(Request $request)
    {
        if ($request->Delete) {
            $register_user = resource_sp::find($request->Delete);
            $register_user->soft_delete = 1;
            $register_user->resource_id = 0;
            $register_user->save();

            Session::flash('message', 'Resource Remove');
            return redirect('/resourceCrud');
        }
    }

    public function AddResource($data = false)
    {

        return view('frontend.sp_panel.addResource');
    }

    public function AddDeleteResource(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nationalId_Number' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/AddResource')
                ->withErrors($validator)
                ->withInput();
        } else {
            $resource = resource_sp::where('nationalId_Number', $request->nationalId_Number)->first();
            if (!$resource) {
                Session::flash('message', 'This Id Number is Invalid');
                return redirect('/AddResource');
            } elseif ($resource->soft_delete == 0) {
                Session::flash('message', 'This resource Work Another SP');
                return redirect('/AddResource');
            } else {
                $resource_id = add_resource::where('user_id', Session('user_id'))->first();
                $resource->soft_delete = 0;
                $resource->resource_id = $resource_id->id;
                $resource->save();

                Session::flash('message', 'Resource Add Successfully!');
                return redirect('/AddResource');
            }
        }
    }

    public function spSchedule()
    {
        $spShedule = sp_shedule::all()->where('user_id', Session('user_id'));
        return view('frontend.sp_panel.spSchedule',compact('spShedule'));
    }

    public function TimeAddSchedule1(Request $request)
    {
        $request->validate([
            'hour' => 'required',
            'day' => 'required',
        ]);
        $cName = $request->hour;
        $spShedule = sp_shedule::where([
            ['user_id', '=', Session('user_id')],
            ['day', '=', $request->day],
        ])->first();

            $spShedule->$cName = 1;
            $spShedule->save();

        Session::flash('message', 'Schedule Add Successfully!');
        return redirect('/spSchedule');
    }

    public function TimeAddSchedule2(Request $request)
    {
        $request->validate([
            'hour' => 'required',
            'day' => 'required',
        ]);
        $cName = $request->hour;
        $spShedule = sp_shedule::where([
            ['user_id', '=', Session('user_id')],
            ['day', '=', $request->day],
        ])->first();

        $spShedule->$cName = 0;
        $spShedule->save();

        Session::flash('message', 'Schedule Remove Successfully!');
        return redirect('/spSchedule');
    }

    public function spBusyDay($data = false)
    {
        $spLeave = sp_leave::all()->where('user_id', Session('user_id'));
        if ($data){
            $spBusyDayUpdate = sp_leave::find($data);
            return view('frontend.sp_panel.spBusyDay',compact('spLeave','spBusyDayUpdate'));
        }else{
            return view('frontend.sp_panel.spBusyDay',compact('spLeave'));
        }


    }

    public function BusyDayAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'end_date'  => 'required',
            'start_date'  => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/spBusyDay')
                ->withErrors($validator)
                ->withInput();
        }else{
            if (DateTime::createFromFormat('m/d/Y', $request->start_date) < new DateTime()) {
                Session::flash('message', 'You can\'t use old date');
                return redirect('/spBusyDay');
            } elseif (DateTime::createFromFormat('m/d/Y', $request->end_date) < new DateTime()) {
                Session::flash('message', 'You can\'t use old date');
                return redirect('/spBusyDay');
            }else{
                $spLeave = new sp_leave;
                $spLeave->user_id = Session('user_id');
                $spLeave->start_date = $request->start_date;
                $spLeave->end_date = $request->end_date;
                $spLeave->save();

                Session::flash('message', 'Leave Date added Successfully');
                return redirect('/spBusyDay');
            }
        }
    }

    public function BusyDayUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'end_date'  => 'required',
            'start_date'  => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/spBusyDay')
                ->withErrors($validator)
                ->withInput();
        }else{
            if (DateTime::createFromFormat('m/d/Y', $request->start_date) < new DateTime()) {
                Session::flash('message', 'You can\'t use old date');
                return redirect('/spBusyDay');
            } elseif (DateTime::createFromFormat('m/d/Y', $request->end_date) < new DateTime()) {
                Session::flash('message', 'You can\'t use old date');
                return redirect('/spBusyDay');
            }else{
                $spLeave = sp_leave::find($request->id);
                $spLeave->start_date = $request->start_date;
                $spLeave->end_date = $request->end_date;
                $spLeave->save();

                Session::flash('message', 'Leave Date Update Successfully');
                return redirect('/spBusyDay');
            }
        }
    }

    public function spBusyDayDelete(Request $request){
        if ($request->delete){
            $spLeave = sp_leave::find($request->delete);
            $spLeave->delete();

            Session::flash('message', 'Leave Date Delete Successfully');
            return redirect('/spBusyDay');
        }

    }


}
