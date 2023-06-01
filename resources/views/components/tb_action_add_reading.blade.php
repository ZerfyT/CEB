{{-- <div class="btn-group">
    <a href="#" class="btn btn-sm btn-outline-danger">Add Reading</a>
</div> --}}
<button class="btn btn-sm btn-outline-success rounded" type="button" data-bs-toggle="modal"
    data-bs-target="#modelMeterReading" data-user-id={{ $user->id }} data-acc-num={{ $user->account_number }}><i
        class="bi bi-plus-lg mx-1"></i>Add Reading
</button>
