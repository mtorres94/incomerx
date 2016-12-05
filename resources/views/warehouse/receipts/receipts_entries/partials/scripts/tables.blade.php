<!--suppress JSUnresolvedVariable -->
<!-- Tables scripts -->
<script type="text/javascript">
    $("#btn-cargo").click(function() {
        $("#tmp_cargo_quantity").val(1);
        $("#tmp_cargo_pieces").val(1);
        $("#tmp_cargo_metric_unit_measurement_id").val("I").change();
        $("#tmp_cargo_weight_unit_measurement_id").val("L").change();
        $("#tmp_cargo_dim_fact").val("I").change();

        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    }), $("#btn-cargo-multiline").click(function() {
        $("#multiline_cargo_quantity").val(1);
        $("#multiline_cargo_pieces").val(1);
        $("#multiline_cargo_metric_unit_measurement_id").val("I").change();
        $("#multiline_cargo_weight_unit_measurement_id").val("L").change();
        $("#multiline_cargo_dim_fact").val("I").change();

        for (var t = $("#cargo-multiline-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    }), $("#btn-charges").click(function() {
        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {

            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        $("#tmp_billing_bill_type").val("C").change(), $("#tmp_billing_bill_party").val("C").change();
    }), $("#hazardous-save").click(function() {
        var r = ($('#hazardous-details tbody tr').length + 1),
                c = r - 1,
                l = $("#tmp_hazardous_uns_line").val(),
                a = $("#tmp_hazardous_uns_id").val(),
                d = $("#tmp_hazardous_uns_code").val().toUpperCase(),
                s = $("#tmp_hazardous_uns_desc").val().toUpperCase(),
                e = $("#tmp_hazardous_uns_note").val().toUpperCase(),
                n = $("#hazardous-details"),
                t = n.find("tbody"),
                p = $("<tr id=" + r + ">");
        p.append(createTableContent('hazardous_uns_id', a, true, c))
                .append(createTableContent('hazardous_uns_line', (0 == l ? r : l), true, c))
                .append(createTableContent('hazardous_uns_code', d, false, c))
                .append(createTableContent('hazardous_uns_desc', s, false, c))
                .append(createTableContent('hazardous_uns_note', e, false, c))
                .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('UNs'), $("#tmp_hazardous_uns_code").focus()
    }), $('#hazardous-details').on('click', 'a.btn-danger', function() {
        $(this).closest('tr').remove()
    }), $("#hazardous-details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                o = t[0].childNodes[0].textContent,
                r = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent,
                d = t[0].childNodes[4].textContent;
        $('#tmp_hazardous_uns_line').val(r), $("#tmp_hazardous_uns_id").val(o), $("#tmp_hazardous_uns_code").val(s), $("#tmp_hazardous_uns_desc").val(a), $("#tmp_hazardous_uns_note").val(d), $("#UNs").modal("show")
    }), $("#receiving-save").click(function() {
        var r = ($('#receiving-details tbody tr').length + 1),
                c = r - 1,
                l = $("#tmp_receiving_line").val(),
                a = $("#tmp_receiving_pro_number").val().toUpperCase(),
                d = $("#tmp_receiving_details").val().toUpperCase(),
                s = $("#tmp_receiving_remarks").val().toUpperCase(),
                n = $("#receiving-details"),
                t = n.find("tbody"),
                p = $("<tr id=" + r + ">");
        p.append(createTableContent('receiving_line', (0 == l ? r : l), true, c))
                .append(createTableContent('receiving_pro_number', a, false, c))
                .append(createTableContent('receiving_details', d, false, c))
                .append(createTableContent('receiving_remarks', s, true, c))
                .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('PRO-Numbers'), $("#tmp_receiving_pro_number").focus()
    }), $('#receiving-details').on('click', 'a.btn-danger', function() {
        $(this).closest('tr').remove()
    }), $("#receiving-details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                o = t[0].childNodes[0].textContent,
                r = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent;
        $('#tmp_receiving_line').val(o), $("#tmp_receiving_pro_number").val(r), $("#tmp_receiving_details").val(s), $("#tmp_receiving_remarks").val(a), $("#PRO-Numbers").modal("show")
    }), $("#references-save").click(function() {
        var r = ($('#references-details tbody tr').length + 1),
                c = r - 1,
                l = $("#tmp_references_line").val(),
                a = $("#tmp_references_po_number").val().toUpperCase(),
                d = $("#tmp_references_ref_number").val().toUpperCase(),
                s = $("#tmp_references_booking_number").val().toUpperCase(),
                e = $("#tmp_references_inv_number").val().toUpperCase(),
                i = $("#tmp_references_invoice_amount").val(),
                m = $("#tmp_references_note").val().toUpperCase(),
                n = $("#references-details"),
                t = n.find("tbody"),
                p = $("<tr id=" + r + ">");
        p.append(createTableContent('references_line', (0 == l ? r : l), true, c))
                .append(createTableContent('references_po_number', a, false, c))
                .append(createTableContent('references_ref_number', d, false, c))
                .append(createTableContent('references_inv_number', e, true, c))
                .append(createTableContent('references_booking_number', s, false, c))
                .append(createTableContent('references_invoice_amount', i, true, c))
                .append(createTableContent('references_note', m, true, c))
                .append(createTableBtns()), 0 == l ? t.append(p) : t.find("tr#" + l).replaceWith(p), cleanModalFields('References'), $("#tmp_references_po_number").focus()
    }), $('#references-details').on('click', 'a.btn-danger', function() {
        $(this).closest('tr').remove()
    }), $("#references-details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                r = t[0].childNodes[0].textContent,
                o = t[0].childNodes[1].textContent,
                s = t[0].childNodes[2].textContent,
                a = t[0].childNodes[3].textContent,
                d = t[0].childNodes[4].textContent,
                i = t[0].childNodes[5].textContent,
                m = t[0].childNodes[6].textContent;
        $('#tmp_references_line').val(r), $("#tmp_references_po_number").val(o), $("#tmp_references_ref_number").val(s), $("#tmp_references_inv_number").val(a), $("#tmp_references_booking_number").val(d), $("#tmp_references_invoice_amount").val(i), $("#tmp_references_note").val(m), $("#References").modal("show")
    }), $("#cargo-warehouse-save").click(function() {
        var t = $("#warehouse-details tbody tr").length + 1,
                z = t - 1,
                a = $("#tmp_cargo_line").val(),
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
                b = $("#warehouse-details"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0 == a ? t : a) + ">");
                w = (0 == a ? z : a - 1);
            C.append(createTableContent('cargo_line', (0 == a ? t : a), true, w))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
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
                    .append(createTableContent('cargo_location_name', v, false, w))
                    .append(createTableContent('cargo_location_bin_id', u, true, w))
                    .append(createTableContent('cargo_location_bin_name', m, false, w))
                    .append($("<td></td>"))
                    .append(createTableContent('cargo_material_description', k, true, w))
                    .append($("<td></td>"))
                    .append(createTableBtns()), 0 == a ? x.append(C) : x.find("tr#" + a).replaceWith(C), calculate_warehouse_details(), cleanModalFields('cargo-warehouse'), $("#tmp_cargo_quantity").val(1), $("#tmp_cargo_quantity").focus()
    }), $("#warehouse-details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove()
    }), $("#warehouse-details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
                a = t[0].childNodes[0].textContent,
                e = t[0].childNodes[2].textContent,
                d = t[0].childNodes[3].textContent,
                o = t[0].childNodes[4].textContent,
                n = t[0].childNodes[5].textContent,
                i = t[0].childNodes[6].textContent,
                c = t[0].childNodes[7].textContent,
                f = t[0].childNodes[8].textContent,
                l = t[0].childNodes[9].textContent,
                r = t[0].childNodes[10].textContent,
                _ = t[0].childNodes[11].textContent,
                p = t[0].childNodes[12].textContent,
                s = t[0].childNodes[13].textContent,
                g = t[0].childNodes[15].textContent,
                h = t[0].childNodes[16].textContent,
                v = t[0].childNodes[17].textContent,
                u = t[0].childNodes[18].textContent,
                m = t[0].childNodes[19].textContent,
                k = t[0].childNodes[20].textContent;
        $("#tmp_cargo_line").val(a), $("#tmp_cargo_quantity").val(e), $("#tmp_cargo_type_id").val(d).change(), $("#tmp_cargo_type_code").val(o), $("#tmp_cargo_pieces").val(n), $("#tmp_cargo_weight_unit_measurement_id").val(i).change(), $("#tmp_cargo_metric_unit_measurement_id").val(c).change(), $("#tmp_cargo_dim_fact").val(f).change(), $("#tmp_cargo_length").val(l), $("#tmp_cargo_width").val(r), $("#tmp_cargo_height").val(_), $("#tmp_cargo_total_weight").val(p), $("#tmp_cargo_cubic").val(s), $("#tmp_cargo_volume_weight").val(g), $("#tmp_cargo_location_id").val(h), $("#tmp_cargo_location_name").val(v), $("#tmp_cargo_location_bin_id").val(u), $("#tmp_cargo_location_bin_name").val(m), $("#tmp_cargo_material_description").val(k), calculate(), $("#cargo-warehouse").modal("show")
    }), $("#cargo-multiline-warehouse-save").click(function() {
        var t = $("#warehouse-details tbody tr").length + 1,
                z = parseInt(t) - 1,
                j = parseInt($("#multiline_records").val()) + t,
                a = $("#multiline_cargo_line").val(),
                e = $("#multiline_cargo_quantity").val(),
                d = $("#multiline_cargo_type_id").val(),
                o = $("#multiline_cargo_type_code").val(),
                n = $("#multiline_cargo_pieces").val(),
                i = $("#multiline_cargo_weight_unit_measurement_code").val(),
                c = $("#multiline_cargo_metric_unit_measurement_code").val(),
                f = $("#multiline_cargo_dim_fact").val(),
                l = $("#multiline_cargo_length").val(),
                r = $("#multiline_cargo_width").val(),
                _ = $("#multiline_cargo_height").val(),
                p = $("#multiline_cargo_total_weight").val(),
                s = $("#multiline_cargo_cubic").val(),
                g = $("#multiline_cargo_volume_weight").val(),
                h = $("#multiline_cargo_location_id").val(),
                v = $("#multiline_cargo_location_name").val(),
                u = $("#multiline_cargo_location_bin_id").val(),
                m = $("#multiline_cargo_location_bin_name").val(),
                k = $("#multiline_cargo_material_description").val(),
                b = $("#warehouse-details"),
                x = b.find("tbody");
            for (var q = t; q < j; q++) {
                var w = parseInt(q) - 1,
                    C = $("<tr id=" + (parseInt(q)) + ">");
                C.append(createTableContent('cargo_line', q, true, w))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                    .append(createTableContent('cargo_quantity', e, false, w))
                    .append(createTableContent('cargo_type_id', d, true, w))
                    .append(createTableContent('cargo_type_code', o, false, w))
                    .append(createTableContent('cargo_pieces', n, false, w))
                    .append(createTableContent('cargo_weight_unit_measurement_id', i, false, w))
                    .append(createTableContent('cargo_metric_unit_measurement_id', c, true, w))
                    .append(createTableContent('cargo_dim_fact', f, false, w))
                    .append(createTableContent('cargo_length', l, false, w))
                    .append(createTableContent('cargo_width', r, false, w))
                    .append(createTableContent('cargo_height', _, false, w))
                    .append(createTableContent('cargo_total_weight', p, false, w))
                    .append(createTableContent('cargo_cubic', s, false, w))
                    .append(createTableContent('cargo_volume_weight', g, false, w))
                    .append(createTableContent('cargo_location_id', h, true, w))
                    .append(createTableContent('cargo_location_name', v, false, w))
                    .append(createTableContent('cargo_location_bin_id', u, true, w))
                    .append(createTableContent('cargo_location_bin_name', m, false, w))
                    .append($("<td></td>"))
                    .append(createTableContent('cargo_material_description', k, true, w))
                    .append($("<td></td>"))
                    .append(createTableBtns()), x.append(C)
            }
        calculate_warehouse_details(), cleanModalFields('cargo-multiline-warehouse'), $("#multiline_cargo_quantity").val(1), $("#multiline_cargo_quantity").focus()
    }), $("#charges-save").click(function() {
        var t = $("#charge-details tbody tr").length + 1,
                d= t - 1,
                charge_id = $("#charge_id").val(),
                g_1 = $("#tmp_billing_billing_id").val(),
                g_2 = $("#tmp_billing_billing_code").val(),
                g_3 = $("#tmp_billing_billing_description").val(),
                g_4 = $("#tmp_billing_bill_type").val(),
                g_5 = $("#tmp_billing_bill_party").val(),
                g_5 = (g_5 == null) ? "C" : g_5,
                g_6 = $("#tmp_billing_notes").val(),
                g_7 = $("#tmp_billing_quantity").val(),
                g_8 = $("#tmp_billing_unit_id").val(),
                g_9 = $("#tmp_billing_unit_name").val().toUpperCase(),
                g_10 = $("#tmp_billing_increase").val(),
                g_11 = $("#tmp_billing_rate").val(),
                g_12 = $("#tmp_billing_amount").val(),
                g_13 = $("#tmp_billing_currency_type").val(),
                g_13 = (g_13 == null) ? "C" : g_13,
                g_14 = $("#tmp_billing_exchange_rate").val(),
                g_15 = $("#tmp_billing_customer_id").val(),
                g_16 = $("#tmp_billing_customer_name").val().toUpperCase(),
                g_17 = $("#tmp_cost_quantity").val(),
                g_18 = $("#tmp_cost_unit_id").val(),
                g_19 = $("#tmp_cost_unit_name").val().toUpperCase(),
                g_20 = $("#tmp_cost_rate").val(),
                g_21 = $("#tmp_cost_amount").val(),
                g_22 = $("#tmp_cost_currency_type").val(),
                g_22 = (g_22 == null) ? "1" : g_22,
                g_23 = $("#tmp_cost_exchange_rate").val(),
                g_24 = $("#tmp_billing_vendor_code").val(),
                g_25 = $("#tmp_billing_vendor_name").val().toUpperCase(),
                g_26 = $("#tmp_cost_date").val(),
                g_27 = $("#tmp_cost_invoice").val().toUpperCase(),
                g_28 = $("#tmp_cost_cost_center").val().toUpperCase(),
                g_29 = $("#tmp_cost_reference").val().toUpperCase(),
                b = $("#charge-details"),
                x = b.find("tbody"),
                C = $("<tr id=" + t + ">");

        C.append(createTableContent('charge_id', (0 == charge_id ? t : charge_id), true,d))
                .append(createTableContent('billing_billing_id', g_1, true, d))
                .append(createTableContent('billing_billing_code', g_2, false, d))
                .append(createTableContent('billing_billing_description', g_3, false, d))
                .append(createTableContent('billing_bill_type', g_4, false, d))
                .append(createTableContent('billing_quantity', g_7, false, d))
                .append(createTableContent('billing_rate', g_11, false, d))
                .append(createTableContent('billing_amount', g_12, false, d))
                .append(createTableContent('billing_currency_type', g_13, false, d))
                .append(createTableContent('billing_customer_name', g_16, false, d))
                .append(createTableContent('billing_increase', g_10, true, d))
                .append(createTableContent('cost_cost_center', g_28, true, d))
                .append(createTableContent('cost_currency_type', g_22, true, d))
                .append(createTableContent('cost_invoice', g_27, true, d))
                .append(createTableContent('cost_reference', g_29, true, d))

                .append(createTableContent('billing_bill_party', g_5, true, d))
                .append(createTableContent('billing_notes', g_6, true, d))
                .append(createTableContent('billing_unit_id', g_8, true, d))
                .append(createTableContent('billing_unit_name', g_9, true, d))
                .append(createTableContent('billing_exchange_rate', g_14, true, d))
                .append(createTableContent('billing_customer_id', g_15, true, d))
                .append(createTableContent('cost_quantity', g_17, true, d))
                .append(createTableContent('cost_unit_id', g_18, true, d))
                .append(createTableContent('cost_unit_name', g_19, true, d))
                .append(createTableContent('cost_rate', g_20, true, d))
                .append(createTableContent('cost_amount', g_21, true, d))
                .append(createTableContent('cost_exchange_rate', g_23, true, d))
                .append(createTableContent('billing_vendor_code', g_24, true, d))
                .append(createTableContent('billing_vendor_name', g_25, true, d))
                .append(createTableContent('cost_date', g_26, true, d))
                .append(createTableBtns()), 0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), cleanModalFields('charge_details'), $("#tmp_billing_billing_code").focus()
    }), $("#charge-details").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove()
    }), $("#charge-details").on("click", "a.btn-default", function() {
        var t = $(this).closest("tr"),
            g1  = t[0].childNodes[0].textContent,
            g2  = t[0].childNodes[1].textContent,
            g3  = t[0].childNodes[2].textContent,
            g4  = t[0].childNodes[3].textContent,
            g5  = t[0].childNodes[4].textContent,
            g6  = t[0].childNodes[5].textContent,
            g7  = t[0].childNodes[6].textContent,
            g8  = t[0].childNodes[7].textContent,
            g9  = t[0].childNodes[8].textContent,
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
            g31 = t[0].childNodes[30].textContent;

        $("#charge_id").val(g1),
        $("#tmp_billing_billing_id").val(g2),
        $("#tmp_billing_billing_code").val(g3),
        $("#tmp_billing_billing_description").val(g4),
        $("#tmp_billing_bill_type").val(g5).change(),
        $("#tmp_billing_quantity").val(g6),
        $("#tmp_billing_rate").val(g7),
        $("#tmp_billing_amount").val(g8),
        $("#tmp_billing_currency_type").val(g9).change(),
        $("#tmp_billing_customer_name").val(g10),
        $("#tmp_billing_increase").val(g11),
        $("#tmp_cost_cost_center").val(g12),
        $("#tmp_cost_currency_type").val(g13).change(),
        $("#tmp_cost_invoice").val(g14),
        $("#tmp_cost_reference").val(g15),
        $("#tmp_billing_bill_party").val(g16),
        $("#tmp_billing_notes").val(g17),
        $("#tmp_billing_unit_id").val(g18),
        $("#tmp_billing_unit_name").val(g19),
        $("#tmp_billing_exchange_rate").val(g20),
        $("#tmp_billing_customer_id").val(g21),
        $("#tmp_cost_quantity").val(g22),
        $("#tmp_cost_unit_id").val(g23),
        $("#tmp_cost_unit_name").val(g24),
        $("#tmp_cost_rate").val(g25),
        $("#tmp_cost_amount").val(g26),
        $("#tmp_cost_exchange_rate").val(g27),
        $("#tmp_billing_vendor_code").val(g28),
        $("#tmp_billing_vendor_name").val(g29),
        $("#tmp_cost_date").val(g30),
        $("#charge-warehouse").modal("show")
    });
</script>