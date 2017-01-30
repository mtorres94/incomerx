<script type="text/javascript">


$("#btn_cargo_details").click(function(){
    $("#box_quantity").val(1);
    $("#box_pieces").val(1);
    $("#box_metric_unit").val("I").change();
    $("#box_weight_unit").val("L").change();
    $("#box_dim_fact").val("I").change();
    $("#box_cargo_type_id").val("0").change();
});

$("#btn_container_details").click(function(){
    cleanModalFields("Container_Details");
    $("#container_pickup_type").val("02").change();
    $("#container_delivery_type").val("02").change();
    $("#container_drop_type").val("02").change();
    $("#container_total_weight_unit").val("L").change();
    $("#container_ventilation").val("A").change();
    $("#container_degrees").val("F").change();
    $("#pd_status").val("1").change();
});
$("#btn_charge_details").click(function(){
    $("#billing_bill_type").val("C").change();
    $("#billing_bill_party").val("C").change();
    $("#billing_currency_type").val("1").change();
    $("#cost_currency_type").val("1").change();
    $("#billing_unit_id").val("0").change();
    $("#cost_unit_id").val("0").change();

});

    $("#container-save").click(function() {
        if($("#equipment_type_code").val()==''){

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
                    g_5 = $("#container_seal_number2").val(),
                    g_6 = $("#container_pieces").val(),
                    g_7 = $("#container_gross_weight").val().toUpperCase(),
                    g_8 = $("#container_cubic").val(),
                    g_9 = $("#pd_status").val(),
                    g_10 = $("#container_carrier_id").val(),
                    g_11 = $("#container_carrier_name").val().toUpperCase(),
                    g_12 = $("#container_ventilation").val(),
                    g_13 = $("#container_degrees").val(),
                    g_14 = $("#container_temperature").val(),
                    g_15 = $("#container_max").val(),
                    g_16 = $("#container_min").val(),

                    g_17 = $("#container_pickup_id").val(),
                    g_18 = $("#container_pickup_name").val().toUpperCase(),
                    g_19 = $("#container_pickup_type").val(),
                    g_20 = $("#container_pickup_address").val(),
                    g_21 = $("#container_pickup_city").val(),
                    g_22 = $("#container_pickup_state_id").val(),
                    g_23 = $("#container_pickup_state_name").val().toUpperCase(),
                    g_24 = $("#container_pickup_zip_code_id").val(),
                    g_25 = $("#container_pickup_zip_code_code").val().toUpperCase(),
                    g_26 = $("#container_pickup_phone").val(),
                    g_27 = $("#container_pickup_date").val(),
                    g_28 = $("#container_pickup_number").val(),

                    g_29 = $("#container_delivery_id").val(),
                    g_30 = $("#container_delivery_name").val(),
                    g_31 = $("#container_delivery_type").val(),
                    g_32 = $("#container_delivery_address").val(),
                    g_33 = $("#container_delivery_city").val(),
                    g_34 = $("#container_delivery_state_id").val(),
                    g_35 = $("#container_delivery_state_name").val().toUpperCase(),
                    g_36 = $("#container_delivery_zip_code_id").val(),
                    g_37 = $("#container_delivery_zip_code_code").val().toUpperCase(),
                    g_38 = $("#container_delivery_phone").val(),
                    g_39 = $("#container_delivery_date").val(),
                    g_40 = $("#container_delivery_number").val(),

                    g_41 = $("#container_drop_id").val(),
                    g_42 = $("#container_drop_name").val(),
                    g_43 = $("#container_drop_type").val(),
                    g_44 = $("#container_drop_address").val(),
                    g_45 = $("#container_drop_city").val(),
                    g_46 = $("#container_drop_state_id").val(),
                    g_47 = $("#container_drop_state_name").val().toUpperCase(),
                    g_48 = $("#container_drop_zip_code_id").val(),
                    g_49 = $("#container_drop_zip_code_code").val().toUpperCase(),
                    g_50 = $("#container_drop_phone").val(),
                    g_51 = $("#container_drop_date").val(),
                    g_52 = $("#container_total_weight_unit").val(),

                    b = $("#container_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== container_id? _ : container_id) + ">");
            C.append(createTableContent('container_line', (0== container_id? _ : container_id) , true,d))
                    .append(createTableContent('equipment_type_id', g_1, true, d))
                    .append(createTableContent('equipment_type_code', g_2, false, d))
                    .append(createTableContent('container_number', g_3, false, d))
                    .append(createTableContent('container_seal_number', g_4, true, d))
                    .append(createTableContent('container_seal_number2', g_5, true, d))
                    .append(createTableContent('container_pieces', g_6, true, d))
                    .append(createTableContent('container_gross_weight', g_7, true, d))
                    .append(createTableContent('container_cubic', g_8, true, d))
                    .append(createTableContent('pd_status', g_9, true, d))
                    .append(createTableContent('container_carrier_id', g_10, true, d))
                    .append(createTableContent('container_carrier_name', g_11, true, d))
                    .append(createTableContent('container_ventilation', g_12, true, d))
                    .append(createTableContent('container_degrees', g_13, true, d))
                    .append(createTableContent('container_temperature', g_14, true, d))
                    .append(createTableContent('container_max', g_15, true, d))
                    .append(createTableContent('container_min', g_16, true, d))

                    .append(createTableContent('container_pickup_id', g_17, true, d))
                    .append(createTableContent('container_pickup_name', g_18, true, d))
                    .append(createTableContent('container_pickup_type', g_19, true, d))
                    .append(createTableContent('container_pickup_address', g_20, true, d))
                    .append(createTableContent('container_pickup_city', g_21, true, d))
                    .append(createTableContent('container_pickup_state_id', g_22, true, d))
                    .append(createTableContent('container_pickup_state_name', g_23, true, d))
                    .append(createTableContent('container_pickup_zip_code_id', g_24, true, d))
                    .append(createTableContent('container_pickup_zip_code_code', g_25, true, d))
                    .append(createTableContent('container_pickup_phone', g_26, true, d))
                    .append(createTableContent('container_pickup_date', g_27, true, d))
                    .append(createTableContent('container_pickup_number', g_28, true, d))

                    .append(createTableContent('container_delivery_id', g_29, true, d))
                    .append(createTableContent('container_delivery_name', g_30, true, d))
                    .append(createTableContent('container_delivery_type', g_31, true, d))
                    .append(createTableContent('container_delivery_address', g_32, true, d))
                    .append(createTableContent('container_delivery_city', g_33, true, d))
                    .append(createTableContent('container_delivery_state_id', g_34, true, d))
                    .append(createTableContent('container_delivery_state_name', g_35, true, d))
                    .append(createTableContent('container_delivery_zip_code_id', g_36, true, d))
                    .append(createTableContent('container_delivery_zip_code_code', g_37, true, d))
                    .append(createTableContent('container_delivery_phone', g_38, true, d))
                    .append(createTableContent('container_delivery_date', g_39, true, d))
                    .append(createTableContent('container_delivery_number', g_40, true, d))

                    .append(createTableContent('container_drop_id', g_41, true, d))
                    .append(createTableContent('container_drop_name', g_42, true, d))
                    .append(createTableContent('container_drop_type', g_43, true, d))
                    .append(createTableContent('container_drop_address', g_44, true, d))
                    .append(createTableContent('container_drop_city', g_45, true, d))
                    .append(createTableContent('container_drop_state_id', g_46, true, d))
                    .append(createTableContent('container_drop_state_name', g_47, true, d))
                    .append(createTableContent('container_drop_zip_code_id', g_48, true, d))
                    .append(createTableContent('container_drop_zip_code_code', g_49, true, d))
                    .append(createTableContent('container_drop_phone', g_50, true, d))
                    .append(createTableContent('container_drop_date', g_51, true, d))
                    .append(createTableContent('container_total_weight_unit', g_52, true, d))
                    .append(createTableBtns()),
                    0 == container_id ? x.append(C) : x.find("tr#" + container_id).replaceWith(C), $("#Container_Details").modal("show"), cleanModalFields("Container_Details"), $("#pd_status").val("1").change(), $("#equipment_type_code").focus();

            ($("#container_details tbody tr").length > 0 ? $("#contract_basis").val("2").change() : $("#contract_basis").val("1").change());

        }
    }), $("#container_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove()
        ($("#container_details tbody tr").length > 0 ? $("#contract_basis").val("2").change() : $("#contract_basis").val("1").change());

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
                g53 = t[0].childNodes[52].textContent;

            $("#container_line").val(g1),
            $("#equipment_type_id").val(g2).change(),
            $("#equipment_type_code").val(g3),
            $("#container_number").val(g4),
            $("#container_seal_number").val(g5),
            $("#container_seal_number2").val(g6),
            $("#container_pieces").val(g7),
            $("#container_gross_weight").val(g8),
            $("#container_cubic").val(g9),
            $("#pd_status").val(g10),
            $("#container_carrier_id").val(g11).change(),
            $("#container_carrier_name").val(g12),
            $("#container_ventilation").val(g13),
            $("#container_degrees").val(g14),
            $("#container_temperature").val(g15),
            $("#container_max").val(g16),
            $("#container_min").val(g17),


            $("#container_pickup_type").val(g20).change(),
                $("#container_pickup_id").val(g18),
                $("#container_pickup_name").val(g19),
            $("#container_pickup_address").val(g21),
            $("#container_pickup_city").val(g22),
            $("#container_pickup_state_id").val(g23),
            $("#container_pickup_state_name").val(g24),
            $("#container_pickup_zip_code_id").val(g25),
            $("#container_pickup_zip_code_code").val(g26),
            $("#container_pickup_phone").val(g27),
            $("#container_pickup_date").val(g28),
            $("#container_pickup_number").val(g29),


            $("#container_delivery_type").val(g32).change(),
                $("#container_delivery_id").val(g30),
                $("#container_delivery_name").val(g31),
            $("#container_delivery_address").val(g33),
            $("#container_delivery_city").val(g34),
            $("#container_delivery_state_id").val(g35),
            $("#container_delivery_state_name").val(g36),
            $("#container_delivery_zip_code_id").val(g37),
            $("#container_delivery_zip_code_code").val(g38),
            $("#container_delivery_phone").val(g39),
            $("#container_delivery_date").val(g40),
            $("#container_delivery_number").val(g41),


            $("#container_drop_type").val(g44).change(),
                $("#container_drop_id").val(g42),
                $("#container_drop_name").val(g43),
            $("#container_drop_address").val(g45),
            $("#container_drop_city").val(g46),
            $("#container_drop_state_id").val(g47),
            $("#container_drop_state_name").val(g48),
            $("#container_drop_zip_code_id").val(g49),
            $("#container_drop_zip_code_code").val(g50),
            $("#container_drop_phone").val(g51),
            $("#container_drop_date").val(g52),
            $("#container_total_weight_unit").val(g53).change(),
                $("#Container_Details").modal("show"), $("#equipment_type_code").focus()
    });

    $("#cargo-save").click(function() {
        if($("#box_cargo_type_code").val()==''){

            $("#box_cargo_type_code").focus();
        }else{
            var t = $("#cargo_details tbody tr").length + 1,
                    _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    box_id = $("#cargo_line").val(),
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

                    g_42 = $("#box_uns_id").val(),
                    g_43 = $("#box_uns_code").val(),
                    g_44 = $("#box_uns_description").val(),
                    g_45 = $("#box_class_id").val(),
                    g_46 = $("#box_class_description").val(),
                    g_47 = $("#box_special_instructions").val(),
                    g_48 = $("#box_material_page").val(),
                    g_49 = $("#box_hazardous_level").val(),
                    g_50 = $("#box_emergency_contact").val(),
                    g_51 = $("#box_emergency_contact_phone").val(),
                    g_52 = $("#cargo_comments").val(),

                    g_53 = $("#cargo_marks").val(),
                    g_54 = $("#cargo_container").val(),
                    g_55 = $("#cargo_charge_weight").val(),
                    g_56 = $("#cargo_gross_weight").val(),
                    g_57 = $("#cargo_rate").val(),
                    g_58 = $("#cargo_total").val(),
                    b = $("#cargo_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== box_id? _ : box_id) + ">");


            C.append(createTableContent('cargo_line', (0 == box_id ? _  : box_id), true,d))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                    .append(createTableContent('cargo_type_id', g_2, true, d))
                    .append(createTableContent('cargo_type_code', g_3, false, d))
                    .append(createTableContent('cargo_quantity', g_1, false, d))
                    .append(createTableContent('cargo_weight_unit', g_10, false, d))
                    .append(createTableContent('cargo_length', g_5, false, d))
                    .append(createTableContent('cargo_width', g_6, false, d))
                    .append(createTableContent('cargo_height', g_7, false, d))
                    .append(createTableContent('cargo_unit_weight', g_11, true, d))
                    .append(createTableContent('cargo_total_weight', g_12, false, d))
                    .append(createTableContent('cargo_total_cubic', g_13, false, d))
                    .append(createTableContent('cargo_charge_weight', g_55, true, d))
                    .append(createTableContent('cargo_rate', g_57, true, d))
                    .append(createTableContent('cargo_total', g_58, true, d))


                    .append(createTableContent('cargo_metric_unit', g_4, true, d))
                    .append(createTableContent('cargo_material', g_8, true, d))
                    .append(createTableContent('cargo_pieces', g_9, true, d))
                    .append(createTableContent('cargo_dim_fact', g_14, true, d))
                    .append(createTableContent('cargo_vol_weight', g_15, true, d))

                    .append(createTableContent('cargo_serial_number', g_16, true, d))
                    .append(createTableContent('cargo_barcode', g_17, true, d))
                    .append(createTableContent('cargo_Model', g_18, true, d))
                    .append(createTableContent('cargo_commodity_id', g_19, true, d))
                    .append(createTableContent('cargo_commodity_name', g_20, true, d))
                    .append(createTableContent('cargo_pro_number', g_21, true, d))
                    .append(createTableContent('cargo_project', g_22, true, d))
                    .append(createTableContent('cargo_po_number', g_23, true, d))
                    .append(createTableContent('cargo_inv_number', g_24, true, d))
                    .append(createTableContent('cargo_lot_number', g_25, true, d))
                    .append(createTableContent('cargo_sku_number', g_26, true, d))
                    .append(createTableContent('cargo_destination_point', g_27, true, d))
                    .append(createTableContent('cargo_attention', g_28, true, d))

                    .append(createTableContent('cargo_scheduleb_id', g_29, true, d))
                    .append(createTableContent('cargo_scheduleb_code', g_30, true, d))
                    .append(createTableContent('cargo_scheduleb_description', g_31, true, d))
                    .append(createTableContent('cargo_hts_id', g_32, true, d))
                    .append(createTableContent('cargo_hts_code', g_33, true, d))
                    .append(createTableContent('cargo_hts_description', g_34, true, d))
                    .append(createTableContent('cargo_value', g_35, true, d))
                    .append(createTableContent('cargo_eccn', g_36, true, d))
                    .append(createTableContent('cargo_export_id', g_37, true, d))
                    .append(createTableContent('cargo_export_code', g_38, true, d))
                    .append(createTableContent('cargo_license_type_id', g_39, true, d))
                    .append(createTableContent('cargo_license_type_code', g_40, true, d))
                    .append(createTableContent('cargo_origin', g_41, true, d))

                    .append(createTableContent('cargo_uns_id', g_42, true, d))
                    .append(createTableContent('cargo_uns_code', g_43, true, d))
                    .append(createTableContent('cargo_uns_description', g_44, true, d))
                    .append(createTableContent('cargo_class_id', g_45, true, d))
                    .append(createTableContent('cargo_class_description', g_46, true, d))
                    .append(createTableContent('cargo_special_instructions', g_47, true, d))
                    .append(createTableContent('cargo_material_page', g_48, true, d))
                    .append(createTableContent('cargo_hazardous_levels', g_49, true, d))
                    .append(createTableContent('cargo_emergency_contact', g_50, true, d))
                    .append(createTableContent('cargo_emergency_contact_phone', g_51, true, d))
                    .append(createTableContent('cargo_comments', g_52, true, d))

                    .append(createTableContent('cargo_marks', g_53, true, d))
                    .append(createTableContent('cargo_container', g_54, true, d))
                    .append(createTableContent('cargo_gross_weight', g_56, true, d))

                    .append(createTableBtns()),

                    0 == box_id ? x.append(C) : x.find("tr#" + box_id).replaceWith(C), calculate_warehouse_details(), cleanModalFields("Cargo_Details") , $("#box_quantity").val("1"), $("#box_pieces").val("1"), $("#box_metric_unit").val("I").change(), $("#box_weight_unit").val("L").change(), $("#box_weight_unit").val("L").change(), $("#box_dim_fact").val("I").change(), $("#box_cargo_type_id").val(0).change(), $("#Cargo_Details").modal("show"), $("#box_quantity").focus()
        }

    }), $("#cargo_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
            calculate_warehouse_details()

    }), $("#cargo_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('cargo_details');
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
                g59 = t[0].childNodes[59].textContent;

                $("#cargo_line").val(g1),
                $('#box_cargo_type_id').val(g2).change(),
                $('#box_cargo_type_code').val(g3),
                $('#box_quantity').val(g4),
                $('#box_weight_unit').val(g5).change(),
                $('#box_length').val(g6),
                $('#box_width').val(g7),
                $('#box_height').val(g8),
                $('#box_unit_weight').val(g9),
                $('#box_total_weight').val(g10),
                $('#box_total_cubic').val(g11),
                $('#cargo_charge_weight').val(g12),
                $('#cargo_rate').val(g13),
                $('#cargo_total').val(g14),

                $('#box_metric_unit').val(g15).change(),
                $('#box_material').val(g16),
                $('#box_pieces').val(g17),
                $('#box_dim_fact').val(g18).change(),
                $('#box_vol_weight').val(g19),

                $('#box_serial_number').val(g20),
                $('#box_barcode').val(g21),
                $('#box_Model').val(g22),
                $('#box_commodity_id').val(g23),
                $('#box_commodity_name').val(g24),
                $('#box_pro_number').val(g25),
                $('#box_project').val(g26),
                $('#box_po_number').val(g27),
                $('#box_inv_number').val(g28),
                $('#box_lot_number').val(g29),
                $('#box_sku_number').val(g30),
                $('#box_destination_point').val(g31),
                $('#box_attention').val(g32),

                $('#box_scheduleb_id').val(g33),
                $('#box_scheduleb_code').val(g34),
                $('#box_scheduleb_description').val(g35),
                $('#box_hts_id').val(g36),
                $('#box_hts_code').val(g37),
                $('#box_hts_description').val(g38),
                $('#box_value').val(g39),
                $('#box_eccn').val(g40),
                $('#box_export_id').val(g41),
                $('#box_export_code').val(g42),
                $('#box_license_type_id').val(g43),
                $('#box_license_type_code').val(g44),
                $('#box_origin').val(g45),

                $('#box_uns_id').val(g46),
                $('#box_uns_code').val(g47),
                $('#box_uns_description').val(g48),
                $('#box_class_id').val(g49),
                $('#box_class_description').val(g50),
                $('#box_special_instructions').val(g51),
                $('#box_material_page').val(g52),
                $('#cargo_hazardous_levels').val(g53),
                $('#box_emergency_contact').val(g54),
                $('#box_emergency_contact_phone').val(g55),
                $('#box_comments').val(g56),

                $('#cargo_marks').val(g57),
                $('#cargo_container').val(g58),
                $('#cargo_gross_weight').val(g59),
                $("#Cargo_Details").modal("show"), $("#box_quantity").focus()
    });

    $("#charges-save").click(function() {
        if($("#billing_billing_code").val()==''){

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
                    .append(createTableContent('billing_vendor_name', g_25, true, d))
                    .append(createTableContent('billing_unit_name', g_9, true, d))
                    .append(createTableContent('billing_bill_type', g_4, false, d))
                    .append(createTableContent('billing_bill_party', g_5, false, d))
                    .append(createTableContent('billing_quantity', g_7, false, d))
                    .append(createTableContent('billing_rate', g_11, true, d))
                    .append(createTableContent('billing_amount', g_12, false, d))
                    .append(createTableContent('billing_currency_type', g_13, true, d))
                    .append(createTableContent('billing_customer_name', g_16, true, d))
                    .append(createTableContent('cost_amount', g_21, false, d))
                    .append(createTableContent('cost_currency_type', g_22, true, d))
                    .append(createTableContent('cost_invoice', g_27, true, d))
                    .append(createTableContent('cost_reference', g_29, true, d))

                    .append(createTableContent('billing_notes', g_6, true, d))
                    .append(createTableContent('billing_unit_id', g_8, true, d))
                    .append(createTableContent('billing_exchange_rate', g_14, true, d))
                    .append(createTableContent('billing_customer_id', g_15, true, d))
                    .append(createTableContent('cost_quantity', g_17, true, d))
                    .append(createTableContent('cost_unit_id', g_18, true, d))
                    .append(createTableContent('cost_unit_name', g_19, true, d))
                    .append(createTableContent('cost_rate', g_20, true, d))
                    .append(createTableContent('cost_cost_center', g_28, true, d))
                    .append(createTableContent('cost_exchange_rate', g_23, true, d))
                    .append(createTableContent('billing_vendor_code', g_24, true, d))
                    .append(createTableContent('cost_date', g_26, true, d))
                    .append(createTableContent('billing_increase', g_10, true, d))
                    .append(createTableBtns()),

                    0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), values_charges(), cleanModalFields("Charge_Details"), $("#billing_bill_type").val("C").change(), $("#billing_bill_party").val("S").change(), $("#billing_currency_type").val("1").change(), $("#cost_currency_type").val("1").change(), $("#billing_unit_id").val("0").change(),$("#cost_unit_id").val("0").change(), $("#Charge_Details").modal("show"), $("#billing_billing_code").focus()
        }

    }), $("#charge_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
                values_charges()
    }), $("#charge_details").on("click", "a.btn-default", function() {
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
                $("#billing_vendor_name").val(g5),
                $("#billing_unit_name").val(g6),

                $("#billing_bill_type").val(g7).change(),
                $("#billing_bill_party").val(g8).change(),
                $("#billing_quantity").val(g9),
                $("#billing_rate").val(g10),
                $("#billing_amount").val(g11),
                $("#billing_currency_type").val(g12).change(),
                $("#billing_customer_name").val(g13),
                $("#cost_amount").val(g14),
                $("#cost_currency_type").val(g15).change(),
                $("#cost_invoice").val(g16),
                $("#cost_reference").val(g17),

                $("#billing_notes").val(g18),
                $("#billing_unit_id").val(g19).change(),
                $("#billing_exchange_rate").val(g20),
                $("#billing_customer_id").val(g21).change(),
                $("#cost_quantity").val(g22),
                $("#cost_unit_id").val(g23).change(),
                $("#cost_unit_name").val(g24),

                $("#cost_rate").val(g25),
                $("#cost_cost_center").val(g26),
                $("#cost_exchange_rate").val(g27),
                $("#billing_vendor_code").val(g28),
                $("#cost_date").val(g29),
                $("#billing_increase").val(g30),

                $("#Charge_Details").modal("show"), $("#billing_billing_code").focus()
    });


</script>