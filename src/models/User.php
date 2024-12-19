<?php

namespace Redhood\InstagramApp\models;

use PDO;
use PDOException;
use Redhood\InstagramApp\lib\Model;

class User extends Model {
    private int $id;
    private array $posts;
    private string $profile;

    public function __construct(private string $username, private string $password)
    {
        $this->posts = [];
        $this->profile = "";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function setPosts(array $posts): self
    {
        $this->posts = $posts;

        return $this;
    }

    public function getProfile(): string
    {
        return $this->profile;
    }

    public function setProfile(string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function save() {
        try {
            // TODO: validar si existe primero el usuario
            $hash = $this->getHashedPassword($this->password);
            $query = $this->prepare('INSERT INTO users(username, password, profile) VALUES(:username, :password, :profile)');
            $query->execute([
                'username' => $this ->username,
                'password'=> $hash,
                'profile'=> $this->profile
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function getHashedPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }
}