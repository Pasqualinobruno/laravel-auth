@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-dark text-white p-3 d-flex align-items-center justify-content-between">
        <h1>Edit {{ $project->title }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Back</a>
    </div>
    <div class="container my-2">

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="d-flex justify-content-center mb-2">
                @if (Str::startsWith($project->cover_image, 'https://'))
                    <img loading='lazy' width="140" src="{{ $project->cover_image }}" alt="">
                @else
                    <img loading='lazy' width="140" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                @endif
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="coverImageHelper">
                <div id="coverImageHelper" class="form-text">Upload a cover image</div>
                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelpId"
                    placeholder="Project title" value="{{ $project->title }}">
                <small id="titleHelpId" class="form-text text-muted">Title for your project</small>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="4">{{ $project->content }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
