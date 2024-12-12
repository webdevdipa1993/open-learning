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


    // Show modal for adding a new curriculum
    $('.newCurriculum').click(function() {
        $('#curriculumForm')[0].reset();
        $('#curriculumId').val(''); // form hidden record id
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

