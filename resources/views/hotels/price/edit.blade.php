@extends('layouts.hotel')

<link rel="stylesheet" href="{{ asset('css/hotel_price.css') }}">

@section('content')

<h1 class="mb-4">Edit Prices</h1>
<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary">&lt;</button>
    <button class="btn btn-outline-secondary">&gt;</button>
</div>
<form action="{{ route('hotel.price.update') }}" method="GET">
    @csrf
    <table class="table table-bordered text-center">
        <thead > 
            <tr>
            <th class="header col-2">Room Type</th>
            <th class="header col-1">11/1 (Mon)</th>
            <th class="header col-1">11/2 (Tue)</th>
            <th class="header col-1">11/3 (Wed)</th>
            <th class="header col-1">11/4 (Thu)</th>
            <th class="header col-1">11/5 (Fri)</th>
            <th class="header saturday col-1">11/6 (Sat)</th>
            <th class="header sunday col-1">11/7 (Sun)</th>
           
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td>Single Room</td>
                    
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                   
                </tr>
                <tr>
                    <td>Double Room</td>
                    
                    <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                   
                </tr>
                <tr>
                    <td>Twin Room</td>
                    
                    <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                        <td>
                            <div class="input-with-unit">
                                <input type="number" class="form-control text-center input-box" />
                                <span class="unit">%</span>
                            </div>
                        </td>
                </tr>
          
        </tbody>
    </table>
    <div class="text-end">
        <a href="{{ route('hotel.price.show') }}" class="subbtn2">Cancel</a>
        <button type="submit" class="mainbtn">Save Changes</button>
    </div>
</form>

@endsection