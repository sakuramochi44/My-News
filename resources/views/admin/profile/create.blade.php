<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=""width=device-width, initial-scale=1"">

        <title>MyNews</title>
    </head>
    <body>
        <h1>ニュース新規作成</h1>
    </body>
</html>
{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                       <ul>
                           @foreach($errors->all() as $e)
                             <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                            <textarea class="form-control" name="hobby" rows="20">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                         <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <inrut type="submit" class="btn btn-primary" value="更新"></inrut>
                    </div>
                    </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection