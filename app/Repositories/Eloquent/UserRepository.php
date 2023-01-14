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

    public function createUser($data) {

    }

    public function getUserByToken($token) {
        $query = $this->user->where('register_token', $token)->where('register_token_expired', '>', now());

        $users = $this->retryQuery($query);

        if($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }

    public function getUserById($id) {
        $query = $this->user->where('id', $id)->where('register_token_expired', '>', now());

        $users = $this->retryQuery($query);

        if($users !== false && $users->count() > 0) {
            return $users->first();
        }

        return false;
    }
}