<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Payment Receipt</title>
</head>

<body>
    <div class="container mt-5 py-3">
        <table class="table">
            <tbody>
                <tr>
                    <th>Account No</th>
                    <td class="text-end">{{ $user->account_number }}</td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td class="text-end">{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td class="text-end">{{ $payment->date }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered border-white mt-5">
            <tbody>
                <tr>
                    <th>Payment ID</th>
                    <td class="text-end">{{ $payment->id }}</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td class="text-end">{{ $payment->payment_type }}</td>
                </tr>
                <tr>
                    <th>Total Amount(Rs.)</th>
                    <td class="text-end">{{ $payment->amount }}</td>
                </tr>
                <tr>
                    <th class="align-middle">Paid Amount(Rs.)</th>
                    <td class="text-end">{{ $payment->paid_amount }}</td>
                </tr>
                <tr>
                    <th class="">Remaining Amount(Rs.)</th>
                    <td class="text-end align-middle">{{ $payment->balance }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
