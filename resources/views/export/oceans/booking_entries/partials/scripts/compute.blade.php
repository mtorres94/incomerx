<script type="text/javascript">

    function show_alert(){
        swal({   title: "Error!",   text: "A required file is empty. Please complete it and try again.",   type: "warning",   confirmButtonText: "Ok" });
    }

    function removeEmptyNodes(tableHTML){
        for (var row=0;row<$("#"+ tableHTML +" tbody tr").length;row++) {
            for (var i = 0; i < $("#"+ tableHTML +" tbody tr")[row].childNodes.length; i++) {
                var node = $("#"+ tableHTML +" tbody tr")[row].childNodes[i];
                if (node.nodeType == 3 && !/\S/.test(node.nodeValue))
                    node.parentNode.removeChild(node);
            }
        }
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

    function values_box_vehicle(){
        var tr = $('#cargo_vehicle_details tbody tr');
        var r = tr.length,  weight=0, cub=0, weight_k=0, cub_k=0, c=0, d=0;
        for (var a=0; a< r ; a++){

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
        }
        c = weight_k +c;
        d = cub_k + d;

        //More details- results
        if ($("#cargo_weight_unit").val()== 'L')
        {
            var w= parseFloat(c*2.2), x= parseFloat(d*2.2);
            $("#cargo_grossw").val(w);
            $("#cargo_cubic").val(x);

        }
        else{
            $("#cargo_grossw").val(c);
            $("#cargo_cubic").val(d);
        }
    }

    function weight_totals(){
        var tr = $('#details_hidden tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cub=0, vol_weight=0, vol_weight_k=0, weight_k=0, cub_k=0, b=0, c=0, d=0, e=0;
        for (var a=0; a< r ; a++){

            quantity = parseFloat(tr[a].childNodes[2].textContent);

            weight = parseFloat(tr[a].childNodes[7].textContent);
            cub= parseFloat(tr[a].childNodes[8].textContent);
            vol_weight= parseFloat(tr[a].childNodes[16].textContent);
            if(tr[a].childNodes[3].textContent == 'L'){
                weight_k = (weight/2.2) + weight_k;
                vol_weight_k = (vol_weight/2.2) + vol_weight_k;
                cub_k = (cub/2.2)+ cub_k;
            }
            else {
                c = weight + c;
                d= cub+ d;
                e= vol_weight+ e;
            }
            b= quantity + b;
        }
        c = weight_k +c;
        d = cub_k + d;
        e = vol_weight_k + e;
        //More details- results
        $("#total_quantity").val(b);
        if ($("#total_weight_unit_measurement").val()== 'L')
        {
            var w= parseFloat(c*2.2), x= parseFloat(d*2.2), y= parseFloat(e * 2.2);

            $("#total_weight").val(w);
            $("#total_cubic").val(x);
            $("#total_volume_weight").val(y);

        }
        else{
            $("#total_weight").val(c);
            $("#total_cubic").val(d);
            $("#total_volume_weight").val(e);
        }
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


</script>