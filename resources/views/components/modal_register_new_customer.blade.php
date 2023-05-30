<div class="modal fade" id="modelNewCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="NewCustomerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="NewCustomerLabel">Register New Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('mreader.registerCustomer') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="fname" class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="pNumber" class="col-form-label">Phone Number:</label>
                        <input type="number" class="form-control" id="pNumber" name="pNumber" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
