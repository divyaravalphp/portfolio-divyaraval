<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
class PostController extends Controller
{   
    public function postForm()
    {
        return view('post');
    }
    public function addPosts(Request $request)
    {
         
        $validatedData = $request->validate([
            'file' => 'file|mimes:jpg,png,jpeg,pdf|max:2048',
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'body' => 'required|string', 
        ]);
        $fileName = time().'.'.$request->file->extension();  
      //  echo public_path();exit;
        $request->file->move(storage_path('app/public/uploads'), $fileName);
        $post = new PostModel();
        $post->id = $validatedData['user_id'];
        $post->user_id = $validatedData['user_id'];   
        $post->title = $validatedData['title'];
        $post->file = $fileName;
        $post->body = $validatedData['body'];
        $currentTime = Carbon::now();
        
        $post->updated_at =Carbon::now();
      //  echo $post->updated_at ;exit;
        $res = $post->save();

        $request->session()->put('showMsg','Post Added successfully!');
         return redirect('/post');
        if($res){
            return back()->with('success', 'Your Data Added Successfully!');
        }else{
            return back()->with('fail', 'Something went wrong, try again later!');
        }
    }   
    public function importPosts()
    {
        $posts = new PostModel();
 
       $contents = file_get_contents('https://jsonplaceholder.typicode.com/posts');
       $data = json_decode($contents, true);  
         $counter = 0;
         $inserData= array();
        foreach ($data as $item) {
        $posts->id = $item['id'];
        $posts->user_id = $item['userId'];
        $posts->title = $item['title'];
        $posts->body = $item['body']; 
        $arr = array(
            'id' => $item['id'],
            'user_id' => $item['userId'],
            'title' => $item['title'],
            'body' => $item['body']
        );
        $inserData[] = $arr; 
        $counter++;
       }
       PostModel::insert($inserData); 
       set_time_limit(300); 
       Session::put('showMsg', ' Posts('.$counter.') Imported successfully!');
        return back()->with('success', '');
   
    }
       
    public function fetchPostsApi(Request $request)
    {  
        $posts = PostModel::all();   
       return response()->json([
            'status' => true,
            'data'=>$posts,
            'message' => ' Data Fetched',
             
        ], 200); 
   
    } 
     public function fetchPostsApilogin(Request $request)
    { 
          
         $validator = Validator::make($request->all(), [
            'useremail' => 'required|email',
            'userpassword' =>  'required|string',
        ]);
       
        $user = \App\Models\RegUserModel::where('useremail', $request->useremail)->first();
        if ($user && \Illuminate\Support\Facades\Hash::check($request->userpassword, $user->userpassword)) {
         $posts = PostModel::all();   
       return response()->json([
            'status' => true,
             'data'=>$posts,
            'message' => ' Data Fetched',
             
        ], 200);  
       
     } else {
             return response()->json([
            'status' => false,
            'message' => 'Invalid email or password.',
             
        ], 201); 
       
     }
   
    } 
}
