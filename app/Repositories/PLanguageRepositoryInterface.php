<?php

namespace App\Repositories;

interface PLanguageRepositoryInterface
{
    public function getPLanguageHome();
    public function getPLanguageIdByName($name);
    public function getCourseAdmin($id);
    public function getCourseByName($name);
}
