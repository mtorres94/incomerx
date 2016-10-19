<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));




    });
    initDate($("#date_today"), 0);
    $("#user_id").attr("disabled", true);
    $("#total_weight").number(true, 3);
    $("#total_cubic").number(true, 3);
    $("#total_volume_weight").number(true, 3);
    $("#total_pieces").number(true);
    $("#total_actual_weight").number(true, 3);
    $("#total_charge_weight").number(true, 3);
    $("#agent_commission").number(true, 3);

</script>