<?php


namespace App\Repositories\News;


use App\Http\Requests\Dashboard\NewsRequest;
use App\Models\News;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{

    public function __construct(News $news)
    {
        parent::__construct($news);
    }

    public function saveData($news, $request)
    {
        $news->title_ar = $request->title_ar;
        $news->title_en = $request->title_en;
        $news->description_ar = $request->description_ar;
        $news->description_en = $request->description_en;
        if ($request->img){
            if ($news->img){
                Storage::disk('public')->delete($news->img);
                $news->img = $request->img->store('news', 'public');
            } else {
                $news->img = $request->img->store('news', 'public');
            }
        }
        $news->admin_id = auth()->id();
        $news->save();
    }
}
