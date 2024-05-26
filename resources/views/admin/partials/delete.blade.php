<!-- Modal trigger button -->
<button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#modal-{{ $project->id }}">
    Trash
</button>

<!-- Modal Body -->
<div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" aria-labelledby="modalTitle-{{ $project->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                    Deleting Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You are about to delete this project forever and ever.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
