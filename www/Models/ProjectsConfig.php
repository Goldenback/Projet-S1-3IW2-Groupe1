<?php

namespace App\Models;

use App\Core\DB;

class ProjectsConfig extends DB
{
    private int $id;
    private string $title;
    private string $paragraph;
    private array $posts = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getParagraph(): string
    {
        return $this->paragraph;
    }

    /**
     * @param string $paragraph
     */
    public function setParagraph(string $paragraph): void
    {
        $this->paragraph = $paragraph;
    }

    /**
     * Get the posts associated with the About entity.
     *
     * @return Post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     *  Set the posts associated with the About entity.
     *  This method assumes you're passing an array of Post objects.
     *
     * @param Post[] $posts
     */
    public function setPosts(array $posts): void
    {
        $this->posts = array_filter($posts, function ($post) {
            return $post instanceof Post;
        });
    }

    /**
     * Add a single Post object to the About entity.
     *
     * @param Post $post
     */
    public function addPost(Post $post): void
    {
        if (!$this->postsContains($post)) {
            $this->posts[] = $post;
        }
    }

    /**
     * Check if a Post object is already associated with the About entity.
     *
     * @param Post $post
     * @return bool
     */
    private function postsContains(Post $post): bool
    {
        foreach ($this->posts as $i) {
            if ($i->getId() === $post->getId()) {
                return true;
            }
        }

        return false;
    }
}