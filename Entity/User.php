<?php

namespace App\Entity;

class User
{
    private ?int $id;
    private ?string $username;
    private ?string $password;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct(int $id = null, string $username = null, string $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Return the id of User
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return the user name of User
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the user name of User
     * @param string|null $username
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Return the password of User
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param string|null $password
     */
    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }
}