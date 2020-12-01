<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin')->except('show');
    }
    public function index()
    {
        $users = User::orderBy('role')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $user->slug = null;
        $data = $request->only(['name', 'email', 'role']);
        if($request->hasFile('profile')){
            $user->deleteExistingImage();
            $image = $user->storeImage($request->profile);
            $data['profile'] = $image;
        }
        $user->update($data);
        return redirect(route('users.index'))->with('success', 'User Information has been updated');
    }

    public function confirmDelete(User $user)
    {
        return view('users.confirmDelete', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->deleteExistingImage();
        $user->delete();
        return redirect(route('users.index'))->with('success', 'A user has been deleted');
    }
}
