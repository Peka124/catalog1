
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>

        <div class="metrics">
            <div class="metric">
                <div class="value">{{ $totalProducts }}</div>
                <div class="label">Total Products</div>
            </div>
            <div class="metric">
                <div class="value">{{ $totalOrders }}</div>
                <div class="label">Total Orders</div>
            </div>
            <div class="metric">
                <div class="value">{{ $totalUsers }}</div>
                <div class="label">Total Users</div>
            </div>
        </div>
    </div>
@endsection