<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Services\PostService;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $postService)
    {
        $this->service  = $postService;
    }
}
