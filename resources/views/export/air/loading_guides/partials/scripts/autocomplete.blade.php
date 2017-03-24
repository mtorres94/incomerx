<script type="text/javascript">

    $("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($loading_guide) ? $loading_guide->carrier_id : "") }}',
        name: '{{ ((isset($loading_guide) and ($loading_guide->carrier_id > 0)) ? $loading_guide->carrier->name: "") }}',
    },onSelect: function(e, o) {$("#carrier_id").val(e.id).change(), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#carrier_id").val(0)}).blur(function() {var e = $("#carrier_id").val();0 == e && $(this).val("")});

    $("#origin_name").marcoPolo({url: "{{ route('airports.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($loading_guide) ? $loading_guide->origin_id : "") }}',
        name: '{{ ((isset($loading_guide) and ($loading_guide->origin_id > 0)) ? $loading_guide->origin->name: "") }}',
    },onSelect: function(e, o) {$("#origin_id").val(e.id).change(), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#origin_name_img").removeClass("img-none").addClass("img-display"), $("#origin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#origin_name_img").removeClass("img-display").addClass("img-none"), $("#origin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#origin_id").val(0)}).blur(function() {var e = $("#origin_id").val();0 == e && $(this).val("")});

    $("#destination_name").marcoPolo({url: "{{ route('airports.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($loading_guide) ? $loading_guide->destination_id : "") }}',
        name: '{{ ((isset($loading_guide) and ($loading_guide->destination_id > 0)) ? $loading_guide->destination->name: "") }}',
    },onSelect: function(e, o) {$("#destination_id").val(e.id).change(), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#destination_name_img").removeClass("img-none").addClass("img-display"), $("#destination_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#destination_name_img").removeClass("img-display").addClass("img-none"), $("#destination_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#destination_id").val(0)}).blur(function() {var e = $("#destination_id").val();0 == e && $(this).val("")});

    $("#via_name").marcoPolo({url: "{{ route('airports.autocomplete') }}",formatItem: function(e, o) {return e.name}, selected:{
        id: '{{ (isset($loading_guide) ? $loading_guide->via_id : "") }}',
        name: '{{ ((isset($loading_guide) and ($loading_guide->via_id > 0)) ? $loading_guide->via->name: "") }}',
    },onSelect: function(e, o) {$("#via_id").val(e.id).change(), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#via_name_img").removeClass("img-none").addClass("img-display"), $("#via_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#via_name_img").removeClass("img-display").addClass("img-none"), $("#via_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#via_id").val(0)}).blur(function() {var e = $("#via_id").val();0 == e && $(this).val("")});

    $("#agent_name").marcoPolo({url: "{{ route('customers.autocomplete') }}",formatItem: function(e, o) {return e.value}, selected:{
        id: '{{ (isset($loading_guide) ? $loading_guide->agent_id : "") }}',
        value: '{{ ((isset($loading_guide) and ($loading_guide->agent_id > 0)) ? $loading_guide->agent->name: "") }}',
    },onSelect: function(e, o) {$("#agent_id").val(e.id).change(), $(this).val(e.value)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#agent_name_img").removeClass("img-none").addClass("img-display"), $("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#agent_name_img").removeClass("img-display").addClass("img-none"), $("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {var o = e.keyCode ? e.keyCode : e.which;(8 == o || 46 == o) && $("#agent_id").val(0)}).blur(function() {var e = $("#agent_id").val();0 == e && $(this).val("")});

    function container_detail (id, type_for, table) {
        var r=$("#"+ table +" tbody tr").length + 1,
            n = $("#" + table),
            //type_for = $("#pick_search_type").val(),
            t = n.find("tbody"),
            x = 0;
            //id = $("#pick_search_for_id").val();
        $.ajax({
            url: "{{ route('receipts_entries.autocomplete') }}",
            data: { term: id, type_for: type_for },
            type: 'GET',
            success: function (e) {
                var flag = $("#autocheck").is(':checked');
                while(e[x] !=''){
                    var p = $("<tr id=" + r + " data-toggle = collapse data-target= ."+ r +">");
                    p.append(createTableContent('pick_details_line', r, true, r))
                        .append(createTableContent('pick_wr_id', e[x].id, true, r))
                        .append("<td><input type='checkbox' name='pick_select[]' id='pick_select' value='" + e[x].id + "' "+ (flag? 'checked' : '' ) +"></td>")
                        .append(createTableContent('pick_wr_number', e[x].value , false,r ))
                        .append(createTableContent('pick_date_in', e[x].date_in , false, r))
                        .append(createTableContent('pick_shipper_id', e[x].shipper_id, true, r))
                        .append(createTableContent('pick_shipper_name', e[x].shipper_name , false, r))
                        .append(createTableContent('pick_consignee_id', e[x].consignee_id, true, r))
                        .append(createTableContent('pick_consignee_name', e[x].consignee_name , false, r))
                        .append(createTableContent('pick_status', e[x].status, true, r))
                        .append(createTableContent('pick_quantity',e[x].quantity , false, r))
                        .append(createTableContent('pick_weight', e[x].sum_weight , false, r))
                        .append(createTableContent('pick_cubic', e[x].sum_cubic, false, r))
                        .append(createTableContent('pick_volume_weight', e[x].volume_weight, true, r))
                        .append(createTableContent('pick_warehouse_id', e[x].id, true, r))
                        .append(createTableContent('pick_hazardous', e[x].hazardous, false, r))
                        .append(createTableContent('destination_name', e[x].location_destination_code, false, r));
                    t.append(p);
                    r++;
                    x++;
                }

            }
        });



    }
    $("#pick_search_type").change( function(){
        var x = $("#pick_search_type").val();
        var url = x === '1' ? "{{ route('receipts_entries.autocomplete') }}" :
            x === '2' ? "{{ route('divisions.autocomplete') }}" :
                x === '3' || x === '4' || x === '5' || x === '6' ? "{{ route('customers.autocomplete') }}" :
                    "{{ route('receipts_entries.autocomplete') }}";

        $("#pick_search_for_name").marcoPolo({
            url: url,
            formatItem: function(e, o) {
                return e.value
            },
            onSelect: function(e, o) {
                $("#pick_search_for_id").val(e.id);
                $(this).val(e.value);
                container_detail(e.id, $("#pick_search_type").val(), 'load_warehouse_details');
            },
            minChars: 3,
            data: {
                "type": x
            },
            param: "term"
        }).on("marcopolorequestbefore", function() {
            $("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"), $("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"), $("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#pick_search_for_id").val(0)
        }).blur(function() {
            var e = $("#pick_search_for_id").val();
            0 == e && $(this).val("")
        })
    });

    $("#house_search_type").change( function(){
        var x = $("#house_search_type").val();
        var url = x === '1' ? "{{ route('receipts_entries.autocomplete') }}" :
            x === '2' ? "{{ route('divisions.autocomplete') }}" :
                x === '3' || x === '4' || x === '5' || x === '6' ? "{{ route('customers.autocomplete') }}" :
                    "{{ route('receipts_entries.autocomplete') }}";

        $("#house_search_for_name").marcoPolo({
            url: url,
            formatItem: function(e, o) {
                return e.value
            },
            onSelect: function(e, o) {
                $("#house_search_for_id").val(e.id);
                $(this).val(e.value);
                container_detail(e.id, $("#house_search_type").val(), 'house_warehouse_details');
            },
            minChars: 3,
            data: {
                "status": 'P'
            },
            param: "term"
        }).on("marcopolorequestbefore", function() {
            $("#house_search_for_name_img").removeClass("img-none").addClass("img-display"), $("#house_search_for_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#house_search_for_name_img").removeClass("img-display").addClass("img-none"), $("#house_search_for_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#house_search_for_id").val(0)
        }).blur(function() {
            var e = $("#house_search_for_id").val();
            0 == e && $(this).val("")
        })
    });
</script>