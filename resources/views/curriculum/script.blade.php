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
    fetchCurriculums();

});
</script>
@endsection

