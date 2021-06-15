<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        $news = $this->newsRepository->all();
        return view('site.news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('site.news.show', compact('news'));
    }

}
