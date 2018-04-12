<?php
//Admin routes
Route::get('convert',function(){
    /*$allLocations=DB::select("SELECT projects.project_location as location FROM projects GROUP BY project_location");
    foreach ($allLocations as $location){
        $exist=DB::select("SELECT * FROM locations WHERE name='$location->location'");
        if(!count($exist)){
            $newLocation=new \App\Locations();
            $newLocation->name=$location->location;
            $newLocation->save();
        }
    }*/
    /*$projects=App\project::all();
    foreach ($projects as $project){
        $thisProject=App\project::find($project->id);
        $location=\App\Locations::where('name',$project->project_location)->first();
        //dd($location);
        $thisProject->project_location_id=$location->id;
        $thisProject->save();
    }*/
    /*$buildings=App\Building::all();
    foreach ($buildings as $building){
        $thisBuilding=App\Building::find($building->id);
        $location=\App\Locations::where('name',$building->building_location)->first();
        //dd($location);
        $thisBuilding->building_location_id=$location->id;
        $thisBuilding->save();
    }*/
});
Route::group(['middleware' => ['web', 'admin']], function (){
    //Users data
    Route::GET('adminpanel/users/data',[
        'as' => 'adminpanel/users/data',
        'uses' => 'UserController@anyData'
    ]);

    //Buildings data
    Route::GET('adminpanel/building/data',[
        'as' => 'adminpanel/building/data',
        'uses' => 'BuildingController@anyData',
    ]);

    //Contact data
    Route::GET('adminpanel/contact/data',[
        'as' => 'adminpanel/contact/data',
        'uses' => 'ContactController@anyData',
    ]);

    //Admin login
    Route::GET('adminpanel', 'AdminController@index');



    //Users list
    Route::RESOURCE('adminpanel/users', 'UserController');

    //Update password
    Route::POST('adminpanel/user/changepassword', 'UserController@updatePassword');

    //Delete user
    Route::GET('adminpanel/users/{id}/delete', 'UserController@destroy');


    //Site settings
    Route::GET('adminpanel/sitesettings', 'SiteSettingsController@index');


    Route::GET('adminpanel/sliders', 'SiteSettingsController@getsliders');
    Route::GET('adminpanel/sliders/{id}/edit', 'SiteSettingsController@editslider');
    Route::POST('adminpanel/sliders/{id}/edit', 'SiteSettingsController@updateslider');

    Route::GET('adminpanel/sliders/create', 'SiteSettingsController@addSlider');
    Route::POST('adminpanel/sliders', 'SiteSettingsController@addsliderpost');
    Route::POST('adminpanel/sliders/changeType', 'SiteSettingsController@changeTypeSlider');

    Route::GET('adminpanel/sliders/{id}/delete', 'SiteSettingsController@deleteslider');

    //Change site settings
    Route::POST('adminpanel/sitesettings', 'SiteSettingsController@store');

    //Buildings list
    Route::RESOURCE('adminpanel/building', 'BuildingController');

    Route::POST('adminpanel/building/addbuilding', 'BuildingController@store');


    //Buildings Statistics by year
    Route::GET('adminpanel/chart', 'AdminController@Chart');

    //Buildings Statistics
    Route::POST('adminpanel/chart', 'AdminController@YearChart');

    Route::POST('adminpanel/chart', 'ProjectController@checkEmail');




    //Activate building
    Route::GET('adminpanel/change-status/{id}/{status}', 'BuildingController@ActivateBuilding');

    //Delete buildings
    Route::GET('adminpanel/building/{id}/delete', 'BuildingController@destroy');


    Route::GET('adminpanel/news/{id}/delete', 'NewsController@destroy');



    Route::GET('adminpanel/offers/{id}/delete', 'OffersController@destroy');

    Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

	Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);



    //Emails list
    Route::RESOURCE('adminpanel/contact', 'ContactController');

    //Delete emails
    Route::GET('adminpanel/contact/{id}/delete', 'ContactController@destroy');
});
//project routes

    Route::GET('adminpanel/addproject', 'ProjectController@createproject');
    //add project
    Route::POST('adminpanel/addproject', 'ProjectController@addproject');

    Route::GET('adminpanel/homeFetcher1', 'SiteSettingsController@homeFetcher1');
    Route::post('adminpanel/homeFetcher1', 'SiteSettingsController@homeFetcher1Post');
    Route::GET('adminpanel/homeFetcher2', 'SiteSettingsController@homeFetcher2');
    Route::post('adminpanel/homeFetcher2', 'SiteSettingsController@homeFetcher2Post');

    Route::resource('adminpanel/testimonial','TestimonialController');
    Route::resource('adminpanel/locations','LocationsController');



    Route::GET('adminpanel/addnews', 'NewsController@createnews');
    //add news
    Route::POST('adminpanel/addnews', 'NewsController@addnews');

    Route::GET('adminpanel/all-news', 'NewsController@getnews');


    Route::GET('adminpanel/all-news/{id}/edit', 'NewsController@editnew');
    Route::POST('adminpanel/all-news/{id}/edit', 'NewsController@editnews');


    Route::GET('adminpanel/clients', 'SiteSettingsController@getclients');
    Route::GET('adminpanel/deleteimg/{name}', 'SiteSettingsController@deleteimg');
    Route::GET('adminpanel/deleteimgsli/{name}/{id}', 'SiteSettingsController@deleteimgslider');
    Route::GET('adminpanel/deleteimg/{name}/{id}', 'SiteSettingsController@deleteimgproj');
    Route::GET('adminpanel/deleteimgb/{name}/{id}', 'SiteSettingsController@deleteimgbuild');


	    Route::GET('adminpanel/deleteimgo/{name}/{id}', 'SiteSettingsController@deleteimgoffer');
    Route::GET('adminpanel/deleteimgn/{name}/{id}', 'SiteSettingsController@deleteimgnews');



    Route::POST('adminpanel/addclients', 'SiteSettingsController@addclients');


    Route::GET('adminpanel/addoffer', 'OffersController@createoffer');
    //add offer
    Route::POST('adminpanel/addoffer', 'OffersController@addoffer');

    Route::GET('adminpanel/all-offers', 'OffersController@getoffers');

    Route::GET('adminpanel/all-offers/{id}/edit', 'OffersController@editoff');
    Route::POST('adminpanel/all-offers/{id}/edit', 'OffersController@editoffer');




    //projects
    Route::GET('adminpanel/projects', 'ProjectController@displayprojects');

    Route::GET('adminpanel/projects/addlevel', 'ProjectController@addlevel');
    Route::POST('adminpanel/addlevel', 'ProjectController@addonelevel');


    Route::GET('adminpanel/projects/{id}/delete', 'ProjectController@deletepro');
    Route::GET('adminpanel/projects/{id}/edit', 'ProjectController@editpro');
    Route::POST('adminpanel/projects/{id}/edit', 'ProjectController@editproject');




