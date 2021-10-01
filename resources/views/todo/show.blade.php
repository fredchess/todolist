<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $todo->title }} <span @class(['badge', 'badge-success' => ($todo->state == 'completed'), 'badge-danger' => ($todo->state != 'completed')]) id="badge">{{ $todo->state }}</span></h1>
        <br><br><br>
        <p>
            {{ $todo->description }}
        </p>
        <br><br>
        <div id="btncomplete">
            @if($list->saved == false && ( $todo->state == 'no completed' || $todo->state == 'progress' ))
                <button type="button" class="btn btn-success" id="btncomplete" data="{{ $todo->id }}">Complete</button>
            @endif
        </div>
    </div>
@endsection

