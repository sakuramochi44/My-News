<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Profile;
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
      $profile->fill($form->all())->save();
      $profile->save();
      return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
     return view('admin.profile.edit', ['profile_form' => $profile]);
    }
     public function update(Request $request)
{
  $this->validate($request, Profile::$rules);
  $profile = Profile::find(Auth::id());
   $profile_form = $request->all();
  if (isset($profile_form['image'])) {
    $path = $request->file('image')->store('public/image');
    $profile->image_path = basename($path);
    unset($profile_form['image']);
  }elseif (isset($request->remove)) {
    $profile->image_path = null;
    unset($profile_form['remove']);
  }
  unset($profile_form['_token']);
  $profile->fill($profile_form)->save();
  return redirect('admin/profile/edit');
}
  public function delete(Request $request)
{
  $profile = profile::find($request->id);
  $profile->delete();
  return redirect('admin/profile/edit');
}
}


