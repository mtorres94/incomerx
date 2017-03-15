<script type="text/javascript">
    $("#agent_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.value}, selected:{
        id: '{{ (isset($carrier) ? $carrier->agent_id : "") }}',
        value: '{{ ((isset($carrier) and ($carrier->agent_id > 0)) ? $carrier->agent->name: "") }}',
    },onSelect: function(e, o) {$("#agent_id").val(e.id), $(this).val(e.value)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#agent_name_img").removeClass("img-none").addClass("img-display"), $("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#agent_name_img").removeClass("img-display").addClass("img-none"), $("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#agent_id").val(0)}).blur(function() {var e = $("#agent_id").val();0 == e && $(this).val("")});

</script>