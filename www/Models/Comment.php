<?php

namespace App\Models;

class Comment
{
    private int $id;
    private User $user;
    private Post $post;
    private string $content;
    private bool $isApproved;
    private bool $isDeleted;
    private \DateTime $createdAt;

    public function __construct(User $user, Post $post, string $content, bool $isApproved, bool $isDeleted, \DateTime $createdAt)
    {
        $this->user = $user;
        $this->post = $post;
        $this->content = $content;
        $this->isApproved = $isApproved;
        $this->isDeleted = $isDeleted;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function isApproved(): bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): void
    {
        $this->isApproved = $isApproved;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}