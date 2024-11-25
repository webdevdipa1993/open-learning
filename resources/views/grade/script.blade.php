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
 
});
</script>
@endsection

