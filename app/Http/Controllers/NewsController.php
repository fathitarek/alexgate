<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\news;
class NewsController extends Controller
{
      public function createnews()
    {
        return view('admin/news/addnews');
    }



 public function addnews(Request $request)
    {
     $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/news_images/', $name);
            $images[]=$name;
        }
    }
    $images=implode("|",$images);

        news::create([
            'news_title'  => $request->news_title,
            'small_description' => $request->small_description,    
            'news_description' => $request->news_description,    
            'images' => $images

        ]);

        return redirect('/adminpanel/all-news')->withFlashMessage('تم إضافة بيانات الخبر بنجاح');
    }


    public function getnews()
    {
        $news=news::orderBy('id', 'desc')->get(); 

        return view('/admin/news/news',compact("news")); 
    }

        public function getnewstemp()
    {
        \App::setLocale(\Session::get('locale'));

        $news=news::orderBy('id', 'desc')->paginate(9); 

        return view('/front-end/news/news',compact("news")); 
    }


   public function Singlenews($id)
    {
        \App::setLocale(\Session::get('locale'));
        $news_info = news::findOrFail($id);
        if(count($news_info)){
            $next=news::where('id','>',$id)->first();
            $previous=news::where('id','<',$id)->first();
            $relatedNews=news::where('id','!=',$id)->take(2)->get();
            return view('front-end/news/singlenews', compact('news_info','next','previous','relatedNews'));
        }else{
            return abort(404);
        }

    }



    public function destroy($id)
    {
        news::find($id)
            ->delete();

        return redirect('adminpanel/all-news')->withFlashMessage('تم حذف الخبر بنجاح');
    }

       public function editnew(news $id)
    {

     $news_info = DB::table('news')->where('id', $id->id)->first();

     return view('admin/news/edit',compact('news_info'));    
    }











   public function editnews(Request $request,$id)
    {
     $news = news::find($id);
    $news->fill(array_except($request->all(),['images']))
                 ->save();

 $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move(base_path() . '/public/news_images/', $name);
            $images[]=$name;
        }
    $images=implode("|",$images);
 
 $projimage=news::select('images')->where('id',$id)->first();



if(empty($projimage->images)){
                        $projimage->images.=$images;

        }else{
                            $projimage->images.='|'.$images;

        }

        $news->fill(['images' => $projimage->images])->save();
        }
     return Redirect::back()->withFlashMessage('تم التعديل');
    }
}
