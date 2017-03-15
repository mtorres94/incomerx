<script type="text/javascript">

    window.onload = (function () {
        openTab($("#data"));
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('carriers.close') }}');
        removeEmptyNodes('contact_details');
        removeEmptyNodes('details');
$("#code").attr("readonly", true);
    });

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
           $("#starting").val(y);
           count++;
       }
       $("#starting").val(init);
       return(count);

    }
$("#total_codes").val( generate_codes());
    $("#starting").change(function(){ generate_codes(); });
    $("#ending").change(function(){ generate_codes(); });




</script>