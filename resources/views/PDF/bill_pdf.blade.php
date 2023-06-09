<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <title>E_Bill</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="billModal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Monthly Bill</h5>
                </div>
                <div class="container">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="container mb-0 mt-3">
                                    <div class="row d-flex align-items-baseline">
                                    </div>

                                    <div class="container">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                                <h4 class="p-3">Ceylon Electricity Board</h4>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-8">
                                                <ul class="list-unstyled">
                                                    <li class="text-muted"><span class="fw-bold">Account No:</span>
                                                        <span style="color:#5d9fc5 ;"
                                                            id="userAccount">{{ $user->account_number }}</span>
                                                    </li>
                                                    <li class="text-muted"><span class="fw-bold">Full Name:</span> <span
                                                            style="color:#5d9fc5 ;"
                                                            id="userName">{{ $user->name }}</span></li>
                                                    <li class="text-muted"><span class="fw-bold">Email:</span> <span
                                                            style="color:#5d9fc5 ;"
                                                            id="userEmail">{{ $user->email }}</span></li>
                                                    <li class="text-muted"><span class="fw-bold">Address:</span> <span
                                                            style="color:#5d9fc5 ;"
                                                            id="userAddress">{{ $user->address }}</span></li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-4">
                                                <ul class="list-unstyled">
                                                    <li class="text-muted"><span class="fw-bold">Bill Id:</span> <span
                                                            style="color:#5d9fc5 ;"
                                                            id="billId">{{ $bill->id }}</span></li>
                                                    <li class="text-muted"><span class="fw-bold">Date :</span> <span
                                                            style="color:#5d9fc5 ;"
                                                            id="billNewReadingDate">{{ $bill->new_reading_date }}</span>
                                                    </li>
                                                    <li class="text-muted"><i class="fas fa-circle"
                                                            style="color:#84B0CA ;"></i> <span
                                                            class="me-1 fw-bold">Status:</span><span
                                                            class="badge bg-warning text-black fw-bold"
                                                            id="billStatus">{{ $bill->status }}
                                                        </span></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row my-2 mx-1 justify-content-center">
                                            <table class="table table-striped table-bordered">
                                                <thead style="background-color:#84B0CA ;" class="text-white">
                                                    <tr>
                                                        {{-- <th scope="col">#</th> --}}
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Meter Reading</th>
                                                        <th scope="col">Monthly Units</th>
                                                        <th scope="col">Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        {{-- <th scope="row">1</th> --}}
                                                        <td>Last</td>
                                                        <td class="text-muted"><span
                                                                id="billOldReadingDate">{{ $bill->old_reading_date }}</span>
                                                        </td>
                                                        <td class="text-muted"><span
                                                                id="billOldMeterReading">{{ $bill->old_reading }}</span>
                                                        </td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <th scope="row">2</th> --}}
                                                        <td>Current</td>
                                                        <td class="text-muted"><span
                                                                id="billNewReadingDate">{{ $bill->new_reading_date }}</span>
                                                        </td>
                                                        <td class="text-muted"><span
                                                                id="billNewMeterReading">{{ $bill->new_reading }}</span>
                                                        </td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Units</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billUnits">{{ $bill->units }}</span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Fixed Charge</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billChargeFixed">{{ $bill->charge_fixed }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Charge For Units</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billChargeForUnits">{{ $bill->charge_for_units }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Charge For Month</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billChargeForMonth">{{ $bill->charge_for_month }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Last Bill Amount</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Last Payment</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billLastPayment">{{ $bill->last_payment }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td>Balance Forward</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span
                                                                id="billBalanceForward">{{ $bill->balance_forward }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        {{-- <th scope="row">3</th> --}}
                                                        <td class="fw-bold" style="color:#ff3c2e ;">Total Charge</td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td class="text-muted"><span id=""></span></td>
                                                        <td style="color:#ff3c2e ;"><span
                                                                id="billChargeTotal">{{ $bill->charge_total }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
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

</body>

</html>
