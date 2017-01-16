<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('orders_entries.close') }}')

        if ($("#open_status").val() == "1") {
            disableFields('data');
        }
        $('#create_warehouse_receipt').change(function() {
            ((this.checked)? $(this).val("1"): $(this).val("0"))
        });
        initDate($("#date_order"), 0);

        //===================================================
        $("#dr_freight_charges").val("L").change();


        $("#create_warehouse_receipt").val("0").change();
        $("#freight_terms").val("P").change();
        $("#cod_terms").val("P").change();
        $("#freight_counted").val("S").change();
        $("#trailer_load").val("S").change();
        $("#cod_terms").val("P").change();
        $("#create_warehouse_receipt").val("0").change();
        $("#delivery_type").val("02").change();
        $("#pickup_type").val("02").change();
        $("#transportation_mode").val("O").change();
        $("#origin_from_type").val("01").change();
        $("#origin_to_type").val("01").change();
        $("#transportation_leg_status").val("O").change();
        $("#load_cargo").val("1").change();
        $("#billing_bill_party").change(function () {
            var a= $("#billing_bill_party").val();
            switch(a){
                case "S":   $("#billing_customer_name").val( $("#shipper_name").val() );
                            $("#billing_customer_id").val( $("#shipper_id").val() );
                            $("#billing_customer_name").attr("readonly", true);
                            break;

                case "C":   $("#billing_customer_name").val( $("#consignee_name").val() );
                            $("#billing_customer_id").val( $("#consignee_id").val() );
                            $("#billing_customer_name").attr("readonly", true);
                            break;

                case "T":   $("#billing_customer_name").val( $("#third_party_name").val() );
                            $("#billing_customer_id").val( $("#third_party_id").val() );
                            $("#billing_customer_name").attr("readonly", true);
                            break;

                case "O":   $("#billing_customer_name").val("");
                            $("#billing_customer_id").val(0);
                            $("#billing_customer_name").attr("readonly", false);
                            break;
            }

        });
//============================================================
        $("#code").attr("readonly", true);
        $("#pick_search_for_name").change(function(){
            values_pick_cargo();
        });

        removeEmptyNodes('charge_details');
        removeEmptyNodes('transportation_details');
        removeEmptyNodes('container_details');
        removeEmptyNodes('dr_details');
        removeEmptyNodes('warehouse_details');
        calculate_warehouse_details();
        calculate_charges();
        dock_receipts();
        transportation_plan();

        $('.collapse').on('show.bs.collapse', function () {
            $('.collapse.in').collapse('hide');
        });

        $("#pick_cargo_save").click(function() {
            for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
                var a = t[l];
                var e = $(a).attr("style"),
                        n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        });

        for (var t2 = $("#cargo-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#pick-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#transportation-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        for (var t2 = $("#origin_charges-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }


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
                                    calculate_cargo();
                                }
                            });
                        }
                    }
                }
            });
        });


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





        $("#cargo_length").change(function () { calculate_cargo() });
        $("#cargo_quantity").change(function () { calculate_cargo() });
        $("#cargo_unit_weight").change(function () { calculate_cargo() });
        $("#cargo_total_weight").change(function () { calculate_cargo() });
        $("#cargo_width").change(function () { calculate_cargo() });
        $("#cargo_height").change(function () { calculate_cargo() });
        $("#cargo_metric_unit_measurement_id").change(function () { calculate_cargo() });
        $("#cargo_weight_unit_measurement_id").change(function () { calculate_cargo() });
        $("#cargo_dim_fact").change(function () { calculate_cargo() });

        $("#vehicle_length").change(function () { calculate_vehicle() });
        $("#vehicle_quantity").change(function () { calculate_vehicle() });
        $("#vehicle_unit_weight").change(function () { calculate_vehicle() });
        $("#vehicle_total_weight").change(function () { calculate_vehicle() });
        $("#vehicle_width").change(function () { calculate_vehicle() });
        $("#vehicle_height").change(function () { calculate_vehicle() });
        $("#vehicle_metric_unit_measurement_id").change(function () { calculate_vehicle() });
        $("#vehicle_weight_unit_measurement_id").change(function () { calculate_vehicle() });
        $("#vehicle_dim_fact").change(function () { calculate_vehicle() });

        $("#warehouse_details").change(function () { calculate_warehouse_details() });
        $("#sum_pieces").change(function () { calculate_warehouse_details() });
        $("#dr_cargo_cubic").change(function() { dock_receipts() });
        $("#dr_cargo_rate").change(function() { dock_receipts() });
        $("#dr_cargo_chgrw").change(function() { dock_receipts() });

        $("#billing_quantity").change(function() { calculate_individual_charges() });
        $("#billing_rate").change(function() { calculate_individual_charges() });
        $("#billing_increase").change(function() { calculate_individual_charges() });
        $("#cost_quantity").change(function() { calculate_individual_charges() });
        $("#cost_rate").change(function() { calculate_individual_charges() });

        $("#warehouse_id").val("1");
        $("#warehouse_name").attr("readonly", true);
        $("#warehouse_name").val("VECO MIAMI");
        $("#warehouse_name option[value="+ 1 +"]").attr("selected",true);

        if($("#pd_status").val() == ''){
            $("#pd_status").val("O").change();
        }

        if($("#third_party_currency_type").val() == ''){
            $("#third_party_currency_type").val("1").change();
        }

        $("#pd_type").val("P").change();
        $("#pd_dispatch_status").val("O").change();
    });


    //=================================================================
    $("#billing_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#billing_unit_name").val(e[0].code);

            }
        });
    });

    $("#cost_unit_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('units.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#cost_unit_name").val(e[0].code);

            }
        });
    });

    $("#cargo_location_id").change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('locations.get') }}",
            data: { id: id },
            type: 'GET',
            success: function (e) {
                $("#cargo_location_name").val(e[0].code);

            }
        });
    });


