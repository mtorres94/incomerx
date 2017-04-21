<script type="text/javascript">
    $("#btn-charges-origin").click(function(){
        $("#origin_bill_unit_id").val("0").change();
        $("#origin_bill_unit_name").val("").change();
        $("#origin_cost_unit_name").val("").change();
        $("#origin_cost_unit_id").val("0").change();
        $("#origin_bill_type").val("C").change();
        $("#origin_bill_party").val("C").change();
        $("#origin_cost_currency_type").val("1").change();
        $("#origin_bill_currency_type").val("1").change();
        $("#OriginModal").formValidation("resetForm", true);
    });
$("#btn_container_details").click(function(){
   $("#spotting_date").val($("#departure_date").val());
    $("#tmp_pd_status").val("1").change();
    $("#tmp_equipment_type_id").val("").change();
    $("#ContainerModal").formValidation("resetForm", true);
});
    $("#btn_box_details").click(function(){
        $("#box_quantity").val(1);
        $("#box_metric_unit").val("I").change();
        $("#box_weight_unit").val("K").change();
        $("#box_dim_fact").val("I").change();
    });
    $("#btn_cargo_details").click(function(){
        $("#tmp_weight_unit").val("L").change();
        $("#tmp_cargo_type_id").val("").change();
        $("#CargoModal").formValidation("resetForm", true);
    });
