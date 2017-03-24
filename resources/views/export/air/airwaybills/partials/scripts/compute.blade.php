<script type="text/javascript">
    function total_cargo()
    {
        var tr = $('#cargos tbody tr');
        var r = tr.length,  pieces=0, gross_weight=0, volume_weight=0, charge_weight=0;
        for (var a=0; a< r ; a++) {
            pieces = parseFloat(tr[a].childNodes[1].textContent) + pieces;
            gross_weight = parseFloat(tr[a].childNodes[3].textContent) + gross_weight;
            volume_weight = parseFloat(tr[a].childNodes[4].textContent) + volume_weight ;
            charge_weight = parseFloat(tr[a].childNodes[12].textContent) + charge_weight ;
        }
        $("#sum_pieces").val(pieces);
        $("#sum_weight").val(gross_weight);
        $("#sum_volume_weight").val(volume_weight);
        $("#sum_charge_weight").val(charge_weight);
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

    function total_charge_details() {
        var tr = $('#charges tbody tr');
        var r = tr.length, s_bill=0, s_cost=0, profit=0, profit_p=0, bill=0, cost=0;
        for (var a = 0; a < r; a++) {
            bill = parseFloat(tr[a].childNodes[8].textContent);
            cost = parseFloat(tr[a].childNodes[11].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
        }
        profit = s_bill - s_cost;
        $("#sum_bill").val(s_bill);
        $("#sum_cost").val(s_cost);
        $("#sum_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#sum_profit_p").val(profit_p);
    }
</script>