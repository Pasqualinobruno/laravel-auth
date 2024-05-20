@extends('layouts.admin')
@section('content')
    <div class="container p-2">
        <div class="card p-2">
            <div class="card-top text-center">
                <img width="300" src="{{ $project->cover_image }}" alt="">
            </div>
            <div class="card-body text-center">
                <h3>Title</h3>
                <div>{{ $project->title }}</div>
                <h3>Content</h3>
                <div>{{ $project->content }}</div>
            </div>
        </div>
    </div>
@endsection
