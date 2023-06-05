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
        const userAccNo = button.data('acc-num');
        const modal = $(this);
        modal.find('#user_id').val(userId);
        modal.find('#accNo').val(parseInt(userAccNo, 10));
        modal.find('#date').val(new Date().toISOString().split('T')[0]);
    });
});
