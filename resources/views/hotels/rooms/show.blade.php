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
            <a href="{{ route('rooms.create') }}" class="btn btn-sub w-100">
                <i class="fa-solid fa-plus me-1"></i>Add rooms
            </a>
        </div>

        <table class="table table-hover table-bordered align-middle bg-white text-secondary text-center table-fixed-width">
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
                    <td>
                        101
                        {{-- @if ($user->avatar)
                          <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
                              class="rounded-circle d-block mx-auto avatar-md">
                      @else
                          <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                      @endif --}}
                    </td>
                    <td>
                        Single Room
                        {{-- <a href="{{ route('profile.show', $user->id) }}"
                          class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a> --}}
                    </td>
                    <td>$100.00</td>
                    <td>1</td>
                    <td><img src="#" alt="#" class="d-block mx-auto">
                    </td>
                    <td>Not available</td>
                    <td>
                        {{-- editページにつながる --}}
                        <a href="{{ route('rooms.edit') }}" title="Edit" class="btn btn-outline-dark border-0"><i
                                class="fa-solid fa-file-pen icon-md"></i></a>
                        {{-- deleteページにつながる --}}
                        <a href="#" title="Delete" class="btn btn-outline-dark ms-1 border-0" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i class="fa-solid fa-trash-can icon-md"></i></a>
                        {{-- <a href="{{ route('author.delete', $author->id) }}" --}}
                          
                        {{-- Include modal here --}}
                        @include('hotels.rooms.modals.delete')
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
