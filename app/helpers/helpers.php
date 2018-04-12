<?php
function getSettings($setting_name = 'site_name')
{


//    $request=\Illuminate\Support\Facades\Request();
//    $request->forget('SETTING-'.$setting_name);
//    $request->attributes->add(['SETTING-'.$setting_name=>'test']);
//    $setting= \Illuminate\Http\Request::get('SETTING-'.$setting_name);
//    dd($setting);
//    if($setting){
//        return $setting;
//    }
    $setting=\App\SiteSettings::where('name_setting', $setting_name)->first();

//    $request->attributes->add(['SETTING-'.$setting_name=>$setting]);

    return (count($setting))?$setting->value:'';
}

function image_exist($image_name = '', $imagePath = '/public/building_images/', $url = '/building_images/')
{
    if($image_name != '')
{
        $path = base_path() . $imagePath . $image_name;
        if(file_exists($path)){
            return Request::root() . $url . $image_name;
        }
    }

    return getSettings('no_image');
}

function uploadImage($request, $path = '/public/building_images/', $width = '400', $height = '225', $delete_file = '')
{
    if($delete_file != '')
{
        deleteimage(base_path() . $path . '/' . $delete_file);
    }
    
    getimagesize($request);
    
    $file_name = $request->getClientOriginalName();
    
    $request->move(base_path() . $path, $file_name);
    
    if($width == '400' AND $height == '225')
{
        $thumbnail_path = base_path() . '/public/thumbnail';
        $new_thumbnail_path = $thumbnail_path . $file_name;

        \Intervention\Image\Facades\Image
            ::make(base_path() . $path . '/' . $file_name)
            ->resize('400', '225')
            ->save($new_thumbnail_path, 100);

        if($delete_file != '')
{
            deleteimage(base_path() . $path . '/' . $delete_file);
        }
    }

    return $file_name;
}

function building_type()
{
    $array = [
        'شقة',
        'فيلا',
        'شاليه'
    ];

    return $array;
}

function building_rent()
{
    $array = [
        'تمليك',
        'إيجار'
    ];

    return $array;
}

function status()
{
    $array = [
        'غير مفعل',
        'مفعل'
    ];

    return $array;
}

function room_numbers()
{
    $array = [];

    for($i = 2; $i <= 100; $i++){
        $array[$i] = $i;
    }

    return $array;
}

function field_name()
{
    return[
        'building_price' => 'سعر العقار',
        'rooms' => 'عدد الغرف',
        'building_type' => 'نوع العقار',
        'building_rent' => 'نوع العملية',
        'building_area' => 'المساحة',
        'building_price_from' => 'سعر العقار من',
        'building_price_to' => 'سعر العقار الي',
    ];
}

function contacts()
{
    return [
        '1' => 'خدمة العملاء',
        '2' => 'اقتراح'
    ];
}

function unread_message()
{
    return \App\Contact::where('contact_view', 0)->get();
}

function count_messages()
{
    return \App\Contact::where('contact_view', 0)->count();
}

function set_class($array, $class = 'active')
{
    if(!empty($array)){
        $segment_array = [];

        foreach ($array as $key => $url) {
            if(Request::segment($key+1) == $url)
{
                $segment_array[] = $key;
            }
        }

        if(count($segment_array) == count(Request::segments())){
            if(isset($segment_array[0])){
                return $class;
            }
        }
    }
}

function count_buildings($status, $user_id)
{
    return \App\Building::where('status', $status)->where('user_id', $user_id)->count();
}

function count_inactive_buildings($status)
{
    return \App\Building::where('status', $status)->count();
}

function FileImage($file,$folder_name,$input_name='image'){
    $path = '/img/'.$folder_name.'/' . date('Y/m/d').'/';
    if (!file_exists(public_path() . $path)) {
        File::makeDirectory(public_path() . $path, $mode = 0777, true, true);
    }
    if (!file_exists(public_path() . $path.'thumbnail')) {
        File::makeDirectory(public_path() . $path.'thumbnail', $mode = 0777, true, true);
    }
    //file new name
    $namefile = $folder_name.'_' . rand(0000, 9999) . '_' . time();
    //file extension
    $ext = $file->getClientOriginalExtension();
    //file old name
    $old_name = $file->getClientOriginalName();
    //convert the size of the file
    //$size = ImageUploader::GetSize($file->getSize());
    //get the mime type of the file
    $mimtype = $file->getMimeType();
    //making the new name with extension
    $mastername = $namefile . '.' . $ext;
    list($width, $height, $type, $attr) = getimagesize($_FILES[$input_name]['tmp_name']);
    $width_per=round(($width*10)/100);
    $height_per=round(($height*10)/100);
    $file->move(public_path() . $path, $mastername);
    Image::make(public_path() . $path  . $mastername, array(
        'width' => $width_per,
        'height' => $height_per,
    ))->save(public_path() . $path . 'thumbnail/thumbnail_' . $mastername);
    return array('img'=>$mastername,'img_dir'=>$path);
}
function FileImages($file,$folder_name,$x,$input_name='images'){
    $path = '/img/'.$folder_name.'/' . date('Y/m/d').'/';
    if (!file_exists(public_path() . $path)) {
        File::makeDirectory(public_path() . $path, $mode = 0777, true, true);
    }
    if (!file_exists(public_path() . $path.'thumbnail')) {
        File::makeDirectory(public_path() . $path.'thumbnail', $mode = 0777, true, true);
    }
    //file new name
    $namefile = $folder_name.'_' . rand(0000, 9999) . '_' . time();
    //file extension
    $ext = $file->getClientOriginalExtension();
    //file old name
    $old_name = $file->getClientOriginalName();
    //convert the size of the file
    //$size = ImageUploader::GetSize($file->getSize());
    //get the mime type of the file
    $mimtype = $file->getMimeType();
    //making the new name with extension
    $mastername = $namefile . '.' . $ext;
    list($width, $height, $type, $attr) = getimagesize($_FILES[$input_name]['tmp_name'][$x]);
    $width_per=round(($width*10)/100);
    $height_per=round(($height*10)/100);
    $file->move(public_path() . $path, $mastername);
    switch($folder_name){
        case'hotels':
            $imagesResize=[
                0=>['width'=>60,'height'=>60],
                1=>['width'=>260,'height'=>180],
                2=>['width'=>400,'height'=>200],
            ];
            break;
        case'flights':
            $imagesResize=[
                0=>['width'=>60,'height'=>60],
                1=>['width'=>260,'height'=>180],
                2=>['width'=>400,'height'=>200],
            ];
            break;
        default:
            $imagesResize=[];
            break;
    }
    foreach($imagesResize as $imageSize){
        $widthS=$imageSize['width'];
        $heightS=$imageSize['height'];
        Image::make(public_path() . $path  . $mastername, array(
            'width' => $widthS,
            'height' => $heightS,
        ))->save(public_path() . $path . 'thumbnail/'.$widthS.'_'.$heightS.'_' . $mastername);
    }
    Image::make(public_path() . $path  . $mastername, array(
        'width' => $width_per,
        'height' => $height_per,
    ))->save(public_path() . $path . 'thumbnail/thumbnail_' . $mastername);
    return array('img'=>$mastername,'img_dir'=>$path);
}