<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NewsRequest;
use App\Models\News;
use App\Repositories\News\NewsRepositoryInterface;

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
        return view('dashboard.news.create');
    }

    public function store(NewsRequest $request)
    {
        $this->newsRepository->createOrUpdate(new News ,$request);
        return redirect()->route('dashboard.news.index');
    }

    public function edit(News $news)
    {
        return view('dashboard.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $this->newsRepository->createOrUpdate($news, $request);
        return redirect()->route('dashboard.news.index');
    }

    public function destroy(News $news)
    {
        $this->newsRepository->delete($news);
        return back();
    }

}
