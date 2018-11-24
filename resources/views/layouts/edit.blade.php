@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-5">
<form action="{{route('update', $position->id)}}" method="post">

    {{csrf_field()}}
    {{method_field('PATCH')}}

<div class="form-group">
    <label for="title">Tytuł utworu (id={{$position->id}})</label>
    <input type="text" value="{{$position->title}}" class="form-control" name="title" autocomplete="off">
</div>
<div class="form-group">
    <label for="description" requested>Opis</label>
    <textarea type="text" class="form-control" name="description" style="height:200px">{{$position->description}}</textarea>
</div>
<div class="form-group">
    <label for="category">Kategoria</label>
    <select name="category" id="">
        <option value="{{$position->category_id}}">{{App\Category::find($position->category_id)->title}}</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="age">Wiek</label>
    <select name="age" id="">
        @foreach($ages as $age)
            <option value="{{$age->id}}" @if($age->id==$position->age_id) selected @endif>{{$age->title}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="age">Naumiane:</label>
    <select name="master" id="">
        @foreach($masters as $master)
            <option value="{{$master->id}}">{{$master->title}}</option>
        @endforeach
    </select>

</div>
<div class="form-group">
    <label for="age">Magiel</label>
    <select name="magiel">
            <option value="1">Tak</option>
            <option value="0" selected>Nie</option>
    </select>
</div>
<div class="form-group">
    <label for="kasa">Za kasę</label>
    <select name="kasa">
            <option value="0" selected>Nie</option>
            <option value="1">Tak</option>
    </select>

</div>

<div class="form-group">
    <label for="source">Source</label>
    <select name="source">
    @foreach($sources as $source)
    <option value="{{$source->id}}" @if($source->id==$position->source_id) selected @endif>{{$source->id}} {{ $source->title}}</option>
@endforeach
    </select>
</div>

<div class="form-group">
    <label for="source">Składanka:</label>
    <select name="collection">
    @foreach($collections as $collection)
    <option value="{{$collection->id}}" @if($collection->id==$position->kolekcja_id) selected @endif>{{$collection->id}} {{ $collection->title}}</option>
    @endforeach
    </select>
</div>



<DIV class="form-group">
    <button type="submit" class="btn btn-info">Edytuj</button>
</DIV>
</form>
<form action="{{route('delete', $position->id)}}" method="POST">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <div class="form-group">
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
</form>


</div>

</div>
@endsection
