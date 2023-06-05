<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Payment Receipt</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Payment Receipt</h3>
                    </div>
                    <div class="card-body">
                        <form id="payment-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" required>
                            </div>
                            <div class="form-group">
                                <label for="payment-method">Payment Method</label>
                                <select class="form-control" id="payment-method" required>
                                    <option>Credit Card</option>
                                    <option>PayPal</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <div id="receipt" class="mt-3 d-none">
                            <h4 class="text-center">Payment Summary</h4>
                            <hr>
                            <p><strong>Name:</strong> <span id="receipt-name"></span></p>
                            <p><strong>Email:</strong> <span id="receipt-email"></span></p>
                            <p><strong>Amount:</strong> $<span id="receipt-amount"></span></p>
                            <p><strong>Payment Method:</strong> <span id="receipt-payment-method"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#payment-form").submit(function(e) {
                e.preventDefault(); // Prevent form submission

                // Get form values
                var name = $("#name").val();
                var email = $("#email").val();
                var amount = $("#amount").val();
                var paymentMethod = $("#payment-method").val();

                // Update receipt with form values
                $("#receipt-name").text(name);
                $("#receipt-email").text(email);
                $("#receipt-amount").text(amount);
                $("#receipt-payment-method").text(paymentMethod);

                // Hide the form and show the receipt
                $("#payment-form").addClass("d-none");
                $("#receipt").removeClass("d-none");
            });
        });
    </script>
</body>

</html>
