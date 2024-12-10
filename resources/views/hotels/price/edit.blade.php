@extends('layouts.hotel')

@section('content')

<h1 class="mb-4">Edit Prices</h1>
<form action="#" method="POST">
    @csrf
    <table class="table table-bordered">
        <thead class="header-row">
            <tr>
                <th>Room Type</th>
            
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
                    <th>11/1(mon)</th>
            
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td>Single Room</td>
                    
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                   
                </tr>
                <tr>
                    <td>Double Room</td>
                    
                    <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                   
                </tr>
                <tr>
                    <td>Twin Room</td>
                    
                    <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
                        </td>
                        <td>
                            <input type="number" name="" value="" 
                                   class="form-control text-center" />
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