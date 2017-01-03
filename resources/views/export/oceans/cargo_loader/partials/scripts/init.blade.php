<script type="text/javascript">
    window.onload = (function () {
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('cargo_loader.close') }}')
        openTab($("#data"));
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
                var span = '{{ isset($receipt_entry) ? "Edit ".$receipt_entry->code : "New" }}';

                etab[1] = span
            }
        }

        removeEmptyNodes('container_details');
        removeEmptyNodes('cargo_details');
        removeEmptyNodes('warehouse_cargo_details');
        removeEmptyNodes('hidden_cargo_details');
        removeEmptyNodes('hidden_warehouse');
        removeEmptyNodes('hidden_hazardous');

        initDate($("#date_today"), 0);
        $("#cargo_loader_status").val("O").change();
        $("#total_weight_unit").val("L").change();

        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {
            } else {var  n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")}
        }

        for ( t = $("#warehouse_tabs").find("div"), l = 0; l < t.length  ; l++) {
             a = t[l];
            e = $(a).attr("style");
            if (e === undefined) {
            } else {  n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")}
        }

        for ( t = $("#tabs_cargo").find("div"), l = 0; l < t.length  ; l++) {
            a = t[l];
            e = $(a).attr("style");
            if (e === undefined) {
            } else {  n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")}
        }

        for ( t = $("#resume_tabs").find("div"), l = 0; l < t.length  ; l++) {
            a = t[l];
            e = $(a).attr("style");
            if (e === undefined) {
            } else {  n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")}
        }


        $("#pick_cargo_save").click(function () {
            var whr_select = new Array(), c=0, d=0, x=0;
            $("input[name='pick_select[]']:checked").each(function() {
                whr_select.push($(this).val());
            });
            for (c=0; c< whr_select.length ; c ++){
                $.ajax({
                    url: "{{ route('receipts_entries.get_details') }}",
                    data: {id_select: whr_select[c]},
                    type: 'GET',
                    success: function (e) {
                        //=============================================
                        x=0;
                        while(e[x].id != ""){
                            var r= $("#cargo_details tbody tr").length + 1,
                                    n = $("#hidden_cargo_details"),
                                    t = n.find("tbody"),
                                    p = $("<tr data-id=" + e[x].warehouse_code + ">"),
                                   u_weight= parseFloat(e[x].total_weight/ e[x].quantity);
                            p.append(createTableContent('cargo_id',r, true, x))
                                    .append(createTableContent('details_line', x, true, x))
                                    .append(createTableContent('details_quantity',e[x].quantity, true, x))
                                    .append(createTableContent('details_cargo_type_id', e[x].cargo_type_id, false, x))
                                    .append(createTableContent('details_cargo_type_code',e[x].cargo_type_code, true, x))
                                    .append(createTableContent('details_pieces', e[x].pieces, false, x))
                                    .append(createTableContent('details_weight_unit', e[x].weight_unit, true, x))
                                    .append(createTableContent('details_metric_unit', e[x].metric_unit, false, x))
                                    .append(createTableContent('details_length', e[x].length, false, x))
                                    .append(createTableContent('details_width', e[x].width, false, x))
                                    .append(createTableContent('details_height', e[x].height, false, x))
                                    .append(createTableContent('details_total_weight', e[x].total_weight, true, x))
                                    .append(createTableContent('details_total_cubic', e[x].cubic, false, x))
                                    .append(createTableContent('details_vol_weight', e[x].volume_weight, false, x))
                                    .append(createTableContent('details_location_id', e[x].location_id, false, x))
                                    .append(createTableContent('details_location_name', e[x].location_name, false, x))
                                    .append(createTableContent('details_location_bin_id', e[x].location_bin_id, false, x))
                                    .append(createTableContent('details_location_bin_name', e[x].location_bin_name, false, x))
                                    .append(createTableContent('details_material',e[x].material_description, false, x))
                                    .append(createTableContent('details_dim_fact', e[x].dim_fact, true, x))
                                    .append(createTableContent('details_square_foot', "", true, x))
                                    .append(createTableContent('details_unit_weight',u_weight , true, x))
                                    .append(createTableContent('details_tare_weight', e[x].tare_weight, true, x))
                                    .append(createTableContent('details_net_weight', e[x].net_weight, true, x))
                            t.append(p);
                            x= x+1;

                        }

                    }
                });
            }
            //=============================================
            var n = $("#cargo_details"),
                    t = n.find("tbody");
            var tr=  $("#load_warehouse_details tbody tr"),
            _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
            r_1 = tr.length; d = _ -1;

            for(var a =0; a< r_1 ; a++) {
                for (c=0; c< whr_select.length ; c ++){
                    if(whr_select[c] == tr[a].childNodes[1].textContent){
                        var p_1 = $("<tr id="+ tr[a].childNodes[1].textContent +" >");
                        p_1.append(createTableContent('warehouse_id', whr_select[c], true, d))
                                .append(createTableContent('warehouse_number', tr[a].childNodes[3].textContent, false, d))
                                .append(createTableContent('date_in', tr[a].childNodes[4].textContent, false, d))
                                .append(createTableContent('shipper_id', tr[a].childNodes[5].textContent, true, d))
                                .append(createTableContent('shipper_name', tr[a].childNodes[6].textContent, false, d))
                                .append(createTableContent('shipper_address', tr[a].childNodes[7].textContent, true, d))
                                .append(createTableContent('shipper_city', tr[a].childNodes[8].textContent, true, d))
                                .append(createTableContent('shipper_state_id', tr[a].childNodes[9].textContent, true, d))
                                .append(createTableContent('shipper_state_name', tr[a].childNodes[10].textContent, true, d))
                                .append(createTableContent('shipper_zip_code_id', tr[a].childNodes[11].textContent, true, d))
                                .append(createTableContent('shipper_zip_code_code', tr[a].childNodes[12].textContent, true, d))
                                .append(createTableContent('shipper_phone', tr[a].childNodes[13].textContent, true, d))
                                .append(createTableContent('shipper_fax', tr[a].childNodes[14].textContent, true, d))
                                .append(createTableContent('consignee_id', tr[a].childNodes[15].textContent, true, d))
                                .append(createTableContent('consignee_name', tr[a].childNodes[16].textContent, false, d))
                                .append(createTableContent('consignee_address', tr[a].childNodes[17].textContent, true, d))
                                .append(createTableContent('consignee_city', tr[a].childNodes[18].textContent, true, d))
                                .append(createTableContent('consignee_state_id', tr[a].childNodes[19].textContent, true, d))
                                .append(createTableContent('consignee_state_name', tr[a].childNodes[20].textContent, true, d))
                                .append(createTableContent('consignee_zip_code_id', tr[a].childNodes[21].textContent, true, d))
                                .append(createTableContent('consignee_zip_code_code', tr[a].childNodes[22].textContent, true, d))
                                .append(createTableContent('consignee_phone', tr[a].childNodes[23].textContent, true, d))
                                .append(createTableContent('consignee_fax', tr[a].childNodes[24].textContent, true, d))
                                .append(createTableContent('box_number', " ", true, d))
                                .append(createTableContent('destination_name', tr[a].childNodes[25].textContent, true, d))
                                .append(createTableContent('status', tr[a].childNodes[30].textContent, false, d))
                                .append(createTableContent('ship_inst_number', "", true, d))
                                .append(createTableContent('sum_pieces', tr[a].childNodes[26].textContent, true, d))
                                .append(createTableContent('sum_weight', tr[a].childNodes[27].textContent, true, d))
                                .append(createTableContent('sum_cubic', tr[a].childNodes[28].textContent, true, d))
                                .append(createTableContent('sum_volume_weight', tr[a].childNodes[33].textContent, true, d))

                                .append(createTableContent('warehouse_id', tr[a].childNodes[34].textContent, true, d))
                                .append(createTableContent('warehouse_code', tr[a].childNodes[35].textContent, true, d))
                                .append(createTableContent('hidden_flag','0', true, d))
                                .append(createTableContent('hidden_receipt_entry', whr_select[c], true, d))

                                .append(createTableBtns())
                        t.append(p_1);

                    }
                }

            }warehouse_details(); cubic_weight_loaded();
                //=============================================
            $("#LoadWarehouse").modal("hide");
        });

        $("#cargo_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#cargo_cargo_type_code").val()
                    $("#cargo_cargo_type_code").val(e[0].code);
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
                                    $("#cargo_length").val(e[0].length), $("#cargo_width").val(e[0].width), $("#cargo_height").val(e[0].height);
                                    calculate_warehouse();
                                }
                            });
                        }
                    }
                }
            });
        });
