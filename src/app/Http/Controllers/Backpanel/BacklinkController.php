<?php

namespace App\Http\Controllers\Backpanel;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\Backlink;
use Illuminate\Http\Request;

class BacklinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Backlink::orderBy('index')->get();

        return view('backpanel.pages.backlinks.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backpanel.pages.backlinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'index' => 'required|integer|min:1',
        ]);

        $backlink = new Backlink();
        $backlink->name = $validatedData['name'];
        $backlink->url = $validatedData['url'] ?? null;
        $backlink->index = $validatedData['index'] ?? 1;
        $backlink->save();

        SessionHelper::common_flasher('create', 'Instansi terkait');
        return redirect()->route('backpanel.website_settings.backlinks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backlink $backlink)
    {
        return view('backpanel.pages.backlinks.edit', compact('backlink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Backlink $backlink)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'index' => 'required|integer|min:1',
        ]);

        $backlink->name = $validatedData['name'];
        $backlink->url = $validatedData['url'] ?? null;
        $backlink->index = $validatedData['index'] ?? 1;

        $backlink->save();

        SessionHelper::common_flasher('update', 'Instansi terkait');
        return redirect()->route('backpanel.website_settings.backlinks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $backlink = Backlink::findOrFail($id);
        $backlink->delete();

        SessionHelper::common_flasher('delete', 'Instansi terkait');
        return redirect()->route('backpanel.website_settings.backlinks.index');
    }
}
