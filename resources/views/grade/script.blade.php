@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch grades from API and populate table
    function fetchGrades() {
        $.ajax({
            url: '/api/grade',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, grade) {
                    rows += `<tr>
                        <th scope="row">${grade.id}</th>
                        <td>${grade.title}</td>
                        <td>${grade.code}</td>
                        <td>${grade.type}</td>
                        <td>${grade.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editGrade" data-id="${grade.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteGrade" data-id="${grade.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#gradesTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchGrades();

        // Show modal for adding a new grade
    $('.newGrade').click(function() {
        $('#gradeForm')[0].reset();
        $('#gradeId').val('');
        $('#gradeModal').modal('show');
    });

     // Save grade (add/edit)
     $('.saveGrade').click(function() {
        let id = $('#gradeId').val();
        let url = id ? `/api/grade/${id}` : '/api/grade';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                title: $('#title').val(),
                code: $('#code').val(),
                type: $('#type').val(),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                $('#gradeModal').modal('hide');
                fetchGrades();
            }
        });
    });


    // Edit grade
    $(document).on('click', '.editGrade', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/grade/${id}`,
            method: 'GET',
            success: function(data) {
                $('#gradeId').val(data.id);
                $('#title').val(data.title);
                $('#code').val(data.code);
                $(`input[name="type"][value="${data.type}"]`).prop('checked', true);

                // Set the status toggle based on the fetched data
                if (data.status === 'active') {
                    $('#statusToggle').prop('checked', true);
                } else {
                    $('#statusToggle').prop('checked', false);
                }
                $('#gradeModal').modal('show');
            }
        });
    });

    // Delete grade
    $(document).on('click', '.deleteGrade', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/grade/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchGrades();
            }
        });
    });
 

});
</script>
@endsection

