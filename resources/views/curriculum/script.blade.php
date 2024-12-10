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

                    rows += `<tr>
                        <th scope="row">${curriculum.id}</th>
                        <td>${academic_yearData}</td>
                        <td>${curriculum.department_id}</td>
                        <td>${curriculum.stream_id}</td>
                        <td>${curriculum.semester_id}</td> 
                        <td>${curriculum.class_id}</td>
                        <td>${curriculum.section_id}</td>
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

