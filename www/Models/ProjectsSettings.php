<?php

namespace App\Models;

class ProjectsSettings
{
    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private array $posts = [];

    public function __construct(?string $title, ?string $content, array $posts = [])
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setPosts($posts);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function setPosts(array $posts): void
    {
        $this->posts = $posts;
    }

    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }
}