<?php

declare(strict_types=1);

namespace App\Services\Post;

use App\DTO\Post\PostDTO;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostService
{
    private PostRepositoryInterface $postRepositoryInterface;

    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        $this->postRepositoryInterface = $postRepositoryInterface;
    }

    public function createPost(string $title, string $description, int $userId): PostDTO
    {
        return $this->postRepositoryInterface->createPost($title, $description, $userId);
    }

    public function updatePost(int $postId, string $title, string $description): PostDTO
    {
        return $this->postRepositoryInterface->updatePost($postId, $title, $description);
    }

    public function getPosts(int $userId): array
    {
        return $this->postRepositoryInterface->getPosts($userId);
    }

    public function getPost(int $postId): PostDTO
    {
        return $this->postRepositoryInterface->getPost($postId);
    }

    public function deletePost(int $postId): void
    {
        $this->postRepositoryInterface->deletePost($postId);
    }
}
