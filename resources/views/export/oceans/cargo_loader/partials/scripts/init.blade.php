<script type="text/javascript">
    window.onload = (function () {
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('cargo_loader.close') }}')
        openTab($("#data"));

        if ($("#open_status").val() == "1" || $("#cargo_loader_status").val() == "C") {
            disableFields('data');
        }
        $('#printer').change(function () {
            var _type = $('.select-header .dropdown-menu .selected').data('original-index');
            var _id = $('.btn-print[data-id]').data('id');
            var _token = '{{ str_random(120) }}';

            var url = $('.btn-print[data-id]').data('route');
            $('.btn-print[data-id]').attr('href', url + '?_token=' + _token + '&_type=' + _type + '&_id=' + _id);
        });


        if ('edit' == '{{ \Request::segment(5) }}' && $("#status").val() == "H" && '{{ auth()->user()->role }}' == 'User') {
            $("#status").attr('disabled', true);
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

        $("#booking_save").click( function(){
            $("input[name='booking_select[]']:checked").each(function () {
               $("#booking_code").val($(this).val());
               $("#booking_id").val($(this).attr("data-id"));
            });
            $("#BookingDetails").modal("hide");
        });


        $("#select_all").change(function () {
            if ($(this).is(':checked')) {
                $("#load_warehouse_details input[type=checkbox]").prop('checked', true);
            } else {
                $("#load_warehouse_details input[type=checkbox]").prop('checked', false);
            }
            warehouse_details();
        });
        $("#select_all_whr").change(function () {
            if ($(this).is(':checked')) {
                //$("input[type=checkbox]").prop('checked', true); //todos los check
                $("#load_warehouses input[type=checkbox]").prop('checked', true); //solo los del objeto #diasHabilitados
            } else {
                //$("input[type=checkbox]").prop('checked', false);//todos los check
                $("#load_warehouses input[type=checkbox]").prop('checked', false);//solo los del objeto #diasHabilitados
            }
            warehouse_details();
        });



        if($("#date_today").val() == ''){ initDate($("#date_today"), 0); }
        $("#cargo_loader_status").val("{{ (isset($cargo_loader) ? $cargo_loader->cargo_loader_status : "O") }}").change();
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

        $("#equipment_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#equipment_type_code").val(e[0].code);

                }
            });
        });

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

                                .append(createTableBtns());
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
                    var act = $("#cargo_cargo_type_code").val();
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

