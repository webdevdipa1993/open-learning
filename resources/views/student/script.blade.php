@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch students from API and populate table
    function fetchStudents() {
        $.ajax({
            url: '/api/student',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index,student ) {
                    // If `student.academic_year` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no academic_year).
                    let academic_yearData = (student.academic_year) 
                        ? `${student.academic_year.title}` 
                        : '-NA-';
                    
                    // If `student.department` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no department).
                    let departmentData = (student.department) 
                        ? `${student.department.title}` 
                        : '-NA-';
                        
                    // If `student.stream` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no stream).
                    let streamData = (student.stream) 
                        ? `${student.stream.title}` 
                        : '-NA-';
                        
                    // If `student.semester` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no semester).
                    let semesterData = (student.semester) 
                        ? `${student.semester.title}` 
                        : '-NA-';
                        
                    // If `student.class` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no class).
                    let classData = (student.class) 
                        ? `${student.class.title}` 
                        : '-NA-';
                        
                    // If `student.section` exists, display its title, code, and type.
                    // Otherwise, set it to an empty string (no section).
                    let sectionData = (student.section) 
                        ? `${student.section.title}` 
                        : '-NA-';    

                    rows += `<tr>
                        <th scope="row">${student.id}</th>
                        <td>${student.first_name}</td>
                        <td>${student.last_name}</td>
                        <td>${student.date_of_birth}</td>
                        <td>${student.gender}</td>
                        <td>${academic_yearData}</td>
                        <td>${departmentData}</td>
                        <td>${streamData}</td>
                        <td>${semesterData}</td> 
                        <td>${classData}</td>
                        <td>${sectionData}</td>
                        <td>${student.status}</td>
                        
                        <td>
                            <button class="btn btn-sm btn-warning editStudent" data-id="${student.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteStudent" data-id="${student.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#studentsTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchStudents();

    // Fetch academicyears from API and populate the dropdown
    function loadAcademicYears(academicYearId) {
        // Send an AJAX request to fetch academicyears
        $.ajax({
            url: "{{ route('getAcademicYearsForStudent') }}", // Endpoint to fetch academicyears
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
            url: "{{ route('getStreamsForStudent') }}", // Endpoint to fetch streams
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

    // Fetch departments from API and populate the dropdown
    function loadDepartments(departmentId) {
        // Send an AJAX request to fetch departments
        $.ajax({
            url: "{{ route('getDepartmentsForStudent') }}", // Endpoint to fetch departments
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#department_id').empty();
                $('#department_id').append('<option value="">Choose Departments</option>');

                // Loop through the departments and populate the dropdown
                data.forEach(function(row) {
                    // Check if the department's ID matches the departmentId to mark it as selected
                    const selected = parseInt(departmentId) > 0 && row.id === parseInt(departmentId) ? 'selected="selected"' : '';
                    $('#department_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load departments.');
            }
        });
    }

    // Fetch semesters from API and populate the dropdown
    function loadSemesters(semesterId) {
        // Send an AJAX request to fetch semesters
        $.ajax({
            url: "{{ route('getSemestersForStudent') }}", // Endpoint to fetch semesters
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#semester_id').empty();
                $('#semester_id').append('<option value="">Choose Semesters</option>');

                // Loop through the semesters and populate the dropdown
                data.forEach(function(row) {
                    // Check if the semester's ID matches the semesterId to mark it as selected
                    const selected = parseInt(semesterId) > 0 && row.id === parseInt(semesterId) ? 'selected="selected"' : '';
                    $('#semester_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load semesters.');
            }
        });
    }

    // Fetch sections from API and populate the dropdown
    function loadSections(sectionId) {
        // Send an AJAX request to fetch sections
        $.ajax({
            url: "{{ route('getSectionsForStudent') }}", // Endpoint to fetch sections
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#section_id').empty();
                $('#section_id').append('<option value="">Choose Sections</option>');

                // Loop through the sections and populate the dropdown
                data.forEach(function(row) {
                    // Check if the section's ID matches the sectionId to mark it as selected
                    const selected = parseInt(sectionId) > 0 && row.id === parseInt(sectionId) ? 'selected="selected"' : '';
                    $('#section_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load sections.');
            }
        });
    }

    // Fetch classes from API and populate the dropdown
    function loadClasses(classId) {
        // Send an AJAX request to fetch classes
        $.ajax({
            url: "{{ route('getClassesForStudent') }}", // Endpoint to fetch classes
            method: 'GET',
            success: function(data) {
                // Clear the dropdown and add the default option
                $('#class_id').empty();
                $('#class_id').append('<option value="">Choose classes</option>');

                // Loop through the classes and populate the dropdown
                data.forEach(function(row) {
                    // Check if the class's ID matches the classId to mark it as selected
                    const selected = parseInt(classId) > 0 && row.id === parseInt(classId) ? 'selected="selected"' : '';
                    $('#class_id').append(`<option value="${row.id}" ${selected}>${row.title} [${row.code}]</option>`);
                });
            },
            error: function() {
                // Handle the error case
                alert('Failed to load classes.');
            }
        });
    }

    // Show modal for adding a new student
    $('.newStudent').click(function() {
        $('#studentForm')[0].reset();
        $('#studentId').val('');
        
        loadAcademicYears();
        loadStreams();
        loadDepartments();
        loadSemesters();
        loadSections();
        loadClasses();

        $('#studentModal').modal('show');
    });


    // Save student (add/edit)
    $('.saveStudent').click(function() {
        let id = $('#studentId').val();
        let url = id ? `/api/student/${id}` : '/api/student';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                date_of_birth: $('#date_of_birth').val(),
                gender: $('#gender').val(),
                status: status,
                academic_year_id: $('#academic_year_id').val(),
                department_id: $('#department_id').val(),
                stream_id: $('#stream_id').val(),
                semester_id: $('#semester_id').val(),
                class_id: $('#class_id').val(),
                section_id: $('#section_id').val(),
                _token: '{{ csrf_token() }}' // Laravel CSRF token
            },
            success: function() {
                $('#studentModal').modal('hide');
                fetchStudents();
            }
        });
    });


    // Edit student
    $(document).on('click', '.editStudent', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/student/${id}`,
            method: 'GET',
            success: function(data) {
                $('#studentId').val(data.id); // Hidden input for student ID
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#date_of_birth').val(data.date_of_birth); // Ensure the format is 'YYYY-MM-DD'
                $('#gender').val(data.gender); // Select the appropriate option in the dropdown

                // Set the status toggle based on the fetched data
                if (data.status === 'active') {
                    $('#statusToggle').prop('checked', true);
                } else {
                    $('#statusToggle').prop('checked', false);
                }
                
                loadAcademicYears(data.academic_year_id);
                loadStreams(data.stream_id);
                loadDepartments(data.department_id);
                loadSemesters(data.semester_id);
                loadSections(data.section_id);
                loadClasses(data.class_id);

                $('#studentModal').modal('show');
            }
        });
    });

  



    // Delete student
    $(document).on('click', '.deleteStudent', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/student/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchStudents();
            }
        });
    });


});
</script>
@endsection
