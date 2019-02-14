<?php

namespace App\Http\Controllers\backend;

use App\service_3category;
use App\service_4category;
use App\service_panel;
use App\service_subcategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\service_categorie;

class categoryController extends Controller
{

    public function categoryIndex($data = false)
    {
        $category = service_categorie::all();
        if ($data) {
            $categoryUpdate = service_categorie::find($data);
            return view('backend.category.category', compact('category', 'categoryUpdate'));
        } else {
            return view('backend.category.category', compact('category'));
        }
    }


    public function categoryInsert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:service_categories|max:100',
            'category_nameBn' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1000',
        ]);
        $update = new service_categorie;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/serviceCategory', $fileStore);
            $update->image = $fileStore;
        }
        $update->category_name = $request->category_name;
        $update->category_nameBn = $request->category_nameBn;
        $update->save();

        Session::flash('message', ' Category Add Successfully');
        return redirect('/category');
    }


    public function catViewUpdate(Request $request)
    {
        if ($request->Show) {
            $serviceCategory = service_categorie::find($request->Show);
            $serviceCategory->landing_view = 1;
            $serviceCategory->save();
        } else {
            $serviceCategory = service_categorie::find($request->Hide);
            $serviceCategory->landing_view = 0;
            $serviceCategory->save();
        }
        Session::flash('message', 'Landing Page Service Category View Change Successfully');
        return redirect('/category');
    }


    public function DeleteSerCategory(Request $request)
    {
        if ($request->delete) {
            $serviceCategory = service_categorie::find($request->delete);
            $serviceCategory->delete();

            Session::flash('message', 'Service Category Delete Successfully');
            return redirect('/category');
        } else {
            echo "Something Wrong";
        }
    }


    public function categoryUpdate(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100|unique:service_categories,category_name,' . $request->id,
            'category_nameBn' => 'required|max:100',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000',
        ]);
        $update = service_categorie::find($request->id);
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/serviceCategory', $fileStore);
            $update->image = $fileStore;
        }
        $update->category_name = $request->category_name;
        $update->category_nameBn = $request->category_nameBn;
        $update->save();

        Session::flash('message', ' Category Add Successfully');
        return redirect('/category');
    }

    public function subcategoryIndex($data = false)
    {
        $category = service_categorie::all();
        $subcategory = service_subcategorie::all();
        $servicePanel = service_panel::all();
        if ($data) {
            $subcategoryUpdate = service_subcategorie::find($data);
            return view('backend.category.subcategory', compact('subcategory', 'subcategoryUpdate', 'category','servicePanel'));
        } else {
            return view('backend.category.subcategory', compact('subcategory', 'category','servicePanel'));
        }
    }

    public function subcategoryInsert(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:service_subcategories|max:100',
            'subcategory_nameBn' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1000',
        ]);
        $update = new service_subcategorie;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/serviceCategory', $fileStore);
            $update->image = $fileStore;
        }
        $update->category_id = $request->category_id;
        $update->service_id = $request->service_id;
        $update->subcategory_name = $request->subcategory_name;
        $update->subcategory_nameBn = $request->subcategory_nameBn;
        $update->save();

        Session::flash('message', ' Subcategory Add Successfully');
        return redirect('/subcategory');
    }

    public function DeleteSerSubCategory(Request $request)
    {
        if ($request->delete) {
            $serviceCategory = service_subcategorie::find($request->delete);
            $serviceCategory->delete();

            Session::flash('message', 'Service Subcategory Delete Successfully');
            return redirect('/subcategory');
        } else {
            echo "Something Wrong";
        }
    }

    public function subcategoryUpdate(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|max:100|unique:service_subcategories,subcategory_name,' . $request->id,
            'subcategory_nameBn' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000',
        ]);
        $update = service_subcategorie::find($request->id);
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileStore = rand(10, 100) . time() . "." . $extension;
            $request->file('image')->storeAs('public/serviceCategory', $fileStore);
            $update->image = $fileStore;
        }
        $update->category_id = $request->category_id;
        $update->service_id = $request->service_id;
        $update->subcategory_name = $request->subcategory_name;
        $update->subcategory_nameBn = $request->subcategory_nameBn;
        $update->save();

        Session::flash('message', ' Subcategory Update Successfully');
        return redirect('/subcategory');
    }

    public function category3Index($data = false)
    {
        $category = service_categorie::all();
        $subcategory = service_subcategorie::all();
        $category3 = service_3category::all();
        if ($data) {
            $category3Update = service_3category::find($data);
            return view('backend.category.category3', compact('subcategory', 'category3Update', 'category3', 'category'));
        } else {
            return view('backend.category.category3', compact('subcategory', 'category', 'category3'));
        }
    }

    public function category3Insert(Request $request)
    {
        $request->validate([
            'category3_name' => 'required|unique:service_3categories|max:100',
            'category3_nameBn' => 'required',
        ]);
        $update = new service_3category;
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->category3_name = $request->category3_name;
        $update->category3_nameBn = $request->category3_nameBn;
        $update->save();

        Session::flash('message', ' Category3 Add Successfully');
        return redirect('/category3');
    }

    public function DeleteSerCategory3(Request $request)
    {
        if ($request->delete) {
            $serviceCategory = service_3category::find($request->delete);
            $serviceCategory->delete();

            Session::flash('message', ' Category3 Delete Successfully');
            return redirect('/category3');
        } else {
            echo "Something Wrong";
        }
    }

    public function category3Update(Request $request)
    {
        $request->validate([
            'category3_name' => 'required|max:100|unique:service_3categories,category3_name,'.$request->id,
            'category3_nameBn' => 'required',
        ]);
        $update = service_3category::find($request->id);
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->category3_name = $request->category3_name;
        $update->category3_nameBn = $request->category3_nameBn;
        $update->save();

        Session::flash('message', ' Category3 Update Successfully');
        return redirect('/category3');
    }

    public function category4Index($data = false)
    {
        $category = service_categorie::all();
        $subcategory = service_subcategorie::all();
        $category3 = service_3category::all();
        $category4 = service_4category::all();
        if ($data) {
            $category4Update = service_4category::find($data);
            return view('backend.category.category4', compact('subcategory', 'category4Update', 'category3', 'category','category4'));
        } else {
            return view('backend.category.category4', compact('subcategory', 'category', 'category3','category4'));
        }
    }

    public function category4Insert(Request $request)
    {
        $request->validate([
            'category4_name' => 'required|unique:service_4categories|max:100',
            'category4_nameBn' => 'required',
        ]);
        $update = new service_4category;
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->category3_id = $request->category3_id;
        $update->category4_name = $request->category4_name;
        $update->category4_nameBn = $request->category4_nameBn;
        $update->save();

        Session::flash('message', ' Category4 Add Successfully');
        return redirect('/category4');
    }

    public function DeleteSerCategory4(Request $request)
    {
        if ($request->delete) {
            $serviceCategory = service_4category::find($request->delete);
            $serviceCategory->delete();

            Session::flash('message', ' Category4 Delete Successfully');
            return redirect('/category4');
        } else {
            echo "Something Wrong";
        }
    }

    public function category4Update(Request $request)
    {
        $request->validate([
            'category4_name' => 'required|max:100|unique:service_4categories,category4_name,'.$request->id,
            'category4_nameBn' => 'required',
        ]);
        $update = service_4category::find($request->id);
        $update->category_id = $request->category_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->category3_id = $request->category3_id;
        $update->category4_name = $request->category4_name;
        $update->category4_nameBn = $request->category4_nameBn;
        $update->save();

        Session::flash('message', ' Category4 Update Successfully');
        return redirect('/category4');
    }

    public function servicePanelIndex($data = false)
    {
        $servicePanel = service_panel::all();
        if ($data) {
            $servicePanelUpdate = service_panel::find($data);
            return view('backend.servicePanel', compact('servicePanel', 'servicePanelUpdate'));
        } else {
            return view('backend.servicePanel', compact('servicePanel'));
        }
    }

    public function servicePanelInsert(Request $request)
    {
        $request->validate([
            'service_name' => 'required|unique:service_panels|max:100',
        ]);
        $update = new service_panel;
        $update->service_name = $request->service_name;
        $update->save();

        Session::flash('message', ' Service Panel Add Successfully');
        return redirect('/servicePanel');
    }

    public function DeleteServicePanel(Request $request)
    {
        if ($request->delete) {
            $serviceCategory = service_panel::find($request->delete);
            $serviceCategory->delete();

            Session::flash('message', 'Service Panel Delete Successfully');
            return redirect('/servicePanel');
        } else {
            echo "Something Wrong";
        }
    }

    public function servicePanelUpdate(Request $request)
    {
        $request->validate([
            'service_name' => 'required|max:100|unique:service_panels,service_name,'.$request->id,
        ]);
        $update = service_panel::find($request->id);
        $update->service_name = $request->service_name;
        $update->save();

        Session::flash('message', ' Service Panel Update Successfully');
        return redirect('/servicePanel');
    }

    public function serViewUpdate(Request $request)
    {
        if ($request->Show) {

            $serviceHide = service_panel::where('landing_view',1)->first();
            if ($serviceHide){
                $serviceHide->landing_view = 0;
                $serviceHide->save();
            }


            $serviceCategory = service_panel::find($request->Show);
            $serviceCategory->landing_view = 1;
            $serviceCategory->save();
        } else {
            $serviceCategory = service_panel::find($request->Hide);
            $serviceCategory->landing_view = 0;
            $serviceCategory->save();
        }
        Session::flash('message', 'Landing Page Service Panel View Change Successfully');
        return redirect('/servicePanel');
    }
}
