<?php

namespace App\Http\Controllers;

use App\Locations;
use App\User;
use App\Building;
use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;

class BuildingController extends Controller
{
    public function index()
    {
        
        return view('admin/building/index');
    }

    public function create()
    {
        $projects=DB::table('projects')->orderBy('id', 'desc')->get();
        $locations=Locations::all();
        return view('admin/building/add',compact("projects",'locations'));
    }


    public function createproject()
    {
        return view('admin/building/addproject');
    }

 

    public function store(Request $request)
    {

        $geturls = building::where('nameurl', $request->nameurl)->get();
        if(count($geturls)){
        return Redirect::back()->with('msg', 'يرجي استخدام اسم اخر');
        }else{


 $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/building_images/', $name);
            $images[]=$name;
        }
    }
    $images=implode("|",$images);
        Building::create([
            'building_name'  => $request->building_name,
            'building_location_id'  => $request->building_location_id,
            'building_price'  => $request->building_price,
            'building_rent'  => $request->building_rent,
            'building_area'  => $request->building_area,
            'building_type'  => $request->building_type,
            'building_small_description' => $request->building_small_description,
            'building_meta'  => $request->building_meta,
            'building_large_description' => $request->building_large_description,
            'user_id' => Auth::user()->id,
            'rooms'  => $request->rooms,
            'baths'  => $request->baths,
            'project_id'  => $request->project_id,
            'status' => $request->status,
            'image' => $images,
            'month' => date('m'),
            'year' => date('Y'),
            'nameurl' => $request->nameurl,
        ]);

        return redirect('/adminpanel/building')->withFlashMessage('تم إضافة بيانات العقار بنجاح');
    }
    }



    public function addproject(Request $request)
    {
        if($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $request
                ->file('image')
                ->move(base_path() . '/public/building_images/', $file_name);
            $image = $file_name;
        }

        else{
            $image = '';
        }
        

        project::create([
            'project_name'  => $request->project_name,
            'project_location_id'  => $request->project_location_id,
            'project_area'  => $request->project_area,
            'project_small_description' => $request->project_small_description,
            'project_meta'  => $request->project_meta,
            'project_large_description' => $request->project_large_description,
            'floors'  => $request->floors,
            'images' => $image,
        ]);

        return redirect('/adminpanel/projects')->withFlashMessage('تم إضافة بيانات المشروع بنجاح');
    }




    public function displayprojects()
    {
        $projects=DB::table('projects')->orderBy('id', 'desc')->get(); 

        return view('/admin/projects/projects',compact("projects")); 
    }








    public function edit($id)
    {

        $building = Building::find($id);
        $user = User::where('id', $building->user_id)->first();
        $projects=DB::table('projects')->orderBy('id', 'desc')->get();   
        $photoArray = explode("|",$building->image);
        $locations=Locations::all();
        return view('admin/building/edit', compact('building', 'user','projects','photoArray','locations'));
    }