//========;===================================================


    $("#pick_cargo_save").click(function () {
        var pick_select = new Array(), c = 0, d = 0, x = 0;
        $("input[name='pick_select[]']:checked").each(function () {
            pick_select.push($(this).val());
        });
        values_pick_cargo();
        if($("#load_cargo").val() == '1'){
            // as summary
             c = $("#warehouse_details tbody tr").length ;
            var  n = $("#warehouse_details"),
                    whr= $("#pick_cargo_details tbody tr"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (c + 1) + ">");
            p.append(createTableContent('cargo_line', (c + 1), true, c))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                    .append(createTableContent('cargo_quantity', $("#pick_link_qty").val(), false, c))
                    .append(createTableContent('cargo_type_id', "", true, c))
                    .append(createTableContent('cargo_type_code', "", false, c))
                    .append(createTableContent('cargo_length', "", false, c))
                    .append(createTableContent('cargo_width', "", false, c))
                    .append(createTableContent('cargo_height', "", false, c))
                    .append(createTableContent('cargo_total_weight', "", false, c))
                    .append(createTableContent('cargo_net_weight', "", false, c))
                    .append(createTableContent('cargo_weight_unit_measurement_id', "", false, c))
                    .append(createTableContent('cargo_cubic', $("#pick_cubic").val(), false, c))

                    /*GENERAL */
                    .append(createTableContent('part_info_po_number', "", true, c))
                    .append(createTableContent('cargo_volume_weight', $("#pick_weight").val(), false, c))
                    .append(createTableContent('cargo_metric_unit_measurement_id', "", true, c))
                    .append(createTableContent('cargo_material_description', "", true, c))
                    .append(createTableContent('cargo_pieces', "", true, c))
                    .append(createTableContent('cargo_unit_weight', "", true, c))
                    .append(createTableContent('cargo_dim_fact', "", true, c))
                    .append(createTableContent('cargo_location_id', "", true, c))
                    .append(createTableContent('cargo_location_name', "", true, c))
                    .append(createTableContent('cargo_location_bin_id', "", true, c))
                    .append(createTableContent('cargo_location_bin_name', "", true, c))
                    .append(createTableContent('cargo_tare_weight', "", true, c))
                    .append(createTableContent('cargo_square_foot', "", true, c))
                    /*PART INFO */
                    .append(createTableContent('part_info_serial_number', "", true, c))
                    .append(createTableContent('part_info_barcode', "", true, c))
                    .append(createTableContent('part_info_Model', "", true, c))
                    .append(createTableContent('part_info_commodity_id', "", true, c))
                    .append(createTableContent('part_info_commodity_name', "", true, c))
                    .append(createTableContent('part_info_pro_number', "", true, c))
                    .append(createTableContent('part_info_project', "", true, c))
                    .append(createTableContent('part_info_inv_number', "", true, c))
                    .append(createTableContent('part_info_lot_number', "", true, c))
                    .append(createTableContent('part_info_sku_number', "", true, c))
                    .append(createTableContent('part_info_destination_point', "", true, c))
                    .append(createTableContent('part_info_attention', "", true, c))
                    /*EEI INFO*/
                    .append(createTableContent('eei_info_scheduleb_id', "", true, c))
                    .append(createTableContent('eei_info_scheduleb_code', "", true, c))
                    .append(createTableContent('eei_info_scheduleb_description', "", true, c))
                    .append(createTableContent('eei_info_hts_id', "", true, c))
                    .append(createTableContent('eei_info_hts_name', "", true, c))
                    .append(createTableContent('eei_info_hts_description', "", true, c))
                    .append(createTableContent('eei_info_value', "", true, c))
                    .append(createTableContent('eei_info_eccn', "", true, c))
                    .append(createTableContent('eei_info_export_id', "", true, c))
                    .append(createTableContent('eei_info_export_code', "", true, c))
                    .append(createTableContent('eei_info_license_type_id', "", true, c))
                    .append(createTableContent('eei_info_license_type_code', "", true, c))
                    .append(createTableContent('eei_info_origin', "", true, c))
                    /* HAZARDOUS */
                    .append(createTableContent('hazardous_proper_shipping_name', "", true, c))
                    .append(createTableContent('hazardous_un_id', "", true, c))
                    .append(createTableContent('hazardous_un_code', "", true, c))
                    .append(createTableContent('hazardous_un_description', "", true, c))
                    .append(createTableContent('hazardous_class_id', "", true, c))
                    .append(createTableContent('hazardous_class_description', "", true, c))
                    .append(createTableContent('hazardous_packing_group', "", true, c))
                    .append(createTableContent('hazardous_flash_point', "", true, c))
                    .append(createTableContent('hazardous_flashing_point_type', "", true, c))
                    .append(createTableContent('hazardous_special_instructions', "", true, c))
                    .append(createTableContent('hazardous_units', "", true, c))
                    .append(createTableContent('hazardous_material_page', "", true, c))
                    .append(createTableContent('hazardous_quantity', "", true, c))
                    .append(createTableContent('hazardous_label_required', "", true, c))
                    .append(createTableContent('hazardous_emergency_contact', "", true, c))
                    .append(createTableContent('hazardous_emergency_contact_phone', "", true, c))
                    /*REFERENCE*/
                    .append(createTableContent('reference_vendor_code', "", true, c))
                    .append(createTableContent('reference_vendor_name', "", true, c))
                    .append(createTableContent('reference_final_dest', "", true, c))
                    .append(createTableContent('reference_customer_reference', "", true, c))
                    /* SHIPPING REFERENCE*/
                    .append(createTableContent('shipping_type', "", true, c))
                    .append(createTableContent('shipping_date_in', "", true, c))
                    .append(createTableContent('shipping_date_out', "", true, c))
                    .append(createTableContent('user_id', "", true, c))
                    .append(createTableContent('shipping_reference', "", true, c))
                    .append(createTableContent('shipping_file', "", true, c))
                    /* OTHER REFERENCE */
                    .append(createTableContent('other_vendor_delivery', "", true, c))
                    .append(createTableContent('other_shipping_date', "", true, c))
                    .append(createTableContent('other_department_id', "", true, c))
                    .append(createTableContent('other_department_name', "", true, c))
                    .append(createTableContent('other_from_system', "", true, c))
                    .append(createTableContent('other_concession', "", true, c))
                    .append(createTableContent('other_ultimate_consignee_id', "", true, c))
                    .append(createTableContent('other_ultimate_consignee_name', "", true, c))

                    .append(createTableContent('comments_comment', "", true, c))

                    /* VEHICLE DETAILS */
                    .append(createTableContent('vehicle_vin', '', true, c))
                    .append(createTableContent('vehicle_type', '', true, c))
                    .append(createTableContent('vehicle_color', '', true, c))
                    .append(createTableContent('vehicle_year', '', true, c))
                    .append(createTableContent('vehicle_condition', '', true, c))
                    .append(createTableContent('vehicle_make', '', true, c))
                    .append(createTableContent('vehicle_keys', '', true, c))
                    .append(createTableContent('vehicle_model', '', true, c))
                    .append(createTableContent('vehicle_running', '', true, c))
                    .append(createTableContent('vehicle_trim', '', true, c))
                    .append(createTableContent('vehicle_mileage', '', true, c))
                    .append(createTableContent('vehicle_engine', '', true, c))
                    .append(createTableContent('vehicle_tag', '', true, c))
                    .append(createTableContent('vehicle_body', '', true, c))
                    .append(createTableContent('vehicle_other', '', true, c))
                    .append(createTableContent('vehicle_number', '', true, c))
                    .append(createTableContent('vehicle_state_province_id', '', true, c))
                    .append(createTableContent('vehicle_state_province_name', '', true, c))
                    .append(createTableContent('vehicle_received', '', true, c))
                    .append(createTableContent('vehicle_inspection_number', '', true, c))
                    .append(createTableContent('vehicle_inspection_date', '', true, c))
                    .append(createTableContent('vehicle_inspection_by', '', true, c))
                    .append(createTableContent('vehicle_lot_number', '', true, c))
                    .append(createTableContent('vehicle_buyer_number', '', true, c))
                    .append(createTableContent('type_package', '0' , true, c))
                    .append(createTableBtns())
            t.append(p);
                    //warehouse by warehouse
        }else if($("#load_cargo").val() == '2') {
            var tr= $("#pick_cargo_details tbody tr"); x=0;
            for (d = 0; d < tr.length; d++) {
                if (tr[d].childNodes[12].textContent == pick_select[x]) {
                    c = $("#warehouse_details tbody tr").length;
                    n = $("#warehouse_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + (c + 1 ) + ">");

                    p.append(createTableContent('cargo_line', (c + 1), true, c))
                            .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                            .append(createTableContent('cargo_quantity', tr[d].childNodes[6].textContent, false, c))
                            .append(createTableContent('cargo_type_id', "", true, c))
                            .append(createTableContent('cargo_type_code', "", false, c))
                            .append(createTableContent('cargo_length', "", false, c))
                            .append(createTableContent('cargo_width', "", false, c))
                            .append(createTableContent('cargo_height', "", false, c))
                            .append(createTableContent('cargo_total_weight', "", false, c))
                            .append(createTableContent('cargo_net_weight', "", false, c))
                            .append(createTableContent('cargo_weight_unit_measurement_id', "", false, c))
                            .append(createTableContent('cargo_cubic', tr[d].childNodes[8].textContent, false, c))

                            /*GENERAL */
                            .append(createTableContent('part_info_po_number', "", true, c))
                            .append(createTableContent('cargo_volume_weight',tr[d].childNodes[7].textContent, false, c))
                            .append(createTableContent('cargo_metric_unit_measurement_id', "", true, c))
                            .append(createTableContent('cargo_material_description', "", true, c))
                            .append(createTableContent('cargo_pieces', "", true, c))
                            .append(createTableContent('cargo_unit_weight', "", true, c))
                            .append(createTableContent('cargo_dim_fact', "", true, c))
                            .append(createTableContent('cargo_location_id', "", true, c))
                            .append(createTableContent('cargo_location_name', "", true, c))
                            .append(createTableContent('cargo_location_bin_id', "", true, c))
                            .append(createTableContent('cargo_location_bin_name', "", true, c))
                            .append(createTableContent('cargo_tare_weight', "", true, c))
                            .append(createTableContent('cargo_square_foot', "", true, c))
                            /*PART INFO */
                            .append(createTableContent('part_info_serial_number', "", true, c))
                            .append(createTableContent('part_info_barcode', "", true, c))
                            .append(createTableContent('part_info_Model', "", true, c))
                            .append(createTableContent('part_info_commodity_id', "", true, c))
                            .append(createTableContent('part_info_commodity_name', "", true, c))
                            .append(createTableContent('part_info_pro_number', "", true, c))
                            .append(createTableContent('part_info_project', "", true, c))
                            .append(createTableContent('part_info_inv_number', "", true, c))
                            .append(createTableContent('part_info_lot_number', "", true, c))
                            .append(createTableContent('part_info_sku_number', "", true, c))
                            .append(createTableContent('part_info_destination_point', "", true, c))
                            .append(createTableContent('part_info_attention', "", true, c))
                            /*EEI INFO*/
                            .append(createTableContent('eei_info_scheduleb_id', "", true, c))
                            .append(createTableContent('eei_info_scheduleb_code', "", true, c))
                            .append(createTableContent('eei_info_scheduleb_description', "", true, c))
                            .append(createTableContent('eei_info_hts_id', "", true, c))
                            .append(createTableContent('eei_info_hts_name', "", true, c))
                            .append(createTableContent('eei_info_hts_description', "", true, c))
                            .append(createTableContent('eei_info_value', "", true, c))
                            .append(createTableContent('eei_info_eccn', "", true, c))
                            .append(createTableContent('eei_info_export_id', "", true, c))
                            .append(createTableContent('eei_info_export_code', "", true, c))
                            .append(createTableContent('eei_info_license_type_id', "", true, c))
                            .append(createTableContent('eei_info_license_type_code', "", true, c))
                            .append(createTableContent('eei_info_origin', "", true, c))
                            /* HAZARDOUS */
                            .append(createTableContent('hazardous_proper_shipping_name', "", true, c))
                            .append(createTableContent('hazardous_un_id', "", true, c))
                            .append(createTableContent('hazardous_un_code', "", true, c))
                            .append(createTableContent('hazardous_un_description', "", true, c))
                            .append(createTableContent('hazardous_class_id', "", true, c))
                            .append(createTableContent('hazardous_class_description', "", true, c))
                            .append(createTableContent('hazardous_packing_group', "", true, c))
                            .append(createTableContent('hazardous_flash_point', "", true, c))
                            .append(createTableContent('hazardous_flashing_point_type', "", true, c))
                            .append(createTableContent('hazardous_special_instructions', "", true, c))
                            .append(createTableContent('hazardous_units', "", true, c))
                            .append(createTableContent('hazardous_material_page', "", true, c))
                            .append(createTableContent('hazardous_quantity', "", true, c))
                            .append(createTableContent('hazardous_label_required', "", true, c))
                            .append(createTableContent('hazardous_emergency_contact', "", true, c))
                            .append(createTableContent('hazardous_emergency_contact_phone', "", true, c))
                            /*REFERENCE*/
                            .append(createTableContent('reference_vendor_code', "", true, c))
                            .append(createTableContent('reference_vendor_name', "", true, c))
                            .append(createTableContent('reference_final_dest', "", true, c))
                            .append(createTableContent('reference_customer_reference', "", true, c))
                            /* SHIPPING REFERENCE*/
                            .append(createTableContent('shipping_type', "", true, c))
                            .append(createTableContent('shipping_date_in', "", true, c))
                            .append(createTableContent('shipping_date_out', "", true, c))
                            .append(createTableContent('user_id', "", true, c))
                            .append(createTableContent('shipping_reference', "", true, c))
                            .append(createTableContent('shipping_file', "", true, c))
                            /* OTHER REFERENCE */
                            .append(createTableContent('other_vendor_delivery', "", true, c))
                            .append(createTableContent('other_shipping_date', "", true, c))
                            .append(createTableContent('other_department_id', "", true, c))
                            .append(createTableContent('other_department_name', "", true, c))
                            .append(createTableContent('other_from_system', "", true, c))
                            .append(createTableContent('other_concession', "", true, c))
                            .append(createTableContent('other_ultimate_consignee_id', "", true, c))
                            .append(createTableContent('other_ultimate_consignee_name', "", true, c))

                            .append(createTableContent('comments_comment', "", true, c))

                            /* VEHICLE DETAILS */
                            .append(createTableContent('vehicle_vin', '', true, c))
                            .append(createTableContent('vehicle_type', '', true, c))
                            .append(createTableContent('vehicle_color', '', true, c))
                            .append(createTableContent('vehicle_year', '', true, c))
                            .append(createTableContent('vehicle_condition', '', true, c))
                            .append(createTableContent('vehicle_make', '', true, c))
                            .append(createTableContent('vehicle_keys', '', true, c))
                            .append(createTableContent('vehicle_model', '', true, c))
                            .append(createTableContent('vehicle_running', '', true, c))
                            .append(createTableContent('vehicle_trim', '', true, c))
                            .append(createTableContent('vehicle_mileage', '', true, c))
                            .append(createTableContent('vehicle_engine', '', true, c))
                            .append(createTableContent('vehicle_tag', '', true, c))
                            .append(createTableContent('vehicle_body', '', true, c))
                            .append(createTableContent('vehicle_other', '', true, c))
                            .append(createTableContent('vehicle_number', '', true, c))
                            .append(createTableContent('vehicle_state_province_id', '', true, c))
                            .append(createTableContent('vehicle_state_province_name', '', true, c))
                            .append(createTableContent('vehicle_received', '', true, c))
                            .append(createTableContent('vehicle_inspection_number', '', true, c))
                            .append(createTableContent('vehicle_inspection_date', '', true, c))
                            .append(createTableContent('vehicle_inspection_by', '', true, c))
                            .append(createTableContent('vehicle_lot_number', '', true, c))
                            .append(createTableContent('vehicle_buyer_number', '', true, c))
                            .append(createTableContent('type_package', '0', true, c))
                            .append(createTableBtns())
                    t.append(p);
                    x++;
                }
            }
            //details dims
        }else if($("#load_cargo").val() == '3'){
            for (c=0; c< pick_select.length ; c ++){
                $.ajax({
                    url: "{{ route('receipts_entries.get_details') }}",
                    data: {id_select: pick_select[c]},
                    type: 'GET',
                    success: function (e) {
                        //=============================================
                        x=0;
                        while(e[x].id != ""){

                            var r= $("#warehouse_details tbody tr").length,
                                n = $("#warehouse_details"),
                                t = n.find("tbody"),
                                u_weight= parseFloat(e[x].total_weight/ e[x].quantity),
                                p = $("<tr id=" + (r + 1 ) + ">");

                            p.append(createTableContent('cargo_line', (r + 1), true, r))
                                .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                                .append(createTableContent('cargo_quantity', e[x].quantity, false, r))
                                .append(createTableContent('cargo_type_id', e[x].cargo_type_id, true, r))
                                .append(createTableContent('cargo_type_code', e[x].cargo_type_code, false, r))
                                .append(createTableContent('cargo_length', e[x].length, false, r))
                                .append(createTableContent('cargo_width', e[x].width, false, r))
                                .append(createTableContent('cargo_height', e[x].height, false, r))
                                .append(createTableContent('cargo_total_weight', e[x].total_weight, false, r))
                                .append(createTableContent('cargo_net_weight', e[x].net_weight, false, r))
                                .append(createTableContent('cargo_weight_unit_measurement_id', e[x].weight_unit, false, r))
                                .append(createTableContent('cargo_cubic', e[x].cubic, false, r))

                                /*GENERAL */
                                .append(createTableContent('part_info_po_number', "", true, r))
                                .append(createTableContent('cargo_volume_weight',e[x].volume_weight, false, r))
                                .append(createTableContent('cargo_metric_unit_measurement_id', e[x].metric_unit, true, r))
                                .append(createTableContent('cargo_material_description', e[x].material_description, true, r))
                                .append(createTableContent('cargo_pieces', e[x].pieces, true, r))
                                .append(createTableContent('cargo_unit_weight', u_weight, true, r))
                                .append(createTableContent('cargo_dim_fact', e[x].dim_fact, true, r))
                                .append(createTableContent('cargo_location_id', e[x].location_id, true, r))
                                .append(createTableContent('cargo_location_name', e[x].location_name, true, r))
                                .append(createTableContent('cargo_location_bin_id', e[x].location_bin_id, true, r))
                                .append(createTableContent('cargo_location_bin_name', e[x].location_bin_id, true, r))
                                .append(createTableContent('cargo_tare_weight', e[x].tare_weight, true, r))
                                .append(createTableContent('cargo_square_foot', "", true, r))
                                /*PART INFO */
                                .append(createTableContent('part_info_serial_number', "", true, r))
                                .append(createTableContent('part_info_barcode', "", true, r))
                                .append(createTableContent('part_info_Model', "", true, r))
                                .append(createTableContent('part_info_commodity_id', "", true, r))
                                .append(createTableContent('part_info_commodity_name', "", true, r))
                                .append(createTableContent('part_info_pro_number', "", true, r))
                                .append(createTableContent('part_info_project', "", true, r))
                                .append(createTableContent('part_info_inv_number', "", true, r))
                                .append(createTableContent('part_info_lot_number', "", true, r))
                                .append(createTableContent('part_info_sku_number', "", true, r))
                                .append(createTableContent('part_info_destination_point', "", true, r))
                                .append(createTableContent('part_info_attention', "", true, r))
                                /*EEI INFO*/
                                .append(createTableContent('eei_info_scheduleb_id', "", true, r))
                                .append(createTableContent('eei_info_scheduleb_code', "", true, r))
                                .append(createTableContent('eei_info_scheduleb_description', "", true, r))
                                .append(createTableContent('eei_info_hts_id', "", true, r))
                                .append(createTableContent('eei_info_hts_name', "", true, r))
                                .append(createTableContent('eei_info_hts_description', "", true, r))
                                .append(createTableContent('eei_info_value', "", true, r))
                                .append(createTableContent('eei_info_eccn', "", true, r))
                                .append(createTableContent('eei_info_export_id', "", true, r))
                                .append(createTableContent('eei_info_export_code', "", true, r))
                                .append(createTableContent('eei_info_license_type_id', "", true, r))
                                .append(createTableContent('eei_info_license_type_code', "", true, r))
                                .append(createTableContent('eei_info_origin', "", true, r))
                                /* HAZARDOUS */
                                .append(createTableContent('hazardous_proper_shipping_name', "", true, r))
                                .append(createTableContent('hazardous_un_id', "", true, r))
                                .append(createTableContent('hazardous_un_code', "", true, r))
                                .append(createTableContent('hazardous_un_description', "", true, r))
                                .append(createTableContent('hazardous_class_id', "", true, r))
                                .append(createTableContent('hazardous_class_description', "", true, r))
                                .append(createTableContent('hazardous_packing_group', "", true, r))
                                .append(createTableContent('hazardous_flash_point', "", true, r))
                                .append(createTableContent('hazardous_flashing_point_type', "", true, r))
                                .append(createTableContent('hazardous_special_instructions', "", true, r))
                                .append(createTableContent('hazardous_units', "", true, r))
                                .append(createTableContent('hazardous_material_page', "", true, r))
                                .append(createTableContent('hazardous_quantity', "", true, r))
                                .append(createTableContent('hazardous_label_required', "", true, r))
                                .append(createTableContent('hazardous_emergency_contact', "", true, r))
                                .append(createTableContent('hazardous_emergency_contact_phone', "", true, r))
                                /*REFERENCE*/
                                .append(createTableContent('reference_vendor_code', "", true, r))
                                .append(createTableContent('reference_vendor_name', "", true, r))
                                .append(createTableContent('reference_final_dest', "", true, r))
                                .append(createTableContent('reference_customer_reference', "", true, r))
                                /* SHIPPING REFERENCE*/
                                .append(createTableContent('shipping_type', "", true, r))
                                .append(createTableContent('shipping_date_in', "", true, r))
                                .append(createTableContent('shipping_date_out', "", true, r))
                                .append(createTableContent('user_id', "", true, r))
                                .append(createTableContent('shipping_reference', "", true, r))
                                .append(createTableContent('shipping_file', "", true, r))
                                /* OTHER REFERENCE */
                                .append(createTableContent('other_vendor_delivery', "", true, r))
                                .append(createTableContent('other_shipping_date', "", true, r))
                                .append(createTableContent('other_department_id', "", true, r))
                                .append(createTableContent('other_department_name', "", true, r))
                                .append(createTableContent('other_from_system', "", true, r))
                                .append(createTableContent('other_concession', "", true, r))
                                .append(createTableContent('other_ultimate_consignee_id', "", true, r))
                                .append(createTableContent('other_ultimate_consignee_name', "", true, r))

                                .append(createTableContent('comments_comment', "", true, r))

                                /* VEHICLE DETAILS */
                                .append(createTableContent('vehicle_vin', '', true, r))
                                .append(createTableContent('vehicle_type', '', true, r))
                                .append(createTableContent('vehicle_color', '', true, r))
                                .append(createTableContent('vehicle_year', '', true, r))
                                .append(createTableContent('vehicle_condition', '', true, r))
                                .append(createTableContent('vehicle_make', '', true, r))
                                .append(createTableContent('vehicle_keys', '', true, r))
                                .append(createTableContent('vehicle_model', '', true, r))
                                .append(createTableContent('vehicle_running', '', true, r))
                                .append(createTableContent('vehicle_trim', '', true, r))
                                .append(createTableContent('vehicle_mileage', '', true, r))
                                .append(createTableContent('vehicle_engine', '', true, r))
                                .append(createTableContent('vehicle_tag', '', true, r))
                                .append(createTableContent('vehicle_body', '', true, r))
                                .append(createTableContent('vehicle_other', '', true, r))
                                .append(createTableContent('vehicle_number', '', true, r))
                                .append(createTableContent('vehicle_state_province_id', '', true, r))
                                .append(createTableContent('vehicle_state_province_name', '', true, r))
                                .append(createTableContent('vehicle_received', '', true, r))
                                .append(createTableContent('vehicle_inspection_number', '', true, r))
                                .append(createTableContent('vehicle_inspection_date', '', true, r))
                                .append(createTableContent('vehicle_inspection_by', '', true, r))
                                .append(createTableContent('vehicle_lot_number', '', true, r))
                                .append(createTableContent('vehicle_buyer_number', '', true, r))
                                .append(createTableContent('type_package', '0', true, r))
                                .append(createTableBtns())
                            t.append(p);
                            x++;

                        }

                    }
                });
            }
        }
        warehouse_receipts_id(pick_select);
        $("#PickCargo").modal("hide");
        calculate_warehouse_details();


    });
    function warehouse_receipts_id(pick_select){
        var l= $("#warehouse_receipts_id tbody tr").length,
            t= $("#warehouse_receipts_id"),
            b= t.find("tbody");
        for (var x=0 ; x < pick_select.length; x++){
            var r= $("<tr id= "+ (l + 1) +">");
            r.append(createTableContent('line_warehouse_id', (l + 1), true, x))
                .append(createTableContent('whr_id', pick_select[x], true, x))
            t.append(r);
            l++;
        }
    }

    $("#cargo_quantity").number(true);
    $("#cargo_pieces").number(true);
    $("#cargo_length").number(true, 3);
    $("#cargo_width").number(true, 3);
    $("#cargo_height").number(true, 3);
    $("#cargo_unit_weight").number(true, 3);
    $("#cargo_total_weight").number(true, 3).attr("readonly", true);
    $("#cargo_cubic").number(true, 3).attr("readonly", true);
    $("#cargo_volume_weight").number(true, 3).attr("readonly", true);
    $("#cargo_tare_weight").number(true, 3);
    $("#cargo_net_weight").number(true, 3);
    $("#cargo_square_foot").number(true, 3).attr("readonly", true);
    $("#item_unit_weight").number(true,2);


    $("#vehicle_quantity").number(true);
    $("#vehicle_pieces").number(true);
    $("#vehicle_length").number(true, 3);
    $("#vehicle_width").number(true, 3);
    $("#vehicle_height").number(true, 3);
    $("#vehicle_unit_weight").number(true, 3);
    $("#vehicle_total_weight").number(true, 3).attr("readonly", true);
    $("#vehicle_cubic_weight").number(true, 3).attr("readonly", true);
    $("#vehicle_volume_weight").number(true, 3).attr("readonly", true);
    $("#vehicle_tare_weight").number(true, 3);
    $("#vehicle_net_weight").number(true, 3);
    $("#vehicle_square_foot").number(true, 3).attr("readonly", true);

    $("#third_value").number(true, 2);
    $("#third_declared_value").number(true, 2);
    $("#third_insured_value").number(true, 2);
    $("#freight_terms_amt").number(true, 2);
    $("#cod_terms_amt").number(true, 2);
    $("#hazardous_flash_point").number(true, 2);

    $("#stop_length").number(true, 3);
    $("#stop_width").number(true, 3);
    $("#stop_height").number(true, 3);
    $("#stop_weight").number(true, 3);

    $("#dr_cargo_grossw").number(true, 3);
    $("#dr_cargo_cubic").number(true, 3);
    $("#dr_cargo_chgrw").number(true, 3).attr("readonly", true);
    $("#dr_cargo_rate").number(true, 3);
    $("#dr_cargo_amount").number(true, 3).attr("readonly", true);
    $("#dr_cargo_pieces").number(true);
    $("#eei_info_value").number(true, 3);

    $("#cost_quantity").number(true, 3);
    $("#cost_rate").number(true, 3);
    $("#cost_amount").number(true, 2).attr("readonly", true);
    $("#billing_quantity").number(true, 3);
    $("#billing_increase").number(true, 2);
    $("#billing_rate").number(true, 3);
    $("#billing_amount").number(true, 2).attr("readonly", true);

    $("#transportation_plans_amount").number(true, 3).attr("readonly", true);
    $("#transportation_amount").number(true, 3);

    $("#sum_pieces").number(true);
    $("#sum_packages").number(true);
    $("#sum_weight").number(true,3);
    $("#sum_volume_weight").number(true,3);
    $("#sum_net_weight").number(true, 3);
    $("#sum_cubic").number(true, 3);

    $("#user_id").attr("readonly", true);
    $("#pd_code").attr("readonly", true);
    $("#sum_bill").number(true,2);
    $("#sum_cost").number(true,2);
    $("#sum_profit").number(true,2);
    $("#sum_profit_percent").number(true,2);
    $("#billing_customer_name").attr("readonly", true);
    $("#billing_exchange_rate").number(true,2);
    $("#cost_exchange_rate").number(true,2);
    $("#charges_amount").number(true, 3).attr("readonly", true);

    $("#third_exchange_currency").number(true, 2);
    $("#history_invoice").attr("readonly", true);
    $("#history_invoice_date").attr("readonly", true);
    $("#history_user_id").attr("readonly", true);
    $("#history_je_number").attr("readonly", true);
    $("#history_posted_period").attr("readonly", true);
    $("#history_posted_date").attr("readonly", true);

    $("#pick_linked").number(true).attr("readonly", true);
    $("#pick_link_qty").number(true, 3).attr("readonly", true);
    $("#pick_weight").number(true, 3).attr("readonly", true);
    $("#pick_cubic").number(true, 3).attr("readonly", true);
    $("#pick_unlinked").number(true).attr("readonly", true);

    //
    $("#sum_weight_unit").val("L").change();

</script>