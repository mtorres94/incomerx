<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('ea_loading_guides.close') }}');
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
        $("#code").attr("readonly", true);
        $("#status").val('{{ isset($loading_guides)? $loading_guides->status : 'O' }}').change();
        if($("#date").val() == ""){initDate($("#date"), 0); }

        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                n = e.indexOf("display: block;"),
                o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }

        removeEmptyNodes('hidden_warehouse');
        removeEmptyNodes('containers');
        $("#select_all").change(function () {
            if ($(this).is(':checked')) {
                $("#load_warehouse_details input[type=checkbox]").prop('checked', true);
            } else {
                $("#load_warehouse_details input[type=checkbox]").prop('checked', false);
            }
        });

        $("#house_all").change(function () {
            if ($(this).is(':checked')) {
                $("#house_warehouse_details input[type=checkbox]").prop('checked', true);
            } else {
                $("#house_warehouse_details input[type=checkbox]").prop('checked', false);
            }
        });

    });

    $("#shipment_id").change(function(){
       var id = $("#shipment_id").val();
        $.ajax({
            url: "{{ route('ea_booking_entries.autocomplete') }}",
            data: {id: id},
            type: 'GET',
            success: function (e) {
                $('#booking_id').val(e[0].booking_id);
                $('#booking_code').val(e[0].booking_code);
                $('#origin_id').val(e[0].origin_id);
                $('#origin_name').val(e[0].origin_name);
                $('#destination_id').val(e[0].destination_id);
                $('#destination_name').val(e[0].destination_name);
                $('#via_id').val(e[0].destination_id);
                $('#via_name').val(e[0].destination_name);
                $('#carrier_id').val(e[0].carrier_id);
                $('#carrier_name').val(e[0].carrier_name);
                $('#flight').val(e[0].flight);
                $('#shipment_type').val(e[0].shipment_type).change();
                $('#arrival_date').val(e[0].arrival_date);
                $('#departure_date').val(e[0].departure_date);
                $('#agent_id').val(e[0].agent_id);
                $('#agent_name').val(e[0].agent_name);
            }
        });
    });

    $("#equipment_type_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('cargo_types.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#equipment_type_code").val(e[0].code);

            }
        });
    });

    $("#btn-load-warehouse").click(function(){
        $("#pick_search_type").val("1").change();
    });

    function arrayEmpty(message){
        swal({
            title: "Wait!",
            text: message,
            type: "warning",
            confirmButtonText: "Ok"
        });
    }
</script>