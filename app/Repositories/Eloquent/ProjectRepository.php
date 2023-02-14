<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\ProjectRepositoryInterface;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    private $project;

    public function __construct()
    {
        $this->project = new Project();
    }

    public function getProjectList()
    {
        return $this->project->all();
    }

    public function getProjectHome()
    {
        return $this->project->selectRaw('project.*, CONCAT(users.last_name, " ", users.first_name) as author_name, users.avata as author_avata')
            ->join('users', 'project.created_by', '=', 'users.id')
            ->take(5)->get();
    }
}
