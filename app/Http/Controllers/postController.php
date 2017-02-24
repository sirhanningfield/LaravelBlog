<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use Image;
use Storage;

/**
* 
*/
class postController extends Controller
{ 

     public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create variable to store all posts
        $posts = Post::orderBy('id','desc')->paginate(10);

        //return a view and pass the variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valedate the data
        $this->validate($request,array(
                'title'=> 'required|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=> 'required',
                'featured_image'=>'sometimes|image'


            ));


        //Store in database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        
        //save the image:
        if($request->hasfile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            image::make($image)->resize(400,400)->save($location);

            $post->image = $filename;

        }

        $post->save();

        Session::flash('Success','The post was successfully saved');

        //redirect to another page

        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post from database

        $post = Post::find($id);

        // return the edit view
        return view('posts.edit')->withPost($post);
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
        // Validate the data before we use it
        $post = Post::find($id);
        

        $this->validate($request,array(

            'title'=> 'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'body'=>'required',
            'featured_image'=>'sometimes|image'
            ));
    

           
        // save to database
        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        if($request->hasfile('featured_image')){
            
            $image = $request->file('featured_image');
            $filename = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            // make new image
            image::make($image)->resize(400,400)->save($location);

            $old_file_name = $post->image;

            // Update database
            $post->image = $filename;

            // Delete the old photo
            Storage::delete($old_file_name);
        }




        $post->save();

        // set flash data with success message

        Session::flash('Success', 'The changes were successfully made !');


        // redirect with flash data to posts.show

        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find the post in the database

        $post = Post::find($id);

        // Delete photo from public folder

        Session::delete($post->image);

        // delete the post 
        $post->delete();

        //Flash a message
        Session::flash('Success','The Post was Deleted!');
        
        //redirect to the show all posts page
        return redirect()->route('posts.index');
    }
}
