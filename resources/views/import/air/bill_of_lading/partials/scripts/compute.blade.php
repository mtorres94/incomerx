<script type="text/javascript">
    function show_alert(){
        swal({   title: "Error!",   text: "A required file is empty. Please complete it and try again.",   type: "warning",   confirmButtonText: "Ok" });
    }
    function calculate_box() {
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
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#box_total_cubic").val(a.toFixed(3)), $("#box_vol_weight").val(e.toFixed(3) );
        $("#box_total_weight").val(q*u );
    }

    function calculate_amount(){
      var x= $("#tmp_rate").val(), y=$("#tmp_cubic").val();
        $("#tmp_charge_weight").val(y);
        $("#tmp_amount").val(x * y);
    }

    function calculate_totals(){
        var tr = $('#origin_charge tbody tr');
        var r = tr.length,  prepaid=0, collected=0,  type= "";
        for (var a=0; a< r ; a++) {
            type = tr[a].childNodes[4].textContent;
            if(type == "P"){
                prepaid = prepaid + parseFloat(tr[a].childNodes[8].textContent);
            }else{
                collected = collected + parseFloat(tr[a].childNodes[8].textContent);
            }
        }

        $("#sum_prepaid").val(prepaid);
        $("#sum_collected").val(collected);
    }


    function values_box_vehicle(){
        var tr = $('#cargo_details tbody tr');
        var r = tr.length,  weight=0, cub=0,  amount=0, pieces= 0;
        for (var a=0; a< r ; a++) {
            pieces = parseInt(tr[a].childNodes[2].textContent) + pieces;
            weight = parseFloat(tr[a].childNodes[8].textContent) + weight;
            cub = parseFloat(tr[a].childNodes[11].textContent) + cub;
            amount = parseFloat(tr[a].childNodes[13].textContent) + amount;
        }
            $("#total_gross_weight").val(weight);
            $("#total_amount").val(amount);
            $("#total_cubic").val(cub);
            $("#total_pieces").val(pieces);

    }

    function destination_charges() {
        var tr = $('#destination_charge tbody tr');
        var r = tr.length, s_bill=0, s_cost=0, profit=0, profit_p=0, bill=0, cost=0;
        for (var a = 0; a < r; a++) {
            bill = parseFloat(tr[a].childNodes[8].textContent);
            cost = parseFloat(tr[a].childNodes[11].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
        }
        profit = s_bill - s_cost;
        $("#destination_bill").val(s_bill);
        $("#destination_cost").val(s_cost);
        $("#destination_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#destination_profit_p").val(profit_p);
    }

    function values_charges() {
        var tr = $('#origin_charge tbody tr');
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

    function destination_charges_details()
    {
        $("#destination_bill_amount").val($("#destination_bill_quantity").val()* $("#destination_bill_rate").val());
        $("#destination_cost_amount").val($("#destination_cost_quantity").val()* $("#destination_cost_rate").val());

        var x= parseFloat($("#destination_cost_amount").val()),
                y= parseFloat($("#destination_bill_increase").val()/100), z=0 ;
        z= x* y + parseFloat($("#destination_cost_amount").val());
        $("#destination_bill_amount").val(z);
        var w= parseInt($("#destination_bill_quantity").val());
        w= z/ w;
        $("#destination_bill_rate").val(w);
    }

    function calculate_individual_charges() {
        var rb = $("#origin_bill_rate").val(),
            ib=$("#origin_bill_increase").val(),
            qb = $("#origin_bill_quantity").val(),
            rc = $("#origin_cost_rate").val(),
            qc = $("#origin_cost_quantity").val();

        var ab = (rb * qb) + ((rb * qb) * (ib/100) ),
            ac = rc * qc;

        $("#origin_bill_amount").val(ab), $("#origin_cost_amount").val(ac);
    }
</script>