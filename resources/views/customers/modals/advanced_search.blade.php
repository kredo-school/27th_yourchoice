    <script>
        function updatePrice() {
            var minPrice = document.getElementById('minPrice').value;
            var maxPrice = document.getElementById('maxPrice').value;
            var priceLabel = document.getElementById('priceLabel');

            if (parseInt(minPrice) > parseInt(maxPrice)) {
                alert('Minimum price cannot be greater than maximum price.');
                return;
            }

            var maxPriceLabel = maxPrice >= 100000 ? '¥100,000+' : '¥' + parseInt(maxPrice).toLocaleString();
            priceLabel.innerHTML = '¥' + parseInt(minPrice).toLocaleString() + ' – ' + maxPriceLabel;
        }
    </script>

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
                    <button type="button" class="btn-close" aria-label="Remove"></button>
                </div>
                <div class="mb-3">
                    <div class="container mt-5">
                        <div class="price-range-container">
                            <div class="price-label" id="priceLabel">¥0 - ¥100,000+</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="minPrice">Minimum Price</label>
                                    <input type="number" class="form-control" id="minPrice" min="0" max="100000" step="1000" value="0">
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <label for="maxPrice">Maximum Price</label>
                                    <input type="number" class="form-control" id="maxPrice" min="0" max="100000" step="1000" value="100000">
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="updatePrice()">Update Price Range</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>