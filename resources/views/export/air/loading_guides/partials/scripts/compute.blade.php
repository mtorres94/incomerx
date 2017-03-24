<script type="text/javascript">
    function total_load_warehouses()
    {
        var tr = $('#load_warehouse_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0;
        for (var a=0; a< r ; a++) {
            quantity = parseFloat(tr[a].childNodes[10].textContent) + quantity;
            weight = parseFloat(tr[a].childNodes[11].textContent) + weight;
            cubic = parseFloat(tr[a].childNodes[12].textContent) + cubic;
        }
        $("#pick_link_qty").val(quantity);
        $("#pick_weight").val(weight);
        $("#pick_cubic").val(cubic);
    }

    function total_cargo_details()
    {
        var tr = $('#cargo_details tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0, volume=0 ;
        for (var a=0; a< r ; a++) {
            quantity = parseFloat(tr[a].childNodes[8].textContent) + quantity;
            weight = parseFloat(tr[a].childNodes[9].textContent) + weight;
            cubic = parseFloat(tr[a].childNodes[10].textContent) + cubic;
            volume = parseFloat(tr[a].childNodes[11].textContent) + volume;
        }
        $("#pieces_loaded").val(quantity);
        $("#weight_load").val(weight);
        $("#cubic_load").val(cubic);
        $("#sum_volume_weight").val(volume);
    }

    function total_containers()
    {
        var tr = $('#containers tbody tr');
        var r = tr.length,  quantity=0, weight=0,  cubic=0, volume=0;
        for (var a=0; a< r ; a++) {
            quantity = parseFloat(tr[a].childNodes[11].textContent) + quantity;
            cubic = parseFloat(tr[a].childNodes[8].textContent) + cubic;
            weight = parseFloat(tr[a].childNodes[13].textContent) + weight;
            volume = parseFloat(tr[a].childNodes[17].textContent) + volume;
        }
        $("#sum_total_pieces").val(quantity);
        $("#sum_total_weight").val(weight);
        $("#sum_total_cubic").val(cubic);
        $("#sum_total_volume").val(volume);
    }
</script>