//User routes

//Landing page

Route::GET('/', 'ProjectController@home_vars');

//Home page
Route::GET('/home', 'HomeController@index');

//Buildings routes

//Show all buildings
Route::GET('الوحدات', 'BuildingController@showAllEnabled');




Route::GET('المشروعات', 'ProjectController@showAll');


Route::GET('project-steps', 'ProjectController@showAllsteps');

//Show for-rent buildings
Route::GET('for-rent', 'BuildingController@forRent');

//Show for-buy buildings
Route::GET('for-buy', 'BuildingController@forBuy');

//Show buildings according to type
Route::GET('type/{type}', 'BuildingController@Type');

//Search buildings
Route::GET('search', 'BuildingController@Search');

//Show inactive buildings
Route::GET('user/inactive-building', 'BuildingController@InactiveBuilding');

Route::GET('تواصل-معنا', 'ProjectController@contactus');

Route::GET('/العروض', 'OffersController@getofferstemp');
Route::GET('العروض/{id}', 'OffersController@Singleoffer');

Route::GET('/اخر-الاخبار', 'NewsController@getnewstemp');
Route::GET('اخر-الاخبار/{id}', 'NewsController@Singlenews');

//Show single building
Route::GET('المشروعات/{id}', 'ProjectController@Singleproject');

Route::GET('الوحدات/{projectbu}/{nameurl}', 'BuildingController@SingleBuilding');




Route::GET('steps/{id}', 'ProjectController@Steps');


Route::GET('المشروعات-السابقة', 'ProjectController@prework');
Route::GET('عن-الشركه', 'SiteSettingsController@about');
Route::GET('تسجيل', 'SiteSettingsController@sigin');



//Get AJAX information
Route::GET('ajax/building/information', 'BuildingController@GetAjaxInformation');

//Contact Us
Route::GET('contact', 'ContactController@Contact');

Route::POST('contactuss', 'ContactController@store');


//Contact Us
Route::POST('contact', 'ContactController@store');

Route::POST('contacthome', 'ContactController@storecon');


Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'PropertiesController@myformAjax'));
Route::get('myform/ajax1/{id}',array('as'=>'myform.ajax','uses'=>'PropertiesController@myformAjax1'));


Route::GET('changelanguage', 'LanguageController@changelanguage');


//Add building
Route::GET('user/add/building', 'BuildingController@UserAddBuilding');
Route::POST('user/add/building', 'BuildingController@UserStore');
Route::POST('user/add/building/addbuilding', 'BuildingController@UserStore');

//User's building
Route::GET('user/my-buildings', 'BuildingController@ShowUserBuilding');

//Edit user
Route::GET('user/edit', 'UserController@EditUser')->middleware('auth');

//Update user
Route::PATCH('user/edit',[
    'as' => 'user/edit',
    'uses' => 'UserController@UpdateUser',
])->middleware('auth');

//Change password
Route::POST('user/change-password', 'UserController@ChangePassword')->middleware('auth');

//Edit inactive building
Route::GET('user/edit/building/{id}', 'BuildingController@UserEditBuilding')->middleware('auth');
Route::PATCH('user/update/building', 'BuildingController@UserUpdateBuilding')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');





//template:
Route::GET('/template', function () {
    return view('front_temp/welcome');
});







//Authentication routes
Auth::routes();