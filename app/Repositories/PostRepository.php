<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DTO\Post\PostDTO;
use App\Factories\PostDTOFactory;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    private PostDTOFactory $postDTOFactory;

    public function __construct(PostDTOFactory $postDTOFactory)
    {
        $this->postDTOFactory = $postDTOFactory;
    }

    public function createPost(
        string $title,
        string $description,
        int $userId
    ): PostDTO
    {
        $post = new Post();

        $post->title = $title;
        $post->description = $description;
        $post->user_id = $userId;

        $post->save();

        return $this->postDTOFactory->buildFromModel($post);
    }

    public function getPosts(int $userId): array
    {
        return $this->postDTOFactory->buildFromModelCollection(Post::where('user_id', $userId)->get());
    }

    public function getPost(int $id): PostDTO
    {
        return $this->postDTOFactory->buildFromModel(Post::findOrFail($id));
    }

    public function updatePost(
        int $id,
        string $title,
        string $description
    ): PostDTO
    {
        $post = Post::findOrFail($id);

        $post->title = $title;
        $post->description = $description;

        $post->save();

        return $this->postDTOFactory->buildFromModel($post);
    }

    public function deletePost(int $id): void
    {
        $post = Post::findOrFail($id);

        $post->delete();
    }
}
