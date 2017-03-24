<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('ea_airwaybills.close') }}');
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
        $("#currency_id").val('{{ isset($airway_bill)? $airway_bill->currency_id : 1 }}').change();

        for (var t2 = $("#charges-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        $("#billing_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#billing_unit_name").val(e[0].code);

                }
            });
        });

        $("#cost_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#cost_unit_name").val(e[0].code);

                }
            });
        });

        $("#billing_bill_party").change(function () {
            var a= $("#billing_bill_party").val();
            switch(a){
                case "S":   $("#billing_customer_name").val( $("#shipper_name").val() );
                    $("#billing_customer_id").val( $("#shipper_id").val() );
                    $("#billing_customer_name").attr("readonly", true);
                    break;

                case "C":   $("#billing_customer_name").val( $("#consignee_name").val() );
                    $("#billing_customer_id").val( $("#consignee_id").val() );
                    $("#billing_customer_name").attr("readonly", true);
                    break;

                case "T":   $("#billing_customer_name").val( $("#third_party_name").val() );
                    $("#billing_customer_id").val( $("#third_party_id").val() );
                    $("#billing_customer_name").attr("readonly", true);
                    break;

                case "O":   $("#billing_customer_name").val("");
                    $("#billing_customer_id").val(0);
                    $("#billing_customer_name").attr("readonly", false);
                    break;
            }
        });

        $("#select_all").change(function () {
            if ($(this).is(':checked')) {
                $("#houses input[type=checkbox]").prop('checked', true);
            } else {
                $("#houses input[type=checkbox]").prop('checked', false);
            }
        });

        removeEmptyNodes('cargos');
        removeEmptyNodes('charges');
        removeEmptyNodes('hidden_houses');
        total_charge_details();

        $("#status").val("{{ (isset($airway_bill) ? $airway_bill->status : "O" )}}").change();
        $("#awb_class").val("{{ (isset($airway_bill) ? $airway_bill->awb_class : "3" )}}").change();
        $("#awb_type").val("{{ (isset($airway_bill) ? $airway_bill->awb_type: "C" )}}").change();

        if($("#date").val() == ''){
            initDate($("#date"), 0);
        }
        $("#currency").val("{{ isset($airway_bill) ? $airway_bill->currency_id : 1}}").change();

        $("#issued_id").val('66372');

    });

    $("#shipment_id").change(function(){
        var id = $("#shipment_id").val();
        $.ajax({
            url: "{{ route('ea_booking_entries.autocomplete') }}",
            data: {id: id},
            type: 'GET',
            success: function (e) {
                $('#booking_code').val(e[0].booking_code);
                $('#origin_id').val(e[0].origin_id);
                $('#origin_name').val(e[0].origin_name);
                $('#destination_id').val(e[0].destination_id);
                $('#destination_name').val(e[0].destination_name);
                $('#carrier_id').val(e[0].carrier_id);
                $('#carrier_name').val(e[0].carrier_name);
                $('#flight').val(e[0].flight);
                $('#shipment_type').val(e[0].shipment_type).change();
                $('#arrival_date').val(e[0].arrival_date);
                $('#departure_date').val(e[0].departure_date);
                $('#agent_id').val(e[0].agent_id);
                $('#agent_name').val(e[0].agent_name);

                $('#shipper_id').val(e[0].shipper_id);
                $('#shipper_name').val(e[0].shipper_name);
                $('#shipper_state_id').val(e[0].shipper_state_id);
                $('#shipper_state_name').val(e[0].shipper_state_name);
                $('#shipper_zip_code_id').val(e[0].shipper_zip_code_id);
                $('#shipper_zip_code_code').val(e[0].shipper_zip_code);
                $('#shipper_address').val(e[0].shipper_address);
                $('#shipper_city').val(e[0].shipper_city);
                $('#shipper_phone').val(e[0].shipper_phone);

                $('#consignee_id').val(e[0].consignee_id);
                $('#consignee_name').val(e[0].consignee_name);
                $('#consignee_state_id').val(e[0].consignee_state_id);
                $('#consignee_state_name').val(e[0].consignee_state_name);
                $('#consignee_zip_code_id').val(e[0].consignee_zip_code_id);
                $('#consignee_zip_code_code').val(e[0].consignee_zip_code);
                $('#consignee_address').val(e[0].consignee_address);
                $('#consignee_city').val(e[0].consignee_city);
                $('#consignee_phone').val(e[0].consignee_phone);
            }
        });
    });

    $("#billing_quantity").change(function() { charges_details() });
    $("#billing_rate").change(function() { charges_details() });
    $("#billing_increase").change(function() { charges_details() });
    $("#cost_quantity").change(function() { charges_details() });
    $("#cost_rate").change(function() { charges_details() });
    $("#awb_class").change(function(){
        $("#awb_class").val() != '3' ? $("#btn_link_house").attr("disabled", true) : $("#btn_link_house").attr("disabled", false);
    });





</script>