public function update($id, Request $request)
    {


      $geturls = building::where([
       ['nameurl', '=', $request->nameurl],
       ['id', '!=', $id],
       ])->get();

        if(count($geturls)){
        return Redirect::back()->with('msg', 'يرجي استخدام اسم اخر');
        }else{

        $building = Building::find($id);
        $building->fill(array_except($request->all(), ['images']))
                 ->save();
 $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/building_images/', $name);
            $images[]=$name;
        }
    $images=implode("|",$images);

        $unitimage=building::select('image')->where('id',$id)->first();
if(empty($unitimage->image)){
        $unitimage->image.=$images;
        }else{
        $unitimage->image.='|'.$images;
        }

        $building->fill(['image' => $unitimage->image])->save();
        }
   return Redirect::back()->withFlashMessage('تم تعديل النموزج بنجاح');
   }
    }











    public function destroy($id)
    {
        Building::find($id)
            ->delete();

        return redirect('adminpanel/building')->withFlashMessage('تم حذف العقار بنجاح');
    }

    public function anyData()
    {
   
        return Datatables::of(Building::all())
            ->editColumn('building_name', function($model){
                return
                    '<a href="' . url('adminpanel/building/' . $model->id . '/edit') . '">'
                        . $model->building_name .
                    '</a>';
            })

      /*      ->editColumn('building_type', function($model){
                $type = building_type();
                return '<span class="badge badge-info">' . $type[$model->building_type] . '</span>';
            })
*/
            ->editColumn('status', function($model){
                return $model->status === 0
                    ? '<span class="badge badge-warning">غير مفعل</span>'
                    : '<span class="badge badge-success">مفعل</span>';
            })
            ->editColumn('control', function($model){
                return
                    '<a href="'.url('adminpanel/building/' . $model->id . '/edit').'" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>' . ' ' .
                    '<a href="'.url('adminpanel/building/' . $model->id . '/delete').'" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                    </a>';
            })
            ->escapeColumns([])

            ->make(TRUE);
    }

    public function showAllEnabled(Request $request)
    {

        \App::setLocale(\Session::get('locale'));

        
        $data=$request->input();
        $appends=[];
        $tagsHtml='';
        $allBuildings = Building::with('project')->where('status', 1);
        if(!empty($data['location_id'])){
            $location=Locations::find($data['location_id']);
            if(count($location)){
                $allBuildings=$allBuildings->where('building_location_id',$data['location_id']);
                $appends['location_id']=$data['location_id'];
                $tagsHtml.='<li class="main-listing__tag"><span class="main-listing__tag-label">'.Lang::get('home.location').':</span>'.$location->name.'<a href="#" id="removeLocation" tagname="location_id" class="removeTag main-listing__tag-close">&times;</a></li><!-- .main-listing__tag -->';
            }
        }
        if(!empty($data['keyword'])){
            $keyword=$data['keyword'];
            $allBuildings=$allBuildings->where(function($q)use($keyword){
                $q->where('building_name','LIKE',"%$keyword%")
                    ->orWhere('building_small_description','LIKE',"%$keyword%")
                    ->orWhere('building_large_description','LIKE',"%$keyword%");
            });
            $appends['keyword']=$data['keyword'];
            $tagsHtml.='<li class="main-listing__tag"><span class="main-listing__tag-label">'.Lang::get('home.keyword').':</span>'.$data['keyword'].'<a href="#" id="removeKeyword" tagname="keyword" class="removeTag main-listing__tag-close">&times;</a></li><!-- .main-listing__tag -->';
        }
        if(!empty($data['rooms'])&&$data['rooms']!='All'){
            $allBuildings=$allBuildings->where('rooms',$data['rooms']);
            $appends['rooms']=$data['rooms'];
            $tagsHtml.='<li class="main-listing__tag"><span class="main-listing__tag-label">'.Lang::get('home.rooms').':</span>'.$data['rooms'].'<a href="#" id="removeRooms" tagname="rooms" class="removeTag main-listing__tag-close">&times;</a></li><!-- .main-listing__tag -->';
        }
        if(!empty($data['baths'])&&$data['baths']!='All'){
            $allBuildings=$allBuildings->where('baths',$data['baths']);
            $appends['baths']=$data['baths'];
            $tagsHtml.='<li class="main-listing__tag"><span class="main-listing__tag-label">'.Lang::get('home.baths').':</span>'.$data['baths'].'<a href="#" id="removeBaths" tagname="baths" class="removeTag main-listing__tag-close">&times;</a></li><!-- .main-listing__tag -->';
        }
        if(!empty($data['min_year'])&&!empty($data['max_year'])&&$data['min_year']!=0&&$data['max_year']!=0){
            $allBuildings=$allBuildings->whereBetween('year',[$data['min_year'],$data['max_year']]);
            $appends['min_year']=$data['min_year'];
            $appends['max_year']=$data['max_year'];
            $tagsHtml.='<li class="main-listing__tag"><span class="main-listing__tag-label">'.Lang::get('home.min_year').'-'.Lang::get('home.max_year').':</span>'.$data['min_year'].'-'.$data['max_year'].'<a href="#" id="removeMinMaxYear"  class="main-listing__tag-close">&times;</a></li><!-- .main-listing__tag -->';
        }

        $allBuildings=$allBuildings->orderBy('id', 'desc')
                                ->paginate(10);
        $allBuildings->appends($appends);
        $locations=Locations::all();
        return view('front-end/building/all', compact('allBuildings','locations','tagsHtml'));
    }

    public function forRent()
    {
        $allBuildings = Building::where('status', 1)
                                ->where('building_rent', 1)
                                ->orderBy('id', 'desc')
                                ->paginate(9);

        return view('front-end/building/all', compact('allBuildings'));
    }

    public function forBuy()
    {
        $allBuildings = Building::where('status', 1)
                                ->where('building_rent', 0)
                                ->orderBy('id', 'desc')
                                ->paginate(9);

        return view('front-end/building/all', compact('allBuildings'));
    }

    public function Type($type)
    {
        if (in_array($type, ['0', '1', '2'])){
            $allBuildings = Building::where('status', 1)
                                    ->where('building_type', $type)
                                    ->orderBy('id', 'desc')
                                    ->paginate(9);

            return view('front-end/building/all', compact('allBuildings'));
        }else{
            return view('404');
        }
    }

    public function Search(Request $request)
    {
        $requestAll = array_except($request->toArray(), ['submit', '_token', 'page']);
        $query = DB::table('buildings')->join('projects', 'buildings.project_id', '=', 'projects.id')

                   ->select('*');
        $array = [];
        $count = $requestAll;
        $i = 0;

        foreach ($requestAll as $key => $req) {
            $i++;

            if($req != ''){
                        $query->where($key, $req);

                $array[$key] = $req;
            }
        }

        $allBuildings = $query->paginate(9);

        return view('front-end/building/all', compact('allBuildings', 'array'));
    }

    public function SingleBuilding($projectbu,$id)
    {
        \App::setLocale(\Session::get('locale'));

        
        $upd=Building::where('id', 11)->update(['project_id' => 9]);
        $building_info = Building::with('project')->where('nameurl', $id)->orWhere('id',$id)->first();
if(isset($building_info)){
        if($building_info->status == 0){
            $message_title = 'لم يتم الموافقة علي هذا العقار بعد';
            $message_body  = '"' . $building_info->name .'"' . 'يجب انتظار الإدارة حتي توافق علي العقار ';

            return view(
                'front-end/building/inactive',
                compact('building_info', 'message_title', 'message_body')
            );
        }

        $same_rent = Building::where('building_rent', $building_info->building_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = Building::where('building_type', $building_info->building_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
}
        return view('front-end/building/single', compact('building_info', 'same_rent', 'same_type'));
    }

    public function GetAjaxInformation(Request $request)
    {
        return Building::find($request->id)->toJson();
    }

    public function UserAddBuilding()
    {
        return view('user-building/add');
    }








    public function UserStore(Request $request)
    {
          if($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $request
                ->file('image')
                ->move(base_path() . '/public/building_images/', $file_name);
            $image = $file_name;
        }

        else{
            $image = '';
        }

        $user = Auth::user() ? Auth::user()->id : 0;

      Building::create([
            'building_name'  => $request->building_name,
            'building_price' => $request->building_price,
            'building_rent'  => $request->building_rent,
            'building_area'  => $request->building_area,
            'building_type'  => $request->building_type,
            'building_large_description' => strip_tags(str_limit($request->building_large_description, 160)),
            'building_meta'  => $request->building_meta,
            'user_id' => $user,
            'rooms'  => $request->rooms,
            'image' => $image,
            'month' => date('m'),
            'year' => date('Y')
        ]);



        return view('user-building/done');

    }
















    public function ShowUserBuilding()
    {
        $user = Auth::user();
        $building = Building::where('user_id', $user->id)->where('status', 1)->paginate(9);
        return view('user-building/my-building', compact('building', 'user'));
    }

    public function InactiveBuilding()
    {
        $user = Auth::user();
        $building = Building::where('user_id', $user->id)->where('status', 0)->paginate(9);
        return view('user-building/my-building', compact('building', 'user'));
    }

    public function UserEditBuilding($id)
    {
        $user = Auth::user();
        $building_info = Building::find($id);

        if($user->id != $building_info->user_id){
            $message_title = 'هذا العقار لم يتم إضافته';
            $message_body = 'يجب انتظار الإدارة حتي توافق علي العقار ' .  '"' . $building_info->building_name . '"';

            return view(
                'front-end/building/inactive',
                compact('building_info', 'message_title', 'message_body')
            );
        }

        $building = $building_info;

        return view('user-building/edit', compact('building', 'user'));
    }

    public function UserUpdateBuilding(Request $request)
    {
        $building = Building::find($request->building_id);

        $building->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم تعديل العقار بنجاح');
    }

    public function ActivateBuilding($id, $status)
    {
        Building::find($id)
                ->fill(['status' => $status])
                ->save();

        return Redirect::back()->withFlashMessage('تم تغير حالة العقار');
    }
}