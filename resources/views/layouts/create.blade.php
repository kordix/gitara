@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-5">
<form action="{{route('store')}}" method="post">

    {{csrf_field()}}

<div class="form-group">
    <label for="title">Tytuł utworu</label>
    <input type="text" class="form-control" name="title" autocomplete="off">
</div>
<div class="form-group">
    <label for="description" requested>Opis</label>
    <input type="text" class="form-control" name="description" autocomplete="off">
</div>
<div class="form-group">
    <label for="category">Kategoria</label>
    <select name="category" id="">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="age">Wiek</label>
    <select name="age" id="">
        @foreach($ages as $age)
            <option value="{{$age->id}}">{{$age->title}}</option>
        @endforeach
    </select>
</div>



<div class="form-group">
    <label for="link">Link</label>
    <input type="text" name="link" value="-" style="width:350px">
</div>

<div class="form-group">
    <input type="hidden" name="master" value="1">
</div>



<div class="form-group">
    <label for="magiel">Magiel</label>
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
    <option value="{{$source->id}}">{{$source->title}}</option>
@endforeach
    </select>
</div>

<div class="form-group">
    <label for="source">Składanka:</label>
    <select name="collection">
    @foreach($collections as $collection)
    <option value="{{$collection->id}}">{{$collection->title}}</option>
@endforeach
    </select>
</div>


<button type="submit" class="btn btn-info">Dodaj</button>
</form>
</div>

</div>
@endsection
