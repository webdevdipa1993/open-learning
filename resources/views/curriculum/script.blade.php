@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch grades from API and populate table
    function fetchCurriculums() {
        $.ajax({
            url: '/api/curriculum',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, curriculum) {

                    // let parentData = (grade.parent) 
                    //     ? `${grade.parent.title} [${grade.parent.code}/${grade.parent.type}]` 
                    //     : 'Top-Level Grade'; // Default text for top-level grades with no parent.

                    rows += `<tr>
                        <th scope="row">${curriculum.id}</th>
                        <td>${curriculum.academic_year_id}</td>
                        <td>${curriculum.department_id}</td>
                        <td>${curriculum.stream_id}</td>
                        <td>${curriculum.semester_id}</td> 
                        <td>${curriculum.class_id}</td>
                        <td>${curriculum.section_id}</td>
                        <td>${curriculum.subject_id}</td>
                        <td>${curriculum.teacher_id}</td>                      
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

