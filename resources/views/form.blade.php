@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Disneyplus Shows
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <form action="{{route('disneyplus.store') }}" method="post">
        <div class="form-group">
            @csrf
            <label for="name">Show Name</label>
            <input type="text" name="show_name" id="show_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Show price</label>
            <input type="text" name="series" class="form-control">
        </div>
        <div class="form-group">
            <label for="quantity">Show Lead Actor :</label>
            <input type="text" class="form-control" name="lead_actor"/>
        </div>
        <button type="submit" class="btn btn-primary">Create Show</button>
    </form>
@endsection