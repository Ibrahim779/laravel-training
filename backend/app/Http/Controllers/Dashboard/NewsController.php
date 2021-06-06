<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NewsRequest;
use App\Models\News;
use App\Repository\News\NewsRepositoryInterface;
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
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        //
    }

    public function store(NewsRequest $request)
    {
        //
    }

    public function show(News $news)
    {
        //
    }

    public function edit(News $news)
    {
        //
    }

    public function update(NewsRequest $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}
