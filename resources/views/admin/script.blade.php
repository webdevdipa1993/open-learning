@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch admins from API and populate table
    function fetchAdmins() {
        $.ajax({
            url: '/api/admin',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, admin) {
                    rows += `<tr>
                        <th scope="row">${admin.id}</th>
                        <td>${admin.first_name}</td>
                        <td>${admin.last_name}</td>
                        <td>${admin.employee_code}</td>
                        <td>${admin.specialization}</td>
                        <td>${admin.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editAdmin" data-id="${admin.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteAdmin" data-id="${admin.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#adminsTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchAdmins();

    // Show modal for adding a new admin
    $('.newAdmin').click(function() {
        $('#adminForm')[0].reset();
        $('#adminId').val('');
        $('#adminModal').modal('show');
    });

    // Save admin (add/edit)
    $('.saveAdmin').click(function() {
        let id = $('#adminId').val();
        let url = id ? `/api/admin/${id}` : '/api/admin';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                employee_code: $('#employee_code').val(),
                specialization: $('#specialization').val(),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                $('#adminModal').modal('hide');
                fetchAdmins();
            }
        });
    });


    // Edit admin
    $(document).on('click', '.editAdmin', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/admin/${id}`,
            method: 'GET',
            success: function(data) {
                $('#adminId').val(data.id);
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
                $('#adminModal').modal('show');
            }
        });
    });


    // Delete admin
    $(document).on('click', '.deleteAdmin', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/admin/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchAdmins();
            }
        });
    });


});
</script>
@endsection
