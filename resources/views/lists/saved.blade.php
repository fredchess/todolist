@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $list->name }}</h1>
        <br><br><br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Init date</th>
                <th scope="col">Creator</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lists as $list)
                <tr>
                    <th scope="row">{{ $list->id }}</th>
                    <td><a href="{{ route('list.show', $list->id) }}">{{ $list->name }}</a></td>
                    <td>{{ $list->created_at }}</td>
                    <td>{{ $creator }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <div id="save_create_block">
            @if($list->saved == false)
                <a href="{{ route('todo.create', $list->id) }}" class="btn btn-primary">Create A ToDo Task</a>
                <button class="btn btn-success" id="btnclose" data="{{ $list->id }}">Close list</button>
            @endif
        </div>
        <div>
            <a href="{{ route('lists.create') }}" class="btn btn-info">Create a new List</a>
        </div>
        <div>
            <a href="{{ route('lists.show.saved') }}" style="margin: 10px">Show saved List</a>
            <a href="{{ route('lists.show.unsaved') }}">Show unsaved List</a>
        </div>
    </div>
@endsection
