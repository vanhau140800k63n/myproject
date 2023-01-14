<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function updateUser($id, $data);
    public function getUserByToken($token);
    public function getUserChangePassword($id);
    public function getUserByEmail($email);
}
