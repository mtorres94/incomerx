<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        removeEmptyNodes("container_details");
        initDate($("#date_today"), 0);

        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('io_shipment_entries.close') }}')

        if ($("#open_status").val() == "1") {
            disableFields('data');
        }

        //=========================
        for (var t = $("#container_tabs").find("div"), l = 0; l < t.length; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {
            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        $("#shipment_type").val("C").change();
        $("#shipment_status").val("O").change();
        $("#container_status").val("1").change();
        $("#container_degrees").val("F").change();
        $("#container_pickup_type").val("01").change();
        $("#container_delivery_type").val("01").change();
        $("#container_drop_type").val("01").change();
        $("#total_weight_unit").val("K").change();
    });
    $("#code").attr("disabled", true);
    $("#user_id").attr("disabled", true);
    $("#total_quantity").number(true);
    $("#total_houses").number(true);
    $("#total_cubic").number(true,3);
    $("#total_weight").number(true,3);


</script>