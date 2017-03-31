<script type="text/javascript">
    $("#btn_charge_details").click(function() {
        $("#billing_bill_party").val("C").change();
        $("#billing_bill_type").val("C").change();
        $("#billing_currency_type").val("1").change();
        $("#cost_currency_type").val("1").change();
        $("#billing_unit_id").val("0").change();
        $("#cost_unit_id").val("0").change();
    });

    $("#btn_cargo_details").click(function() {
        $("#tmp_cargo_type_id").val("0").change();
        $("#tmp_cargo_location_id").val("0").change();
        $("#tmp_cargo_location_bin_id").val("").change();
        $("#tmp_cargo_weight_unit_measurement_id").val("L").change();
        $("#tmp_cargo_metric_unit_measurement_id").val("I").change();
        $("#tmp_cargo_dim_fact").val("I").change();
    });

    $("#btn_container_details").click(function() {
        $("#equipment_type_id").val("0").change();
    });


    $("#charge_save").click(function() {
            var t = $("#charge_table tbody tr").length + 1,
                _ =  ($("#charge_table tbody tr").length == 0 ? 1 : parseInt($("#charge_table tbody tr")[$("#charge_table tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                charge_id = $("#charge_id").val(),
                d= (0== charge_id? _: charge_id)-1,
                g_1 = $("#billing_billing_id").val(),
                g_2 = $("#billing_billing_code").val(),
                g_3 = $("#billing_billing_description").val(),
                g_4 = $("#billing_bill_type").val(),
                g_5 = $("#special_billing").val(),
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
                g_28 = $("#cost_reference").val().toUpperCase(),
                b = $("#charge_table"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");

            C.append(createTableContent('charge_id', (0== charge_id? _ : charge_id) , true,d))
                .append(createTableContent('billing_billing_id', g_1, true, d))
                .append(createTableContent('billing_billing_code', g_2, false, d))
                .append(createTableContent('billing_billing_description', g_3, false, d))
                .append(createTableContent('billing_bill_type', g_4, false, d))
                .append(createTableContent('special_billing', g_5, true, d))
                .append(createTableContent('billing_quantity', g_7, false, d))
                .append(createTableContent('billing_rate', g_11, true, d))
                .append(createTableContent('billing_amount', g_12, false, d))
                .append(createTableContent('billing_currency_type', g_13, true, d))
                .append(createTableContent('billing_customer_name', g_16, true, d))
                .append(createTableContent('cost_amount', g_21, false, d))
                .append(createTableContent('cost_currency_type', g_22, true, d))
                .append(createTableContent('cost_invoice', g_27, true, d))
                .append(createTableContent('cost_reference', g_28, true, d))


                .append(createTableContent('billing_notes', g_6, true, d))
                .append(createTableContent('billing_unit_id', g_8, true, d))
                .append(createTableContent('billing_unit_name', g_9, true, d))
                .append(createTableContent('billing_exchange_rate', g_14, true, d))
                .append(createTableContent('billing_customer_id', g_15, true, d))
                .append(createTableContent('cost_quantity', g_17, true, d))
                .append(createTableContent('cost_unit_id', g_18, true, d))
                .append(createTableContent('cost_unit_name', g_19, true, d))
                .append(createTableContent('cost_rate', g_20, true, d))
                .append(createTableContent('cost_exchange_rate', g_23, true, d))
                .append(createTableContent('billing_vendor_code', g_24, true, d))
                .append(createTableContent('billing_vendor_name', g_25, true, d))
                .append(createTableContent('cost_date', g_26, true, d))
                .append(createTableContent('billing_increase', g_10, true, d))
                .append(createTableBtns()),

                0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C),values_charges(), cleanModalFields("charge_details"),$("#billing_bill_party").val("C").change(),$("#billing_bill_type").val("C").change(), $("#billing_currency_type").val("1").change(), $("#cost_currency_type").val("1").change(), $("#billing_unit_id").val("0").change(),  $("#cost_unit_id").val("0").change(),  $("#charge_details").modal("show"), $("#ChargeModal").formValidation("resetForm", true), $("#billing_billing_code").focus()


    }), $("#charge_table").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                values_charges();
            }
        });
    }), $("#charge_table").on("click", "a.btn-default", function() {
        removeEmptyNodes('charge_table');
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
            g29 = t[0].childNodes[28].textContent;

        $("#charge_id").val(g1); $("#billing_billing_id").val(g2); $("#billing_billing_code").val(g3); $("#billing_billing_description").val(g4); $("#billing_bill_type").val(g5).change(); $("#special_billing").val(g6).change(); $("#billing_quantity").val(g7); $("#billing_rate").val(g8); $("#billing_amount").val(g9); $("#billing_currency_type").val(g10).change(); $("#billing_customer_name").val(g11); $("#cost_amount").val(g12); $("#cost_currency_type").val(g13).change(); $("#cost_invoice").val(g14); $("#cost_reference").val(g15); $("#billing_notes").val(g16); $("#billing_unit_id").val(g17).change(); $("#billing_unit_name").val(g18); $("#billing_exchange_rate").val(g19); $("#billing_customer_id").val(g20); $("#cost_quantity").val(g21); $("#cost_unit_id").val(g22).change(); $("#cost_unit_name").val(g23); $("#cost_rate").val(g24); $("#cost_exchange_rate").val(g25); $("#billing_vendor_code").val(g26); $("#billing_vendor_name").val(g27); $("#cost_date").val(g28); $("#billing_increase").val(g29); $("#charge_details").modal("show"); $("#billing_billing_code").focus();
    });

    $("#container_save").click(function() {
        var t = $("#container_table tbody tr").length + 1,
            _ =  ($("#container_table tbody tr").length == 0 ? 1 : parseInt($("#container_table tbody tr")[$("#container_table tbody tr").length - 1].childNodes[0].textContent) + 1 ),

            container_id = $("#container_line").val(),
            d= (0== container_id? _: container_id)-1,
            g_1 = $("#equipment_type_id").val(),
            g_2 = $("#equipment_type_code").val(),
            g_3 = $("#container_number").val(),
            g_4 = $("#container_seal_number").val(),
            b = $("#container_table"),
            x = b.find("tbody"),
            C = $("<tr id=" + (0== container_id? _ : container_id) + ">");
        C.append(createTableContent('container_line', (0== container_id? _ : container_id) , true,d))
            .append(createTableContent('equipment_type_id', g_1, true, d))
            .append(createTableContent('equipment_type_code', g_2, false, d))
            .append(createTableContent('container_number', g_3, false, d))
            .append(createTableContent('container_seal_number', g_4, false, d))
            .append(createTableBtns());
            0 == container_id ? x.append(C) : x.find("tr#" + container_id).replaceWith(C);
            cleanModalFields("container_details");
            $("#equipment_type_id").val("0").change();
            $("#container_details").modal("show");

    }); $("#container_table").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
            }
        });
    }); $("#container_table").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
            g1 = t[0].childNodes[0].textContent,
            g2 = t[0].childNodes[1].textContent,
            g3 = t[0].childNodes[2].textContent,
            g4 = t[0].childNodes[3].textContent,
            g5 = t[0].childNodes[4].textContent;
            $("#container_line").val(g1);
            $("#equipment_type_id").val(g2);
            $("#equipment_type_code").val(g3);
            $("#container_number").val(g4);
            $("#container_seal_number").val(g5);
         $("#container_details").modal("show");
    });

    $("#cargo_save").click(function() {
        var t = $("#cargo_table tbody tr").length + 1,
            _ =  ($("#cargo_table tbody tr").length == 0 ? 1 : parseInt($("#cargo_table tbody tr")[$("#cargo_table tbody tr").length - 1].childNodes[0].textContent) + 1 ),

            a = $("#tmp_cargo_line").val(),
            w =(0 == a ? _ : a)-1,
            e = $("#tmp_cargo_quantity").val(),
            d = $("#tmp_cargo_type_id").val(),
            o = $("#tmp_cargo_type_code").val(),
            n = $("#tmp_cargo_pieces").val(),
            i = $("#tmp_cargo_weight_unit_measurement_code").val(),
            c = $("#tmp_cargo_metric_unit_measurement_code").val(),
            f = $("#tmp_cargo_dim_fact").val(),
            l = $("#tmp_cargo_length").val(),
            r = $("#tmp_cargo_width").val(),
            _ = $("#tmp_cargo_height").val(),
            p = $("#tmp_cargo_total_weight").val(),
            s = $("#tmp_cargo_cubic").val(),
            g = $("#tmp_cargo_volume_weight").val(),
            h = $("#tmp_cargo_location_id").val(),
            v = $("#tmp_cargo_location_name").val(),
            u = $("#tmp_cargo_location_bin_id").val(),
            m = $("#tmp_cargo_location_bin_name").val(),
            k = $("#tmp_cargo_material_description").val(),
            j= $("#tmp_cargo_unit_weight").val(),
            b = $("#cargo_table"),
            x = b.find("tbody"),
            C = $("<tr id=" + (0 == a ? _ : a) + ">");

        C.append(createTableContent('cargo_line', (0 == a ? _ : a), true, w))
            .append(createTableContent('cargo_quantity', e, false, w))
            .append(createTableContent('cargo_type_id', d, true, w))
            .append(createTableContent('cargo_type_code', o, false, w))
            .append(createTableContent('cargo_pieces', n, false, w))
            .append(createTableContent('cargo_weight_unit_measurement_id', i, false, w))
            .append(createTableContent('cargo_metric_unit_measurement_id', c, true, w))
            .append(createTableContent('cargo_dim_fact', f, true, w))
            .append(createTableContent('cargo_length', l, false, w))
            .append(createTableContent('cargo_width', r, false, w))
            .append(createTableContent('cargo_height', _, false, w))
            .append(createTableContent('cargo_total_weight', p, false, w))
            .append(createTableContent('cargo_cubic', s, false, w))
            .append(createTableContent('cargo_volume_weight', g, false, w))
            .append(createTableContent('cargo_location_id', h, true, w))
            .append(createTableContent('cargo_location_name', v, true, w))
            .append(createTableContent('cargo_location_bin_id', u, true, w))
            .append(createTableContent('cargo_material_description', k, true, w))
            .append(createTableContent('cargo_unit_weight', j, true, w))

            .append(createTableBtns()), 0 == a ? x.append(C) : x.find("tr#" + a).replaceWith(C),  cleanModalFields('cargo_details'), $("#tmp_cargo_type_id").val(0).change(), $("#tmp_cargo_quantity").val(""), $("#tmp_cargo_pieces").val(""), $("#tmp_cargo_location_id").val(0).change(), $("#tmp_cargo_location_bin_id").val(0).change(), $("#tmp_cargo_weight_unit_measurement_id").val("L").change(),$("#tmp_cargo_metric_unit_measurement_id").val("I").change(),$("#tmp_cargo_dim_fact").val("I").change(), calculate_cargo(); $("#tmp_cargo_quantity").focus()

    }), $("#cargo_table").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                calculate_cargo();
            }
        });
    }); $("#cargo_table").on("click", "a.btn-default", function() {
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
            g19 = t[0].childNodes[18].textContent;

            $("#tmp_cargo_line").val(g1);
            $("#tmp_cargo_quantity").val(g2);
            $("#tmp_cargo_type_id").val(g3);
            $("#tmp_cargo_type_code").val(g4);
            $("#tmp_cargo_pieces").val(g5);
            $("#tmp_cargo_weight_unit_measurement_code").val(g6);
            $("#tmp_cargo_metric_unit_measurement_code").val(g7);
            $("#tmp_cargo_dim_fact").val(g8);
            $("#tmp_cargo_length").val(g9);
            $("#tmp_cargo_width").val(g10);
            $("#tmp_cargo_height").val(g11);
            $("#tmp_cargo_total_weight").val(g12);
            $("#tmp_cargo_cubic").val(g13);
            $("#tmp_cargo_volume_weight").val(g14);
            $("#tmp_cargo_location_id").val(g15);
            $("#tmp_cargo_location_name").val(g16);
            $("#tmp_cargo_location_bin_id").val(g17);
            $("#tmp_cargo_material_description").val(g18);
            $("#tmp_cargo_unit_weight").val(g19);
            $("#cargo_details").modal("show");
    });
</script>