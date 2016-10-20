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

    $("#btn_warehouse").click(function() {
        for (var t = $("#warehouse_tabs").find("div"), l = 0; l < t.length  ; l++) {
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



    $("#uns-save").click(function() {
        if($("#hazardous_uns_code").val()== ''){
            show_alert();
            $("#hazardous_uns_code").focus()
        }else{
            var r = ($('#hazardous_details tbody tr').length + 1),
                    _ =  ($("#hazardous_details tbody tr").length == 0 ? 1 : parseInt($("#hazardous_details tbody tr")[$("#hazardous_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    l = $("#hazardous_uns_line").val(),
                    c = (0 == l ? _ : l)-1,
                    a = $("#hazardous_uns_id").val(),
                    d = $("#hazardous_uns_code").val().toUpperCase(),
                    s = $("#hazardous_uns_desc").val().toUpperCase(),
                    e = $("#hazardous_uns_note").val().toUpperCase(),
                    n = $("#hazardous_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (0==l? _ : l) + ">");
            p.append(createTableContent('hazardous_uns_id', c, true, c))
                    .append(createTableContent('hazardous_uns_line', (0 == l ? r : l), true, c))
                    .append(createTableContent('hazardous_uns_code', d, false, c))
                    .append(createTableContent('hazardous_uns_desc', s, false, c))
                    .append(createTableContent('hazardous_uns_note', e, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNsModal'), $("#hazardous_uns_code").focus()
        }
    }),  $("#hazardous_details").on("click", "a.btn-danger", function() {
                        $(this).closest("tr").remove()
    }), $("#hazardous_details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                c1 = t[0].childNodes[0].textContent,
                c2 = t[0].childNodes[1].textContent,
                c3 = t[0].childNodes[2].textContent,
                c4 = t[0].childNodes[3].textContent,
                c5 = t[0].childNodes[4].textContent;

        $("#hazardous_uns_line").val(c2),
        $("#hazardous_uns_id").val(c1),
        $("#hazardous_uns_code").val(c3),
        $("#hazardous_uns_desc").val(c4),
        $("#hazardous_uns_note").val(c5), $("#UNsModal").modal("show")
    });



    $("#cargo_warehouse_save").click(function(){
                var r= $("#cargo_details tbody tr").length + 1,
                 c1=$("#cargo_line").val(),
                        _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                 d= (c1 == 0? _ : c1)-1,
                c2= $("#warehouse_number").val(),
                c3= $("#warehouse_date_in").val(),
                c4= $("#warehouse_shipper_id").val(),
                c5= $("#warehouse_shipper_name").val(),
                c6= $("#warehouse_shipper_city").val(),
                c7= $("#warehouse_shipper_state_id").val(),
                c8= $("#warehouse_shipper_state_name").val(),
                c9= $("#warehouse_shipper_zip_code_id").val(),
                c10= $("#warehouse_shipper_zip_code_code").val(),
                c11= $("#warehouse_shipper_phone").val(),
                c12= $("#warehouse_shipper_fax").val(),
                c13= $("#warehouse_consignee_id").val(),
                c14= $("#warehouse_consignee_name").val(),
                c15= $("#warehouse_consignee_city").val(),
                c16= $("#warehouse_consignee_state_id").val(),
                c17= $("#warehouse_consignee_state_name").val(),
                c18= $("#warehouse_consignee_zip_code_id").val(),
                c19= $("#warehouse_consignee_zip_code_code").val(),
                c20= $("#warehouse_consignee_phone").val(),
                c21= $("#warehouse_consignee_fax").val(),
                c22= $("#box_number").val(),
                c23= $("#loaded_position").val(),
                c24= $("#warehouse_status").val(),
                c25= $("#ship_inst_number").val(),
                c26= $("#bl_number").val(),
                n = $("#cargo_details"),
                t= n.find("tbody"),
                        p = $("<tr id="+ (c1 == 0? _ : c1) +" >");
                p.append(createTableContent('warehouse_id', (c1 == 0? _ : c1), true, d))
                .append(createTableContent('warehouse_number', c2, false, d))
                .append(createTableContent('date_in', c3, false, d))
                .append(createTableContent('shipper_id', c4, true, d))
                .append(createTableContent('shipper_name', c5, false, d))
                .append(createTableContent('shipper_city', c6, true, d))
                .append(createTableContent('shipper_state_id',c7, true, d))
                .append(createTableContent('shipper_state_name', c8, true, d))
                .append(createTableContent('shipper_zip_code_id',c9, true, d))
                .append(createTableContent('shipper_zip_code_code', c10, true, d))
                .append(createTableContent('shipper_phone',c11, true, d))
                .append(createTableContent('shipper_fax', c12, true, d))
                .append(createTableContent('consignee_id', c13, true, d))
                .append(createTableContent('consignee_name', c14, false, d))
                .append(createTableContent('consignee_city', c15, true, d))
                .append(createTableContent('consignee_state_id', c16, true, d))
                .append(createTableContent('consignee_state_name', c17, true, d))
                .append(createTableContent('consignee_zip_code_id',c18, true, d))
                .append(createTableContent('consignee_zip_code_code', c19, true, d))
                .append(createTableContent('consignee_phone', c20, true, d))
                .append(createTableContent('consignee_fax', c21, true, d))
                .append(createTableContent('box_number', c22, false, d))
                .append(createTableContent('destination_name', c23, false, d))
                .append(createTableContent('status', c24, false, d))
                .append(createTableContent('ship_inst_number', c25, false, d))
                .append(createTableBtns())
        0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p), cubic_weight_loaded();

        //=========== DETALLES CARGO
        $("#hidden_cargo_details tbody [data-id='"+ c2 +"']").remove(),
                n = $("#hidden_cargo_details");
                t = n.find("tbody");
                var tr=  $("#warehouse_cargo_details tbody tr"),
                tr_1= $("#hidden_cargo_details tbody tr"),
                r_1= tr.length;
                for( a =0; a< r_1 ; a++) {
                    d =tr_1.length + 1;
                    var p_1 = $("<tr data-id=" + c2 + ">");
                    p_1.append(createTableContent('cargo_id',(c1 == 0? r : c1), true, d))
                            .append(createTableContent('details_line', tr[a].childNodes[0].textContent, true, d))
                            .append(createTableContent('details_quantity', tr[a].childNodes[1].textContent, true, d))
                            .append(createTableContent('details_type_id', tr[a].childNodes[2].textContent, false, d))
                            .append(createTableContent('details_cargo_type_code', tr[a].childNodes[3].textContent, true, d))
                            .append(createTableContent('details_pieces', tr[a].childNodes[4].textContent, false, d))
                            .append(createTableContent('details_unit', tr[a].childNodes[5].textContent, true, d))
                            .append(createTableContent('details_metric_unit', tr[a].childNodes[6].textContent, false, d))
                            .append(createTableContent('details_length', tr[a].childNodes[7].textContent, false, d))
                            .append(createTableContent('details_width', tr[a].childNodes[8].textContent, false, d))
                            .append(createTableContent('details_height', tr[a].childNodes[9].textContent, false, d))
                            .append(createTableContent('details_total_weight', tr[a].childNodes[10].textContent, true, d))
                            .append(createTableContent('details_total_cubic', tr[a].childNodes[11].textContent, false, d))
                            .append(createTableContent('details_vol_weight', tr[a].childNodes[12].textContent, false, d))
                            .append(createTableContent('details_location_id', tr[a].childNodes[13].textContent, false, d))
                            .append(createTableContent('details_location_name', tr[a].childNodes[14].textContent, false, d))
                            .append(createTableContent('details_location_bin_id', tr[a].childNodes[15].textContent, false, d))
                            .append(createTableContent('details_location_bin_name', tr[a].childNodes[16].textContent, false, d))
                            .append(createTableContent('details_material', tr[a].childNodes[17].textContent, false, d))
                            .append(createTableContent('details_dim_fact', tr[a].childNodes[18].textContent, true, d))
                            .append(createTableContent('details_square_foot', tr[a].childNodes[19].textContent, true, d))
                            .append(createTableContent('details_unit_weight', tr[a].childNodes[20].textContent, true, d))
                            .append(createTableContent('details_tare_weight', tr[a].childNodes[21].textContent, true, d))
                            .append(createTableContent('details_net_weight',  tr[a].childNodes[22].textContent, true, d))
                           t.append(p_1);
                }
                cleanModalFields("Cargo_Details"), clearTable("warehouse_cargo_details"), $("#warehouse_number").focus();
    }),
    $("#cargo_details").on("click", "a.btn-danger", function() {
        var whr_number = $(this).closest('tr');
        $("#hidden_cargo_details tbody [data-id='"+ whr_number[0].childNodes[1].textContent +"']").remove(),
        $(this).closest("tr").remove(),
        cubic_weight_loaded();

    }), $("#cargo_details").on("click", "a.btn-default", function() {
        clearTable("warehouse_cargo_details");
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
                c25 = t[0].childNodes[24].textContent;

        $("#cargo_line").val(c1),
        $("#warehouse_number").val(c2),
        $("#warehouse_date_in").val(c3),
        $("#warehouse_shipper_id").val(c4),
        $("#warehouse_shipper_name").val(c5),
        $("#warehouse_shipper_city").val(c6),
        $("#warehouse_shipper_state_id").val(c7),
        $("#warehouse_shipper_state_name").val(c8),
        $("#warehouse_shipper_zip_code_id").val(c9),
        $("#warehouse_shipper_zip_code_code").val(c10),
        $("#warehouse_shipper_phone").val(c11),
        $("#warehouse_shipper_fax").val(c12),
        $("#warehouse_consignee_id").val(c13),
        $("#warehouse_consignee_name").val(c14),
        $("#warehouse_consignee_city").val(c15),
        $("#warehouse_consignee_state_id").val(c16),
        $("#warehouse_consignee_state_name").val(c17),
        $("#warehouse_consignee_zip_code_id").val(c18),
        $("#warehouse_consignee_zip_code_code").val(c19),
        $("#warehouse_consignee_phone").val(c20),
        $("#warehouse_consignee_fax").val(c21),
        $("#box_number").val(c22),
        $("#loaded_position").val(c23),
        $("#warehouse_status").val(c24).change(),
        $("#ship_inst_number").val(c25),
        $("#Cargo_Details").modal("show")

        //WAREHOUSE CARGO DETAILS
        //======================================================

        var r= $("#hidden_cargo_details tbody [data-id='"+ c2 +"']").length,
                t_hidden= $("#hidden_cargo_details tbody [data-id='"+ c2 +"']"),
                t1= $("#warehouse_cargo_details tbody tr"),
                n= $("#warehouse_cargo_details");
                t = n.find("tbody");
        for (var a=0; a< r; a++){
            var d =t1.length + 1,
            p1 = $("<tr data-id=" + c2 + ">");
            p1.append(createTableContent('cargo_line', d, true, d))
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
                    .append(createTableBtns())
            t.append(p1);
        }
        //======================================================

    });

    $("#cargo_details_save").click(function() {
        var t = $("#warehouse_cargo_details tbody tr").length + 1,
                _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                c1 = $("#cargo_line").val(),
                z = (c1 == 0? _ : c1)-1,
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
                C = $("<tr id=" + (c1 == 0? _ : c1)+ ">");
        C.append(createTableContent('cargo_line',(c1 == 0? _ : c1), true, z))
                .append(createTableContent('cargo_quantity', c2, false, z))
                .append(createTableContent('cargo_type_id', c3, true, z))
                .append(createTableContent('cargo_type_code', c4, false, z))
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
                .append(createTableBtns()), 0 == c1 ? x.append(C) : x.find("tr#" + t).replaceWith(C), calculate_warehouse(), cleanModalFields('Warehouse_Details'), $("#cargo_quantity").val(1), $("#cargo_quantity").focus()
    }), $("#warehouse_cargo_details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove()
    }), $("#warehouse_cargo_details").on("click", "a.btn-default", function() {
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

                        $("#cargo_line").val(c1),
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
                        calculate_warehouse(), $("#Warehouse_Details").modal("show")
    });

    $("#container-save").click(function(){
        var r= $("#container_details tbody tr").length + 1,
                _ =  ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                c1=$("#container_id").val(),
                d= (c1 == 0? _ : c1)-1,
                c2= $("#equipment_type_id").val(),
                c3= $("#equipment_type_code").val(),
                c4= $("#container_number").val(),
                c5= $("#container_seal_number1").val(),
                c6= $("#container_seal_number2").val(),
                c7= $("#container_order_number").val(),
                c8= $("#hazardous_contact").val(),
                c9= $("#hazardous_phone").val(),
                c10= $("#hazardous_degrees").val(),
                c11= $("#hazardous_max").val(),
                c12= $("#hazardous_min").val(),
                c13= $("#hazardous_temperature").val(),
                c14= $("#comments_instructions").val(),
                c15= $("#cubic_max").val(),
                c16= $("#cubic_load").val(),
                c17= $("#cubic_load_p").val(),
                c18= $("#cubic_excess").val(),
                c19= $("#pieces_loaded").val(),
                c20= $("#container_weight_unit").val(),
                c21= $("#max_weight").val(),
                c22= $("#weight_load").val(),
                c23= $("#weight_load_p").val(),
                c24= $("#weight_excess").val(),

                n = $("#container_details"),
                t= n.find("tbody"),
                p = $("<tr id="+ (c1 == 0? _ : c1) +" >");
        p.append(createTableContent('container_line', (c1 == 0? _ : c1), true, d))
                .append(createTableContent('equipment_type_id', c2, true, d))
                .append(createTableContent('equipment_type_code', c3, false, d))
                .append(createTableContent('container_number', c4, false, d))
                .append(createTableContent('container_seal_number', c5, false, d))
                .append(createTableContent('container_seal_number2', c6, true, d))
                .append(createTableContent('container_order_number',c7, false, d))
                .append(createTableContent('container_hazardous_contact', c8, true, d))
                .append(createTableContent('container_hazardous_phone',c9, true, d))
                .append(createTableContent('hazardous_degrees', c10, true, d))
                .append(createTableContent('hazardous_max',c11, true, d))
                .append(createTableContent('hazardous_min',c12, true, d))
                .append(createTableContent('hazardous_temperature',c13, true, d))
                .append(createTableContent('comments_instructions', c14, true, d))
                .append(createTableContent('cubic_max', c15, false, d))
                .append(createTableContent('cubic_load', c16, false, d))
                .append(createTableContent('cubic_load_p', c17, true, d))
                .append(createTableContent('cubic_excess', c18, true, d))
                .append(createTableContent('pieces_loaded', c19, true, d))
                .append(createTableContent('total_weight_unit',c20, true, d))
                .append(createTableContent('max_weight', c21, false, d))
                .append(createTableContent('weight_load', c22, false, d))
                .append(createTableContent('weight_load_p', c23, true, d))
                .append(createTableContent('weight_excess', c24, true, d))
                .append(createTableBtns()),0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p);

        //=========== DETALLES warehouse
        var id_row = (0 == c1 ? r : c1);
        $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
        n = $("#hidden_warehouse"),
                t = n.find("tbody");
        var tr=  $("#cargo_details tbody tr"),
                tr_1= $("#hidden_warehouse tbody tr");
        var  r_1= tr.length;
        d =tr_1.length + 1;
        for(var a =0; a< r_1 ; a++) {
            var p_1 = $("<tr data-id=" + id_row + ">");
            p_1.append(createTableContent('hidden_container_id', id_row, true, d))
                    .append(createTableContent('hidden_warehouse_line', tr[a].childNodes[0].textContent, true, d))
                    .append(createTableContent('hidden_warehouse_number', tr[a].childNodes[1].textContent, false, d))
                    .append(createTableContent('hidden_date_in', tr[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('hidden_shipper_id', tr[a].childNodes[3].textContent, true, d))
                    .append(createTableContent('hidden_shipper_name', tr[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('hidden_shipper_city', tr[a].childNodes[5].textContent, true, d))
                    .append(createTableContent('hidden_shipper_state_id',tr[a].childNodes[6].textContent, true, d))
                    .append(createTableContent('hidden_shipper_state_name', tr[a].childNodes[7].textContent, true, d))
                    .append(createTableContent('hidden_shipper_zip_code_id',tr[a].childNodes[8].textContent, true, d))
                    .append(createTableContent('hidden_shipper_zip_code_code', tr[a].childNodes[9].textContent, true, d))
                    .append(createTableContent('hidden_shipper_phone',tr[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('hidden_shipper_fax', tr[a].childNodes[11].textContent, true, d))
                    .append(createTableContent('hidden_consignee_id', tr[a].childNodes[12].textContent, true, d))
                    .append(createTableContent('hidden_consignee_name', tr[a].childNodes[13].textContent, false, d))
                    .append(createTableContent('hidden_consignee_city', tr[a].childNodes[14].textContent, true, d))
                    .append(createTableContent('hidden_consignee_state_id', tr[a].childNodes[15].textContent, true, d))
                    .append(createTableContent('hidden_consignee_state_name', tr[a].childNodes[16].textContent, true, d))
                    .append(createTableContent('hidden_consignee_zip_code_id',tr[a].childNodes[17].textContent, true, d))
                    .append(createTableContent('hidden_consignee_zip_code_code', tr[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('hidden_consignee_phone', tr[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('hidden_consignee_fax', tr[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('hidden_box_number', tr[a].childNodes[21].textContent, false, d))
                    .append(createTableContent('hidden_destination_name', tr[a].childNodes[22].textContent, false, d))
                    .append(createTableContent('hidden_status', tr[a].childNodes[23].textContent, false, d))
                    .append(createTableContent('hidden_ship_inst_number', tr[a].childNodes[24].textContent, false, d))
            t.append(p_1);
            d+=1;
        }

            // HAZARDOUS DETAILS
                $("#hidden_hazardous tbody [data-id='" + id_row + "']").remove();
                n = $("#hidden_hazardous");
                        t = n.find("tbody");
                tr=  $("#hazardous_details tbody tr");
                        tr_1= $("#hidden_hazardous tbody tr");
                r_1= tr.length;
                d =tr_1.length + 1;
                for(a =0; a< r_1 ; a++) {
                     p_1 = $("<tr data-id=" + id_row + ">");
                    p_1.append(createTableContent('hzd_container_id', id_row, true, d))
                            .append(createTableContent('hzd_uns_id', tr[a].childNodes[0].textContent, false, d))
                            .append(createTableContent('hzd_line', tr[a].childNodes[1].textContent, true, d))
                            .append(createTableContent('hzd_uns_code', tr[a].childNodes[2].textContent, false, d))
                            .append(createTableContent('hzd_uns_desc', tr[a].childNodes[3].textContent, false, d))
                            .append(createTableContent('hzd_uns_note', tr[a].childNodes[4].textContent, false, d))
                    t.append(p_1);
                    d+=1;
                }
        cleanModalFields("Container_Details"), clearTable("cargo_details"), $("#equipment_type_code").focus();
        //======================================
    }),
            $("#container_details").on("click", "a.btn-danger", function() {
                var id_row = $(this).closest('tr').attr('id');
                var x = $("#hidden_warehouse tbody [data-id= '"+ id_row +"']")[0].childNodes[2].textContent;
                $("#hidden_cargo_details tbody [data-id='" + x + "']").remove();
               $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
               $(this).closest("tr").remove()
            }), $("#container_details").on("click", "a.btn-default", function() {
        clearTable("cargo_details");
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
                c24 = t[0].childNodes[23].textContent;

                $("#container_id").val(c1),
                        $("#equipment_type_id").val(c2),
                        $("#equipment_type_code").val(c3),
                        $("#container_number").val(c4),
                        $("#container_seal_number1").val(c5),
                        $("#container_seal_number2").val(c6),
                        $("#container_order_number").val(c7),
                        $("#hazardous_contact").val(c8),
                        $("#hazardous_phone").val(c9),
                        $("#hazardous_degrees").val(c10),
                        $("#hazardous_max").val(c11),
                        $("#hazardous_min").val(c12),
                        $("#hazardous_temperature").val(c13),
                        $("#comments_instructions").val(c14),
                        $("#cubic_max").val(c15),
                        $("#cubic_load").val(c16),
                        $("#cubic_load_p").val(c17),
                        $("#cubic_excess").val(c18),
                        $("#pieces_loaded").val(c19),
                        $("#container_weight_unit").val(c20),
                        $("#max_weight").val(c21),
                        $("#weight_load").val(c22),
                        $("#weight_load_p").val(c23),
                        $("#weight_excess").val(c24), calculate_warehouse(), $("#Container_Details").modal("show")

        //WAREHOUSE CARGO DETAILS
        //======================================================

        var r= $("#hidden_warehouse tbody [data-id='"+ c1 +"']").length,
                t_hidden= $("#hidden_warehouse tbody [data-id='"+ c1 +"']"),
                t1= $("#cargo_details tbody tr"),
                n= $("#cargo_details");
        t = n.find("tbody");
        for (var a=0; a< r; a++) {
            var d = t1.length + 1,
                    p = $("<tr id="+ c1 +" >");
                    p.append(createTableContent('cargo_id', d, true, d))
                    .append(createTableContent('warehouse_number', t_hidden[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('date_in', t_hidden[a].childNodes[3].textContent, false, d))
                    .append(createTableContent('shipper_id', t_hidden[a].childNodes[4].textContent, true, d))
                    .append(createTableContent('shipper_name', t_hidden[a].childNodes[5].textContent, false, d))
                    .append(createTableContent('shipper_city', t_hidden[a].childNodes[6].textContent, true, d))
                    .append(createTableContent('shipper_state_id',t_hidden[a].childNodes[7].textContent, true, d))
                    .append(createTableContent('shipper_state_name', t_hidden[a].childNodes[8].textContent, true, d))
                    .append(createTableContent('shipper_zip_code_id',t_hidden[a].childNodes[9].textContent, true, d))
                    .append(createTableContent('shipper_zip_code_code', t_hidden[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('shipper_phone',t_hidden[a].childNodes[11].textContent, true, d))
                    .append(createTableContent('shipper_fax', t_hidden[a].childNodes[12].textContent, true, d))
                    .append(createTableContent('consignee_id', t_hidden[a].childNodes[13].textContent, true, d))
                    .append(createTableContent('consignee_name', t_hidden[a].childNodes[14].textContent, false, d))
                    .append(createTableContent('consignee_city', t_hidden[a].childNodes[15].textContent, true, d))
                    .append(createTableContent('consignee_state_id', t_hidden[a].childNodes[16].textContent, true, d))
                    .append(createTableContent('consignee_state_name', t_hidden[a].childNodes[17].textContent, true, d))
                    .append(createTableContent('consignee_zip_code_id',t_hidden[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('consignee_zip_code_code', t_hidden[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('consignee_phone', t_hidden[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('consignee_fax', t_hidden[a].childNodes[21].textContent, true, d))
                    .append(createTableContent('box_number', t_hidden[a].childNodes[22].textContent, false, d))
                    .append(createTableContent('destination_name', t_hidden[a].childNodes[23].textContent, false, d))
                    .append(createTableContent('status', t_hidden[a].childNodes[24].textContent, false, d))
                    .append(createTableContent('ship_inst_number', t_hidden[a].childNodes[25].textContent, false, d))
                    .append(createTableBtns())
            t.append(p);
        }
         //=============== HAZARDOUS DETAILS ==================
         r= $("#hidden_hazardous tbody [data-id='"+ c1 +"']").length;
                t_hidden= $("#hidden_hazardous tbody [data-id='"+ c1 +"']");
                t1= $("#hazardous_details tbody tr");
                n= $("#hazardous_details");
        t = n.find("tbody");
        for (a=0; a< r; a++) {
            d = t1.length + 1,
                    p = $("<tr id=" + c1 + " >");
            p.append(createTableContent('hazardous_uns_id', t_hidden[a].childNodes[1].textContent, true, d))
                    .append(createTableContent('hazardous_uns_line', d, true, d))
                    .append(createTableContent('hazardous_uns_code', t_hidden[a].childNodes[3].textContent, false, d))
                    .append(createTableContent('hazardous_uns_desc', t_hidden[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('hazardous_uns_note', t_hidden[a].childNodes[5].textContent, true, d))
            t.append(p);
        }
         //=======================================================
    });




</script>