@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch curriculums from API and populate table
    function fetchCurriculums() {
        $.ajax({
            url: '/api/curriculum',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, curriculum) {
                    // If `curriculum.academic_year` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no academic_year).
                    let academic_yearData = (curriculum.academic_year) 
                        ? `${curriculum.academic_year.title}` 
                        : '-NA-';

                    // If `curriculum.teacher` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no teacher).
                    let teacherData = (curriculum.teacher) 
                        ? `${curriculum.teacher.first_name} &nbsp; ${curriculum.teacher.last_name}` 
                        : '-NA-';

                    // If `curriculum.subject` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no subject).
                    let subjectData = (curriculum.subject) 
                        ? `${curriculum.subject.title}` 
                        : '-NA-';

                    // If `curriculum.department` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no department).
                    let departmentData = (curriculum.department) 
                        ? `${curriculum.department.title}` 
                        : '-NA-';
                        
                    // If `curriculum.stream` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no stream).
                    let streamData = (curriculum.stream) 
                        ? `${curriculum.stream.title}` 
                        : '-NA-';
                        
                    // If `curriculum.semester` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no semester).
                    let semesterData = (curriculum.semester) 
                        ? `${curriculum.semester.title}` 
                        : '-NA-';
                        
                    // If `curriculum.class` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no class).
                    let classData = (curriculum.class) 
                        ? `${curriculum.class.title}` 
                        : '-NA-';
                        
                    // If `curriculum.section` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no section).
                    let sectionData = (curriculum.section) 
                        ? `${curriculum.section.title}` 
                        : '-NA-';    

                    rows += `<tr>
                        <th scope="row">${curriculum.id}</th>
                        <td>${academic_yearData}</td>
                        <td>${departmentData}</td>
                        <td>${streamData}</td>
                        <td>${semesterData}</td> 
                        <td>${classData}</td>
                        <td>${sectionData}</td>
                        <td>${subjectData}</td>
                        <td>${teacherData}</td>                      
                        <td>${curriculum.title}</td>
                        <td>${curriculum.code}</td>
                        <td>${curriculum.description}</td>
                        <td>${curriculum.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editCurriculum" data-id="${curriculum.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteCurriculum" data-id="${curriculum.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#curriculumsTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchCurriculums()


    // Fetch teachers from API and populate the dropdown
    function loadTeachers(teacherId) {
        // Send an AJAX request to fetch teachers
        $.ajax({
            url: "{{ route('getTeachersForCurriculum') }}", // Endpoint to fetch teachers
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#teacher_id').empty();
                $('#teacher_id').append('<option value="">Choose Teacher</option>');

                // Loop through the teachers and populate the dropdown
                data.forEach(function(row) {
                    // Check if the teacher's ID matches the teacherId to mark it as selected
                    const selected = parseInt(teacherId) > 0 && row.id === parseInt(teacherId) ? 'selected="selected"' : '';
                    $('#teacher_id').append(`<option value="${row.id}" ${selected}>${row.first_name} ${row.last_name} [${row.employee_code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load teachers.');
            }
        });
    }

    // Fetch subjects from API and populate the dropdown
    function loadSubjects(subjectId) {
        // Send an AJAX request to fetch subjects
        $.ajax({
            url: "{{ route('getSubjectsForCurriculum') }}", // Endpoint to fetch subjects
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#subject_id').empty();
                $('#subject_id').append('<option value="">Choose Subject</option>');

                // Loop through the subjects and populate the dropdown
                data.forEach(function(row) {
                    // Check if the subject's ID matches the subjectId to mark it as selected
                    const selected = parseInt(subjectId) > 0 && row.id === parseInt(subjectId) ? 'selected="selected"' : '';
                    $('#subject_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load subjects.');
            }
        });
    }

    // Fetch academicyears from API and populate the dropdown
    function loadAcademicYears(academicYearId) {
        // Send an AJAX request to fetch academicyears
        $.ajax({
            url: "{{ route('getAcademicYearsForCurriculum') }}", // Endpoint to fetch academicyears
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#academic_year_id').empty();
                $('#academic_year_id').append('<option value="">Choose AcademicYear</option>');

                // Loop through the academicyears and populate the dropdown
                data.forEach(function(row) {
                    // Check if the academicyear's ID matches the academicYearId to mark it as selected
                    const selected = parseInt(academicYearId) > 0 && row.id === parseInt(academicYearId) ? 'selected="selected"' : '';
                    $('#academic_year_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.start_date} - ${row.end_date}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load academicyears.');
            }
        });
    }

    // Fetch streams from API and populate the dropdown
    function loadStreams(streamId) {
        // Send an AJAX request to fetch streams
        $.ajax({
            url: "{{ route('getStreamsForCurriculum') }}", // Endpoint to fetch streams
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#stream_id').empty();
                $('#stream_id').append('<option value="">Choose Streams</option>');

                // Loop through the streams and populate the dropdown
                data.forEach(function(row) {
                    // Check if the stream's ID matches the streamId to mark it as selected
                    const selected = parseInt(streamId) > 0 && row.id === parseInt(streamId) ? 'selected="selected"' : '';
                    $('#stream_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load streams.');
            }
        });
    }


    // Show modal for adding a new curriculum
    $('.newCurriculum').click(function() {
        $('#curriculumForm')[0].reset();
        $('#curriculumId').val(''); // form hidden record id

        loadTeachers();
        loadSubjects();
        loadAcademicYears();
        loadStreams();

        $('#curriculumModal').modal('show');// modal id
    });


    // Save curriculum (add/edit) saveCurriculum
    $('.saveCurriculum').click(function() {
        let id = $('#curriculumId').val();
        let url = id ? `/api/curriculum/${id}` : '/api/curriculum';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                title: $('#title').val(),
                code: $('#code').val(),
                description: $('#description').val(),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                $('#curriculumModal').modal('hide');
                fetchCurriculums(); // A function that fetches the list of curriculums to refresh the table or view
            }
        });
    });


    // Edit curriculum
    $(document).on('click', '.editCurriculum', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/curriculum/${id}`,
            method: 'GET',
            success: function(data) {
                $('#curriculumId').val(data.id);
                $('#title').val(data.title); // Setting title value
                $('#code').val(data.code); // Setting code value
                $('#description').val(data.description); // Setting description value

                // Set the status toggle based on the fetched data
                if (data.status === 'active') {
                    $('#statusToggle').prop('checked', true);
                } else {
                    $('#statusToggle').prop('checked', false);
                }

                loadTeachers(data.teacher_id);
                loadSubjects(data.subject_id);
                loadAcademicYears(data.academic_year_id);
                loadStreams(data.stream_id);

                // Show the modal
                $('#curriculumModal').modal('show');
            }
        });
    });


    // Delete curriculum
    $(document).on('click', '.deleteCurriculum', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/curriculum/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchCurriculums();
            }
        });
    });

});
</script>
@endsection

