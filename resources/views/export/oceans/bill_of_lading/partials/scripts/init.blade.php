<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        var unique_str = $("#unique_str").val();
        openTab($("#data"));

        initDate($("#bl_date"), 0);

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

        //=======================================================================

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

        $("#cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: {id: id},
                type: 'GET',
                success: function (e) {
                    var act = $("#cargo_type_code").val()
                    $("#cargo_type_code").val(e[0].code);
                }
            });
        });
     transportation_plan();
        weight_totals();
        values_charges();
        values_box_vehicle();
        $("#billing_quantity").change(function() { charges_details() });
        $("#billing_rate").change(function() { charges_details() });
        $("#billing_increase").change(function() { charges_details() });
        $("#cost_quantity").change(function() { charges_details() });
        $("#cost_rate").change(function() { charges_details() });

        $("#box_unit_weight").change(function() { calculate_box() });
        $("#box_length").change(function () { calculate_box() });
        $("#box_quantity").change(function () { calculate_box() });
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

        $("#cargo_rate").change(function() { values_box_vehicle()});
    });
    $("#agent_commission").number(true);
    $("#container_temperature").number(true, 2);
    $("#container_max").number(true, 3);

    $("#container_inner_quantity").number(true, 2);
    $("#container_net_weight").number(true, 2);
    $("#container_number_equipment").number(true, 2);
    $("#container_outer_quantity").number(true, 2);
    $("#container_tare_weight").number(true, 2);

    $("#billing_quantity").number(true);
    $("#billing_increase").number(true, 3);
    $("#billing_rate").number(true, 3);
    $("#billing_amount").number(true, 3).attr("disabled", true);
    $("#billing_exchange_rate").number(true, 3);

    $("#cost_quantity").number(true);
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
    $("#total_weight_kgs").number(true, 3).attr("disabled", true);
    $("#total_cubic_cbm").number(true, 3).attr("disabled", true);
    $("#total_charge_weight_kgs").number(true, 3).attr("disabled", true);
    $("#total_weight_lbs").number(true, 3).attr("disabled", true);
    $("#total_cubic_cft").number(true, 3).attr("disabled", true);
    $("#total_charge_weight_lbs").number(true, 3).attr("disabled", true);
    $("#billing_customer_name").attr("disabled", true);
    $("#cargo_weight_k").number(true, 3).attr("disabled", true);
            $("#cargo_cubic_k").number(true, 3).attr("disabled", true);
            $("#cargo_charge_weight_k").number(true, 3).attr("disabled", true);
            $("#cargo_weight_l").number(true, 3).attr("disabled", true);
            $("#cargo_cubic_l").number(true, 3).attr("disabled", true);
            $("#cargo_charge_weight_l").number(true, 3).attr("disabled", true);
            $("#cargo_rate").number(true, 3);
            $("#cargo_amount").number(true, 3).attr("disabled", true);
    $("#user_id").attr("disabled", true);

    $("#charges_bill").number(true, 3).attr("disabled", true);
    $("#charges_cost").number(true, 3).attr("disabled", true);
    $("#charges_profit").number(true, 3).attr("disabled", true);
    $("#charges_profit_p").number(true, 3).attr("disabled", true);
    $("#transportation_plans_amount").number(true, 3).attr("disabled", true);
    $("#transportation_amount").number(true, 3);


</script>