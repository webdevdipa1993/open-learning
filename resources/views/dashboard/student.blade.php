@extends('layouts.default')

@section('content')
<div class="container mt-5">
<div class="row">
    <div class="card">
        <div class="card-body text-center">
            
            <!-- show success -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif    
            <!-- the display message ends here -->  

            <h3 class="card-title">Welcome, <strong>AS STUDENT</strong> {{ auth()->guard('student')->user()->name }}</h3>
            <p class="card-text text-muted">{{ auth()->guard('student')->user()->email }}</p>
        </div>
    </div>
    </div>
    <!-- box number 1 -->
    <div class="row">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Admission Status</h6>
                    <p class="text-sm ">Admission Status</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div> 
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Upcoming Classes</h6>
                    <p class="text-sm ">Upcoming Classes</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div>        
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Pending Assignments</h6>
                    <p class="text-sm ">Pending Assignments</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div>        
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Recent Grades</h6>
                    <p class="text-sm ">Recent Grades</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div>        
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Payment Due Notifications</h6>
                    <p class="text-sm ">Payment Due Notifications</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div>        
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Attendance Summary</h6>
                    <p class="text-sm ">Attendance Summary</p>
                    <!-- <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="187" style="display: block; box-sizing: border-box; height: 170px; width: 437px;" width="481"></canvas>
                        </div>
                    </div> -->
                    <!-- <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                    </div> -->
                </div>
            </div>
        </div>            
    </div>
</div>
@endsection