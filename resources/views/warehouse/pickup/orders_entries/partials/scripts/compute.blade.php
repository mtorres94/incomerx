<script type="text/javascript">
    function calculate_cargo() {
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
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#cargo_cubic").val(a.toFixed(3)), $("#cargo_volume_weight").val(e.toFixed(3), $("#cargo_square_foot").val(f.toFixed(2)));
        $("#cargo_total_weight").val(q*u );
    }

    function calculate_vehicle() {
        var a = 0,
                e = 0,
                q = $("#vehicle_quantity").val(),
                u = $("#vehicle_unit_weight").val(),
                _ = $("#vehicle_length").val(),
                c = $("#vehicle_width").val(),
                t = $("#vehicle_height").val(),
                i = $("#vehicle_metric_unit_measurement_id").val(),
                g = $("#vehicle_weight_unit_measurement_id").val(),
                l = $("#vehicle_dim_fact").val(),
                f = (_ * c * 0.00694444);
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#vehicle_cubic_weight").val(a.toFixed(3)), $("#vehicle_volume_weight").val(e.toFixed(3), $("#vehicle_square_foot").val(f.toFixed(2)));
        $("#vehicle_total_weight").val(q*u );
    }

    function calculate_warehouse_details() {
        var tr = $('#warehouse_details tbody tr'),
            r = tr.length,
            total_pieces = 0,
            total_weight = 0,
            total_volume_weight = 0,
            total_cubic = 0,
            total_net_weight= 0;

        for (var a=0; a < tr.length; a++) {
            var unit = tr[a].childNodes[10].textContent,
                pieces = parseInt(tr[a].childNodes[16].textContent),
                weight = parseFloat(tr[a].childNodes[8].textContent),
                volume_weight = parseFloat(tr[a].childNodes[13].textContent),
                cubic = parseFloat(tr[a].childNodes[11].textContent),
                net_weight= parseFloat(tr[a].childNodes[9].textContent);

            total_pieces = total_pieces + pieces;
            total_weight = total_weight + ((unit == "L") ? weight : (weight * 2.2));
            total_volume_weight = total_volume_weight + ((unit == "L") ? volume_weight : (volume_weight * 2.2));
            total_cubic = total_cubic + cubic;
            total_net_weight= total_net_weight + net_weight;
        }

        $("#sum_pieces").val(total_pieces);
        $("#sum_packages").val(r);
        $("#sum_weight").val(total_weight);
        $("#sum_volume_weight").val(total_volume_weight);
        $("#sum_net_weight").val(total_net_weight);
        $("#sum_cubic").val(total_cubic);

    }
    function dock_receipts()
    {
        var a=$("#dr_cargo_cubic").val(), b= $("#dr_cargo_rate").val();
        $("#dr_cargo_chgrw").val(a);
        $("#dr_cargo_amount").val($("#dr_cargo_chgrw").val()*b);
    }

    function calculate_individual_charges() {
        var rb = $("#billing_rate").val(),
                ib= $("#billing_increase").val(),
                qb = $("#billing_quantity").val(),
                rc = $("#cost_rate").val(),
                qc = $("#cost_quantity").val();

        var ab = (rb * qb) + ((rb * qb) * (ib/100) ),
                ac = rc * qc;

        $("#billing_amount").val(ab), $("#cost_amount").val(ac);
    }

    function calculate_charges() {
        var tr = $('#charge_details tbody tr'),
                total_bill = 0,
                total_cost = 0,
                total_profit = 0,
                total_profit_percent = 0;

        for (var a=0; a < tr.length; a++) {
            var bill = parseFloat(tr[a].childNodes[8].textContent),
                    cost = parseFloat(tr[a].childNodes[11].textContent),
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


    function transportation_plan()
    {
        var tr = $('#transportation_details tbody tr');
        var r = tr.length, s_amount=0;
        for (var a = 0; a < r; a++) {
            var amount = parseFloat(tr[a].childNodes[12].textContent);
            s_amount = amount+ s_amount;
        }
        $("#transportation_plans_amount").val(s_amount);
    }

    function show_alert(){
        swal({   title: "Error!",   text: "A required file is empty. Please complete it and try again.",   type: "warning",   confirmButtonText: "Ok" });
    }

    function values_pick_cargo()
    {
        var x=0;
        var pick_select = new Array();
        $("input[name='pick_select[]']:checked").each(function() {
            pick_select.push($(this).val());
        });
        var tr = $('#pick_cargo_details tbody tr');
        var r = tr.length, qty=0, weight=0, cubic =0, s_qty=0, s_weight=0, s_cubic=0 ;
        for (var a = 0; a < r; a++) {

            if( pick_select[x] == tr[a].childNodes[12].textContent){
                qty = parseFloat(tr[a].childNodes[6].textContent);
                weight = parseFloat(tr[a].childNodes[7].textContent);
                cubic = parseFloat(tr[a].childNodes[8].textContent);
                s_qty= s_qty + qty;
                s_weight= s_weight + weight;
                s_cubic= s_cubic + cubic;
                x++;
            }
        }

        $("#pick_linked").val(pick_select.length);
        $("#pick_unlinked").val(r - pick_select.length);
        $("#pick_link_qty").val(s_qty);
        $("#pick_weight").val(s_weight);
        $("#pick_cubic").val(s_cubic);

    }
</script>