$("#container-save").click(function() {

    var t = $("#container_details tbody tr").length + 1,
    _ =  ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

    container_id = $("#container_id").val(),
    d= (0== container_id? _ : container_id)-1,
    g_1 = $("#tmp_equipment_type_id").val(),
    g_2 = $("#tmp_equipment_type_code").val().toUpperCase(),
    g_3 = $("#tmp_number").val(),
    g_4 = $("#tmp_seal_number").val(),
    g_5 = $("#tmp_seal_number2").val(),
    g_6 = $("#tmp_commodity_id").val(),
    g_7 = $("#tmp_commodity_name").val().toUpperCase(),
    g_8 = $("#tmp_pd_status").val(),
    g_9 = $("#tmp_spotting_date").val(),
    g_10 = $("#tmp_pull_date").val(),
    g_11 = $("#tmp_carrier_id").val(),
    g_12 = $("#tmp_carrier_name").val().toUpperCase(),
    g_13 = $("#tmp_ventilation").val(),
    g_14 = $("#tmp_degrees").val(),
    g_15 = $("#tmp_temperature").val(),
    g_16 = $("#tmp_max").val(),
    g_17 = $("#tmp_min").val(),

    g_18 = $("#tmp_pickup_id").val(),
    g_19 = $("#tmp_pickup_name").val().toUpperCase(),
    g_20 = $("#tmp_pickup_type").val(),
    g_21 = $("#tmp_pickup_address").val(),
    g_22 = $("#tmp_pickup_city").val(),
    g_23 = $("#tmp_pickup_state_id").val(),
    g_24 = $("#tmp_pickup_state_name").val().toUpperCase(),
    g_25 = $("#tmp_pickup_zip_code_id").val(),
    g_26 = $("#tmp_pickup_zip_code_code").val().toUpperCase(),
    g_27 = $("#tmp_pickup_phone").val(),
    g_28 = $("#tmp_pickup_contact").val(),
    g_29 = $("#tmp_pickup_date").val(),
    g_30 = $("#tmp_pickup_number").val(),

    g_31 = $("#tmp_delivery_id").val(),
    g_32 = $("#tmp_delivery_name").val(),
    g_33 = $("#tmp_delivery_type").val(),
    g_34 = $("#tmp_delivery_address").val(),
    g_35 = $("#tmp_delivery_city").val(),
    g_36 = $("#tmp_delivery_state_id").val(),
    g_37 = $("#tmp_delivery_state_name").val().toUpperCase(),
    g_38 = $("#tmp_delivery_zip_code_id").val(),
    g_39 = $("#tmp_delivery_zip_code_code").val().toUpperCase(),
    g_40 = $("#tmp_delivery_phone").val(),
    g_41 = $("#tmp_delivery_contact").val(),
    g_42 = $("#tmp_delivery_date").val(),
    g_43 = $("#tmp_delivery_number").val(),

    g_44 = $("#tmp_drop_id").val(),
    g_45 = $("#tmp_drop_name").val(),
    g_46 = $("#tmp_drop_type").val(),
    g_47 = $("#tmp_drop_address").val(),
    g_48 = $("#tmp_drop_city").val(),
    g_49 = $("#tmp_drop_state_id").val(),
    g_50 = $("#tmp_drop_state_name").val().toUpperCase(),
    g_51 = $("#tmp_drop_zip_code_id").val(),
    g_52 = $("#tmp_drop_zip_code_code").val().toUpperCase(),
    g_53 = $("#tmp_drop_phone").val(),
    g_54 = $("#tmp_drop_contact").val(),
    g_55 = $("#tmp_drop_date").val(),
    g_56 = $("#tmp_drop_number").val(),
    g_74 = $("#tmp_comments").val().toUpperCase(),

    b = $("#container_details"),
    x = b.find("tbody"),
    C = $("<tr id=" + (0== container_id? _ : container_id) + ">");


        C.append(createTableContent('container_line', (0== container_id? _ : container_id) , true,d))
        .append(createTableContent('equipment_type_id', g_1, true, d))
        .append(createTableContent('equipment_type_code', g_2, false, d))
        .append(createTableContent('container_number', g_3, false, d))
        .append(createTableContent('container_seal_number', g_4, false, d))
        .append(createTableContent('container_seal_number2', g_5, true, d))
        .append(createTableContent('container_commodity_id', g_6, true, d))
        .append(createTableContent('container_commodity_name', g_7, true, d))
        .append(createTableContent('pd_status', g_8, true, d))
        .append(createTableContent('container_spotting_date', g_9, true, d))
        .append(createTableContent('container_pull_date', g_10, true, d))
        .append(createTableContent('container_carrier_id', g_11, true, d))
        .append(createTableContent('container_carrier_name', g_12, true, d))
        .append(createTableContent('container_ventilation', g_13, true, d))
        .append(createTableContent('container_degrees', g_14, true, d))
        .append(createTableContent('container_temperature', g_15, true, d))
        .append(createTableContent('container_max', g_16, true, d))
        .append(createTableContent('container_min', g_17, true, d))

        .append(createTableContent('container_pickup_id', g_18, true, d))
        .append(createTableContent('container_pickup_name', g_19, false, d))
        .append(createTableContent('container_pickup_type', g_20, true, d))
        .append(createTableContent('container_pickup_address', g_21, true, d))
        .append(createTableContent('container_pickup_city', g_22, true, d))
        .append(createTableContent('container_pickup_state_id', g_23, true, d))
        .append(createTableContent('container_pickup_state_name', g_24, true, d))
        .append(createTableContent('container_pickup_zip_code_id', g_25, true, d))
        .append(createTableContent('container_pickup_zip_code_code', g_26, true, d))
        .append(createTableContent('container_pickup_phone', g_27, true, d))
        .append(createTableContent('container_pickup_contact', g_28, true, d))
        .append(createTableContent('container_pickup_date', g_29, true, d))
        .append(createTableContent('container_pickup_number', g_30, true, d))

        .append(createTableContent('container_delivery_id', g_31, true, d))
        .append(createTableContent('container_delivery_name', g_32, false, d))
        .append(createTableContent('container_delivery_type', g_33, true, d))
        .append(createTableContent('container_delivery_address', g_34, true, d))
        .append(createTableContent('container_delivery_city', g_35, true, d))
        .append(createTableContent('container_delivery_state_id', g_36, true, d))
        .append(createTableContent('container_delivery_state_name', g_37, true, d))
        .append(createTableContent('container_delivery_zip_code_id', g_38, true, d))
        .append(createTableContent('container_delivery_zip_code_code', g_39, true, d))
        .append(createTableContent('container_delivery_phone', g_40, true, d))
        .append(createTableContent('container_delivery_contact', g_41, true, d))
        .append(createTableContent('container_delivery_date', g_42, true, d))
        .append(createTableContent('container_delivery_number', g_43, true, d))

        .append(createTableContent('container_drop_id', g_44, true, d))
        .append(createTableContent('container_drop_name', g_45, false, d))
        .append(createTableContent('container_drop_type', g_46, true, d))
        .append(createTableContent('container_drop_address', g_47, true, d))
        .append(createTableContent('container_drop_city', g_48, true, d))
        .append(createTableContent('container_drop_state_id', g_49, true, d))
        .append(createTableContent('container_drop_state_name', g_50, true, d))
        .append(createTableContent('container_drop_zip_code_id', g_51, true, d))
        .append(createTableContent('container_drop_zip_code_code', g_52, true, d))
        .append(createTableContent('container_drop_phone', g_53, true, d))
        .append(createTableContent('container_drop_contact', g_54, true, d))
        .append(createTableContent('container_drop_date', g_55, true, d))
        .append(createTableContent('container_drop_number', g_56, true, d))

        .append(createTableContent('container_comments', g_74, true, d))
        .append(createTableBtns()),

        0 == container_id ? x.append(C) : x.find("tr#" + container_id).replaceWith(C), $("#Container_Details").modal("show"), $("#tmp_equipment_type_id").val("").change(), $("#ContainerModal").formValidation("resetFomr", true),$("#tmp_equipment_type_code").focus();

        }), $("#container_details").on("click", "a.btn-danger", function() {

            preventDelete($(this))

        }), $("#container_details").on("click", "a.btn-default", function() {
        removeEmptyNodes('container_details');
        removeEmptyNodes('hzd_details');
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
        g30 = t[0].childNodes[29].textContent,
        g31 = t[0].childNodes[30].textContent,
        g32 = t[0].childNodes[31].textContent,
        g33 = t[0].childNodes[32].textContent,
        g34 = t[0].childNodes[33].textContent,
        g35 = t[0].childNodes[34].textContent,
        g36 = t[0].childNodes[35].textContent,
        g37 = t[0].childNodes[36].textContent,
        g38 = t[0].childNodes[37].textContent,
        g39 = t[0].childNodes[38].textContent,
        g40 = t[0].childNodes[39].textContent,
        g41 = t[0].childNodes[40].textContent,
        g42 = t[0].childNodes[41].textContent,
        g43 = t[0].childNodes[42].textContent,
        g44 = t[0].childNodes[43].textContent,
        g45 = t[0].childNodes[44].textContent,
        g46 = t[0].childNodes[45].textContent,
        g47 = t[0].childNodes[46].textContent,
        g48 = t[0].childNodes[47].textContent,
        g49 = t[0].childNodes[48].textContent,
        g50 = t[0].childNodes[49].textContent,
        g51 = t[0].childNodes[50].textContent,
        g52 = t[0].childNodes[51].textContent,
        g53 = t[0].childNodes[52].textContent,
        g54 = t[0].childNodes[53].textContent,
        g55 = t[0].childNodes[54].textContent,
        g56 = t[0].childNodes[55].textContent,
        g57 = t[0].childNodes[56].textContent,
        g58 = t[0].childNodes[57].textContent;



        $("#container_id").val(g1),
        $("#tmp_equipment_type_id").val(g2).change(),
        $("#tmp_equipment_type_code").val(g3),
        $("#tmp_number").val(g4),
        $("#tmp_seal_number").val(g5),
        $("#tmp_seal_number2").val(g6),
        $("#tmp_commodity_id").val(g7),
        $("#tmp_commodity_name").val(g8),
        $("#tmp_pd_status").val(g9).change(),
        $("#tmp_spotting_date").val(g10),
        $("#tmp_pull_date").val(g11),
        $("#tmp_carrier_id").val(g12),
        $("#tmp_carrier_name").val(g13),
        $("#tmp_ventilation").val(g14).change(),
        $("#tmp_degrees").val(g15).change(),
        $("#tmp_temperature").val(g16),
        $("#tmp_max").val(g17),
        $("#tmp_min").val(g18),

        $("#tmp_pickup_id").val(g19),
        $("#tmp_pickup_name").val(g20),
        $("#tmp_pickup_type").val(g21).change(),
        $("#tmp_pickup_address").val(g22),
        $("#tmp_pickup_city").val(g23),
        $("#tmp_pickup_state_id").val(g24),
        $("#tmp_pickup_state_name").val(g25),
        $("#tmp_pickup_zip_code_id").val(g26),
        $("#tmp_pickup_zip_code_code").val(g27),
        $("#tmp_pickup_phone").val(g28),
        $("#tmp_pickup_contact").val(g29),
        $("#tmp_pickup_date").val(g30),
        $("#tmp_pickup_number").val(g31),

        $("#tmp_delivery_id").val(g32),
        $("#tmp_delivery_name").val(g33),
        $("#tmp_delivery_type").val(g34).change(),
        $("#tmp_delivery_address").val(g35),
        $("#tmp_delivery_city").val(g36),
        $("#tmp_delivery_state_id").val(g37),
        $("#tmp_delivery_state_name").val(g38),
        $("#tmp_delivery_zip_code_id").val(g39),
        $("#tmp_delivery_zip_code_code").val(g40),
        $("#tmp_delivery_phone").val(g41),
        $("#tmp_delivery_contact").val(g42),
        $("#tmp_delivery_date").val(g43),
        $("#tmp_delivery_number").val(g44),

        $("#tmp_drop_id").val(g45),
        $("#tmp_drop_name").val(g46),
        $("#tmp_drop_type").val(g47).change(),
        $("#tmp_drop_address").val(g48),
        $("#tmp_drop_city").val(g49),
        $("#tmp_drop_state_id").val(g50),
        $("#tmp_drop_state_name").val(g51),
        $("#tmp_drop_zip_code_id").val(g52),
        $("#tmp_drop_zip_code_code").val(g53),
        $("#tmp_drop_phone").val(g54),
        $("#tmp_drop_contact").val(g55),
        $("#tmp_drop_date").val(g56),
        $("#tmp_drop_number").val(g57),

        $("#tmp_comments").val(g58),
        $("#Container_Details").modal("show"), $("#equipment_type_code").focus()
    });

    $("#destination-charge-save").click(function() {

        var t = $("#destination_charge tbody tr").length + 1,
        _ =  ($("#destination_charge tbody tr").length == 0 ? 1 : parseInt($("#destination_charge tbody tr")[$("#destination_charge tbody tr").length - 1].childNodes[0].textContent) + 1 ),

        charge_id = $("#destination_charge_line").val(),
        d= (0== charge_id? _: charge_id)-1,
        g_1 = $("#destination_billing_id").val(),
        g_2 = $("#destination_billing_code").val(),
        g_3 = $("#destination_billing_description").val(),
        g_4 = $("#destination_bill_type").val(),
        g_5 = $("#destination_bill_party").val(),
        g_6 = $("#destination_notes").val(),
        g_7 = $("#destination_bill_quantity").val(),
        g_8 = $("#destination_bill_unit_id").val(),
        g_9 = $("#destination_bill_unit_name").val().toUpperCase(),
        g_10 = $("#destination_bill_increase").val(),
        g_11 = $("#destination_bill_rate").val(),
        g_12 = $("#destination_bill_amount").val(),
        g_13 = $("#destination_bill_currency_type").val(),
        g_14 = $("#destination_bill_exchange_rate").val(),
        g_15 = $("#destination_customer_id").val(),
        g_16 = $("#destination_customer_name").val().toUpperCase(),
        g_17 = $("#destination_cost_quantity").val(),
        g_18 = $("#destination_cost_unit_id").val(),
        g_19 = $("#destination_cost_unit_name").val().toUpperCase(),
        g_20 = $("#destination_cost_rate").val(),
        g_21 = $("#destination_cost_amount").val(),
        g_22 = $("#destination_cost_currency_type").val(),
        g_23 = $("#destination_cost_exchange_rate").val(),
        g_24 = $("#destination_vendor_code").val(),
        g_25 = $("#destination_vendor_name").val().toUpperCase(),
        g_26 = $("#destination_cost_date").val(),
        g_27 = $("#destination_cost_invoice").val().toUpperCase(),
        g_28 = $("#destination_cost_center").val().toUpperCase(),
        g_29 = $("#destination_cost_reference").val().toUpperCase(),
        b = $("#destination_charge"),
        x = b.find("tbody"),
        C = $("<tr id=" + (0== charge_id? _ : charge_id) + ">");


        C.append(createTableContent('destination_charge_id', (0== charge_id? _ : charge_id) , true,d))
        .append(createTableContent('destination_billing_id', g_1, true, d))
        .append(createTableContent('destination_billing_code', g_2, false, d))
        .append(createTableContent('destination_billing_description', g_3, false, d))
        .append(createTableContent('destination_bill_type', g_4, false, d))
        .append(createTableContent('destination_bill_party', g_5, false, d))
        .append(createTableContent('destination_bill_quantity', g_7, false, d))
        .append(createTableContent('destination_bill_rate', g_11, false, d))
        .append(createTableContent('destination_bill_amount', g_12, false, d))
        .append(createTableContent('destination_bill_currency_type', g_13, false, d))
        .append(createTableContent('destination_customer_name', g_16, false, d))
        .append(createTableContent('destination_cost_amount', g_21, false, d))
        .append(createTableContent('destination_cost_currency_type', g_22, false, d))
        .append(createTableContent('destination_cost_invoice', g_27, false, d))
        .append(createTableContent('destination_cost_reference', g_29, false, d))


        .append(createTableContent('destination_notes', g_6, true, d))
        .append(createTableContent('destination_bill_unit_id', g_8, true, d))
        .append(createTableContent('destination_bill_unit_name', g_9, true, d))
        .append(createTableContent('destination_bill_exchange_rate', g_14, true, d))
        .append(createTableContent('destination_customer_id', g_15, true, d))
        .append(createTableContent('destination_cost_quantity', g_17, true, d))
        .append(createTableContent('destination_cost_unit_id', g_18, true, d))
        .append(createTableContent('destination_cost_unit_name', g_19, true, d))
        .append(createTableContent('destination_cost_rate', g_20, true, d))
        .append(createTableContent('destination_cost_center', g_28, true, d))
        .append(createTableContent('destination_cost_exchange_rate', g_23, true, d))
        .append(createTableContent('destination_vendor_code', g_24, true, d))
        .append(createTableContent('destination_vendor_name', g_25, true, d))
        .append(createTableContent('destination_cost_date', g_26, true, d))
        .append(createTableContent('destination_bill_increase', g_10, true, d))
        .append(createTableBtns()),

        0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), cleanModalFields("Destination_Charges"), $("#Destination_Charges").modal("show"), $("#billing_billing_code").focus(), destination_charges()
        }), $("#destination_charge").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                destination_charges();
            }
        });
    }), $("#destination_charge").on("click", "a.btn-default", function() {
    removeEmptyNodes('destination_charge');
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

    $("#destination_charge_line").val(g1),
    $("#destination_billing_id").val(g2),
    $("#destination_billing_code").val(g3),
    $("#destination_billing_description").val(g4),
    $("#destination_bill_type").val(g5).change(),
    $("#destination_bill_party").val(g6).change(),
    $("#destination_bill_quantity").val(g7),
    $("#destination_bill_rate").val(g8),
    $("#destination_bill_amount").val(g9),
    $("#destination_bill_currency_type").val(g10).change(),
    $("#destination_customer_name").val(g11),
    $("#destination_cost_amount").val(g12),
    $("#destination_cost_currency_type").val(g13).change(),
    $("#destination_cost_invoice").val(g14),
    $("#destination_cost_reference").val(g15),

    $("#destination_notes").val(g16),
    $("#destination_bill_unit_id").val(g17),
    $("#destination_bill_unit_name").val(g18),
    $("#destination_bill_exchange_rate").val(g19),
    $("#destination_customer_id").val(g20),
    $("#destination_cost_quantity").val(g21),
    $("#destination_cost_unit_id").val(g22),
    $("#destination_cost_unit_name").val(g23),
    $("#destination_cost_rate").val(g24),
    $("#destination_cost_center").val(g25),
    $("#destination_cost_exchange_rate").val(g26),
    $("#destination_vendor_code").val(g27),
    $("#destination_vendor_name").val(g28),
    $("#destination_cost_date").val(g29),
    $("#destination_bill_increase").val(g30),

    $("#Destination_Charges").modal("show"), $("#billing_billing_code").focus()
    }),

            $("#origin-charge-save").click(function() {
                    var t = $("#origin_charge tbody tr").length + 1,
                            _ =  ($("#origin_charge tbody tr").length == 0 ? 1 : parseInt($("#origin_charge tbody tr")[$("#origin_charge tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                            charge_id = $("#origin_charge_line").val(),
                            d= (0== charge_id? _: charge_id)-1,
                            g_1 = $("#origin_billing_id").val(),
                            g_2 = $("#origin_billing_code").val(),
                            g_3 = $("#origin_billing_description").val(),
                            g_4 = $("#origin_bill_type").val(),
                            g_5 = $("#origin_bill_party").val(),
                            g_6 = $("#origin_notes").val(),
                            g_7 = $("#origin_bill_quantity").val(),
                            g_8 = $("#origin_bill_unit_id").val(),
                            g_9 = $("#origin_bill_unit_name").val().toUpperCase(),
                            g_10 = $("#origin_bill_increase").val(),
                            g_11 = $("#origin_bill_rate").val(),
                            g_12 = $("#origin_bill_amount").val(),
                            g_13 = $("#origin_bill_currency_type").val(),
                            g_14 = $("#origin_bill_exchange_rate").val(),
                            g_15 = $("#origin_customer_id").val(),
                            g_16 = $("#origin_customer_name").val().toUpperCase(),
                            g_17 = $("#origin_cost_quantity").val(),
                            g_18 = $("#origin_cost_unit_id").val(),
                            g_19 = $("#origin_cost_unit_name").val().toUpperCase(),
                            g_20 = $("#origin_cost_rate").val(),
                            g_21 = $("#origin_cost_amount").val(),
                            g_22 = $("#origin_cost_currency_type").val(),
                            g_23 = $("#origin_cost_exchange_rate").val(),
                            g_24 = $("#origin_vendor_code").val(),
                            g_25 = $("#origin_vendor_name").val().toUpperCase(),
                            g_26 = $("#origin_cost_date").val(),
                            g_27 = $("#origin_cost_invoice").val().toUpperCase(),
                            g_28 = $("#origin_cost_center").val().toUpperCase(),
                            g_29 = $("#origin_cost_reference").val().toUpperCase(),
                            b = $("#origin_charge"),
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
                        .append(createTableContent('billing_vendor_code',g_24, true, d))
                        .append(createTableContent('billing_vendor_name', g_25, true, d))
                        .append(createTableContent('cost_date', g_26, true, d))
                        .append(createTableContent('billing_increase', g_10, true, d))
                        .append(createTableBtns()),

                            0 == charge_id ? x.append(C) : x.find("tr#" + charge_id).replaceWith(C), cleanModalFields("Origin_Charges"), $("#Origin_Charges").modal("show"),   $("#origin_bill_unit_id").val("").change(), $("#origin_cost_unit_id").val("").change(), $("#origin_bill_type").val("C").change(), $("#origin_bill_party").val("C").change(), $("#origin_cost_currency_type").val("1").change(),  $("#origin_billing_currency_type").val("1").change(), $("#ChargeModal").formValidation("resetForm", true), $("#origin_billing_code").focus(), values_charges()

            }), $("#origin_charge").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                values_charges();
            }
        });
    }), $("#origin_charge").on("click", "a.btn-default", function() {
        removeEmptyNodes('destination_charge');
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

        $("#origin_charge_line").val(g1),
                $("#origin_billing_id").val(g2),
                $("#origin_billing_code").val(g3),
                $("#origin_billing_description").val(g4),
                $("#origin_bill_type").val(g5).change(),
                $("#origin_bill_party").val(g6).change(),
                $("#origin_bill_quantity").val(g7),
                $("#origin_bill_rate").val(g8),
                $("#origin_bill_amount").val(g9),
                $("#origin_bill_currency_type").val(g10).change(),
                $("#origin_customer_name").val(g11),
                $("#origin_cost_amount").val(g12),
                $("#origin_cost_currency_type").val(g13).change(),
                $("#origin_cost_invoice").val(g14),
                $("#origin_cost_reference").val(g15),

                $("#origin_notes").val(g16),
                $("#origin_bill_unit_id").val(g17),
                $("#origin_bill_unit_name").val(g18),
                $("#origin_bill_exchange_rate").val(g19),
                $("#origin_customer_id").val(g20),
                $("#origin_cost_quantity").val(g21),
                $("#origin_cost_unit_id").val(g22),
                $("#origin_cost_unit_name").val(g23),
                $("#origin_cost_rate").val(g24),
                $("#origin_cost_center").val(g25),
                $("#origin_cost_exchange_rate").val(g26),
                $("#origin_vendor_code").val(g27),
                $("#origin_vendor_name").val(g28),
                $("#origin_cost_date").val(g29),
                $("#origin_bill_increase").val(g30),

                $("#Origin_Charges").modal("show"), $("#origin_billing_code").focus()
    });


    $("#transportation-save").click(function() {

    var t = $("#transportation_details tbody tr").length + 1,
    _ =  ($("#transportation_details tbody tr").length == 0 ? 1 : parseInt($("#transportation_details tbody tr")[$("#transportation_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
    transportation_id = $("#transportation_id").val(),
    d= (0 == transportation_id ? _ : transportation_id)-1,
    g_1 = $("#transportation_leg").val(),
    g_2 = $("#transportation_mode").val(),
    g_3 = $("#transportation_billing_id").val(),
    g_4 = $("#transportation_billing_code").val(),
    g_5 = $("#transportation_description").val(),
    g_6 = $("#transportation_amount").val(),
    g_7 = $("#transportation_leg_status").val(),
    g_8 = $("#transportation_service_id").val(),
    g_9 = $("#transportation_service_name").val(),
    g_10 = $("#transportation_carrier_id").val(),
    g_11 = $("#transportation_carrier_name").val(),
    g_12 = $("#transportation_notify").val(),
    g_13 = $("#transportation_loading_location_id").val(),
    g_14 = $("#transportation_loading_location_name").val(),
    g_15 = $("#transportation_loading_reference").val(),
    g_16 = $("#transportation_ETD_date").val(),
    g_17 = $("#transportation_unloading_location_id").val(),
    g_18 = $("#transportation_unloading_location_name").val(),
    g_19 = $("#transportation_unloading_reference").val(),
    g_20 = $("#transportation_ETA_date").val(),
    g_21 = $("#origin_from_type").val(),
    g_22 = $("#origin_from_shipper_id").val(),
    g_23 = $("#origin_from_shipper_name").val(),
    g_24 = $("#origin_from_address").val(),
    g_25 = $("#origin_from_city").val(),
    g_26 = $("#origin_from_state_id").val(),
    g_27 = $("#origin_from_state_name").val(),
    g_28 = $("#origin_from_country_id").val(),
    g_29 = $("#origin_from_country_name").val(),
    g_30 = $("#origin_from_zip_code_id").val(),
    g_31 = $("#origin_from_zip_code_code").val(),
    g_32 = $("#origin_from_contact").val(),
    g_33 = $("#origin_from_phone").val(),
    g_34 = $("#origin_from_fax").val(),
    g_35 = $("#origin_to_type").val(),
    g_36 = $("#origin_to_consignee_id").val(),
    g_37 = $("#origin_to_consignee_name").val(),
    g_38 = $("#origin_to_address").val(),
    g_39 = $("#origin_to_city").val(),
    g_40 = $("#origin_to_state_id").val(),
    g_41 = $("#origin_to_state_name").val(),
    g_42 = $("#origin_to_country_id").val(),
    g_43 = $("#origin_to_country_name").val(),
    g_44 = $("#origin_to_zip_code_id").val(),
    g_45 = $("#origin_to_zip_code_code").val(),
    g_46 = $("#origin_to_contact").val(),
    g_47 = $("#origin_to_phone").val(),
    g_48 = $("#origin_to_fax").val(),

    b = $("#transportation_details"),
    x = b.find("tbody"),
    C = $("<tr id=" + (0== transportation_id ? _ : transportation_id)+ ">");

    C.append(createTableContent('transportation_id', (0== transportation_id ? _ : transportation_id) , true,d))
    .append(createTableContent('transportation_leg', g_1, false, d))
    .append(createTableContent('transportation_mode', g_2, false, d))
    .append(createTableContent('transportation_carrier_id', g_10, true, d))
    .append(createTableContent('transportation_carrier_name', g_11, false, d))
    .append(createTableContent('transportation_loading_location_id', g_13, true, d))
    .append(createTableContent('transportation_loading_location_name', g_14, false, d))
    .append(createTableContent('transportation_unloading_location_id', g_17, true, d))
    .append(createTableContent('transportation_unloading_location_name', g_18, false, d))
    .append(createTableContent('transportation_ETD_date', g_16, false, d))
    .append(createTableContent('transportation_ETA_date', g_20, false, d))
    .append(createTableContent('transportation_leg_status', g_7, false, d))
    .append(createTableContent('transportation_amount', g_6, false, d))

    .append(createTableContent('transportation_billing_id', g_3, true, d))
    .append(createTableContent('transportation_billing_code', g_4, true, d))
    .append(createTableContent('transportation_description', g_5, true, d))
    .append(createTableContent('transportation_service_id', g_8, true, d))
    .append(createTableContent('transportation_service_name', g_9, true, d))
    .append(createTableContent('transportation_notify', g_12, true, d))
    .append(createTableContent('transportation_loading_reference', g_15, true, d))
    .append(createTableContent('transportation_unloading_reference', g_19, true, d))
    .append(createTableContent('origin_from_type', g_21, true, d))
    .append(createTableContent('origin_from_shipper_id', g_22, true, d))
    .append(createTableContent('origin_from_shipper_name', g_23, true, d))
    .append(createTableContent('origin_from_address', g_24, true, d))
    .append(createTableContent('origin_from_city', g_25, true, d))
    .append(createTableContent('origin_from_state_id', g_26, true, d))
    .append(createTableContent('origin_from_state_name', g_27, true, d))
    .append(createTableContent('origin_from_country_id', g_28, true, d))
    .append(createTableContent('origin_from_country_name', g_29, true, d))
    .append(createTableContent('origin_from_zip_code_id', g_30, true, d))
    .append(createTableContent('origin_from_zip_code_code', g_31, true, d))
    .append(createTableContent('origin_from_contact', g_32, true, d))
    .append(createTableContent('origin_from_phone', g_33, true, d))
    .append(createTableContent('origin_from_fax', g_34, true, d))
    .append(createTableContent('origin_to_type', g_35, true, d))
    .append(createTableContent('origin_to_consignee_id', g_36, true, d))
    .append(createTableContent('origin_to_consignee_name', g_37, true, d))
    .append(createTableContent('origin_to_address', g_38, true, d))
    .append(createTableContent('origin_to_city', g_39, true, d))
    .append(createTableContent('origin_to_state_id', g_40, true, d))
    .append(createTableContent('origin_to_state_name', g_41, true, d))
    .append(createTableContent('origin_to_country_id', g_42, true, d))
    .append(createTableContent('origin_to_country_name', g_43, true, d))
    .append(createTableContent('origin_to_zip_code_id', g_44, true, d))
    .append(createTableContent('origin_to_zip_code_code', g_45, true, d))
    .append(createTableContent('origin_to_contact', g_46, true, d))
    .append(createTableContent('origin_to_phone', g_47, true, d))
    .append(createTableContent('origin_to_fax', g_48, true, d))
    .append(createTableBtns()), 0 == transportation_id ? x.append(C) : x.find("tr#" + transportation_id).replaceWith(C),cleanModalFields('TransportationDetails'), $("#TransportationDetails").modal("show"), $("#transportation_leg").focus(), transportation_plan()

    }), $("#transportation_details").on("click", "a.btn-danger", function() {
        var td = $(this);
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                td.closest("tr").remove();
                transportation_plan();
            }
        });
    }), $("#transportation_details").on("click", "a.btn-default", function() {
    removeEmptyNodes('transportation_details');
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
    g30 = t[0].childNodes[29].textContent,
    g31 = t[0].childNodes[30].textContent,
    g32 = t[0].childNodes[31].textContent,
    g33 = t[0].childNodes[32].textContent,
    g34 = t[0].childNodes[33].textContent,
    g35 = t[0].childNodes[34].textContent,
    g36 = t[0].childNodes[35].textContent,
    g37 = t[0].childNodes[36].textContent,
    g38 = t[0].childNodes[37].textContent,
    g39 = t[0].childNodes[38].textContent,
    g40 = t[0].childNodes[39].textContent,
    g41 = t[0].childNodes[40].textContent,
    g42 = t[0].childNodes[41].textContent,
    g43 = t[0].childNodes[42].textContent,
    g44 = t[0].childNodes[43].textContent,
    g45 = t[0].childNodes[44].textContent,
    g46 = t[0].childNodes[45].textContent,
    g47 = t[0].childNodes[46].textContent,
    g48 = t[0].childNodes[47].textContent,
    g49 = t[0].childNodes[48].textContent;


    $("#transportation_id").val(g1),
    $("#transportation_leg").val(g2),
    $("#transportation_mode").val(g3).change(),
    $("#transportation_carrier_id").val(g4),
    $("#transportation_carrier_name").val(g5),
    $("#transportation_loading_location_id").val(g6),
    $("#transportation_loading_location_name").val(g7),
    $("#transportation_unloading_location_id").val(g8),
    $("#transportation_unloading_location_name").val(g9),
    $("#transportation_ETD_date").val(g10),
    $("#transportation_ETA_date").val(g11),
    $("#transportation_leg_status").val(g12).change(),
    $("#transportation_amount").val(g13),

    $("#transportation_billing_id").val(g14),
    $("#transportation_billing_code").val(g15),
    $("#transportation_description").val(g16),
    $("#transportation_service_id").val(g17),
    $("#transportation_service_name").val(g18),
    $("#transportation_notify").val(g19),
    $("#transportation_loading_reference").val(g20),
    $("#transportation_unloading_reference").val(g21),
    $("#origin_from_type").val(g22).change(),
    $("#origin_from_shipper_id").val(g23),
    $("#origin_from_shipper_name").val(g24),
    $("#origin_from_address").val(g25),
    $("#origin_from_city").val(g26),
    $("#origin_from_state_id").val(g27),
    $("#origin_from_state_name").val(g28),
    $("#origin_from_country_id").val(g29),
    $("#origin_from_country_name").val(g30),
    $("#origin_from_zip_code_id").val(g31),
    $("#origin_from_zip_code_code").val(g32),
    $("#origin_from_contact").val(g33),
    $("#origin_from_phone").val(g34),
    $("#origin_from_fax").val(g35),
    $("#origin_to_type").val(g36).change(),
    $("#origin_to_consignee_id").val(g37),
    $("#origin_to_consignee_name").val(g38),
    $("#origin_to_address").val(g39),
    $("#origin_to_city").val(g40),
    $("#origin_to_state_id").val(g41),
    $("#origin_to_state_name").val(g42),
    $("#origin_to_country_id").val(g43),
    $("#origin_to_country_name").val(g44),
    $("#origin_to_zip_code_id").val(g45),
    $("#origin_to_zip_code_code").val(g46),
    $("#origin_to_contact").val(g47),
    $("#origin_to_phone").val(g48),
    $("#origin_to_fax").val(g49),
    $("#TransportationDetails").modal("show"), $("#transportation_leg").focus()
    });


$("#cargo-save").click(function() {

        var t = $("#cargo_details tbody tr").length + 1,
                _ =  ($("#cargo_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_details tbody tr")[$("#cargo_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

                cargo_id = $("#cargo_line").val(),
                d= (0== cargo_id? _: cargo_id)-1,
                g_1 = $("#tmp_marks").val(),
                g_2 = $("#tmp_pieces").val(),
                g_3 = $("#tmp_description").val(),
                g_4 = $("#tmp_container").val(),
                g_5 = $("#tmp_cargo_type_id").val(),
                g_6 = $("#tmp_cargo_type_code").val(),

                g_9 = $("#tmp_weight_unit").val(),
                g_10 = $("#tmp_grossw").val(),
                g_11 = $("#tmp_cubic").val(),
                g_12 = $("#tmp_comments").val(),
                g_13 = $("#tmp_charge_weight").val(),
                g_14 = $("#tmp_rate").val(),
                g_15 = $("#tmp_amount").val(),

                b = $("#cargo_details"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== cargo_id? _ : cargo_id) + ">");


        C.append(createTableContent('cargo_line', (0== cargo_id? _ : cargo_id) , true,d))
                .append(createTableContent('cargo_marks', g_1, false, d))
                .append(createTableContent('cargo_pieces', g_2, false, d))
                .append(createTableContent('cargo_description', g_3, false, d))
                .append(createTableContent('cargo_container', g_4, true, d))
                .append(createTableContent('cargo_type_id', g_5, true, d))
                .append(createTableContent('cargo_type_code', g_6, true, d))

                .append(createTableContent('cargo_weight_unit', g_9, false, d))
                .append(createTableContent('cargo_gross_weight', g_10, false, d))
                .append(createTableContent('cargo_cubic', g_11, false, d))
                .append(createTableContent('cargo_comments', g_12, true, d))
                .append(createTableContent('cargo_charge_weight', g_13, true, d))
                .append(createTableContent('cargo_rate', g_14, true, d))
                .append(createTableContent('cargo_amount', g_15, false, d))
                .append(createTableBtns()),
                0 == cargo_id ? x.append(C) : x.find("tr#" + cargo_id).replaceWith(C), cleanModalFields("Cargo_Details"), $("#Cargo_Details").modal("show"),$("#tmp_weight_unit").val("L").change(), $("#CargoModal").formValidation("resetForm", true),  $("#tmp_marks").focus(), values_box_vehicle();

        //===================



}), $("#cargo_details").on("click", "a.btn-danger", function() {
    var td = $(this);
    preventDeleteCondition(td, function (td, eval) {
        if (eval) {
            td.closest("tr").remove();
            values_box_vehicle();
        }
    });
}), $("#cargo_details").on("click", "a.btn-default", function() {

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
            g14 = t[0].childNodes[13].textContent;

            $("#cargo_line").val(g1),
            $("#tmp_marks").val(g2),
            $("#tmp_pieces").val(g3),
            $("#tmp_description").val(g4),
            $("#tmp_container").val(g5),
            $("#tmp_cargo_type_id").val(g6).change(),
            $("#tmp_cargo_type_code").val(g7),

            $("#tmp_weight_unit").val(g8),
            $("#tmp_grossw").val(g9),
            $("#tmp_cubic").val(g10),
            $("#tmp_comments").val(g11),
            $("#tmp_charge_weight").val(g12),
            $("#tmp_rate").val(g13),
            $("#tmp_amount").val(g14),
            $("#Cargo_Details").modal("show"); $("#tmp_marks").focus();


});

$("#box-save").click(function() {

        var t = $("#cargo_vehicle_details tbody tr").length + 1,
                _ =  ($("#cargo_vehicle_details tbody tr").length == 0 ? 1 : parseInt($("#cargo_vehicle_details tbody tr")[$("#cargo_vehicle_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),
                box_id = $("#box_line").val(),
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

                g_16 = $("#box_serial_number").val(),
                g_17 = $("#box_barcode").val(),
                g_18 = $("#box_Model").val(),
                g_19 = $("#box_commodity_id").val(),
                g_20 = $("#box_commodity_name").val(),
                g_21 = $("#box_pro_number").val(),
                g_22 = $("#box_project").val(),
                g_23 = $("#box_po_number").val(),
                g_24 = $("#box_inv_number").val(),
                g_25 = $("#box_lot_number").val(),
                g_26 = $("#box_sku_number").val(),
                g_27 = $("#box_destination_point").val(),
                g_28 = $("#box_attention").val(),

                g_29 = $("#box_scheduleb_id").val(),
                g_30 = $("#box_scheduleb_code").val(),
                g_31 = $("#box_scheduleb_description").val(),
                g_32 = $("#box_hts_id").val(),
                g_33 = $("#box_hts_code").val(),
                g_34 = $("#box_hts_description").val(),
                g_35 = $("#box_value").val(),
                g_36 = $("#box_eccn").val(),
                g_37 = $("#box_export_id").val(),
                g_38 = $("#box_export_code").val(),
                g_39 = $("#box_license_type_id").val(),
                g_40 = $("#box_license_type_code").val(),
                g_41 = $("#box_origin").val(),
                g_42 = $("#box_ncm_code").val(),

                g_43 = $("#box_uns_id").val(),
                g_44 = $("#box_uns_code").val(),
                g_45 = $("#box_uns_description").val(),
                g_46 = $("#box_class_id").val(),
                g_47 = $("#box_class_description").val(),
                g_48 = $("#box_packing_group").val(),
                g_49 = $("#box_flash_point").val(),
                g_50 = $("#box_flashing_point_type").val(),
                g_51 = $("#box_special_instructions").val(),
                g_52 = $("#box_units").val(),
                g_53 = $("#box_material_page").val(),
                g_54 = $("#box_hazardous_quantity").val(),
                g_55 = $("#box_label_required").val(),
                g_56 = $("#box_emergency_contact").val(),
                g_57 = $("#box_emergency_contact_phone").val(),
                g_58 = $("#box_comments").val(),

                b = $("#cargo_vehicle_details"),
                x = b.find("tbody"),
                C = $("<tr id=" + (0== box_id? _ : box_id) + ">");


        C.append(createTableContent('details_id', (0 == box_id ? _  : box_id), true,d))
                .append($("<td><i class='fa fa-cube' aria-hidden='true'></td>"))
                .append(createTableContent('details_quantity', g_1, false, d))
                .append(createTableContent('details_unit', g_10, false, d))
                .append(createTableContent('details_length', g_5, false, d))
                .append(createTableContent('details_width', g_6, false, d))
                .append(createTableContent('details_height', g_7, false, d))
                .append(createTableContent('details_total_weight', g_12, false, d))
                .append(createTableContent('details_total_cubic', g_13, false, d))

                .append(createTableContent('details_cargo_type_id', g_2, true, d))
                .append(createTableContent('details_cargo_type_code', g_3, true, d))
                .append(createTableContent('details_metric_unit', g_4, true, d))
                .append(createTableContent('details_material', g_8, true, d))
                .append(createTableContent('details_pieces', g_9, true, d))
                .append(createTableContent('details_unit_weight', g_11, true, d))
                .append(createTableContent('details_dim_fact', g_14, true, d))
                .append(createTableContent('details_vol_weight', g_15, true, d))

                .append(createTableContent('details_serial_number', g_16, true, d))
                .append(createTableContent('details_barcode', g_17, true, d))
                .append(createTableContent('details_Model', g_18, true, d))
                .append(createTableContent('details_commodity_id', g_19, true, d))
                .append(createTableContent('details_commodity_name', g_20, true, d))
                .append(createTableContent('details_pro_number', g_21, true, d))
                .append(createTableContent('details_project', g_22, true, d))
                .append(createTableContent('details_po_number', g_23, true, d))
                .append(createTableContent('details_inv_number', g_24, true, d))
                .append(createTableContent('details_lot_number', g_25, true, d))
                .append(createTableContent('details_sku_number', g_26, true, d))
                .append(createTableContent('details_destination_point', g_27, true, d))
                .append(createTableContent('details_attention', g_28, true, d))

                .append(createTableContent('details_scheduleb_id', g_29, true, d))
                .append(createTableContent('details_scheduleb_code', g_30, true, d))
                .append(createTableContent('details_scheduleb_description', g_31, true, d))
                .append(createTableContent('details_hts_id', g_32, true, d))
                .append(createTableContent('details_hts_code', g_33, true, d))
                .append(createTableContent('details_hts_description', g_34, true, d))
                .append(createTableContent('details_value', g_35, true, d))
                .append(createTableContent('details_eccn', g_36, true, d))
                .append(createTableContent('details_export_id', g_37, true, d))
                .append(createTableContent('details_export_code', g_38, true, d))
                .append(createTableContent('details_license_type_id', g_39, true, d))
                .append(createTableContent('details_license_type_code', g_40, true, d))
                .append(createTableContent('details_origin', g_41, true, d))
                .append(createTableContent('details_ncm_code', g_42, true, d))

                .append(createTableContent('details_uns_id', g_43, true, d))
                .append(createTableContent('details_uns_code', g_44, true, d))
                .append(createTableContent('details_uns_description', g_45, true, d))
                .append(createTableContent('details_class_id', g_46, true, d))
                .append(createTableContent('details_class_description', g_47, true, d))
                .append(createTableContent('details_packing_group', g_48, true, d))
                .append(createTableContent('details_flash_point', g_49, true, d))
                .append(createTableContent('details_flashing_point_type', g_50, true, d))
                .append(createTableContent('details_special_instructions', g_51, true, d))
                .append(createTableContent('details_units', g_52, true, d))
                .append(createTableContent('details_material_page', g_53, true, d))
                .append(createTableContent('details_hazardous_quantity', g_54, true, d))
                .append(createTableContent('details_label_required', g_55, true, d))
                .append(createTableContent('details_emergency_contact', g_56, true, d))
                .append(createTableContent('details_emergency_contact_phone', g_57, true, d))
                .append(createTableContent('details_comments', g_58, true, d))
                .append(createTableBtns())
        0 == box_id ? x.append(C) : x.find("tr#" + box_id).replaceWith(C), cleanModalFields("Box_Details") ,$("#Box_Details").modal("show"), $("#box_quantity").focus(),values_box_vehicle();

}), $("#cargo_vehicle_details").on("click", "a.btn-danger", function() {
    var td = $(this);
    preventDeleteCondition(td, function (td, eval) {
        if (eval) {
            td.closest("tr").remove();
            values_box_vehicle();
        }
    });
}), $("#cargo_vehicle_details").on("click", "a.btn-default", function() {
    removeEmptyNodes('cargo_vehicle_details');
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
            g23 = t[0].childNodes[23].textContent,
            g24 = t[0].childNodes[24].textContent,
            g25 = t[0].childNodes[25].textContent,
            g26 = t[0].childNodes[26].textContent,
            g27 = t[0].childNodes[27].textContent,
            g28 = t[0].childNodes[28].textContent,
            g29 = t[0].childNodes[29].textContent,

            g30 = t[0].childNodes[30].textContent,
            g31 = t[0].childNodes[31].textContent,
            g32 = t[0].childNodes[32].textContent,
            g33 = t[0].childNodes[33].textContent,
            g34 = t[0].childNodes[34].textContent,
            g35 = t[0].childNodes[35].textContent,
            g36 = t[0].childNodes[36].textContent,
            g37 = t[0].childNodes[37].textContent,
            g38 = t[0].childNodes[38].textContent,
            g39 = t[0].childNodes[39].textContent,
            g40 = t[0].childNodes[40].textContent,
            g41 = t[0].childNodes[41].textContent,
            g42 = t[0].childNodes[42].textContent,
            g43 = t[0].childNodes[43].textContent,

            g44 = t[0].childNodes[44].textContent,
            g45 = t[0].childNodes[45].textContent,
            g46 = t[0].childNodes[46].textContent,
            g47 = t[0].childNodes[47].textContent,
            g48 = t[0].childNodes[48].textContent,
            g49 = t[0].childNodes[49].textContent,
            g50 = t[0].childNodes[50].textContent,
            g51 = t[0].childNodes[51].textContent,
            g52 = t[0].childNodes[52].textContent,
            g53 = t[0].childNodes[53].textContent,
            g54 = t[0].childNodes[54].textContent,
            g55 = t[0].childNodes[55].textContent,
            g56 = t[0].childNodes[56].textContent,
            g57 = t[0].childNodes[57].textContent,
            g58 = t[0].childNodes[58].textContent,
            g59 = t[0].childNodes[59].textContent;


    $("#box_line").val(g1),
            $("#box_quantity").val(g2),
            $("#box_weight_unit").val(g3).change(),
            $("#box_length").val(g4),
            $("#box_width").val(g5),
            $("#box_height").val(g6),
            $("#box_total_weight").val(g7),
            $("#box_total_cubic").val(g8),

            $("#box_cargo_type_id").val(g9),
            $("#box_cargo_type_code").val(g10),
            $("#box_metric_unit").val(g11).change(),
            $("#box_materials").val(g12),
            $("#box_pieces").val(g13),
            $("#box_unit_weight").val(g14),
            $("#box_dim_fact").val(g15),
            $("#box_vol_weight").val(g16),

            $("#box_serial_number").val(g17),
            $("#box_barcode").val(g18),
            $("#box_Model").val(g19),
            $("#box_commodity_id").val(g20),
            $("#box_commodity_name").val(g21),
            $("#box_pro_number").val(g22),
            $("#box_project").val(g23),
            $("#box_po_number").val(g24),
            $("#box_inv_number").val(g25),
            $("#box_lot_number").val(g26),
            $("#box_sku_number").val(g27),
            $("#box_destination_point").val(g28),
            $("#box_attention").val(g29),

            $("#box_scheduleb_id").val(g30),
            $("#box_scheduleb_code").val(g31),
            $("#box_scheduleb_description").val(g32),
            $("#box_hts_id").val(g33),
            $("#box_hts_code").val(g34),
            $("#box_hts_description").val(g35),
            $("#box_value").val(g36),
            $("#box_eccn").val(g37),
            $("#box_export_id").val(g38),
            $("#box_export_code").val(g39),
            $("#box_license_type_id").val(g40),
            $("#box_license_type_code").val(g41),
            $("#box_origin").val(g42).change(),
            $("#box_ncm_code").val(g43),

            $("#box_uns_id").val(g44),
            $("#box_uns_code").val(g45),
            $("#box_uns_description").val(g46),
            $("#box_class_id").val(g47),
            $("#box_class_description").val(g48),
            $("#box_packing_group").val(g49).change(),
            $("#box_flash_point").val(g50),
            $("#box_flashing_point_type").val(g51).change(),
            $("#box_special_instructions").val(g52),
            $("#box_units").val(g53),
            $("#box_material_page").val(g54),
            $("#box_hazardous_quantity").val(g55),
            $("#box_label_required").val(g56),
            $("#box_emergency_contact").val(g57),
            $("#box_emergency_contact_phone").val(g58),
            $("#box_comments").val(g59),
            $("#Box_Details").modal("show") , $("#box_quantity").focus()
});

    $("#delete_cargo").click(function(){
        var td = $("#cargo_details");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition('cargo_details');
                clearTableCondition('details_hidden');
                values_box_vehicle();
            }
        });
    });

    $("#delete_charge").click(function(){
        var td = $("#origin_charge");
        preventDeleteCondition(td, function (td, eval) {
            if (eval) {
                clearTableCondition('origin_charge');
                values_charges();
            }
        });
    });

</script>