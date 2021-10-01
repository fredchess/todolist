@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @auth
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <a href="{{ route('lists.list') }}">My ToDo Lists</a>
                            <br>
                            <a href="{{ route('lists.create') }}">Create a New ToDo List</a>
                    </div>
                </div>

            @endauth
        </div>
    </div>
</div>
@endsection
