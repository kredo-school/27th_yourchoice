<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">

<div class="modal fade" id="advanced-search" tabindex="-1" aria-labelledby="advancedSearchLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="h5 modal-title" id="advancedSearchLabel">Your selections</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span class="badge bg-secondary">Accessibility</span>
                    {{-- <button type="button" class="btn-close" aria-label="Remove"></button> --}}
                </div>
                <div class="mb-3">
                    <div class="container mt-5">
                        <div class="price-range-container">
                            <div class="form-row">
                                <div class="slidecontainer">
                                    <div class="slider-value" id="rangeLabel"></div> <!-- スライダー値の表示 -->
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    {{-- Hotel service --}}
                    <h6>Hotel service</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tvService">
                        <label class="form-check-label" for="tvService">
                            Parking availability
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tvService">
                        <label class="form-check-label" for="tvService">
                            Luggage storage service
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tvService">
                        <label class="form-check-label" for="tvService">
                            Breakfast
                        </label>
                    </div>
                    
                    <h6>Facility & Service</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="luggageService">
                        <label class="form-check-label" for="luggageService">
                            Luggage storage service
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="tvService">
                        <label class="form-check-label" for="tvService">
                            TV
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="dryerService">
                        <label class="form-check-label" for="dryerService">
                            Dryer
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <h6>Sort by</h6>
                    <select class="form-select">
                        <option selected>Recommended</option>
                        <option value="1">Price: low to high</option>
                        <option value="2">Price: high to low</option>
                        <option value="3">Guest rating</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>