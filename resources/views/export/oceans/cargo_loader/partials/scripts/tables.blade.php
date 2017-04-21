<script type="text/javascript">
    function validateRequiredField(){
        if($("#hidden_warehouse tbody tr").length <= 0){
            swal({   title: "Error!",   text: "There are not Warehouse linked.",   type: "warning",   confirmButtonText: "Ok" });
        }else{
            $("#CreateHouse").modal("show");
        }
    }
    $("#btn_container_details").click(function() {
        clearTableCondition("hazardous_details");
        $("#container_spotting_date").val($("#loading_date").val());
        $("#pd_status").val("1").change();
        $("#equipment_type_id").val($("#tmp_equipment_type_id").val()).change();
        $("#container_pickup_type").val("02").change();
        $("#container_delivery_type").val("02").change();
        $("#container_drop_type").val("02").change();
        $("#total_weight_unit").val("L").change();
        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                n = e.indexOf("display: block;"),
                o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
        $("#ContainerModal").formValidation('resetForm', true);
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
        $("#autocheck").prop('checked', true);
        $("#pick_search_type").val("1").change();
        for (var t = $("#load-warehouse-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#btn_create_hbl_1").click(function() {
        clearTableCondition('load_warehouses');

        var t = $("#hidden_warehouse tbody tr"),
                _ =  ($("#load_warehouses tbody tr").length == 0 ? 1 : parseInt($("#load_warehouses tbody tr")[$("#load_warehouses tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                b= $("#load_warehouses"),
                x = b.find("tbody");
        for (var a =0; a < t.length; a++){
            if( $("#hidden_warehouse tbody tr td").find("input[id='hidden_flag["+ (a + 1) +"]']").val() ==0){

                var C = $("<tr id=" + _ + ">");
                C.append(createTableContent('cargo_line', _, true, _))
                        .append("<td><input type='checkbox' name='warehouse_select[]' id='warehouse_select' value='" + t[a].childNodes[35].textContent+ "'></td>")
                        .append(createTableContent('hbl_warehouse_number', t[a].childNodes[2].textContent, false, _))
                        .append(createTableContent('hbl_date_in', t[a].childNodes[3].textContent, false, _))
                        .append(createTableContent('hbl_shipper', t[a].childNodes[5].textContent, false, _))
                        .append(createTableContent('hbl_consignee', t[a].childNodes[15].textContent, false, _))
                        .append(createTableContent('hbl_container_number', t[a].childNodes[38].textContent, false, _));
                x.append(C)
            }
        }
    });

    $("#createHouse_save_1").click(function() {
        var t = $("#hidden_warehouse tbody tr"),
                container= $("#container_details tbody tr"),description="",warehouses="",
                _ = ($("#hbl_details tbody tr").length == 0 ? 1 : parseInt($("#hbl_details tbody tr")[$("#hbl_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                whr_select = new Array(), c=0, n= $("#hbl_details"), x= n.find("tbody"), wr_number="",
                marks= "", pieces=0, g_weight=0, cubic=0, container_id=0, equipment_type_code, container_number, container_seal_number;
        $("input[name='warehouse_select[]']:checked").each(function () {
            whr_select.push($(this).val());
        });
        for(var a =0; a < t.length ; a++){
            c=0;

            while(c < whr_select.length){
                if(t[a].childNodes[35].textContent == whr_select[c] ){
                    description= t[a].childNodes[37].textContent + "\n";
                    warehouses= warehouses + "\n"+ t[a].childNodes[2].textContent ;
                    pieces= parseInt( t[a].childNodes[28].textContent) + pieces;
                    g_weight= parseFloat(t[a].childNodes[29].textContent) + g_weight;
                    cubic= parseFloat(t[a].childNodes[30].textContent) + cubic;
                    marks= t[a].childNodes[38].textContent + "\n" + t[a].childNodes[39].textContent + "\n" + t[a].childNodes[40].textContent;
                  //  marks= marks + "Seal #: " + t[a].childNodes[39].textContent + "\n";
                    container_id= t[a].childNodes[0].textContent;
                    $("#hidden_warehouse tbody tr td").find("input[id='hidden_flag["+ (a + 1) +"]']").val(_);
                    //$("#hidden_warehouse tbody tr td").find("input[id='hidden_group_by["+ (a + 1) +"]']").val(_);
                }
                c++;
            }
        }
        var C = $("<tr id=" + _ + ">");
        C.append(createTableContent('resume_line', _ , true, _))
                .append(createTableContent('resume_marks',  marks ,  false, _))
                .append(createTableContent('resume_pieces',pieces , false, _ ))
                .append(createTableContent('resume_description', description + "  "+ warehouses , false, _ ))
                .append(createTableContent('resume_weight_unit', "L", false, _ ))
                .append(createTableContent('resume_gross_weight', g_weight , false, _ ))
                .append(createTableContent('resume_cubic', cubic , false, _ ))
                .append(createTableContent('resume_charge_weight', g_weight, false, _ ))
                .append(createTableContent('inserted_id', 0, true, _ ))
                .append(createTableBtns());
        x.append(C);
$("#CreateHouse").modal("hide");
    });
    $("#cargo-save").click(function(){
        var r = ($('#hbl_details tbody tr').length + 1),
            _ =  ($("#hbl_details tbody tr").length == 0 ? 1 : parseInt($("#hbl_details tbody tr")[$("#hbl_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            c1= $("#cargo_id").val(),
            c2= $("#cargo_marks").val(),
            c3= $("#cargo_pcs").val(),
            c4= $("#cargo_description").val(),
            c5= $("#cargo_weight_unit").val(),
            c6= $("#cargo_weight_l").val(),
            c7= $("#cargo_cubic_l").val(),
            c8= $("#cargo_charge_weight_l").val(),
            c = (0 == c1 ? _ : c1)-1,
            n = $("#hbl_details"),
            t = n.find("tbody"),
            p = $("<tr id=" + (0==c1? _ : c1) + ">");
        p.append(createTableContent('resume_line', c1 , true, _))
            .append(createTableContent('resume_marks',  c2 ,  false, _))
            .append(createTableContent('resume_pieces',c3, false, _ ))
            .append(createTableContent('resume_description', c4, false, _ ))
            .append(createTableContent('resume_weight_unit', c5, false, _ ))
            .append(createTableContent('resume_gross_weight', c6, false, _ ))
            .append(createTableContent('resume_cubic', c7 , false, _ ))
            .append(createTableContent('resume_charge_weight',c8, false, _ ))
            .append(createTableContent('inserted_id', 0, true, _ ))
            .append(createTableBtns()), 0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p), cleanModalFields('HBL_Cargo'), $("#cargo_marks").focus()
    });
    $("#hbl_details").on("click", "a.btn-danger", function() {
        preventDelete($(this))
    }), $("#hbl_details").on("click", "a.btn-default", function() {
        removeEmptyNodes("hbl_details");
        var t = $(this).closest("tr"),
                c1 = t[0].childNodes[0].textContent,
                c2 = t[0].childNodes[1].textContent,
                c3 = t[0].childNodes[2].textContent,
                c4 = t[0].childNodes[3].textContent,
                c5 = t[0].childNodes[4].textContent,
                c6 = t[0].childNodes[5].textContent,
                c7 = t[0].childNodes[6].textContent,
                c8 = t[0].childNodes[7].textContent;

        $("#cargo_id").val(c1);
        $("#cargo_marks").val(c2);
        $("#cargo_pcs").val(c3);
        $("#cargo_description").val(c4);
        $("#cargo_weight_unit").val(c5).change();
        $("#cargo_weight_l").val(c6);
        $("#cargo_cubic_l").val(c7);
        $("#cargo_charge_weight_l").val(c8);
        $("#cargo_weight_k").val( $("#cargo_weight_l").val() * 0.453592);
        $("#cargo_charge_weight_k").val( $("#cargo_weight_l").val() * 0.453592);
        $("#cargo_cubic_k").val( $("#cargo_cubic_l").val() * 0.028316);
        $("#HBL_Cargo").modal("show")
    });



    $("#uns-save").click(function() {
        if($("#hazardous_uns_code").val()== ''){
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
            p.append(createTableContent('hazardous_uns_id', a, true, c))
                    .append(createTableContent('hazardous_uns_line', (0 == l ? r : l), true, c))
                    .append(createTableContent('hazardous_uns_code', d, false, c))
                    .append(createTableContent('hazardous_uns_desc', s, false, c))
                    .append(createTableContent('hazardous_uns_note', e, true, c))
                    .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNs_Details'), $("#hazardous_uns_code").focus()
        }
    }),  $("#hazardous_details").on("click", "a.btn-danger", function() {
        preventDelete($(this));
    }), $("#hazardous_details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                c1 = t[0].childNodes[0].textContent,
                c2 = t[0].childNodes[1].textContent,
                c3 = t[0].childNodes[2].textContent,
                c4 = t[0].childNodes[3].textContent,
                c5 = t[0].childNodes[4].textContent;

        $("#hazardous_uns_line").val(c2);
        $("#hazardous_uns_id").val(c1);
        $("#hazardous_uns_code").val(c3);
        $("#hazardous_uns_desc").val(c4);
        $("#hazardous_uns_note").val(c5); $("#UNs_Details").modal("show");
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
                c6= $("#warehouse_shipper_address").val(),
                c7= $("#warehouse_shipper_city").val(),
                c8= $("#warehouse_shipper_state_id").val(),
                c9= $("#warehouse_shipper_state_name").val(),
                c10= $("#warehouse_shipper_zip_code_id").val(),
                c11= $("#warehouse_shipper_zip_code_code").val(),
                c12= $("#warehouse_shipper_phone").val(),
                c13= $("#warehouse_shipper_fax").val(),
                c14= $("#warehouse_consignee_id").val(),
                c15= $("#warehouse_consignee_name").val(),
                c16= $("#warehouse_consignee_address").val(),
                c17= $("#warehouse_consignee_city").val(),
                c18= $("#warehouse_consignee_state_id").val(),
                c19= $("#warehouse_consignee_state_name").val(),
                c20= $("#warehouse_consignee_zip_code_id").val(),
                c21= $("#warehouse_consignee_zip_code_code").val(),
                c22= $("#warehouse_consignee_phone").val(),
                c23= $("#warehouse_consignee_fax").val(),
                c24= $("#box_number").val(),
                c25= $("#loaded_position").val(),
                c26= $("#warehouse_status").val(),
                c27= $("#ship_inst_number").val(),
                c28= $("#bldg_number").val(),

                c29= $("#sum_quantity").val(),
                c30= $("#sum_weight").val(),
                c31= $("#sum_cubic").val(),
                c32= $("#sum_volume_weight").val(),
                c33= $("#warehouse_id").val(),
                c34= $("#warehouse_code").val(),

                n = $("#cargo_details"),
                t= n.find("tbody"),
                        p = $("<tr id="+ (c1 == 0? _ : c1) +" >");
                p.append(createTableContent('warehouse_id', (c1 == 0? _ : c1), true, d))
                .append(createTableContent('warehouse_number', c2, false, d))
                .append(createTableContent('date_in', c3, false, d))
                .append(createTableContent('shipper_id', c4, true, d))
                .append(createTableContent('shipper_name', c5, false, d))
                .append(createTableContent('shipper_address', c6, true, d))
                .append(createTableContent('shipper_city', c7, true, d))
                .append(createTableContent('shipper_state_id',c8, true, d))
                .append(createTableContent('shipper_state_name', c9, true, d))
                .append(createTableContent('shipper_zip_code_id',c10, true, d))
                .append(createTableContent('shipper_zip_code_code', c11, true, d))
                .append(createTableContent('shipper_phone',c12, true, d))
                .append(createTableContent('shipper_fax', c13, true, d))
                .append(createTableContent('consignee_id', c14, true, d))
                .append(createTableContent('consignee_name', c15, false, d))
                .append(createTableContent('consignee_address', c16, true, d))
                .append(createTableContent('consignee_city', c17, true, d))
                .append(createTableContent('consignee_state_id', c18, true, d))
                .append(createTableContent('consignee_state_name', c19, true, d))
                .append(createTableContent('consignee_zip_code_id',c20, true, d))
                .append(createTableContent('consignee_zip_code_code', c21, true, d))
                .append(createTableContent('consignee_phone', c22, true, d))
                .append(createTableContent('consignee_fax', c23, true, d))
                .append(createTableContent('box_number', c24, true, d))
                .append(createTableContent('destination_name', c25, true, d))
                .append(createTableContent('status', c26, false, d))
                .append(createTableContent('ship_inst_number', c27, true, d))
                .append(createTableContent('bldg_number', c28, true, d))
                .append(createTableContent('sum_pieces', c29, true, d))
                .append(createTableContent('sum_weight', c30, true, d))
                .append(createTableContent('sum_cubic', c31, true, d))
                .append(createTableContent('sum_volume_weight', c32, true, d))
                .append(createTableContent('warehouse_id', c33, true, d))
                .append(createTableContent('warehouse_code', c34, true, d))
                .append(createTableBtns())
        0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p), cubic_weight_loaded();

        //=========== DETALLES CARGO
        $("#hidden_cargo_details tbody [data-id='"+ c2 +"']").remove(),
                n = $("#hidden_cargo_details");
                t = n.find("tbody");
                var tr=  $("#warehouse_cargo_details tbody tr"),
                tr_1= $("#hidden_cargo_details tbody tr"),
                r_1= tr.length;
                d =tr_1.length ;
                for( a =0; a< r_1 ; a++) {

                    var p_1 = $("<tr data-id=" + c2 + ">");
                    p_1.append(createTableContent('details_id',(c1 == 0? r : c1), true, d))
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
                            .append(createTableContent('details_net_weight',  tr[a].childNodes[22].textContent, true, d))
                            .append(createTableContent('inserted_id', '0', true, d))
                    t.append(p_1);
                    d++;
                }
                cleanModalFields("Cargo_Details"), clearTableCondition("warehouse_cargo_details"), $("#warehouse_number").focus();
    }),
    $("#cargo_details").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                var whr = td.closest('tr');
                $("#hidden_cargo_details tbody [data-id='"+ whr[0].childNodes[1].textContent +"']").remove();
                $("#hidden_warehouse").closest("tr").remove();
                td.closest("tr").remove();
                cubic_weight_loaded();
            }
        });

    }), $("#cargo_details").on("click", "a.btn-default", function() {
        clearTableCondition("warehouse_cargo_details");
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
                c34 = t[0].childNodes[33].textContent;

        $("#cargo_line").val(c1).attr("disabled", true),
        $("#warehouse_number").val(c2).attr("disabled", true),
        $("#warehouse_date_in").val(c3).attr("disabled", true),
        $("#warehouse_shipper_id").val(c4).attr("disabled", true),
        $("#warehouse_shipper_name").val(c5).attr("disabled", true),
        $("#warehouse_shipper_address").val(c6).attr("disabled", true),
        $("#warehouse_shipper_city").val(c7).attr("disabled", true),
        $("#warehouse_shipper_state_id").val(c8).attr("disabled", true),
        $("#warehouse_shipper_state_name").val(c9).attr("disabled", true),
        $("#warehouse_shipper_zip_code_id").val(c10).attr("disabled", true),
        $("#warehouse_shipper_zip_code_code").val(c11).attr("disabled", true),
        $("#warehouse_shipper_phone").val(c12).attr("disabled", true),
        $("#warehouse_shipper_fax").val(c13).attr("disabled", true),
        $("#warehouse_consignee_id").val(c14).attr("disabled", true),
        $("#warehouse_consignee_name").val(c15).attr("disabled", true),
        $("#warehouse_consignee_address").val(c16).attr("disabled", true),
        $("#warehouse_consignee_city").val(c17).attr("disabled", true),
        $("#warehouse_consignee_state_id").val(c18).attr("disabled", true),
        $("#warehouse_consignee_state_name").val(c19).attr("disabled", true),
        $("#warehouse_consignee_zip_code_id").val(c20).attr("disabled", true),
        $("#warehouse_consignee_zip_code_code").val(c21).attr("disabled", true),
        $("#warehouse_consignee_phone").val(c22).attr("disabled", true),
        $("#warehouse_consignee_fax").val(c23).attr("disabled", true),
        $("#box_number").val(c24).attr("disabled", true),
        $("#loaded_position").val(c25).attr("disabled", true),
                $("#warehouse_status").val(c26).attr("disabled", true),
                $("#ship_inst_number").val(c27).attr("disabled", true),
                $("#bldg_number").val(c28).attr("disabled", true),

                $("#sum_quantity").val(c29).attr("disabled", true),
                $("#sum_weight").val(c30).attr("disabled", true),
                $("#sum_cubic").val(c31).attr("disabled", true),
                $("#sum_volume_weight").val(c32).attr("disabled", true),
                $("#warehouse_id").val(c33).attr("disabled", true),
                $("#warehouse_code").val(c34).attr("disabled", true),cubic_weight_loaded(),
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
            p1 = $("<tr id=" + (d -1) + ">");
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

            t.append(p1);
        }
        //======================================================
        total_warehouse_cargo();

    });

    $("#cargo_details_save").click(function() {
        var t = $("#warehouse_cargo_details tbody tr").length + 1,
                _ =  ($("#warehouse_cargo_details tbody tr").length == 0 ? 1 : parseInt($("#warehouse_cargo_details tbody tr")[$("#warehouse_cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
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
                .append(createTableBtns()), 0 == c1 ? x.append(C) : x.find("tr#" + c1).replaceWith(C), calculate_warehouse(), total_warehouse_cargo(),cleanModalFields('Warehouse_Details'), $("#cargo_quantity").val(1), $("#cargo_quantity").focus()
    }), $("#warehouse_cargo_details").on("click", "a.btn-danger", function() {
        preventDelete($(this));
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
            var r = $("#container_details tbody tr").length + 1,
                _ = ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                c1 = $("#container_id").val(),
                d = (c1 == 0 ? _ : c1) - 1,
                c2 = $("#equipment_type_id").val(),
                c3 = $("#equipment_type_code").val(),
                c4 = $("#container_number").val(),
                c5 = $("#container_seal_number1").val(),
                c6 = $("#container_seal_number2").val(),
                c7 = $("#container_order_number").val(),

                c8 = $("#comments_instructions").val(),
                c9 = $("#cubic_max").val(),
                c10 = $("#cubic_load").val(),
                c11 = $("#cubic_load_p").val(),
                c12 = $("#cubic_excess").val(),
                c13 = $("#pieces_loaded").val(),
                c14 = $("#max_weight").val(),
                c15 = $("#weight_load").val(),
                c16 = $("#weight_load_p").val(),
                c17 = $("#weight_excess").val(),

                c19 = $("#container_commodity_name").val().toUpperCase(),
                c20 = $("#pd_status").val(),
                c21 = $("#container_spotting_date").val(),
                c22 = $("#container_pull_date").val(),

                c23 = $("#container_pickup_id").val(),
                c24 = $("#container_pickup_name").val().toUpperCase(),
                c25 = $("#container_pickup_type").val(),
                c26 = $("#container_pickup_address").val(),
                c27 = $("#container_pickup_city").val(),
                c28 = $("#container_pickup_state_id").val(),
                c29 = $("#container_pickup_state_name").val().toUpperCase(),
                c30 = $("#container_pickup_zip_code_id").val(),
                c31 = $("#container_pickup_zip_code_code").val().toUpperCase(),
                c32 = $("#container_pickup_phone").val(),
                c33 = $("#container_pickup_contact").val(),
                c34 = $("#container_pickup_date").val(),
                c35 = $("#container_pickup_number").val(),

                c36 = $("#container_delivery_id").val(),
                c37 = $("#container_delivery_name").val(),
                c38 = $("#container_delivery_type").val(),
                c39 = $("#container_delivery_address").val(),
                c40 = $("#container_delivery_city").val(),
                c41 = $("#container_delivery_state_id").val(),
                c42 = $("#container_delivery_state_name").val().toUpperCase(),
                c43 = $("#container_delivery_zip_code_id").val(),
                c44 = $("#container_delivery_zip_code_code").val().toUpperCase(),
                c45 = $("#container_delivery_phone").val(),
                c46 = $("#container_delivery_contact").val(),
                c47 = $("#container_delivery_date").val(),
                c48 = $("#container_delivery_number").val(),

                c49 = $("#container_drop_id").val(),
                c50 = $("#container_drop_name").val(),
                c51 = $("#container_drop_type").val(),
                c52 = $("#container_drop_address").val(),
                c53 = $("#container_drop_city").val(),
                c54 = $("#container_drop_state_id").val(),
                c55 = $("#container_drop_state_name").val().toUpperCase(),
                c56 = $("#container_drop_zip_code_id").val(),
                c57 = $("#container_drop_zip_code_code").val().toUpperCase(),
                c58 = $("#container_drop_phone").val(),
                c59 = $("#container_drop_contact").val(),
                c60 = $("#container_drop_date").val(),
                c61 = $("#container_drop_number").val(),

                c62 = $("#container_hazardous_contact").val(),
                c63 = $("#container_hazardous_phone").val(),
                c64 = $("#container_degrees").val(),
                c65 = $("#container_max").val(),
                c66 = $("#container_min").val(),
                c67 = $("#container_ventilation").val(),
                c68 = $("#container_temperature").val(),

                c69 = $("#container_inner_code").val().toUpperCase(),
                c70 = $("#container_inner_quantity").val(),
                c71 = $("#container_net_weight").val(),
                c72 = $("#container_number_equipment").val(),
                c73 = $("#container_outer_code").val().toUpperCase(),
                c74 = $("#container_outer_quantity").val(),
                c75 = $("#container_release_number").val(),
                c76 = $("#container_requested_equipment").val(),
                c77 = $("#container_tare_weight").val(),
                c78 = $("#total_weight_unit").val(),
                c79 = $("#container_carrier_id").val(),
                c80 = $("#container_carrier_name").val(),

                n = $("#container_details"),
                t = n.find("tbody"),
                details= c3 + " - " + c4 +" - "+ c5 + " - "+ c6,
                p = $("<tr id=" + (c1 == 0 ? _ : c1) + " >");
            $("#hidden_container_details").val(details);
            p.append(createTableContent('container_line', (c1 == 0 ? _ : c1), true, d))
                .append(createTableContent('equipment_type_id', c2, true, d))
                .append(createTableContent('equipment_type_code', c3, false, d))
                .append(createTableContent('container_number', c4, false, d))
                .append(createTableContent('container_seal_number', c5, false, d))
                .append(createTableContent('container_seal_number2', c6, true, d))
                .append(createTableContent('container_order_number', c7, false, d))

                .append(createTableContent('container_comments', c8, true, d))
                .append(createTableContent('cubic_max', c9, true, d))
                .append(createTableContent('cubic_load', c10, false, d))
                .append(createTableContent('cubic_load_p', c11, true, d))
                .append(createTableContent('cubic_excess', c12, true, d))
                .append(createTableContent('pieces_loaded', c13, true, d))

                .append(createTableContent('max_weight', c14, true, d))
                .append(createTableContent('weight_load', c15, false, d))
                .append(createTableContent('weight_load_p', c16, true, d))
                .append(createTableContent('weight_excess', c17, true, d))

                .append(createTableContent('container_commodity_id', c19, true, d))
                .append(createTableContent('container_commodity_name', c19, true, d))
                .append(createTableContent('pd_status', c20, true, d))
                .append(createTableContent('container_spotting_date', c21, true, d))
                .append(createTableContent('container_pull_date', c22, true, d))

                .append(createTableContent('container_pickup_id', c23, true, d))
                .append(createTableContent('container_pickup_name', c24, true, d))
                .append(createTableContent('container_pickup_type', c25, true, d))
                .append(createTableContent('container_pickup_address', c26, true, d))
                .append(createTableContent('container_pickup_city', c27, true, d))
                .append(createTableContent('container_pickup_state_id', c28, true, d))
                .append(createTableContent('container_pickup_state_name', c29, true, d))
                .append(createTableContent('container_pickup_zip_code_id', c30, true, d))
                .append(createTableContent('container_pickup_zip_code_code', c31, true, d))
                .append(createTableContent('container_pickup_phone', c32, true, d))
                .append(createTableContent('container_pickup_contact', c33, true, d))
                .append(createTableContent('container_pickup_date', c34, true, d))
                .append(createTableContent('container_pickup_number', c35, true, d))

                .append(createTableContent('container_delivery_id', c36, true, d))
                .append(createTableContent('container_delivery_name', c37, true, d))
                .append(createTableContent('container_delivery_type', c38, true, d))
                .append(createTableContent('container_delivery_address', c39, true, d))
                .append(createTableContent('container_delivery_city', c40, true, d))
                .append(createTableContent('container_delivery_state_id', c41, true, d))
                .append(createTableContent('container_delivery_state_name', c42, true, d))
                .append(createTableContent('container_delivery_zip_code_id', c43, true, d))
                .append(createTableContent('container_delivery_zip_code_code', c44, true, d))
                .append(createTableContent('container_delivery_phone', c45, true, d))
                .append(createTableContent('container_delivery_contact', c46, true, d))
                .append(createTableContent('container_delivery_date', c47, true, d))
                .append(createTableContent('container_delivery_number', c48, true, d))

                .append(createTableContent('container_drop_id', c49, true, d))
                .append(createTableContent('container_drop_name', c50, true, d))
                .append(createTableContent('container_drop_type', c51, true, d))
                .append(createTableContent('container_drop_address', c52, true, d))
                .append(createTableContent('container_drop_city', c53, true, d))
                .append(createTableContent('container_drop_state_id', c54, true, d))
                .append(createTableContent('container_drop_state_name', c55, true, d))
                .append(createTableContent('container_drop_zip_code_id', c56, true, d))
                .append(createTableContent('container_drop_zip_code_code', c57, true, d))
                .append(createTableContent('container_drop_phone', c58, true, d))
                .append(createTableContent('container_drop_contact', c59, true, d))
                .append(createTableContent('container_drop_date', c60, true, d))
                .append(createTableContent('container_drop_number', c61, true, d))

                .append(createTableContent('container_hazardous_contact', c62, true, d))
                .append(createTableContent('container_hazardous_phone', c63, true, d))
                .append(createTableContent('container_degrees', c64, true, d))
                .append(createTableContent('container_max', c65, true, d))
                .append(createTableContent('container_min', c66, true, d))
                .append(createTableContent('container_ventilation', c67, true, d))
                .append(createTableContent('container_temperature', c68, true, d))

                .append(createTableContent('container_inner_code', c69, true, d))
                .append(createTableContent('container_inner_quantity', c70, true, d))
                .append(createTableContent('container_net_weight', c71, true, d))
                .append(createTableContent('container_number_equipment', c72, true, d))
                .append(createTableContent('container_outer_code', c73, true, d))
                .append(createTableContent('container_outer_quantity', c74, true, d))
                .append(createTableContent('container_release_number', c75, true, d))
                .append(createTableContent('container_requested_equipment', c76, true, d))
                .append(createTableContent('container_tare_weight', c77, true, d))
                .append(createTableContent('total_weight_unit', c78, true, d))
                .append(createTableContent('container_carrier_id', c79, true, d))
                .append(createTableContent('container_carrier_name', c80, true, d))
                .append(createTableBtns()), 0 == c1 ? t.append(p) : t.find("tr#" + c1).replaceWith(p);

            //=========== DETALLES warehouse
            var id_row = (c1 == 0 ? _ : c1);
            $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
            n = $("#hidden_warehouse");
            t = n.find("tbody");
            var tr = $("#cargo_details tbody tr"),
                tr_1 = $("#hidden_warehouse tbody tr");
            var r_1 = tr.length;
            d = tr_1.length + 1;

            for (var a = 0; a < r_1; a++) {
                var p_1 = $("<tr data-id=" + id_row + ">");
                p_1.append(createTableContent('hidden_container_id', id_row, true, d))
                    .append(createTableContent('hidden_warehouse_line', tr[a].childNodes[34].textContent, true, d))
                    .append(createTableContent('hidden_warehouse_number', tr[a].childNodes[1].textContent, false, d))
                    .append(createTableContent('hidden_date_in', tr[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('hidden_shipper_id', tr[a].childNodes[3].textContent, true, d))
                    .append(createTableContent('hidden_shipper_name', tr[a].childNodes[4].textContent, false, d))
                    .append(createTableContent('hidden_shipper_address', tr[a].childNodes[5].textContent, true, d))
                    .append(createTableContent('hidden_shipper_city', tr[a].childNodes[6].textContent, true, d))
                    .append(createTableContent('hidden_shipper_state_id', tr[a].childNodes[7].textContent, true, d))
                    .append(createTableContent('hidden_shipper_state_name', tr[a].childNodes[8].textContent, true, d))
                    .append(createTableContent('hidden_shipper_zip_code_id', tr[a].childNodes[9].textContent, true, d))
                    .append(createTableContent('hidden_shipper_zip_code_code', tr[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('hidden_shipper_phone', tr[a].childNodes[11].textContent, true, d))
                    .append(createTableContent('hidden_shipper_fax', tr[a].childNodes[12].textContent, true, d))
                    .append(createTableContent('hidden_consignee_id', tr[a].childNodes[13].textContent, true, d))
                    .append(createTableContent('hidden_consignee_name', tr[a].childNodes[14].textContent, false, d))
                    .append(createTableContent('hidden_consignee_address', tr[a].childNodes[15].textContent, true, d))
                    .append(createTableContent('hidden_consignee_city', tr[a].childNodes[16].textContent, true, d))
                    .append(createTableContent('hidden_consignee_state_id', tr[a].childNodes[17].textContent, true, d))
                    .append(createTableContent('hidden_consignee_state_name', tr[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('hidden_consignee_zip_code_id', tr[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('hidden_consignee_zip_code_code', tr[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('hidden_consignee_phone', tr[a].childNodes[21].textContent, true, d))
                    .append(createTableContent('hidden_consignee_fax', tr[a].childNodes[22].textContent, true, d))
                    .append(createTableContent('hidden_box_number', tr[a].childNodes[23].textContent, false, d))
                    .append(createTableContent('hidden_destination_name', tr[a].childNodes[24].textContent, false, d))
                    .append(createTableContent('hidden_status', tr[a].childNodes[25].textContent, false, d))
                    .append(createTableContent('hidden_ship_inst_number', tr[a].childNodes[26].textContent, false, d))

                    .append(createTableContent('hidden_sum_pieces', tr[a].childNodes[27].textContent, true, d))
                    .append(createTableContent('hidden_sum_weight', tr[a].childNodes[28].textContent, true, d))
                    .append(createTableContent('hidden_sum_cubic', tr[a].childNodes[29].textContent, true, d))
                    .append(createTableContent('hidden_sum_volume_weight', tr[a].childNodes[30].textContent, true, d))

                    .append(createTableContent('hidden_warehouse_id', tr[a].childNodes[31].textContent, true, d))
                    .append(createTableContent('hidden_warehouse_code', tr[a].childNodes[32].textContent, true, d))
                    .append(createTableContent('hidden_flag', '0', true, d))
                    .append(createTableContent('hidden_receipt_entry', tr[a].childNodes[34].textContent, true, d));
                t.append(p_1);
                d += 1;
            }

            // HAZARDOUS DETAILS
            $("#hidden_hazardous tbody [data-id='" + id_row + "']").remove();
            n = $("#hidden_hazardous");
            t = n.find("tbody");
            tr = $("#hazardous_details tbody tr");
            tr_1 = $("#hidden_hazardous tbody tr");
            r_1 = tr.length;
            d = tr_1.length + 1;
            for (a = 0; a < r_1; a++) {
                p_1 = $("<tr data-id=" + id_row + ">");
                p_1.append(createTableContent('hzd_container_id', id_row, true, d))
                    .append(createTableContent('hzd_uns_id', tr[a].childNodes[0].textContent, false, d))
                    .append(createTableContent('hzd_line', tr[a].childNodes[1].textContent, true, d))
                    .append(createTableContent('hzd_uns_code', tr[a].childNodes[2].textContent, false, d))
                    .append(createTableContent('hzd_uns_desc', tr[a].childNodes[3].textContent, false, d))
                    .append(createTableContent('hzd_uns_note', tr[a].childNodes[4].textContent, false, d))
                t.append(p_1);
                d += 1;
            }
        calculate_totals(); cleanModalFields("Container_Details"), clearTableCondition("cargo_details"),clearTableCondition("hazardous_details"), $("#ContainerModal").formValidation('resetForm', true),    $("#container_spotting_date").val($("#loading_date").val()), $("#pd_status").val("1").change(), $("#equipment_type_id").val("").change(), $("#container_pickup_type").val("02").change(), $("#container_delivery_type").val("02").change(), $("#container_drop_type").val("02").change(),
            $("#total_weight_unit").val("L").change(), $("#container_degrees").val("F").change(), $("#container_ventilation").val("A").change(),$("#equipment_type_code").focus();

        //======================================
    }),
            $("#container_details").on("click", "a.btn-danger", function() {
                var td = $(this);
                preventDeleteCondition(td, function (td, eval) {
                    if (eval) {
                        var id_row = td.closest('tr').attr('id');
                        var x = $("#hidden_warehouse tbody [data-id= '"+ id_row +"']")[0].childNodes[2].textContent;
                        $("#hidden_cargo_details tbody [data-id='" + x + "']").remove();
                        $("#hidden_warehouse tbody [data-id='" + id_row + "']").remove();
                        td.closest('tr').remove();
                    }
                });
            }), $("#container_details").on("click", "a.btn-default", function() {
        clearTableCondition("cargo_details");
        clearTableCondition("hazardous_details");
        cubic_weight_loaded();
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
                c38 = t[0].childNodes[37].textContent,
                c39 = t[0].childNodes[38].textContent,
                c40 = t[0].childNodes[39].textContent,
                c41 = t[0].childNodes[40].textContent,
                c42 = t[0].childNodes[41].textContent,
                c43 = t[0].childNodes[42].textContent,
                c44 = t[0].childNodes[43].textContent,
                c45 = t[0].childNodes[44].textContent,
                c46 = t[0].childNodes[45].textContent,
                c47 = t[0].childNodes[46].textContent,
                c48 = t[0].childNodes[47].textContent,
                c49 = t[0].childNodes[48].textContent,
                c50 = t[0].childNodes[49].textContent,
                c51 = t[0].childNodes[50].textContent,
                c52 = t[0].childNodes[51].textContent,
                c53 = t[0].childNodes[52].textContent,
                c54 = t[0].childNodes[53].textContent,
                c55 = t[0].childNodes[54].textContent,
                c56 = t[0].childNodes[55].textContent,
                c57 = t[0].childNodes[56].textContent,
                c58 = t[0].childNodes[57].textContent,
                c59 = t[0].childNodes[58].textContent,
                c60 = t[0].childNodes[59].textContent,
                c61 = t[0].childNodes[60].textContent,
                c62 = t[0].childNodes[61].textContent,
                c63 = t[0].childNodes[62].textContent,
                c64 = t[0].childNodes[63].textContent,
                c65 = t[0].childNodes[64].textContent,
                c66 = t[0].childNodes[65].textContent,
                c67 = t[0].childNodes[66].textContent,
                c68 = t[0].childNodes[67].textContent,
                c69 = t[0].childNodes[68].textContent,
                c70 = t[0].childNodes[69].textContent,
                c71 = t[0].childNodes[70].textContent,
                c72 = t[0].childNodes[71].textContent,
                c73 = t[0].childNodes[72].textContent,
                c74 = t[0].childNodes[73].textContent,
                c75 = t[0].childNodes[74].textContent,
                c76 = t[0].childNodes[75].textContent,
                c77 = t[0].childNodes[76].textContent,
                c78 = t[0].childNodes[77].textContent,
                c79 = t[0].childNodes[78].textContent,
                c80 = t[0].childNodes[79].textContent;

                $("#container_id").val(c1),
                $("#equipment_type_id").val(c2).change(),
                $("#equipment_type_code").val(c3),
                $("#container_number").val(c4),
                $("#container_seal_number1").val(c5),
                $("#container_seal_number2").val(c6),
                $("#container_order_number").val(c7),

                $("#comments_instructions").val(c8),
                $("#cubic_max").val(c9),
                $("#cubic_load").val(c10),
                $("#cubic_load_p").val(c11),
                $("#cubic_excess").val(c12),
                $("#pieces_loaded").val(c13),
                $("#max_weight").val(c14),
                $("#weight_load").val(c15),
                $("#weight_load_p").val(c16),
                $("#weight_excess").val(c17),

                $("#container_commodity_id").val(c19),
                $("#container_commodity_name").val(c19),
                $("#pd_status").val(c20).change(),
                ((c21 == ''  || c21 == "0000-00-00") ? $("#container_spotting_date").val($("#loading_date").val()) :$("#container_spotting_date").val(c21)),
                $("#container_pull_date").val(c22),
                $("#container_pickup_type").val(c25).change(),
                $("#container_pickup_id").val(c23),
                $("#container_pickup_name").val(c24),

                $("#container_pickup_address").val(c26),
                $("#container_pickup_city").val(c27),
                $("#container_pickup_state_id").val(c28),
                $("#container_pickup_state_name").val(c29),
                $("#container_pickup_zip_code_id").val(c30),
                $("#container_pickup_zip_code_code").val(c31),
                $("#container_pickup_phone").val(c32),
                $("#container_pickup_contact").val(c33),
                $("#container_pickup_date").val(c34),
                $("#container_pickup_number").val(c35),

                $("#container_delivery_type").val(c38).change(),
                $("#container_delivery_id").val(c36),
                $("#container_delivery_name").val(c37),

                $("#container_delivery_address").val(c39),
                $("#container_delivery_city").val(c40),
                $("#container_delivery_state_id").val(c41),
                $("#container_delivery_state_name").val(c42),
                $("#container_delivery_zip_code_id").val(c43),
                $("#container_delivery_zip_code_code").val(c44),
                $("#container_delivery_phone").val(c45),
                $("#container_delivery_contact").val(c46),
                $("#container_delivery_date").val(c47),
                $("#container_delivery_number").val(c48),

                $("#container_drop_type").val(c51).change(),
                $("#container_drop_id").val(c49),
                $("#container_drop_name").val(c50),

                $("#container_drop_address").val(c52),
                $("#container_drop_city").val(c53),
                $("#container_drop_state_id").val(c54),
                $("#container_drop_state_name").val(c55),
                $("#container_drop_zip_code_id").val(c56),
                $("#container_drop_zip_code_code").val(c57),
                $("#container_drop_phone").val(c58),
                $("#container_drop_contact").val(c59),
                $("#container_drop_date").val(c60),
                $("#container_drop_number").val(c61),

                $("#container_hazardous_contact").val(c62),
                $("#container_hazardous_phone").val(c63),
                $("#container_degrees").val(c64),
                $("#container_max").val(c65),
                $("#container_min").val(c66),
                $("#container_ventilation").val(c67),
                $("#container_temperature").val(c68),

                $("#container_inner_code").val(c69),
                $("#container_inner_quantity").val(c70),
                $("#container_net_weight").val(c71),
                $("#container_number_equipment").val(c72),
                $("#container_outer_code").val(c73),
                $("#container_outer_quantity").val(c74),
                $("#container_release_number").val(c75),
                $("#container_requested_equipment").val(c76),
                $("#container_tare_weight").val(c77),
                $("#total_weight_unit").val(c78),
                $("#container_carrier_id").val(c79),
                $("#container_carrier_name").val(c80);
                calculate_warehouse();
                $("#Container_Details").modal("show");

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
                    .append(createTableContent('shipper_address', t_hidden[a].childNodes[6].textContent, true, d))
                    .append(createTableContent('shipper_city', t_hidden[a].childNodes[7].textContent, true, d))
                    .append(createTableContent('shipper_state_id',t_hidden[a].childNodes[8].textContent, true, d))
                    .append(createTableContent('shipper_state_name', t_hidden[a].childNodes[9].textContent, true, d))
                    .append(createTableContent('shipper_zip_code_id',t_hidden[a].childNodes[10].textContent, true, d))
                    .append(createTableContent('shipper_zip_code_code', t_hidden[a].childNodes[11].textContent, true, d))
                    .append(createTableContent('shipper_phone',t_hidden[a].childNodes[12].textContent, true, d))
                    .append(createTableContent('shipper_fax', t_hidden[a].childNodes[13].textContent, true, d))
                    .append(createTableContent('consignee_id', t_hidden[a].childNodes[14].textContent, true, d))
                    .append(createTableContent('consignee_name', t_hidden[a].childNodes[15].textContent, false, d))
                    .append(createTableContent('consignee_address', t_hidden[a].childNodes[16].textContent, true, d))
                    .append(createTableContent('consignee_city', t_hidden[a].childNodes[17].textContent, true, d))
                    .append(createTableContent('consignee_state_id', t_hidden[a].childNodes[18].textContent, true, d))
                    .append(createTableContent('consignee_state_name', t_hidden[a].childNodes[19].textContent, true, d))
                    .append(createTableContent('consignee_zip_code_id',t_hidden[a].childNodes[20].textContent, true, d))
                    .append(createTableContent('consignee_zip_code_code', t_hidden[a].childNodes[21].textContent, true, d))
                    .append(createTableContent('consignee_phone', t_hidden[a].childNodes[22].textContent, true, d))
                    .append(createTableContent('consignee_fax', t_hidden[a].childNodes[23].textContent, true, d))
                    .append(createTableContent('box_number', t_hidden[a].childNodes[24].textContent, true, d))
                    .append(createTableContent('destination_name', t_hidden[a].childNodes[25].textContent, true, d))
                    .append(createTableContent('status', t_hidden[a].childNodes[26].textContent, false, d))
                    .append(createTableContent('ship_inst_number', t_hidden[a].childNodes[27].textContent, true, d))

                            .append(createTableContent('sum_pieces', t_hidden[a].childNodes[28].textContent, false, d))
                            .append(createTableContent('sum_weight', t_hidden[a].childNodes[29].textContent, false, d))
                            .append(createTableContent('sum_cubic', t_hidden[a].childNodes[30].textContent, false, d))
                            .append(createTableContent('sum_volume_weight', t_hidden[a].childNodes[31].textContent, true, d))

                            .append(createTableContent('warehouse_id', t_hidden[a].childNodes[32].textContent, true, d))
                            .append(createTableContent('warehouse_code', t_hidden[a].childNodes[33].textContent, true, d))
                            .append(createTableContent('flag', t_hidden[a].childNodes[34].textContent, true, d))
                            .append(createTableContent('receipt_entry_id', t_hidden[a].childNodes[35].textContent, true, d))

                    .append(createTableBtns());
            t.append(p);
        }
         //=============== HAZARDOUS DETAILS ==================
         r= $("#hidden_hazardous tbody [data-id='"+ c1 +"']").length;
                t_hidden= $("#hidden_hazardous tbody [data-id='"+ c1 +"']");
                t1= $("#hazardous_details tbody tr");
                n= $("#hazardous_details");
        t = n.find("tbody");
        d = t1.length + 1;
        for (a=0; a< r; a++) {
                    p = $("<tr id=" + d + " >");
            p.append(createTableContent('hazardous_uns_id', t_hidden[a].childNodes[1].textContent, true, a))
                    .append(createTableContent('hazardous_uns_line', d, true, a))
                    .append(createTableContent('hazardous_uns_code', t_hidden[a].childNodes[3].textContent, false, a))
                    .append(createTableContent('hazardous_uns_desc', t_hidden[a].childNodes[4].textContent, false, a))
                    .append(createTableContent('hazardous_uns_note', t_hidden[a].childNodes[5].textContent, true, a))
                    .append(createTableBtns());
            t.append(p);
            d++;
        }
         //=======================================================
    });

    $("#delete_container").click(function(){
        var td = $("#container_details");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition("container_details");
                clearTableCondition("hidden_warehouse");
                clearTableCondition("hidden_cargo_details");
                clearTableCondition("hidden_hazardous");
            }
        });
    });

    $("#delete_cargo").click(function(){
        var td = $("#cargo_details");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition("cargo_details");
                clearTableCondition("hidden_warehouse");
                clearTableCondition("hbl_details");
                clearTableCondition("hidden_cargo_details");
                cubic_weight_loaded();
            }
        });
    });


</script>