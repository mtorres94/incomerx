<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('billing_codes.close') }}');
        if ($("#open_status").val() == "1" || $("#status").val() == 'C') {
            disableFields('data');
        }
        $('#printer').change(function () {
            var _type = $('.select-header .dropdown-menu .selected').data('original-index');
            var _id = $('.btn-print[data-id]').data('id');
            var _token = '{{ str_random(120) }}';

            var url = $('.btn-print[data-id]').data('route');
            $('.btn-print[data-id]').attr('href', url + '?_token=' + _token + '&_type=' + _type + '&_id=' + _id);
        });
        $("#user_id").attr("readonly", true);
        $("#shipment_code").attr("readonly", true);
        $("#code").attr("readonly", true);
        $("#shipment_type").val("C").change();
        $("#status").val('{{ isset($billing)? $billing->status : 'O' }}').change();

        if($("#date").val() == ""){initDate($("#date"), 0) ;}

    });
    $("#btn_transfer").click(function(){

    });
</script>