<script type="text/javascript">
    function total_cargo()
    {
        var tr = $('#cargos tbody tr');
        var r = tr.length,  pieces=0, gross_weight=0, total=0, charge_weight=0, rate=0;
        for (var a=0; a< r ; a++) {
            pieces = parseFloat(tr[a].childNodes[1].textContent) + pieces;
            gross_weight = parseFloat(tr[a].childNodes[3].textContent) + gross_weight;
            total = parseFloat(tr[a].childNodes[6].textContent) + total ;
            charge_weight = parseFloat(tr[a].childNodes[12].textContent) + charge_weight ;
            rate = parseFloat(tr[a].childNodes[5].textContent) + rate ;
        }
        $("#total_pieces").val(pieces);
        $("#total_gross_weight").val(gross_weight);
        $("#sum_total").val(total);
        $("#total_charge_weight").val(charge_weight);
        $("#total_rate").val(rate);

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

        $("#billing_amount").val(ab);
        $("#cost_amount").val(ac);
    }

    function total_charge_details() {
        var tr = $('#charges tbody tr');
        var r = tr.length, s_bill=0, s_cost=0, profit=0, profit_p=0, bill=0, cost=0, prepaid=0, collected=0;
        for (var a = 0; a < r; a++) {
            bill = parseFloat(tr[a].childNodes[8].textContent);
            cost = parseFloat(tr[a].childNodes[11].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
            if(tr[a].childNodes[4].textContent == 'C'){
                collected = collected + bill;
            }else{
                prepaid = prepaid + bill;
            }
        }
        profit = s_bill - s_cost;
        $("#total_bill").val(s_bill);
        $("#total_cost").val(s_cost);
        $("#total_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#total_profit_percent").val(profit_p);
        $("#total_prepaid").val(prepaid);
        $("#total_collected").val(collected);
    }
    function calculate_cargo(){
        var r = $("#cargo_rate").val(),
            w = $("#cargo_charge_weight").val(),
            x = 0;
        x= parseFloat(r * w);
        $("#cargo_total").val(x.toFixed(3));
        $("#cargo_show_total").val(x.toFixed(3));
        $("#cargo_show_rate").val(r);
    }
</script>