//=====================================================================
        $("#shipment_code").change(function (){
            var id = $("#shipment_id").val();

            $.ajax({
                url: "{{ route('shipment_entries.get') }}",
                data: {id: id},
                type: 'GET',

                success: function (e) {
                clearTable('container_details');
                    var d= $("#container_details tbody tr").length ,
                            n= $("#container_details"),
                            t= n.find("tbody");
                            console.log( e[0].code);

                            var p = $("<tr id="+ (d + 1) +" >");
                            p.append(createTableContent('container_line', (d + 1), true, d))
                                    .append(createTableContent('equipment_type_id', e[0].equipment_type_id, true, d))
                                    .append(createTableContent('equipment_type_code', e[0].equipment_type_code, false, d))
                                    .append(createTableContent('container_number', e[0].container_number, false, d))
                                    .append(createTableContent('container_seal_number', e[0].container_seal_number, false, d))
                                    .append(createTableContent('container_seal_number2', e[0].container_seal_number2, true, d))
                                    .append(createTableContent('container_order_number',"", false, d))

                                    .append(createTableContent('container_comments', e[0].container_comments, true, d))
                                    .append(createTableContent('cubic_max', "", true, d))
                                    .append(createTableContent('cubic_load', "", false, d))
                                    .append(createTableContent('cubic_load_p', "", true, d))
                                    .append(createTableContent('cubic_excess', "", true, d))
                                    .append(createTableContent('pieces_loaded', "", true, d))

                                    .append(createTableContent('max_weight', "", true, d))
                                    .append(createTableContent('weight_load',"", false, d))
                                    .append(createTableContent('weight_load_p',"", true, d))
                                    .append(createTableContent('weight_excess', "", true, d))

                                    .append(createTableContent('container_commodity_id', e[0].container_commodity_id, true, d))
                                    .append(createTableContent('container_commodity_name', e[0].container_commodity_name, true, d))
                                    .append(createTableContent('pd_status', e[0].pd_status, true, d))
                                    .append(createTableContent('container_spotting_date', e[0].spotting_date, true, d))
                                    .append(createTableContent('container_pull_date', e[0].pull_date, true, d))

                                    .append(createTableContent('container_pickup_id', e[0].pickup_id, true, d))
                                    .append(createTableContent('container_pickup_name', e[0].pickup_name, true, d))
                                    .append(createTableContent('container_pickup_type', e[0].pickup_type, true, d))
                                    .append(createTableContent('container_pickup_address', e[0].pickup_address , true, d))
                                    .append(createTableContent('container_pickup_city', e[0].pickup_city, true, d))
                                    .append(createTableContent('container_pickup_state_id', e[0].pickup_state_id, true, d))
                                    .append(createTableContent('container_pickup_state_name', e[0].pickup_state_name, true, d))
                                    .append(createTableContent('container_pickup_zip_code_id', e[0].pickup_zip_code_id, true, d))
                                    .append(createTableContent('container_pickup_zip_code_code', e[0].pickup_zip_code, true, d))
                                    .append(createTableContent('container_pickup_phone', e[0].pickup_phone, true, d))
                                    .append(createTableContent('container_pickup_contact', e[0].pickup_contact, true, d))
                                    .append(createTableContent('container_pickup_date', e[0].pickup_date, true, d))
                                    .append(createTableContent('container_pickup_number', e[0].pickup_number, true, d))

                                    .append(createTableContent('container_delivery_id', e[0].delivery_id, true, d))
                                    .append(createTableContent('container_delivery_name', e[0].delivery_name, true, d))
                                    .append(createTableContent('container_delivery_type', e[0].delivery_type, true, d))
                                    .append(createTableContent('container_delivery_address', e[0].delivery_address, true, d))
                                    .append(createTableContent('container_delivery_city', e[0].delivery_city, true, d))
                                    .append(createTableContent('container_delivery_state_id', e[0].delivery_state_id, true, d))
                                    .append(createTableContent('container_delivery_state_name', e[0].delivery_state_name, true, d))
                                    .append(createTableContent('container_delivery_zip_code_id', e[0].delivery_zip_code_id, true, d))
                                    .append(createTableContent('container_delivery_zip_code_code', e[0].delivery_zip_code, true, d))
                                    .append(createTableContent('container_delivery_phone', e[0].delivery_phone, true, d))
                                    .append(createTableContent('container_delivery_contact', e[0].delivery_contact, true, d))
                                    .append(createTableContent('container_delivery_date', e[0].delivery_date, true, d))
                                    .append(createTableContent('container_delivery_number', e[0].delivery_number, true, d))

                                    .append(createTableContent('container_drop_id', e[0].drop_id, true, d))
                                    .append(createTableContent('container_drop_name', e[0].drop_name, true, d))
                                    .append(createTableContent('container_drop_type', e[0].drop_type, true, d))
                                    .append(createTableContent('container_drop_address', e[0].drop_address, true, d))
                                    .append(createTableContent('container_drop_city', e[0].drop_city, true, d))
                                    .append(createTableContent('container_drop_state_id', e[0].drop_state_id, true, d))
                                    .append(createTableContent('container_drop_state_name', e[0].drop_state_name, true, d))
                                    .append(createTableContent('container_drop_zip_code_id', e[0].drop_zip_code_id, true, d))
                                    .append(createTableContent('container_drop_zip_code_code', e[0].drop_zip_code, true, d))
                                    .append(createTableContent('container_drop_phone', e[0].drop_phone, true, d))
                                    .append(createTableContent('container_drop_contact', e[0].drop_contact, true, d))
                                    .append(createTableContent('container_drop_date', e[0].drop_date, true, d))
                                    .append(createTableContent('container_drop_number', e[0].drop_number, true, d))

                                    .append(createTableContent('container_hazardous_contact', e[0].hazardous_contact, true, d))
                                    .append(createTableContent('container_hazardous_phone',e[0].hazardous_phone, true, d))
                                    .append(createTableContent('container_degrees', e[0].degrees, true, d))
                                    .append(createTableContent('container_max',e[0].temperature_max, true, d))
                                    .append(createTableContent('container_min',e[0].temperature_min, true, d))
                                    .append(createTableContent('container_ventilation',e[0].ventilation, true, d))
                                    .append(createTableContent('container_temperature',e[0].temperature, true, d))

                                    .append(createTableContent('container_inner_code', e[0].inner_code, true, d))
                                    .append(createTableContent('container_inner_quantity', e[0].inner_quantity, true, d))
                                    .append(createTableContent('container_net_weight',  e[0].net_weight, true , d))
                                    .append(createTableContent('container_number_equipment', e[0].number_equipment, true, d))
                                    .append(createTableContent('container_outer_code', e[0].outer_code, true, d))
                                    .append(createTableContent('container_outer_quantity', e[0].outer_quantity, true, d))
                                    .append(createTableContent('container_release_number', e[0].release_number, true, d))
                                    .append(createTableContent('container_requested_equipment', e[0].requested_equipment, true, d))
                                    .append(createTableContent('container_tare_weight', e[0].tare_weight, true, d))
                                    .append(createTableContent('total_weight_unit',e[0].total_weight_unit, true, d))
                                    .append(createTableContent('container_carrier_id', e[0].carrier_id, true, d))
                                    .append(createTableContent('container_carrier_name', e[0].carrier_name, true, d))
                                    .append(createTableBtns())
                            t.append(p);

                     }
            });
        });


