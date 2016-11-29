<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
removeEmptyNodes('container_details');
removeEmptyNodes('hzd_details');


        for (var t2 = $("#container_tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                    o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }
    });
    $("#bl_status").val("O").change();
    $("#rate_class").val("1").change();
    $("#shipment_type").val("C").change();

    initDate($("#date_today"), 0);
    $("#user_id").attr("disabled", true);
    $("#code").attr("disabled", true);
    $("#total_weight").number(true, 3);
    $("#total_cubic").number(true, 3);
    $("#total_volume_weight").number(true, 3);
    $("#total_pieces").number(true);
    $("#total_actual_weight").number(true, 3);
    $("#total_charge_weight").number(true, 3);
    $("#agent_commission").number(true, 3);

</script>