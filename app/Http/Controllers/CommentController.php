<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Recipe;
use App\http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Recipe $recipe)
    {
        return CommentResource::collection($recipe->comments);
    }

    public function create()
    {
        //
    }
}
