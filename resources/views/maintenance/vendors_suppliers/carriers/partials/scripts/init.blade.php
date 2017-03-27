<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('carriers.close') }}');
        removeEmptyNodes('contact_details');
        removeEmptyNodes('details');
$("#code").attr("readonly", true);
    });

    function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }


    function generate_codes(){
        var x= "", y = 0, count =0, init= "";
        init = $("#starting").val();
       while($("#starting").val() < $("#ending").val()){
           x= $("#starting").val().substring(7,8);
           if(x == 6){
               y = parseInt($("#starting").val()) + 4;
           }else{
               y = parseInt($("#starting").val()) + 11;
           }
           y = pad(y, 8);
           $("#starting").val(y);
           count++;
       }
       $("#starting").val(init);
       $("#total_codes").val(count);

    }
//$("#total_codes").val( generate_codes());
    $("#starting").change(function(){ generate_codes() });
    $("#ending").change(function(){ generate_codes() });




</script>