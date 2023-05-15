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
                    <option value="">Open this select menu</option>
                    <option value="one">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                Price Range
                <select class="form-select" aria-label="Default select example" name="harga">
                    <option value="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                Rating
                <select class="form-select" aria-label="Default select example" name="rating">
                    <option value="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                WFC Friendly
                <select class="form-select" aria-label="Default select example" name="wfcfriendly">
                    <option value="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-warning" style="width: 100%">Apply Filter</button>
            <button type="reset" class="btn btn-light mt-2" style="width: 100%">Clear
                Filter</button>
        </div>
    </form>
</div>
