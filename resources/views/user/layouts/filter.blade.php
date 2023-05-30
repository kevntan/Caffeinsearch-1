<div class="col-lg-3 col-md-12 col-sm-12">
    <form action="{{ url('filter') }}" method="Get">
        <h1>
            <strong>
                Filter
            </strong>
        </h1>
        <div class="card">
            <div class="card-body">
                Location
                <select class="form-select" aria-label="Default select example" name="lokasi">
                    @if (isset($lokasi))
                        <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                    @else
                        <option value="">Open this select menu</option>
                    @endif
                    <option value="Central Jakarta">Central Jakarta</option>
                    <option value="East Jakarta">East Jakarta</option>
                    <option value="North Jakarta">North Jakarta</option>
                    <option value="South Jakarta">South Jakarta</option>
                    <option value="West Jakarta">West Jakarta</option>
                </select>
                Price Range
                <select class="form-select" aria-label="Default select example" name="harga">
                    @if (isset($harga))
                        <option value="{{ $harga }}">{{ $harga }}</option>
                    @else
                        <option value="">Open this select menu</option>
                    @endif
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                Rating
                <select class="form-select" aria-label="Default select example" name="rating">
                    @if (isset($rating))
                        <option value="{{ $rating }}">{{ $rating }}</option>
                    @else
                        <option value="">Open this select menu</option>
                    @endif
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                WFC Friendly
                <select class="form-select" aria-label="Default select example" name="wfcfriendly">
                    @if (isset($wfcfriendly))
                        <option value="{{ $wfcfriendly }}">{{ $wfcfriendly }}</option>
                    @else
                        <option value="">Open this select menu</option>
                    @endif
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-warning" style="width: 100%">Apply Filter</button>
            <a href="{{ url('see-all') }}" class="btn btn-light mt-2" style="width: 100%">Clear
                Filter</a>
        </div>
    </form>
</div>
