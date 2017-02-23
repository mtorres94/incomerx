<script type="text/javascript">

    window.onload = (function () {
        if($("#date_today").val() == ''){
            initDate($("#date_today"), 0);
        }
        openTab($("#data"));
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('io_quotes.close') }}')

        if ($("#open_status").val() == "1" || $("$status").val() == 'C') {
            disableFields('data');
        }
        //=========================
        ($("#container_details tbody tr").length > 0 ? $("#contract_basis").val("2").change() : $("#contract_basis").val("1").change());

        function renameTab() {
            if ('edit' == '{{ \Request::segment(5) }}') {
                var gtab = window.parent.$('#tt');
                var htab = gtab.find('.tabs-header');
                var wtab = htab.find('.tabs-wrap');
                var ttab = wtab.find('.tabs');
                var stab = ttab.find('.tabs-selected');
                var itab = stab.find('.tabs-inner');
                var etab = itab.find('.tabs-title');
                var span = '{{ isset($quotes) ? "Edit ".$quotes->code : "New" }}';

                etab[1] = span
            }
        }
        $("#total_unit_weight").val( "{{ (isset($quotes) ? $quotes->total_unit_weight : "L") }}").change();

        //============
       for (var t = $("#quotes_tabs").find("div"), l = 0; l < t.length; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {
            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        for (t = $("#cargo_tabs").find("div"), l = 0; l < t.length; l++) {
             a = t[l];
             e = $(a).attr("style");
            if (e === undefined) {
            } else {
                 n = e.indexOf("display: block;");
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        for ( t = $("#origin_charges_tabs").find("div"), l = 0; l < t.length; l++) {
            a = t[l];
            e = $(a).attr("style");
            if (e === undefined) {
            } else {
                        n = e.indexOf("display: block;");
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        for ( t = $("#destination_charges_tabs").find("div"), l = 0; l < t.length; l++) {
            a = t[l];
            e = $(a).attr("style");
            if (e === undefined) {
            } else {
                n = e.indexOf("display: block;");
                o = e.indexOf("display: none;");
                $(a).removeAttr("style"); n >= 0 && $(a).attr("style", "display: block;"); o >= 0 && $(a).attr("style", "display: none;")
            }
        }
        //===================================
        removeEmptyNodes('container_details');
        removeEmptyNodes('cargo_details');
        removeEmptyNodes('originChargeDetails');
        removeEmptyNodes('destinationChargeDetails');

        //===================================
        $("#incoterm_type").val("0").change();
        $("#box_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#box_cargo_type_code").val();
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
        $("#code").attr("readonly", true);
        $("#total_quantity").attr("readonly", true);
        $("#total_pieces").attr("readonly", true);
        $("#total_weight").attr("readonly", true);
        $("#total_unit_weight").val("L").change();

        $("#sum_bill").attr("readonly", true);
        $("#sum_cost").attr("readonly", true);
        $("#sum_profit").attr("readonly", true);
        $("#sum_profit_percent").attr("readonly", true);
        $("#dest_sum_bill").attr("readonly", true);
        $("#dest_sum_cost").attr("readonly", true);
        $("#dest_sum_profit").attr("readonly", true);
        $("#dest_sum_profit_percent").attr("readonly", true);
        $("#billing_amount").attr("readonly", true);
        $("#dest_billing_amount").attr("readonly", true);
        $("#cost_amount").attr("readonly", true);
        $("#status").val("{{ (isset($quotes)? $quotes->status : "O") }}").change();
        $("#quote_type").val("S").change();
        $("#billing_bill_party").val("S").change();
        $("#billing_bill_type").val("P").change();
        $("#dest_bill_party").val("S").change();
        $("#dest_bill_type").val("P").change();
        $("#type").val("P").change();
        $("#rate_class").val("1").change();

        if($("#quote_date").val() == ''){
            initDate($("#quote_date"), 0);
            initDate($("#valid_date"), 0);
        }

        $("#box_quantity").change( function(){ calculate_cargo()});
        $("#box_dim_fact").change( function(){ calculate_cargo()});
        $("#box_metric_unit").change( function(){ calculate_cargo()});
        $("#box_weight_unit").change( function(){ calculate_cargo()});
        $("#box_length").change( function(){ calculate_cargo()});
        $("#box_width").change( function(){ calculate_cargo()});
        $("#box_height").change( function(){ calculate_cargo()});
        $("#box_unit_weight").change( function(){ calculate_cargo()});
        $("#cargo_rate").change( function(){ calculate_cargo()});

        $("#cargo_charge_weight").change( function(){ calculate_cargo()});

        $("#box_total_weight").attr("readonly", true);
        $("#cargo_total").attr("readonly", true);
        $("#box_total_cubic").attr("readonly", true);
        $("#billing_quantity").change(function() { origin_charges_details() });
        $("#cost_quantity").change(function() { origin_charges_details() });
        $("#billing_rate").change(function() { origin_charges_details() });
        $("#cost_rate").change(function() { origin_charges_details() });
        $("#billing_increase").change(function() { origin_charges_details() });
        $("#dest_billing_quantity").change(function() { destination_charges_details() });
        $("#dest_cost_quantity").change(function() { destination_charges_details() });
        $("#dest_billing_rate").change(function() { destination_charges_details() });
        $("#dest_cost_rate").change(function() { destination_charges_details() });
        $("#dest_billing_increase").change(function() { destination_charges_details() });



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

    $("#dest_bill_party").change(function () {
        var a= $("#dest_bill_party").val();
        switch(a){
            case "S":   $("#dest_customer_name").val( $("#shipper_name").val() );
                $("#dest_customer_id").val( $("#shipper_id").val() );
                $("#dest_customer_name").attr("readonly", true);
                break;

            case "C":   $("#dest_customer_name").val( $("#consignee_name").val() );
                $("#dest_customer_id").val( $("#consignee_id").val() );
                $("#dest_customer_name").attr("readonly", true);
                break;

            case "T":   $("#dest_customer_name").val( $("#third_party_name").val() );
                $("#dest_customer_id").val( $("#third_party_id").val() );
                $("#dest_customer_name").attr("readonly", true);
                break;

            case "O":   $("#dest_customer_name").val("");
                $("#dest_customer_id").val(0);
                $("#dest_customer_name").attr("readonly", false);
                break;
        }
    });

    //=================================================================
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

    $("#dest_billing_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#dest_billing_unit_name").val(e[0].code);

            }
        });
    });

    $("#dest_cost_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#dest_cost_unit_name").val(e[0].code);

            }
        });
    });
    //============================================================

    $("#user_id").attr("readonly", true);
    $("#contract_basis").attr("readonly", true);



    $("#container_gross_weight").number(true, 3);
    $("#container_cubic").number(true, 3);
    $("#container_temperature").number(true, 2);
    $("#container_max").number(true, 2);
    $("#container_min").number(true, 2);

    $("#total_quantity").attr("readonly", true);
    $("#total_weight").attr("readonly", true);
    $("#total_cubic").attr("readonly", true);
    $("#total_bill").attr("readonly", true);
    $("#total_cost").attr("readonly", true);
    $("#total_profit").attr("readonly", true);
    $("#total_profit_p").attr("readonly", true);

    $("#box_quantity").number(true);
    $("#box_pieces").number(true);
    $("#box_length").number(true, 3);
    $("#box_width").number(true, 3);
    $("#box_height").number(true, 3);
    $("#box_unit_weight").number(true, 3);
    $("#box_total_weight").number(true, 3);
    $("#box_vol_weight").number(true, 3);
    $("#box_total_cubic").number(true, 3);






</script>