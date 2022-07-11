<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\DTO\Post\PostDTO;

interface PostRepositoryInterface
{
    public function createPost(
        string $title,
        string $description,
        int $userId
    ): PostDTO;
    public function updatePost(
        int $id,
        string $title,
        string $description
    ): PostDTO;
    public function getPosts(int $userId): array;
    public function getPost(int $id): PostDTO;
    public function deletePost(int $id): void;
}
