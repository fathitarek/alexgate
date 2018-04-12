<?php
namespace App\Http\Controllers;
use App\Building;
use App\Locations;
use App\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\project;
use App\Level;
use App\slider;
use App\clients;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    public function __constructor(){

    }
    public function createproject()
    {
        $locations=Locations::all();
        return view('admin/projects/addproject',compact('locations'));
    }
    public function addproject(Request $request)
    {
        $geturls = project::where('nameurl', $request->nameurl)->get();
        if(count($geturls)){
            return Redirect::back()->with('msg', 'يرجي استخدام اسم اخر');
        }else{
            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move(base_path() . '/public/project_images/', $name);
                    $images[]=$name;
                }
            }
            $images=implode("|",$images);
            if($request->chk1){
                $features=implode($request->chk1, '|');
            }else{
                $features='';
            }
            project::create([
                'project_name'  => $request->project_name,
                'project_location_id'  => $request->project_location_id,
                'project_area'  => $request->project_area,
                'project_features'  => $features,
                'project_small_description' => $request->project_small_description,
                'project_meta'  => $request->project_meta,
                'project_large_description' => $request->project_large_description,
                'project_status' => $request->project_status,
                'featured_project' => $request->featured,
                'garage' => $request->garage,
                'floors'  => $request->floors,
                'images' => $images,
                'pay_methods' => $request->pay_methods,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'nameurl' => $request->nameurl,
            ]);
            return redirect('/adminpanel/projects')->withFlashMessage('تم إضافة بيانات المشروع بنجاح');
        }
    }
    public function displayprojects()
    {

        $projects=project::withCount('levels')->withCount('buildings')->orderBy('id', 'desc')->get();
        return view('/admin/projects/projects',compact("projects"));
    }
    public function deletepro($id)
    {
        project::find($id)->delete();
        return redirect('/adminpanel/projects')->withFlashMessage('تم مسح المشروع بنجاح');
    }
    public function editpro(project $id)
    {
        $project_info = DB::table('projects')->where('id', $id->id)->first();
        $locations=Locations::all();
        return view('admin/projects/edit',compact('project_info','locations'));
    }
    public function checkEmail(Request $request){
        $email = $request->nameurl;
        $isExists = project::where('nameurl',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
    public function editproject(Request $request,$id)
    {
        $geturls = project::where([
            ['nameurl', '=', $request->nameurl],
            ['id', '!=', $id],
        ])->get();
        if(count($geturls)){
            return Redirect::back()->with('msg', 'يرجي استخدام اسم اخر');
        }else{
            $project = project::find($id);
            $project->fill(array_except($request->all(),['images']))
                ->save();
            if($request->chk1){
                $featuresp=implode("|",$request->chk1);
                $project->fill(['project_features' => $featuresp])->save();
            }
            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move(base_path() . '/public/project_images/', $name);
                    $images[]=$name;
                }
                $images=implode("|",$images);
                $projimage=project::select('images')->where('id',$id)->first();
                if(empty($projimage->images)){
                    $projimage->images.=$images;
                }else{
                    $projimage->images.='|'.$images;
                }
                $project->fill(['images' => $projimage->images])->save();
            }
            return Redirect::back()->withFlashMessage('تم التعديل');
        }
    }
    public function addlevel()
    {
        $projects=DB::table('projects')->orderBy('id', 'desc')->get();
        return view('admin/projects/addlevel',compact("projects"));
    }
    public function home_vars()
    {
        \App::setLocale(\Session::get('locale'));
        $sliders=slider::where('status',1)->get();
        $allprojects = project::where('project_status',0)->orderBy('id', 'desc')->get();
        $clients=clients::take('5')->orderBy('id', 'desc')->get();
        $newBuildings=Building::with('project')->take('6')->orderBy('id', 'desc')->get();
        return view('front_temp/welcome',compact("sliders","allprojects","clients","newBuildings"));
    }
    public function addonelevel(Request $request)
    {
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(base_path() . '/public/level_images/', $name);
                $images[]=$name;
            }
        }
        $images=implode("|",$images);
        Level::create([
            'level_name'  => $request->level_name,
            'level_small_description' => $request->level_small_description,
            'level_large_description' => $request->level_large_description,
            'images' => $images,
            'user_id' => Auth::user()->id,
            'project_id'  => $request->project,
        ]);
        return redirect('/adminpanel/projects/addlevel')->withFlashMessage('تم إضافة المرحله بنجاح');
    }
//---------------user------------
    public function showAll()
    {
                \App::setLocale(\Session::get('locale'));

        $allprojects = project::withCount('buildings')->where('project_status', '0')->orderBy('id', 'desc')->paginate(9);
        return view('front-end/project/all', compact('allprojects'));
    }
    public function prework()
    {
        $allprojects = project::withCount('buildings')->where('project_status', '1')->orderBy('id', 'desc')
            ->paginate(9);
        return view('front-end/project/prework', compact('allprojects'));
    }
    public function contactus()
    {
        \App::setLocale(\Session::get('locale'));
        return view('front-end/contact');
    }
    public function showAllsteps()
    {
        $allprojects = project::withCount('buildings')->orderBy('id', 'desc')
            ->paginate(9);
        return view('front-end/project/all-steps', compact('allprojects'));
    }
    public function SingleProject($id)
    {
                \App::setLocale(\Session::get('locale'));

        $project_info = project::with('buildings')->with('levels')->where('nameurl', $id)->first();
        return view('front-end/project/single', compact('project_info'));
    }
    public function Steps($id)
    {
        $project_steps = project::with('buildings')->with('levels')->findOrFail($id);
        return view('front-end/project/steps', compact('project_steps'));
    }
}
