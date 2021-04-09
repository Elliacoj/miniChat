<?php

namespace App\Entity;

use App\Entity\User;

class Message
{
    private ?int $id;
    private ?string $content;
    private ?string $datetime;
    private ?User $user_fk;

    /**
     * Message constructor.
     * @param int|null $id
     * @param string|null $content
     * @param string|null $datetime
     * @param \App\Entity\User|null $user_fk
     */
    public function __construct(int $id = null, string $content = null, string $datetime = null, User $user_fk = null)
    {
        $this->id = $id;
        $this->content = $content;
        $this->datetime = $datetime;
        $this->user_fk = $user_fk;
    }

    /**
     * Return the id of Message
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return the content of Message
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the content of Message
     * @param string|null $content
     * @return Message
     */
    public function setContent(?string $content): Message
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Return the date time of Message
     * @return string|null
     */
    public function getDatetime(): ?string
    {
        return $this->datetime;
    }

    /**
     * Set the date time of Message
     * @param string|null $datetime
     * @return Message
     */
    public function setDatetime(?string $datetime): Message
    {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * Return the user_fk of Message
     * @return \App\Entity\User|null
     */
    public function getUserFk(): ?User
    {
        return $this->user_fk;
    }

    /**
     * Set the user_fk of Message
     * @param \App\Entity\User|null $user_fk
     * @return Message
     */
    public function setUserFk(?User $user_fk): Message
    {
        $this->user_fk = $user_fk;
        return $this;
    }
}