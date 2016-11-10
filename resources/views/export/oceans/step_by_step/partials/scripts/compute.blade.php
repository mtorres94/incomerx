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

    function show_alert(){
        swal({   title: "Error!",   text: "A required file is empty. Please complete it and try again.",   type: "warning",   confirmButtonText: "Ok" });
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

    function weight_totals(){
        var tr = $('#hidden_cargo_details tbody tr');
        var r = tr.length,  weight_k=0, cubic_k=0, charge_weight_k=0, pieces=0;
        for (var a=0; a< r ; a++){

            pieces = parseInt(tr[a].childNodes[2].textContent) + pieces;
            weight_k = parseFloat(tr[a].childNodes[11].textContent) + weight_k;
            cubic_k= parseFloat(tr[a].childNodes[12].textContent) + cubic_k;
            charge_weight_k= parseFloat(tr[a].childNodes[13].textContent) + charge_weight_k;
        }
                $("#total_quantity").val(pieces),
                $("#total_weight").val(weight_k),
                $("#total_cubic").val(cubic_k),
                $("#total_volume_weight").val(charge_weight_k)
    }

    function domestic_routing(){
        var tr = $('#cargo_details tbody tr');
        var r = tr.length, wr_number= "";
        for (var a=0; a< r ; a++){
            wr_number= wr_number + "WR#: " + tr[a].childNodes[1].textContent +"\n";
            wr_number= wr_number + "Date in: " + tr[a].childNodes[2].textContent +"\n";
            wr_number= wr_number + "Shipper: " + tr[a].childNodes[3].textContent +"\n";
            wr_number= wr_number + "Consignee: " + tr[a].childNodes[4].textContent +"\n\n";
        }
        $("#domestic_instruction").val(wr_number);
    }



    function warehouse_details()
    {
        var tr = $('#load_warehouse_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        var whr_select = new Array();
        $("input[name='pick_select[]']:checked").each(function() {
            whr_select.push($(this).val());
        });
        for (var a=0; a< r ; a+=2) {
            quantity = parseFloat(tr[a].childNodes[26].textContent) + quantity;
            weight = parseFloat(tr[a].childNodes[27].textContent) + weight;
            cubic = parseFloat(tr[a].childNodes[28].textContent) + cubic;

        }
        var unlinked= (r/2)- whr_select.length;
        $("#pick_linked").val(whr_select.length);
        $("#pick_unlinked").val(unlinked);
        $("#pick_weight").val(weight);
        $("#pick_cubic").val(cubic);
        $("#pick_link_qty").val(quantity);
        domestic_routing();
    }

    function total_warehouse_cargo()
    {
        var tr = $('#warehouse_cargo_details tbody tr');
        var r = tr.length,  weight_k=0, cubic_k=0, volume_weight_k=0, pieces=0;
        for (var a=0; a< r ; a++){

            pieces = parseInt(tr[a].childNodes[1].textContent) + pieces;
            weight_k = parseFloat(tr[a].childNodes[10].textContent) + weight_k;
            cubic_k= parseFloat(tr[a].childNodes[11].textContent) + cubic_k;
            volume_weight_k= parseFloat(tr[a].childNodes[12].textContent) + volume_weight_k;
        }
        $("#sum_quantity").val(pieces),
                $("#sum_weight").val(weight_k),
                $("#sum_cubic").val(cubic_k),
                $("#sum_volume_weight").val(volume_weight_k)
        domestic_routing();
    }


</script>