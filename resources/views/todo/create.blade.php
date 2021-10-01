@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('todo.add', $actualid) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="list">Select a list</label>
                <select name="list" id="list" class="form-control">
                    @foreach($lists as $list)
                        <option value="{{ $list->id }}" @if($list->id == $actualid){{{ "selected" }}}@endif >{{ $list->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" autofocus>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Describe here..."></textarea>
            </div>
            <div class="form-group">
                <label for="start">Begin</label>
                <input type="datetime-local" name="start" id="start">
            </div>
            <div class="form-group">
                <label for="end">End</label>
                <input type="datetime-local" name="end" id="end">
            </div>
            <button class="btn btn-success" type="submit">Add</button>
        </form>
    </div>
@endsection
