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

    function values_warehouse(){
        var tr = $('#warehouse_details tbody tr');
        var r = tr.length, b=0, weight_K=0,  vol_K=0, cub_K=0, n_weight_K=0, c=0, d=0, e=0, f=0;
        for (var a=0; a< r ; a++){
            var pieces=0, weight=0, vol=0, cub=0, n_weight=0;
            pieces= parseInt(tr[a].childNodes[2].textContent);

            weight = parseFloat(tr[a].childNodes[8].textContent);
            vol = parseFloat(tr[a].childNodes[13].textContent);
            cub= parseFloat(tr[a].childNodes[11].textContent);
            n_weight= parseFloat(tr[a].childNodes[9].textContent);
            if(tr[a].childNodes[10].textContent == 'L'){
                weight_K = (weight/2.2) + weight_K;
                vol_K = (vol/2.2) + vol_K;
                cub_K = (cub/2.2)+ cub_K;
                n_weight_K = (n_weight/2.2) + n_weight_K;
            }
            else {
                c = weight + c;
                d = vol + d;
                e = cub + e;
                f = n_weight + f;

            }
            b= pieces +b;

        }
        c = weight_K +c;
        d = vol_K + d;
        e = cub_K + e;
        f = n_weight_K + f ;

        //More details- results
        $("#dr_total_pieces").val(b);
        $("#dr_packages").val(r);
        if ($("#dr_freight_charges").val()== 'L')
        {
            var w= parseFloat(c*2.2), x= d*2.2, y= e*2.2, z= f*2.2;
            $("#dr_act_weight").val(w);
            $("#dr_volume_weight").val(x);
            $("#dr_net_weight").val(z);
            $("#dr_cubic_weight").val(y);

        }
        else{
                $("#dr_act_weight").val(c);
                $("#dr_volume_weight").val(d);
                $("#dr_net_weight").val(f);
                $("#dr_cubic_weight").val(e);

        }
    }

    function dock_receipts()
    {
        var a=$("#dr_cargo_cubic").val(), b= $("#dr_cargo_rate").val();
        $("#dr_cargo_chgrw").val(a);
        $("#dr_cargo_amount").val($("#dr_cargo_chgrw").val()*b);
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
            bill = parseFloat(tr[a].childNodes[8].textContent);
            cost = parseFloat(tr[a].childNodes[11].textContent);
            s_bill = bill+ s_bill;
            s_cost = cost + s_cost;
        }
        profit = s_bill - s_cost;
        $("#charges_bill").val(s_bill);
        $("#charges_cost").val(s_cost);
        $("#charges_profit").val(profit);
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#charges_profit_p").val(profit_p);
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
        var tr = $('#pick_cargo_details tbody tr');
        var r = tr.length, qty=0, weight=0, cubic =0, s_qty=0, s_weight=0, s_cubic=0 ;
        for (var a = 0; a < r; a++) {
            qty = parseFloat(tr[a].childNodes[8].textContent);
            weight = parseFloat(tr[a].childNodes[11].textContent);
            cubic = parseFloat(tr[a].childNodes[11].textContent);
            s_qty= s_qty + qty;
            s_weight= s_weight + weight;
            s_cubic= s_cubic + cubic;

        }

        $("#pick_linked").val(tr.length);
        $("#pick_link_qty").val(s_qty);
        $("#pick_weight").val(s_weight);
        $("#pick_cubic").val(s_cubic);

    }
</script>