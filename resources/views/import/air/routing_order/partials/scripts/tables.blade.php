<script type="text/javascript">
    $("#btn-origin_charges").click(function() {
        $("#billing_bill_party").val("C").change();
        $("#billing_bill_type").val("C").change();
        $("#billing_currency_type").val("1").change();
        $("#cost_currency_type").val("1").change();
        $("#billing_unit_id").val("0").change();
        $("#cost_unit_id").val("0").change();
        for (var t = $("#origin_charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                n = e.indexOf("display: block;"),
                o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#origin_charges-save").click(function() {

        if($("#billing_billing_code").val()==''){
            $("#billing_billing_code").focus();
        }else{
            var t = $("#chargeDetails tbody tr").length + 1,
                _ =  ($("#chargeDetails tbody tr").length == 0 ? 1 : parseInt($("#chargeDetails tbody tr")[$("#chargeDetails tbody tr").length - 1].childNodes[0].textContent) + 1 ),

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
                g_19 = $("#cost_unit_name").val(),
                g_20 = $("#cost_rate").val(),
                g_21 = ($("#cost_amount").val() == "" ? 0: $("#cost_amount").val()),
                g_22 = $("#cost_currency_type").val(),
                g_23 = $("#cost_exchange_rate").val(),
                g_24 = $("#billing_vendor_code").val(),
                g_25 = $("#billing_vendor_name").val(),
                g_26 = $("#cost_date").val(),
                g_27 = $("#cost_invoice").val(),
                g_28 = $("#cost_cost_center").val(),
                g_29 = $("#cost_reference").val(),
                b = $("#chargeDetails"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");


            C.append(createTableContent('charge_id', (0== charge_id? _ : charge_id) , true,d))
                .append(createTableContent('billing_billing_id', g_1, true, d))
                .append(createTableContent('billing_billing_code', g_2, false, d))
                .append(createTableContent('billing_billing_description', g_3, false, d))
                .append(createTableContent('billing_bill_type', g_4, false, d))
                .append(createTableContent('billing_bill_party', g_5, false, d))
                .append(createTableContent('billing_quantity', g_7, false, d))
                .append(createTableContent('billing_rate', g_11, true, d))
                .append(createTableContent('billing_amount', g_12, false, d))
                .append(createTableContent('billing_currency_type', g_13, true, d))
                .append(createTableContent('billing_customer_name', g_16, true, d))
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

                0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C),cleanModalFields("Charge_Details"), $("#Charge_Details").modal("show"),$("#billing_bill_party").val("C").change(), $("#billing_bill_type").val("C").change(), $("#billing_currency_type").val("1").change(), $("#cost_currency_type").val("1").change(), $("#billing_unit_id").val("0").change(),  $("#cost_unit_id").val("0").change(), values_charges(),  $("#billing_billing_code").focus()


        }

    }), $("#chargeDetails").on("click", "a.btn-danger", function() {
        $(this).closest("tr").remove(),
        values_charges()
    }), $("#chargeDetails").on("click", "a.btn-default", function() {
        removeEmptyNodes('chargeDetails');
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
            $("#billing_bill_type").val(g5).change(),
            $("#billing_bill_party").val(g6).change(),
            $("#billing_quantity").val(g7),
            $("#billing_rate").val(g8),
            $("#billing_amount").val(g9),
            $("#billing_currency_type").val(g10).change(),
            $("#billing_customer_name").val(g11),
            $("#cost_amount").val(g12),
            $("#cost_currency_type").val(g13).change(),
            $("#cost_invoice").val(g14),
            $("#cost_reference").val(g15),

            $("#billing_notes").val(g16),
            $("#billing_unit_id").val(g17).change(),
            $("#billing_unit_name").val(g18),
            $("#billing_exchange_rate").val(g19),
            $("#billing_customer_id").val(g20).change(),
            $("#cost_quantity").val(g21),
            $("#cost_unit_id").val(g22).change(),
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

</script>