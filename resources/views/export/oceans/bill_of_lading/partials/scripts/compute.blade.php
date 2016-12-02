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
        var tr = $('#chargeDetails tbody tr');
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

    function values_box_vehicle(){
        var tr = $('#cargo_vehicle_details tbody tr');
        var r = tr.length,  weight=0, cub=0, weight_k=0, cub_k=0, c=0, d=0, e=0, f=0, pieces= 0;
        for (var a=0; a< r ; a++){
            pieces=  parseInt(tr[a].childNodes[2].textContent) + pieces;
            weight = parseFloat(tr[a].childNodes[7].textContent);
            cub= parseFloat(tr[a].childNodes[8].textContent);
            if(tr[a].childNodes[3].textContent == 'L'){
                weight_k = (weight/2.2) + weight_k;
                cub_k = (cub/2.2)+ cub_k;
            }
            else {
                c = weight + c;
                d= cub+ d;
            }
            console.log(pieces);

        }
        c = weight_k +c;
        d = cub_k + d;
        e  = c* 2.2;
        f = d * 2.2;
        var rate = parseFloat($("#cargo_rate").val());
        pieces= pieces * rate;
        $("#cargo_weight_k").val(c);
                $("#cargo_cubic_k").val(d);
                $("#cargo_charge_weight_k").val(d);
                $("#cargo_weight_l").val(e);
                $("#cargo_cubic_l").val(f);
                $("#cargo_charge_weight_l").val(f);
        $("#cargo_amount").val(pieces);
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
                $("#total_weight_lbs").val(weight_l),
                $("#total_cubic_cft").val(cubic_l),
                $("#total_charge_weight_lbs").val(charge_weight_l)
    }

    function validateShipmentId(){
        if($("#shipment_id").val() > 0){
            $("#CreateHouse").modal("show");
        } else {
            show_alert();
            $("#shipment_code").focus();
        }
    }

</script>