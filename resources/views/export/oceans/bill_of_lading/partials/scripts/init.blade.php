<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        var unique_str = $("#unique_str").val();
        openTab($("#data"));

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

        $("#billing_bill_party").change(function () {
            $("#billing_bill_party").val() == 'O' ?  $("#billing_customer_name").attr("disabled", false): $("#billing_customer_name").attr("disabled", true) ;
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

        //===================================================
      /*  $("#shipment_id").change(function () {
            var id = $(this).val();
            $.ajax({

                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var  d =  ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent)  ),
                            b = $("#container_details"),
                            x = b.find("tbody"),
                            C = $("<tr id=" + (d + 1) + ">");
                    C.append(createTableContent('container_line', (d + 1) , true,d))
                            .append(createTableContent('equipment_type_id', g_1, true, d))
                            .append(createTableContent('equipment_type_code', g_2, false, d))
                            .append(createTableContent('container_number', g_3, false, d))
                            .append(createTableContent('container_seal_number', g_4, false, d))
                            .append(createTableContent('container_seal_number2', g_5, true, d))
                            .append(createTableContent('container_commodity_id', g_6, true, d))
                            .append(createTableContent('container_commodity_name', g_7, true, d))
                            .append(createTableContent('pd_status', g_8, true, d))
                            .append(createTableContent('container_spotting_date', g_9, true, d))
                            .append(createTableContent('container_pull_date', g_10, true, d))
                            .append(createTableContent('container_carrier_id', g_11, true, d))
                            .append(createTableContent('container_carrier_name', g_12, true, d))
                            .append(createTableContent('container_ventilation', g_13, true, d))
                            .append(createTableContent('container_degrees', g_14, true, d))
                            .append(createTableContent('container_temperature', g_15, true, d))
                            .append(createTableContent('container_max', g_16, true, d))
                            .append(createTableContent('container_min', g_17, true, d))

                            .append(createTableContent('container_pickup_id', g_18, true, d))
                            .append(createTableContent('container_pickup_name', g_19, false, d))
                            .append(createTableContent('container_pickup_type', g_20, true, d))
                            .append(createTableContent('container_pickup_address', g_21, true, d))
                            .append(createTableContent('container_pickup_city', g_22, true, d))
                            .append(createTableContent('container_pickup_state_id', g_23, true, d))
                            .append(createTableContent('container_pickup_state_name', g_24, true, d))
                            .append(createTableContent('container_pickup_zip_code_id', g_25, true, d))
                            .append(createTableContent('container_pickup_zip_code_code', g_26, true, d))
                            .append(createTableContent('container_pickup_phone', g_27, true, d))
                            .append(createTableContent('container_pickup_contact', g_28, true, d))
                            .append(createTableContent('container_pickup_date', g_29, true, d))
                            .append(createTableContent('container_pickup_number', g_30, true, d))

                            .append(createTableContent('container_delivery_id', g_31, true, d))
                            .append(createTableContent('container_delivery_name', g_32, false, d))
                            .append(createTableContent('container_delivery_type', g_33, true, d))
                            .append(createTableContent('container_delivery_address', g_34, true, d))
                            .append(createTableContent('container_delivery_city', g_35, true, d))
                            .append(createTableContent('container_delivery_state_id', g_36, true, d))
                            .append(createTableContent('container_delivery_state_name', g_37, true, d))
                            .append(createTableContent('container_delivery_zip_code_id', g_38, true, d))
                            .append(createTableContent('container_delivery_zip_code_code', g_39, true, d))
                            .append(createTableContent('container_delivery_phone', g_40, true, d))
                            .append(createTableContent('container_delivery_contact', g_41, true, d))
                            .append(createTableContent('container_delivery_date', g_42, true, d))
                            .append(createTableContent('container_delivery_number', g_43, true, d))

                            .append(createTableContent('container_drop_id', g_44, true, d))
                            .append(createTableContent('container_drop_name', g_45, false, d))
                            .append(createTableContent('container_drop_type', g_46, true, d))
                            .append(createTableContent('container_drop_address', g_47, true, d))
                            .append(createTableContent('container_drop_city', g_48, true, d))
                            .append(createTableContent('container_drop_state_id', g_49, true, d))
                            .append(createTableContent('container_drop_state_name', g_50, true, d))
                            .append(createTableContent('container_drop_zip_code_id', g_51, true, d))
                            .append(createTableContent('container_drop_zip_code_code', g_52, true, d))
                            .append(createTableContent('container_drop_phone', g_53, true, d))
                            .append(createTableContent('container_drop_contact', g_54, true, d))
                            .append(createTableContent('container_drop_date', g_55, true, d))
                            .append(createTableContent('container_drop_number', g_56, true, d))
                            .append(createTableContent('container_hazardous_contact', g_57, true, d))
                            .append(createTableContent('container_hazardous_phone', g_58, true, d))


                            .append(createTableContent('container_comments', g_74, true, d))
                            .append(createTableBtns()),

                            0 == container_id ? x.append(C)
                }
            });
        });*/


     transportation_plan();
        weight_totals();
        values_charges();
        values_box_vehicle();
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
                            .append(createTableContent('container_number', e[x].container_number, false, x))
                            .append(createTableContent('equipment_type_id', e[x].equipment_type_id, true, x))
                            .append(createTableContent('equipment_type_code', e[x].equipment_type_code, false, x))
                            .append(createTableContent('seal_number', e[x].seal_number, false, x))
                            .append(createTableContent('seal_number2', e[x].seal_number2, true, x))
                            .append(createTableContent('weight_unit', 'K', true, x))
                            .append(createTableContent('total_pieces', e[x].total_pieces, false, x))
                            .append(createTableContent('total_weight_k', e[x].total_weight_k, true, x))
                            .append(createTableContent('total_cubic_k', e[x].total_cubic_k, true, x))
                            .append(createTableContent('total_charge_weight_k', e[x].total_charge_weight_k, true, x))
                            .append(createTableContent('hbl_id', e[x].id, true, x))
                            .append(createTableContent('container_id', e[x].container_id, true, x))
                            .append(createTableContent('cargo_loader_id', e[x].cargo_loader_id, true, x))
                            .append(createTableContent('inserted_id', e[x].id, true, x))
                    t.append(p);
                    x= x+1;
                    $("#cargo_loader_id").val(e[x].cargo_loader_id);
                }

            }
        });
    });

    //===================================================

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
    $("#billing_amount").number(true, 3).attr("disabled", true);
    $("#billing_exchange_rate").number(true, 3);

    $("#cost_quantity").number(true);
    $("#cost_rate").number(true, 3);
    $("#cost_amount").number(true, 3).attr("disabled", true);
    $("#cost_exchange_rate").number(true, 3);

    $("#cargo_grossw").number(true, 3).attr("disabled", true);
    $("#cargo_cubic").number(true, 3).attr("disabled", true);

    $("#box_length").number(true, 3);
    $("#box_quantity").number(true);
    $("#box_unit_weight").number(true, 3);
    $("#box_total_weight").number(true, 3).attr("disabled", true);
    $("#box_width").number(true, 3);
    $("#box_height").number(true, 3);
    $("#box_vol_weight").number(true, 3).attr("disabled", true);
    $("#box_total_cubic").number(true, 3).attr("disabled", true);

    $("#box_flash_point").number(true, 2);

    $("#vehicle_length").number(true, 3);
    $("#vehicle_quantity").number(true);
    $("#vehicle_unit_weight").number(true, 3);
    $("#vehicle_total_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_width").number(true, 3);
    $("#vehicle_height").number(true, 3);
    $("#vehicle_vol_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_total_cubic").number(true, 3).attr("disabled", true);

    $("#total_quantity").number(true).attr("disabled", true);
   // $("#booking_code").attr("disabled", true);
    $("#total_weight_kgs").number(true, 3).attr("disabled", true);
    $("#total_cubic_cbm").number(true, 3).attr("disabled", true);
    $("#total_charge_weight_kgs").number(true, 3).attr("disabled", true);
    $("#total_weight_lbs").number(true, 3).attr("disabled", true);
    $("#total_cubic_cft").number(true, 3).attr("disabled", true);
    $("#total_charge_weight_lbs").number(true, 3).attr("disabled", true);
    $("#billing_customer_name").attr("disabled", true);
    $("#cargo_weight_k").number(true, 3).attr("disabled", true);
            $("#cargo_cubic_k").number(true, 3).attr("disabled", true);
            $("#cargo_charge_weight_k").number(true, 3).attr("disabled", true);
            $("#cargo_weight_l").number(true, 3).attr("disabled", true);
            $("#cargo_cubic_l").number(true, 3).attr("disabled", true);
            $("#cargo_charge_weight_l").number(true, 3).attr("disabled", true);
            $("#cargo_rate").number(true, 3);
            $("#cargo_amount").number(true, 3).attr("disabled", true);
    $("#user_id").attr("disabled", true);

    $("#charges_bill").number(true, 3).attr("disabled", true);
    $("#charges_cost").number(true, 3).attr("disabled", true);
    $("#charges_profit").number(true, 3).attr("disabled", true);
    $("#charges_profit_p").number(true, 3).attr("disabled", true);
    $("#transportation_plans_amount").number(true, 3).attr("disabled", true);
    $("#transportation_amount").number(true, 3);


</script>