<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
            //===========================
            removeEmptyNodes('cargo_details');
            removeEmptyNodes('details_hidden');
            removeEmptyNodes('destination_charge');
            removeEmptyNodes('origin_charge');
            removeEmptyNodes('transportation_details');
            removeEmptyNodes('container_details');
        //=========================
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('ia_bill_of_lading.close') }}');

        if ($("#open_status").val() == "1" || $("#bl_status").val() == 'C') {
            disableFields('data');
        }
        $('#printer').change(function () {
            var _type = $('.select-header .dropdown-menu .selected').data('original-index');
            var _id = $('.btn-print[data-id]').data('id');
            var _token = '{{ str_random(120) }}';

            var url = $('.btn-print[data-id]').data('route');
            $('.btn-print[data-id]').attr('href', url + '?_token=' + _token + '&_type=' + _type + '&_id=' + _id);
        });

        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {
            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
            }
        }
        for ( t = $("#box-tabs").find("div"), l = 0; l < t.length; l++) {
             a = t[l];
             e = $(a).attr("style");
            if (e === undefined) {
            } else {
                 n = e.indexOf("display: block;");
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
            }
        }

            for ( t = $("#transportation-tabs").find("div"), l = 0; l < t.length; l++) {
                    a = t[l];
                    e = $(a).attr("style");
                    if (e === undefined) {
                    } else {
                            n = e.indexOf("display: block;");
                                    o = e.indexOf("display: none;");
                            $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
                    }
            }

            for ( t = $("#destination-tabs").find("div"), l = 0; l < t.length; l++) {
                    a = t[l];
                    e = $(a).attr("style");
                    if (e === undefined) {
                    } else {
                            n = e.indexOf("display: block;");
                                    o = e.indexOf("display: none;");
                            $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
                    }
            }

            for ( t = $("#origin-tabs").find("div"), l = 0; l < t.length; l++) {
                    a = t[l];
                    e = $(a).attr("style");
                    if (e === undefined) {
                    } else {
                            n = e.indexOf("display: block;");
                                    o = e.indexOf("display: none;");
                            $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
                    }
            }
            for ( t = $("#container_tabs").find("div"), l = 0; l < t.length; l++) {
                    a = t[l];
                    e = $(a).attr("style");
                    if (e === undefined) {
                    } else {
                            n = e.indexOf("display: block;");
                            o = e.indexOf("display: none;");
                            $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
                    }
            }
            $("#box_cargo_type_id").change(function () {
                    var id = $(this).val();
                    $.ajax({
                            url: "{{ route('cargo_types.get') }}",
                            data: {id: id},
                            type: 'GET',
                            success: function (e) {
                                    var act = $("#box_cargo_type_code").val()
                                    $("#box_cargo_type_code").val(e[0].code);
                                    var flag = (act === e[0].code);
                                    if (e[0].length > 0 || e[0].width > 0 || e[0].height > 0) {
                                            if (!flag) {
                                                    swal({
                                                            title: "",
                                                            text: "Do you want to update the screen with the cargo type details?",
                                                            type: "question",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3c8dbc",
                                                            confirmButtonText: "¡Yes, I want to update!",
                                                            cancelButtonText: "No...",
                                                            closeOnConfirm: false
                                                    }).then(function (isConfirm) {
                                                            if (isConfirm) {
                                                                    $("#box_length").val(e[0].length), $("#box_width").val(e[0].width), $("#box_height").val(e[0].height);
                                                                    calculate_box();
                                                            }
                                                    });
                                            }
                                    }
                            }
                    });
            });

            if($("#date_today").val() == ''){ initDate($("#date_today"), 0); }
