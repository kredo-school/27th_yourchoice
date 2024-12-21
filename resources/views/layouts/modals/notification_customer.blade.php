<div class="dropdown-menu notification-dropdown" aria-labelledby="reservationModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content modal-speech-bubble">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reservations</h5>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <div class="list-group-item">
                        <span>Canceled: C hotel</span>
                        <span class="float-right">2024-11-20 18:00</span>
                    </div>
                    <div class="list-group-item">
                        <span>Reserved: C hotel</span>
                        <span class="float-right">2024-11-18 19:00</span>
                    </div>
                    <div class="list-group-item">
                        <span>Reserved: B hotel</span>
                        <span class="float-right">2024-11-17 18:00</span>
                    </div>
                    <div class="list-group-item">
                        <span>Reserved: A hotel</span>
                        <span class="float-right">2024-11-06 18:00</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('customer.reservation.reservationlist') }}" class="btn btn-link">Go to reservation list</a>
            </div>
        </div>
    </div>
</div>