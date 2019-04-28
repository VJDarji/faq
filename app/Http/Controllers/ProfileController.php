<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $profile = Auth::user()->profile;
        return view('profile.index')->with('profile', $profile);
    }

    /***
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileForm() {
        return view('profile.form');
    }

    /***
     * @param Request $request
     */
    public function create(Request $request) {
        $this->validationProfile($request);

        $profile = new Profile();
        $profile->firstName = $request->firstName;
        $profile->lastName = $request->lastName;
        $profile->bio = $request->bio;
        Auth::user()
            ->profile()
            ->save($profile);

        return redirect(route('profile'));
    }

    public function edit(Request $request) {
        $this->validationProfile($request);
        $profile = Auth::user()->profile;
        if ($profile) {
            $profile->firstName = $request->firstName;
            $profile->lastName = $request->lastName;
            $profile->bio = $request->bio;
            $profile->save();
            return redirect(route('profile'));
        }
    }

    private function validationProfile(Request $request) {
        return $validatedData = $request->validate([
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'bio' => 'required',
        ]);
    }
}
