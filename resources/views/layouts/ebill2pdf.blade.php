<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");

        body {
            font-family: 'Poppins', sans-serif;
        }

        .bill-container {
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            color: var(--bs-gray-700);
            text-rendering: geometricPrecision;
        }

        .label {
            color: var(--bs-gray-dark);
            font-weight: normal;
            font-size: 1rem;
        }


        h4 {
            /* text-decoration: underline; */
            color: var(--bs-gray-600);
            text-align: center;
            padding: 1.1rem;
        }

        h2 {
            display: flex;
            justify-content: space-between;
            padding: 1.1rem;
            font-weight: bolder;
            font-size: 2.5rem;
            font-variant-caps: all-petite-caps;
            text-shadow: #454444 1px 1px 1px;
            border: 1px solid rgba(227, 53, 53, 0.5);
            box-shadow: rgba(227, 53, 53, 0.5) 1px 1px 1px;
        }

        h2 span {
            display: block;
            margin-left: auto;
            color: #344fa5;

        }

        .row {
            border-bottom: 1px solid var(--bs-gray-400);
        }

        .customer-info>div,
        .bill-info>div {
            display: flex;
        }

        .lkr {
            font-size: 0.9rem;
            font-weight: lighter;
        }

        #total-charge .label,
        #last-payment .label {
            font-weight: bold;
        }

        #total-charge .ms-auto,
        #last-payment .ms-auto {
            /* font-weight: bold; */
            font-size: 1.3rem;
            color: rgba(227, 53, 53, 0.7);
        }

        #total-charge {
            font-size: 1.5rem;
            /* background-color: #e7e7e7; */
            padding: 0.3rem 0;
            border: 1px rgba(227, 53, 53, 0.5) solid;
        }
    </style>
</head>

@php
    // $bill = App\Models\Bill::findOrFail(6);
    // $user = App\Models\User::findOrFail($bill->user_id);
    $dateFormat = \Carbon\Carbon::createFromFormat('Y-m-d', $bill->new_reading_date);
    $formattedDate = $dateFormat->format('Y-F-d');
    $formattedDate2 = $dateFormat->format('Y-F');
@endphp

<body>
    <div class="container p-5">
        <div class="container bill-container p-5 m-4">

            <div class="row mx-4 my-2">
                <div class="bill-header">
                    <h2>Electricity Bill <span>{{ $formattedDate2 }}</span></h2>
                </div>
            </div>

            <div class="row mx-4 my-2">

                <div class="col-12 customer-info">
                    <h4>Customer Information</h4>
                    <div>
                        <p class="label">Customer Name:</p>
                        <p class="ms-auto">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="label">Address:</p>
                        <p class="ms-auto">{{ $user->address }}</p>
                    </div>
                    <div>
                        <p class="label">Mobile Number:</p>
                        <p class="ms-auto">{{ $user->phone }}</p>
                    </div>
                    <div>
                        <p class="label">Account Number:</p>
                        <p class="ms-auto">{{ $user->account_number }}</p>
                    </div>
                    <div>
                        <p class="label">Electricity Account Type:</p>
                        <p class="ms-auto">{{ $user->account_type }}</p>
                    </div>
                </div>
            </div>

            <div class="row mx-4 my-2">
                <div class="col-12 bill-info">
                    <h4>Bill Information</h4>
                    <div>
                        <p class="label">Bill Date:</p>
                        <p class="ms-auto">{{ $formattedDate }}</p>
                    </div>
                    <div>
                        <p class="label">Latest Meter Reading:</p>
                        <p class="ms-auto">{{ $bill->new_reading }}</p>
                    </div>
                    <div>
                        <p class="label">Previous Meter Reading:</p>
                        <p class="ms-auto">{{ $bill->old_reading }}</p>
                    </div>
                    <div>
                        <p class="label">Units Consumed <span class="lkr">kWh</span>:</p>
                        <p class="ms-auto">{{ $bill->units }}</p>
                    </div>
                    <div>
                        <p class="label">Fixed Charge <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->charge_fixed }}</p>
                    </div>
                    <div>
                        <p class="label">Total Charge for Units <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->charge_for_units }}</p>
                    </div>
                    <div>
                        <p class="label">Total Charge for This Month <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->charge_for_month }}</p>
                    </div>
                    <div>
                        <p class="label">Brought Forward Balance <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->balance_forward }}</p>
                    </div>
                    <div id="last-payment">
                        <p class="label">Last Payment <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->last_payment }}</p>
                    </div>
                    <div id="total-charge">
                        <p class="label">Total <span class="lkr">LKR</span>:</p>
                        <p class="ms-auto">{{ $bill->charge_total }}</p>
                    </div>
                </div>
            </div>
            <div class="row mx-4 my-2">
                <div class="col-12 charges-breakdown">
                    <h4>Charges Breakdown</h4>
                    <table class="table text-center shadow">
                        <thead>
                            <tr>
                                <th>Units <span class="lkr">kWh</span></th>
                                <th>Price per Unit <span class="lkr">LKR</span></th>
                                <th>Total Charge <span class="lkr">LKR</span></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td>0 - 30</td>
                                <td>20.0</td>
                                <td>{{ $bill->range_one_cost }}</td>
                            </tr>
                            <tr>
                                <td>30 - 60</td>
                                <td>35.0</td>
                                <td>{{ $bill->range_two_cost }}</td>
                            </tr>
                            <tr>
                                <td>60 ></td>
                                <td>40.0</td>
                                <td>{{ $bill->range_three_cost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>
