<?php

namespace App\Repositories;

interface ContentItemRepositoryInterface
{
    public function addItem($data);
    public function getPostDetail($post_id);
    public function updateItem($data);
    public function delItem($id);
}
