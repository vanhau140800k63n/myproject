<?php

namespace App\Http\Controllers;

use App\Exceptions\PageException;
use App\Repositories\ContentRepositoryInterface;
use App\Repositories\IconRepositoryInterface;
use App\Repositories\SolutionItemRepositoryInterface;
use App\Repositories\SolutionRepositoryInterface;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    private $contentRepository;
    private $solutionRepository;
    private $solutionItemRepository;
    private $iconRepository;

    public function __construct(
        ContentRepositoryInterface $contentRepository,
        SolutionRepositoryInterface $solutionRepository,
        SolutionItemRepositoryInterface $solutionItemRepository,
        IconRepositoryInterface $iconRepository
    ) {
        $this->contentRepository = $contentRepository;
        $this->solutionRepository = $solutionRepository;
        $this->solutionItemRepository = $solutionItemRepository;
        $this->iconRepository = $iconRepository;
    }

    public function getSolutionDetail($id, $slug)
    {
        $solution = $this->solutionRepository->getSolutionBySlug($id, $slug);
        if ($solution == null) throw new PageException();

        $question = $this->solutionItemRepository->getQuestion($solution->id);
        $question_comments = $this->solutionItemRepository->getQuestionComments($solution->id, $question->id);
        $answers = $this->solutionItemRepository->getAnswers($solution->id);
        $answer_comments_list = [];

        foreach ($answers as $answer) {
            $answer_comments = $this->solutionItemRepository->getAnswerComments($solution->id, $answer->id);
            if ($answer_comments->count() > 0) {
                $answer_comments_list[$answer->id] = $answer_comments;
            }
        }

        $random_solutions = $this->solutionRepository->random(30);
        $random_icons = $this->iconRepository->randomByTag('question', 30);

        return view('pages.solution.detail', compact('solution', 'question', 'question_comments', 'answers', 'answer_comments_list', 'random_solutions', 'random_icons'));
    }

    public function autoAdd()
    {
        $context = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );
        $url = $this->contentRepository->getContentUnPublicUrl();
        if ($url == null) {
            return 'done';
        }
        $update_content = $this->contentRepository->updateContentUrl(['status' => 1], $url->id);
        $data = file_get_contents($url->content, false, $context);
        return view('admin.pages.solution.auto', compact('data'));
    }

    public function addSolution(Request $req)
    {
        $title = $req->solution_title;
        $slug = $this->makeSlug($title);

        $data = [
            'title' => $title,
            'slug' => $slug,
            'view' =>  rand(1000, 1000000)
        ];

        $solution = $this->solutionRepository->create($data);

        $data_question = [
            'content' => $req->question,
            'solution_id' => $solution->id,
            'user_id' => null,
            'type' => 1,
            'point' => null,
            'solution_item_id' => null
        ];

        $question = $this->solutionItemRepository->create($data_question);

        if (isset($req->question_comments) && count($req->question_comments) > 0) {
            $question_comments = $req->question_comments;

            foreach ($question_comments as $comment) {
                $data_comment = [
                    'content' => $comment,
                    'solution_id' => $solution->id,
                    'user_id' => null,
                    'type' => 3,
                    'point' => null,
                    'solution_item_id' => $question->id
                ];
                $comment = $this->solutionItemRepository->create($data_comment);
            }
        }

        $answers = $req->answers;

        foreach ($answers as $item) {
            $data_answer = [
                'content' => $item['answer'],
                'solution_id' => $solution->id,
                'user_id' => null,
                'type' => 2,
                'point' => rand(1, 100),
                'solution_item_id' => null
            ];
            $answer = $this->solutionItemRepository->create($data_answer);
            if (isset($item['answer_comments'])) {
                foreach ($item['answer_comments'] as $comment) {
                    $data_comment = [
                        'content' => $comment,
                        'solution_id' => $solution->id,
                        'user_id' => null,
                        'type' => 3,
                        'point' => null,
                        'solution_item_id' => $answer->id
                    ];
                    $comment = $this->solutionItemRepository->create($data_comment);
                }
            }
        }

        return true;
    }
}
