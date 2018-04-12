<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use App\Locations;
use Illuminate\Support\Facades\Validator;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations=Locations::orderBy('id', 'desc')->get();
        return view('admin/locations/view',compact("locations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/locations/add');
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
        $data=$request->input();
        $validator = Validator::make($request->all(),
            array(
                'name'=>'required',
                'image' => 'required|mimes:jpeg,bmp,png'
            ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else {
            $locations=new Locations();
            $locations->name=$data['name'];
            $locations->company=$data['company'];
            $locations->description=$data['description'];
            $file=$request->file('image');
            $image=FileImage($file,'locations');
            $locations->img=$image['img'];
            $locations->img_dir=$image['img_dir'];
            $locations->save();
            return redirect('/adminpanel/locations')->withFlashMessage(Lang::get('main.insert').Lang::get('main.locations'));
        }

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
        return abort(404);
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
        $item=Locations::find($id);
        if(count($item)){
            return view('admin.locations.edit',compact('item'));
        }else{
            return abort(404);
        }
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
        $locations=Locations::find($id);
        if(count($locations)){
            $data=$request->input();
            $validator = Validator::make($request->all(),
                array(
                    'name'=>'required',
                ));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }else {
                if(Input::hasFile('image')){
                    $validator = Validator::make($request->all(),array(
                        'image' => 'required|mimes:jpeg,bmp,png'
                    ));

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator->errors())->withInput();
                    }else{
                        if(file_exists(public_path().$locations->img_dir.$locations->img)&&!empty($locations->img_dir)){
                            unlink(public_path().$locations->img_dir.$locations->img);
                        }
                        if(file_exists(public_path().$locations->img_dir.'thumbnail/thumbnail_'.$locations->img)&&!empty($locations->img_dir)){
                            unlink(public_path().$locations->img_dir.'thumbnail/thumbnail_'.$locations->img);
                        }
                        $file=$request->file('image');

                        $image=FileImage($file,'locations');
                        $locations->img=$image['img'];
                        $locations->img_dir=$image['img_dir'];
                    }
                }
                $locations->name=$data['name'];
                $locations->save();
                return redirect('/adminpanel/locations/'.$locations->id.'/edit')->withFlashMessage(Lang::get('main.update').Lang::get('main.locations'));
            }
        }else{
            return abort(404);
        }

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
        $locations=Locations::find($id);
        if(count($locations)){
            if($locations->delete()){

            }
        }
    }
}