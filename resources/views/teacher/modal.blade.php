
@section('content.modal')
<!-- Modal for adding/editing teacher -->
<div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="teacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherModalLabel">Add/Edit Teacher</h5>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" data-target="#teacherModal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="teacherForm">
                    <input type="hidden" id="teacherId">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_code">Employee Code</label>
                        <input type="text" class="form-control" id="employee_code" name="employee_code" placeholder="Enter employee code" required>
                    </div>
                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Enter specialization" required>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-target="#teacherModal">Close</button>
                <button type="submit" class="btn btn-primary saveTeacher">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection