<script type="text/javascript">
    function values_charges() {
        var tr = $("#chargeDetails tbody tr");
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
        $("#sum_profit_percent").val(profit_p);
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

</script>