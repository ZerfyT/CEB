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
                // Populate the modal with the bill data
                $('#billId').text(response.id);
                $('#billUserId').text(response.user_id);
                $('#billUnits').text(response.units);

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



