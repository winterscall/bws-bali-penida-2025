<?php

namespace App\Http\Controllers\Backpanel;

use App\Helpers\SessionHelper;
use App\Http\Controllers\Controller;
use App\Models\SiteMenu;
use Illuminate\Http\Request;

class SiteMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SiteMenu::all();

        return view('backpanel.pages.site_menus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = SiteMenu::$TYPES;
        $parents = SiteMenu::whereNull('parent_id')->where('link_type', 'linkless')->get();
        $link_types = SiteMenu::$LINK_TYPES;

        return view('backpanel.pages.site_menus.create', compact('types', 'parents', 'link_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:site_menus,id',
            'title' => 'required|string|max:255',
            'link_type' => 'required|string|max:255',
            'external_url' => 'nullable|url|max:255',
            'index' => 'nullable|integer|min:1',
        ]);

        $site_menu = new SiteMenu();
        $site_menu->type = $validatedData['type'];
        $site_menu->title = $validatedData['title'];

        if(isset($validatedData['parent_id']))
        {
            $site_menu->parent()->associate(SiteMenu::find($validatedData['parent_id']));
        }
        else
        {
            $site_menu->parent_id = null;
        }
        $site_menu->link_type = $validatedData['link_type'];
        $site_menu->value_external_url = $validatedData['external_url'] ?? null;
        $site_menu->index = $validatedData['index'] ?? 1;
        
        $site_menu->save();

        SessionHelper::common_flasher('create', 'Menu');
        return redirect()->route('backpanel.website_settings.site_menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteMenu $site_menu)
    {
        $types = SiteMenu::$TYPES;
        $parents = SiteMenu::whereNull('parent_id')->where('link_type', 'linkless')->get();
        $link_types = SiteMenu::$LINK_TYPES;

        return view('backpanel.pages.site_menus.edit', compact('site_menu', 'types', 'parents', 'link_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteMenu $site_menu)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:site_menus,id',
            'title' => 'required|string|max:255',
            'link_type' => 'required|string|max:255',
            'external_url' => 'nullable|url|max:255',
            'index' => 'nullable|integer|min:1',
        ]);

        $site_menu->type = $validatedData['type'];
        $site_menu->title = $validatedData['title'];

        if($validatedData['parent_id'])
        {
            $site_menu->parent()->associate(SiteMenu::find($validatedData['parent_id']));
        }
        else
        {
            $site_menu->parent_id = null;
        }
        $site_menu->link_type = $validatedData['link_type'];
        $site_menu->value_external_url = $validatedData['external_url'] ?? null;
        $site_menu->index = $validatedData['index'] ?? 1;

        $site_menu->save();

        SessionHelper::common_flasher('update', 'Menu');
        return redirect()->route('backpanel.website_settings.site_menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $site_menu = SiteMenu::findOrFail($id);
        $site_menu->delete();

        SessionHelper::common_flasher('delete', 'Menu');
        return redirect()->route('backpanel.website_settings.site_menus.index');
    }
}
