@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch teachers from API and populate table
    function fetchTeachers() {
        $.ajax({
            url: '/api/teacher',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, teacher) {
                    rows += `<tr>
                        <th scope="row">${teacher.id}</th>
                        <td>${teacher.first_name}</td>
                        <td>${teacher.last_name}</td>
                        <td>${teacher.employee_code}</td>
                        <td>${teacher.specialization}</td>
                        <td>${teacher.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editTeacher" data-id="${teacher.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteTeacher" data-id="${teacher.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#teachersTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchTeachers();


});
</script>
@endsection
