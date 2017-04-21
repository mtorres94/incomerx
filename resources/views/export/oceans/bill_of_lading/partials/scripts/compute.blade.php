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

    function calculate_vehicle() {
        var a = 0,
                e = 0,
                q = $("#vehicle_quantity").val(),
                u = $("#vehicle_unit_weight").val(),
                _ = $("#vehicle_length").val(),
                c = $("#vehicle_width").val(),
                t = $("#vehicle_height").val(),
                i = $("#vehicle_metric_unit").val(),
                g = $("#vehicle_weight_unit").val(),
                l = $("#vehicle_dim_fact").val(),
                f = (_ * c * 0.00694444);
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#vehicle_total_cubic").val(a.toFixed(3)), $("#vehicle_vol_weight").val(e.toFixed(3) );
        $("#vehicle_total_weight").val(q*u );
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
        var tr = $('#chargeDetails tbody tr');
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
        profit_p = parseFloat((profit * 100 )/ s_bill);
        $("#total_profit_percent").val(profit_p);
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

    function values_box_vehicle(){
        var cubic = $("#cargo_cubic_k").val();
        var rate = $("#cargo_rate").val();
        rate = cubic * rate;
        $("#cargo_amount").val(rate);
    }

    function weight_totals(){
        var tr = $('#cargo_details tbody tr');
        var r = tr.length,  weight_k=0, cubic_k=0, charge_weight_k=0, weight_l=0, cubic_l=0, charge_weight_l=0, pieces=0;
        for (var a=0; a< r ; a++){

            pieces = parseInt(tr[a].childNodes[2].textContent) + pieces;
            weight_k = parseFloat(tr[a].childNodes[5].textContent) + weight_k;
            cubic_k= parseFloat(tr[a].childNodes[6].textContent) + cubic_k;
            charge_weight_k= parseFloat(tr[a].childNodes[7].textContent) + charge_weight_k;
            weight_l = parseFloat(tr[a].childNodes[8].textContent) + weight_l;
            cubic_l= parseFloat(tr[a].childNodes[9].textContent) + cubic_l;
            charge_weight_l= parseFloat(tr[a].childNodes[10].textContent) + charge_weight_l;
        }
            $("#total_pieces").val(pieces),
            $("#total_weight_kgs").val(weight_k),
            $("#total_cubic_cbm").val(cubic_k),
            $("#total_charge_weight_kgs").val(charge_weight_k),
            $("#total_gross_weight").val(weight_l),
            $("#total_cubic").val(cubic_l),
            $("#total_charge_weight").val(charge_weight_l)
    }

    function validateRequiredField(){
        if($("#bl_class").val() == 3){
            if($("#shipment_id").val() > 0){

            } else {
                show_alert();
                $("#shipment_code").focus();
            }
        }else{
            if($("#cargo_loader_id").val() > 0){

            } else {
                show_alert();
                $("#cargo_loader_code").focus();
            }
        }

    }


</script>