$("#group_by").change(function(){
    if($("#group_by").val() != '3'){
        $("#select_all_whr").prop('checked', true);
        $("#load_warehouses input[type=checkbox]").prop('checked', true);
    }else{
        $("#select_all_whr").prop('checked', false);
        $("#load_warehouses input[type=checkbox]").prop('checked', false);
    }
});

        $("#shipment_id").change(function () {
            var cargo_loader_id = '{{ (isset($cargo_loader) ? $cargo_loader->id : "") }}';
            var id = $("#shipment_id").val();

            $("#booking_id").val(0);
            $("#booking_code").val("");
            $.ajax({
                url: "{{ route('shipment_entries.autocomplete') }}",
                data: {id: id},
                type: 'GET',

                success: function (e) {
                    $("#shipment_type").val(e[0].type).change();
                        $("#bl_status").val(e[0].bl_status).change();
                        $("#vessel_name").val(e[0].vessel);
                        $("#voyage_name").val(e[0].voyage);
                        $("#carrier_id").val(e[0].carrier_id).change();
                        $("#carrier_name").val(e[0].carrier_name);
                        $("#departure_date").val(e[0].departure);
                        $("#arrival_date").val(e[0].arrival).change();
                        $("#port_loading_id").val(e[0].loading_port_id).change();
                        $("#port_loading_name").val(e[0].loading_port_name);
                        $("#port_unloading_id").val(e[0].unloading_port_id).change();
                        $("#port_unloading_name").val(e[0].unloading_port_name);
                    $("#place_receipt_id").val(e[0].location_origin_id).change();
                    $("#place_receipt_name").val(e[0].location_origin_name);
                    $("#place_delivery_id").val(e[0].location_destination_id).change();
                    $("#place_delivery_name").val(e[0].location_destination_name);
                    $("#place_receipt").val(e[0].location_origin_name);
                    $("#place_delivery").val(e[0].location_destination_name);
                    $("#port_loading").val(e[0].loading_port_name);
                    $("#foreign_port").val(e[0].unloading_port_name);
                    $("#shipper_id").val(e[0].shipper_id).change(); $("#shipper_name").val(e[0].shipper_name); $("#shipper_address").val(e[0].shipper_address); $("#shipper_city").val(e[0].shipper_city); $("#shipper_phone").val(e[0].shipper_phone); $("#shipper_state_id").val(e[0].shipper_state_id).change(); $("#shipper_state_name").val(e[0].shipper_state_name); $("#shipper_zip_code_id").val(e[0].shipper_zip_code_id).change(); $("#shipper_zip_code_code").val(e[0].shipper_zip_code);$("#consignee_id").val(e[0].consignee_id).change(); $("#consignee_name").val(e[0].consignee_name); $("#consignee_address").val(e[0].consignee_address); $("#consignee_city").val(e[0].consignee_city); $("#consignee_phone").val(e[0].consignee_phone); $("#consignee_state_id").val(e[0].consignee_state_id).change(); $("#consignee_state_name").val(e[0].consignee_state_name); $("#consignee_zip_code_id").val(e[0].consignee_zip_code_id).change(); $("#consignee_zip_code_code").val(e[0].consignee_zip_code); $("#notify_id").val(e[0].notify_id).change(); $("#notify_name").val(e[0].notify_name); $("#notify_address").val(e[0].notify_address); $("#notify_city").val(e[0].notify_city); $("#notify_phone").val(e[0].notify_phone); $("#notify_state_id").val(e[0].notify_state_id).change(); $("#notify_state_name").val(e[0].notify_state_name); $("#notify_zip_code_id").val(e[0].notify_zip_code_id).change(); $("#notify_zip_code_code").val(e[0].notify_zip_code); $("#forwarding_agent_name").val(e[0].forwarding_agent_name); $("#forwarding_agent_id").val(e[0].forwarding_agent_id).change(); $("#domestic_routing").val(e[0].domestic_routing); $("#booking_code").val(e[0].booking_code);
                        $("#agent_name").val(e[0].agent_name); $("#agent_id").val(e[0].agent_id).change(); $("#agent_phone").val(e[0].agent_phone); $("#agent_fax").val(e[0].agent_fax); $("#agent_contact").val(e[0].agent_contact); $("#agent_commission").val(e[0].agent_commission); $("#spotting_amount").val(e[0].agent_amount); $("#state_of_origin_id").val(e[0].state_of_origin_id).change(); $("#state_of_origin_name").val(e[0].state_of_origin_name);  $("#inland_driver_name").val(e[0].inland_driver_name); $("#inland_driver_id").val(e[0].inland_driver_id); $("#inland_lic_number").val(e[0].inland_lic_number); $("#booked_date").val(e[0].booked_date); $("#loading_date").val(e[0].loading_date); $("#equipment_cut_off_date").val(e[0].equipment_cut_off_date); $("#documents_cut_off_date").val(e[0].documents_cut_off_date), $("#tmp_equipment_type_id").val(e[0].total_cargo_type_id);



                }
            });
        });

        $('#create_hbl').change(function() {
            ((this.checked)? $(this).val("1"): $(this).val("0"))
        });

        $("#cargo_length").change(function () { calculate_warehouse() });
        $("#cargo_quantity").change(function () { calculate_warehouse() });
        $("#cargo_unit_weight").change(function () { calculate_warehouse() });
        $("#cargo_total_weight").change(function () { calculate_warehouse() });
        $("#cargo_width").change(function () { calculate_warehouse() });
        $("#cargo_height").change(function () { calculate_warehouse() });
        $("#cargo_metric_unit_measurement_id").change(function () { calculate_warehouse() });
        $("#cargo_weight_unit_measurement_id").change(function () { calculate_warehouse() });
        $("#cargo_dim_fact").change(function () { calculate_warehouse() });

        $("#booking_code").attr("readonly", true);
    });

    $('#vessel_yes').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });

    $('#vessel_no').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
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
    $("#user_id").attr("readonly", true);

    $("#cubic_max").number(true, 3);
    $("#cubic_load_p").number(true, 3);
    $("#cubic_excess").number(true, 3);
    $("#weight_max").number(true, 3);
    $("#weight_load_p").number(true, 3);
    $("#weight_excess").number(true, 3);

    function arrayEmpty(message){
        swal({
            title: "Wait!",
            text: message,
            type: "warning",
            confirmButtonText: "Ok"
        });
    }
    $("#btn_create_hbl").click(function() {
        $("#tmp_cargo_loader_id").val('{{ (isset($cargo_loader) ? $cargo_loader->id : "") }}');
        $('#tmp_departure_date').val($("#departure_date").val());
        $('#tmp_arrival_date').val($("#arrival_date").val());
        $('#tmp_booking_code').val($("#booking_code").val());
        $('#tmp_carrier_id').val($("#carrier_id").val());
        $('#tmp_shipment_id').val($("#shipment_id").val());
        $('#tmp_shipment_code').val($("#shipment_id option:selected").text());
        $('#tmp_date_today').val($("#date_today").val());

        $('#tmp_place_receipt').val($("#place_receipt_name").val());
        $('#tmp_place_delivery').val($("#place_delivery_name").val());
        $('#tmp_port_loading_id').val($("#port_loading_id").val());
        $('#tmp_port_unloading_id').val($("#port_unloading_id").val());
        $('#tmp_vessel_name').val($("#vessel_name").val());
        $('#tmp_voyage_name').val($("#voyage_name").val());
        $("#shipment_code").val($("#shipment_id option:selected").text());

        clearTableCondition('load_warehouses');
        $("#group_by").val("3").change();
        var id = '{{ (isset($cargo_loader) ? $cargo_loader->id : "") }}';
        var bl_id = 0;
        $.ajax({
            url: "{{ route('eo_cargo_loader.get_warehouses') }}",
            data: {id: id, bl_id: bl_id, status: 'N'},
            type: 'GET',
            success: function (e) {
                var x = 0;
                if (e.length == 0) {
                    arrayEmpty("There are not elements to link.");
                }
                else {
                    while (e[x].id != "") {
                        var r = $("#load_warehouses tbody tr").length + 1,
                            n = $("#load_warehouses"),
                            t = n.find("tbody"),
                            p = $("<tr id=" + r + ">");
                        p.append(createTableContent('warehouse_id', e[x].id, true, x))
                            .append("<td><input type='checkbox' name='warehouse_select[]' id='warehouse_select' value='" + e[x].id + "'></td>")
                            .append(createTableContent('warehouse_code', e[x].value, false, x))
                            .append(createTableContent('shipper_id', e[x].shipper_id, true, x))
                            .append(createTableContent('shipper_name', e[x].shipper_name, false, x))
                            .append(createTableContent('consignee_id', e[x].consignee_id, true, x))
                            .append(createTableContent('consignee_name', e[x].consignee_name, false, x))
                            .append(createTableContent('status', e[x].status, false, x))
                            .append(createTableContent('quantity', e[x].quantity, false, x))
                            .append(createTableContent('sum_weight', e[x].sum_weight, false, x))
                            .append(createTableContent('sum_cubic', e[x].sum_cubic, false, x))
                            .append(createTableContent('hbl_line_id', '0', true, x));
                        t.append(p);
                        x = x + 1;
                        $("#CreateHouse").modal("show");
                    }
                }
            }
        });

    });



    $("#btn_booking").click(function() {
        clearTableCondition('booking_details');

        var id = $("#shipment_id").val();
        $.ajax({
            url: "{{ route('shipment_entries.get_booking') }}",
            data: {id: id},
            type: 'GET',
            success: function (e) {
                var x = 0;
                if (e.length == 0) {
                    arrayEmpty("There are not booking numbers to be linked. Add booking at FILE# " + $("#shipment_id option:selected").text() );
                }
                else {
                    while (e[x].id != "") {
                        var r = $("#booking_details tbody tr").length + 1,
                            n = $("#booking_details"),
                            t = n.find("tbody"),
                            p = $("<tr id=" + r + ">");
                        p.append(createTableContent('line', e[x].id, true, x))
                            .append("<td><input type='radio' name='booking_select[]' data-id = '"+ e[x].id +"' id='booking_select["+ x +"]' value='" + e[x].code + "' /></td>")
                            .append(createTableContent('booking_code', e[x].code, false, x));
                        t.append(p);
                        x = x + 1;
                        $("#BookingDetails").modal("show");
                    }

                }
            }
        });
    });



</script>