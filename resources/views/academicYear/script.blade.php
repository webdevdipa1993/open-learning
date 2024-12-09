
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch academic years from API and populate table
    function fetchAcademicYears() {
        $.ajax({
            url: '/api/academic-year',
            method: 'GET',
            success: function(data) {
                console.log(data);
                let rows = '';
                $.each(data, function(index, academicYear) {
                    rows += `<tr>
                        <th scope="row">${academicYear.id}</th>
                        <td>${academicYear.start_date}</td>
                        <td>${academicYear.end_date}</td>
                        <td>${academicYear.title}</td>
                        <td>${academicYear.status}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editAcademicYear" data-id="${academicYear.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteAcademicYear" data-id="${academicYear.id}">Delete</button>
                        </td>
                    </tr>`;
                });
                $('#academicYearsTable tbody').html(rows); 
            }
        });
    }

    // Initial fetch
    fetchAcademicYears();



    // Show modal for adding a new academic year
    $('.newAcademicYear').click(function() {
        $('#academicYearForm')[0].reset();
        $('#academicYearId').val('');
        $('#academicYearModal').modal('show');
    });



    // Save academic year (add/edit)
    $('.saveAcademicYear').click(function() {
        let id = $('#academicYearId').val();
        let url = id ? `/api/academic-year/${id}` : '/api/academic-year';
        let method = id ? 'PUT' : 'POST';
        let status = $('#statusToggle').is(':checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            method: method,
            data: {
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                title: $('#title').val(),
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                $('#academicYearModal').modal('hide');
                fetchAcademicYears();
            }
        });
    });


    // Edit academic year
    $(document).on('click', '.editAcademicYear', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/academic-year/${id}`,
            method: 'GET',
            success: function(data) {
                $('#academicYearId').val(data.id);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#title').val(data.title);//seting value

                // Set the status toggle based on the fetched data
                if (data.status === 'active') {
                    $('#statusToggle').prop('checked', true);
                } else {
                    $('#statusToggle').prop('checked', false);
                }
                $('#academicYearModal').modal('show');
            }
        });
    });


    // Delete academic year
    $(document).on('click', '.deleteAcademicYear', function() {
        let id = $(this).data('id');
        $.ajax({
            url: `/api/academic-year/${id}`,
            method: 'DELETE',
            success: function(data) {
                fetchAcademicYears();
            }
        });
    });

});
</script>
@endsection