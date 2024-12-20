<!-- Delete Modal -->
<link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
<div class="modal fade" id="deleteModal">
    <form method="GET" action="{{ route('hotel.room.destroy') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <i class="fa-solid fa-triangle-exclamation icon-lg mt-5"></i>
                <h3 class="modal-message mt-5">Are you sure you want to delete this room?<br>This action cannot be
                    undone.</h3>
                <div class="justify-content-center d-flex mt-5 mb-5">
                    <button class="btn btn-sub2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-main ms-2">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>
