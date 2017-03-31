<script type="text/javascript">
    $("#customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected: {
        id: '{{ (isset($billing) ? $billing->customer_id : "") }}',
        value: '{{ ((isset($billing) and ($billing->customer_id > 0)) ? $billing->customer->name : "") }}',
    },onSelect:function(e,o){$("#customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#customer_name_img").removeClass("img-none").addClass("img-display"),$("#customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_name_img").removeClass("img-display").addClass("img-none"),$("#customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#customer_id").val(0)
    }).blur(function() {
        var e = $("#customer_id").val();
        0 == e && $(this).val("")
    });

    $("#state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.name},selected: {
        id: '{{ (isset($billing) ? $billing->state_id : "") }}',
        name: '{{ ((isset($billing) and ($billing->state_id > 0)) ? $billing->state->name : "") }}',
    },onSelect:function(e,o){$("#state_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#state_name_img").removeClass("img-none").addClass("img-display"),$("#state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#state_name_img").removeClass("img-display").addClass("img-none"),$("#state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#state_id").val(0)
    }).blur(function() {
        var e = $("#state_id").val();
        0 == e && $(this).val("")
    });

    $("#general_code").marcoPolo({url:"{{ route('generals.autocomplete') }}",formatItem:function(e,o){return e.code +'|' + e.description},selected: {
        id: '{{ (isset($billing) ? $billing->general_id : "") }}',
        description: '{{ ((isset($billing) and ($billing->general_id > 0)) ? $billing->general->description : "") }}',
    },onSelect:function(e,o){$("#general_id").val(e.id),$(this).val(e.description), $("#descriptions").val(e.description)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#general_code_img").removeClass("img-none").addClass("img-display"),$("#general_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#general_code_img").removeClass("img-display").addClass("img-none"),$("#general_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#general_id").val(0)
    }).blur(function() {
        var e = $("#general_id").val();
        0 == e && $(this).val("")
    });
</script>