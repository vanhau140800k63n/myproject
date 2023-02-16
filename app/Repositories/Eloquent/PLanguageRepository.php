<?php

namespace App\Repositories\Eloquent;

use App\Models\PLanguage;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\PLanguageRepositoryInterface;

class PLanguageRepository extends BaseRepository implements PLanguageRepositoryInterface
{
    private $p_language;

    public function __construct()
    {
        $this->p_language = new PLanguage();
    }

    public function getPLanguageHome()
    {
        return $this->p_language->all();
    }

    public function getPLanguageIdByName($name)
    {
        $query = $this->p_language->where('name', $name);

        $p_language = $this->retryQuery($query);
        if($p_language !== false && $p_language->count() > 0) {
            return $p_language->first()->id;
        }

        return false;
    }

    public function getCourseAdmin($id) {
        return $this->p_language->find($id);
    }

    public function getCourseByName($name) {
        return $this->p_language->where('name', $name)->first();
    }
}
