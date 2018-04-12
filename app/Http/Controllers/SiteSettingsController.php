<?php
namespace App\Http\Controllers;
use App\HomeFetcher1;
use App\HomeFetcher2;
use App\SiteSettings;
use App\clients;
use App\project;
use App\Building;
use App\slider;
use App\offer;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class SiteSettingsController extends Controller
{
    public function index(SiteSettings $siteSettings)
    {
        SiteSettings::where('id', 11)
            ->update(['name_setting' => 'Boss_Message']);
        SiteSettings::where('id', 13)
            ->update(['name_setting' => 'Our_Vision']);
        $siteSettings = $siteSettings->whereNotIn('id',[19,20])->get();
        return view('admin/sitesettings/index', compact('siteSettings'));
    }
    public function about(){
         \App::setLocale(\Session::get('locale'));
        return view('/about-us');
    }
    public function sigin(){

                        \App::setLocale(\Session::get('locale'));

        return view('/signin');
    }
    public function store(Request $request)
    {
        foreach (array_except($request->toArray(), ['_token', 'submit']) as $key => $req) {
            $siteSettingsUpdate = SiteSettings::where('name_setting', $key)->first();
            if($siteSettingsUpdate != NULL){
                if(SiteSettings::all()->where('type', '!=', 2)){
                    $siteSettingsUpdate->fill(['value' => $req])->save();
                }else{
                    $file_name = uploadImage($req, 'public/banner/', '1600', '500', base_path().'/public/banner/'.$siteSettingsUpdate->value);
                    if($file_name){
                        $siteSettingsUpdate->fill(['value' => $file_name])->save();
                    }
                }
            }
        }
        return Redirect::back()->withFlashMessage('تم تعديل البيانات بنجاح');
    }
    public function getclients(){
        $images = clients::get();
        return view('admin/sitesettings/clients', compact('images'));
    }
    public function deleteimg($name){
        $path = 'clients/';
        clients::where('image',$name)->delete();
        unlink( $path . $name);
        return Redirect::back();
    }
    public function deleteimgslider($name,$id){
        $path = 'sliders/';
        $sliderimg=slider::select('image')->where('id',$id)->first();
        slider::where('id',$id)->update(['image' => '']);
        unlink($path . $name);
        return Redirect::back();
    }
    public function deleteimgproj($name,$id){
        $path = 'project_images/';
        $projectimage=project::select('images')->where('id',$id)->first();
        if(count(explode('|', $projectimage->images))==2){
            $replaced = str_replace($name, '', $projectimage->images);
            $replaced = str_replace('|', '', $replaced);
        }
        elseif (count(explode('|', $projectimage->images)) > 2){
            $replaced = str_replace($name, '', $projectimage->images);
            if($replaced[0]=='|'){
                $replaced=str_replace_first('|','',$replaced);
            }
            elseif(substr($replaced, -1) =='|'){
                $replaced=substr($replaced, 0, -1).'';
            }
            else{
                $replaced = str_replace('||', '|', $replaced);
            }}
        else{
            $replaced = str_replace($name, '', $projectimage->images);
        }
        project::where('id',$id)->update(['images' => $replaced]);
        unlink( $path . $name);
        return Redirect::back();
    }
    public function deleteimgbuild($name,$id){
        $path = 'building_images/';
        $unitimage=building::select('image')->where('id',$id)->first();
        if(count(explode('|', $unitimage->image))==2){
            $replaced = str_replace($name, '', $unitimage->image);
            $replaced = str_replace('|', '', $replaced);
        }
        elseif (count(explode('|', $unitimage->image)) > 2){
            $replaced = str_replace($name, '', $unitimage->image);
            if($replaced[0]=='|'){
                $replaced=str_replace_first('|','',$replaced);
            }
            elseif(substr($replaced, -1) =='|'){
                $replaced=substr($replaced, 0, -1).'';
            }
            else{
                $replaced = str_replace('||', '|', $replaced);
            }}
        else{
            $replaced = str_replace($name, '', $unitimage->image);
        }
        building::where('id',$id)->update(['image' => $replaced]);
        unlink( $path . $name);
        return Redirect::back();
    }
    public function deleteimgoffer($name,$id){
        $path = 'offer_images/';
        $unitimage=offer::select('images')->where('id',$id)->first();
        if(count(explode('|', $unitimage->images))==2){
            $replaced = str_replace($name, '', $unitimage->images);
            $replaced = str_replace('|', '', $replaced);
        }
        elseif (count(explode('|', $unitimage->images)) > 2){
            $replaced = str_replace($name, '', $unitimage->images);
            if($replaced[0]=='|'){
                $replaced=str_replace_first('|','',$replaced);
            }
            elseif(substr($replaced, -1) =='|'){
                $replaced=substr($replaced, 0, -1).'';
            }
            else{
                $replaced = str_replace('||', '|', $replaced);
            }}
        else{
            $replaced = str_replace($name, '', $unitimage->images);
        }
        offer::where('id',$id)->update(['images' => $replaced]);
        unlink( $path . $name);
        return Redirect::back();
    }
    public function deleteimgnews($name,$id){
        $path = 'news_images/';
        $unitimage=news::select('images')->where('id',$id)->first();
        if(count(explode('|', $unitimage->images))==2){
            $replaced = str_replace($name, '', $unitimage->images);
            $replaced = str_replace('|', '', $replaced);
        }
        elseif (count(explode('|', $unitimage->images)) > 2){
            $replaced = str_replace($name, '', $unitimage->images);
            if($replaced[0]=='|'){
                $replaced=str_replace_first('|','',$replaced);
            }
            elseif(substr($replaced, -1) =='|'){
                $replaced=substr($replaced, 0, -1).'';
            }
            else{
                $replaced = str_replace('||', '|', $replaced);
            }}
        else{
            $replaced = str_replace($name, '', $unitimage->images);
        }
        news::where('id',$id)->update(['images' => $replaced]);
        unlink( $path . $name);
        return Redirect::back();
    }
    public function addclients(Request $request)
    {
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(base_path() . '/public/clients/', $name);
                $images[]=$name;
                $imgclients=clients::where('image',$name)->get();
                if(count($imgclients)){
                } else{
                    clients::create([
                        'image'  => $name
                    ]);
                }
            }
        }
        return redirect('/adminpanel/clients')->withFlashMessage('تم إضافة بيانات المشروع بنجاح');
    }
    /*    public function home_images(){
            $siteSettings = $siteSettings->all();
           $projects = SiteSettings::select('value')->where('id', 11) ->get();
        }
        */
    public function getsliders(){
        $sliderTypes=SiteSettings::find(19);
        $sliderIds=SiteSettings::find(20);
        $buildings=building::all();
        $sliders = slider::get();
        return view('admin/sitesettings/sliders', compact('sliders','sliderTypes','sliderIds','buildings'));
    }
    public function changeTypeSlider(Request $request){
        $sliderTypes=SiteSettings::find(19);
        $sliderIds=SiteSettings::find(20);
        $sliderTypes->value=$request->input('slider_type');
        $slider_ids=$request->input('slider_ids');
        $sliderIds->value=($slider_ids)?json_encode($slider_ids):json_encode([]);
        $sliderTypes->save();
        $sliderIds->save();
        return redirect('adminpanel/sliders')->withFlashMessage('تم التعديل');
    }
    public function addSlider(){
        return view('admin/sitesettings/add_slider');
    }
    public function addsliderpost(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'url_link' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('adminpanel/sliders/create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $slider=new slider();
            $slider->fill(array_except($request->all(), ['image']))
                ->save();
            if($file=$request->file('image')){
                $name=$file->getClientOriginalName();
                $file->move(base_path() . '/public/sliders/', $name);
                $slider->fill(['image' => $name])->save();
            }
            return redirect('adminpanel/sliders')->withFlashMessage('تم الاضافة');
        }

    }
    public function editslider(slider $id)
    {
        $slider_info = slider::where('id', $id->id)->first();
        return view('admin/sitesettings/single_slider',compact('slider_info'));
    }
    public function updateslider(Request $request,$id)
    {
        $slider = slider::find($id);
        $slider->fill(array_except($request->all(), ['image']))
            ->save();
        $slider->where('id', $id)
            ->update(array('status' => $request->status));
        $images=array();
        if($file=$request->file('image')){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/sliders/', $name);
            $slider->fill(['image' => $name])->save();
        }
        return redirect('adminpanel/sliders')->withFlashMessage('تم التعديل');
    }
    public function deleteslider($id)
    {
        slider::find($id)
            ->delete();
        return redirect('adminpanel/sliders')->withFlashMessage('تم حذف السلايدر بنجاح');
    }
    public function homeFetcher1(){
        $homeFetcher1=HomeFetcher1::all();
        return view('admin.sitesettings.home_fetcher_1',compact('homeFetcher1'));

    }
    public function homeFetcher1Post(Request $request){
        $data=$request->input();
        //dd($data);
        foreach ($data['icon'] as $key=>$val){
            $homeFetcher1=HomeFetcher1::find($key);
            if(count($homeFetcher1)){
                $homeFetcher1->icon=$data['icon'][$key];
                $homeFetcher1->icon_hover=$data['icon_hover'][$key];
                $homeFetcher1->icon_link=$data['icon_link'][$key];
                $homeFetcher1->title=$data['title'][$key];
                $homeFetcher1->description=$data['description'][$key];
                $homeFetcher1->save();
            }
        }
        return redirect('adminpanel/homeFetcher1')->withFlashMessage('تم التعديل بنجاح');
    }
    public function homeFetcher2(){
        $homeFetcher2=HomeFetcher2::all();
        return view('admin.sitesettings.home_fetcher_2',compact('homeFetcher2'));

    }
    public function homeFetcher2Post(Request $request){
        $data=$request->input();
        //dd($data);
        foreach ($data['html'] as $key=>$val){
            $homeFetcher1=HomeFetcher1::find($key);
            if(count($homeFetcher1)){
                $homeFetcher1->html=$data['html'][$key];
                $homeFetcher1->save();
            }
        }
        return redirect('adminpanel/homeFetcher2')->withFlashMessage('تم التعديل بنجاح');
    }
}
