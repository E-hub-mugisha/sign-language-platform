@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4">Admin Dashboard</h2>

    <!-- Stats Overview -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow rounded">
                <div class="card-body">
                    <h5>Total Users</h5>
                    <h3>{{ $usersCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow rounded">
                <div class="card-body">
                    <h5>Total Lessons</h5>
                    <h3>{{ $totalLessons ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info shadow rounded">
                <div class="card-body">
                    <h5>Total Tips</h5>
                    <h3>{{ $tipsCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow rounded">
                <div class="card-body">
                    <h5>Active Instructors</h5>
                    <h3>{{ $instructorsCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5>User Registrations (Monthly)</h5>
                </div>
                <div class="card-body">
                    <canvas id="usersChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-header">
                    <h5>Lessons Added (Monthly)</h5>
                </div>
                <div class="card-body">
                    <canvas id="lessonsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('users.index') }}" class="btn btn-lg btn-outline-primary w-100 mb-3">Manage Users</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('lessons.index') }}" class="btn btn-lg btn-outline-success w-100 mb-3">Manage Lessons</a>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-lg btn-outline-info w-100 mb-3">Manage Tips</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Users Chart
    var ctxUsers = document.getElementById('usersChart').getContext('2d');
    new Chart(ctxUsers, {
        type: 'line',
        data: {
            labels: {!! json_encode($months ?? []) !!},
            datasets: [{
                label: 'Users',
                data: {!! json_encode($userData ?? []) !!},
                borderColor: 'blue',
                fill: false,
                tension: 0.2
            }]
        }
    });

    // Lessons Chart
    var ctxLessons = document.getElementById('lessonsChart').getContext('2d');
    new Chart(ctxLessons, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months ?? []) !!},
            datasets: [{
                label: 'Lessons',
                data: {!! json_encode($lessonData ?? []) !!},
                backgroundColor: 'green'
            }]
        }
    });
</script>
@endsection
