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

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Employee Registration Form</h4>
                </div>

                <div class="card-body">
                    <form id="employeeForm">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Skills</label>
                                <input type="text" name="skills" class="form-control" placeholder="Laravel, React">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Basic Salary</label>
                                <input type="number" name="basic_salary" class="form-control">
                            </div>
                        </div>

                        <div id="responseMsg" class="mb-3"></div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Save Employee
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function () {

    $('#employeeForm').on('submit', function (e) {
        e.preventDefault();

        $('#responseMsg').html('');

        $.ajax({
            url: "{{ route('employees.store') }}",
            method: "POST",
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#responseMsg').html(
                    '<div class="alert alert-success">' + response.message + '</div>'
                );
                $('#employeeForm')[0].reset();
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let html = '<div class="alert alert-danger"><ul class="mb-0">';

                $.each(errors, function (key, value) {
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
