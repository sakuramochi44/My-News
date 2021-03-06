@extends('layouts.profile')
@section('title', 'プロフィール編集')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2>プロフィールの編集</h2>
          <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
             <ul>
               @foreach($errors->all() as $e)
               <li>{{ $e }}</li>
               @endforeach
             </ul>
            @endif
            <div class="form-group row">
              <label class="col-md-2" for="name">名前</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
               </div>
            </div>
             <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                          <div class="custum-control custum-radio custom-control-inline">
                              <input type="radio" name="gender" value="女性" id="custumRadioInline1" class="custom-control-input" 
                              @if( old('gender')=='女性') checked="checked" @endif required>
                              <lavel class="custom-control-label" for="customRadioInline1">女性</lavel>
                          </div>
                           <div class="custum-control custum-radio custom-control-inline">
                              <input type="radio" name="gender" value="男性" id="custumRadioInline1" class="custom-control-input" 
                              @if( old('gender')=='男性') checked="checked" @endif required>
                              <lavel class="custom-control-label" for="customRadioInline1">男性</lavel> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="20">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                         <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                           {{ csrf_field() }}
                           <input type="submit" class="btn btn-primary" value="更新">
                      </div>
                    </div>
                </form>
                 <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->histories != NULL)
                                @foreach ($profile_form->histories as $P_history)
                                    <li class="list-group-item">{{ $P_history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                  </div>
              </div>
           </div>
        </div>
    @endsection