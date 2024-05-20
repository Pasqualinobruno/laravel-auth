@extends('layouts.admin')
@section('content')
    <div class="container">
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
