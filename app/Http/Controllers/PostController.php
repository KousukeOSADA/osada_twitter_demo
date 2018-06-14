<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
         $post = new Post;
        // $validatedData = $request->validate([
        //    'tweet' => 'required|unique:posts|max:10',
        //  ]);
        $validator = Validator::make($request->all(),[
          'tweet' => 'required|unique:posts|max:50',
        ]);
        if($validator->fails()){
          return redirect('posts/create')
                      ->withErrors($validator)
                      ->withInput();
        }
        $post->id = $request->id;
        $post->tweet = $request->tweet;
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect('posts');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->tweet = $request->tweet;
        $post->save();
        return redirect('posts/'.$post->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
    public function messages()
    {
      return[
        'tweet.max.string' => 'only 5 char.'
      ];
    }
}
