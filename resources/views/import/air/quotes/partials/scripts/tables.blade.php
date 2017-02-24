<script type="text/javascript">


$("#btn_cargo_details").click(function(){
    $("#box_quantity").val(1);
    $("#box_pieces").val(1);
    $("#box_metric_unit").val("I").change();
    $("#box_weight_unit").val("L").change();
    $("#box_dim_fact").val("I").change();
    $("#box_cargo_type_id").val("0").change();
    $("#CargoModal").formValidation("resetForm", true);
    $("#box_quantity").focus();
});

$("#btn_container_details").click(function(){
    $("#container_pickup_type").val("02").change();
    $("#container_delivery_type").val("02").change();
    $("#container_drop_type").val("02").change();
    $("#container_total_weight_unit").val("L").change();
    $("#ContainerModal").formValidation("resetForm", true);
});
$("#btn-origin-charges").click(function(){
    $("#billing_bill_type").val("C").change();
    $("#billing_bill_party").val("C").change();
    $("#billing_currency_type").val("1").change();
    $("#cost_currency_type").val("1").change();
    $("#billing_unit_id").val("0").change();
    $("#cost_unit_id").val("0").change();
    $("#OriginModal").formValidation("resetForm", true);

});
$("#btn-destination-charges").click(function(){
    $("#dest_bill_type").val("C").change();
    $("#dest_bill_party").val("C").change();
    $("#dest_billing_currency_type").val("1").change();
    $("#dest_cost_currency_type").val("1").change();
    $("#dest_billing_unit_id").val("0").change();
    $("#dest_cost_unit_id").val("0").change();
    $("#DestinationModal").formValidation("resetForm", true);
});


    $("#cargo-save").click(function() {
        if($("#box_cargo_type_code").val()==''){

            $("#box_cargo_type_code").focus();
        }else{
            var t = $("#cargo_details tbody tr").length + 1,
                    _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                    box_id = $("#cargo_line").val(),
                    d= (0== box_id? _: box_id)-1,
                    g_1 = $("#box_quantity").val(),
                    g_2 = $("#box_cargo_type_id").val(),
                    g_3 = $("#box_cargo_type_code").val(),
                    g_4 = $("#box_metric_unit").val(),
                    g_5 = $("#box_length").val(),
                    g_6 = $("#box_width").val(),
                    g_7 = $("#box_height").val(),
                    g_8 = $("#box_materials").val(),
                    g_9 = $("#box_pieces").val(),
                    g_10 = $("#box_weight_unit").val(),
                    g_11 = $("#box_unit_weight").val(),
                    g_12 = $("#box_total_weight").val(),
                    g_13 = $("#box_total_cubic").val(),
                    g_14 = $("#box_dim_fact").val(),
                    g_15 = $("#box_vol_weight").val(),
                    g_16 = $("#cargo_comments").val(),

                    g_17 = $("#cargo_marks").val(),
                    g_18 = $("#cargo_container").val(),
                    g_19 = $("#cargo_charge_weight").val(),
                    g_20 = $("#cargo_gross_weight").val(),
                    g_21 = $("#cargo_rate").val(),
                    g_22 = $("#cargo_total").val(),
                    b = $("#cargo_details"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== box_id? _ : box_id) + ">");


            C.append(createTableContent('cargo_line', (0 == box_id ? _  : box_id), true,d))
                    .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                    .append(createTableContent('cargo_type_id', g_2, true, d))
                    .append(createTableContent('cargo_type_code', g_3, false, d))
                    .append(createTableContent('cargo_quantity', g_1, false, d))
                    .append(createTableContent('cargo_weight_unit', g_10, false, d))
                    .append(createTableContent('cargo_length', g_5, false, d))
                    .append(createTableContent('cargo_width', g_6, false, d))
                    .append(createTableContent('cargo_height', g_7, false, d))
                    .append(createTableContent('cargo_unit_weight', g_11, true, d))
                    .append(createTableContent('cargo_total_weight', g_12, false, d))
                    .append(createTableContent('cargo_total_cubic', g_13, false, d))
                    .append(createTableContent('cargo_charge_weight', g_19, true, d))
                    .append(createTableContent('cargo_rate', g_21, true, d))
                    .append(createTableContent('cargo_total', g_22, true, d))
                    .append(createTableContent('cargo_metric_unit', g_4, true, d))
                    .append(createTableContent('cargo_material', g_8, true, d))
                    .append(createTableContent('cargo_pieces', g_9, true, d))
                    .append(createTableContent('cargo_dim_fact', g_14, true, d))
                    .append(createTableContent('cargo_vol_weight', g_15, true, d))
                     .append(createTableContent('cargo_comments', g_16, true, d))
                    .append(createTableContent('cargo_marks', g_17, true, d))
                    .append(createTableContent('cargo_container', g_18, true, d))
                    .append(createTableContent('cargo_gross_weight', g_20, true, d))

                    .append(createTableBtns()),

                    0 == box_id ? x.append(C) : x.find("tr#" + box_id).replaceWith(C), calculate_warehouse_details(), cleanModalFields("Cargo_Details") , $("#box_quantity").val("1"), $("#box_pieces").val("1"), $("#box_metric_unit").val("I").change(), $("#box_weight_unit").val("L").change(), $("#box_weight_unit").val("L").change(), $("#box_dim_fact").val("I").change(), $("#box_cargo_type_id").val(0).change(), $("#Cargo_Details").modal("show"), $("#box_quantity").focus()
        }

    }), $("#cargo_details").on("click", "a.btn-danger", function() {
        preventDelete($(this)),
        calculate_warehouse_details()

    }), $("#cargo_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('cargo_details');
        var t = $(this).closest("tr"),
                g1 = t[0].childNodes[0].textContent,
                g2 = t[0].childNodes[2].textContent,
                g3 = t[0].childNodes[3].textContent,
                g4 = t[0].childNodes[4].textContent,
                g5 = t[0].childNodes[5].textContent,
                g6 = t[0].childNodes[6].textContent,
                g7 = t[0].childNodes[7].textContent,
                g8 = t[0].childNodes[8].textContent,
                g9 = t[0].childNodes[9].textContent,
                g10 = t[0].childNodes[10].textContent,
                g11 = t[0].childNodes[11].textContent,
                g12 = t[0].childNodes[12].textContent,
                g13 = t[0].childNodes[13].textContent,
                g14 = t[0].childNodes[14].textContent,
                g15 = t[0].childNodes[15].textContent,
                g16 = t[0].childNodes[16].textContent,

                g17 = t[0].childNodes[17].textContent,
                g18 = t[0].childNodes[18].textContent,
                g19 = t[0].childNodes[19].textContent,
                g20 = t[0].childNodes[20].textContent,
                g21 = t[0].childNodes[21].textContent,
                g22 = t[0].childNodes[22].textContent,
                g23 = t[0].childNodes[23].textContent;

                $("#cargo_line").val(g1),
                $('#box_cargo_type_id').val(g2).change(),
                $('#box_cargo_type_code').val(g3),
                $('#box_quantity').val(g4),
                $('#box_weight_unit').val(g5).change(),
                $('#box_length').val(g6),
                $('#box_width').val(g7),
                $('#box_height').val(g8),
                $('#box_unit_weight').val(g9),
                $('#box_total_weight').val(g10),
                $('#box_total_cubic').val(g11),
                $('#cargo_charge_weight').val(g12),
                $('#cargo_rate').val(g13),
                $('#cargo_total').val(g14),

                $('#box_metric_unit').val(g15).change(),
                $('#box_material').val(g16),
                $('#box_pieces').val(g17),
                $('#box_dim_fact').val(g18).change(),
                $('#box_vol_weight').val(g19),


                $('#box_comments').val(g20),

                $('#cargo_marks').val(g21),
                $('#cargo_container').val(g22),
                $('#cargo_gross_weight').val(g23),
                $("#Cargo_Details").modal("show"), $("#box_quantity").focus()
    });

    $("#origin-charge-save").click(function() {
        if($("#billing_billing_code").val()==''){

            $("#billing_billing_code").focus();
        }else{
            var t = $("#originChargeDetails tbody tr").length + 1,
                    _ =  ($("#originChargeDetails tbody tr").length == 0 ? 1 : parseInt($("#originChargeDetails tbody tr")[$("#originChargeDetails tbody tr").length - 1].childNodes[0].textContent) + 1 ),

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
                    g_19 = $("#cost_unit_name").val().toUpperCase(),
                    g_20 = $("#cost_rate").val(),
                    g_21 = $("#cost_amount").val(),
                    g_22 = $("#cost_currency_type").val(),
                    g_23 = $("#cost_exchange_rate").val(),
                    g_24 = $("#billing_vendor_code").val(),
                    g_25 = $("#billing_vendor_name").val().toUpperCase(),
                    g_26 = $("#cost_date").val(),
                    g_27 = $("#cost_invoice").val().toUpperCase(),
                    g_28 = $("#cost_cost_center").val().toUpperCase(),
                    g_29 = $("#cost_reference").val().toUpperCase(),

                    b = $("#originChargeDetails"),
                    x = b.find("tbody"),
                    C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");
            C.append(createTableContent('charge_id', (0== charge_id? _: charge_id) , true,d))
                    .append(createTableContent('billing_billing_id', g_1, true, d))
                    .append(createTableContent('billing_billing_code', g_2, false, d))
                    .append(createTableContent('billing_billing_description', g_3, false, d))
                    .append(createTableContent('billing_vendor_name', g_25, true, d))
                    .append(createTableContent('billing_unit_name', g_9, true, d))
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
                    .append(createTableContent('billing_exchange_rate', g_14, true, d))
                    .append(createTableContent('billing_customer_id', g_15, true, d))
                    .append(createTableContent('cost_quantity', g_17, true, d))
                    .append(createTableContent('cost_unit_id', g_18, true, d))
                    .append(createTableContent('cost_unit_name', g_19, true, d))
                    .append(createTableContent('cost_rate', g_20, true, d))
                    .append(createTableContent('cost_cost_center', g_28, true, d))
                    .append(createTableContent('cost_exchange_rate', g_23, true, d))
                    .append(createTableContent('billing_vendor_code', g_24, true, d))
                    .append(createTableContent('cost_date', g_26, true, d))
                    .append(createTableContent('billing_increase', g_10, true, d))
                    .append(createTableBtns()),

                    0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), origin_values_charges(), cleanModalFields("Origin_Charge_Details"), $("#billing_bill_type").val("C").change(), $("#billing_bill_party").val("C").change(), $("#billing_currency_type").val("1").change(), $("#cost_currency_type").val("1").change(), $("#billing_unit_id").val("0").change(),$("#cost_unit_id").val("0").change(), $("#Origin_Charge_Details").modal("show"), $("#billing_billing_code").focus()
        }

    }), $("#originChargeDetails").on("click", "a.btn-danger", function() {
        preventDelete($(this));
        origin_values_charges()
    }), $("#originChargeDetails").on("click", "a.btn-default", function() {
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
                $("#billing_vendor_name").val(g5),
                $("#billing_unit_name").val(g6),

                $("#billing_bill_type").val(g7).change(),
                $("#billing_bill_party").val(g8).change(),
                $("#billing_quantity").val(g9),
                $("#billing_rate").val(g10),
                $("#billing_amount").val(g11),
                $("#billing_currency_type").val(g12).change(),
                $("#billing_customer_name").val(g13),
                $("#cost_amount").val(g14),
                $("#cost_currency_type").val(g15).change(),
                $("#cost_invoice").val(g16),
                $("#cost_reference").val(g17),

                $("#billing_notes").val(g18),
                $("#billing_unit_id").val(g19).change(),
                $("#billing_exchange_rate").val(g20),
                $("#billing_customer_id").val(g21).change(),
                $("#cost_quantity").val(g22),
                $("#cost_unit_id").val(g23).change(),
                $("#cost_unit_name").val(g24),

                $("#cost_rate").val(g25),
                $("#cost_cost_center").val(g26),
                $("#cost_exchange_rate").val(g27),
                $("#billing_vendor_code").val(g28),
                $("#cost_date").val(g29),
                $("#billing_increase").val(g30),

                $("#Origin_Charge_Details").modal("show"), $("#billing_billing_code").focus()
    });

