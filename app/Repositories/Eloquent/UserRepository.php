<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\UserRepositoryInterface;

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
        $query = $this->user->where('id', $id)->first();
        $user =  $this->retryUpdate($query, $data);

        if ($user !== false) {
            return $user;
        }

        return false;
    }

    public function getUserByToken($token)
    {
        $query = $this->user->where('register_token', $token)->where('register_token_expired', '>', now());

        $users = $this->retryQuery($query);

        if ($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function getUserChangePassword($id)
    {
        $query = $this->user->where('id', $id)->where('register_token_expired', '>', now());

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
}
