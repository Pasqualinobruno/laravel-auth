@extends('layouts.admin')
@section('content')
    <div class="jumbotron bg-dark text-white p-3 d-flex align-items-center justify-content-between">
        <h1>Project</h1>
        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">
            <i class="fa-solid fa-plus"></i> Create
        </a>
    </div>

    <div class="container mt-3">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>
                                @if (Str::startsWith($project->cover_image, 'https://'))
                                    <img loading='lazy' width="140" src="{{ $project->cover_image }}" alt="">
                                @else
                                    <img loading='lazy' width="140" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="">
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary "> <a href="{{ route('admin.projects.show', $project) }}"
                                        class="text-white a-un">View</a>
                                </button>
                                <button class="btn btn-primary "> <a href="{{ route('admin.projects.edit', $project) }}"
                                        class="text-white a-un">Edit</a>
                                </button>

                                @include('admin.partials.delete')
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="4">No records</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
