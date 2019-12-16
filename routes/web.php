<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/settings', function(){
    if(\Auth::check())
    {
        $user = \Auth::user();
        $loadedUser =  \App\userData::where('id',$user->id)->first();
        if($loadedUser == null)
        {
            $loadedUser = new \App\userData;
            $loadedUser->id = \Auth::id();
            $loadedUser->timestamps = false;
            $loadedUser->description = '';
            $loadedUser->save();
        }
        return view('settings', compact('user','loadedUser'));
    }
    return redirect('/');
});

Route::post('/settings', function(Request $request)
{

    $changeData =  \App\userData::find(Auth::id());
    $changeData->timestamps = false;

    if($request->description != null) $changeData->description = $request->description;
    


    if(Input::hasFile('profile'))
    {
        $ext = '.'.$request->profile->getClientOriginalExtension();
        $name = GetRandomString(); 
    
        if($changeData->ProfilePic != '/')
        {
            Storage::delete('ProfilePic/'.$changeData->ProfilePic);
        }
        
        while (\App\userData::where('ProfilePic',$name. $ext)->first() != NULL) {
            $name = GetRandomString();
        }



        //Storage::disk('public')->put($name.'png',  $request->logo);
        $request->profile->storeAs('ProfilePic', $name.$ext);

        $changeData->ProfilePic = $name.$ext;
    }
    $changeData->save();
    return redirect('/user/'.Auth::id());
});

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('Forum/post', function(){  
    $MainThreads = \App\MThread::all();
    $user = \Auth::user();
    if(\Auth::check())
    {
        $v = \App\VerifyMail::where('UID',\Auth::id())->first();   
        if($v != null )return view('VerificationError',compact('user'));
    }
    return view('ForumPost', compact('MainThreads', 'user'));
});

Route::get('VerifyFail',function(){
    
    $user = \Auth::user();
    $v = \App\VerifyMail::where('UID',$user->id)->first();
    
    if($v != null )return view('VerificationError',compact('user'));
    return redirect('/user/'.Auth::id());
});

Route::get('deleteComment/{Type}/{id}','User\deleteComment@show');
Route::get('deleteF/{id}','Forum\deleteF@show');
Route::get('Tag/{object}','Images\TagGallery@show');
Route::get('verify/{code}','VerifyMail@show');
Route::get('Forum/{id}','Forum\SubForumController@show');
Route::get('follow/{id}', 'User\Follow@show');
Route::get('unfollow/{id}', 'User\unfollow@show');
Route::get('image/{imageNumber}','Images\imageNumber@show');
Route::get('like/{pictureName}','Images\likeImage@show');
Route::get('/h/{var}','MainView\MainView@show');
Route::get('/','MainView\mainViewEmpty@show');
Route::get('/delete/{name}', 'Images\delete@show');
//Route::get('info','info@show');  // <-- not working correctly
Route::post('{id}/comment','Images\comment@show');
Route::post('postForum','Forum\postF@show'); 
Route::post('/Forum/comment/{id}','Forum\postFComment@show');
Route::get('SubThread/{id}','Forum\SubThread@show');
Route::post('/search', 'search@show');
Route::get('home', function(){
    return redirect('h/home');
});
Route::get('h/home', function () {
    return redirect('/user/'.Auth::id());
});




Route::get('h/home', function () {
    return redirect('/user/'.Auth::id());
});

Route::get('Gallery','Images\AllPics@show');
Route::get('user/{id}', 'User\GalleryController@show');
Route::get('/upload', function () {

    $user = \Auth::user();
    $tags = \App\Tags::all();
    if(\Auth::check())
    {
        $v = \App\VerifyMail::where('UID',\Auth::id())->first();   
        if($v != null )return view('VerificationError',compact('user'));
    }
    return view('upload',compact('user','tags'));
});
Route::get('/Info', function () {
    $user = \Auth::user();
    return view('SiteInfo',compact('user'));
});

Route::get('/Forum','Forum\MForumController@show');

Route::post('/upload', function (Request $request) {
    
    error_log('test');
    if(\Auth::check())
    {
        $v = \App\VerifyMail::where('UID',\Auth::id())->first();   
        if($v != null )return view('VerificationError',compact('user'));
    }
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if(substr($request->logo->getMimeType(), 0, 5) != 'image') {
          return redirect('/upload')
            ->withInput();  
    }
    if ($validator->fails() || $request->object == 'please select a object type') {
        error_log("Forbidden File has been uploaded");
        return redirect('/upload')
            ->withInput()
            ->withErrors($validator);
    }


    $ext = '.'.$request->logo->getClientOriginalExtension();
    $name = GetRandomString();
    //Storage::disk('public')->put($name.'png',  $request->logo);
    $request->logo->storeAs('images', $name.$ext);
   // Storage::disk('public')->put('images',  $request->logo);
    $pictures = new \App\picture;
    $pictures->telescope = $request->post('telescope');
    if($request->post('info') == null) $pictures->info = " ";
    else $pictures->info = $request->post('info');
    $pictures->object = $request->object;
    $pictures->longInfo = $request->post('description');
    $pictures->imageName = $request->post('name');
    $pictures->imageNumber = $name . $ext;
    $pictures->user_ID = Auth::id();
    $pictures->ISO = 0;
    $pictures->exposure = 0;
    error_log($request->post('iso'));
    error_log($request->post('exp'));
    if($request->post('iso') != '')
    {
         if(is_numeric($request->post('iso')))
         {
             $pictures->ISO = intval($request->post('iso'));
         }
    }

    if($request->post('exp') != '')
    {
         if(is_numeric($request->post('exp')))
         {
             $pictures->exposure = intval($request->post('exp'));
         }
    }


    $pictures->save();


    if($request->object == 'Galaxy' 
    || $request->object == 'Nebular'
    || $request->object == 'Comet'
    || $request->object == 'Planetary Nebula'
    || $request->object == 'Star Cluster' 
    || $request->object == 'Nightscape'
    || $request->object == 'Multible')
    {
        $ProcessI = new \App\ProcessList;
        $ProcessI->ImageID = $pictures->id;
        $ProcessI->save();
    }
    
    return redirect('/user/'.Auth::id());
});


if (!function_exists('GetRandomString')) {
    function GetRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}


Auth::routes();