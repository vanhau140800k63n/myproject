<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function getListCategory()
    {
        return $this->category->all();
    }

    public function updateCategory($category_list)
    {
        $output = '';
        foreach ($category_list as $category_title) {
            if ($category_title != "") {
                $category = $this->category->where('title', $category_title)->first();
                if ($category != null) {
                } else {
                    $category = $this->category->create(['title' => $category_title]);
                }

                if ($output == '') {
                    $output .= $category->id;
                } else {
                    $output .= '-' . $category->id;
                }
            }
        }

        return $output;
    }

    public function getCategoryTitle($category_list_id)
    {
        $output = '';
        foreach ($category_list_id as $id) {
            $category = $this->category->where('id', intval($id))->first();
            if ($category != null) {
                if ($output == '') {
                    $output .= $category->title;
                } else {
                    $output .= ',' . $category->title;
                }
            }
        }

        return $output;
    }
}
