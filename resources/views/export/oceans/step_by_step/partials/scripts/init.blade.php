<script type="text/javascript">
    window.onload = (function () {
        openTab($("#data"));

        weight_totals();

        $("#cargo_length").change(function () { calculate_cargo() });
        $("#cargo_quantity").change(function () { calculate_cargo() });
        $("#cargo_unit_weight").change(function () { calculate_cargo() });
        $("#cargo_total_weight").change(function () { calculate_cargo() });
        $("#cargo_width").change(function () { calculate_cargo() });
        $("#cargo_height").change(function () { calculate_cargo() });
        $("#cargo_metric_unit_measurement_id").change(function () { calculate_cargo() });
        $("#cargo_weight_unit_measurement_id").change(function () { calculate_cargo() });
        $("#cargo_dim_fact").change(function () { calculate_cargo() });

        $("#billing_quantity").change(function () { charges_details() });
        $("#billing_increase").change(function () { charges_details() });
        $("#billing_rate").change(function () { charges_details() });
        $("#cost_quantity").change(function () { charges_details() });
        $("#cost_rate").change(function () { charges_details() });

        $("#billing_bill_party").change(function () {
            $("#billing_bill_party").val() == 'O' ?  $("#billing_customer_name").attr("disabled", false): $("#billing_customer_name").attr("disabled", true) ;
        });
        for (var t = $("#tabs_add_info").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {

            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        $("#shipment_type").val('C').change();
        $("#shipment_status").val('O').change();



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
                            }
                        });
                    }
                }
            }
        });
    });


    $("#pick_cargo_save").click(function () {
        var whr_select = new Array(), c = 0, d = 0, x = 0;
        $("input[name='pick_select[]']:checked").each(function () {
            whr_select.push($(this).val());
        });
        for (c = 0; c < whr_select.length; c++) {
            $.ajax({
                url: "{{ route('receipts_entries.get_details') }}",
                data: {id_select: whr_select[c]},
                type: 'GET',
                success: function (e) {
                    //=============================================
                    while (e[x].id != "") {
                        var r = $("#cargo_details tbody tr").length + 1,
                                n = $("#hidden_cargo_details"),
                                t = n.find("tbody"),
                                p = $("<tr data-id=" + e[x].warehouse_code + ">"),
                                u_weight= parseFloat(e.total_weight/ e.quantity);
                        p.append(createTableContent('hidden_whr_id', r, true, x))
                                .append(createTableContent('hidden_cargo_line', x, true, x))
                                .append(createTableContent('hidden_cargo_quantity', e[x].quantity, true, x))
                                .append(createTableContent('hidden_cargo_type_id', e[x].cargo_type_id, false, x))
                                .append(createTableContent('hidden_cargo_type_code', e[x].cargo_type_code, true, x))
                                .append(createTableContent('hidden_pieces', e[x].pieces, false, x))
                                .append(createTableContent('hidden_weight_unit', e[x].weight_unit, true, x))
                                .append(createTableContent('hidden_metric_unit', e[x].metric_unit, false, x))
                                .append(createTableContent('hidden_length', e[x].length, false, x))
                                .append(createTableContent('hidden_width', e[x].width, false, x))
                                .append(createTableContent('hidden_height', e[x].height, false, x))
                                .append(createTableContent('hidden_total_weight', e[x].total_weight, true, x))
                                .append(createTableContent('hidden_cargo_cubic', e[x].cubic, false, x))
                                .append(createTableContent('hidden_cargo_volume_weight', e[x].volume_weight, false, x))
                                .append(createTableContent('hidden_location_id', e[x].location_id, false, x))
                                .append(createTableContent('hidden_location_name', e[x].location_name, false, x))
                                .append(createTableContent('hidden_location_bin_id', e[x].location_bin_id, false, x))
                                .append(createTableContent('hidden_location_bin_name', e[x].location_bin_name, false, x))
                                .append(createTableContent('hidden_material', e[x].material_description, false, x))
                                .append(createTableContent('hidden_cargo_dim_fact', e.dim_fact, true, x))
                                .append(createTableContent('hidden_cargo_square_foot', "", true, x))
                                .append(createTableContent('hidden_cargo_unit_weight',u_weight , true, x))
                                .append(createTableContent('hidden_cargo_tare_weight', e.tare_weight, true, x))
                                .append(createTableContent('hidden_cargo_net_weight', e.net_weight, true, x))
                        t.append(p);
                        x = x + 1;
                        weight_totals();
                    }
                }
            });
        }
        //=============================================
        var n = $("#cargo_details"),
                t = n.find("tbody");
        var tr = $("#load_warehouse_details tbody tr"),
        _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
             r_1 = tr.length, z = _ -1;
        for (var a = 0; a < r_1; a += 2) {
            for (c = 0; c < whr_select.length; c++) {
                if (whr_select[c] == tr[a].childNodes[1].textContent) {
                    var p_1 = $("<tr id=" + _ + " >");
                    p_1.append(createTableContent('cargo_line',_ , true, z))
                            .append(createTableContent('warehouse_number', tr[a].childNodes[3].textContent, false, z))
                            .append(createTableContent('warehouse_date_in', tr[a].childNodes[4].textContent, false, z))
                            .append(createTableContent('warehouse_shipper_name', tr[a].childNodes[6].textContent, false, z))
                            .append(createTableContent('warehouse_consignee_name', tr[a].childNodes[16].textContent, false, z))
                            .append(createTableContent('box_number', "", false, z))
                            .append(createTableContent('loaded_position', "", false, z))
                            .append(createTableContent('ship_inst_number', "", false, z))
                            .append(createTableContent('warehouse_status', tr[a].childNodes[30].textContent, false, z))

                            .append(createTableContent('bldg_number', "", true, z))
                            .append(createTableContent('warehouse_shipper_id', tr[a].childNodes[5].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_address', tr[a].childNodes[7].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_city', tr[a].childNodes[8].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_state_id', tr[a].childNodes[9].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_state_name', tr[a].childNodes[10].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_country_id',"", true, z))
                            .append(createTableContent('warehouse_shipper_country_name', "", true, z))
                            .append(createTableContent('warehouse_shipper_zip_code_id', tr[a].childNodes[11].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_zip_code_code', tr[a].childNodes[12].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_phone', tr[a].childNodes[13].textContent, true, z))
                            .append(createTableContent('warehouse_shipper_fax', tr[a].childNodes[14].textContent, true, z))

                            .append(createTableContent('warehouse_consignee_id', tr[a].childNodes[15].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_address',tr[a].childNodes[17].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_city', tr[a].childNodes[18].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_state_id',tr[a].childNodes[19].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_state_name', tr[a].childNodes[20].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_country_id', "", true, z))
                            .append(createTableContent('warehouse_consignee_country_name', "", true, z))
                            .append(createTableContent('warehouse_consignee_zip_code_id', tr[a].childNodes[21].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_zip_code_code', tr[a].childNodes[22].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_phone', tr[a].childNodes[23].textContent, true, z))
                            .append(createTableContent('warehouse_consignee_fax', tr[a].childNodes[24].textContent, true, z))
                            .append(createTableBtns())
                    t.append(p_1);
                    _ +=1;
                    z+=1;
                }
            }

        }
        warehouse_details();

        clearTable("load_warehouse_details ");

    });


    $("#billing_customer_name").attr("disabled", true);
    $("#bl_status").val('O').change();
    $("#bl_type").val('P').change();
    $("#rate_class").val(1).change();
    $("#shipment_type").val('C').change();
    $("#total_freight_charge").val('C').change();
    $("#total_other_charge").val('C').change();
    $("#total_weight_unit_measurement").val('K').change();
    $("#booking_status").val('P').change();
    $("#type_of_move").val(1).change();
    $("#bl_class").val(2).change();
    $("#cargo_metric_unit_measurement_id").val('I').change();
    $("#cargo_dim_fact").val('I').change();
    $("#cargo_weight_unit_measurement_id").val('L').change();
    $("#billing_bill_type").val('P').change();
    $("#billing_bill_party").val('S').change();

    $("#container_ventilation").val('A');
    $("#container_degress").val('F');
    $("#pd_status").val(1);

    $("#user_id").attr("disabled", true);
    $("#total_quantity").attr("disabled", true).number(true,3);
    $("#total_weight").attr("disabled", true).number(true,3);
    $("#total_cubic").attr("disabled", true).number(true,3);
    $("#total_volume_weight").attr("disabled", true).number(true,3);

    $("#pick_linked").attr("disabled", true);
    $("#pick_unlinked").attr("disabled", true);
    $("#pick_link_qty").attr("disabled", true).number(true,3);
    $("#pick_weight").attr("disabled", true).number(true,3);
    $("#pick_cubic").attr("disabled", true).number(true,3);

    $("#cargo_total_weight").attr("disabled", true).number(true,3);
    $("#cargo_cubic").attr("disabled", true).number(true,3);
    $("#cargo_volume_weight").attr("disabled", true).number(true,3);
    $("#cargo_square_foot").attr("disabled", true).number(true,3);


    $("#transportation_plans_amount").attr("disabled", true).number(true,3);

    $("#cargo_length").number(true,3);
    $("#cargo_width").number(true,3);
    $("#cargo_height").number(true,3);
    $("#cargo_quantity").number(true,3);
    $("#cargo_unit_weight").number(true,3);
    $("#cargo_tare_weight").number(true,3);
    $("#cargo_net_weight").number(true,3);

    $("#spotting_amount").number(true,3);
    $("#container_temperature").number(true,3);
    $("#container_max").number(true,3);
    $("#container_min").number(true,3);

    $("#container_inner_quantity").number(true,3);
    $("#container_outer_quantity").number(true,3);
    $("#container_net_weight").number(true,3);
    $("#container_number_equipment").number(true,3);
    $("#container_tare_weight").number(true,3);

    $("#cost_amount").number(true,3).attr("disabled", true);
    $("#billing_amount").number(true,3).attr("disabled", true);
    $("#billing_increase").number(true,3);
    $("#billing_rate").number(true,3);
    $("#cost_rate").number(true,3);
    $("#cost_exchange_rate").number(true,3);

    initDate($("#date_today"), 0);

    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


</script>
