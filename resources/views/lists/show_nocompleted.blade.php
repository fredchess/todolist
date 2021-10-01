@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $list->name }} <span @class(['badge', 'badge-success' => $list->saved, 'badge-danger' => ($list->saved == false)]) id="badge">{{ "OK" }}</span></h1>
        <br><br><br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">state</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Creator</th>
                <th scope="col">Creation Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <th scope="row">{{ $todo->id }}</th>
                    <td><a href="{{ route('todo.show', [$list->id, $todo->id]) }}">{{ $todo->title }}</a></td>
                    <td>{{ $todo->state }}</td>
                    <td>{{ $todo->start }}</td>
                    <td>{{ $todo->end }}</td>
                    <td>{{ $creator }}</td>
                    <td>{{ $todo->created_at }}</td>
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
        <div style="display: flex;">
            <a href="{{ route('list.show.completed', $list->id) }}">Completed Todos</a>
            <a href="{{ route('list.show.nocompleted', $list->id) }}">No Completed Todos</a>
            <a href="{{ route('list.show.running', $list->id) }}">Todos in running</a>
        </div>
    </div>
@endsection
