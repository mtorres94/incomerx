<script type="text/javascript">
    function warehouse_details()
    {
        var tr = $('#load_warehouse_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        var whr_select = new Array();
        $("input[name='pick_select[]']:checked").each(function() {
            whr_select.push($(this).val());
        });
        for (var a=0; a< r ; a++) {
            if(tr[a].childNodes[1].textContent == whr_select[a]){
                quantity = parseFloat(tr[a].childNodes[26].textContent) + quantity;
                weight = parseFloat(tr[a].childNodes[27].textContent) + weight;
                cubic = parseFloat(tr[a].childNodes[28].textContent) + cubic;
            }
        }
        var unlinked= r- whr_select.length;
        $("#pick_linked").val(whr_select.length);
        $("#pick_unlinked").val(unlinked);
        $("#pick_weight").val(weight);
        $("#pick_cubic").val(cubic);
        $("#pick_link_qty").val(quantity);
    }
    function cubic_weight_loaded()
    {
        var tr = $('#cargo_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        for (var a=0; a< r ; a++) {
            quantity = parseFloat(tr[a].childNodes[27].textContent) + quantity;
            cubic = parseFloat(tr[a].childNodes[29].textContent) + cubic;
            weight = parseFloat(tr[a].childNodes[28].textContent) + weight;

        }
        $("#pieces_loaded").val(quantity);
        $("#weight_load").val(weight);
        $("#cubic_load").val(cubic);
    }

    function calculate_warehouse() {
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
        "I" === i && "L" === g ?(a = _ * c * t / 1728, e = _ * c * t /("I" === l ? 166 : 194)) : "C" === i && "L" === g ? (a = _ * c * t / 28316.846592, e = _ * c * t / ("I" === l ? 2720.252408 : 3179.089028)) : "I" === i && "K" === g ? (a = _ * c * t / 61023, e = _ * c * t / ("I" === l ? 366 : 427.895923)) : "C" === i && "K" === g && (a = _ * c * t / 1e6, e = _ * c * t / ("I" === l ? 6e3 : 7012)), $("#cargo_cubic").val(a.toFixed(3)), $("#cargo_volume_weight").val(e.toFixed(3), $("#cargo_square_foot").val(f.toFixed(2)));$("#cargo_total_weight").val(q*u );
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
        $("#sum_quantity").val(pieces);
        $("#sum_weight").val(weight_k);
        $("#sum_cubic").val(cubic_k);
        $("#sum_volume_weight").val(volume_weight_k);
    }

    function calculate_totals(){
        var tr = $("#container_details tbody tr");
        var r = tr.length,  weight=0, cubic=0, pieces=0;
        for (var a=0; a< r ; a++){
            pieces = parseInt(tr[a].childNodes[12].textContent) + pieces;
            weight= parseFloat(tr[a].childNodes[14].textContent) + weight;
            cubic= parseFloat(tr[a].childNodes[9].textContent) + cubic;
        }
        $("#sum_total_pieces").val(pieces);
        $("#sum_total_weight").val(weight);
        $("#sum_total_cubic").val(cubic);
    }


</script>
