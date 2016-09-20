<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));

        $("#billing_bill_party").change(function () {
            $("#billing_bill_party").val() == 'O' ?  $("#billing_customer_name").attr("disabled", false): $("#billing_customer_name").attr("disabled", true) ;
        });

        $("#billing_currency_type").change(function () {
            $("#billing_currency_type").val() == 'E' ?  $("#billing_exchange_rate").val(1.15): $("#billing_exchange_rate").val(1.00) ;
        });
        $("#cost_currency_type").change(function () {
            $("#cost_currency_type").val() == 'E' ?  $("#cost_exchange_rate").val(1.15): $("#cost_exchange_rate").val(1.00) ;
        });
        $("#currency_type").change(function () {
            $("#currency_type").val() == 'E' ?  $("#third_exchange_currency").val(1.15): $("#third_exchange_currency").val(1.00) ;
        });
        $("#pick_search_for_name").change(function(){
            values_pick_cargo();
        });

        removeEmptyNodes('charge_details');
        removeEmptyNodes('transportation_details');
        removeEmptyNodes('container_details');
        removeEmptyNodes('dr_details');
        removeEmptyNodes('warehouse_details');
        values_warehouse();
        values_charges();
        dock_receipts();
        transportation_plan();

        $('.collapse').on('show.bs.collapse', function () {
            $('.collapse.in').collapse('hide');
        });

        $("#dr_freight_charges").change(function (){ values_warehouse()  });
        $("#billing_increase").change(function (){ charges_details()});

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

        $("#warehouse_details").change(function () { values_warehouse() });
        $("#dr_total_pieces").change(function () { values_warehouse() });
        $("#dr_cargo_cubic").change(function() { dock_receipts() });
        $("#dr_cargo_rate").change(function() { dock_receipts() });
        $("#dr_cargo_chgrw").change(function() { dock_receipts() });

        $("#billing_quantity").change(function() { charges_details() });
        $("#billing_rate").change(function() { charges_details() });
        $("#cost_quantity").change(function() { charges_details() });
        $("#cost_rate").change(function() { charges_details() });

    });

    $("#cargo_quantity").number(true);
    $("#cargo_pieces").number(true);
    $("#cargo_length").number(true, 3);
    $("#cargo_width").number(true, 3);
    $("#cargo_height").number(true, 3);
    $("#cargo_unit_weight").number(true, 3);
    $("#cargo_total_weight").number(true, 3).attr("disabled", true);
    $("#cargo_cubic").number(true, 3).attr("disabled", true);
    $("#cargo_volume_weight").number(true, 3).attr("disabled", true);
    $("#cargo_tare_weight").number(true, 3);
    $("#cargo_net_weight").number(true, 3);
    $("#cargo_square_foot").number(true, 3).attr("disabled", true);
    $("#item_unit_weight").number(true,2);


    $("#vehicle_quantity").number(true);
    $("#vehicle_pieces").number(true);
    $("#vehicle_length").number(true, 3);
    $("#vehicle_width").number(true, 3);
    $("#vehicle_height").number(true, 3);
    $("#vehicle_unit_weight").number(true, 3);
    $("#vehicle_total_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_cubic_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_volume_weight").number(true, 3).attr("disabled", true);
    $("#vehicle_tare_weight").number(true, 3);
    $("#vehicle_net_weight").number(true, 3);
    $("#vehicle_square_foot").number(true, 3).attr("disabled", true);

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
    $("#dr_cargo_chgrw").number(true, 3).attr("disabled", true);
    $("#dr_cargo_rate").number(true, 3);
    $("#dr_cargo_amount").number(true, 3).attr("disabled", true);
    $("#dr_cargo_pieces").number(true);
    $("#eei_info_value").number(true, 3);

    $("#cost_quantity").number(true, 3);
    $("#cost_rate").number(true, 3);
    $("#cost_amount").number(true, 2).attr("disabled", true);
    $("#billing_quantity").number(true, 3);
    $("#billing_increase").number(true, 2);
    $("#billing_rate").number(true, 3);
    $("#billing_amount").number(true, 2).attr("disabled", true);

    $("#transportation_plans_amount").number(true, 3).attr("disabled", true);
    $("#transportation_amount").number(true, 3);





    $("#dr_total_pieces").number(true).attr("disabled", true);
    $("#dr_packages").number(true).attr("disabled", true);
    $("#dr_act_weight").number(true,3).attr("disabled", true);
    $("#dr_volume_weight").number(true,3).attr("disabled", true);
    $("#dr_net_weight").number(true, 3).attr("disabled", true);
    $("#dr_cubic_weight").number(true, 3).attr("disabled", true);

    $("#user_id").attr("disabled", true);
    $("#pd_code").attr("disabled", true);
    $("#charges_bill").number(true,2).attr("disabled", true);
    $("#charges_cost").number(true,2).attr("disabled", true);
    $("#charges_profit").number(true,2).attr("disabled", true);
    $("#charges_profit_p").number(true,2).attr("disabled", true);
    $("#billing_customer_name").attr("disabled", true);
    $("#billing_exchange_rate").attr("disabled", true,2);
    $("#cost_exchange_rate").attr("disabled", true,2);
    $("#charges_amount").number(true, 3).attr("disabled", true);

    $("#third_exchange_currency").number(true, 2).attr("disabled", true);
    $("#history_invoice").attr("disabled", true);
    $("#history_invoice_date").attr("disabled", true);
    $("#history_user_id").attr("disabled", true);
    $("#history_je_number").attr("disabled", true);
    $("#history_posted_period").attr("disabled", true);
    $("#history_posted_date").attr("disabled", true);

    $("#pick_linked").number(true).attr("disabled", true);
    $("#pick_link_qty").number(true, 3).attr("disabled", true);
    $("#pick_weight").number(true, 3).attr("disabled", true);
    $("#pick_cubic").number(true, 3).attr("disabled", true);
    $("#pick_unlinked").number(true).attr("disabled", true);


</script>