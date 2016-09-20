<script type="text/javascript">
    function calculate() {
        var a = 0,
                e = 0,
                q = $("#cargo_quantity").val(),
                _ = $("#cargo_length").val(),
                c = $("#cargo_width").val(),
                t = $("#cargo_height").val(),
                i = $("#cargo_metric_unit_measurement_id").val(),
                g = $("#cargo_weight_unit_measurement_id").val(),
                l = $("#cargo_dim_fact").val(),
                w = $("#cargo_unit_weight").val(),
                f = (_ * c * 0.00694444);
            i = (i == null) ? "C" : i, g = (g == null) ? "K" : g, l = (l == null) ? "D" : l;
        $("#cargo_weight_unit_measurement_code").val(g), $("#cargo_metric_unit_measurement_code").val(i);
        "I" === i && "L" === g ? (a = _ * c * t / 1728, e = _ * c * t / ("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#cargo_cubic").val(q * a.toFixed(3)), $("#cargo_volume_weight").val(q * e.toFixed(3)), $("#cargo_square_foot").val(q * f.toFixed(2)), $("#cargo_total_weight").val(q * w);
    }

    function multiline_calculate() {
        var a = 0,
                e = 0,
                q = $("#multiline_cargo_quantity").val(),
                _ = $("#multiline_cargo_length").val(),
                c = $("#multiline_cargo_width").val(),
                t = $("#multiline_cargo_height").val(),
                i = $("#multiline_cargo_metric_unit_measurement_id").val(),
                g = $("#multiline_cargo_weight_unit_measurement_id").val(),
                l = $("#multiline_cargo_dim_fact").val(),
                w = $("#multiline_cargo_unit_weight").val(),
                f = (_ * c * 0.00694444);
        i = (i == null) ? "C" : i, g = (g == null) ? "K" : g, l = (l == null) ? "D" : l;
        $("#multiline_cargo_weight_unit_measurement_code").val(g), $("#multiline_cargo_metric_unit_measurement_code").val(i);
        "I" === i && "L" === g ? (a = _ * c * t / 1728, e = _ * c * t / ("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#multiline_cargo_cubic").val(q * a.toFixed(3)), $("#multiline_cargo_volume_weight").val(q * e.toFixed(3)), $("#multiline_cargo_square_foot").val(q * f.toFixed(2)), $("#multiline_cargo_total_weight").val(q * w);
    }
</script>