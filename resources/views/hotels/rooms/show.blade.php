@extends('layouts.hotel')
@section('title', 'Hotel Admin Rooms Show')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="row justify-content-between mt-2">
                <div class="col mb-2">
                    <h1 class="fw-bold">Room List</h1>
                </div>
                <div class="col-auto text-end mt-3 mb-2">
                    {{-- createページにつながる --}}
                    <a href="{{ route('hotel.room.create') }}" class="btn btn-sub w-100">
                        <i class="fa-solid fa-plus me-1"></i>Add rooms
                    </a>
                </div>

                <table
                    class="table table-hover table-bordered align-middle bg-white text-secondary text-center table-fixed-width">
                    <thead class="small table-secondary">
                        <tr>
                            <th>Room No.</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Capacity</th>
                            <th>Image</th>
                            <th>Remarks</th>
                            <th class="fixed-width"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room -> room_number }}</td>
                            <td>{{ $room -> room_type }}</td>
                            <td>{{ $room -> price }}</td>
                            <td>{{ $room -> capacity }}</td>
                            <td>
                            <img src="{{ $room -> image }}" alt="{{ $room -> image }}" class="rounded-circle d-block mx-auto avatar-md">
                            </td>
                            <td>{{ $room -> remarks }}</td>
                            <td>

                                {{-- editページにつながる --}}

                                <a href="{{ route('hotel.room.edit', $room->id) }}" title="Edit"><img
                                        src="{{ asset('images/pen-to-square-solid.svg') }}" class="icon-md"></a>

                                {{-- deleteページにつながる --}}
                                <a href="#" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><img src="{{ asset('images/trash-can-solid.svg') }}"
                                        class="icon-md ms-1"></a>
                                        
                                {{-- Include modal here --}}
                                @include('hotels.rooms.modals.delete')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <!-- ページネーションエリア -->
            <!-- {{-- <div class="pagination-container"> --}}
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">…</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            {{-- </div> --}} -->
        </div>
    </div>
@endsection
