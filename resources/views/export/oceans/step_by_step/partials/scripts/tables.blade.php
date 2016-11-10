<script type="text/javascript">

    $("#btn-transportation").click(function() {
        for (var t = $("#transportation-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });


    $("#btn_container_details").click(function() {
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

    $("#btn-load-warehouse").click(function() {
        for (var t = $("#load-warehouse-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_warehouse").click(function() {
        for (var t = $("#warehouse_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#cargo_details_save").click(function() {
        var t = $("#warehouse_cargo_details tbody tr").length + 1,
                _ =  ($("#warehouse_cargo_details tbody tr").length == 0 ? 1 : parseInt($("#warehouse_cargo_details tbody tr")[$("#warehouse_cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                c1 = $("#cargo_id").val(),
                z = (c1==0?_ : c1)- 1,
                c2= $("#cargo_quantity").val(),
                c3 = $("#cargo_cargo_type_id").val(),
                c4 = $("#cargo_cargo_type_code").val(),
                c5 = $("#cargo_pieces").val(),
                c6 = $("#cargo_weight_unit_measurement_id").val(),
                c7 = $("#cargo_metric_unit_measurement_id").val(),
                c8 = $("#cargo_length").val(),
                c9 = $("#cargo_width").val(),
                c10 = $("#cargo_height").val(),
                c11 = $("#cargo_total_weight").val(),
                c12 = $("#cargo_cubic").val(),
                c13 = $("#cargo_volume_weight").val(),
                c14 = $("#cargo_location_id").val(),
                c15 = $("#cargo_location_name").val(),
                c16 = $("#cargo_location_bin_id").val(),
                c17 = $("#cargo_location_bin_name").val(),
                c18 = $("#cargo_material_description").val(),
                c19 = $("#cargo_dim_fact").val(),
                c20 = $("#cargo_square_foot").val(),
                c21 = $("#cargo_unit_weight").val(),
                c22 = $("#cargo_tare_weight").val(),
                c23 = $("#cargo_net_weight").val(),
                b= $("#warehouse_cargo_details"),
                x = b.find("tbody"),
                C = $("<tr id=" + (c1==0?_ : c1) + ">");

        C.append(createTableContent('cargo_line', (c1==0?_ : c1), true, z))
                .append(createTableContent('cargo_quantity', c2, false, z))
                .append(createTableContent('cargo_cargo_type_id', c3, true, z))
                .append(createTableContent('cargo_cargo_type_code', c4, false, z))
                .append(createTableContent('cargo_pieces', c5, true, z))
                .append(createTableContent('cargo_weight_unit_measurement_id', c6, false, z))
                .append(createTableContent('cargo_metric_unit_measurement_id', c7, true, z))
                .append(createTableContent('cargo_length', c8, true, z))
                .append(createTableContent('cargo_width', c9, true, z))
                .append(createTableContent('cargo_height', c10, true, z))
                .append(createTableContent('cargo_total_weight', c11, false, z))
                .append(createTableContent('cargo_cubic', c12, false, z))
                .append(createTableContent('cargo_volume_weight', c13, false, z))
                .append(createTableContent('cargo_location_id', c14, true, z))
                .append(createTableContent('cargo_location_name', c15, false, z))
                .append(createTableContent('cargo_location_bin_id', c16, true, z))
                .append(createTableContent('cargo_location_bin_name', c17, false, z))
                .append(createTableContent('cargo_material_description', c18, true, z))
                .append(createTableContent('cargo_dim_fact', c19, true, z))
                .append(createTableContent('cargo_square_foot', c20, true, z))
                .append(createTableContent('cargo_unit_weight', c21, true, z))
                .append(createTableContent('cargo_tare_weight', c22, true, z))
                .append(createTableContent('cargo_net_weight', c23, true, z))
                .append(createTableBtns()), 0 == c1 ? x.append(C) : x.find("tr#" + c1).replaceWith(C), calculate_cargo(),total_warehouse_cargo(),cleanModalFields('WarehouseCargoDetails'), $("#cargo_quantity").val(1), $("#cargo_quantity").focus()
    }), $("#warehouse_cargo_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove();
        total_warehouse_cargo();
    }), $("#warehouse_cargo_details").on("click", "a.btn-default", function() {
        removeEmptyNodes("warehouse_cargo_details");
        var t = $(this).closest("tr"),
                c1 = t[0].childNodes[0].textContent,
                c2 = t[0].childNodes[1].textContent,
                c3 = t[0].childNodes[2].textContent,
                c4 = t[0].childNodes[3].textContent,
                c5 = t[0].childNodes[4].textContent,
                c6 = t[0].childNodes[5].textContent,
                c7 = t[0].childNodes[6].textContent,
                c8 = t[0].childNodes[7].textContent,
                c9 = t[0].childNodes[8].textContent,
                c10 = t[0].childNodes[9].textContent,
                c11 = t[0].childNodes[10].textContent,
                c12 = t[0].childNodes[11].textContent,
                c13 = t[0].childNodes[12].textContent,
                c14 = t[0].childNodes[13].textContent,
                c15 = t[0].childNodes[14].textContent,
                c16 = t[0].childNodes[15].textContent,
                c17 = t[0].childNodes[16].textContent,
                c18 = t[0].childNodes[17].textContent,
                c19 = t[0].childNodes[18].textContent,
                c20 = t[0].childNodes[19].textContent,
                c21 = t[0].childNodes[20].textContent,
                c22 = t[0].childNodes[21].textContent,
                c23 = t[0].childNodes[22].textContent;

        $("#cargo_id").val(c1),
                $("#cargo_quantity").val(c2),
                $("#cargo_cargo_type_id").val(c3).change(),
                $("#cargo_cargo_type_code").val(c4),
                $("#cargo_pieces").val(c5),
                $("#cargo_weight_unit_measurement_id").val(c6).change(),
                $("#cargo_metric_unit_measurement_id").val(c7).change(),
                $("#cargo_length").val(c8),
                $("#cargo_width").val(c9),
                $("#cargo_height").val(c10),
                $("#cargo_total_weight").val(c11),
                $("#cargo_cubic").val(c12),
                $("#cargo_volume_weight").val(c13),
                $("#cargo_location_id").val(c14),
                $("#cargo_location_name").val(c15),
                $("#cargo_location_bin_id").val(c16),
                $("#cargo_location_bin_name").val(c17),
                $("#cargo_material_description").val(c18),
                $("#cargo_dim_fact").val(c19),
                $("#cargo_square_foot").val(c20),
                $("#cargo_unit_weight").val(c21),
                $("#cargo_tare_weight").val(c22),
                $("#cargo_net_weight").val(c23),
                 $("#WarehouseCargoDetails").modal("show")
    });


    $("#cargo_warehouse_save").click(function() {
        var t = $("#cargo_details tbody tr").length + 1,
                _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                c1 = $("#warehouse_line").val(),
                z = (0== c1? _ : c1) - 1,
                c2= $("#warehouse_number").val(),
                c3 = $("#warehouse_date_in").val(),
                c4 = $("#bldg_number").val(),
                c5 = $("#loaded_position").val(),
                c6 = $("#ship_inst_number").val(),
                c7 = $("#box_number").val(),
                c8 = $("#warehouse_status").val(),

                c9 = $("#warehouse_shipper_id").val(),
                c10 = $("#warehouse_shipper_name").val(),
                c11 = $("#warehouse_shipper_address").val(),
                c12 = $("#warehouse_shipper_city").val(),
                c13 = $("#warehouse_shipper_state_id").val(),
                c14 = $("#warehouse_shipper_state_name").val(),
                c15 = $("#warehouse_shipper_country_id").val(),
                c16 = $("#warehouse_shipper_country_name").val(),
                c17 = $("#warehouse_shipper_zip_code_id").val(),
                c18 = $("#warehouse_shipper_zip_code_code").val(),
                c19 = $("#warehouse_shipper_phone").val(),
                c20 = $("#warehouse_shipper_fax").val(),

                c21 = $("#warehouse_consignee_id").val(),
                c22 = $("#warehouse_consignee_name").val(),
                c23 = $("#warehouse_consignee_address").val(),
                c24 = $("#warehouse_consignee_city").val(),
                c25 = $("#warehouse_consignee_state_id").val(),
                c26 = $("#warehouse_consignee_state_name").val(),
                c27 = $("#warehouse_consignee_country_id").val(),
                c28 = $("#warehouse_consignee_country_name").val(),
                c29 = $("#warehouse_consignee_zip_code_id").val(),
                c30 = $("#warehouse_consignee_zip_code_code").val(),
                c31 = $("#warehouse_consignee_phone").val(),
                c32 = $("#warehouse_consignee_fax").val(),

                c33 = $("#sum_quantity").val(),
                c34 = $("#sum_weight").val(),
                c35 = $("#sum_cubic").val(),
                c36 = $("#sum_volume_weight").val(),

                c37 = $("#warehouse_id").val(),
                c38 = $("#warehouse_code").val(),

                b= $("#cargo_details"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== c1? _ : c1) + ">");
        console.log("x");

        C.append(createTableContent('hidden_warehouse_line', (0== c1? _ : c1), true, z))
                .append(createTableContent('hidden_warehouse_number', c2, false, z))
                .append(createTableContent('hidden_date_in', c3, false, z))
                .append(createTableContent('hidden_shipper_name', c10, false, z))
                .append(createTableContent('hidden_consignee_name', c22, false, z))
                .append(createTableContent('hidden_box_number', c7, false, z))
                .append(createTableContent('hidden_loaded_position', c5, false, z))
                .append(createTableContent('hidden_ship_inst_number', c6, false, z))
                .append(createTableContent('hidden_status', c8, false, z))

                .append(createTableContent('hidden_bldg_number', c4, true, z))
                .append(createTableContent('hidden_shipper_id', c9, true, z))
                .append(createTableContent('hidden_shipper_address', c11, true, z))
                .append(createTableContent('hidden_shipper_city', c12, true, z))
                .append(createTableContent('hidden_shipper_state_id', c13, true, z))
                .append(createTableContent('hidden_shipper_state_name', c14, true, z))
                .append(createTableContent('hidden_shipper_country_id', c15, true, z))
                .append(createTableContent('hidden_shipper_country_name', c16, true, z))
                .append(createTableContent('hidden_shipper_zip_code_id', c17, true, z))
                .append(createTableContent('hidden_shipper_zip_code_code', c18, true, z))
                .append(createTableContent('hidden_shipper_phone', c19, true, z))
                .append(createTableContent('hidden_shipper_fax', c20, true, z))

                .append(createTableContent('hidden_consignee_id', c21, true, z))
                .append(createTableContent('hidden_consignee_address', c23, true, z))
                .append(createTableContent('hidden_consignee_city', c24, true, z))
                .append(createTableContent('hidden_consignee_state_id', c25, true, z))
                .append(createTableContent('hidden_consignee_state_name', c26, true, z))
                .append(createTableContent('hidden_consignee_country_id', c27, true, z))
                .append(createTableContent('hidden_consignee_country_name', c28, true, z))
                .append(createTableContent('hidden_consignee_zip_code_id', c29, true, z))
                .append(createTableContent('hidden_consignee_zip_code_code', c30, true, z))
                .append(createTableContent('hidden_consignee_phone', c31, true, z))
                .append(createTableContent('hidden_consignee_fax', c32, true, z))

                .append(createTableContent('hidden_sum_pieces', c33, true, z))
                .append(createTableContent('hidden_sum_weight', c34, true, z))
                .append(createTableContent('hidden_sum_cubic', c35, true, z))
                .append(createTableContent('hidden_sum_volume_weight', c36, true, z))

                .append(createTableContent('hidden_warehouse_id', c37, true, z))
                .append(createTableContent('hidden_warehouse_code', c38, true, z))
                .append(createTableContent('hidden_flag','1', true, z))
                .append(createTableContent('hidden_receipt_entry','0', true, z))
                .append(createTableBtns()), 0 == c1 ? x.append(C) : x.find("tr#" + c1).replaceWith(C), cleanModalFields('Warehouse_Details') , $("#warehouse_number").focus();


        //===========  WAREHOUSE CARGO DETAILS ======================
        $("#hidden_cargo_details tbody [data-id='" + c2 + "']").remove();
                var n = $("#hidden_cargo_details"),
                thidden = n.find("tbody"),
                tr=  $("#warehouse_cargo_details tbody tr"),
                tr_1= $("#hidden_cargo_details tbody tr"),
                d =tr_1.length ;
        for(var a =0; a< tr.length ; a++) {
            var p_1 = $("<tr data-id=" + c2 + ">");
            p_1.append(createTableContent('details_id', (0== c1? _ : c1) , true, d))
                    .append(createTableContent('details_line', tr[a].childNodes[0].textContent, true, d))
                    .append(createTableContent('details_quantity', tr[a].childNodes[1].textContent, true, d))
                    .append(createTableContent('details_cargo_type_id', tr[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('details_cargo_type_code', tr[a].childNodes[3].textContent, true, d))
                    .append(createTableContent('details_pieces', tr[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('details_weight_unit_measurement_id', tr[a].childNodes[5].textContent, true, d))
                    .append(createTableContent('details_metric_unit_measurement_id', tr[a].childNodes[6].textContent, false, d))
                    .append(createTableContent('details_length', tr[a].childNodes[7].textContent, false, d))
                    .append(createTableContent('details_width', tr[a].childNodes[8].textContent, false, d))
                    .append(createTableContent('details_height', tr[a].childNodes[9].textContent, false, d))
                    .append(createTableContent('details_total_weight', tr[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('details_cubic', tr[a].childNodes[11].textContent, false, d))
                    .append(createTableContent('details_volume_weight', tr[a].childNodes[12].textContent, false, d))
                    .append(createTableContent('details_location_id', tr[a].childNodes[13].textContent, false, d))
                    .append(createTableContent('details_location_name', tr[a].childNodes[14].textContent, false, d))
                    .append(createTableContent('details_location_bin_id', tr[a].childNodes[15].textContent, false, d))
                    .append(createTableContent('details_location_bin_name', tr[a].childNodes[16].textContent, false, d))
                    .append(createTableContent('details_material_description', tr[a].childNodes[17].textContent, false, d))
                    .append(createTableContent('details_dim_fact', tr[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('details_square_foot', tr[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('details_unit_weight', tr[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('details_tare_weight', tr[a].childNodes[21].textContent, true, d))
                    .append(createTableContent('details_net_weight', tr[a].childNodes[22].textContent, true, d))
                    .append(createTableContent('details_warehouse_number', c2, true, d))
                    .append(createTableContent('inserted_id', '0', true, d))
         thidden.append(p_1);
            d+=1;
        }weight_totals(),domestic_routing();
        clearTable("warehouse_cargo_details")

    }), $("#cargo_details").on("click", "a.btn-danger", function() {
        var t= $(this).closest("tr");
        $("#hidden_cargo_details tbody [data-id='"+ t[0].childNodes[1].textContent +"']").remove(),
        $(this).closest("tr").remove(),
        weight_totals()
    }), $("#cargo_details").on("click", "a.btn-default", function() {

        total_warehouse_cargo();
        var t = $(this).closest("tr"),
                c1 = t[0].childNodes[0].textContent,
                c2 = t[0].childNodes[1].textContent,
                c3 = t[0].childNodes[2].textContent,
                c4 = t[0].childNodes[3].textContent,
                c5 = t[0].childNodes[4].textContent,
                c6 = t[0].childNodes[5].textContent,
                c7 = t[0].childNodes[6].textContent,
                c8 = t[0].childNodes[7].textContent,

                c9 = t[0].childNodes[8].textContent,
                c10 = t[0].childNodes[9].textContent,
                c11 = t[0].childNodes[10].textContent,
                c12 = t[0].childNodes[11].textContent,
                c13 = t[0].childNodes[12].textContent,
                c14 = t[0].childNodes[13].textContent,
                c15 = t[0].childNodes[14].textContent,
                c16 = t[0].childNodes[15].textContent,
                c17 = t[0].childNodes[16].textContent,
                c18 = t[0].childNodes[17].textContent,
                c19 = t[0].childNodes[18].textContent,
                c20 = t[0].childNodes[19].textContent,

                c21 = t[0].childNodes[20].textContent,
                c22 = t[0].childNodes[21].textContent,
                c23 = t[0].childNodes[22].textContent,
                c24 = t[0].childNodes[23].textContent,
                c25 = t[0].childNodes[24].textContent,
                c26 = t[0].childNodes[25].textContent,
                c27 = t[0].childNodes[26].textContent,
                c28 = t[0].childNodes[27].textContent,
                c29 = t[0].childNodes[28].textContent,
                c30 = t[0].childNodes[29].textContent,
                c31 = t[0].childNodes[30].textContent,
                c32 = t[0].childNodes[31].textContent,

                c33 = t[0].childNodes[32].textContent,
                c34 = t[0].childNodes[33].textContent,
                c35 = t[0].childNodes[34].textContent,
                c36 = t[0].childNodes[35].textContent,

                c37 = t[0].childNodes[36].textContent,
                c38 = t[0].childNodes[37].textContent;

                $("#warehouse_line").val(c1),
                $("#warehouse_number").val(c2),
                $("#warehouse_date_in").val(c3),
                $("#warehouse_shipper_name").val(c4),
                $("#warehouse_consignee_name").val(c5),
                $("#box_number").val(c6),
                $("#loaded_position").val(c7),
                $("#ship_inst_number").val(c8),
                $("#warehouse_status").val(c9).change(),

                $("#bldg_number").val(c10),
                $("#warehouse_shipper_id").val(c11),
                $("#warehouse_shipper_address").val(c12),
                $("#warehouse_shipper_city").val(c13),
                $("#warehouse_shipper_state_id").val(c14),
                $("#warehouse_shipper_state_name").val(c15),
                $("#warehouse_shipper_country_id").val(c16),
                $("#warehouse_shipper_country_name").val(c17),
                $("#warehouse_shipper_zip_code_id").val(c18),
                $("#warehouse_shipper_zip_code_code").val(c19),
                $("#warehouse_shipper_phone").val(c20),
                $("#warehouse_shipper_fax").val(c21),

                $("#warehouse_consignee_id").val(c22),
                $("#warehouse_consignee_address").val(c23),
                $("#warehouse_consignee_city").val(c24),
                $("#warehouse_consignee_state_id").val(c25),
                $("#warehouse_consignee_state_name").val(c26),
                $("#warehouse_consignee_country_id").val(c27),
                $("#warehouse_consignee_country_name").val(c28),
                $("#warehouse_consignee_zip_code_id").val(c29),
                $("#warehouse_consignee_zip_code_code").val(c30),
                $("#warehouse_consignee_phone").val(c31),
                $("#warehouse_consignee_fax").val(c32),

                $("#sum_quantity").val(c33),
                $("#sum_weight").val(c34),
                $("#sum_cubic").val(c35),
                $("#sum_volume_weight").val(c36),

                $("#warehouse_id").val(c37),
                $("#warehouse_code").val(c38),
                calculate_cargo(), $("#Warehouse_Details").modal("show"),  clearTable("warehouse_cargo_details")


        var r= $("#hidden_cargo_details tbody [data-id='"+ c2 +"']").length,
                t_hidden= $("#hidden_cargo_details tbody [data-id='"+ c2 +"']"),
                n= $("#warehouse_cargo_details");
        t = n.find("tbody");
        for (var a=0; a< r; a++){
            var t1= $("#warehouse_cargo_details tbody tr");
            var d =t1.length,
                    p1 = $("<tr id=" + (a + 1) + ">");
            p1.append(createTableContent('cargo_line', (a + 1), true, d))
                    .append(createTableContent('cargo_quantity', t_hidden[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('cargo_type_id', t_hidden[a].childNodes[3].textContent, true, d))
                    .append(createTableContent('cargo_type_code', t_hidden[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('cargo_pieces', t_hidden[a].childNodes[5].textContent, true, d))
                    .append(createTableContent('cargo_weight_unit_measurement_id', t_hidden[a].childNodes[6].textContent, false, d))
                    .append(createTableContent('cargo_metric_unit_measurement_id', t_hidden[a].childNodes[7].textContent, true, d))
                    .append(createTableContent('cargo_length', t_hidden[a].childNodes[8].textContent, true, d))
                    .append(createTableContent('cargo_width', t_hidden[a].childNodes[9].textContent, true, d))
                    .append(createTableContent('cargo_height', t_hidden[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('cargo_total_weight', t_hidden[a].childNodes[11].textContent, false, d))
                    .append(createTableContent('cargo_cubic', t_hidden[a].childNodes[12].textContent, false, d))
                    .append(createTableContent('cargo_volume_weight', t_hidden[a].childNodes[13].textContent, false, d))
                    .append(createTableContent('cargo_location_id', t_hidden[a].childNodes[14].textContent, true, d))
                    .append(createTableContent('cargo_location_name', t_hidden[a].childNodes[15].textContent, false, d))
                    .append(createTableContent('cargo_location_bin_id', t_hidden[a].childNodes[16].textContent, true, d))
                    .append(createTableContent('cargo_location_bin_name', t_hidden[a].childNodes[17].textContent, false, d))
                    .append(createTableContent('cargo_material_description', t_hidden[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('cargo_dim_fact', t_hidden[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('cargo_square_foot', t_hidden[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('cargo_unit_weight', t_hidden[a].childNodes[21].textContent, true, d))
                    .append(createTableContent('cargo_tare_weight', t_hidden[a].childNodes[22].textContent, true, d))
                    .append(createTableContent('cargo_net_weight', t_hidden[a].childNodes[23].textContent, true, d))
                    .append(createTableContent('cargo_warehouse_number', t_hidden[a].childNodes[24].textContent, true, d))
                    .append(createTableBtns())
            t.append(p1);
            d +=1;
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


            C.append(createTableContent('charge_id',(0== charge_id? _ : charge_id) , true,d))
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

                    0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), cleanModalFields("Charge_Details"), $("#Charge_Details").modal("hide"), $("#billing_billing_code").focus()
        }

    }), $("#charge_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove()

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
        }else {
            var t = $("#container_details tbody tr").length + 1,
                    _ = ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                    container_id = $("#container_line").val(),
                    d = (0 == container_id ? _ : container_id)-1,
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
                    C = $("<tr id=" + (0 == container_id ? _ : container_id) + ">");


            C.append(createTableContent('container_line', (0 == container_id ? _ : container_id), true, d))
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
            var tr=  $("#hazardous_details tbody tr"),
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

    }),$("#container_details").on("click", "a.btn-danger", function() {
        var id_row = $(this).closest('tr').attr('id');
        $("#hzd_details tbody [data-id='" + id_row + "']").remove();
        $(this).closest("tr").remove()
    }), $("#container_details").on("click", "a.btn-default", function() {
        clearTable('hazardous-details');
        total_warehouse_cargo();
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
                $("#total_weight_unit").val(g6).change(),
                $("#shipper_owned").val(g7),
                $("#container_commodity_id").val(g8),
                $("#container_commodity_name").val(g9),
                $("#pd_status").val(g10).change(),
                $("#container_spotting_date").val(g11),
                $("#container_pull_date").val(g12),
                $("#container_carrier_id").val(g13),
                $("#container_carrier_name").val(g14),
                $("#container_ventilation").val(g15),
                $("#container_degrees").val(g16).change(),
                $("#container_temperature").val(g17),
                $("#container_max").val(g18),
                $("#container_min").val(g19),

                $("#container_pickup_id").val(g20),
                $("#container_pickup_name").val(g21),
                $("#container_pickup_type").val(g22).change(),
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
                $("#container_delivery_type").val(g35).change(),
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
                $("#container_drop_type").val(g48).change(),
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
        clearTable("hazardous_details");

        var n = $("#hazardous_details");
        t = n.find("tbody");
        var tr=  $("#hzd_details tbody tr");
        var tr_1=  $("#hazardous_details tbody tr");
        var  r_1= tr.length;
        var d =0;

        for(var a =0; a< r_1 ; a++){
            if( tr[a].childNodes[0].textContent == g1){
                var  p_1=  $("<tr id=" + (d+1) + ">");
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


    $("#transportation-save").click(function() {
        if($("#transportation_billing_code").val()== '' || $("#transportation_carrier_name").val() == '' || $("#transportation_amount").val()=='' || $("#transportation_loading_reference").val()==''){
            show_alert();
            $("#transportation_billing_code").focus();
        }else{
            var t = $("#transportation_details tbody tr").length + 1,
                    _ =  ($("#transportation_details tbody tr").length == 0 ? 1 : parseInt($("#transportation_details tbody tr")[$("#transportation_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    transportation_id = $("#transportation_id").val(),
                    d= (0 == transportation_id ? _ : transportation_id)-1,
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
                    C = $("<tr id=" + (0== transportation_id ? _ : transportation_id)+ ">");

            C.append(createTableContent('transportation_id', (0== transportation_id ? _ : transportation_id), true,d))
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
                    .append(createTableBtns()), 0 == transportation_id ? x.append(C) : x.find("tr#" + transportation_id).replaceWith(C),transportation_plan(), $("#TransportationDetails").modal("hide"), $("#transportation_leg").focus()
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
                $("#transportation_mode").val(g3).change(),
                $("#transportation_carrier_id").val(g4),
                $("#transportation_carrier_name").val(g5),
                $("#transportation_loading_location_id").val(g6),
                $("#transportation_loading_location_name").val(g7),
                $("#transportation_unloading_location_id").val(g8),
                $("#transportation_unloading_location_name").val(g9),
                $("#transportation_ETD_date").val(g10),
                $("#transportation_ETA_date").val(g11),
                $("#transportation_leg_status").val(g12).change(),
                $("#transportation_amount").val(g13),

                $("#transportation_billing_id").val(g14),
                $("#transportation_billing_code").val(g15),
                $("#transportation_description").val(g16),
                $("#transportation_service_id").val(g17),
                $("#transportation_service_name").val(g18),
                $("#transportation_notify").val(g19),
                $("#transportation_loading_reference").val(g20),
                $("#transportation_unloading_reference").val(g21),
                $("#origin_from_type").val(g22).change(),
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
                $("#origin_to_type").val(g36).change(),
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
                $("#TransportationDetails").modal("show"), $("#transportation_leg").focus()
    });

    $("#pro-save").click(function() {
        if($("#pro_number").val()== ''){
            show_alert();
            $("#pro_number").focus()
        }else{
            var r = ($('#PRO_details tbody tr').length + 1),
                    _ =  ($("#PRO_details tbody tr").length == 0 ? 1 : parseInt($("#PRO_details tbody tr")[$("#PRO_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#pro_line").val(),
                    c = (0 == l ? _  : l)-1,
                    a = $("#pro_number").val().toUpperCase(),
                    d = $("#pro_detail").val().toUpperCase(),
                    s = $("#pro_remarks").val().toUpperCase(),
                    n = $("#PRO_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('pro_line',(0 == l ? _  : l) , true, c))
                    .append(createTableContent('pro_number', a, false, c))
                    .append(createTableContent('pro_detail', d, false, c))
                    .append(createTableContent('pro_remarks', s, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                    cleanModalFields('PRONumbers'),$("#pro_number").focus()
        }
    }),
            $('#PRO_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#PRO_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('PRO_details');
                var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        a = t[0].childNodes[3].textContent;
                $('#pro_line').val(o), $("#pro_number").val(r), $("#pro_detail").val(s), $("#pro_remarks").val(a), $("#PRONumbers").modal("show"), $("#pro_number").focus()
            });

    $("#customerReference-save").click(function() {
        if($("#po_number").val()== ''){
            show_alert();
            $("#po_number").focus()
        }else{
            var r = ($('#customer_details tbody tr').length + 1),
                    _ =  ($("#customer_details tbody tr").length == 0 ? 1 : parseInt($("#customer_details tbody tr")[$("#customer_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#po_line").val(),
                    c = (0 == l ? _  : l)-1,
                    a = $("#po_number").val().toUpperCase(),
                    d = $("#po_detail").val().toUpperCase(),
                    e = $("#po_project").val().toUpperCase(),
                    s = $("#po_remarks").val().toUpperCase(),
                    n = $("#customer_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('po_line', (0==l? _ : l) , true, c))
                    .append(createTableContent('po_number', a, false, c))
                    .append(createTableContent('po_detail', d, false, c))
                    .append(createTableContent('po_project', e, true, c))
                    .append(createTableContent('po_remarks', s, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                    cleanModalFields('customerReference'),$("#po_number").focus()
        }
    }),
            $('#customer_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#customer_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('customer_details');
                var t = $(this).closest("tr"),
                        o = t[0].childNodes[0].textContent,
                        r = t[0].childNodes[1].textContent,
                        s = t[0].childNodes[2].textContent,
                        d = t[0].childNodes[3].textContent,
                        a = t[0].childNodes[4].textContent;
                $('#po_line').val(o), $("#po_number").val(r), $("#po_detail").val(s),$("#po_project").val(d), $("#po_remarks").val(a), $("#customerReference").modal("show"), $("#po_number").focus()
            });

    $("#item_save").click(function() {
        if($("#item_name").val()== ''){
            show_alert();
            $("#item_name").focus()
        }else{
            var r = ($('#items_details tbody tr').length + 1),
                    _ =  ($("#items_details tbody tr").length == 0 ? 1 : parseInt($("#items_details tbody tr")[$("#items_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#item_line").val(),
                    c = (0 == l ? _  : l),
                    i1 = $("#item_id").val(),
                    i2 = $("#item_name").val().toUpperCase(),
                    i3 = $("#customer_id").val(),
                    i4 = $("#customer_name").val().toUpperCase(),
                    i5 = $("#item_quantity").val(),
                    i6 = $("#item_type_code").val(),
                    i7 = $("#item_type_name").val(),
                    i8 = $("#item_weight").val(),
                    i9 = $("#item_unit").val(),
                    n = $("#items_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('item_line', c , true, c))
                    .append(createTableContent('item_id', i1, false, c))
                    .append(createTableContent('item_name', i2, false, c))
                    .append(createTableContent('customer_id', i3, true, c))
                    .append(createTableContent('customer_name', i4, false, c))
                    .append(createTableContent('item_quantity', i5, false, c))
                    .append(createTableContent('item_type_code', i6, true, c))
                    .append(createTableContent('item_type_name', i7, true, c))
                    .append(createTableContent('item_weight', i8, true, c))
                    .append(createTableContent('item_unit', i9, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p),
                    cleanModalFields('ItemDetails'),$("#item_name").focus()
        }
    }),
            $('#items_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }),

            $("#items_details").on("click", "a.btn-default", function() {
                removeEmptyNodes('items_details');
                var t = $(this).closest("tr"),
                        i1 = t[0].childNodes[0].textContent,
                        i2 = t[0].childNodes[1].textContent,
                        i3 = t[0].childNodes[2].textContent,
                        i4 = t[0].childNodes[3].textContent,
                        i5 = t[0].childNodes[4].textContent,
                        i6 = t[0].childNodes[5].textContent,
                        i7 = t[0].childNodes[6].textContent,
                        i8 = t[0].childNodes[7].textContent,
                        i9 = t[0].childNodes[8].textContent,
                        i10 = t[0].childNodes[8].textContent;
                $("#item_line").val(i1),$("#item_id").val(i2), $("#item_name").val(i3), $("#customer_id").val(i4), $("#customer_name").val(i5), $("#item_quantity").val(i6), $("#item_type_code").val(i7),$("#item_type_name").val(i8),$("#item_weight").val(i9),$("#item_unit").val(i10).change(), $("#ItemDetails").modal("show"), $("#item_name").focus()
            });

    $("#uns-save").click(function() {
        if($("#hazardous_uns_code").val()== ''){
            show_alert();
            $("#hazardous_uns_code").focus()
        }else{
            var r = ($('#hazardous_details tbody tr').length + 1),
                    _ =  ($("#hazardous_details tbody tr").length == 0 ? 1 : parseInt($("#hazardous_details tbody tr")[$("#hazardous_details tbody tr").length - 1].childNodes[1].textContent) + 1 ),
                    l = $("#hazardous_uns_line").val(),
                    c = (0 == l ? _ : l)-1,
                    a = $("#hazardous_uns_id").val(),
                    d = $("#hazardous_uns_code").val().toUpperCase(),
                    s = $("#hazardous_uns_desc").val().toUpperCase(),
                    e = $("#hazardous_uns_note").val().toUpperCase(),
                    n = $("#hazardous_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('hazardous_uns_id', a, true, c))
                    .append(createTableContent('hazardous_uns_line', (0 == l ? _ : l), true, c))
                    .append(createTableContent('hazardous_uns_code', d, false, c))
                    .append(createTableContent('hazardous_uns_desc', s, false, c))
                    .append(createTableContent('hazardous_uns_note', e, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNsModal'), $("#hazardous_uns_code").focus()
        }

    }),
            $('#hazardous_details').on('click', 'a.btn-danger', function() {
                $(this).closest('tr').remove()
            }), $("#hazardous_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('hazardous_details');
        var t = $(this).closest("tr"),
                o = t[0].childNodes[0].textContent,
                r = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent,
                d = t[0].childNodes[4].textContent;
        $('#hazardous_uns_line').val(r), $("#hazardous_uns_id").val(o), $("#hazardous_uns_code").val(s), $("#hazardous_uns_desc").val(a), $("#hazardous_uns_note").val(d), $("#UNsModal").modal("show"), $("#hazardous_uns_code").focus()
    });



    $('#btn_new_warehouse').click(function() {
        var _ =  $("#cargo_details tbody tr").length + 1;
        _ = "TEMP0000"+ _;

        $("#warehouse_number").val(_);
    });

</script>