<!-- Delete Modal -->
<link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
<div class="modal fade" id="delete-reservation-{{$reservation->id}}">
    <form method="POST" action="{{ route('hotel.reservation.cancel', $reservation->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <i class="fa-solid fa-triangle-exclamation icon-lg mt-5"></i>
                <h3 class="modal-message mt-5 text-center">Are you sure you want to delete this block?<br>This action cannot be
                    undone.</h3>
                    <input type="hidden" name="date" value="{{ request('date', $reservation->check_in_date ?? $date) }}">
                <div class="justify-content-center d-flex mt-5 mb-5">
                    <button type="button" class="btn btn-sub2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-main ms-2" onclick="confirmDelete()">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>
