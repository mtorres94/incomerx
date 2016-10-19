<script type="text/javascript">
    function warehouse_details()
    {
        var tr = $('#load_warehouse_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        var whr_select = new Array();
        $("input[name='pick_select[]']:checked").each(function() {
            whr_select.push($(this).val());
        });
        for (var a=0; a< r ; a+=2) {
            quantity = parseFloat(tr[a].childNodes[24].textContent) + quantity;
            weight = parseFloat(tr[a].childNodes[25].textContent) + weight;
            cubic = parseFloat(tr[a].childNodes[26].textContent) + cubic;
        }
        var unlinked= (r/2)- whr_select.length;
        $("#pick_linked").val(whr_select.length);
        $("#pick_unlinked").val(unlinked);
        $("#pick_weight").val(weight);
        $("#pick_cubic").val(cubic);
        $("#pick_link_qty").val(quantity);
    }
    function cubic_weight_loaded()
    {
        var tr = $('#hidden_cargo_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        for (var a=0; a< r ; a+=2) {
            quantity = parseFloat(tr[a].childNodes[2].textContent) + quantity;
            cubic = parseFloat(tr[a].childNodes[12].textContent) + cubic;
            weight = parseFloat(tr[a].childNodes[13].textContent) + weight;
        }
        $("#weight_load").val(weight);
        $("#cubic_load").val(cubic);
    }

    function calculate_warehouse() {
        var a = 0,
                e = 0,
                q = $("#cargo_quantity").val(),
                u = $("#cargo_unit_weight").val(),
                _ = $("#cargo_length").val(),
                c = $("#cargo_width").val(),
                t = $("#cargo_height").val(),
                i = $("#cargo_metric_unit_measurement_id").val(),
                g = $("#cargo_weight_unit_measurement_id").val(),
                l = $("#cargo_dim_fact").val(),
                f = (_ * c * 0.00694444);
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#cargo_cubic").val(a.toFixed(3)), $("#cargo_volume_weight").val(e.toFixed(3), $("#cargo_square_foot").val(f.toFixed(2)));$("#cargo_total_weight").val(q*u );
    }

</script>
