<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $data = Arr::add($validated, 'user_id', Auth::user()->id);
        $post = Post::firstOrCreate($data);
        if (!$post) {
            $notification = [
                'message'    => 'Post not inserted',
                'alert-type' => 'error',
            ];
            return redirect()
                ->back()
                ->withInput()
                ->with($notification);
        } else {
            $notification = [
                'message'    => 'Successfully inserted',
                'alert-type' => 'success',
            ];
            return redirect()
                ->back()
                ->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.form', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $updated = Post::where(['id' => $post->id])->update($validated);
        if ($updated) {
            $notification = [
                'message'    => 'Update Success',
                'alert-type' => 'success',
            ];
            return redirect()
                ->to('home')
                ->with($notification);
        } else {
            $notification = [
                'message'    => 'Update failed',
                'alert-type' => 'error',
            ];
            return redirect()
                ->back()
                ->withInput()
                ->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deleted = $post->delete();
        if ($deleted) {
            $notification = [
                'message'    => 'Post deleteted',
                'alert-type' => 'success',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } else {
            $notification = [
                'message'    => 'Post not deleted',
                'alert-type' => 'error',
            ];
            return redirect()
                ->back()
                ->with($notification);
        }
    }
}
