<!-- Modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="billModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Monthly Bill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mb-2 mt-3">
                                <div class="row d-flex align-items-baseline">
                                </div>

                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                            <p class="pt-0">Ceylon Electricity Board</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-8">
                                            <ul class="list-unstyled">
                                                <li class="text-muted">To: <span
                                                        style="color:#5d9fc5 ;">{{ $logedUser->name }}</span></li>
                                                <li class="text-muted">Street, City</li>
                                                <li class="text-muted">State, Country</li>
                                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-4">
                                            {{-- <p class="text-muted">Invoice</p> --}}
                                            <ul class="list-unstyled">
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i> <span
                                                        class="fw-bold">ID:</span>#123-456</li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i> <span class="fw-bold">Creation
                                                        Date: </span>Jun 23,2021</li>
                                                <li class="text-muted"><i class="fas fa-circle"
                                                        style="color:#84B0CA ;"></i> <span
                                                        class="me-1 fw-bold">Status:</span><span
                                                        class="badge bg-warning text-black fw-bold">
                                                        Paid</span></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row my-2 mx-1 justify-content-center">
                                        <table class="table table-striped table-borderless">
                                            <thead style="background-color:#84B0CA ;" class="text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Pro Package</td>
                                                    <td>4</td>
                                                    <td>$200</td>
                                                    <td>$800</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Web hosting</td>
                                                    <td>1</td>
                                                    <td>$10</td>
                                                    <td>$10</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Consulting</td>
                                                    <td>1 year</td>
                                                    <td>$300</td>
                                                    <td>$300</td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
