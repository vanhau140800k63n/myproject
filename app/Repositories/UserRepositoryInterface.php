<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function updateUser($id, $data);
    public function getUserByToken($id, $token);
    public function getUserChangePassword($id);
    public function getUserByEmail($email);
    public function getUserById($id);
    public function changeStatus($id, $status);
    public function updatePassword($id, $pass);
    public function updateUserInfo($data);
    public function getRandomUser();
    public function findGoogleUser($email, $google_id);
}
