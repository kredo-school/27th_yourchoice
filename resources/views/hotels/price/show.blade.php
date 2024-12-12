@extends('layouts.hotel')

@section('content')

<h1 class="mb-4">Price Management</h1>
<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary">&lt;</button>
    <button class="btn btn-outline-secondary">&gt;</button>
</div>
<table class="table table-bordered">
    <thead class="header-row">
    <tr>

            <th class="text-start col-2">Room Type</th>
            <th class="col-1">11/1 (Mon)</th>
            <th class="col-1">11/2 (Tue)</th>
            <th class="col-1">11/3 (Wed)</th>
            <th class="col-1">11/4 (Thu)</th>
            <th class="col-1">11/5 (Fri)</th>
            <th class="bg-primary text-white col-1">11/6 (Sat)</th>
            <th class="bg-danger text-white col-1">11/7 (Sun)</th>
           
        </tr>
    </thead>
    <tbody>
    <tr>
                <td>Single Room</td>
                
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                
            </tr>
            <tr>
                <td>Double Room</td>
                
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                
            </tr>
            <tr>
                <td>Twin Room</td>
                
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                    <td>100%</td>
                
            </tr>
    </tbody>
</table>

<a href="#" class="btn btn-primary">Edit Prices</a>

@endsection