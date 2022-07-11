<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Services\Post\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(CreatePostRequest $request)
    {
        $this->postService->createPost(
            $request->get('title'),
            $request->get('description'),
            Auth::id()
        );

        return redirect('/');
    }

    public function update(int $postId, UpdatePostRequest $request)
    {
        $this->postService->updatePost(
            $postId,
            $request->get('title'),
            $request->get('description')
        );

        return redirect('/');
    }

    public function list(): Application|Factory|View
    {
        $posts = $this->postService->getPosts(Auth::id());

        return view('user_posts_page', ['posts' => $posts]);
    }

    public function get(int $id): Application|Factory|View
    {
        $post = $this->postService->getPost($id);

        return view('post_details', ['post' => $post]);
    }

    public function delete(int $postId)
    {
        $this->postService->deletePost($postId);

        return redirect('/');
    }
}
