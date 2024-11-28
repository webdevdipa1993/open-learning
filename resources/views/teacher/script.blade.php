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

    // Show modal for adding a new teacher
    $('.newTeacher').click(function() {
        $('#teacherForm')[0].reset();
        $('#teacherId').val('');
        $('#teacherModal').modal('show');
    });

    // Save teacher (add/edit)
    $('.saveTeacher').click(function() {
        let id = $('#teacherId').val();
        let url = id ? `/api/teacher/${id}` : '/api/teacher';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                employee_code: $('#employee_code').val(),
                specialization: $('#specialization').val(),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                $('#teacherModal').modal('hide');
                fetchTeachers();
            }
        });
    });


    // Edit teacher
    $(document).on('click', '.editTeacher', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/teacher/${id}`,
            method: 'GET',
            success: function(data) {
                $('#teacherId').val(data.id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#employee_code').val(data.employee_code);
                $('#specialization').val(data.specialization);//seting value

                // Set the status toggle based on the fetched data
                if (data.status === 'active') {
                    $('#statusToggle').prop('checked', true);
                } else {
                    $('#statusToggle').prop('checked', false);
                }
                $('#teacherModal').modal('show');
            }
        });
    });


    // Delete teacher
    $(document).on('click', '.deleteTeacher', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/teacher/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchTeachers();
            }
        });
    });


});
</script>
@endsection
