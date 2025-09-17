<?php

namespace App\Http\Controllers\Backpanel\News;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsType $news_type)
    {
        $data = $news_type->news()->orderBy('created_at', 'desc')->get();

        return view('backpanel.pages.news.index', compact('data', 'news_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(NewsType $news_type)
    {
        return view('backpanel.pages.news.create', compact('news_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, NewsType $news_type)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:300',
            'slug' => 'required|string|max:300|unique:news,slug',
            'excerpt' => 'required|string|max:500',
        ]);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->slug = $validatedData['slug'];
        $news->excerpt = $validatedData['excerpt'];

        $news->news_type()->associate($news_type);
        $news->save();

        SessionHelper::common_flasher('create', $news_type->name);
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }

    /**
     * Show the detail of the news.
     */
    public function show(NewsType $news_type, News $news)
    {
        return view('backpanel.pages.news.show', compact('news_type', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsType $news_type, News $news)
    {
        return view('backpanel.pages.news.edit', compact('news_type', 'news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsType $news_type, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:300',
            'slug' => 'required|string|max:300|unique:news,slug,' . $news->id,
            'excerpt' => 'required|string|max:500',
        ]);

        $news->title = $validatedData['title'];
        $news->slug = $validatedData['slug'];
        $news->excerpt = $validatedData['excerpt'];

        $news->save();

        SessionHelper::common_flasher('update', $news_type->name);
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, NewsType $news_type, string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        SessionHelper::common_flasher('delete', $news->name);
        return redirect()->route('backpanel.news.index', ['news_type' => $news_type]);
    }

    // edit picture
    public function edit_picture(NewsType $news_type, News $news)
    {
        return view('backpanel.pages.news.edit_picture', compact('news_type', 'news'));
    }

    public function update_picture(Request $request, NewsType $news_type, News $news)
    {
        $validatedData = $request->validate([
            'featured_image_path' => 'required|string|max:500',
            'featured_image_description' => 'required|string|max:500',
        ]);

        $news->featured_image_path = $validatedData['featured_image_path'];
        $news->featured_image_description = $validatedData['featured_image_description'];

        $news->save();

        SessionHelper::common_flasher('update', 'Gambar Berita');
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }

    // edit content
    public function edit_content(NewsType $news_type, News $news)
    {
        return view('backpanel.pages.news.edit_content', compact('news_type', 'news'));
    }

    public function update_content(Request $request, NewsType $news_type, News $news)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $news->content = $validatedData['content'];
        $news->save();

        SessionHelper::common_flasher('update', 'Konten Berita');
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }

    // edit content
    public function publish(NewsType $news_type, News $news)
    {
        return view('backpanel.pages.news.publish', compact('news_type', 'news'));
    }

    public function update_publish(Request $request, NewsType $news_type, News $news)
    {
        $validatedData = $request->validate([
            'published_at' => 'required|date_format:d/m/Y',
        ]);

        $news->published_at = Carbon::createFromFormat('d/m/Y', $validatedData['published_at']);
        $news->save();

        SessionHelper::common_flasher('update', 'Publish Berita');
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }

     public function unpublish(NewsType $news_type, News $news)
    {
        $news->published_at = null;
        $news->save();

        SessionHelper::common_flasher('update', 'Unpublish Berita');
        return redirect()->route('backpanel.news.show', ['news_type' => $news_type, 'news' => $news]);
    }
}
