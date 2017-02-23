<script type="text/javascript">
    function sum_hbl()
    {
        var s_pieces=0, s_weight =0, s_cubic=0;
        var tr = $("#hbl_details tbody tr");
        var r = tr.length;
        for (var a = 0; a < r; a++) {
            var pieces = parseFloat(tr[a].childNodes[4].textContent);
            var weight = parseFloat(tr[a].childNodes[5].textContent);
            var cubic = parseFloat(tr[a].childNodes[7].textContent);
            s_pieces = s_pieces + pieces;
            s_weight= s_weight + weight;
            s_cubic= s_cubic + cubic;
        }

        $("#hbl_pieces").val(s_pieces);
        $("#hbl_actual_weight").val(s_weight);
        $("#hbl_charge_weight").val(s_cubic);
    }

</script>