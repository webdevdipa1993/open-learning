
@section('content.modal')
<!-- Modal for adding/editing grade -->
<div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeModalLabel">Add/Edit Grade</h5>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" data-target="#gradeModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="gradeForm">
                    <input type="hidden" id="gradeId">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter grade title" required>
                    </div>

                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" placeholder="Enter grade code" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="type">Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="typeStream" value="stream" required>
                            <label class="form-check-label" for="typeStream">Stream</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="typeSemester" value="semester">
                            <label class="form-check-label" for="typeSemester">Semester</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="typeClass" value="class">
                            <label class="form-check-label" for="typeClass">Class</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="typeSection" value="section">
                            <label class="form-check-label" for="typeSection">Section</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="typeDepartment" value="department">
                            <label class="form-check-label" for="typeDepartment">Department</label>
                        </div>
                    </div>


                    <!-- Status Toggle -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="statusToggle" name="status">
                            <label class="form-check-label" for="statusToggle">Active/Inactive</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Parent Grade</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                        </select>
                    </div>

                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-target="#gradeModal">Close</button>
                <button type="submit" class="btn btn-primary saveGrade">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection