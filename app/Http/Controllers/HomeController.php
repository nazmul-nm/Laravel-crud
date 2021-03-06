<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getUser($id){
         $post = User::with('userdetails')->get();
        //  $comments = $post->userdetails;
         return $post;
     }  
     
     public function getCommentsByPost($id){
        // $comments = Post::find($id);
        // $comments = $comments->comments;
        // return $comments;
        
        
         $post = User::find($id);
         $comments = $post->user;
         return $comments;
     }
     
     
     
     
     
     
     
    public function index()
    {
        $data = [];
        $data['page_title'] = 'Home';
        $data['user'] = $this->get_info();
        //$userList = User::where('name','=','Nuzaifa')
        //->get(); // for all with where
        // $data['userList'] = User::latest()->paginate(10); // all from database
        //$userList = User::where('name','=','Nuzaifa') ->firstOrFail();
        // $data['userList'] = $userList;
  

        // $userList = User::chunk(2, function($userList){
        //     foreach($userList as $user){
        //         print_r($user);
        //     }
        // });
        
        $data['userList'] =User::with('userdetails')->paginate(10); // all from database
        
        return view('frontend.home',['data'=>$data]);
    }
 
    
    public function about()
    {
        $data = [];
        $data['page_title'] = 'About Us';
        return view('frontend.about',['data'=>$data]);
    }

    public function contact()
    {
        $data = [];
        $data['page_title'] = 'Contact';
        return view('frontend.contact',['data'=>$data]);
    }  
    
    
    public function adduserinfo()
    {
        $userList = User::all();
        $data = [];
        $data['page_title'] = 'Add UserInfo';
        $data['userList'] = $userList;
        return view('frontend.adduserinfo',['data'=>$data]);
    }

    public function insert_user_info(Request $request)
    {
        $user = UserDetails::create([
            'address' => $request->post('address'),
            'user_id' => $request->post('user_id'),
        ]);
        return redirect('/frontend')->with('successMsg','Created Success');    
        // return redirect('/frontend');
    }
    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'About Us';
        return view('frontend.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = new Admin;
        // $user ->name = $request->input('name');
        // $user ->username = $request->input('username');
        // $user ->email = $request->input('email');
        // $user ->status = 1;
        // $user->save();
        
        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
        ]);
        return redirect('/frontend')->with('successMsg','Created Success');    
        // return redirect('/frontend');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('frontend.singlePage')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data = [];
        $data['user'] = $user;
        $data['page_title'] = 'Contact';
        return view('frontend.edit',['data'=>$data]);
        //
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
        $user = User::where('id',$id)
        ->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
        ]);
        return redirect('/frontend')->with('successMsg','Created Success');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user->delete();
        User::destroy($id);
        return back()->with('successMsg','Delete Success');
        // return redirect('/frontend');
    }


    public function get_info(){
        $data= [
            [
                "id"=> "1",
                "user_id"=> "3",
                "title"=> "HTML",
                "level"=> "90",
                "status"=> "1",
                "created_at"=> "2021-08-22 22=>59=>22"
            ],
            [
                "id"=> "2",
                "user_id"=> "3",
                "title"=> "REACTJS",
                "level"=> "60",
                "status"=> "1",
                "created_at"=> "2021-08-22 22=>59=>28"
            ],
            [
                "id"=> "3",
                "user_id"=> "3",
                "title"=> "JQuery",
                "level"=> "70",
                "status"=> "1",
                "created_at"=> "2021-08-22 22=>59=>43"
            ],
            [
                "id"=> "4",
                "user_id"=> "3",
                "title"=> "Codeigniter",
                "level"=> "85",
                "status"=> "1",
                "created_at"=> "2021-08-22 22=>59=>52"
            ],
            [
                "id"=> "5",
                "user_id"=> "3",
                "title"=> "Photoshop",
                "level"=> "45",
                "status"=> "1",
                "created_at"=> "2021-08-22 22=>59=>58"
            ],
            [
                "id"=> "6",
                "user_id"=> "3",
                "title"=> "Javascript",
                "level"=> "55",
                "status"=> "1",
                "created_at"=> "2021-08-22 23=>00=>08"
            ],
        ];
    return $data;
    }
    public function one(){
        return view('test1.one',[
            'heading' => 'Laravel Test',
            'subheading' => 'Here is where you can register web routes for your application. These
            | routes are loaded by the RouteServiceProvider within a group which
            | contains the "web" middleware group. Now create something great!',
        ]);
    }



    
}