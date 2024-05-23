@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-dark text-white p-3 d-flex align-items-center justify-content-between">
        <h1>Edit</h1>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">back</a>
    </div>
    <div class="container my-2">

        <form action="{{ route('admin.projects.update'), $project->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-center mb-2">
                <img width="300" src="{{ $project->cover_image }}" alt="">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titlehelpId"
                    placeholder="comics title" value="{{ $project->title }}" />
                <small id="titlehelpId" class="form-text text-muted">Title for ypur project</small>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">content</label>
                <textarea class="form-control" name="content" id="content" rows="4">{{ $project->content }}</textarea>

            </div>

            <button type="submit" class="btn btn-primary">
                update
            </button>
        </form>

    </div>
@endsection
