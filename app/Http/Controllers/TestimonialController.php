<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use App\Testimonial;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $testimonial=Testimonial::orderBy('id', 'desc')->get();
        return view('admin/testimonial/view',compact("testimonial"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/testimonial/add');
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
                'company'=>'required',
                'description'=>'required',
                'image' => 'required|mimes:jpeg,bmp,png'
            ));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else {
            $testimonial=new Testimonial();
            $testimonial->name=$data['name'];
            $testimonial->company=$data['company'];
            $testimonial->description=$data['description'];
            $file=$request->file('image');
            $image=FileImage($file,'testimonial');
            $testimonial->img=$image['img'];
            $testimonial->img_dir=$image['img_dir'];
            $testimonial->save();
            return redirect('/adminpanel/testimonial')->withFlashMessage(Lang::get('main.insert').Lang::get('main.testimonial'));
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
        $item=Testimonial::find($id);
        if(count($item)){
            return view('admin.testimonial.edit',compact('item'));
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
        $testimonial=Testimonial::find($id);
        if(count($testimonial)){
            $data=$request->input();
            $validator = Validator::make($request->all(),
                array(
                    'name'=>'required',
                    'company'=>'required',
                    'description'=>'required',
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
                        if(file_exists(public_path().$testimonial->img_dir.$testimonial->img)&&!empty($testimonial->img_dir)){
                            unlink(public_path().$testimonial->img_dir.$testimonial->img);
                        }
                        if(file_exists(public_path().$testimonial->img_dir.'thumbnail/thumbnail_'.$testimonial->img)&&!empty($testimonial->img_dir)){
                            unlink(public_path().$testimonial->img_dir.'thumbnail/thumbnail_'.$testimonial->img);
                        }
                        $file=$request->file('image');

                        $image=FileImage($file,'testimonial');
                        $testimonial->img=$image['img'];
                        $testimonial->img_dir=$image['img_dir'];
                    }
                }
                $testimonial->name=$data['name'];
                $testimonial->company=$data['company'];
                $testimonial->description=$data['description'];
                $testimonial->save();
                return redirect('/adminpanel/testimonial/'.$testimonial->id.'/edit')->withFlashMessage(Lang::get('main.update').Lang::get('main.testimonial'));
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
        $testimonial=Testimonial::find($id);
        if(count($testimonial)){
            if($testimonial->delete()){

            }
        }
    }
}
