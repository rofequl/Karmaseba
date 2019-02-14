<?php

namespace App\Http\Controllers\frontend;

use App\service_panel;
use App\service_subcategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\service_categorie;
use Session;

class frontendController extends Controller
{

    public function index()
    {
        $serviceCategory = service_categorie::all();
        $serviceSubcategory = service_subcategorie::all();
        $servicePanel = service_panel::where('landing_view',1)->first();
        if ($servicePanel){
            $subcategoryPanel = service_subcategorie::where('service_id',$servicePanel->id)->get();
        }else{
            $subcategoryPanel = service_subcategorie::all();
            $servicePanel = false;
        }

        return view('frontend.index',compact('serviceCategory','serviceSubcategory','subcategoryPanel','servicePanel'));
    }

    public function spIndex()
    {
        return view('frontend.sp_registration.sp');
    }

    public function serviceindex(Request $request)
    {
        if ($request->service) {
            $serviceSubcategory = service_subcategorie::where('category_id',$request->service)->get();

            return view('frontend.service.service',compact('serviceSubcategory'));
        }else{
            echo "Error";
        }

    }

    public function changeLang(Request $request)
    {
        if($request->language && $request->language=="Bangla"){
            Session::put('language', $request->language);
        }else{
            Session::put('language','English');
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
