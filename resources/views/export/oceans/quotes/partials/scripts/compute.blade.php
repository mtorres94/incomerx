<script type="text/javascript">

    function show_alert(){
        swal({   title: "Error!",   text: "A required file is empty. Please complete it and try again.",   type: "warning",   confirmButtonText: "Ok" });
    }

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
    }

    function total_cargo()
    {
        var tr = $('#cargo_details tbody tr');
        var r = tr.length,  weight_k=0, cubic_k=0,quantity=0;
        for (var a=0; a< r ; a++){
            quantity = parseInt(tr[a].childNodes[4].textContent) + quantity;
            weight_k = parseFloat(tr[a].childNodes[10].textContent) + weight_k;
            cubic_k= parseFloat(tr[a].childNodes[11].textContent) + cubic_k;
        }
        $("#total_quantity").val(quantity);
        $("#total_weight").val(weight_k);
        $("#total_cubic").val(cubic_k);

    }

    function charges_details()
    {
        $("#billing_amount").val($("#billing_quantity").val()* $("#billing_rate").val());
        $("#cost_amount").val($("#cost_quantity").val()* $("#cost_rate").val());

        var x= parseFloat($("#cost_amount").val()),
                y= parseFloat($("#billing_increase").val()/100), z=0 ;
        z= x* y + parseFloat($("#cost_amount").val());
        $("#billing_amount").val(z);
        var w= parseInt($("#billing_quantity").val());
        w= z/ w;
        $("#billing_rate").val(w);
    }

    function values_charges() {
        var tr = $('#charge_details tbody tr');
        var r = tr.length, s_bill=0, s_cost=0, profit=0, profit_p=0, bill=0, cost=0;
        for (var a = 0; a < r; a++) {
            bill = parseFloat(tr[a].childNodes[10].textContent);
            cost = parseFloat(tr[a].childNodes[13].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
        }
        profit = s_bill - s_cost;
        $("#total_bill").val(s_bill);
        $("#total_cost").val(s_cost);
        $("#total_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#total_profit_p").val(profit_p);
    }
</script>