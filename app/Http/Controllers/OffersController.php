<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\offer;
class OffersController extends Controller
{
        public function createoffer()
    {
        return view('admin/offers/addoffer');
    }


     public function addoffer(Request $request)
    {
     $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/offers_images/', $name);
            $images[]=$name;
        }
    }
    $images=implode("|",$images);

        offer::create([
            'offer_title'  => $request->offer_title,
            'offer_description' => $request->offer_description,    
            'images' => $images

        ]);

        return redirect('/adminpanel/all-offers')->withFlashMessage('تم إضافة بيانات الخبر بنجاح');
    }

        public function getoffers()
    {
        $offers=offer::orderBy('id', 'desc')->get(); 

        return view('/admin/offers/offers',compact("offers")); 
    }
//template
        public function getofferstemp()
    {
        $offers=offer::orderBy('id', 'desc')->paginate(9); 

        return view('/front-end/offers/offers',compact("offers")); 
    }


   public function Singleoffer($id)
    {
        $offer_info = offer::findOrFail($id);
        return view('front-end/offers/singleoffer', compact('offer_info'));
    }


        public function destroy($id)
    {
        offer::find($id)
            ->delete();

        return redirect('adminpanel/all-offers')->withFlashMessage('تم حذف العرض بنجاح');
    }


       public function editoff(offer $id)
    {

     $offer_info = DB::table('offers')->where('id', $id->id)->first();

     return view('admin/offers/edit',compact('offer_info'));    
    }






   public function editoffer(Request $request,$id)
    {
     $offers = offer::find($id);
    $offers->fill(array_except($request->all(),['images']))
                 ->save();

 $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/offers_images/', $name);
            $images[]=$name;
        }
    $images=implode("|",$images);
 
 $projimage=offer::select('images')->where('id',$id)->first();



if(empty($projimage->images)){
                        $projimage->images.=$images;

        }else{
                            $projimage->images.='|'.$images;

        }

        $offers->fill(['images' => $projimage->images])->save();
        }
     return Redirect::back()->withFlashMessage('تم التعديل');
    }





}
