<script type="text/javascript">
    window.onload = (function () {
        openTab($("#data"));

        $('.collapse').on('show.bs.collapse', function () {
            $('.collapse.in').collapse('hide');

        });

        initDate($("#date_today"), 0);

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
                        while(e[x].id != ""){
                            var r= $("#cargo_details tbody tr").length + 1,
                                    n = $("#hidden_cargo_details"),
                                    t = n.find("tbody"),
                                    p = $("<tr data-id=" + e[x].warehouse_code + ">"),
                                   u_weight= parseFloat(e.total_weight/ e.quantity);
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
                                    .append(createTableContent('details_tare_weight', e.tare_weight, true, x))
                                    .append(createTableContent('details_net_weight', e.net_weight, true, x))
                            t.append(p);
                            x= x+1;
                            cubic_weight_loaded();
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

            for(var a =0; a< r_1 ; a+=2) {
                for (c=0; c< whr_select.length ; c ++){
                    if(whr_select[c] == tr[a].childNodes[1].textContent){
                        var p_1 = $("<tr id="+ tr[a].childNodes[1].textContent +" >");
                        p_1.append(createTableContent('warehouse_id', whr_select[c], true, d))
                                .append(createTableContent('warehouse_number', tr[a].childNodes[3].textContent, false, d))
                                .append(createTableContent('date_in', tr[a].childNodes[4].textContent, false, d))
                                .append(createTableContent('shipper_id', tr[a].childNodes[5].textContent, true, d))
                                .append(createTableContent('shipper_name', tr[a].childNodes[6].textContent, false, d))
                                .append(createTableContent('shipper_city', tr[a].childNodes[7].textContent, true, d))
                                .append(createTableContent('shipper_state_id', tr[a].childNodes[8].textContent, true, d))
                                .append(createTableContent('shipper_state_name', tr[a].childNodes[9].textContent, true, d))
                                .append(createTableContent('shipper_zip_code_id', tr[a].childNodes[10].textContent, true, d))
                                .append(createTableContent('shipper_zip_code_code', tr[a].childNodes[11].textContent, true, d))
                                .append(createTableContent('shipper_phone', tr[a].childNodes[12].textContent, true, d))
                                .append(createTableContent('shipper_fax', tr[a].childNodes[13].textContent, true, d))
                                .append(createTableContent('consignee_id', tr[a].childNodes[14].textContent, true, d))
                                .append(createTableContent('consignee_name', tr[a].childNodes[15].textContent, false, d))
                                .append(createTableContent('consignee_city', tr[a].childNodes[16].textContent, true, d))
                                .append(createTableContent('consignee_state_id', tr[a].childNodes[17].textContent, true, d))
                                .append(createTableContent('consignee_state_name', tr[a].childNodes[18].textContent, true, d))
                                .append(createTableContent('consignee_zip_code_id', tr[a].childNodes[19].textContent, true, d))
                                .append(createTableContent('consignee_zip_code_code', tr[a].childNodes[20].textContent, true, d))
                                .append(createTableContent('consignee_phone', tr[a].childNodes[21].textContent, true, d))
                                .append(createTableContent('consignee_fax', tr[a].childNodes[22].textContent, true, d))
                                .append(createTableContent('box_number', " ", false, d))
                                .append(createTableContent('destination_name', tr[a].childNodes[23].textContent, false, d))
                                .append(createTableContent('status', tr[a].childNodes[28].textContent, false, d))
                                .append(createTableContent('ship_inst_number', "", false, d))
                                .append(createTableBtns())
                        t.append(p_1);

                    }
                }

            }warehouse_details();
                //=============================================
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
    $("#cargo_load_code").attr("disabled", true);

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