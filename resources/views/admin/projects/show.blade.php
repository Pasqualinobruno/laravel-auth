@extends('layouts.admin')
@section('content')
    <div class="container p-2">
        <div class="card p-2">
            <div class="card-top text-center">
                <img width="300" src="{{ $project->cover_image }}" alt="">
            </div>
            <div class="card-body text-center p-3">
                <ul>
                    <li class="list-group">
                        <h3>Title</h3>
                        <div>{{ $project->title }}</div>
                        <div class="metadata">
                            <strong>Type:</strong> {{ $project->type ? $project->type->name : 'Not Type' }}
                        </div>
                    </li>
                    <li class="list-group-item py-4">
                        <h3>Content</h3>
                        <div>{{ $project->content }}</div>
                        <h3>Image</h3>

                        @if (Str::startsWith($project->cover_image, 'https://'))
                            <img loading='lazy' width="140" src="{{ $project->cover_image }}" alt="">
                        @else
                            <img loading='lazy' width="140" src="{{ asset('storage/' . $project->cover_image) }}"
                                alt="">
                        @endif
                    </li>









                </ul>










            </div>
        </div>
    </div>
@endsection
