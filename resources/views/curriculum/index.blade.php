@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                    <h6 class="text-white text-capitalize ps-3">Curriculums</h6>
                    <a  class="btn btn-sm btn-primary me-3 newCurriculum">Add New</a>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <!-- Inventory Table -->
                    <table class="table table-hover" id="curriculumsTable">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ademic_year_id</th>
                                <th scope="col">Department_id</th>
                                <th scope="col">Stream_id</th>
                                <th scope="col">Semester_id</th>
                                <th scope="col">Class_id</th>
                                <th scope="col">Section_id</th>
                                <th scope="col">Subject_id</th>
                                <th scope="col">Teacher_id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>

                                 
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('curriculum.modal')
@include('curriculum.script')
