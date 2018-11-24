@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-5">
<form action="{{route('storesource')}}" method="POST">
    {{csrf_field()}}
    <label for="title">Tytuł</label>
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="Podaj tytuł źródła" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Dodaj</button>
    </div>
    </div>
</form>
</div>
@endsection
