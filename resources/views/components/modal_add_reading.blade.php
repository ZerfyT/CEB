<form method="post" action="{{ route('mreader.saveMReading', ['userId' => $user->id]) }}">
    @csrf
    <div class="mb-3">
        <label for="accNo" class="col-form-label">Account No:</label>
        <input type="number" class="form-control" id="accNo" name="accNo" value="$user->account_number">
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
