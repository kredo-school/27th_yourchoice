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
                        {{-- @foreach ($all_rooms as $room) --}}
                        <tr>
                            <td>101</td>
                            <td>Single Room</td>
                            <td>$100.00</td>
                            <td>1</td>
                            <td><img src="#" alt="#" class="d-block mx-auto">
                                {{-- @if ($room->avatar)
                          <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
                              class="rounded-circle d-block mx-auto avatar-md">
                      @else
                          <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                      @endif --}}
                            </td>
                            <td>Not available</td>
                            <td>
                                {{-- editページにつながる --}}
                                <a href="{{ route('hotel.room.edit') }}" title="Edit"
                                    class="btn btn-outline-dark border-0"><i class="fa-solid fa-file-pen icon-md"></i></a>
                                {{-- deleteページにつながる --}}
                                <a href="#" title="Delete" class="btn btn-outline-dark ms-1 border-0"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                        class="fa-solid fa-trash-can icon-md"></i></a>
                                {{-- Include modal here --}}
                                @include('hotels.rooms.modals.delete')
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <!-- ページネーションエリア -->
            {{-- <div class="pagination-container"> --}}
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
            {{-- </div> --}}
        </div>
    </div>
@endsection
