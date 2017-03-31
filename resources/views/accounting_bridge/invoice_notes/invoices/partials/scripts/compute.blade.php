<script type="text/javascript">
    function charges_details()
    {
        var rb = $("#billing_rate").val(),
            ib= $("#billing_increase").val(),
            qb = $("#billing_quantity").val(),
            rc = $("#cost_rate").val(),
            qc = $("#cost_quantity").val();

        var ab = (rb * qb) + ((rb * qb) * (ib/100) ),
            ac = rc * qc;

        $("#billing_amount").val(ab);
        $("#cost_amount").val(ac);
    }

    function values_charges() {
        var tr = $('#charge_table tbody tr');
        var r = tr.length, s_bill=0, s_cost=0, profit=0, profit_p=0, bill=0, cost=0;
        for (var a = 0; a < r; a++) {
            bill = parseFloat(tr[a].childNodes[8].textContent);
            cost = parseFloat(tr[a].childNodes[11].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
        }
        profit = s_bill - s_cost;
        $("#total_bill").val(s_bill);
        $("#total_cost").val(s_cost);
        $("#total_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill).toFixed(3);
        console.log(profit_p);
        $("#total_profit_percent").val(profit_p);
        $("#total_balance").val(s_bill);
    }

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

    function calculate_cargo(){
        var tr = $('#cargo_table tbody tr');
        var r = tr.length, total_weight=0, volume_weight=0, cubic=0, s_weight=0, s_volume=0, s_cubic=0, s_pieces=0, pieces=0;
        for (var a = 0; a < r; a++) {
            total_weight = parseFloat(tr[a].childNodes[11].textContent);
            volume_weight = parseFloat(tr[a].childNodes[13].textContent);
            cubic= parseFloat(tr[a].childNodes[12].textContent);
            pieces= parseFloat(tr[a].childNodes[1].textContent);
            s_weight= total_weight + s_weight;
            s_volume= volume_weight + s_volume;
            s_cubic= cubic + s_cubic;
            s_pieces= pieces + s_pieces;
        }
        $("#total_volume_weight").val(s_volume.toFixed(3));
        $("#total_cubic").val(s_cubic.toFixed(3));
        $("#total_gross_weight").val(s_weight.toFixed(3));
        $("#total_charge_weight").val(s_weight.toFixed(3));
        $("#total_pieces").val(s_pieces);
    }
</script>