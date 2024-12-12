@extends('layouts.hotel')

@section('content')

<h1 class="mb-4">Edit Prices</h1>
<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-outline-secondary">&lt;</button>
    <button class="btn btn-outline-secondary">&gt;</button>
</div>
<form action="#" method="POST">
    @csrf
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
                    
                    <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-75" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                   
                </tr>
                <tr>
                    <td>Double Room</td>
                    
                    <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                   
                </tr>
                <tr>
                    <td>Twin Room</td>
                    
                    <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center w-50" />
                                   %
                        </td>
                </tr>
          
        </tbody>
    </table>
    <div class="text-end">
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="#" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@endsection