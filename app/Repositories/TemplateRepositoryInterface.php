<?php

namespace App\Repositories;

interface TemplateRepositoryInterface
{
    public function getListTemplateByType($type);
    public function getListTemplateByTypeAdmin($type);
    public function getTemplateById($id);
    public function addTemplate($data);
    public function updateTemplate($data, $id);
    public function check_slug($slug);
    public function getRandomBanner($num);
}
