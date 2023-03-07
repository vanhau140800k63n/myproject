<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getListCategory();
    public function updateCategory($category_list);
    public function getCategoryTitle($category_list_id);
}
