<?php

namespace App\Http\Controllers\Backpanel;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        return view('backpanel.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // get roles from enums
        $roles_enum = array_column(RolesEnum::cases(), 'value');
        
        $roles = [];
        foreach ($roles_enum as $key) {
            $roles[] = [
                'key' => $key,
                'label' => RolesEnum::tryFrom($key)->label()
            ];
        }

        return view('backpanel.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:' . implode(',', array_column(RolesEnum::cases(), 'value')),
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('backpanel.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        // get roles from enums
        $roles_enum = array_column(RolesEnum::cases(), 'value');
        
        $roles = [];
        foreach ($roles_enum as $key) {
            $roles[] = [
                'key' => $key,
                'label' => RolesEnum::tryFrom($key)->label()
            ];
        }

        return view('backpanel.pages.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:' . implode(',', array_column(RolesEnum::cases(), 'value')),
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('backpanel.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backpanel.users.index')->with('success', 'User deleted successfully.');
    }
}
