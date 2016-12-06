<script type="text/javascript">
    function calculate() {
        var a = 0,
                e = 0,
                q = $("#tmp_cargo_quantity").val(),
                _ = $("#tmp_cargo_length").val(),
                c = $("#tmp_cargo_width").val(),
                t = $("#tmp_cargo_height").val(),
                i = $("#tmp_cargo_metric_unit_measurement_id").val(),
                g = $("#tmp_cargo_weight_unit_measurement_id").val(),
                l = $("#tmp_cargo_dim_fact").val(),
                w = $("#tmp_cargo_unit_weight").val(),
                f = (_ * c * 0.00694444);
            i = (i == null) ? "C" : i, g = (g == null) ? "K" : g, l = (l == null) ? "D" : l;
        $("#tmp_cargo_weight_unit_measurement_code").val(g), $("#tmp_cargo_metric_unit_measurement_code").val(i);
        "I" === i && "L" === g ? (a = _ * c * t / 1728, e = _ * c * t / ("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#tmp_cargo_cubic").val(q * a.toFixed(3)), $("#tmp_cargo_volume_weight").val(q * e.toFixed(3)), $("#tmp_cargo_square_foot").val(q * f.toFixed(2)), $("#tmp_cargo_total_weight").val(q * w);
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

    function calculate_warehouse_details() {
        var tr = $('#warehouse-details tbody tr'),
            total_pieces = 0,
            total_weight = 0,
            total_volume_weight = 0,
            total_cubic = 0;

        for (var a=0; a < tr.length; a++) {
            var unit = tr[a].childNodes[6].textContent,
                pieces = parseInt(tr[a].childNodes[5].textContent),
                weight = parseFloat(tr[a].childNodes[12].textContent),
                volume_weight = parseFloat(tr[a].childNodes[14].textContent),
                cubic = parseFloat(tr[a].childNodes[13].textContent);

            total_pieces = total_pieces + pieces;
            total_weight = total_weight + ((unit == "L") ? weight : (weight * 2.2));
            total_volume_weight = total_volume_weight + ((unit == "L") ? volume_weight : (volume_weight * 2.2));
            total_cubic = total_cubic + cubic;
        }

        $("#sum_pieces").val(total_pieces);
        $("#sum_weight").val(total_weight);
        $("#sum_volume_weight").val(total_volume_weight);
        $("#sum_cubic").val(total_cubic);
    }


</script>