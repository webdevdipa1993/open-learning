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
                        <td>
                            <button class="btn btn-sm btn-warning editsubject" data-id="${subject.id}">Edit</button>
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