<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostDeletedRequest;
use App\Http\Requests\Post\PostIdRequest;
use App\Http\Requests\Post\PostUpdatedRequest;
use App\Models\Post;
use Session;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function add() {
        return view('post.add');
    }

    public function edit(PostIdRequest $request) {
        $data = $request->all();
        $post = Post::whereId($data['id'])->first();
        return view('post.edit', ['post' => $post]);
    }

    public function store(PostCreateRequest $request) {
        \DB::beginTransaction();
        $data = $request->all();
        try {

            $create = [
                'name' => $data['name'],
                'description' => $data['description']
            ];
            Post::create($create);

        }catch (\Exception $e) {
            \DB::rollback();
            return back()->withInput($data)->withErrors(['error' => $e->getMessage()]);
        }

        \DB::commit();
        Session::flash('success', trans('post.success_create'));
        return redirect()->route('posts.list');
    }

    public function update(PostUpdatedRequest $request) {
        \DB::beginTransaction();
        $data = $request->all();
        try {

            $update = [
                'name' => $data['name'],
                'description' => $data['description']
            ];
            Post::whereId($data['id'])->update($update);

        }catch (\Exception $e) {
            \DB::rollback();
            return back()->withInput($data)->withErrors(['error' => $e->getMessage()]);
        }

        \DB::commit();
        Session::flash('success', trans('post.success_update'));
        return redirect()->route('posts.list');
    }

    public function destroy(PostDeletedRequest $request) {
        \DB::beginTransaction();
        $data = $request->all();

        try {

            Post::whereId($data['id'])->delete();

        }catch (\Exception $e) {
            \DB::rollback();
            return back()->withInput($data)->withErrors(['error' => $e->getMessage()]);
        }

        \DB::commit();
        Session::flash('success', trans('post.success_destroy'));
        return redirect()->route('posts.list');
    }

}
