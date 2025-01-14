<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fas fa-circle-exclamation"></i> Cancel reservation
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this reservation?<br>
                    This action cannot be undone.</p>
            </div>

            <div class="modal-footer border-0">
                <!-- 削除フォーム -->

                <form action="{{ route('customer.reservation.cancel', $reservation->id) }}" method="POST">
                    @csrf
                    {{-- @method('cancel') --}}
                
                    <!-- キャンセルボタン -->
                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-dismiss="modal">
                        Go Back
                    </button>
                    
                    <!-- 削除ボタン -->
                    <button type="submit" class="btn btn-danger btn-sm">
                        Cancel Reservation
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
