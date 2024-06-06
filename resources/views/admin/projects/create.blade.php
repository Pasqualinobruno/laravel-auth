@extends('layouts.app')

@section('content')
    <div class="jumbotron bg-dark text-white p-3 d-flex align-items-center justify-content-between">
        <h1>Create New Project</h1>
        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Back</a>
    </div>
    <div class="container my-2">
        @include('partials.error')
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelpId"
                    placeholder="Project title" value="{{ old('title') }}" />
                <small id="titleHelpId" class="form-text text-muted">Title for your project</small>
                @error('title')
                    <div class="text-damger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select " name="type_id" id="type_id">
                    <option selected>Select one</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                    @error('type_id')
                        <div class="text-damger">{{ $message }}</div>
                    @enderror


                </select>
            </div>

            <div class="mb-3 d-flex gap-3">
                @foreach ($tecnologies as $tecnology)
                    <div class="form-check ">
                        <input class="form-check-input" type="checkbox" value="{{ $tecnology->id }}"
                            id="tecnology-{{ $tecnology->id }}" name="tecnologies[]" />
                        <label class="form-check-label" for="tecnology-{{ $tecnology->id }}"> {{ $tecnology->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Choose file</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="coverImageHelper" />
                <div id="fileHelpId" class="form-text">Upload a cover image</div>
                @error('cover_image')
                    <div class="text-damger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" rows="4" placeholder="content for your project">{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-damger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </form>

    </div>
@endsection
