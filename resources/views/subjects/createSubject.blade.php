@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="/home">
    {{csrf_field()}}
    <h1> Create a Subject </h1>
      <div class="form-group">
        <label>Title</label>
        <input name="title" type="text" class="form-control" placeholder="Subject Title ..." required>
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Description</label>
        <textarea name="body" class="form-control" rows="3" placeholder="Subject Description ..." required></textarea>
      </div>
      <div class="form-group">
        <label>Specialty</label>
        <select name="specialty" class="form-control" required>
        @foreach ($specialties as $specialty)
            <option value=" {{$specialty->id }} ">{{$specialty->name}}</option>
        @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection