<?php

namespace App\Http\Controllers\Backpanel;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HeroSlider::orderBy('index')->get();

        return view('backpanel.pages.hero_sliders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.hero_sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:jpg,jpeg,png|max:10240',
            'index' => 'required|integer|min:1',
        ]);

        $slider = new HeroSlider();
        $slider->name = $validatedData['name'];
        $slider->index = $validatedData['index'] ?? 1;

        // upload image convert to webp
        if ($request->hasFile('file')) {
            $upload = $request->file('file');
            $image = Image::read($upload)
                ->scaleDown(height: 1080);

            $path = 'home_sliders/' . Str::random() . '.webp';
            Storage::disk('public')->put(
                $path,
                (string)$image->toWebp(100)
            );

            $slider->path = $path;
        }

        $slider->save();

        SessionHelper::common_flasher('create', 'Hero Slider');
        return redirect()->route('backpanel.website_settings.hero_sliders.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSlider $hero_slider)
    {
        return view('backpanel.pages.hero_sliders.edit', compact('hero_slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSlider $hero_slider)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpg,jpeg,png|max:10240',
            'index' => 'required|integer|min:1',
        ]);

        $hero_slider->name = $validatedData['name'];
        $hero_slider->index = $validatedData['index'] ?? 1;

        // upload image convert to webp
        if ($request->hasFile('file')) {
            // remove old file
            if (Storage::disk('public')->exists($hero_slider->path)) {
                Storage::disk('public')->delete($hero_slider->path);
            }

            $upload = $request->file('file');
            $image = Image::read($upload)
                ->scaleDown(height: 1080);

            $path = 'home_sliders/' . Str::random() . '.webp';
            Storage::disk('public')->put(
                $path,
                (string)$image->toWebp(100)
            );

            $hero_slider->path = $path;
        }

        $hero_slider->save();

        SessionHelper::common_flasher('update', 'Hero Slider');
        return redirect()->route('backpanel.website_settings.hero_sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $hero_slider = HeroSlider::findOrFail($id);

        // remove old file
        if (Storage::disk('public')->exists($hero_slider->path)) {
            Storage::disk('public')->delete($hero_slider->path);
        }
        
        $hero_slider->delete();

        SessionHelper::common_flasher('delete', 'Hero Slider');
        return redirect()->route('backpanel.website_settings.hero_sliders.index');
    }
}
