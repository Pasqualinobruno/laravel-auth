@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titlehelpId"
                    placeholder="comics title" />
                <small id="titlehelpId" class="form-text text-muted">Title for ypur project</small>
            </div>


            <div class="mb-3">
                <label for="body" class="form-label">content</label>
                <textarea class="form-control" name="body" id="bodcontenty" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </form>

    </div>
@endsection
