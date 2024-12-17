
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter curriculum Title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" placeholder="Enter curriculum Code" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="4" placeholder="Enter curriculum Description" required></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Teacher => teacher_id -->
                            <div class="form-group">
                                <label for="teacher_id">Select Teacher</label>
                                <select class="form-control" id="teacher_id" name="teacher_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Subject => subject_id -->
                            <div class="form-group">
                                <label for="subject_id">Select Subject</label>
                                <select class="form-control" id="subject_id" name="subject_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- AcademicYear => academic_year_id -->
                            <div class="form-group">
                                <label for="academic_year_id">Select Academic Year</label>
                                <select class="form-control" id="academic_year_id" name="academic_year_id">
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Grade => stream_id -->
                            <div class="form-group">
                                <label for="stream_id">Select Stream</label>
                                <select class="form-control" id="stream_id" name="stream_id">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Grade => department_id -->
                            <div class="form-group">
                                <label for="department_id">Select Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Grade => semester_id -->
                            <div class="form-group">
                                <label for="semester_id">Select Semester</label>
                                <select class="form-control" id="semester_id" name="semester_id">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Grade => section_id -->
                            <div class="form-group">
                                <label for="section_id">Select Section </label>
                                <select class="form-control" id="section_id" name="section_id">
                                </select>
                            </div>
                        </div>

                        <?php /*
                        <div class="col-md-4">
                            <!-- Grade => class_id -->
                            <div class="form-group">
                                <label for="academic_year_id">Select Academic Year</label>
                                <select class="form-control" id="academic_year_id" name="academic_year_id">
                                </select>
                            </div>
                        </div>
                        
                        */ ?>

                        <div class="col-md-4">
                            <!-- Status Toggle -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="statusToggle" name="status">
                                    <label class="form-check-label" for="statusToggle">Active/Inactive</label>
                                </div>
                            </div>
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