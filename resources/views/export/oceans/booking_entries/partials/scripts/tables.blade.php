<script type="text/javascript">
    $("#btn_container_details").click(function() {
        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_container").click(function() {
        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_charge_details").click(function() {
        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_charge").click(function() {
        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_cargo_details").click(function() {
        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_cargo").click(function() {
        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_box_details").click(function() {
        $("#box_quantity").val(1);
        $("#box_pieces").val(1);
        $("#box_metric_unit").val("I").change();
        $("#box_weight_unit").val("L").change();
        $("#box_dim_fact").val("I").change();
        for (var t = $("#box-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_vehicle_details").click(function() {
        $("#vehicle_quantity").val(1);
        $("#vehicle_pieces").val(1);
        $("#vehicle_metric_unit").val("I").change();
        $("#vehicle_weight_unit").val("L").change();
        $("#vehicle_dim_fact").val("I").change();
        for (var t = $("#vehicle-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_box_detail").click(function() {
        for (var t = $("#box-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_edit_vehicle_detail").click(function() {
        for (var t = $("#vehicle-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn-pick-cargo").click(function() {
        for (var t = $("#pick-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });


    $("#charges-save").click(function() {
        if($("#billing_billing_code").val()==''){
            show_alert();
            $("#billing_billing_code").focus();
        }else{
            var t = $("#charge_details tbody tr").length + 1,
                    _ =  ($("#charge_details tbody tr").length == 0 ? 1 : parseInt($("#charge_details tbody tr")[$("#charge_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                    charge_id = $("#charge_line").val(),
                    d= (0== charge_id? _: charge_id)-1,
                    g_1 = $("#billing_billing_id").val(),
                    g_2 = $("#billing_billing_code").val(),
                    g_3 = $("#billing_billing_description").val(),
                    g_4 = $("#billing_bill_type").val(),
                    g_5 = $("#billing_bill_party").val(),
                    g_6 = $("#billing_notes").val(),
                    g_7 = $("#billing_quantity").val(),
                    g_8 = $("#billing_unit_id").val(),
                    g_9 = $("#billing_unit_name").val().toUpperCase(),
                    g_10 = $("#billing_increase").val(),
                    g_11 = $("#billing_rate").val(),
                    g_12 = $("#billing_amount").val(),
                    g_13 = $("#billing_currency_type").val(),
                    g_14 = $("#billing_exchange_rate").val(),
                    g_15 = $("#billing_customer_id").val(),
                    g_16 = $("#billing_customer_name").val().toUpperCase(),
                    g_17 = $("#cost_quantity").val(),
                    g_18 = $("#cost_unit_id").val(),
                    g_19 = $("#cost_unit_name").val().toUpperCase(),
                    g_20 = $("#cost_rate").val(),
                    g_21 = $("#cost_amount").val(),
                    g_22 = $("#cost_currency_type").val(),
                    g_23 = $("#cost_exchange_rate").val(),
                    g_24 = $("#billing_vendor_code").val(),
                    g_25 = $("#billing_vendor_name").val().toUpperCase(),
                    g_26 = $("#cost_date").val(),
                    g_27 = $("#cost_invoice").val().toUpperCase(),
                    g_28 = $("#cost_cost_center").val().toUpperCase(),
                    g_29 = $("#cost_reference").val().toUpperCase(),

                    b = $("#charge_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");


            C.append(createTableContent('charge_id', (0== charge_id? _: charge_id) , true,d))
                    .append(createTableContent('billing_billing_id', g_1, true, d))
                    .append(createTableContent('billing_billing_code', g_2, false, d))
                    .append(createTableContent('billing_billing_description', g_3, false, d))
                    .append(createTableContent('billing_bill_type', g_4, false, d))
                    .append(createTableContent('billing_bill_party', g_5, false, d))
                    .append(createTableContent('billing_quantity', g_7, false, d))
                    .append(createTableContent('billing_rate', g_11, false, d))
                    .append(createTableContent('billing_amount', g_12, false, d))
                    .append(createTableContent('billing_currency_type', g_13, true, d))
                    .append(createTableContent('billing_customer_name', g_16, false, d))
                    .append(createTableContent('cost_amount', g_21, false, d))
                    .append(createTableContent('cost_currency_type', g_22, true, d))
                    .append(createTableContent('cost_invoice', g_27, true, d))
                    .append(createTableContent('cost_reference', g_29, true, d))


                    .append(createTableContent('billing_notes', g_6, true, d))
                    .append(createTableContent('billing_unit_id', g_8, true, d))
                    .append(createTableContent('billing_unit_name', g_9, true, d))
                    .append(createTableContent('billing_exchange_rate', g_14, true, d))
                    .append(createTableContent('billing_customer_id', g_15, true, d))
                    .append(createTableContent('cost_quantity', g_17, true, d))
                    .append(createTableContent('cost_unit_id', g_18, true, d))
                    .append(createTableContent('cost_unit_name', g_19, true, d))
                    .append(createTableContent('cost_rate', g_20, true, d))
                    .append(createTableContent('cost_cost_center', g_28, true, d))
                    .append(createTableContent('cost_exchange_rate', g_23, true, d))
                    .append(createTableContent('billing_vendor_code', g_24, true, d))
                    .append(createTableContent('billing_vendor_name', g_25, true, d))
                    .append(createTableContent('cost_date', g_26, true, d))
                    .append(createTableContent('billing_increase', g_10, true, d))

                    .append(createTableBtns()),

                    0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C),values_charges(), cleanModalFields("Charge_Details"), $("#Charge_Details").modal("hide"), $("#billing_billing_code").focus()
        }

    }), $("#charge_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
                values_charges()
    }), $("#charge_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('charge_details');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[1].textContent,
                g3 = t[0].childNodes[2].textContent,
                g4 = t[0].childNodes[3].textContent,
                g5 = t[0].childNodes[4].textContent,
                g6 = t[0].childNodes[5].textContent,
                g7 = t[0].childNodes[6].textContent,
                g8 = t[0].childNodes[7].textContent,
                g9 = t[0].childNodes[8].textContent,
                g10 = t[0].childNodes[9].textContent,
                g11 = t[0].childNodes[10].textContent,
                g12 = t[0].childNodes[11].textContent,
                g13 = t[0].childNodes[12].textContent,
                g14 = t[0].childNodes[13].textContent,
                g15 = t[0].childNodes[14].textContent,
                g16 = t[0].childNodes[15].textContent,
                g17 = t[0].childNodes[16].textContent,
                g18 = t[0].childNodes[17].textContent,
                g19 = t[0].childNodes[18].textContent,
                g20 = t[0].childNodes[19].textContent,
                g21 = t[0].childNodes[20].textContent,
                g22 = t[0].childNodes[21].textContent,
                g23 = t[0].childNodes[22].textContent,
                g24 = t[0].childNodes[23].textContent,
                g25 = t[0].childNodes[24].textContent,
                g26 = t[0].childNodes[25].textContent,
                g27 = t[0].childNodes[26].textContent,
                g28 = t[0].childNodes[27].textContent,
                g29 = t[0].childNodes[28].textContent,
                g30 = t[0].childNodes[29].textContent;

        $("#charge_line").val(g1),
                $("#billing_billing_id").val(g2),
                $("#billing_billing_code").val(g3),
                $("#billing_billing_description").val(g4),
                $("#billing_bill_type").val(g5),
                $("#billing_bill_party").val(g6),
                $("#billing_quantity").val(g7),
                $("#billing_rate").val(g8),
                $("#billing_amount").val(g9),
                $("#billing_currency_type").val(g10),
                $("#billing_customer_name").val(g11),
                $("#cost_amount").val(g12),
                $("#cost_currency_type").val(g13),
                $("#cost_invoice").val(g14),
                $("#cost_reference").val(g15),

                $("#billing_notes").val(g16),
                $("#billing_unit_id").val(g17),
                $("#billing_unit_name").val(g18),
                $("#billing_exchange_rate").val(g19),
                $("#billing_customer_id").val(g20),
                $("#cost_quantity").val(g21),
                $("#cost_unit_id").val(g22),
                $("#cost_unit_name").val(g23),
                $("#cost_rate").val(g24),
                $("#cost_cost_center").val(g25),
                $("#cost_exchange_rate").val(g26),
                $("#billing_vendor_code").val(g27),
                $("#billing_vendor_name").val(g28),
                $("#cost_date").val(g29),
                $("#billing_increase").val(g30),

                $("#Charge_Details").modal("show"), $("#billing_billing_code").focus()
    });

    $("#container-save").click(function() {
        if($("#equipment_type_code").val()==''){
            show_alert();
            $("#equipment_type_code").focus();
        }else{
            var t = $("#container_details tbody tr").length + 1,
                    _ =  ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                    container_id = $("#container_line").val(),
                    d= (0== container_id? _ : container_id)-1,
                    g_1 = $("#equipment_type_id").val(),
                    g_2 = $("#equipment_type_code").val().toUpperCase(),
                    g_3 = $("#container_number").val(),
                    g_4 = $("#container_seal_number").val(),
                    g_5 = $("#shipper_owned").val(),
                    g_6 = $("#container_commodity_id").val(),
                    g_7 = $("#container_commodity_name").val().toUpperCase(),
                    g_8 = $("#pd_status").val(),
                    g_9 = $("#container_spotting_date").val(),
                    g_10 = $("#container_pull_date").val(),
                    g_11 = $("#container_carrier_id").val(),
                    g_12 = $("#container_carrier_name").val().toUpperCase(),
                    g_13 = $("#container_ventilation").val(),
                    g_14 = $("#container_degrees").val(),
                    g_15 = $("#container_temperature").val(),
                    g_16 = $("#container_max").val(),
                    g_17 = $("#container_min").val(),

                    g_18 = $("#container_pickup_id").val(),
                    g_19 = $("#container_pickup_name").val().toUpperCase(),
                    g_20 = $("#container_pickup_type").val(),
                    g_21 = $("#container_pickup_address").val(),
                    g_22 = $("#container_pickup_city").val(),
                    g_23 = $("#container_pickup_state_id").val(),
                    g_24 = $("#container_pickup_state_name").val().toUpperCase(),
                    g_25 = $("#container_pickup_zip_code_id").val(),
                    g_26 = $("#container_pickup_zip_code_code").val().toUpperCase(),
                    g_27 = $("#container_pickup_phone").val(),
                    g_28 = $("#container_pickup_contact").val(),
                    g_29 = $("#container_pickup_date").val(),
                    g_30 = $("#container_pickup_number").val(),

                    g_31 = $("#container_delivery_id").val(),
                    g_32 = $("#container_delivery_name").val(),
                    g_33 = $("#container_delivery_type").val(),
                    g_34 = $("#container_delivery_address").val(),
                    g_35 = $("#container_delivery_city").val(),
                    g_36 = $("#container_delivery_state_id").val(),
                    g_37 = $("#container_delivery_state_name").val().toUpperCase(),
                    g_38 = $("#container_delivery_zip_code_id").val(),
                    g_39 = $("#container_delivery_zip_code_code").val().toUpperCase(),
                    g_40 = $("#container_delivery_phone").val(),
                    g_41 = $("#container_delivery_contact").val(),
                    g_42 = $("#container_delivery_date").val(),
                    g_43 = $("#container_delivery_number").val(),

                    g_44 = $("#container_drop_id").val(),
                    g_45 = $("#container_drop_name").val(),
                    g_46 = $("#container_drop_type").val(),
                    g_47 = $("#container_drop_address").val(),
                    g_48 = $("#container_drop_city").val(),
                    g_49 = $("#container_drop_state_id").val(),
                    g_50 = $("#container_drop_state_name").val().toUpperCase(),
                    g_51 = $("#container_drop_zip_code_id").val(),
                    g_52 = $("#container_drop_zip_code_code").val().toUpperCase(),
                    g_53 = $("#container_drop_phone").val(),
                    g_54 = $("#container_drop_contact").val(),
                    g_55 = $("#container_drop_date").val(),
                    g_56 = $("#container_drop_number").val(),

                    g_57 = $("#container_hazardous_contact").val(),
                    g_58 = $("#container_hazardous_phone").val(),

                    g_59 = $("#container_inner_code").val().toUpperCase(),
                    g_60 = $("#container_inner_quantity").val(),
                    g_61 = $("#container_net_weight").val(),
                    g_62 = $("#container_number_equipment").val(),
                    g_63 = $("#container_outer_code").val().toUpperCase(),
                    g_64 = $("#container_outer_quantity").val(),
                    g_65 = $("#container_release_number").val(),
                    g_66 = $("#container_requested_equipment").val(),
                    g_67 = $("#container_tare_weight").val(),

                    g_68 = $("#dock_receipt").val(),
                    g_69 = $("#shipper_export").val(),
                    g_70 = $("#attachments").val(),
                    g_71 = $("#release").val(),
                    g_72 = $("#bill_of_lading").val(),
                    g_73 = $("#container_other").val(),
                    g_74 = $("#container_comments").val().toUpperCase(),
                    g_75 = $("#total_weight_unit").val(),



                    b = $("#container_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== container_id? _ : container_id) + ">");


            C.append(createTableContent('container_line', (0== container_id? _ : container_id) , true,d))
                    .append(createTableContent('equipment_type_id', g_1, true, d))
                    .append(createTableContent('equipment_type_code', g_2, false, d))
                    .append(createTableContent('container_number', g_3, false, d))
                    .append(createTableContent('container_seal_number', g_4, false, d))
                    .append(createTableContent('total_weight_unit', g_75, false, d))
                    .append(createTableContent('shipper_owned', g_5, true, d))
                    .append(createTableContent('container_commodity_id', g_6, true, d))
                    .append(createTableContent('container_commodity_name', g_7, true, d))
                    .append(createTableContent('pd_status', g_8, false, d))
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
                    .append(createTableContent('container_pickup_name', g_19, true, d))
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
                    .append(createTableContent('container_delivery_name', g_32, true, d))
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
                    .append(createTableContent('container_drop_name', g_45, true, d))
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

                    .append(createTableContent('container_inner_code', g_59, true, d))
                    .append(createTableContent('container_inner_quantity', g_60, true, d))
                    .append(createTableContent('container_net_weight', g_61, false, d))
                    .append(createTableContent('container_number_equipment', g_62, true, d))
                    .append(createTableContent('container_outer_code', g_63, true, d))
                    .append(createTableContent('container_outer_quantity', g_64, true, d))
                    .append(createTableContent('container_release_number', g_65, true, d))
                    .append(createTableContent('container_requested_equipment', g_66, true, d))
                    .append(createTableContent('container_tare_weight', g_67, true, d))

                    .append(createTableContent('dock_receipt', g_68, true, d))
                    .append(createTableContent('shipper_export', g_69, true, d))
                    .append(createTableContent('attachments', g_70, true, d))
                    .append(createTableContent('release', g_71, true, d))
                    .append(createTableContent('bill_of_lading', g_72, true, d))
                    .append(createTableContent('container_other', g_73, true, d))
                    .append(createTableContent('container_comments', g_74, true, d))
                    .append(createTableBtns()),

                    0 == container_id ? x.append(C) : x.find("tr#" + container_id).replaceWith(C), $("#Container_Details").modal("hide"), $("#equipment_type_code").focus();

            //===================
            var id_row = (0 == container_id ? _ : container_id);
            $("#hzd_details tbody [data-id='" + id_row + "']").remove();

            var n = $("#hzd_details"),
                    t_ = n.find("tbody");
            var tr=  $("#hazardous-details tbody tr"),
                    tr_1= $("#hzd_details tbody tr");
            var  r_1= tr.length;
            d =tr_1.length + 1;
            for(var a =0; a< r_1 ; a++) {
                var p_1 = $("<tr data-id=" + id_row + ">");
                p_1.append(createTableContent('hzd_container_id', id_row , true, d))
                        .append(createTableContent('hzd_line', tr[a].childNodes[1].textContent, true, d))
                        .append(createTableContent('hzd_uns_id', tr[a].childNodes[0].textContent, true, d))
                        .append(createTableContent('hzd_uns_code', tr[a].childNodes[2].textContent, true, d))
                        .append(createTableContent('hzd_uns_desc', tr[a].childNodes[3].textContent, true, d))
                        .append(createTableContent('hzd_uns_note', tr[a].childNodes[4].textContent, true, d))
                        ,t_.append(p_1);
                d =d + 1 ;

            }
                    clearTable('hazardous-details');
        }

    }), $("#container_details").on("click", "a.btn-danger", function() {
        var id_row = $(this).closest('tr').attr('id');
        $("#hzd_details tbody [data-id='" + id_row + "']").remove();
        $(this).closest("tr").remove()

    }), $("#container_details").on("click", "a.btn-default", function() {

        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[1].textContent,
                g3 = t[0].childNodes[2].textContent,
                g4 = t[0].childNodes[3].textContent,
                g5 = t[0].childNodes[4].textContent,
                g6 = t[0].childNodes[5].textContent,
                g7 = t[0].childNodes[6].textContent,
                g8 = t[0].childNodes[7].textContent,
                g9 = t[0].childNodes[8].textContent,
                g10 = t[0].childNodes[9].textContent,
                g11 = t[0].childNodes[10].textContent,
                g12 = t[0].childNodes[11].textContent,
                g13 = t[0].childNodes[12].textContent,
                g14 = t[0].childNodes[13].textContent,
                g15 = t[0].childNodes[14].textContent,
                g16 = t[0].childNodes[15].textContent,
                g17 = t[0].childNodes[16].textContent,
                g18 = t[0].childNodes[17].textContent,
                g19 = t[0].childNodes[18].textContent,
                g20 = t[0].childNodes[19].textContent,
                g21 = t[0].childNodes[20].textContent,
                g22 = t[0].childNodes[21].textContent,
                g23 = t[0].childNodes[22].textContent,
                g24 = t[0].childNodes[23].textContent,
                g25 = t[0].childNodes[24].textContent,
                g26 = t[0].childNodes[25].textContent,
                g27 = t[0].childNodes[26].textContent,
                g28 = t[0].childNodes[27].textContent,
                g29 = t[0].childNodes[28].textContent,
                g30 = t[0].childNodes[29].textContent,
                g31 = t[0].childNodes[30].textContent,
                g32 = t[0].childNodes[31].textContent,
                g33 = t[0].childNodes[32].textContent,
                g34 = t[0].childNodes[33].textContent,
                g35 = t[0].childNodes[34].textContent,
                g36 = t[0].childNodes[35].textContent,
                g37 = t[0].childNodes[36].textContent,
                g38 = t[0].childNodes[37].textContent,
                g39 = t[0].childNodes[38].textContent,
                g40 = t[0].childNodes[39].textContent,
                g41 = t[0].childNodes[40].textContent,
                g42 = t[0].childNodes[41].textContent,
                g43 = t[0].childNodes[42].textContent,
                g44 = t[0].childNodes[43].textContent,
                g45 = t[0].childNodes[44].textContent,
                g46 = t[0].childNodes[45].textContent,
                g47 = t[0].childNodes[46].textContent,
                g48 = t[0].childNodes[47].textContent,
                g49 = t[0].childNodes[48].textContent,
                g50 = t[0].childNodes[49].textContent,
                g51 = t[0].childNodes[50].textContent,
                g52 = t[0].childNodes[51].textContent,
                g53 = t[0].childNodes[52].textContent,
                g54 = t[0].childNodes[53].textContent,
                g55 = t[0].childNodes[54].textContent,
                g56 = t[0].childNodes[55].textContent,
                g57 = t[0].childNodes[56].textContent,
                g58 = t[0].childNodes[57].textContent,
                g59 = t[0].childNodes[58].textContent,
                g60 = t[0].childNodes[59].textContent,
                g61 = t[0].childNodes[60].textContent,
                g62 = t[0].childNodes[61].textContent,
                g63 = t[0].childNodes[62].textContent,
                g64 = t[0].childNodes[63].textContent,
                g65 = t[0].childNodes[64].textContent,
                g66 = t[0].childNodes[65].textContent,
                g67 = t[0].childNodes[66].textContent,
                g68 = t[0].childNodes[67].textContent,
                g69 = t[0].childNodes[68].textContent,
                g70 = t[0].childNodes[69].textContent,
                g71 = t[0].childNodes[70].textContent,
                g72 = t[0].childNodes[71].textContent,
                g73 = t[0].childNodes[72].textContent,
                g74 = t[0].childNodes[73].textContent,
                g75 = t[0].childNodes[74].textContent,
                g76 = t[0].childNodes[75].textContent;

        $("#container_line").val(g1),
               $("#equipment_type_id").val(g2),
                $("#equipment_type_code").val(g3),
                $("#container_number").val(g4),
                $("#container_seal_number").val(g5),
                $("#total_weight_unit").val(g6),
                $("#shipper_owned").val(g7),
                $("#container_commodity_id").val(g8),
                $("#container_commodity_name").val(g9),
                $("#pd_status").val(g10),
                $("#container_spotting_date").val(g11),
                $("#container_pull_date").val(g12),
                $("#container_carrier_id").val(g13),
                $("#container_carrier_name").val(g14),
                $("#container_ventilation").val(g15),
                $("#container_degrees").val(g16),
                $("#container_temperature").val(g17),
                $("#container_max").val(g18),
                $("#container_min").val(g19),

                $("#container_pickup_id").val(g20),
                $("#container_pickup_name").val(g21),
                $("#container_pickup_type").val(g22),
                $("#container_pickup_address").val(g23),
                $("#container_pickup_city").val(g24),
                $("#container_pickup_state_id").val(g25),
                $("#container_pickup_state_name").val(g26),
                $("#container_pickup_zip_code_id").val(g27),
                $("#container_pickup_zip_code_code").val(g28),
                $("#container_pickup_phone").val(g29),
                $("#container_pickup_contact").val(g30),
                $("#container_pickup_date").val(g31),
                $("#container_pickup_number").val(g32),

                $("#container_delivery_id").val(g33),
                $("#container_delivery_name").val(g34),
                $("#container_delivery_type").val(g35),
                $("#container_delivery_address").val(g36),
                $("#container_delivery_city").val(g37),
                $("#container_delivery_state_id").val(g38),
                $("#container_delivery_state_name").val(g39),
                $("#container_delivery_zip_code_id").val(g40),
                $("#container_delivery_zip_code_code").val(g41),
                $("#container_delivery_phone").val(g42),
                $("#container_delivery_contact").val(g43),
                $("#container_delivery_date").val(g44),
                $("#container_delivery_number").val(g45),

                $("#container_drop_id").val(g46),
                $("#container_drop_name").val(g47),
                $("#container_drop_type").val(g48),
                $("#container_drop_address").val(g49),
                $("#container_drop_city").val(g50),
                $("#container_drop_state_id").val(g51),
                $("#container_drop_state_name").val(g52),
                $("#container_drop_zip_code_id").val(g53),
                $("#container_drop_zip_code_code").val(g54),
                $("#container_drop_phone").val(g55),
                $("#container_drop_contact").val(g56),
                $("#container_drop_date").val(g57),
                $("#container_drop_number").val(g58),

                $("#container_hazardous_contact").val(g59),
                $("#container_hazardous_phone").val(g60),

                $("#container_inner_code").val(g61),
                $("#container_inner_quantity").val(g62),
                $("#container_net_weight").val(g63),
                $("#container_number_equipment").val(g64),
                $("#container_outer_code").val(g65),
                $("#container_outer_quantity").val(g66),
                $("#container_release_number").val(g67),
                $("#container_requested_equipment").val(g68),
                $("#container_tare_weight").val(g69),

                $("#dock_receipt").val(g70),
                $("#shipper_export").val(g71),
                $("#attachments").val(g72),
                $("#release").val(g73),
                $("#bill_of_lading").val(g74),
                $("#container_other").val(g75),
                $("#container_comments").val(g76),
        $("#Container_Details").modal("show"), $("#equipment_type_code").focus()

        //charge
        clearTable("hazardous-details");
        var n = $("#hazardous-details");
        t = n.find("tbody");
        var tr=  $("#hzd_details tbody tr");
        var tr_1=  $("#hazardous-details tbody tr");
        var  r_1= tr.length;
        var d =1;

        for(var a =0; a< r_1 ; a++){
            if( tr[a].childNodes[0].textContent == g1){
                var  p_1=  $("<tr id=" + d + ">");
                p_1.append(createTableContent('hazardous_uns_id',tr[a].childNodes[2].textContent, true, d))
                        .append(createTableContent('hazardous_uns_line',tr[a].childNodes[1].textContent, true, d))
                        .append(createTableContent('hazardous_uns_code',tr[a].childNodes[3].textContent, false, d))
                        .append(createTableContent('hazardous_uns_desc',tr[a].childNodes[4].textContent, false, d))
                        .append(createTableContent('hazardous_uns_note',tr[a].childNodes[5].textContent, true, d))
                        .append(createTableBtns())
                        ,t.append(p_1);

                d = d+1;
            }
        }
    });


    $("#box-save").click(function() {
        if($("#box_cargo_type_code").val()==''){
            show_alert();
            $("#box_cargo_type_code").focus();
        }else{
            var t = $("#cargo_vehicle_details tbody tr").length + 1,
                    _ =  ($("#cargo_vehicle_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_vehicle_details tbody tr")[$("#cargo_vehicle_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    box_id = $("#box_line").val(),
                    d= (0== box_id? _: box_id)-1,
                    g_1 = $("#box_quantity").val(),
                    g_2 = $("#box_cargo_type_id").val(),
                    g_3 = $("#box_cargo_type_code").val(),
                    g_4 = $("#box_metric_unit").val(),
                    g_5 = $("#box_length").val(),
                    g_6 = $("#box_width").val(),
                    g_7 = $("#box_height").val(),
                    g_8 = $("#box_materials").val(),
                    g_9 = $("#box_pieces").val(),
                    g_10 = $("#box_weight_unit").val(),
                    g_11 = $("#box_unit_weight").val(),
                    g_12 = $("#box_total_weight").val(),
                    g_13 = $("#box_total_cubic").val(),
                    g_14 = $("#box_dim_fact").val(),
                    g_15 = $("#box_vol_weight").val(),

                    g_16 = $("#box_serial_number").val(),
                    g_17 = $("#box_barcode").val(),
                    g_18 = $("#box_Model").val(),
                    g_19 = $("#box_commodity_id").val(),
                    g_20 = $("#box_commodity_name").val(),
                    g_21 = $("#box_pro_number").val(),
                    g_22 = $("#box_project").val(),
                    g_23 = $("#box_po_number").val(),
                    g_24 = $("#box_inv_number").val(),
                    g_25 = $("#box_lot_number").val(),
                    g_26 = $("#box_sku_number").val(),
                    g_27 = $("#box_destination_point").val(),
                    g_28 = $("#box_attention").val(),

                    g_29 = $("#box_scheduleb_id").val(),
                    g_30 = $("#box_scheduleb_code").val(),
                    g_31 = $("#box_scheduleb_description").val(),
                    g_32 = $("#box_hts_id").val(),
                    g_33 = $("#box_hts_code").val(),
                    g_34 = $("#box_hts_description").val(),
                    g_35 = $("#box_value").val(),
                    g_36 = $("#box_eccn").val(),
                    g_37 = $("#box_export_id").val(),
                    g_38 = $("#box_export_code").val(),
                    g_39 = $("#box_license_type_id").val(),
                    g_40 = $("#box_license_type_code").val(),
                    g_41 = $("#box_origin").val(),
                    g_42 = $("#box_ncm_code").val(),

                    g_43 = $("#box_uns_id").val(),
                    g_44 = $("#box_uns_code").val(),
                    g_45 = $("#box_uns_description").val(),
                    g_46 = $("#box_class_id").val(),
                    g_47 = $("#box_class_description").val(),
                    g_48 = $("#box_packing_group").val(),
                    g_49 = $("#box_flash_point").val(),
                    g_50 = $("#box_flashing_point_type").val(),
                    g_51 = $("#box_special_instructions").val(),
                    g_52 = $("#box_units").val(),
                    g_53 = $("#box_material_page").val(),
                    g_54 = $("#box_hazardous_quantity").val(),
                    g_55 = $("#box_label_required").val(),
                    g_56 = $("#box_emergency_contact").val(),
                    g_57 = $("#box_emergency_contact_phone").val(),
                    g_58 = $("#box_comments").val(),

                    b = $("#cargo_vehicle_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== box_id? _ : box_id) + ">");


            C.append(createTableContent('details_id', (0 == box_id ? _  : box_id), true,d))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                    .append(createTableContent('details_quantity', g_1, false, d))
                    .append(createTableContent('details_unit', g_10, false, d))
                    .append(createTableContent('details_length', g_5, false, d))
                    .append(createTableContent('details_width', g_6, false, d))
                    .append(createTableContent('details_height', g_7, false, d))
                    .append(createTableContent('details_total_weight', g_12, false, d))
                    .append(createTableContent('details_total_cubic', g_13, false, d))

                    .append(createTableContent('details_cargo_type_id', g_2, true, d))
                    .append(createTableContent('details_cargo_type_code', g_3, true, d))
                    .append(createTableContent('details_metric_unit', g_4, true, d))
                    .append(createTableContent('details_material', g_8, true, d))
                    .append(createTableContent('details_pieces', g_9, true, d))
                    .append(createTableContent('details_unit_weight', g_11, true, d))
                    .append(createTableContent('details_dim_fact', g_14, true, d))
                    .append(createTableContent('details_vol_weight', g_15, true, d))

                    .append(createTableContent('details_serial_number', g_16, true, d))
                    .append(createTableContent('details_barcode', g_17, true, d))
                    .append(createTableContent('details_Model', g_18, true, d))
                    .append(createTableContent('details_commodity_id', g_19, true, d))
                    .append(createTableContent('details_commodity_name', g_20, true, d))
                    .append(createTableContent('details_pro_number', g_21, true, d))
                    .append(createTableContent('details_project', g_22, true, d))
                    .append(createTableContent('details_po_number', g_23, true, d))
                    .append(createTableContent('details_inv_number', g_24, true, d))
                    .append(createTableContent('details_lot_number', g_25, true, d))
                    .append(createTableContent('details_sku_number', g_26, true, d))
                    .append(createTableContent('details_destination_point', g_27, true, d))
                    .append(createTableContent('details_attention', g_28, true, d))

                    .append(createTableContent('details_scheduleb_id', g_29, true, d))
                    .append(createTableContent('details_scheduleb_code', g_30, true, d))
                    .append(createTableContent('details_scheduleb_description', g_31, true, d))
                    .append(createTableContent('details_hts_id', g_32, true, d))
                    .append(createTableContent('details_hts_code', g_33, true, d))
                    .append(createTableContent('details_hts_description', g_34, true, d))
                    .append(createTableContent('details_value', g_35, true, d))
                    .append(createTableContent('details_eccn', g_36, true, d))
                    .append(createTableContent('details_export_id', g_37, true, d))
                    .append(createTableContent('details_export_code', g_38, true, d))
                    .append(createTableContent('details_license_type_id', g_39, true, d))
                    .append(createTableContent('details_license_type_code', g_40, true, d))
                    .append(createTableContent('details_origin', g_41, true, d))
                    .append(createTableContent('details_ncm_code', g_42, true, d))

                    .append(createTableContent('details_uns_id', g_43, true, d))
                    .append(createTableContent('details_uns_code', g_44, true, d))
                    .append(createTableContent('details_uns_description', g_45, true, d))
                    .append(createTableContent('details_class_id', g_46, true, d))
                    .append(createTableContent('details_class_description', g_47, true, d))
                    .append(createTableContent('details_packing_group', g_48, true, d))
                    .append(createTableContent('details_flash_point', g_49, true, d))
                    .append(createTableContent('details_flashing_point_type', g_50, true, d))
                    .append(createTableContent('details_special_instructions', g_51, true, d))
                    .append(createTableContent('details_units', g_52, true, d))
                    .append(createTableContent('details_material_page', g_53, true, d))
                    .append(createTableContent('details_hazardous_quantity', g_54, true, d))
                    .append(createTableContent('details_label_required', g_55, true, d))
                    .append(createTableContent('details_emergency_contact', g_56, true, d))
                    .append(createTableContent('details_emergency_contact_phone', g_57, true, d))
                    .append(createTableContent('details_comments', g_58, true, d))

                    /*VEHICLE DETAILS*/
                    .append(createTableContent('vehicle_vin', '', true, d))
                    .append(createTableContent('vehicle_type', '', true, d))
                    .append(createTableContent('vehicle_color', '', true, d))
                    .append(createTableContent('vehicle_year', '', true, d))
                    .append(createTableContent('vehicle_condition', '', true, d))
                    .append(createTableContent('vehicle_make', '', true, d))
                    .append(createTableContent('vehicle_keys', '', true, d))
                    .append(createTableContent('vehicle_model', '', true, d))
                    .append(createTableContent('vehicle_running', '', true, d))
                    .append(createTableContent('vehicle_trim', '', true, d))
                    .append(createTableContent('vehicle_mileage', '', true, d))
                    .append(createTableContent('vehicle_engine', '', true, d))
                    .append(createTableContent('vehicle_tag', '', true, d))
                    .append(createTableContent('vehicle_body', '', true, d))
                    .append(createTableContent('vehicle_other', '', true, d))
                    .append(createTableContent('vehicle_number', '', true, d))
                    .append(createTableContent('vehicle_state_province_id', '', true, d))
                    .append(createTableContent('vehicle_state_province_name', '', true, d))
                    .append(createTableContent('vehicle_received', '', true, d))
                    .append(createTableContent('vehicle_inspection_number', '', true, d))
                    .append(createTableContent('vehicle_inspection_date', '', true, d))
                    .append(createTableContent('vehicle_inspection_by', '', true, d))
                    .append(createTableContent('vehicle_lot_number', '', true, d))
                    .append(createTableContent('vehicle_buyer_number', '', true, d))
                    .append(createTableContent('detail_type', '0', true, d))
                    .append(createTableBtns()),

                    0 == box_id ? x.append(C) : x.find("tr#" + box_id).replaceWith(C), cleanModalFields("Box_Details") ,values_box_vehicle(),$("#Box_Details").modal("show"), $("#box_quantity").focus()
        }

    }), $("#cargo_vehicle_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
        values_box_vehicle()

    }), $("#cargo_vehicle_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('cargo_vehicle_details');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[2].textContent,
                g3 = t[0].childNodes[3].textContent,
                g4 = t[0].childNodes[4].textContent,
                g5 = t[0].childNodes[5].textContent,
                g6 = t[0].childNodes[6].textContent,
                g7 = t[0].childNodes[7].textContent,
                g8 = t[0].childNodes[8].textContent,
                g9 = t[0].childNodes[9].textContent,
                g10 = t[0].childNodes[10].textContent,
                g11 = t[0].childNodes[11].textContent,
                g12 = t[0].childNodes[12].textContent,
                g13 = t[0].childNodes[13].textContent,
                g14 = t[0].childNodes[14].textContent,
                g15 = t[0].childNodes[15].textContent,
                g16 = t[0].childNodes[16].textContent,

                g17 = t[0].childNodes[17].textContent,
                g18 = t[0].childNodes[18].textContent,
                g19 = t[0].childNodes[19].textContent,
                g20 = t[0].childNodes[20].textContent,
                g21 = t[0].childNodes[21].textContent,
                g22 = t[0].childNodes[22].textContent,
                g23 = t[0].childNodes[23].textContent,
                g24 = t[0].childNodes[24].textContent,
                g25 = t[0].childNodes[25].textContent,
                g26 = t[0].childNodes[26].textContent,
                g27 = t[0].childNodes[27].textContent,
                g28 = t[0].childNodes[28].textContent,
                g29 = t[0].childNodes[29].textContent,

                g30 = t[0].childNodes[30].textContent,
                g31 = t[0].childNodes[31].textContent,
                g32 = t[0].childNodes[32].textContent,
                g33 = t[0].childNodes[33].textContent,
                g34 = t[0].childNodes[34].textContent,
                g35 = t[0].childNodes[35].textContent,
                g36 = t[0].childNodes[36].textContent,
                g37 = t[0].childNodes[37].textContent,
                g38 = t[0].childNodes[38].textContent,
                g39 = t[0].childNodes[39].textContent,
                g40 = t[0].childNodes[40].textContent,
                g41 = t[0].childNodes[41].textContent,
                g42 = t[0].childNodes[42].textContent,
                g43 = t[0].childNodes[43].textContent,

                g44 = t[0].childNodes[44].textContent,
                g45 = t[0].childNodes[45].textContent,
                g46 = t[0].childNodes[46].textContent,
                g47 = t[0].childNodes[47].textContent,
                g48 = t[0].childNodes[48].textContent,
                g49 = t[0].childNodes[49].textContent,
                g50 = t[0].childNodes[50].textContent,
                g51 = t[0].childNodes[51].textContent,
                g52 = t[0].childNodes[52].textContent,
                g53 = t[0].childNodes[53].textContent,
                g54 = t[0].childNodes[54].textContent,
                g55 = t[0].childNodes[55].textContent,
                g56 = t[0].childNodes[56].textContent,
                g57 = t[0].childNodes[57].textContent,
                g58 = t[0].childNodes[58].textContent,
                g59 = t[0].childNodes[59].textContent,
                type = t[0].childNodes[84].textContent;

        $("#box_line").val(g1),
              $("#box_quantity").val(g2),
                $("#box_weight_unit").val(g3),
                $("#box_length").val(g4),
                $("#box_width").val(g5),
                $("#box_height").val(g6),
                $("#box_total_weight").val(g7),
                $("#box_total_cubic").val(g8),

                $("#box_cargo_type_id").val(g9),
                $("#box_cargo_type_code").val(g10),
                $("#box_metric_unit").val(g11),
                $("#box_materials").val(g12),
                $("#box_pieces").val(g13),
                $("#box_unit_weight").val(g14),
                $("#box_dim_fact").val(g15),
                $("#box_vol_weight").val(g16),

                $("#box_serial_number").val(g17),
                $("#box_barcode").val(g18),
                $("#box_Model").val(g19),
                $("#box_commodity_id").val(g20),
                $("#box_commodity_name").val(g21),
                $("#box_pro_number").val(g22),
                $("#box_project").val(g23),
                $("#box_po_number").val(g24),
                $("#box_inv_number").val(g25),
                $("#box_lot_number").val(g26),
                $("#box_sku_number").val(g27),
                $("#box_destination_point").val(g28),
                $("#box_attention").val(g29),

                $("#box_scheduleb_id").val(g30),
                $("#box_scheduleb_code").val(g31),
                $("#box_scheduleb_description").val(g32),
                $("#box_hts_id").val(g33),
                $("#box_hts_code").val(g34),
                $("#box_hts_description").val(g35),
                $("#box_value").val(g36),
                $("#box_eccn").val(g37),
                $("#box_export_id").val(g38),
                $("#box_export_code").val(g39),
                $("#box_license_type_id").val(g40),
                $("#box_license_type_code").val(g41),
                $("#box_origin").val(g42),
                $("#box_ncm_code").val(g43),

                $("#box_uns_id").val(g44),
                $("#box_uns_code").val(g45),
                $("#box_uns_description").val(g46),
                $("#box_class_id").val(g47),
                $("#box_class_description").val(g48),
                $("#box_packing_group").val(g49),
                $("#box_flash_point").val(g50),
                $("#box_flashing_point_type").val(g51),
                $("#box_special_instructions").val(g52),
                $("#box_units").val(g53),
                $("#box_material_page").val(g54),
                $("#box_hazardous_quantity").val(g55),
                $("#box_label_required").val(g56),
                $("#box_emergency_contact").val(g57),
                $("#box_emergency_contact_phone").val(g58),
                $("#box_comments").val(g59),
                (type== '0' || type ==''  ? $("#Box_Details").modal("show") : $("#Vehicle_Details").modal("show")), $("#box_quantity").focus()
    });

    $("#vehicle-save").click(function() {
        if($("#vehicle_vin").val()==''){
            show_alert();
            $("#vehicle_vin").focus();
        }else{
            var t = $("#cargo_vehicle_details tbody tr").length + 1,
                    _ =  ($("#cargo_vehicle_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_vehicle_details tbody tr")[$("#cargo_vehicle_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    vehicle_id = $("#vehicle_line").val(),
                    d= (0== vehicle_id? _ : vehicle_id)-1,
                    g_1 = $("#vehicle_quantity").val(),
                    g_2 = $("#vehicle_cargo_type_id").val(),
                    g_3 = $("#vehicle_cargo_type_code").val(),
                    g_4 = $("#vehicle_metric_unit").val(),
                    g_5 = $("#vehicle_length").val(),
                    g_6 = $("#vehicle_width").val(),
                    g_7 = $("#vehicle_height").val(),
                    g_8 = $("#vehicle_materials").val(),
                    g_9 = $("#vehicle_pieces").val(),
                    g_10 = $("#vehicle_weight_unit").val(),
                    g_11 = $("#vehicle_unit_weight").val(),
                    g_12 = $("#vehicle_total_weight").val(),
                    g_13 = $("#vehicle_total_cubic").val(),
                    g_14 = $("#vehicle_dim_fact").val(),
                    g_15 = $("#vehicle_vol_weight").val(),

                    g_16 = $("#vehicle_vin").val(),
                    g_17 = $("#vehicle_type").val(),
                    g_18 = $("#vehicle_color").val(),
                    g_19 = $("#vehicle_year").val(),
                    g_20 = $("#vehicle_condition").val(),
                    g_21 = $("#vehicle_make").val(),
                    g_22 = $("#vehicle_keys").val(),
                    g_23 = $("#vehicle_model").val(),
                    g_24 = $("#vehicle_running").val(),
                    g_25 = $("#vehicle_trim").val(),
                    g_26 = $("#vehicle_mileage").val(),
                    g_27 = $("#vehicle_engine").val(),
                    g_28 = $("#vehicle_tag").val(),
                    g_29 = $("#vehicle_body").val(),
                    g_30 = $("#vehicle_other").val(),
                    g_31 = $("#vehicle_number").val(),
                    g_32 = $("#vehicle_state_province_id").val(),
                    g_33 = $("#vehicle_state_province_name").val(),
                    g_34 = $("#vehicle_received").val(),
                    g_35 = $("#vehicle_inspection_number").val(),
                    g_36 = $("#vehicle_inspection_date").val(),
                    g_37 = $("#vehicle_inspection_by").val(),
                    g_38 = $("#vehicle_lot_number").val(),
                    g_39 = $("#vehicle_buyer_number").val(),

                    g_40 = $("#vehicle_scheduleb_id").val(),
                    g_41 = $("#vehicle_scheduleb_code").val(),
                    g_42 = $("#vehicle_scheduleb_description").val(),
                    g_43 = $("#vehicle_hts_id").val(),
                    g_44 = $("#vehicle_hts_code").val(),
                    g_45 = $("#vehicle_hts_description").val(),
                    g_46 = $("#vehicle_value").val(),
                    g_47 = $("#vehicle_eccn").val(),
                    g_48 = $("#vehicle_export_id").val(),
                    g_49 = $("#vehicle_export_code").val(),
                    g_50 = $("#vehicle_license_type_id").val(),
                    g_51 = $("#vehicle_license_type_code").val(),
                    g_52 = $("#vehicle_origin").val(),
                    g_53 = $("#vehicle_ncm_code").val(),
                    g_54 = $("#vehicle_comments").val(),

                    b = $("#cargo_vehicle_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== vehicle_id? _ : vehicle_id) + ">");


            C.append(createTableContent('details_id', (0 == vehicle_id ? _ : vehicle_id), true,d))
                    .append($("<td><i class='fa fa-car' aria-hidden='true'></td>"))
                    .append(createTableContent('details_quantity', g_1, false, d))
                    .append(createTableContent('details_unit', g_10, false, d))
                    .append(createTableContent('details_length', g_5, false, d))
                    .append(createTableContent('details_width', g_6, false, d))
                    .append(createTableContent('details_height', g_7, false, d))
                    .append(createTableContent('details_total_weight', g_12, false, d))
                    .append(createTableContent('details_total_cubic', g_13, false, d))

                    .append(createTableContent('details_cargo_type_id', g_2, true, d))
                    .append(createTableContent('details_cargo_type_code', g_3, true, d))
                    .append(createTableContent('details_metric_unit', g_4, true, d))
                    .append(createTableContent('details_material', g_8, true, d))
                    .append(createTableContent('details_pieces', g_9, true, d))
                    .append(createTableContent('details_unit_weight', g_11, true, d))
                    .append(createTableContent('details_dim_fact', g_14, true, d))
                    .append(createTableContent('details_vol_weight', g_15, true, d))

                    /*PART INFO*/
                    .append(createTableContent('details_serial_number', '', true, d))
                    .append(createTableContent('details_barcode', '', true, d))
                    .append(createTableContent('details_Model', '', true, d))
                    .append(createTableContent('details_commodity_id', '', true, d))
                    .append(createTableContent('details_commodity_name', '', true, d))
                    .append(createTableContent('details_pro_number', '', true, d))
                    .append(createTableContent('details_project', '', true, d))
                    .append(createTableContent('details_po_number', '', true, d))
                    .append(createTableContent('details_inv_number', '', true, d))
                    .append(createTableContent('details_lot_number', '', true, d))
                    .append(createTableContent('details_sku_number', '', true, d))
                    .append(createTableContent('details_destination_point', '', true, d))
                    .append(createTableContent('details_attention', '', true, d))

                    /*EEI INFO*/
                    .append(createTableContent('details_scheduleb_id', g_40, true, d))
                    .append(createTableContent('details_scheduleb_code', g_41, true, d))
                    .append(createTableContent('details_scheduleb_description', g_42, true, d))
                    .append(createTableContent('details_hts_id', g_43, true, d))
                    .append(createTableContent('details_hts_code', g_44, true, d))
                    .append(createTableContent('details_hts_description', g_45, true, d))
                    .append(createTableContent('details_value', g_46, true, d))
                    .append(createTableContent('details_eccn', g_47, true, d))
                    .append(createTableContent('details_export_id', g_48, true, d))
                    .append(createTableContent('details_export_code', g_49, true, d))
                    .append(createTableContent('details_license_type_id', g_50, true, d))
                    .append(createTableContent('details_license_type_code', g_51, true, d))
                    .append(createTableContent('details_origin', g_52, true, d))
                    .append(createTableContent('details_ncm_code', g_53, true, d))

                    /*HAZARDOUS*/
                    .append(createTableContent('details_uns_id', '', true, d))
                    .append(createTableContent('details_uns_code', '', true, d))
                    .append(createTableContent('details_uns_description', '', true, d))
                    .append(createTableContent('details_class_id', '', true, d))
                    .append(createTableContent('details_class_description', '', true, d))
                    .append(createTableContent('details_packing_group', '', true, d))
                    .append(createTableContent('details_flash_point', '', true, d))
                    .append(createTableContent('details_flashing_point_type', '', true, d))
                    .append(createTableContent('details_special_instructions', '', true, d))
                    .append(createTableContent('details_units', '', true, d))
                    .append(createTableContent('details_material_page', '', true, d))
                    .append(createTableContent('details_hazardous_quantity', '', true, d))
                    .append(createTableContent('details_label_required', '', true, d))
                    .append(createTableContent('details_emergency_contact', '', true, d))
                    .append(createTableContent('details_emergency_contact_phone', '', true, d))
                    .append(createTableContent('details_comments', g_54, true, d))

                    /*VEHICLE DETAILS*/
                    .append(createTableContent('vehicle_vin', g_16, true, d))
                    .append(createTableContent('vehicle_type', g_17, true, d))
                    .append(createTableContent('vehicle_color', g_18, true, d))
                    .append(createTableContent('vehicle_year', g_19, true, d))
                    .append(createTableContent('vehicle_condition', g_20, true, d))
                    .append(createTableContent('vehicle_make', g_21, true, d))
                    .append(createTableContent('vehicle_keys', g_22, true, d))
                    .append(createTableContent('vehicle_model', g_23, true, d))
                    .append(createTableContent('vehicle_running', g_24, true, d))
                    .append(createTableContent('vehicle_trim', g_25, true, d))
                    .append(createTableContent('vehicle_mileage', g_26, true, d))
                    .append(createTableContent('vehicle_engine', g_27, true, d))
                    .append(createTableContent('vehicle_tag', g_28, true, d))
                    .append(createTableContent('vehicle_body', g_29, true, d))
                    .append(createTableContent('vehicle_other', g_30, true, d))
                    .append(createTableContent('vehicle_number', g_31, true, d))
                    .append(createTableContent('vehicle_state_province_id', g_32, true, d))
                    .append(createTableContent('vehicle_state_province_name', g_33, true, d))
                    .append(createTableContent('vehicle_received', g_34, true, d))
                    .append(createTableContent('vehicle_inspection_number', g_35, true, d))
                    .append(createTableContent('vehicle_inspection_date', g_36, true, d))
                    .append(createTableContent('vehicle_inspection_by', g_37, true, d))
                    .append(createTableContent('vehicle_lot_number', g_38, true, d))
                    .append(createTableContent('vehicle_buyer_number', g_39, true, d))
                    .append(createTableContent('detail_type', '1', true, d))

                    .append(createTableBtns()),

                    0 == vehicle_id ? x.append(C) : x.find("tr#" + vehicle_id).replaceWith(C), values_box_vehicle(),cleanModalFields("Vehicle_Details"), $("#Vehicle_Details").modal("show"), $("#vehicle_quantity").focus()
        }

    }), $("#cargo_vehicle_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
        values_box_vehicle()

    }), $("#cargo_vehicle_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('cargo_vehicle_details');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[2].textContent,
                g3 = t[0].childNodes[3].textContent,
                g4 = t[0].childNodes[4].textContent,
                g5 = t[0].childNodes[5].textContent,
                g6 = t[0].childNodes[6].textContent,
                g7 = t[0].childNodes[7].textContent,
                g8 = t[0].childNodes[8].textContent,
                g9 = t[0].childNodes[9].textContent,
                g10 = t[0].childNodes[10].textContent,
                g11 = t[0].childNodes[11].textContent,
                g12 = t[0].childNodes[12].textContent,
                g13 = t[0].childNodes[13].textContent,
                g14 = t[0].childNodes[14].textContent,
                g15 = t[0].childNodes[15].textContent,
                g16 = t[0].childNodes[16].textContent,

                g17 = t[0].childNodes[30].textContent,
                g18 = t[0].childNodes[31].textContent,
                g19 = t[0].childNodes[32].textContent,
                g20 = t[0].childNodes[33].textContent,
                g21 = t[0].childNodes[34].textContent,
                g22 = t[0].childNodes[35].textContent,
                g23 = t[0].childNodes[36].textContent,
                g24 = t[0].childNodes[37].textContent,
                g25 = t[0].childNodes[38].textContent,
                g26 = t[0].childNodes[39].textContent,
                g27 = t[0].childNodes[40].textContent,
                g28 = t[0].childNodes[41].textContent,
                g29 = t[0].childNodes[42].textContent,
                g30 = t[0].childNodes[43].textContent,

                g31 = t[0].childNodes[59].textContent,
                g32 = t[0].childNodes[60].textContent,
                g33 = t[0].childNodes[61].textContent,
                g34 = t[0].childNodes[62].textContent,
                g35 = t[0].childNodes[63].textContent,
                g36 = t[0].childNodes[64].textContent,
                g37 = t[0].childNodes[65].textContent,
                g38 = t[0].childNodes[66].textContent,
                g39 = t[0].childNodes[67].textContent,
                g40 = t[0].childNodes[68].textContent,
                g41 = t[0].childNodes[69].textContent,
                g42 = t[0].childNodes[70].textContent,
                g43 = t[0].childNodes[71].textContent,
                g44 = t[0].childNodes[72].textContent,
                g45 = t[0].childNodes[73].textContent,
                g46 = t[0].childNodes[74].textContent,
                g47 = t[0].childNodes[75].textContent,
                g48 = t[0].childNodes[76].textContent,
                g49 = t[0].childNodes[77].textContent,
                g50 = t[0].childNodes[78].textContent,
                g51 = t[0].childNodes[79].textContent,
                g52 = t[0].childNodes[80].textContent,
                g53 = t[0].childNodes[81].textContent,
                g54 = t[0].childNodes[82].textContent,
                g55 = t[0].childNodes[83].textContent,
                type = t[0].childNodes[84].textContent;

                $("#vehicle_line").val(g1),
                $("#vehicle_quantity").val(g2),
                $("#vehicle_weight_unit").val(g3),
                $("#vehicle_length").val(g4),
                $("#vehicle_width").val(g5),
                $("#vehicle_height").val(g6),
                $("#vehicle_total_weight").val(g7),
                $("#vehicle_total_cubic").val(g8),

                $("#vehicle_cargo_type_id").val(g9),
                $("#vehicle_cargo_type_code").val(g10),
                $("#vehicle_metric_unit").val(g11),
                $("#vehicle_materials").val(g12),
                $("#vehicle_pieces").val(g13),
                $("#vehicle_unit_weight").val(g14),
                $("#vehicle_dim_fact").val(g15),
                $("#vehicle_vol_weight").val(g16),

                        $("#vehicle_scheduleb_id").val(g17),
                        $("#vehicle_scheduleb_code").val(g18),
                        $("#vehicle_scheduleb_description").val(g19),
                        $("#vehicle_hts_id").val(g20),
                        $("#vehicle_hts_code").val(g21),
                        $("#vehicle_hts_description").val(g22),
                        $("#vehicle_value").val(g23),
                        $("#vehicle_eccn").val(g24),
                        $("#vehicle_export_id").val(g25),
                        $("#vehicle_export_code").val(g26),
                        $("#vehicle_license_type_id").val(g27),
                        $("#vehicle_license_type_code").val(g28),
                        $("#vehicle_origin").val(g29),
                        $("#vehicle_ncm_code").val(g30),
                        $("#vehicle_comments").val(g31),

                $("#vehicle_vin").val(g32),
                $("#vehicle_type").val(g33),
                $("#vehicle_color").val(g34),
                $("#vehicle_year").val(g35),
                $("#vehicle_condition").val(g36),
                $("#vehicle_make").val(g37),
                $("#vehicle_keys").val(g38),
                $("#vehicle_model").val(g39),
                $("#vehicle_running").val(g40),
                $("#vehicle_trim").val(g41),
                $("#vehicle_mileage").val(g42),
                $("#vehicle_engine").val(g43),
                $("#vehicle_tag").val(g44),
                $("#vehicle_body").val(g45),
                $("#vehicle_other").val(g46),
                $("#vehicle_number").val(g47),
                $("#vehicle_state_province_id").val(g48),
                $("#vehicle_state_province_name").val(g49),
                $("#vehicle_received").val(g50),
                $("#vehicle_inspection_number").val(g51),
                $("#vehicle_inspection_date").val(g52),
                $("#vehicle_inspection_by").val(g53),
                $("#vehicle_lot_number").val(g54),
                $("#vehicle_buyer_number").val(g55),
                 (type== '0' || type=='' ? $("#Box_Details").modal("show") : $("#Vehicle_Details").modal("show")), $("#vehicle_quantity").focus()
    });

    $("#cargo-save").click(function() {
        if($("#cargo_type_code").val()==''){
            show_alert();
            $("#cargo_type_code").focus();
        }else{
            var r = $("#cargo_details tbody tr").length + 1,
                    _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    cargo_id = $("#cargo_line").val(),
                    d= (0== cargo_id? _: cargo_id)-1,
                    g_1 = $("#cargo_container").val(),
                    g_2 = $("#cargo_type_id").val(),
                    g_3 = $("#cargo_type_code").val(),
                    g_4 = $("#cargo_commodity_id").val(),
                    g_5 = $("#cargo_commodity_name").val(),
                    g_6 = $("#cargo_weight_unit").val(),
                    g_7 = $("#cargo_grossw").val(),
                    g_8 = $("#cargo_cubic").val(),
                    g_9 = $("#cargo_description").val(),
                    g_10 = $("#cargo_marks").val(),
                    g_11 = $("#cargo_pieces").val(),
                    g_12 = $("#cargo_comments").val(),

                    b = $("#cargo_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== cargo_id? _: cargo_id) + ">");
            C.append(createTableContent('cargo_line', (0 == cargo_id ? _ : cargo_id), true,d))
                    .append(createTableContent('cargo_marks', g_10, false, d))
                    .append(createTableContent('cargo_pieces', g_11, false, d))
                    .append(createTableContent('cargo_description', g_9, false, d))
                    .append(createTableContent('cargo_weight_unit', g_6, false, d))
                    .append(createTableContent('cargo_grossw', g_7, false, d))
                    .append(createTableContent('cargo_cubic', g_8, false, d))
                    .append(createTableContent('cargo_container', g_1, true, d))
                    .append(createTableContent('cargo_type_id', g_2, true, d))
                    .append(createTableContent('cargo_type_code', g_3, true, d))
                    .append(createTableContent('cargo_commodity_id', g_4, true, d))
                    .append(createTableContent('cargo_commodity_name', g_5, true, d))
                    .append(createTableContent('cargo_comments', g_12, true, d))
                    .append(createTableBtns()),
                    0 == cargo_id ? x.append(C) : x.find("tr#" + cargo_id).replaceWith(C), cleanModalFields("Cargo_Details"), $("#Cargo_Details").modal("show"), $("#cargo_container").focus()



            //===================
            var id_row = (0 == cargo_id ? _ : cargo_id);
            $("#details_hidden tbody [data-id='" + id_row + "']").remove();

            var n = $("#details_hidden"),
                    t = n.find("tbody");
            var tr=  $("#cargo_vehicle_details tbody tr"),
                    tr_1= $("#details_hidden tbody tr");
            var  r_1= tr.length;
            d =tr_1.length + 1;
            for(var a =0; a< r_1 ; a++){
                var  p_1=  $("<tr data-id=" + (0 == cargo_id ? _ : cargo_id) + ">");
                p_1.append(createTableContent('details_id', (0 == cargo_id ? _ : cargo_id), true, d))
                        .append(createTableContent('details_line',tr[a].childNodes[0].textContent, true, d))
                        .append(createTableContent('details_quantity',tr[a].childNodes[2].textContent, true, d))
                        .append(createTableContent('details_unit',tr[a].childNodes[3].textContent, true, d))
                        .append(createTableContent('details_length',tr[a].childNodes[4].textContent, true, d))
                        .append(createTableContent('details_width',tr[a].childNodes[5].textContent, true, d))
                        .append(createTableContent('details_height',tr[a].childNodes[6].textContent, true, d))
                        .append(createTableContent('details_total_weight',tr[a].childNodes[7].textContent, true, d))
                        .append(createTableContent('details_total_cubic',tr[a].childNodes[8].textContent, true, d))

                        .append(createTableContent('details_cargo_type_id', tr[a].childNodes[9].textContent, true, d))
                        .append(createTableContent('details_cargo_type_code', tr[a].childNodes[10].textContent, true, d))
                        .append(createTableContent('details_metric_unit', tr[a].childNodes[11].textContent, true, d))
                        .append(createTableContent('details_material', tr[a].childNodes[12].textContent, true, d))
                        .append(createTableContent('details_pieces', tr[a].childNodes[13].textContent, true, d))
                        .append(createTableContent('details_unit_weight', tr[a].childNodes[14].textContent, true, d))
                        .append(createTableContent('details_dim_fact', tr[a].childNodes[15].textContent, true, d))
                        .append(createTableContent('details_vol_weight', tr[a].childNodes[16].textContent, true, d))

                        .append(createTableContent('details_serial_number', tr[a].childNodes[17].textContent, true, d))
                        .append(createTableContent('details_barcode', tr[a].childNodes[18].textContent, true, d))
                        .append(createTableContent('details_Model', tr[a].childNodes[19].textContent, true, d))
                        .append(createTableContent('details_commodity_id', tr[a].childNodes[20].textContent, true, d))
                        .append(createTableContent('details_commodity_name', tr[a].childNodes[21].textContent, true, d))
                        .append(createTableContent('details_pro_number', tr[a].childNodes[22].textContent, true, d))
                        .append(createTableContent('details_project', tr[a].childNodes[23].textContent, true, d))
                        .append(createTableContent('details_po_number', tr[a].childNodes[24].textContent, true, d))
                        .append(createTableContent('details_inv_number', tr[a].childNodes[25].textContent, true, d))
                        .append(createTableContent('details_lot_number', tr[a].childNodes[26].textContent, true, d))
                        .append(createTableContent('details_sku_number', tr[a].childNodes[27].textContent, true, d))
                        .append(createTableContent('details_destination_point', tr[a].childNodes[28].textContent, true, d))
                        .append(createTableContent('details_attention', tr[a].childNodes[29].textContent, true, d))

                        .append(createTableContent('details_scheduleb_id', tr[a].childNodes[30].textContent, true, d))
                        .append(createTableContent('details_scheduleb_code', tr[a].childNodes[31].textContent, true, d))
                        .append(createTableContent('details_scheduleb_description', tr[a].childNodes[32].textContent, true, d))
                        .append(createTableContent('details_hts_id', tr[a].childNodes[33].textContent, true, d))
                        .append(createTableContent('details_hts_code', tr[a].childNodes[34].textContent, true, d))
                        .append(createTableContent('details_hts_description', tr[a].childNodes[35].textContent, true, d))
                        .append(createTableContent('details_value', tr[a].childNodes[36].textContent, true, d))
                        .append(createTableContent('details_eccn', tr[a].childNodes[37].textContent, true, d))
                        .append(createTableContent('details_export_id', tr[a].childNodes[38].textContent, true, d))
                        .append(createTableContent('details_export_code', tr[a].childNodes[39].textContent, true, d))
                        .append(createTableContent('details_license_type_id', tr[a].childNodes[40].textContent, true, d))
                        .append(createTableContent('details_license_type_code', tr[a].childNodes[41].textContent, true, d))
                        .append(createTableContent('details_origin', tr[a].childNodes[42].textContent, true, d))
                        .append(createTableContent('details_ncm_code', tr[a].childNodes[43].textContent, true, d))

                        .append(createTableContent('details_uns_id', tr[a].childNodes[44].textContent, true, d))
                        .append(createTableContent('details_uns_code', tr[a].childNodes[45].textContent, true, d))
                        .append(createTableContent('details_uns_description', tr[a].childNodes[46].textContent, true, d))
                        .append(createTableContent('details_class_id', tr[a].childNodes[47].textContent, true, d))
                        .append(createTableContent('details_class_description', tr[a].childNodes[48].textContent, true, d))
                        .append(createTableContent('details_packing_group', tr[a].childNodes[49].textContent, true, d))
                        .append(createTableContent('details_flash_point', tr[a].childNodes[50].textContent, true, d))
                        .append(createTableContent('details_flashing_point_type', tr[a].childNodes[51].textContent, true, d))
                        .append(createTableContent('details_special_instructions', tr[a].childNodes[52].textContent, true, d))
                        .append(createTableContent('details_units', tr[a].childNodes[53].textContent, true, d))
                        .append(createTableContent('details_material_page', tr[a].childNodes[54].textContent, true, d))
                        .append(createTableContent('details_hazardous_quantity', tr[a].childNodes[55].textContent, true, d))
                        .append(createTableContent('details_label_required', tr[a].childNodes[56].textContent, true, d))
                        .append(createTableContent('details_emergency_contact', tr[a].childNodes[57].textContent, true, d))
                        .append(createTableContent('details_emergency_contact_phone', tr[a].childNodes[58].textContent, true, d))
                        .append(createTableContent('details_comments', tr[a].childNodes[59].textContent, true, d))

                        .append(createTableContent('vehicle_vin', tr[a].childNodes[60].textContent, true, d))
                        .append(createTableContent('vehicle_type', tr[a].childNodes[61].textContent, true, d))
                        .append(createTableContent('vehicle_color', tr[a].childNodes[62].textContent, true, d))
                        .append(createTableContent('vehicle_year', tr[a].childNodes[63].textContent, true, d))
                        .append(createTableContent('vehicle_condition', tr[a].childNodes[64].textContent, true, d))
                        .append(createTableContent('vehicle_make', tr[a].childNodes[65].textContent, true, d))
                        .append(createTableContent('vehicle_keys', tr[a].childNodes[66].textContent, true, d))
                        .append(createTableContent('vehicle_model', tr[a].childNodes[67].textContent, true, d))
                        .append(createTableContent('vehicle_running', tr[a].childNodes[68].textContent, true, d))
                        .append(createTableContent('vehicle_trim', tr[a].childNodes[69].textContent, true, d))
                        .append(createTableContent('vehicle_mileage', tr[a].childNodes[70].textContent, true, d))
                        .append(createTableContent('vehicle_engine', tr[a].childNodes[71].textContent, true, d))
                        .append(createTableContent('vehicle_tag', tr[a].childNodes[72].textContent, true, d))
                        .append(createTableContent('vehicle_body', tr[a].childNodes[73].textContent, true, d))
                        .append(createTableContent('vehicle_other', tr[a].childNodes[74].textContent, true, d))
                        .append(createTableContent('vehicle_number', tr[a].childNodes[75].textContent, true, d))
                        .append(createTableContent('vehicle_state_province_id', tr[a].childNodes[76].textContent, true, d))
                        .append(createTableContent('vehicle_state_province_name', tr[a].childNodes[77].textContent, true, d))
                        .append(createTableContent('vehicle_received', tr[a].childNodes[78].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_number', tr[a].childNodes[79].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_date', tr[a].childNodes[80].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_by', tr[a].childNodes[81].textContent, true, d))
                        .append(createTableContent('vehicle_lot_number', tr[a].childNodes[82].textContent, true, d))
                        .append(createTableContent('vehicle_buyer_number', tr[a].childNodes[83].textContent, true, d))
                        .append(createTableContent('detail_type', '1', true, d))
                        ,t.append(p_1);
                d =d + 1 ;

            }weight_totals(),
            clearTable('cargo_vehicle_details');

            //===================

        }

    }), $("#cargo_details").on("click", "a.btn-danger", function() {
        var id_row = $(this).closest('tr').attr('id');
        $("#details_hidden tbody [data-id='" + id_row + "']").remove();
        $(this).closest("tr").remove(),
        weight_totals()

    }), $("#cargo_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('cargo_details');
        removeEmptyNodes('details_hidden');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[1].textContent,
                g3 = t[0].childNodes[2].textContent,
                g4 = t[0].childNodes[3].textContent,
                g5 = t[0].childNodes[4].textContent,
                g6 = t[0].childNodes[5].textContent,
                g7 = t[0].childNodes[6].textContent,
                g8 = t[0].childNodes[7].textContent,
                g9 = t[0].childNodes[8].textContent,
                g10 = t[0].childNodes[9].textContent,
                g11 = t[0].childNodes[10].textContent,
                g12 = t[0].childNodes[11].textContent,
                g13 = t[0].childNodes[12].textContent;



        //charge
        clearTable("cargo_vehicle_details");
        var n = $("#cargo_vehicle_details");
        t = n.find("tbody");
        var tr=  $("#details_hidden tbody tr");
        var tr_1=  $("#cargo_vehicle_details tbody tr");
        var  r_1= tr.length;
        var d =1;

        for(var a =0; a< r_1 ; a++){
            if( tr[a].childNodes[0].textContent == g1){
                var  p_1=  $("<tr id=" + d + ">");
                p_1.append(createTableContent('detail_line',tr[a].childNodes[1].textContent, true, d))
                        .append((tr[a].childNodes[83].textContent== '1'? "<td><i class='fa fa-car' aria-hidden='true'></td>" : "<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                        .append(createTableContent('details_quantity',tr[a].childNodes[2].textContent, false, d))
                        .append(createTableContent('details_unit',tr[a].childNodes[3].textContent, false, d))
                        .append(createTableContent('details_length',tr[a].childNodes[4].textContent, false, d))
                        .append(createTableContent('details_width',tr[a].childNodes[5].textContent, false, d))
                        .append(createTableContent('details_height',tr[a].childNodes[6].textContent, false, d))
                        .append(createTableContent('details_total_weight',tr[a].childNodes[7].textContent, false, d))
                        .append(createTableContent('details_total_cubic',tr[a].childNodes[8].textContent, false, d))

                        .append(createTableContent('details_cargo_type_id', tr[a].childNodes[9].textContent, true, d))
                        .append(createTableContent('details_cargo_type_code', tr[a].childNodes[10].textContent, true, d))
                        .append(createTableContent('details_metric_unit', tr[a].childNodes[11].textContent, true, d))
                        .append(createTableContent('details_material', tr[a].childNodes[12].textContent, true, d))
                        .append(createTableContent('details_pieces', tr[a].childNodes[13].textContent, true, d))
                        .append(createTableContent('details_unit_weight', tr[a].childNodes[14].textContent, true, d))
                        .append(createTableContent('details_dim_fact', tr[a].childNodes[15].textContent, true, d))
                        .append(createTableContent('details_vol_weight', tr[a].childNodes[16].textContent, true, d))

                        .append(createTableContent('details_serial_number', tr[a].childNodes[17].textContent, true, d))
                        .append(createTableContent('details_barcode', tr[a].childNodes[18].textContent, true, d))
                        .append(createTableContent('details_Model', tr[a].childNodes[19].textContent, true, d))
                        .append(createTableContent('details_commodity_id', tr[a].childNodes[20].textContent, true, d))
                        .append(createTableContent('details_commodity_name', tr[a].childNodes[21].textContent, true, d))
                        .append(createTableContent('details_pro_number', tr[a].childNodes[22].textContent, true, d))
                        .append(createTableContent('details_project', tr[a].childNodes[23].textContent, true, d))
                        .append(createTableContent('details_po_number', tr[a].childNodes[24].textContent, true, d))
                        .append(createTableContent('details_inv_number', tr[a].childNodes[25].textContent, true, d))
                        .append(createTableContent('details_lot_number', tr[a].childNodes[26].textContent, true, d))
                        .append(createTableContent('details_sku_number', tr[a].childNodes[27].textContent, true, d))
                        .append(createTableContent('details_destination_point', tr[a].childNodes[28].textContent, true, d))
                        .append(createTableContent('details_attention', tr[a].childNodes[29].textContent, true, d))

                        .append(createTableContent('details_scheduleb_id', tr[a].childNodes[30].textContent, true, d))
                        .append(createTableContent('details_scheduleb_code', tr[a].childNodes[31].textContent, true, d))
                        .append(createTableContent('details_scheduleb_description', tr[a].childNodes[32].textContent, true, d))
                        .append(createTableContent('details_hts_id', tr[a].childNodes[33].textContent, true, d))
                        .append(createTableContent('details_hts_code', tr[a].childNodes[34].textContent, true, d))
                        .append(createTableContent('details_hts_description', tr[a].childNodes[35].textContent, true, d))
                        .append(createTableContent('details_value', tr[a].childNodes[36].textContent, true, d))
                        .append(createTableContent('details_eccn', tr[a].childNodes[37].textContent, true, d))
                        .append(createTableContent('details_export_id', tr[a].childNodes[38].textContent, true, d))
                        .append(createTableContent('details_export_code', tr[a].childNodes[39].textContent, true, d))
                        .append(createTableContent('details_license_type_id', tr[a].childNodes[40].textContent, true, d))
                        .append(createTableContent('details_license_type_code', tr[a].childNodes[41].textContent, true, d))
                        .append(createTableContent('details_origin', tr[a].childNodes[42].textContent, true, d))
                        .append(createTableContent('details_ncm_code', tr[a].childNodes[43].textContent, true, d))

                        .append(createTableContent('details_uns_id', tr[a].childNodes[44].textContent, true, d))
                        .append(createTableContent('details_uns_code', tr[a].childNodes[44].textContent, true, d))
                        .append(createTableContent('details_uns_description', tr[a].childNodes[45].textContent, true, d))
                        .append(createTableContent('details_class_id', tr[a].childNodes[46].textContent, true, d))
                        .append(createTableContent('details_class_description', tr[a].childNodes[47].textContent, true, d))
                        .append(createTableContent('details_packing_group', tr[a].childNodes[48].textContent, true, d))
                        .append(createTableContent('details_flash_point', tr[a].childNodes[49].textContent, true, d))
                        .append(createTableContent('details_flashing_point_type', tr[a].childNodes[50].textContent, true, d))
                        .append(createTableContent('details_special_instructions', tr[a].childNodes[51].textContent, true, d))
                        .append(createTableContent('details_units', tr[a].childNodes[52].textContent, true, d))
                        .append(createTableContent('details_material_page', tr[a].childNodes[53].textContent, true, d))
                        .append(createTableContent('details_hazardous_quantity', tr[a].childNodes[54].textContent, true, d))
                        .append(createTableContent('details_label_required', tr[a].childNodes[55].textContent, true, d))
                        .append(createTableContent('details_emergency_contact', tr[a].childNodes[56].textContent, true, d))
                        .append(createTableContent('details_emergency_contact_phone', tr[a].childNodes[57].textContent, true, d))
                        .append(createTableContent('details_comments', tr[a].childNodes[58].textContent, true, d))

                        .append(createTableContent('vehicle_vin', tr[a].childNodes[59].textContent, true, d))
                        .append(createTableContent('vehicle_type', tr[a].childNodes[60].textContent, true, d))
                        .append(createTableContent('vehicle_color', tr[a].childNodes[61].textContent, true, d))
                        .append(createTableContent('vehicle_year', tr[a].childNodes[62].textContent, true, d))
                        .append(createTableContent('vehicle_condition', tr[a].childNodes[63].textContent, true, d))
                        .append(createTableContent('vehicle_make', tr[a].childNodes[64].textContent, true, d))
                        .append(createTableContent('vehicle_keys', tr[a].childNodes[65].textContent, true, d))
                        .append(createTableContent('vehicle_model', tr[a].childNodes[66].textContent, true, d))
                        .append(createTableContent('vehicle_running', tr[a].childNodes[67].textContent, true, d))
                        .append(createTableContent('vehicle_trim', tr[a].childNodes[68].textContent, true, d))
                        .append(createTableContent('vehicle_mileage', tr[a].childNodes[69].textContent, true, d))
                        .append(createTableContent('vehicle_engine', tr[a].childNodes[70].textContent, true, d))
                        .append(createTableContent('vehicle_tag', tr[a].childNodes[71].textContent, true, d))
                        .append(createTableContent('vehicle_body', tr[a].childNodes[72].textContent, true, d))
                        .append(createTableContent('vehicle_other', tr[a].childNodes[73].textContent, true, d))
                        .append(createTableContent('vehicle_number', tr[a].childNodes[74].textContent, true, d))
                        .append(createTableContent('vehicle_state_province_id', tr[a].childNodes[75].textContent, true, d))
                        .append(createTableContent('vehicle_state_province_name', tr[a].childNodes[76].textContent, true, d))
                        .append(createTableContent('vehicle_received', tr[a].childNodes[77].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_number', tr[a].childNodes[78].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_date', tr[a].childNodes[79].textContent, true, d))
                        .append(createTableContent('vehicle_inspection_by', tr[a].childNodes[80].textContent, true, d))
                        .append(createTableContent('vehicle_lot_number', tr[a].childNodes[81].textContent, true, d))
                        .append(createTableContent('vehicle_buyer_number', tr[a].childNodes[82].textContent, true, d))
                        .append(createTableContent('detail_type', tr[a].childNodes[83].textContent, true, d))
                        .append(createTableBtns())

                ,t.append(p_1);

                d = d+1;
            }
        }
                $("#cargo_line").val(g1),
                $("#cargo_marks").val(g2),
                $("#cargo_pieces").val(g3),
                $("#cargo_description").val(g4),
                $("#cargo_weight_unit").val(g5),
                $("#cargo_grossw").val(g6),
                $("#cargo_cubic").val(g7),
                $("#cargo_container").val(g8),
                $("#cargo_type_id").val(g9),
                $("#cargo_type_code").val(g10),
                $("#cargo_commodity_id").val(g11),
                $("#cargo_commodity_name").val(g12),
                $("#cargo_comments").val(g13),
                $("#Cargo_Details").modal("show"), $("#cargo_container").focus()
    });

    $("#uns-save").click(function() {
        if($("#hazardous_uns_code").val()== ''){
            show_alert();
            $("#hazardous_uns_code").focus()
        }else{
            var r = ($('#hazardous-details tbody tr').length + 1),
                    _ =  ($("#hazardous-details tbody tr").length == 0 ? 1 : parseInt($("#hazardous-details tbody tr")[$("#hazardous-details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#hazardous_uns_line").val(),
                    c = (0 == l ? _ : l)-1,
                    a = $("#hazardous_uns_id").val(),
                    d = $("#hazardous_uns_code").val().toUpperCase(),
                    s = $("#hazardous_uns_desc").val().toUpperCase(),
                    e = $("#hazardous_uns_note").val().toUpperCase(),
                    n = $("#hazardous-details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('hazardous_uns_id', a, true, c))
                    .append(createTableContent('hazardous_uns_line', (0 == l ? r : l), true, c))
                    .append(createTableContent('hazardous_uns_code', d, false, c))
                    .append(createTableContent('hazardous_uns_desc', s, false, c))
                    .append(createTableContent('hazardous_uns_note', e, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNsModal'), $("#hazardous_uns_code").focus()
        }

    }),
            $('#hazardous-details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }), $("#hazardous-details").on("click", "a.btn-default", function() {
        removeEmptyNodes('hazardous-details');
        var t = $(this).closest("tr"),
                o = t[0].childNodes[0].textContent,
                r = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent,
                d = t[0].childNodes[4].textContent;
        $('#hazardous_uns_line').val(r), $("#hazardous_uns_id").val(o), $("#hazardous_uns_code").val(s), $("#hazardous_uns_desc").val(a), $("#hazardous_uns_note").val(d), $("#UNsModal").modal("show"), $("#hazardous_uns_code").focus()
    }),


    $("#transportation-save").click(function() {
        if($("#transportation_billing_code").val()== '' || $("#transportation_carrier_name").val() == '' || $("#transportation_amount").val()=='' || $("#transportation_loading_reference").val()==''){
            show_alert();
            $("#transportation_billing_code").focus();
        }else{
            var t = $("#transportation_details tbody tr").length + 1,
                    _ =  ($("#transportation_details tbody tr").length == 0 ? 1 : parseInt($("#transportation_details tbody tr")[$("#transportation_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    transportation_id = $("#transportation_id").val(),
                    d= (0==transportation_id? _ : transportation_id)-1,
                    g_1 = $("#transportation_leg").val(),
                    g_2 = $("#transportation_mode").val(),
                    g_3 = $("#transportation_billing_id").val(),
                    g_4 = $("#transportation_billing_code").val(),
                    g_5 = $("#transportation_description").val(),
                    g_6 = $("#transportation_amount").val(),
                    g_7 = $("#transportation_leg_status").val(),
                    g_8 = $("#transportation_service_id").val(),
                    g_9 = $("#transportation_service_name").val(),
                    g_10 = $("#transportation_carrier_id").val(),
                    g_11 = $("#transportation_carrier_name").val(),
                    g_12 = $("#transportation_notify").val(),
                    g_13 = $("#transportation_loading_location_id").val(),
                    g_14 = $("#transportation_loading_location_name").val(),
                    g_15 = $("#transportation_loading_reference").val(),
                    g_16 = $("#transportation_ETD_date").val(),
                    g_17 = $("#transportation_unloading_location_id").val(),
                    g_18 = $("#transportation_unloading_location_name").val(),
                    g_19 = $("#transportation_unloading_reference").val(),
                    g_20 = $("#transportation_ETA_date").val(),
                    g_21 = $("#origin_from_type").val(),
                    g_22 = $("#origin_from_shipper_id").val(),
                    g_23 = $("#origin_from_shipper_name").val(),
                    g_24 = $("#origin_from_address").val(),
                    g_25 = $("#origin_from_city").val(),
                    g_26 = $("#origin_from_state_id").val(),
                    g_27 = $("#origin_from_state_name").val(),
                    g_28 = $("#origin_from_country_id").val(),
                    g_29 = $("#origin_from_country_name").val(),
                    g_30 = $("#origin_from_zip_code_id").val(),
                    g_31 = $("#origin_from_zip_code_code").val(),
                    g_32 = $("#origin_from_contact").val(),
                    g_33 = $("#origin_from_phone").val(),
                    g_34 = $("#origin_from_fax").val(),
                    g_35 = $("#origin_to_type").val(),
                    g_36 = $("#origin_to_consignee_id").val(),
                    g_37 = $("#origin_to_consignee_name").val(),
                    g_38 = $("#origin_to_address").val(),
                    g_39 = $("#origin_to_city").val(),
                    g_40 = $("#origin_to_state_id").val(),
                    g_41 = $("#origin_to_state_name").val(),
                    g_42 = $("#origin_to_country_id").val(),
                    g_43 = $("#origin_to_country_name").val(),
                    g_44 = $("#origin_to_zip_code_id").val(),
                    g_45 = $("#origin_to_zip_code_code").val(),
                    g_46 = $("#origin_to_contact").val(),
                    g_47 = $("#origin_to_phone").val(),
                    g_48 = $("#origin_to_fax").val(),

                    b = $("#transportation_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0==transportation_id? _ : transportation_id)+ ">");

            C.append(createTableContent('transportation_id', (0==transportation_id? _ : transportation_id) , true,d))
                    .append(createTableContent('transportation_leg', g_1, false, d))
                    .append(createTableContent('transportation_mode', g_2, false, d))
                    .append(createTableContent('transportation_carrier_id', g_10, true, d))
                    .append(createTableContent('transportation_carrier_name', g_11, false, d))
                    .append(createTableContent('transportation_loading_location_id', g_13, true, d))
                    .append(createTableContent('transportation_loading_location_name', g_14, false, d))
                    .append(createTableContent('transportation_unloading_location_id', g_17, true, d))
                    .append(createTableContent('transportation_unloading_location_name', g_18, false, d))
                    .append(createTableContent('transportation_ETD_date', g_16, false, d))
                    .append(createTableContent('transportation_ETA_date', g_20, false, d))
                    .append(createTableContent('transportation_leg_status', g_7, false, d))
                    .append(createTableContent('transportation_amount', g_6, false, d))

                    .append(createTableContent('transportation_billing_id', g_3, true, d))
                    .append(createTableContent('transportation_billing_code', g_4, true, d))
                    .append(createTableContent('transportation_description', g_5, true, d))
                    .append(createTableContent('transportation_service_id', g_8, true, d))
                    .append(createTableContent('transportation_service_name', g_9, true, d))
                    .append(createTableContent('transportation_notify', g_12, true, d))
                    .append(createTableContent('transportation_loading_reference', g_15, true, d))
                    .append(createTableContent('transportation_unloading_reference', g_19, true, d))
                    .append(createTableContent('origin_from_type', g_21, true, d))
                    .append(createTableContent('origin_from_shipper_id', g_22, true, d))
                    .append(createTableContent('origin_from_shipper_name', g_23, true, d))
                    .append(createTableContent('origin_from_address', g_24, true, d))
                    .append(createTableContent('origin_from_city', g_25, true, d))
                    .append(createTableContent('origin_from_state_id', g_26, true, d))
                    .append(createTableContent('origin_from_state_name', g_27, true, d))
                    .append(createTableContent('origin_from_country_id', g_28, true, d))
                    .append(createTableContent('origin_from_country_name', g_29, true, d))
                    .append(createTableContent('origin_from_zip_code_id', g_30, true, d))
                    .append(createTableContent('origin_from_zip_code_code', g_31, true, d))
                    .append(createTableContent('origin_from_contact', g_32, true, d))
                    .append(createTableContent('origin_from_phone', g_33, true, d))
                    .append(createTableContent('origin_from_fax', g_34, true, d))
                    .append(createTableContent('origin_to_type', g_35, true, d))
                    .append(createTableContent('origin_to_consignee_id', g_36, true, d))
                    .append(createTableContent('origin_to_consignee_name', g_37, true, d))
                    .append(createTableContent('origin_to_address', g_38, true, d))
                    .append(createTableContent('origin_to_city', g_39, true, d))
                    .append(createTableContent('origin_to_state_id', g_40, true, d))
                    .append(createTableContent('origin_to_state_name', g_41, true, d))
                    .append(createTableContent('origin_to_country_id', g_42, true, d))
                    .append(createTableContent('origin_to_country_name', g_43, true, d))
                    .append(createTableContent('origin_to_zip_code_id', g_44, true, d))
                    .append(createTableContent('origin_to_zip_code_code', g_45, true, d))
                    .append(createTableContent('origin_to_contact', g_46, true, d))
                    .append(createTableContent('origin_to_phone', g_47, true, d))
                    .append(createTableContent('origin_to_fax', g_48, true, d))
                    .append(createTableBtns()), 0 == transportation_id ? x.append(C) : x.find("tr#" + transportation_id).replaceWith(C),transportation_plan(), $("#Transportation_Details").modal("hide"), $("#transportation_leg").focus()
        }

    }), $("#transportation_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
                transportation_plan()
    }), $("#transportation_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('transportation_details');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[1].textContent,
                g3 = t[0].childNodes[2].textContent,
                g4 = t[0].childNodes[3].textContent,
                g5 = t[0].childNodes[4].textContent,
                g6 = t[0].childNodes[5].textContent,
                g7 = t[0].childNodes[6].textContent,
                g8 = t[0].childNodes[7].textContent,
                g9 = t[0].childNodes[8].textContent,
                g10 = t[0].childNodes[9].textContent,
                g11 = t[0].childNodes[10].textContent,
                g12 = t[0].childNodes[11].textContent,
                g13 = t[0].childNodes[12].textContent,
                g14 = t[0].childNodes[13].textContent,
                g15 = t[0].childNodes[14].textContent,
                g16 = t[0].childNodes[15].textContent,
                g17 = t[0].childNodes[16].textContent,
                g18 = t[0].childNodes[17].textContent,
                g19 = t[0].childNodes[18].textContent,
                g20 = t[0].childNodes[19].textContent,
                g21 = t[0].childNodes[20].textContent,
                g22 = t[0].childNodes[21].textContent,
                g23 = t[0].childNodes[22].textContent,
                g24 = t[0].childNodes[23].textContent,
                g25 = t[0].childNodes[24].textContent,
                g26 = t[0].childNodes[25].textContent,
                g27 = t[0].childNodes[26].textContent,
                g28 = t[0].childNodes[27].textContent,
                g29 = t[0].childNodes[28].textContent,
                g30 = t[0].childNodes[29].textContent,
                g31 = t[0].childNodes[30].textContent,
                g32 = t[0].childNodes[31].textContent,
                g33 = t[0].childNodes[32].textContent,
                g34 = t[0].childNodes[33].textContent,
                g35 = t[0].childNodes[34].textContent,
                g36 = t[0].childNodes[35].textContent,
                g37 = t[0].childNodes[36].textContent,
                g38 = t[0].childNodes[37].textContent,
                g39 = t[0].childNodes[38].textContent,
                g40 = t[0].childNodes[39].textContent,
                g41 = t[0].childNodes[40].textContent,
                g42 = t[0].childNodes[41].textContent,
                g43 = t[0].childNodes[42].textContent,
                g44 = t[0].childNodes[43].textContent,
                g45 = t[0].childNodes[44].textContent,
                g46 = t[0].childNodes[45].textContent,
                g47 = t[0].childNodes[46].textContent,
                g48 = t[0].childNodes[47].textContent,
                g49 = t[0].childNodes[48].textContent;


        $("#transportation_id").val(g1),
                $("#transportation_leg").val(g2),
                $("#transportation_mode").val(g3),
                $("#transportation_carrier_id").val(g4),
                $("#transportation_carrier_name").val(g5),
                $("#transportation_loading_location_id").val(g6),
                $("#transportation_loading_location_name").val(g7),
                $("#transportation_unloading_location_id").val(g8),
                $("#transportation_unloading_location_name").val(g9),
                $("#transportation_ETD_date").val(g10),
                $("#transportation_ETA_date").val(g11),
                $("#transportation_leg_status").val(g12),
                $("#transportation_amount").val(g13),

                $("#transportation_billing_id").val(g14),
                $("#transportation_billing_code").val(g15),
                $("#transportation_description").val(g16),
                $("#transportation_service_id").val(g17),
                $("#transportation_service_name").val(g18),
                $("#transportation_notify").val(g19),
                $("#transportation_loading_reference").val(g20),
                $("#transportation_unloading_reference").val(g21),
                $("#origin_from_type").val(g22),
                $("#origin_from_shipper_id").val(g23),
                $("#origin_from_shipper_name").val(g24),
                $("#origin_from_address").val(g25),
                $("#origin_from_city").val(g26),
                $("#origin_from_state_id").val(g27),
                $("#origin_from_state_name").val(g28),
                $("#origin_from_country_id").val(g29),
                $("#origin_from_country_name").val(g30),
                $("#origin_from_zip_code_id").val(g31),
                $("#origin_from_zip_code_code").val(g32),
                $("#origin_from_contact").val(g33),
                $("#origin_from_phone").val(g34),
                $("#origin_from_fax").val(g35),
                $("#origin_to_type").val(g36),
                $("#origin_to_consignee_id").val(g37),
                $("#origin_to_consignee_name").val(g38),
                $("#origin_to_address").val(g39),
                $("#origin_to_city").val(g40),
                $("#origin_to_state_id").val(g41),
                $("#origin_to_state_name").val(g42),
                $("#origin_to_country_id").val(g43),
                $("#origin_to_country_name").val(g44),
                $("#origin_to_zip_code_id").val(g45),
                $("#origin_to_zip_code_code").val(g46),
                $("#origin_to_contact").val(g47),
                $("#origin_to_phone").val(g48),
                $("#origin_to_fax").val(g49),
                $("#Transportation_Details").modal("show"), $("#transportation_leg").focus()
    });

</script>