$("#box_quantity").change(function(){ calculate_box() });
$("#box_length").change(function(){ calculate_box() });
$("#box_width").change(function(){ calculate_box() });
$("#box_height").change(function(){ calculate_box() });
$("#box_unit_weight").change(function(){ calculate_box() });
$("#box_metric_unit").change(function(){ calculate_box() });
$("#box_weight_unit").change(function(){ calculate_box() });
$("#box_dim_fact").change(function(){ calculate_box() });



            $("#origin_bill_quantity").change(function(){ calculate_individual_charges()});
            $("#origin_bill_rate").change(function(){ calculate_individual_charges()});
            $("#origin_bill_increase").change(function(){ calculate_individual_charges()});
            $("#origin_cost_rate").change(function(){ calculate_individual_charges()});

            $("#tmp_rate").change(function(){ calculate_amount() });
            $("#tmp_charge_weight").change(function(){ calculate_amount() });
            $("#tmp_cubic").change(function(){ calculate_amount() });

            $("#transportation_mode").val("O").change();
            $("#currency_type").val("1").change();
            $("#transportation_leg_status").val("O").change();
            $("#origin_from_type").val("01").change();
            $("#origin_to_type").val("01").change();
            $("#pd_status").val("1").change();
            $("#bl_status").val("{{ (isset($bill_of_lading) ? $bill_of_lading->bl_status : "O") }}").change();
            $("#origin_customer_name").attr('readonly', true);
        $("#billing_bill_party").change(function () {
            var a= $("#billing_bill_party").val();
            switch(a){
                case "S":   $("#billing_customer_name").val( $("#shipper_name").val() );
                    $("#origin_customer_id").val( $("#shipper_id").val() );
                    $("#origin_customer_name").attr("readonly", true);
                    break;

                case "C":   $("#origin_customer_name").val( $("#consignee_name").val() );
                    $("#origin_customer_id").val( $("#consignee_id").val() );
                    $("#origin_customer_name").attr("readonly", true);
                    break;

                case "T":   $("#origin_customer_name").val( $("#third_party_name").val() );
                    $("#origin_customer_id").val( $("#third_party_id").val() );
                    $("#origin_customer_name").attr("readonly", true);
                    break;

                case "O":   $("#origin_customer_name").val("");
                    $("#origin_customer_id").val(0);
                    $("#origin_customer_name").attr("readonly", false);
                    break;
            }

        });

    });

$("#total_weight_unit").val("L").change();
$("#tmp_weight_unit").val("L").change();
    //=========================================
    $("#routing_order_code").change(function () {
        var id = $("#routing_order_id").val();

        $.ajax({
            url: "{{ route('ia_routing_order.get') }}",
            data: {id: id},
            type: 'GET',

            success: function (e) {
                clearTableCondition('origin_charge');
                var d = $("#origin_charge tbody tr").length,
                    n = $("#origin_charge"),
                    t = n.find("tbody"),
                    r = 0;
                while (e[r] != '') {
                    var C = $("<tr id=" + (d + 1) + " >");
                    C.append(createTableContent('charge_line', (d + 1), true, d))
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
                        .append(createTableBtns()),
                        t.append(C); r++; d++;
                }
            }
        });
        removeEmptyNodes("origin_charge");
        values_charges();
    });


    $("#origin_bill_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#origin_bill_unit_name").val(e[0].code);

            }
        });
    });

    $("#origin_cost_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#origin_cost_unit_name").val(e[0].code);

            }
        });
    });

    //================================================

    $("#user_id").attr("readonly", true);
        $("#bl_class").val('1').change();
        $("#bl_type").val('P').change();
    $("#term_type").val('0').change();

        $("#tmp_charge_weight").attr("readonly", true);
        $("#tmp_amount").attr("readonly", true);


    $("#destination_bill").attr("readonly", true);
    $("#destination_cost").attr("readonly", true);
    $("#destination_profit").attr("readonly", true);
    $("#destination_profit_p").attr("readonly", true);
    $("#sum_bill").attr("readonly", true);
    $("#sum_cost").attr("readonly", true);
    $("#sum_profit").attr("readonly", true);
    $("#sum_profit_percent").attr("readonly", true);

    $("#transportation_plans_amount").attr("readonly", true);

    $("#total_weight").attr("readonly", true);
    $("#total_cubic").attr("readonly", true);
    $("#total_charge_weight").attr("readonly", true);
    $("#total_pieces").attr("readonly", true);
    $("#bl_number").val('{{ (isset($bill_of_lading) ? $bill_of_lading->code : "") }}').attr("readonly", true);

        </script>