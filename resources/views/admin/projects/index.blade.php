@extends('layouts.admin')
@section('content')
    <div class="junbotron bg-dark text-white p-3 d-flex align-items-center justify-content-between">
        <h1>Project</h1>
        <a class="btn btn-primary " href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus"></i> Create</a>

    </div>


    <div class="container mt-3">
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
                            <td><img width="150" src="{{ $project->cover_image }}" alt=""></td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">View</a>
                                <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                <a href="{{ route('admin.projects.show', $project) }}">Delet</a>

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
