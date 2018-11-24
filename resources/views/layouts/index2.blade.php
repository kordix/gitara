@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($utwory as $utwor)
        <a href="{{route('edit',$utwor->id)}}">
        @switch($utwor->master_id)
            @case(1)
            <span class="badge badge-success">{{$utwor->title}}</span>
            @break
            @case(2)
            <span class="badge badge-danger">{{$utwor->title}}</span>
            @break
            @case(3)
            <span class="badge badge-warning">{{$utwor->title}}</span>
            @break
    @endswitch
    </a>
    @endforeach
</div>
@endsection
