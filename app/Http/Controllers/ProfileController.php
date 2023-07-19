<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $title = $user->name;
        return view('d.user.index', compact('user', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit profile';
        return view('d.user.update', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];

        $request->validate([
            'avatar' => [File::image()
                ->max(3 * 1024)]
        ]);

        if ($request->file('avatar')) {
            if ($user->avatar != null) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('uploads');
        }

        $user->update();

        return redirect('/profile')->with('success', 'Your profile was changed!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->avatar) {
            // Hapus avatar dari penyimpanan
            Storage::delete($user->avatar);

            // Hapus entri avatar dari model pengguna
            $user->avatar = null;
            $user->save();
        }

        return redirect()->back();
    }
}
