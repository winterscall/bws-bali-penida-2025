<?php

namespace App\Http\Controllers\Backpanel\Media;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\SocialPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SocialPost::all();

        return view('backpanel.pages.media.social.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.media.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'script' => 'required|string',
            'published_at' => 'required|date_format:d/m/Y',
        ]);

        $social_post = new SocialPost();
        $social_post->platform = 'instagram';
        $social_post->name = $validatedData['name'];
        $social_post->script = $validatedData['script'];
        $social_post->published_at = Carbon::createFromFormat('d/m/Y', $validatedData['published_at']);

        $social_post->save();

        SessionHelper::common_flasher('create', 'Postingan Media Sosial');
        return redirect()->route('backpanel.media.social.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialPost $social_post)
    {
        return view('backpanel.pages.media.social.edit', compact('social_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialPost $social_post)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'script' => 'required|string',
            'published_at' => 'required|date_format:d/m/Y',
        ]);

        $social_post->name = $validatedData['name'];
        $social_post->script = $validatedData['script'];
        $social_post->published_at = Carbon::createFromFormat('d/m/Y', $validatedData['published_at']);

        $social_post->save();

        SessionHelper::common_flasher('update', 'Postingan Media Sosial');
        return redirect()->route('backpanel.media.social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialPost $social_post)
    {
        $social_post->delete();

        SessionHelper::common_flasher('delete', 'Postingan Media Sosial');
        return redirect()->route('backpanel.media.social.index');
    }
}
