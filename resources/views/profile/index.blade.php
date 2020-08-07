@extends('layouts.frontP')

@section('content')
     <table>
     <tr><th>名前</th><th>性別</th><th>趣味</th><th>自己紹介</th></tr>
     @foreach ($items as $item)
          <tr>
            <td class="name">{{$item->name}}</td>
            <td class="gender">{{$item->gender}}</td>
            <td class="hobby">{{$item->hobby}}</td>
            <td class="introduction">{{$item->introduction}}</td>
          </tr>
    @endforeach
     </table>
@endsection

                   