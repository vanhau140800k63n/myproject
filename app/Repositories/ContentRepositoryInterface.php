<?php

namespace App\Repositories;

interface ContentRepositoryInterface
{
    public function findContentUrl($url);
    public function createContentUrl($data);
    public function updateContentUrl($data, $id);
    public function getContentUnPublicUrl();
}
