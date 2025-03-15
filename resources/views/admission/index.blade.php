@extends('layouts.default')

@section('content')

<div class="container mt-5">
    <h2 class="text-center">{{ $pageTitle }}</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fullName" name="full_name" required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="dob" name="dob" required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification <span class="text-danger">*</span></label>
            <select class="form-select" id="qualification" name="qualification" required>
                <option value="" disabled selected>Select your qualification</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Graduate">Graduate</option>
                <!-- Add more options as needed -->
            </select>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="documents" class="form-label">Upload Documents <span class="text-danger">*</span></label>
            <input type="file" class="form-control" id="documents" name="documents[]" multiple required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <div class="mb-3">
            <label for="admissionFee" class="form-label">Admission Fee <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="admissionFee" name="admission_fee" required>
            <span class="material-icons text-success">check_circle</span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection