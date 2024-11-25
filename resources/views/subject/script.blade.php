@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch subjects from API and populate table
    function fetchSubjects() {
        $.ajax({
            url: '/api/subject',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, subject) {
                    rows += `<tr>
                        <th scope="row">${subject.id}</th>
                        <td>${subject.title}</td>
                        <td>${subject.code}</td>
                        <td>${subject.description}</td>
                        <td>${subject.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editSubject" data-id="${subject.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteSubject" data-id="${subject.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#subjectsTable tbody').html(rows); 
            }
        });
    }


    // Initial fetch
    fetchSubjects();


    // Show modal for adding a new subject
    $('.newSubject').click(function() {
        $('#subjectForm')[0].reset();
        $('#subjectId').val(''); // form hidden record id
        $('#subjectModal').modal('show');// modal id
    });


    // Save subject (add/edit) saveSubject
    $('.saveSubject').click(function() {
        let id = $('#subjectId').val();
        let url = id ? `/api/subject/${id}` : '/api/subject';
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
                $('#subjectModal').modal('hide');
                fetchSubjects(); // A function that fetches the list of subjects to refresh the table or view
            }
        });
    });


    // Edit subject
    $(document).on('click', '.editSubject', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/subject/${id}`,
            method: 'GET',
            success: function(data) {
                $('#subjectId').val(data.id);
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
                $('#subjectModal').modal('show');
            }
        });
    });

           
    // Delete subject
    $(document).on('click', '.deleteSubject', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/subject/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchSubjects();
            }
        });
    });
});
</script>
@endsection