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
                    rows += `<tr>
                        <th scope="row">${student.id}</th>
                        <td>${student.first_name}</td>
                        <td>${student.last_name}</td>
                        <td>${student.date_of_birth}</td>
                        <td>${student.gender}</td>
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

    // Show modal for adding a new student
    $('.newStudent').click(function() {
        $('#studentForm')[0].reset();
        $('#studentId').val('');
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
