<?php

namespace App\Http\Controllers\Backpanel\News;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\News\NewsType;
use Illuminate\Http\Request;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NewsType::orderBy('slug')->get();

        return view('backpanel.pages.news_types.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.news_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news_types,slug',
        ]);

        $news_type = new NewsType();
        $news_type->name = $validatedData['name'];
        $news_type->slug = $validatedData['slug'];
        $news_type->save();

        SessionHelper::common_flasher('create', 'Tipe Berita');
        return redirect()->route('backpanel.news_types.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsType $news_type)
    {
        return view('backpanel.pages.news_types.edit', compact('news_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsType $news_type)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news_types,slug,' . $news_type->id,
        ]);

        $news_type->name = $validatedData['name'];
        $news_type->slug = $validatedData['slug'];

        $news_type->save();

        SessionHelper::common_flasher('update', 'Tipe Berita');
        return redirect()->route('backpanel.news_types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $news_type = NewsType::findOrFail($id);

        // check if types has news
        if ($news_type->news()->count() > 0) {
            SessionHelper::error_flasher('Tipe Berita gagal dihapus karena memiliki berita...');
            return redirect()->route('backpanel.news_types.index');
        }

        $news_type->delete();

        SessionHelper::common_flasher('delete', 'Tipe Berita');
        return redirect()->route('backpanel.news_types.index');
    }
}
