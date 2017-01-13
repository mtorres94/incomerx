<script type="text/javascript">

    $("#btn_container_details").click(function() {
        $("#container_pickup_type").val("01").change();
        $("#container_delivery_type").val("01").change();
        $("#container_drop_type").val("01").change();

        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style"),
                    n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
        }
    });

    $("#container-save").click(function() {
if($("#equipment_type_code").val()==''){
show_alert();
$("#equipment_type_code").focus();
}else {
    var t = $("#container_details tbody tr").length + 1,
            _ = ($("#container_details tbody tr").length == 0 ? 1 : parseInt($("#container_details tbody tr")[$("#container_details tbody tr").length - 1].childNodes[0].textContent) + 1 ),

            container_id = $("#container_line").val(),
            d = (0 == container_id ? _ : container_id) - 1,
            g_1 = $("#equipment_type_id").val(),
            g_2 = $("#equipment_type_code").val().toUpperCase(),
            g_3 = $("#container_number").val(),
            g_4 = $("#container_seal_number").val(),
            g_5 = $("#container_seal_number_2").val(),
            g_6 = $("#container_commodity_id").val(),
            g_7 = $("#container_commodity_name").val().toUpperCase(),
            g_8 = $("#container_status").val(),
            g_9 = $("#container_spotting_date").val(),
            g_10 = $("#container_pull_date").val(),
            g_11 = $("#container_carrier_id").val(),
            g_12 = $("#container_carrier_name").val().toUpperCase(),
            g_13 = $("#container_ventilation").val(),
            g_14 = $("#container_degrees").val(),
            g_15 = $("#container_temperature").val(),
            g_16 = $("#container_max").val(),
            g_17 = $("#container_min").val(),

            g_18 = $("#container_pickup_id").val(),
            g_19 = $("#container_pickup_name").val().toUpperCase(),
            g_20 = $("#container_pickup_type").val(),
            g_21 = $("#container_pickup_address").val(),
            g_22 = $("#container_pickup_city").val(),
            g_23 = $("#container_pickup_state_id").val(),
            g_24 = $("#container_pickup_state_name").val().toUpperCase(),
            g_25 = $("#container_pickup_zip_code_id").val(),
            g_26 = $("#container_pickup_zip_code_code").val().toUpperCase(),
            g_27 = $("#container_pickup_phone").val(),
            g_28 = $("#container_pickup_contact").val(),
            g_29 = $("#container_pickup_date").val(),
            g_30 = $("#container_pickup_number").val(),

            g_31 = $("#container_delivery_id").val(),
            g_32 = $("#container_delivery_name").val(),
            g_33 = $("#container_delivery_type").val(),
            g_34 = $("#container_delivery_address").val(),
            g_35 = $("#container_delivery_city").val(),
            g_36 = $("#container_delivery_state_id").val(),
            g_37 = $("#container_delivery_state_name").val().toUpperCase(),
            g_38 = $("#container_delivery_zip_code_id").val(),
            g_39 = $("#container_delivery_zip_code_code").val().toUpperCase(),
            g_40 = $("#container_delivery_phone").val(),
            g_41 = $("#container_delivery_contact").val(),
            g_42 = $("#container_delivery_date").val(),
            g_43 = $("#container_delivery_drop_off").val(),

            g_44 = $("#container_drop_id").val(),
            g_45 = $("#container_drop_name").val(),
            g_46 = $("#container_drop_type").val(),
            g_47 = $("#container_drop_address").val(),
            g_48 = $("#container_drop_city").val(),
            g_49 = $("#container_drop_state_id").val(),
            g_50 = $("#container_drop_state_name").val().toUpperCase(),
            g_51 = $("#container_drop_zip_code_id").val(),
            g_52 = $("#container_drop_zip_code_code").val().toUpperCase(),
            g_53 = $("#container_drop_phone").val(),
            g_54 = $("#container_drop_contact").val(),
            g_55 = $("#container_drop_date").val(),
            g_56 = $("#container_comments").val(),

            b = $("#container_details"),
            x = b.find("tbody"),
            C = $("<tr id=" + (0 == container_id ? _ : container_id) + ">");


    C.append(createTableContent('container_line', (0 == container_id ? _ : container_id), true, d))
            .append(createTableContent('equipment_type_id', g_1, true, d))
            .append(createTableContent('equipment_type_code', g_2, false, d))
            .append(createTableContent('container_number', g_3, false, d))
            .append(createTableContent('container_seal_number', g_4, false, d))
            .append(createTableContent('container_seal_number_2', g_5, true, d))
            .append(createTableContent('container_commodity_id', g_6, true, d))
            .append(createTableContent('container_commodity_name', g_7, true, d))
            .append(createTableContent('container_status', g_8, false, d))
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
            .append(createTableContent('container_delivery_drop_off', g_43, true, d))

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
            .append(createTableContent('container_comments', g_56, true, d))
            .append(createTableBtns()),
            0 == container_id ? x.append(C) : x.find("tr#" + container_id).replaceWith(C), $("#Container_Details").modal("hide"), $("#equipment_type_code").focus();
}
    }), $("#container_details").on("click", "a.btn-danger", function() {
    $(this).closest("tr").remove()

    }), $("#container_details").on("click", "a.btn-default", function() {
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
    g57 = t[0].childNodes[56].textContent;

    $("#container_line").val(g1),
    $("#equipment_type_id").val(g2),
    $("#equipment_type_code").val(g3),
    $("#container_number").val(g4),
    $("#container_seal_number").val(g5),
    $("#container_seal_number_2").val(g6),
    $("#container_commodity_id").val(g7),
    $("#container_commodity_name").val(g8),
    $("#container_status").val(g9),
    $("#container_spotting_date").val(g10),
    $("#container_pull_date").val(g11),
    $("#container_carrier_id").val(g12),
    $("#container_carrier_name").val(g13),
    $("#container_ventilation").val(g14),
    $("#container_degrees").val(g15),
    $("#container_temperature").val(g16),
    $("#container_max").val(g17),
    $("#container_min").val(g18),

    $("#container_pickup_id").val(g19),
    $("#container_pickup_name").val(g20),
    $("#container_pickup_type").val(g21),
    $("#container_pickup_address").val(g22),
    $("#container_pickup_city").val(g23),
    $("#container_pickup_state_id").val(g24),
    $("#container_pickup_state_name").val(g25),
    $("#container_pickup_zip_code_id").val(g26),
    $("#container_pickup_zip_code_code").val(g27),
    $("#container_pickup_phone").val(g28),
    $("#container_pickup_contact").val(g29),
    $("#container_pickup_date").val(g30),
    $("#container_pickup_number").val(g31),

    $("#container_delivery_id").val(g32),
    $("#container_delivery_name").val(g33),
    $("#container_delivery_type").val(g34),
    $("#container_delivery_address").val(g35),
    $("#container_delivery_city").val(g36),
    $("#container_delivery_state_id").val(g37),
    $("#container_delivery_state_name").val(g38),
    $("#container_delivery_zip_code_id").val(g39),
    $("#container_delivery_zip_code_code").val(g40),
    $("#container_delivery_phone").val(g41),
    $("#container_delivery_contact").val(g42),
    $("#container_delivery_date").val(g43),
    $("#container_delivery_drop_off").val(g44),

    $("#container_drop_id").val(g45),
    $("#container_drop_name").val(g46),
    $("#container_drop_type").val(g47),
    $("#container_drop_address").val(g48),
    $("#container_drop_city").val(g49),
    $("#container_drop_state_id").val(g50),
    $("#container_drop_state_name").val(g51),
    $("#container_drop_zip_code_id").val(g52),
    $("#container_drop_zip_code_code").val(g53),
    $("#container_drop_phone").val(g54),
    $("#container_drop_contact").val(g55),
    $("#container_drop_date").val(g56),
    $("#container_comments").val(g57),
    $("#Container_Details").modal("show"), $("#equipment_type_code").focus()
    });
    </script>