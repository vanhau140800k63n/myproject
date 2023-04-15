<?php

namespace App\Repositories;

interface CommentRepositoryInterface
{
   public function getPostComments($id);
   public function addComment($data);
   public function getDelComment($data);
}
