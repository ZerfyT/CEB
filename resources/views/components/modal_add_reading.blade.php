{{-- Model - Add Meter Reading --}}
<div class="modal fade" id="modelMeterReading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="AddMeterReadingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddMeterReadingLabel">Add Meter Reading</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('mreader.saveMReading') }}">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="mb-3">
                        <label for="accNo" class="col-form-label">Account No:</label>
                        <input type="number" class="form-control" id="accNo" name="accNo">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Date:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="reading" class="col-form-label">Reading:</label>
                        <input type="number" class="form-control" id="reading" name="reading">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
