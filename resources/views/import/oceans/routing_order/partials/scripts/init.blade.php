<script type="text/javascript">
    window.onload = (function () {
        var unique_str = $("#unique_str").val();
        if($("#date_today").val() == ''){ initDate($("#date_today"), 0); }
        openTab($("#data"));
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('io_routing_order.close') }}');

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

        function renameTab() {
            if ('edit' == '{{ \Request::segment(5) }}') {
                var gtab = window.parent.$('#tt');
                var htab = gtab.find('.tabs-header');
                var wtab = htab.find('.tabs-wrap');
                var ttab = wtab.find('.tabs');
                var stab = ttab.find('.tabs-selected');
                var itab = stab.find('.tabs-inner');
                var etab = itab.find('.tabs-title');
                var span = '{{ isset($routing_order) ? "Edit ".$routing_order->code : "New" }}';

                etab[1] = span
            }
        }
        removeEmptyNodes("chargeDetails");
        $("#sum_bill").attr("readonly", true);
        $("#sum_cost").attr("readonly", true);
        $("#sum_profit").attr("readonly", true);
        $("#sum_profit_percent").attr("readonly", true);

        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                n = e.indexOf("display: block;"),
                o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }

    });
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

    function quote_charge_details(){
        var id = $("#quote_id").val();

        $.ajax({
            url: "{{ route('io_quotes.get') }}",
            data: {id: id},
            type: 'GET',

            success: function (e) {
                var d = $("#chargeDetails tbody tr").length,
                    n = $("#chargeDetails"),
                    t = n.find("tbody"),
                    r = 0;
                while (e[r].line != "" ) {
                    var C = $("<tr id=" + (d + 1) + " >");
                    C.append(createTableContent('charge_id', (d + 1), true, d))
                        .append(createTableContent('billing_billing_id', e[r].billing_id, true, d))
                        .append(createTableContent('billing_billing_code', e[r].billing_code, false, d))
                        .append(createTableContent('billing_billing_description', e[r].billing_description, false, d))
                        .append(createTableContent('billing_bill_type', e[r].bill_type, false, d))
                        .append(createTableContent('billing_bill_party', e[r].bill_party, false, d))
                        .append(createTableContent('billing_quantity', e[r].billing_quantity, false, d))
                        .append(createTableContent('billing_rate', e[r].billing_rate, true, d))
                        .append(createTableContent('billing_amount', e[r].billing_amount, false, d))
                        .append(createTableContent('billing_currency_type', e[r].billing_currency_type, true, d))
                        .append(createTableContent('billing_customer_name', e[r].billing_customer_name, true, d))
                        .append(createTableContent('cost_amount', e[r].cost_amount, false, d))
                        .append(createTableContent('cost_currency_type', e[r].cost_currency_type, true, d))
                        .append(createTableContent('cost_invoice', e[r].cost_invoice, true, d))
                        .append(createTableContent('cost_reference', e[r].cost_reference, true, d))
                        .append(createTableContent('billing_notes', e[r].billing_notes, true, d))
                        .append(createTableContent('billing_unit_id', e[r].billing_unit_id, true, d))
                        .append(createTableContent('billing_unit_name', e[r].billing_unit_name, true, d))
                        .append(createTableContent('billing_exchange_rate', e[r].billing_exchange_rate, true, d))
                        .append(createTableContent('billing_customer_id', e[r].billing_customer_id, true, d))
                        .append(createTableContent('cost_quantity', e[r].cost_quantity, true, d))
                        .append(createTableContent('cost_unit_id', e[r].cost_unit_id, true, d))
                        .append(createTableContent('cost_unit_name', e[r].cost_unit_name, true, d))
                        .append(createTableContent('cost_rate', e[r].cost_rate, true, d))
                        .append(createTableContent('cost_cost_center', e[r].cost_center, true, d))
                        .append(createTableContent('cost_exchange_rate', e[r].cost_exchange_rate, true, d))
                        .append(createTableContent('billing_vendor_code', e[r].billing_vendor_code, true, d))
                        .append(createTableContent('billing_vendor_name', e[r].billing_vendor_name, true, d))
                        .append(createTableContent('cost_date', e[r].cost_date, true, d))
                        .append(createTableContent('billing_increase', e[r].billing_increase, true, d))
                        .append(createTableBtns());
                    t.append(C); r++; d++;
                }
            }
        });
        removeEmptyNodes("chargeDetails");
        values_charges();
    }
    //=========================================
    $("#quote_id").change(function () {
        var id = $("#quote_id").val();
        $.ajax({
            url: "{{ route('io_quotes.autocomplete') }}",
            data: {id: id},
            type: 'GET',
            success: function (e) {
                $("#service_id").val(e.service_id),
                    $("#service_name").val(e.service_name),
                    $("#port_loading_id").val(e.port_loading_id),
                    $("#port_unloading_id").val(e.port_unloading_id),
                    $("#port_loading_name").val(e.port_loading_name),
                    $("#port_unloading_name").val(e.port_unloading_name),
                    $("#place_receipt_id").val(e.place_receipt_id),
                    $("#place_delivery_id").val(e.place_delivery_id),
                    $("#place_receipt_name").val(e.place_receipt_name),
                    $("#place_delivery_name").val(e.place_delivery_name),
                    $("#incoterm_type").val(e.incoterm_type).change(),
                    $("#carrier_id").val(e.carrier_id),
                    $("#carrier_name").val(e.carrier_name),

                    $("#shipper_id").val(e.shipper_id),
                    $("#shipper_name").val(e.shipper_name),
                    $("#shipper_address").val(e.shipper_address),
                    $("#shipper_phone").val(e.shipper_phone),
                    $("#shipper_fax").val(e.shipper_fax),

                    $("#consignee_id").val(e.consignee_id),
                    $("#consignee_name").val(e.consignee_name),
                    $("#consignee_address").val(e.consignee_address),
                    $("#consignee_phone").val(e.consignee_phone),
                    $("#consignee_fax").val(e.consignee_fax)
            }
        });
        quote_charge_details();
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


                case "O":   $("#billing_customer_name").val("");
                    $("#billing_customer_id").val("0");
                    $("#billing_customer_name").attr("readonly", false);
                    break;
            }
        });
    $("#billing_bill_party").val("C").change();






//================================================
    $("#code").attr("readonly", true);
    $("#billing_exchange_rate").attr("number", true);
      $("#unit_weight").val("L").change();
      $("#status").val("{{ (isset($routing_order) ? $routing_order->status : 'O') }}").change();
    $("#billing_quantity").change(function() { charges_details() });
    $("#cost_quantity").change(function() { charges_details() });
    $("#billing_rate").change(function() { charges_details() });
    $("#cost_rate").change(function() { charges_details() });
    $("#billing_increase").change(function() { charges_details() });
    </script>