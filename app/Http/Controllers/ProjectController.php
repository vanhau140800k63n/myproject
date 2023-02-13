<?php

namespace App\Http\Controllers;

use App\Repositories\PLanguageRepositoryInterface;
use App\Repositories\ProjectRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $userRepository;
    private $pLanguageRepository;
    private $projectRepository;

    public function __construct(UserRepositoryInterface $userRepository, PLanguageRepositoryInterface $pLanguageRepository, ProjectRepositoryInterface $projectRepository)
    {
        $this->userRepository = $userRepository;
        $this->pLanguageRepository = $pLanguageRepository;
        $this->projectRepository = $projectRepository;
    }

    public function getProjectListAdmin() {
        $project_list = $this->projectRepository->getProjectList();
        return view('admin.pages.project.list', compact('project_list'));
    }
}
