<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getPostList();
    public function getPostHome();
    public function addPost($data);
    public function updatePost($data);
    public function getPostAdmin($id);
    public function getPostBySlug($slug);
    public function delPostAdmin($id);
    public function searchPost($key);
    public function searchPostRaw($raw, $count);
}
