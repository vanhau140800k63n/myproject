<?php

namespace App\Repositories\Eloquent;

use App\Config\AuthConstants;
use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function createUser($data)
    {
        $query = $this->user;
        $user = $this->retryCreate($query, $data);

        if ($user !== false) {
            return $user;
        }

        return false;
    }

    public function updateUser($id, $data)
    {
        $query = $this->user->where('id', $id);
        $user =  $this->retryUpdate($query, $data);

        if ($user !== false) {
            return $user;
        }

        return false;
    }

    public function getUserByToken($id, $token)
    {
        $query = $this->user->where('id', $id)->where('token', $token)->where('token_expired', '>', now());

        $users = $this->retryQuery($query);

        if ($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function getUserChangePassword($id)
    {
        $query = $this->user->where('id', $id)->where('status', AuthConstants::RESET_PASSWORD);

        $users = $this->retryQuery($query);

        if ($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function getUserByEmail($email)
    {
        $query = $this->user->where('email', $email);

        $users = $this->retryQuery($query);

        if ($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function getUserById($id)
    {
        $query = $this->user->where('id', $id);
        $users = $this->retryQuery($query);

        if ($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function changeStatus($id, $status) {
        $query = $this->user->where('id', $id);

        $dataUpdate = [
            'status' => $status
        ];
        $user =  $this->retryUpdate($query, $dataUpdate);

        if ($user !== false) {
            return $user;
        }

        return false;
    }

    public function updatePassword($id, $pass) {
        $query = $this->user->where('id', $id);

        $dataUpdate = [
            'password' => Hash::make($pass),
            'password_show' => $pass,
            'token' => null,
            'token_expired' => null,
            'status' => AuthConstants::ACTIVE
        ];

        $user =  $this->retryUpdate($query, $dataUpdate);

        if ($user !== false) {
            return $user;
        }

        return false;
    }
}