//=====================================================================



        $("#cargo_length").change(function () { calculate_warehouse() });
        $("#cargo_quantity").change(function () { calculate_warehouse() });
        $("#cargo_unit_weight").change(function () { calculate_warehouse() });
        $("#cargo_total_weight").change(function () { calculate_warehouse() });
        $("#cargo_width").change(function () { calculate_warehouse() });
        $("#cargo_height").change(function () { calculate_warehouse() });
        $("#cargo_metric_unit_measurement_id").change(function () { calculate_warehouse() });
        $("#cargo_weight_unit_measurement_id").change(function () { calculate_warehouse() });
        $("#cargo_dim_fact").change(function () { calculate_warehouse() });
    });

    $("#cargo_cubic").attr("disabled", true).number(true, 3);
    $("#cargo_volume_weight").attr("disabled", true).number(true, 3);
    $("#cargo_square_foot").attr("disabled", true).number(true, 3);
    $("#cubic_load").attr("disabled", true).number(true, 3);
    $("#weight_load").attr("disabled", true).number(true, 3);
    $("#code").attr("disabled", true);

    $("#cargo_length").number(true, 3);
    $("#cargo_width").number(true, 3);
    $("#cargo_height").number(true, 3);
    $("#cargo_unit_weight").number(true, 3);
    $("#cargo_tare_weight").number(true, 3);
    $("#cargo_net_weight").number(true, 3);
    $("#cargo_pieces").number(true);
    $("#pieces_loaded").number(true);
    $("#hazardous_max").number(true);
    $("#hazardous_min").number(true);
    $("#hazardous_temperature").number(true);

    $("#cubic_max").number(true, 3);
    $("#cubic_load_p").number(true, 3);
    $("#cubic_excess").number(true, 3);
    $("#weight_max").number(true, 3);
    $("#weight_load_p").number(true, 3);
    $("#weight_excess").number(true, 3);


</script>