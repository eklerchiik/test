<?php

declare(strict_types=1);

namespace App\DTO\Post;

use App\DTO\User\UserDTO;
use Carbon\Carbon;

class PostDTO implements \JsonSerializable
{
    private int $id;
    private string $title;
    private string $description;
    private UserDTO $user;
    private Carbon $created_at;

    public function __construct(int $id, string $title, string $description, UserDTO $user, Carbon $created_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->user = $user;
        $this->created_at = $created_at;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUser(): UserDTO
    {
        return $this->user;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'          => $this->getId(),
            'title'       => $this->getTitle(),
            'description' => $this->getDescription(),
            'user'        => $this->getUser(),
            'created_at'  => $this->getCreatedAt()
        ];
    }
}
