<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
use App\P_History;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();
      
        unset($form['_token']);
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find(Auth::id());
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find(Auth::id());
        $profile_form = $request->all();
        unset($profile_form['_token']);
        unset($profile_form['remove']);
        $profile->fill($profile_form)->save();
        $history = new P_History;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        return redirect('admin/profile/edit');
    }
    public function delete(Request $request)
    {
        $profile = profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile/edit');
    }
}
