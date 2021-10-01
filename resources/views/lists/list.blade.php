@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My ToDo Lists</h1>
        <br><br>
        <div class="btn-group" role="group" style="margin-bottom: 10px">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a href="{{ route('lists.show.saved') }}" class="dropdown-item">Show saved List</a>
                <a href="{{ route('lists.show.unsaved') }}" class="dropdown-item">Show unsaved List</a>
            </div>
        </div>
            <div>
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
                            <tr >
                                <th scope="row">{{ $list->id }}</th>
                                <td><a href="{{ route('list.show', $list->id) }}">{{ $list->name }}</a></td>
                                <td>{{ $list->created_at }}</td>
                                <td>{{ $creator }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <br><br><br>
        <div>
            <a href="{{ route('lists.create') }}" class="btn btn-info">Create a new List</a>
        </div>
    </div>
@endsection
