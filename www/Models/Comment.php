<?php

namespace App\Models;

class comment
{
    private ?int $id_comment;
    private ?int $id_userCOM;
    private string $comment;
    private string $isApproved;
    private int $isDeleted;

    public function getIdComment(): ?int
    {
        return $this->id_comment;
    }

    public function setIdComment(?int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }

    /**
     * @return int|null
     */
    public function getIdUserCOM(): ?int
    {
        return $this->id_userCOM;
    }

    /**
     * @param int|null $id_userCOM
     */
    public function setIdUserCOM(?int $id_userCOM): void
    {
        $this->id_userCOM = $id_userCOM;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getIsApproved(): string
    {
        return $this->isApproved;
    }

    /**
     * @param string $isApproved
     */
    public function setIsApproved(string $isApproved): void
    {
        $this->isApproved = $isApproved;
    }

    /**
     * @return int
     */
    public function getIsDeleted(): int
    {
        return $this->isDeleted;
    }

    /**
     * @param int $isDeleted
     */
    public function setIsDeleted(int $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

}