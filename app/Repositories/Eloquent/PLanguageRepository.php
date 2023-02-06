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
        $query = $this->p_language;
        $pLanguages = $this->retryQuery($query);

        return $pLanguages;
    }
}
