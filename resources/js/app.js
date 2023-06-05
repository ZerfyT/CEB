import './bootstrap';
import 'laravel-datatables-vite';

import jQuery from 'jquery';
// import modal from "bootstrap/js/src/modal";

window.$ = jQuery;

document.getElementById("sidebarToggler").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("active");
    // this.classList.toggle("active");
});

$(document).ready(function () {
    $('#modelMeterReading').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const userId = button.data('user-id');
        const modal = $(this);
        modal.find('#user_id').val(userId);
    });
});

// app.js


$(document).ready(function() {
    // Event listener for the "View" button
    $(document).on('click', '#btnView', function() {
        var billId = $(this).data('bill-id');
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                // Passing bill data to bill_modal 
                $('#billId').text(response.id);
                // $('#billUserId').text(response.user_id);
                $('#billUnits').text(response.units);
                $('#billNewMeterReading').text(response.new_reading);
                $('#billOldMeterReading').text(response.old_reading);
                $('#billStatus').text(response.status);
                $('#billNewReadingDate').text(response.new_reading_date);
                $('#billOldReadingDate').text(response.old_reading_date);
                $('#billChargeFixed').text(response.charge_fixed);
                $('#billChargeForUnits').text(response.charge_for_units);
                $('#billChargeForMonth').text(response.charge_for_month);
                $('#billLastPayment').text(response.last_payment);
                $('#billBalanceForward').text(response.balance_forward);
                $('#billChargeTotal').text(response.charge_total);

                // Passing user data to bill_modal
                $('#userId').text(response.user_id);
                $('#userName').text(response.user_name);
                $('#userAccount').text(response.user_account_number);
                $('#userAddress').text(response.user_address);
                $('#userNic').text(response.user_nic);
                $('#userEmail').text(response.user_email);
                $('#userPhone').text(response.user_phone);
                $('#userAccountType').text(response.user_account_type);
                $('#userArea').text(response.user_area);



                // Open the modal
                $('#billModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle the error case here
                console.error(error);
            }
        });

        return false; // Prevent default link behavior
    });
});



