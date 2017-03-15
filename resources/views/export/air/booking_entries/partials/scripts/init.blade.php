<script type="text/javascript">

window.onload = (function () {
    openTab($("#data"));
    updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('ea_booking_entries.close') }}');
    if ($("#open_status").val() == "1" || $("#status").val() == 'C') {
        disableFields('data');

    }
    $("#user_id").attr("readonly", true);
    $("#shipment_code").attr("readonly", true);
    $("#code").attr("readonly", true);
    $("#shipment_type").val("C").change();
    $("#status").val({{ isset($booking_entries)? $booking_entries->status : 'O' }});
    $("#date").val() == "" ? initDate($("#date"), 0) : '{{ $booking_entries->date }}';


});
</script>