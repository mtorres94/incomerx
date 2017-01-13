<script type="text/javascript">



    function calculate_cargo() {
        var a = 0,
                e = 0,
                q = $("#box_quantity").val(),
                u = $("#box_unit_weight").val(),
                _ = $("#box_length").val(),
                c = $("#box_width").val(),
                t = $("#box_height").val(),
                i = $("#box_metric_unit").val(),
                g = $("#box_weight_unit").val(),
                l = $("#box_dim_fact").val(),
                f = (_ * c * 0.00694444);
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#box_total_cubic").val(a.toFixed(3)), $("#box_vol_weight").val(e.toFixed(3));$("#box_total_weight").val(q*u );

        var r= $("#cargo_rate").val(),
            ch= $("#cargo_charge_weight").val();
        $("#cargo_gross_weight").val(ch);
        $("#cargo_total").val(r * ch);
    }

    function calculate_warehouse_details() {
        var tr = $('#cargo_details tbody tr'),
            total_pieces = 0,
            total_weight = 0,
            total_cubic = 0,
            total_quantity = 0;


        for (var a=0; a < tr.length; a++) {
            var unit = tr[a].childNodes[5].textContent,
                quantity = parseInt(tr[a].childNodes[4].textContent),
                pieces = parseInt(tr[a].childNodes[17].textContent),
                weight = parseFloat(tr[a].childNodes[10].textContent),
                cubic = parseFloat(tr[a].childNodes[11].textContent);

            total_quantity = total_quantity + quantity;
            total_pieces = total_pieces + pieces;
            total_weight = total_weight + ((unit == "L") ? weight : (weight * 2.2));
            total_cubic = total_cubic + cubic;
        }
        $("#total_quantity").val(total_quantity);
        $("#total_pieces").val(total_pieces);
        $("#total_weight").val(total_weight);
        $("#total_cubic").val(total_cubic);
    }
    function charges_details()
    {
        var rb = $("#billing_rate").val(),
            ib= $("#billing_increase").val(),
            qb = $("#billing_quantity").val(),
            rc = $("#cost_rate").val(),
            qc = $("#cost_quantity").val();

        var ab = (rb * qb) + ((rb * qb) * (ib/100) ),
            ac = rc * qc;

        $("#billing_amount").val(ab), $("#cost_amount").val(ac);
    }

    function values_charges() {
        var tr = $('#chargeDetails tbody tr'),
            total_bill = 0,
            total_cost = 0,
            total_profit = 0,
            total_profit_percent = 0;

        for (var a=0; a < tr.length; a++) {
            var bill = parseFloat(tr[a].childNodes[10].textContent),
                cost = parseFloat(tr[a].childNodes[13].textContent),
                profit = bill - cost,
                profit_percent = parseFloat((profit/bill)*100).toFixed(3);
            total_bill = total_bill + bill;
            total_cost = total_cost + cost;
            total_profit = total_profit + profit;
            total_profit_percent = total_profit_percent + profit_percent;
        }

        $("#sum_bill").val(total_bill);
        $("#sum_cost").val(total_cost);
        $("#sum_profit").val(total_profit);
        $("#sum_profit_percent").val(parseFloat((total_profit/total_bill)*100).toFixed(3));
    }
</script>