$("#destination-charge-save").click(function() {
    if($("#dest_billing_code").val()==''){
        $("#dest_billing_code").focus();
    }else{
        var t = $("#destinationChargeDetails tbody tr").length + 1,
            _ =  ($("#destinationChargeDetails tbody tr").length == 0 ? 1 : parseInt($("#destinationChargeDetails tbody tr")[$("#destinationChargeDetails tbody tr").length - 1].childNodes[0].textContent) + 1 ),

            charge_id = $("#dest_charge_line").val(),
            d= (0== charge_id? _: charge_id)-1,
            g_1 = $("#dest_billing_id").val(),
            g_2 = $("#dest_billing_code").val(),
            g_3 = $("#dest_billing_description").val(),
            g_4 = $("#dest_bill_type").val(),
            g_5 = $("#dest_bill_party").val(),
            g_6 = $("#dest_notes").val(),
            g_7 = $("#dest_billing_quantity").val(),
            g_8 = $("#dest_billing_unit_id").val(),
            g_9 = $("#dest_billing_unit_name").val().toUpperCase(),
            g_10 = $("#dest_billing_increase").val(),
            g_11 = $("#dest_billing_rate").val(),
            g_12 = $("#dest_billing_amount").val(),
            g_13 = $("#dest_billing_currency_type").val(),
            g_14 = $("#dest_billing_exchange_rate").val(),
            g_15 = $("#dest_customer_id").val(),
            g_16 = $("#dest_customer_name").val().toUpperCase(),
            g_17 = $("#dest_cost_quantity").val(),
            g_18 = $("#dest_cost_unit_id").val(),
            g_19 = $("#dest_cost_unit_name").val().toUpperCase(),
            g_20 = $("#dest_cost_rate").val(),
            g_21 = $("#dest_cost_amount").val(),
            g_22 = $("#dest_cost_currency_type").val(),
            g_23 = $("#dest_cost_exchange_rate").val(),
            g_24 = $("#dest_vendor_code").val(),
            g_25 = $("#dest_vendor_name").val().toUpperCase(),
            g_26 = $("#dest_cost_date").val(),
            g_27 = $("#dest_cost_invoice").val().toUpperCase(),
            g_28 = $("#dest_cost_cost_center").val().toUpperCase(),
            g_29 = $("#dest_cost_reference").val().toUpperCase(),

            b = $("#destinationChargeDetails"),
            x = b.find("tbody"),
            C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");
        C.append(createTableContent('dest_charge_id', (0== charge_id? _: charge_id) , true,d))
            .append(createTableContent('dest_billing_id', g_1, true, d))
            .append(createTableContent('dest_billing_code', g_2, false, d))
            .append(createTableContent('dest_billing_description', g_3, false, d))
            .append(createTableContent('dest_vendor_name', g_25, true, d))
            .append(createTableContent('dest_billing_unit_name', g_9, true, d))
            .append(createTableContent('dest_bill_type', g_4, false, d))
            .append(createTableContent('dest_bill_party', g_5, false, d))
            .append(createTableContent('dest_billing_quantity', g_7, false, d))
            .append(createTableContent('dest_billing_rate', g_11, true, d))
            .append(createTableContent('dest_billing_amount', g_12, false, d))
            .append(createTableContent('dest_billing_currency_type', g_13, true, d))
            .append(createTableContent('dest_billing_customer_name', g_16, true, d))
            .append(createTableContent('dest_cost_amount', g_21, false, d))
            .append(createTableContent('dest_cost_currency_type', g_22, true, d))
            .append(createTableContent('dest_cost_invoice', g_27, true, d))
            .append(createTableContent('dest_cost_reference', g_29, true, d))

            .append(createTableContent('dest_notes', g_6, true, d))
            .append(createTableContent('dest_billing_unit_id', g_8, true, d))
            .append(createTableContent('dest_billing_exchange_rate', g_14, true, d))
            .append(createTableContent('dest_billing_customer_id', g_15, true, d))
            .append(createTableContent('dest_cost_quantity', g_17, true, d))
            .append(createTableContent('dest_cost_unit_id', g_18, true, d))
            .append(createTableContent('dest_cost_unit_name', g_19, true, d))
            .append(createTableContent('dest_cost_rate', g_20, true, d))
            .append(createTableContent('dest_cost_center', g_28, true, d))
            .append(createTableContent('dest_cost_exchange_rate', g_23, true, d))
            .append(createTableContent('dest_vendor_code', g_24, true, d))
            .append(createTableContent('dest_cost_date', g_26, true, d))
            .append(createTableContent('dest_billing_increase', g_10, true, d))
            .append(createTableBtns()),

            0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), destination_values_charges(), cleanModalFields("Destination_Charge_Details"), $("#dest_bill_type").val("C").change(), $("#dest_bill_party").val("C").change(), $("#dest_billing_currency_type").val("1").change(), $("#dest_cost_currency_type").val("1").change(), $("#dest_billing_unit_id").val("0").change(),$("#dest_cost_unit_id").val("0").change(), $("#Destination_Charge_Details").modal("show"), $("#dest_billing_code").focus()
    }

}), $("#destinationChargeDetails").on("click", "a.btn-danger", function() {
    preventDelete($(this)),
    destination_values_charges()
}), $("#destinationChargeDetails").on("click", "a.btn-default", function() {
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

    $("#dest_charge_line").val(g1),
        $("#dest_billing_id").val(g2),
        $("#dest_billing_code").val(g3),
        $("#dest_billing_description").val(g4),
        $("#dest_vendor_name").val(g5),
        $("#dest_billing_unit_name").val(g6),

        $("#dest_bill_type").val(g7).change(),
        $("#dest_bill_party").val(g8).change(),
        $("#dest_billing_quantity").val(g9),
        $("#dest_billing_rate").val(g10),
        $("#dest_billing_amount").val(g11),
        $("#dest_billing_currency_type").val(g12).change(),
        $("#dest_customer_name").val(g13),
        $("#dest_cost_amount").val(g14),
        $("#dest_cost_currency_type").val(g15).change(),
        $("#dest_cost_invoice").val(g16),
        $("#dest_cost_reference").val(g17),

        $("#dest_billing_notes").val(g18),
        $("#dest_billing_unit_id").val(g19).change(),
        $("#dest_billing_exchange_rate").val(g20),
        $("#dest_customer_id").val(g21).change(),
        $("#dest_cost_quantity").val(g22),
        $("#dest_cost_unit_id").val(g23).change(),
        $("#dest_cost_unit_name").val(g24),

        $("#dest_cost_rate").val(g25),
        $("#dest_cost_cost_center").val(g26),
        $("#dest_cost_exchange_rate").val(g27),
        $("#dest_billing_vendor_code").val(g28),
        $("#dest_cost_date").val(g29),
        $("#dest_billing_increase").val(g30),

        $("#Destination_Charge_Details").modal("show"), $("#billing_billing_code").focus()
});



</script>