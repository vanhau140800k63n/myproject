<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function getUserByToken($token);
    public function getUserById($id);
}
