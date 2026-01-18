<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Form</title>

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-dark">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h4 class="mb-0">Employee List</h4>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive p-2">
                            <table class="table table-bordered table-striped table-hover mb-0 text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SL</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th style="width: 100px">DOB</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Skills</th>
                                        <th>Salary</th>
                                        <th style="width: 500px">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($employees); --}}
                                    @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>{{ $employee->date_of_birth }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td>{{ $employee->skills }}</td>
                                            <td>{{ $employee->basic_salary }}</td>
                                            <td>
                                                <button class="btn btn-success">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#employeeForm').on('submit', function(e) {
                e.preventDefault();

                $('#responseMsg').html('');

                $.ajax({
                    url: "{{ route('employees.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#responseMsg').html(
                            '<div class="alert alert-success">' + response.message +
                            '</div>'
                        );
                        $('#employeeForm')[0].reset();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let html = '<div class="alert alert-danger"><ul class="mb-0">';

                        $.each(errors, function(key, value) {
                            html += '<li>' + value[0] + '</li>';
                        });

                        html += '</ul></div>';
                        $('#responseMsg').html(html);
                    }
                });
            });

        });
    </script>

</body>

</html>
