<?php

declare(strict_types=1);

namespace App\Factories;

use App\DTO\Post\PostDTO;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostDTOFactory
{
    private UserDTOFactory $userDTOFactory;

    public function __construct(UserDTOFactory $userDTOFactory)
    {
        $this->userDTOFactory = $userDTOFactory;
    }

    public function buildFromModel(Post $post): PostDTO
    {
        return new PostDTO(
            $post->id,
            $post->title,
            $post->description,
            $this->userDTOFactory->buildFromModel($post->user),
            $post->created_at
        );
    }

    public function buildFromModelCollection(Collection $posts): array
    {
        $postDTOs = [];

        foreach ($posts as $post) {
            $postDTOs[] = $this->buildFromModel($post);
        }

        return $postDTOs;
    }
}
