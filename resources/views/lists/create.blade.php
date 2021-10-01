@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New ToDo List</h1>
        <br><br><br>
        <form action="{{ route('lists.add') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">List Name</label>
                <input type="text" class="form-control" id="name" name="name" autofocus>
            </div>
            <button class="btn btn-primary" type="submit">Add</button>
        </form>
    </div>
@endsection
