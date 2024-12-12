
@section('content.modal')
<!-- Modal for adding/editing academic year -->
<div class="modal fade" id="curriculumModal" tabindex="-1" role="dialog" aria-labelledby="curriculumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" data-target="#curriculumModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="curriculumForm">
                    <input type="hidden" id="curriculumId">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter curriculum Title" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" placeholder="Enter curriculum Code" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter curriculum Description" required></textarea>
                    </div>


                    <!-- Status Toggle -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="statusToggle" name="status">
                            <label class="form-check-label" for="statusToggle">Active/Inactive</label>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-target="#curriculumModal" >Close</button>
                <button type="submit" class="btn btn-primary saveCurriculum">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection