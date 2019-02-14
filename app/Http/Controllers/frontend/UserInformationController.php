<?php

namespace App\Http\Controllers\frontend;

use App\service_categorie;
use App\service_subcategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user_information;
use App\register_user;
use App\operation_information;
use App\add_resource;
use App\resource_sp;
use App\add_service;
use App\business_plan;
use Validator;
use Session;

class UserInformationController extends Controller
{
    public function spAdmin()
    {
        $register_user = register_user::where('user_id', Session('user_id'))->first();
        if ($register_user->status == 0) {
            return view('frontend.sp_registration.congratulation');
        } elseif ($register_user->status == 1) {
            return view('frontend.sp_panel.index');
        } else {
                echo "Error";
        }

    }

    public function getInfo1()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        $register_user = register_user::where('user_id', Session('user_id'))->first();
        if ($register_user->status == 0) {
            return view('frontend.sp_registration.congratulation',compact('serviceSubcategory','serviceCategory'));
        } elseif ($register_user->status == 1) {
            return redirect('/spAdmin');
        } else {
            $spShedule = user_information::where('user_id', Session('user_id'))->first();
            return view('frontend.sp_registration.getInfo1', compact('spShedule','serviceCategory','serviceSubcategory'));
        }
    }

    public function getInfo2()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        $spShedule = operation_information::where('user_id', Session('user_id'))->first();
        return view('frontend.sp_registration.getInfo2', compact('spShedule','serviceCategory','serviceSubcategory'));
    }

    public function getInfo3()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        return view('frontend.sp_registration.getInfo3');
    }

    public function getInfo4()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        return view('frontend.sp_registration.getInfo4');
    }

    public function getInfo5()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        return view('frontend.sp_registration.getInfo5');
    }

    public function viewForm()
    {
        $register_user = register_user::where('user_id', Session('user_id'))->first();
        $userInformation = user_information::where('user_id', Session('user_id'))->first();
        $operationInformation = operation_information::where('user_id', Session('user_id'))->first();
        $businessPlan = business_plan::where('user_id', Session('user_id'))->first();
        $addService = add_service::where('user_id', Session('user_id'))->first();
        $addResource = add_resource::where('user_id', Session('user_id'))->first();
        return view('frontend.sp_registration.view_form',compact('register_user','userInformation','operationInformation','businessPlan','addService','addResource'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:35',
            'nationalId_Number' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/getInfo1')
                ->withErrors($validator)
                ->withInput();
        } else {

            $update = user_information::find($request->id);

            if ($request->hasFile('nationalId_image1')) {
                $request->validate([
                    'nationalId_image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                ]);
                $extension = $request->file('nationalId_image1')->getClientOriginalExtension();
                $fileStore = rand(10, 100) . time() . "." . $extension;
                $request->file('nationalId_image1')->storeAs('public/nationalId', $fileStore);
                $update->nationalId_image1 = $fileStore;
            }

            if ($request->hasFile('nationalId_image2')) {
                $request->validate([
                    'nationalId_image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                ]);
                $extension = $request->file('nationalId_image2')->getClientOriginalExtension();
                $fileStore2 = rand(10, 100) . time() . "." . $extension;
                $request->file('nationalId_image2')->storeAs('public/nationalId', $fileStore2);
                $update->nationalId_image2 = $fileStore2;
            }

            if ($request->hasFile('user_image')) {
                $request->validate([
                    'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                ]);
                $extension = $request->file('user_image')->getClientOriginalExtension();
                $fileStore3 = rand(10, 100) . time() . "." . $extension;
                $request->file('user_image')->storeAs('public/nationalId', $fileStore3);
                $update->user_image = $fileStore3;
            }
            $update->name = $request->name;
            $update->nationalId_Number = $request->nationalId_Number;
            $update->save();


            Session::flash('message', 'User Information Register Successfully!');
            return redirect('/getInfo2');
        }
    }

    public function storeInfo2(Request $request)
    {
        $request->merge([
            'favorite' => implode(',', (array)$request->get('favorite'))
        ]);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'company_name' => 'required|max:50',
            'service_location' => 'required|max:50',
            'favorite' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/getInfo2')
                ->withErrors($validator)
                ->withInput();
        } else {
            $update = operation_information::find($request->id);
            $update->company_name = $request->company_name;
            $update->email = $request->email;
            $update->service_location = $request->service_location;
            $update->delivery_type = $request->favorite;
            $update->save();

            Session::flash('message', 'Operation Information Register Successfully!');
            return redirect('/getInfo3');
        }


    }

    public function storeInfo3(Request $request)
    {
        $update = business_plan::where('user_id', Session('user_id'))->first();
        $update->plan = $request->plan;
        $update->save();

        Session::flash('message', 'Business Plan Register Successfully!');
        return redirect('/getInfo4');
    }


    public function storeInfo4(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/getInfo4')
                ->withErrors($validator)
                ->withInput();
        } else {
            $update = add_service::where('user_id', Session('user_id'))->first();
            $update->category_id = $request->category_id;
            $update->subcategory_id = $request->subcategory_id;
            $update->save();
        }

        Session::flash('message', 'Service Add Successfully!');
        return redirect('/getInfo5');
    }

    public function storeInfo5(Request $request)
    {
        if ($request->submit == "again") {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|max:15',
                'name' => 'required|max:35',
                'nationalId_Number' => 'required|max:50|unique:resource_sps',
                'nationalId_image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                'nationalId_image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000'
            ]);
            if ($validator->fails()) {
                return redirect('/getInfo5')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $addResource = add_resource::where('user_id', Session('user_id'))->first();
                $addResource->resource_type = $request->resource_type;
                $addResource->save();

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
            $add_resource = add_resource::where('user_id', Session('user_id'))->first();
            $resourceSP = resource_sp::where('resource_id', $add_resource->id)->count();

            Session::flash('message', $resourceSP . ' resource Add');
            return redirect('/getInfo5');
        } else {
            $addResource = add_resource::where('user_id', Session('user_id'))->first();
            $addResource->resource_type = $request->resource_type;
            $addResource->save();

            Session::flash('message', 'Registration Successfully!');
            return redirect('/viewForm');
        }
    }
    public function regSuccess()
    {
        $register_user = register_user::where('user_id', Session('user_id'))->first();
        $register_user->status = 0;
        $register_user->save();

        return redirect('/spAdmin');
    }



}
