<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make('123123123');
        User::create($data);

        return Redirect::route('dashboard');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::FindOrFail($id);

        return view('users.edit')
            ->with('user', $user);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = User::FindOrFail($request->id);
        $user->update($request->except('_token'));

        return Redirect::route('dashboard');
    }

    /**
     * @param String $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        User::FindOrFail($request->id)->delete();

        return Redirect::route('dashboard');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function activity($id)
    {
        $user = User::FindOrFail($id)->with('activity')->first();

        return view('users.activity')
            ->with('user', $user);
    }
}
