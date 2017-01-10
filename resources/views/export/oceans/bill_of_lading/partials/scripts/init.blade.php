<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        var unique_str = $("#unique_str").val();

        openTab($("#data"));
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('eo_bill_of_lading.close') }}')

        if ($("#open_status").val() == "1") {
            disableFields('data');
        }
        function renameTab() {
            if ('edit' == '{{ \Request::segment(5) }}') {
                var gtab = window.parent.$('#tt');
                var htab = gtab.find('.tabs-header');
                var wtab = htab.find('.tabs-wrap');
                var ttab = wtab.find('.tabs');
                var stab = ttab.find('.tabs-selected');
                var itab = stab.find('.tabs-inner');
                var etab = itab.find('.tabs-title');
                var span = '{{ isset($bill_of_lading) ? "Edit ".$bill_of_lading->code : "New" }}';

                etab[1] = span
            }
        }
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
        for (var t2 = $("#transportation-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#tabs_details").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#container-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#charges-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#cargo-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        //===================================================================
        removeEmptyNodes('PRO_details');
        removeEmptyNodes('customer_details');
        removeEmptyNodes('items_details');
        removeEmptyNodes('cargo_details');
        removeEmptyNodes('details_hidden');
        removeEmptyNodes('cargo_vehicle_details');
        removeEmptyNodes('container_details');
        removeEmptyNodes('hzd_details');
        removeEmptyNodes('hazardous-details');
        removeEmptyNodes('chargeDetails');
        removeEmptyNodes('transportation_details');
        //===================================================================


        initDate($("#bl_date"), 0);
        $("#bl_type").val("C").change();
        $("#total_weight_unit_measurement").val("L").change();
        $("#bl_status").val("O").change();
        $("#rate_class").val("1").change();
        $("#bl_class").val("3").change();
        $("#currency_type").val("1").change();

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

        //=======================================================================

        $("#vehicle_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#vehicle_cargo_type_code").val()
                    $("#vehicle_cargo_type_code").val(e[0].code);
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
                                    $("#vehicle_length").val(e[0].length), $("#vehicle_width").val(e[0].width), $("#vehicle_height").val(e[0].height);
                                    calculate_vehicle();
                                }
                            });
                        }
                    }
                }
            });
        });

        $("#cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#cargo_type_code").val()
                    $("#cargo_type_code").val(e[0].code);
                }
            });
        });

        transportation_plan();
        weight_totals();
        values_charges();
      //  values_box_vehicle();
        $("#billing_quantity").change(function() { charges_details() });
        $("#billing_rate").change(function() { charges_details() });
        $("#billing_increase").change(function() { charges_details() });
        $("#cost_quantity").change(function() { charges_details() });
        $("#cost_rate").change(function() { charges_details() });

        $("#box_unit_weight").change(function() { calculate_box() });
        $("#box_length").change(function () { calculate_box() });
        $("#box_quantity").change(function () { calculate_box() });
        $("#box_total_weight").change(function () { calculate_box() });
        $("#box_width").change(function () { calculate_box() });
        $("#box_height").change(function () { calculate_box() });
        $("#box_metric_unit").change(function () { calculate_box() });
        $("#box_weight_unit").change(function () { calculate_box() });
        $("#box_dim_fact").change(function () { calculate_box() });


        $("#vehicle_length").change(function () { calculate_vehicle() });
        $("#vehicle_quantity").change(function () { calculate_vehicle() });
        $("#vehicle_unit_weight").change(function () { calculate_vehicle() });
        $("#vehicle_total_weight").change(function () { calculate_vehicle() });
        $("#vehicle_width").change(function () { calculate_vehicle() });
        $("#vehicle_height").change(function () { calculate_vehicle() });
        $("#vehicle_metric_unit").change(function () { calculate_vehicle() });
        $("#vehicle_weight_unit").change(function () { calculate_vehicle() });
        $("#vehicle_dim_fact").change(function () { calculate_vehicle() });

        $("#cargo_rate").change(function() { values_box_vehicle()});




    });

    //===================================================
    //CONTAINER DETAILS

    $("shipment_code").change(function(){
        var id = $("#shipment_id").val(), x = 0;
        console.log(id);
        $.ajax({

            url: "{{ route('shipment_entries.get') }}",
            data: {id: id},
            type: 'GET',

            success: function (e) {
                var f = $("#container_details tbody tr").length,
                    n1 = $("#container_details"),
                    t1 = n1.find("tbody"),
                    p = $("<tr id=" + (f + 1) + ">");
                p.append(createTableContent('container_line', (f + 1), true, f))
                    .append(createTableContent('equipment_type_id', e[0].equipment_type_id, true, f))
                    .append(createTableContent('equipment_type_code', e[0].equipmnt_type_code, false, f))
                    .append(createTableContent('container_number', e[0].container_number , false, f))
                    .append(createTableContent('container_seal_number', e[0].container_seal_number, false, f))
                    .append(createTableContent('container_seal_number2', e[0].container_seal_number2, true, f))
                    .append(createTableContent('container_commodity_id', e[0].container_commodity_id, true, f))
                    .append(createTableContent('container_commodity_name', e[0].container_commodity_name, true, f))
                    .append(createTableContent('pd_status', e[0].pd_status, true, f))
                    .append(createTableContent('container_spotting_date', e[0].spotting_date, true, f))
                    .append(createTableContent('container_pull_date', e[0].pull_date , true, f))
                    .append(createTableContent('container_carrier_id', e[0].carrier_id , true, f))
                    .append(createTableContent('container_carrier_name', e[0].carrier_name , true, f))
                    .append(createTableContent('container_ventilation', e[0].ventilation, true, f))
                    .append(createTableContent('container_degrees', e[0].degrees, true, f))
                    .append(createTableContent('container_temperature', e[0].temperature, true, f))
                    .append(createTableContent('container_max', e[0].temperature_max, true, f))
                    .append(createTableContent('container_min', e[0].temperature_min , true, f))

                    .append(createTableContent('container_pickup_id', e[0].pickup_id, true, f))
                    .append(createTableContent('container_pickup_name', e[0].pickup_name, false, f))
                    .append(createTableContent('container_pickup_type', e[0].pickup_type, true, f))
                    .append(createTableContent('container_pickup_address', e[0].pickup_address, true, f))
                    .append(createTableContent('container_pickup_city', e[0].pickup_city, true, f))
                    .append(createTableContent('container_pickup_state_id', e[0].pickup_state_id, true, f))
                    .append(createTableContent('container_pickup_state_name', e[0].pickup_state_name , true, f))
                    .append(createTableContent('container_pickup_zip_code_id', e[0].pickup_zip_code_id, true, f))
                    .append(createTableContent('container_pickup_zip_code_code', e[0].pickup_zip_code, true, f))
                    .append(createTableContent('container_pickup_phone', e[0].pickup_phone, true, f))
                    .append(createTableContent('container_pickup_contact', e[0].pickup_contact, true, f))
                    .append(createTableContent('container_pickup_date', e[0].pickup_date, true, f))
                    .append(createTableContent('container_pickup_number', e[0].pickup_number, true, f))

                    .append(createTableContent('container_delivery_id', e[0].delivery_id, true, f))
                    .append(createTableContent('container_delivery_name', e[0].delivery_name, false, f))
                    .append(createTableContent('container_delivery_type', e[0].delivery_type, true, f))
                    .append(createTableContent('container_delivery_address', e[0].delivery_address, true, f))
                    .append(createTableContent('container_delivery_city', e[0].delivery_city, true, f))
                    .append(createTableContent('container_delivery_state_id', e[0].delivery_state_id, true, f))
                    .append(createTableContent('container_delivery_state_name', e[0].delivery_state_name, true, f))
                    .append(createTableContent('container_delivery_zip_code_id', e[0].delivery_zip_code_id, true, f))
                    .append(createTableContent('container_delivery_zip_code_code', e[0].delivery_zip_code, true, f))
                    .append(createTableContent('container_delivery_phone', e[0].delivery_phone, true, f))
                    .append(createTableContent('container_delivery_contact', e[0].delivery_contact, true, f))
                    .append(createTableContent('container_delivery_date', e[0].delivery_date, true, f))
                    .append(createTableContent('container_delivery_number', e[0].delivery_number, true, f))
                    .append(createTableContent('container_drop_id', e[0].drop_id, true, f))
                    .append(createTableContent('container_drop_name', e[0].drop_name, false, f))
                    .append(createTableContent('container_drop_type', e[0].drop_type, true, f))
                    .append(createTableContent('container_drop_address', e[0].drop_a, true, f))
                    .append(createTableContent('container_drop_city', e[0].drop_city, true, f))
                    .append(createTableContent('container_drop_state_id', e[0].drop_state_id, true, f))
                    .append(createTableContent('container_drop_state_name', e[0].drop_state_name, true, f))
                    .append(createTableContent('container_drop_zip_code_id', e[0].drop_zip_code_id, true, f))
                    .append(createTableContent('container_drop_zip_code_code', e[0].drop_zip_code, true, f))
                    .append(createTableContent('container_drop_phone', e[0].drop_phone, true, f))
                    .append(createTableContent('container_drop_contact', e[0].drop_contact, true, f))
                    .append(createTableContent('container_drop_date', e[0].drop_date, true, f))
                    .append(createTableContent('container_drop_number', e[0].drop_number, true, f))
                    .append(createTableContent('container_hazardous_contact', e[0].hazardous_contact, true, f))
                    .append(createTableContent('container_hazardous_phone', e[0].hazardous_phone, true, f))


                    .append(createTableContent('container_comments', e[0].container_comments, true, f))
                    .append(createTableBtns()),
                    t1.append(p);
            }
        });
    });
    //===================================================
    $("#btn-load-houses").click(function () {
        var id= $("#shipment_id").val() , x=0 ;

        $.ajax({

            url: "{{ route('bill_of_lading.get_details') }}",
            data: {id: id},
            type: 'GET',

            success: function (e) {
                x = 0;

                while (e[x].hbl_code != "") {
                    var r = $("#load_warehouses tbody tr").length + 1,
                            n = $("#load_warehouses"),
                            t = n.find("tbody"),
                            p = $("<tr id=" + r + ">");
                    p.append(createTableContent('resume_line', r, true, x))
                            .append("<td><input type='checkbox' name='hbl_select[]' id='hbl_select' value='" + e[x].id + "'></td>")
                            .append(createTableContent('hbl_code', e[x].hbl_code, false, x))
                            .append(createTableContent('hbl_marks', e[x].marks, false, x))
                            .append(createTableContent('hbl_cargo_type_id', e[x].cargo_type_id, true, x))
                            .append(createTableContent('hbl_cargo_type_code', e[x].cargo_type_code, true, x))
                            .append(createTableContent('hbl_weight_unit', 'L', true, x))
                            .append(createTableContent('total_pieces', e[x].total_pieces, false, x))
                            .append(createTableContent('total_weight_l', e[x].total_weight_l, false, x))
                            .append(createTableContent('total_cubic_l', e[x].total_cubic_l, false, x))
                            .append(createTableContent('total_charge_weight_l', e[x].total_charge_weight_l, true, x))
                            .append(createTableContent('hbl_id', e[x].id, true, x))
                            .append(createTableContent('container_id', e[x].container_id, true, x))
                            .append(createTableContent('cargo_loader_id', e[x].cargo_loader_id, true, x))
                            .append(createTableContent('inserted_id', e[x].id, true, x))
                            .append(createTableContent('total_weight_k', e[x].total_weight_k, true, x))
                            .append(createTableContent('total_cubic_k', e[x].total_cubic_k, true, x))
                            .append(createTableContent('total_charge_weight_k', e[x].total_charge_weight_k, true, x))
                    t.append(p);
                    x= x+1;
                    $("#cargo_loader_id").val(e[x].cargo_loader_id);
                }

            }
        });
    });

    //===================================================
    $('#vessel_yes').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });

    $('#vessel_no').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });

    $('#collect_free').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#insurance').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#stand_by').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#partial').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#spot_rate').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#confirmed').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#POD_info').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $("#agent_commission").number(true);
    $("#container_temperature").number(true, 2);
    $("#container_max").number(true, 3);

    $("#container_inner_quantity").number(true, 2);
    $("#container_net_weight").number(true, 2);
    $("#container_number_equipment").number(true, 2);
    $("#container_outer_quantity").number(true, 2);
    $("#container_tare_weight").number(true, 2);

    $("#billing_quantity").number(true);
    $("#billing_increase").number(true, 3);
    $("#billing_rate").number(true, 3);
    $("#billing_amount").number(true, 3).attr("readonly", true);
    $("#billing_exchange_rate").number(true, 3);

    $("#cost_quantity").number(true);
    $("#cost_rate").number(true, 3);
    $("#cost_amount").number(true, 3).attr("readonly", true);
    $("#cost_exchange_rate").number(true, 3);

    $("#cargo_grossw").number(true, 3).attr("readonly", true);
    $("#cargo_cubic").number(true, 3).attr("readonly", true);

    $("#box_length").number(true, 3);
    $("#box_quantity").number(true);
    $("#box_unit_weight").number(true, 3);
    $("#box_total_weight").number(true, 3).attr("readonly", true);
    $("#box_width").number(true, 3);
    $("#box_height").number(true, 3);
    $("#box_vol_weight").number(true, 3).attr("readonly", true);
    $("#box_total_cubic").number(true, 3).attr("readonly", true);

    $("#box_flash_point").number(true, 2);

    $("#vehicle_length").number(true, 3);
    $("#vehicle_quantity").number(true);
    $("#vehicle_unit_weight").number(true, 3);
    $("#vehicle_total_weight").number(true, 3).attr("readonly", true);
    $("#vehicle_width").number(true, 3);
    $("#vehicle_height").number(true, 3);
    $("#vehicle_vol_weight").number(true, 3).attr("readonly", true);
    $("#vehicle_total_cubic").number(true, 3).attr("readonly", true);

    $("#total_quantity").number(true).attr("readonly", true);
   // $("#booking_code").attr("readonly", true);
    $("#total_weight_kgs").number(true, 3).attr("readonly", true);
    $("#total_cubic_cbm").number(true, 3).attr("readonly", true);
    $("#total_charge_weight_kgs").number(true, 3).attr("readonly", true);
    $("#total_weight_lbs").number(true, 3).attr("readonly", true);
    $("#total_cubic_cft").number(true, 3).attr("readonly", true);
    $("#total_charge_weight_lbs").number(true, 3).attr("readonly", true);
    $("#billing_customer_name").attr("readonly", true);
    $("#cargo_weight_k").number(true, 3).attr("readonly", true);
            $("#cargo_cubic_k").number(true, 3).attr("readonly", true);
            $("#cargo_charge_weight_k").number(true, 3).attr("readonly", true);
            $("#cargo_weight_l").number(true, 3).attr("readonly", true);
            $("#cargo_cubic_l").number(true, 3).attr("readonly", true);
            $("#cargo_charge_weight_l").number(true, 3).attr("readonly", true);
            $("#cargo_rate").number(true, 3);
            $("#cargo_amount").number(true, 3).attr("readonly", true);
    //$("#user_id").attr("readonly", true);
    $("#user_id").attr("readonly", true);

    $("#charges_bill").number(true, 3).attr("readonly", true);
    $("#charges_cost").number(true, 3).attr("readonly", true);
    $("#charges_profit").number(true, 3).attr("readonly", true);
    $("#charges_profit_p").number(true, 3).attr("readonly", true);
    $("#transportation_plans_amount").number(true, 3).attr("readonly", true);
    $("#transportation_amount").number(true, 3);


</script>