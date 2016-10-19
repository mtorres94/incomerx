<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        //=========================
        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {
            } else {var  n = e.indexOf("display: block;"),
                    o = e.indexOf("display: none;");
            $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")}
        }

        for (var t1 = $("#charges-tabs").find("div"), l1 = 0; l1 < t1.length  ; l1++) {
            var a1 = t[l1];
            var e1 = $(a1).attr("style");
            if (e === undefined) {
            } else {var n1 = e.indexOf("display: block;"),
                    o1 = e.indexOf("display: none;");
            $(a1).removeAttr("style"), n1 >= 0 && $(a1).attr("style", "display: block;"), o1 >= 0 && $(a1).attr("style", "display: none;")}
        }


        for (var t2 = $("#cargo-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t[l2];
            var e2 = $(a2).attr("style");
            if (e === undefined) {
            } else {var n2 = e.indexOf("display: block;"),
                    o2 = e.indexOf("display: none;");
            $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }
        //=========================

        $("#billing_bill_party").change(function () {
            $("#billing_bill_party").val() == 'O' ?  $("#billing_customer_name").attr("disabled", false): $("#billing_customer_name").attr("disabled", true) ;
        });
        $("#box_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#box_cargo_type_code").val()
                    $("#box_cargo_type_code").val(e[0].code);
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
                                    $("#box_length").val(e[0].length), $("#box_width").val(e[0].width), $("#box_height").val(e[0].height);
                                    calculate_box();
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

        removeEmptyNodes("charge_details");
        removeEmptyNodes("cargo_vehicle_details");
        removeEmptyNodes("container_details");
        removeEmptyNodes("cargo_details");
        removeEmptyNodes("details_hidden");

        initDate($("#booked_on_date"), 0);
        values_box_vehicle();
        weight_totals();
        $("#box_length").change(function () { calculate_box() });
        $("#box_quantity").change(function () { calculate_box() });
        $("#box_unit_weight").change(function () { calculate_box() });
        $("#box_total_weight").change(function () { calculate_box() });
        $("#box_width").change(function () { calculate_box() });
        $("#box_height").change(function () { calculate_box() });
        $("#box_metric_unit").change(function () { calculate_box() });
        $("#box_weight_unit").change(function () { calculate_box() });
        $("#box_dim_fact").change(function () { calculate_box() });


        $("#vehicle_length").change(function () { calculate_vehicle() });
        $("#vehicle_quantity").change(function () { calculate_vehicle() });
        $("#vehicle_unit_weight").change(function () { calculate_vehicle() });
        $("#vehicle_total_weight").change(function () { calculate_vehicle() });
        $("#vehicle_width").change(function () { calculate_vehicle() });
        $("#vehicle_height").change(function () { calculate_vehicle() });
        $("#vehicle_metric_unit").change(function () { calculate_vehicle() });
        $("#vehicle_weight_unit").change(function () { calculate_vehicle() });
        $("#vehicle_dim_fact").change(function () { calculate_vehicle() });

        $("#cargo_weight_unit").change( function() { values_box_vehicle()});
        $("#total_weight_unit_measurement").change( function() { weight_totals()});

        $("#billing_quantity").change(function() { charges_details() });
        $("#billing_rate").change(function() { charges_details() });
        $("#cost_quantity").change(function() { charges_details() });
        $("#cost_rate").change(function() { charges_details() });
        $("#billing_increase").change(function() { charges_details() });

        $("#booking_status").val('O').change();
        $("#bl_type").val('C').change();
        $("#shipment_type").val('C').change();
    });

    $("#agent_commission").number(true);
    $("#container_temperature").number(true, 2);
    $("#container_max").number(true, 3);

    $("#container_inner_quantity").number(true, 2);
    $("#container_net_weight").number(true, 2);
    $("#container_number_equipment").number(true, 2);
    $("#container_outer_quantity").number(true, 2);
    $("#container_tare_weight").number(true, 2);

    $("#billing_quantity").number(true, 3);
    $("#billing_increase").number(true, 3);
    $("#billing_rate").number(true, 3);
    $("#billing_amount").number(true, 3).attr("disabled", true);
    $("#billing_exchange_rate").number(true, 3);

    $("#cost_quantity").number(true, 3);
    $("#cost_rate").number(true, 3);
    $("#cost_amount").number(true, 3).attr("disabled", true);
    $("#cost_exchange_rate").number(true, 3);

    $("#cargo_grossw").number(true, 3).attr("disabled", true);
    $("#cargo_cubic").number(true, 3).attr("disabled", true);

    $("#box_length").number(true, 3);
    $("#box_quantity").number(true);
    $("#box_unit_weight").number(true, 3);
    $("#box_total_weight").number(true, 3).attr("disabled", true);
    $("#box_width").number(true, 3);
    $("#box_height").number(true, 3);
    $("#box_vol_weight").number(true, 3).attr("disabled", true);
    $("#box_total_cubic").number(true, 3).attr("disabled", true);

    $("#box_flash_point").number(true, 2);

    $("#vehicle_length").number(true, 3);
    $("#vehicle_quantity").number(true);
    $("#vehicle_unit_weight").number(true, 3);
    $("#vehicle_total_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_width").number(true, 3);
    $("#vehicle_height").number(true, 3);
    $("#vehicle_vol_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_total_cubic").number(true, 3).attr("disabled", true);

    $("#total_quantity").number(true).attr("disabled", true);
    $("#booking_code").attr("disabled", true);
    $("#total_weight").number(true, 3).attr("disabled", true);
    $("#total_cubic").number(true, 3).attr("disabled", true);
    $("#total_volume_weight").number(true, 3).attr("disabled", true);
    $("#billing_customer_name").attr("disabled", true);

    $("#user_id").attr("disabled", true);


</script>