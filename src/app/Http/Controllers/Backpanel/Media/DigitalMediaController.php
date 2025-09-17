<?php

namespace App\Http\Controllers\Backpanel\Media;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\DigitalMedia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class DigitalMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DigitalMedia::all();

        return view('backpanel.pages.media.digital.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.media.digital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:500',
            'cover_file' => 'required|file|mimes:jpg,jpeg,png|max:10240',
            'media_type' => 'required|string|in:none,attachment,url',
            
            // required when type attachment
            'attachment_file' => 'nullable|required_if:media_type,attachment|file|mimes:jpg,jpeg,png|max:10240',
            'media_url' => 'nullable|required_if:media_type,url|url|max:500',
        ]);

        $digital_media = new DigitalMedia();
        $digital_media->title = $validatedData['title'];
        $digital_media->type = $validatedData['media_type'];

        if($request->hasFile('cover_file'))
        {
            $upload = $request->file('cover_file');
            $image = Image::read($upload)
                ->scaleDown(height: 1080);

            $path = 'digital_media/cover-' . Str::random() . '.webp';
            Storage::disk('public')->put(
                $path,
                (string)$image->toWebp(100)
            );

            $digital_media->cover_path = $path;
        }

        if ($digital_media->type === 'attachment' && $request->hasFile('attachment_file')) {
            $upload = $request->file('attachment_file');
            $dir_path = 'digital_media/attachments/';
            $file_name = Str::random() . '.' . $upload->getClientOriginalExtension();
            Storage::disk('public')->putFileAs(
                $dir_path,
                $upload,
                $file_name
            );

            $digital_media->attachment_path = $dir_path . $file_name;
        } elseif ($digital_media->type === 'url') {
            $digital_media->url = $validatedData['media_url'];
        }

        $digital_media->save();

        SessionHelper::common_flasher('create', 'Postingan Media Digital');
        return redirect()->route('backpanel.media.digital.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DigitalMedia $digital_media)
    {
        return view('backpanel.pages.media.digital.edit', compact('digital_media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DigitalMedia $digital_media)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:500',
            'cover_file' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'media_type' => 'required|string|in:none,attachment,url',
            
            // required when type attachment
            'attachment_file' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            'media_url' => 'nullable|required_if:media_type,url|url|max:500',
        ]);

        $previousType = $digital_media->type;
        $digital_media->title = $validatedData['title'];
        $digital_media->type = $validatedData['media_type'];

        if($request->hasFile('cover_file'))
        {
            // remove old cover_file
            if(Storage::exists($digital_media->cover_path)) {
                Storage::disk('public')->delete($digital_media->cover_path);
            }

            $upload = $request->file('cover_file');
            $image = Image::read($upload)
                ->scaleDown(height: 1080);

            $path = 'digital_media/cover-' . Str::random() . '.webp';
            Storage::disk('public')->put(
                $path,
                (string)$image->toWebp(100)
            );

            $digital_media->cover_path = $path;
        }

        if ($digital_media->type === 'attachment' && $request->hasFile('attachment_file')) {
            // remove old attachment
            if ($previousType === 'attachment' && $digital_media->attachment_path) {
                if(Storage::disk('public')->exists($digital_media->attachment_path)) {
                    Storage::disk('public')->delete($digital_media->attachment_path);
                }
            }

            $upload = $request->file('attachment_file');
            $dir_path = 'digital_media/attachments/';
            $file_name = Str::random() . '.' . $upload->getClientOriginalExtension();
            Storage::disk('public')->putFileAs(
                $dir_path,
                $upload,
                $file_name
            );

            $digital_media->attachment_path = $dir_path . $file_name;

            if($previousType === 'url')
            {
                $digital_media->url = null;
            }
        } elseif ($digital_media->type === 'url') {
            // remove old attachment when type changed
            if ($previousType === 'attachment' && $digital_media->attachment_path) {
                if(Storage::disk('public')->exists($digital_media->attachment_path)) {
                    Storage::disk('public')->delete($digital_media->attachment_path);
                }

                $digital_media->attachment_path = null;
            }

            $digital_media->url = $validatedData['media_url'];
        } elseif ($digital_media->type === 'none') {
            // remove old attachment when type changed
            if ($previousType === 'attachment' && $digital_media->attachment_path) {
                if(Storage::disk('public')->exists($digital_media->attachment_path)) {
                    Storage::disk('public')->delete($digital_media->attachment_path);
                }

                $digital_media->attachment_path = null;
            }

            $digital_media->url = null;
        }

        $digital_media->save();

        SessionHelper::common_flasher('update', 'Postingan Media Digital');
        return redirect()->route('backpanel.media.digital.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DigitalMedia $digital_media)
    {
        // remove old cover file
        if(Storage::disk('public')->exists($digital_media->cover_path)) {
            Storage::disk('public')->delete($digital_media->cover_path);
        }

        if($digital_media->attachment_path && Storage::disk('public')->exists($digital_media->attachment_path)) {
            Storage::disk('public')->delete($digital_media->attachment_path);
        }

        $digital_media->delete();

        SessionHelper::common_flasher('delete', 'Postingan Media Digital');
        return redirect()->route('backpanel.media.digital.index');
    }
}
