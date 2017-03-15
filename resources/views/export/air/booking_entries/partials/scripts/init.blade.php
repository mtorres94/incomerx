<script type="text/javascript">

window.onload = (function () {
    openTab($("#data"));
    updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('ea_booking_entries.close') }}');
    if ($("#open_status").val() == "1" || $("#status").val() == 'C') {
        disableFields('data');
    }

    initDate($("#date"), 0);
    $("#user_id").attr("readonly", true);
    $("#shipment_code").attr("readonly", true);



});
</script>