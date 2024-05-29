@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-auto">
                    <img width="120" src="./milan.png" alt="">
                </div>
                <div class="col">
                    <h1 class="display-5 fw-bold">
                        Welcome to my project
                    </h1>
                    <p class="col-md-8 fs-4">This a preset package with my project</p>
                    <a href="" class="btn btn-primary btn-lg" type="button">Projects</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            @if (Str::startsWith($project->cover_image, 'https://'))
                                <img loading='lazy' class="card-img-top img-fluid" src="{{ $project->cover_image }}"
                                    alt="">
                            @else
                                <img loading='lazy' class="card-img-top img-fluid"
                                    src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                            @endif
                            <div class="card-body">
                                <h3>{{ $project->title }}</h3>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="{{ route('guest.projects.show', $project) }}"
                                    role="button">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning">No project</div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
