<!--suppress JSUnresolvedVariable -->
<!-- Autocomplete scripts -->
<script type="text/javascript">
    $("#division_name").focus(function () {
        $("#division_name").marcoPolo({
            url:"{{ route('divisions.autocomplete') }}",
            formatItem:function(e,o){
                return e.value
            },
            onSelect:function(e,o){
                $("#division_id").val(e.id),$(this).val(e.value)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",
                function(){
                $("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",
                function(){
                            $("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
    });
    $("#receiving_driver_name").focus(function () {
        $("#receiving_driver_name").marcoPolo({url:"{{ route('drivers.autocomplete') }}",formatItem:function(e,i){return e.name},onSelect:function(e,i){$("#receiving_driver_id").val(e.id),$(this).val(e.name),$("#receiving_driver_license").val(e.license)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#receiving_driver_name_img").removeClass("img-none").addClass("img-display"),$("#receiving_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#receiving_driver_name_img").removeClass("img-display").addClass("img-none"),$("#receiving_driver_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#receiving_driver_id").val(0),$("#receiving_driver_license").val(""))})
    });

    $("#carriers_carrier_name").focus(function() {
        $("#carriers_carrier_name").marcoPolo({
            url: "{{ route('carriers.autocomplete') }}",
            formatItem: function(e, o) {
                return e.id +' - '+ e.name
            },
            onSelect: function(e, o) {
                $("#carriers_carrier_id").val(e.id), $(this).val(e.name)
            },
            minChars: 3,
            param: "term",
            required: !0
        }).on("marcopolorequestbefore", function() {
            $("#carriers_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carriers_carrier_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#carriers_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carriers_carrier_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur", function() {
            "" == $(this).val().trim() && $("#carriers_carrier_id").val(0)
        })
    });

    $("#shipper_name").focus(function () {
        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))})
    });

    $("#shipper_zip_code_code").focus(function () {
        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))})
    });

    $("#shipper_state_name").focus(function () {
        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")})
    });

    $("#consignee_name").focus(function () {
        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax),$("#agent_id").val(e.agent_id),$('#agent_name').val(e.agent_name),$("#coloader_id").val(e.coloader_id),$('#coloader_name').val(e.coloader_name),$("#third_party_id").val(e.third_party_id),$("#third_party_name").val(e.third_party_name),$("#third_party_phone").val(e.third_party_phone),$("#third_party_fax").val(e.third_party_fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""),$("#agent_id").val(""),$('#agent_name').val(""),$("#coloader_id").val(""),$('#coloader_name').val(""),$("#third_party_id").val(""),$("#third_party_name").val(""),$("#third_party_phone").val(""),$("#third_party_fax").val(""))})
    });

    $("#consignee_zip_code_code").focus(function () {
        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))})
    });

    $("#consignee_state_name").focus(function () {
        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")})
    });

    $("#third_party_name").focus(function () {
        $("#third_party_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_party_id").val(e.id),$(this).val(e.value),$("#third_party_phone").val(e.phone),$("#third_party_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_party_name_img").removeClass("img-none").addClass("img-display"),$("#third_party_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_party_name_img").removeClass("img-display").addClass("img-none"),$("#third_party_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#third_party_id").val(0),$("#third_party_phone").val(""),$("#third_party_fax").val(""))})
    });

    $("#agent_name").focus(function () {
        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#agent_id").val(0))})
    });

    $("#payment_term_name").focus(function () {
        $("#payment_term_name").marcoPolo({url:"{{ route('payment_terms.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#payment_term_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#payment_term_name_img").removeClass("img-none").addClass("img-display"),$("#payment_term_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#payment_term_name_img").removeClass("img-display").addClass("img-none"),$("#payment_term_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#payment_term_id").val(0)}).blur(function(){var e=$("#payment_term_id").val();0==e&&$(this).val("")})
    });

    $("#pickup_state_name").focus(function () {
        $("#pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pickup_state_id").val(0)}).blur(function(){var e=$("#pickup_state_id").val();0==e&&$(this).val("")})
    });

    $("#pickup_zip_code_code").focus(function () {
        $("#pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#pickup_city").val(e.name),$("#pickup_state_id").val(e.state_id),$("#pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pickup_zip_code_id").val(0)}).blur(function(){var e=$("#pickup_zip_code_id").val();0==e&&($(this).val(""),$("#pickup_city").val(""),$("#pickup_state_id").val(0),$("#pickup_state_name").val(""))})
    });

    $("#delivery_state_name").focus(function () {
        $("#delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_state_id").val(0)}).blur(function(){var e=$("#delivery_state_id").val();0==e&&$(this).val("")})
    });

    $("#delivery_zip_code_code").focus(function () {
        $("#delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#delivery_city").val(e.name),$("#delivery_state_id").val(e.state_id),$("#delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_zip_code_id").val(0)}).blur(function(){var e=$("#delivery_zip_code_id").val();0==e&&($(this).val(""),$("#delivery_city").val(""),$("#delivery_state_id").val(0),$("#delivery_state_name").val(""))})
    });

    $("#to_state_name").focus(function () {
        $("#to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#to_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#to_state_name_img").removeClass("img-none").addClass("img-display"),$("#to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#to_state_name_img").removeClass("img-display").addClass("img-none"),$("#to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#to_state_id").val(0)}).blur(function(){var e=$("#to_state_id").val();0==e&&$(this).val("")})
    });


    $("#to_zip_code_code").focus(function () {
        $("#to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#to_zip_code_id").val(e.id),$(this).val(e.code),$("#to_carrier_city").val(e.name),$("#to_state_id").val(e.state_id),$("#to_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#to_zip_code_id").val(0)}).blur(function(){var e=$("#to_zip_code_id").val();0==e&&($(this).val(""),$("#to_carrier_city").val(""),$("#to_state_id").val(0),$("#to_state_name").val(""))})
    });

    $("#location_world_location_name").focus(function () {
        $("#location_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#location_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#location_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#location_world_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#location_world_location_id").val(0)})
    });

    $("#destination_world_location_name").focus(function () {
        $("#destination_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#destination_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#destination_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#destination_world_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#destination_world_location_id").val(0)})
    });

    $("#final_world_location_name").focus(function () {
        $("#final_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#final_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#final_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#final_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#final_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#final_world_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#final_world_location_id").val(0)})
    });

    $("#pickup_name").focus(function () {
        var url = $("#pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#pickup_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#pickup_type").val() === '01' ?  e.name :  e.value;
                $("#pickup_id").val(e.id),
                $(this).val(name),
                $("#pickup_address").val(e.address),
                $("#pickup_city").val(e.city),
                $("#pickup_state_id").val(e.state_id),
                $("#pickup_state_name").val(e.state_name),
                $("#pickup_zip_code_id").val(e.zip_code_id),
                $("#pickup_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#pickup_name_img").removeClass("img-none").addClass("img-display"),$("#pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#pickup_name_img").removeClass("img-display").addClass("img-none"),$("#pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#pickup_id").val(0)})
    });

    $("#delivery_name").focus(function () {
        var url = $("#delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
               return $("#delivery_type").val() === '01' ?  e.name :  e.value ;
               },
            onSelect:function(e,o){
                var name = $("#delivery_type").val() === '01' ? e.name : e.value;
                    $("#delivery_id").val(e.id),
                    $(this).val(name),
                    $("#delivery_address").val(e.address),
                    $("#delivery_city").val(e.city),
                    $("#delivery_state_id").val(e.state_id),
                    $("#delivery_state_name").val(e.state_name),
                    $("#delivery_zip_code_id").val(e.zip_code_id),
                    $("#delivery_zip_code_code").val(e.zip_code_code)
               },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#delivery_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#delivery_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#delivery_id").val(0)})
    });

    $("#vendor_name").focus(function () {
        $("#vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.code +'|'+e.name},onSelect:function(e,o){$("#vendor_code").val(e.id),$(this).val(e.name),$("#vendor_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vendor_name_img").removeClass("img-none").addClass("img-display"),$("#vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vendor_name_img").removeClass("img-display").addClass("img-none"),$("#vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vendor_code").val(0))})
    });

    $("#destination_vendor_name").focus(function () {
        $("#destination_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#destination_vendor_code").val(e.id),$(this).val(e.name),$("#destination_vendor_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#destination_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#destination_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#destination_vendor_code").val(0))})
    });

    $("#stop_cargo_type_code").focus(function () {
        $("#stop_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#stop_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#stop_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#stop_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#stop_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#stop_cargo_type_id").val(0))})
    });

    $("#stop_customer_name").focus(function () {
        $("#stop_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){
            $("#stop_customer_id").val(e.id),
                    $(this).val(e.value),
                    $("#stop_address").val(e.address),
                    $("#stop_city").val(e.city),
                    $("#stop_state_id").val(e.state_id),
                    $("#stop_state_name").val(e.state_name),
                    $("#stop_zip_code_id").val(e.zip_code_id),
                    $("#stop_zip_code_code").val(e.zip_code_code),
                    $("#stop_phone").val(e.phone),
                    $("#stop_fax").val(e.fax)
        },minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#stop_customer_name_img").removeClass("img-none").addClass("img-display"),$("#stop_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_customer_name_img").removeClass("img-display").addClass("img-none"),$("#stop_customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#stop_customer_id").val(0),$("#stop_address").val(""),$("#stop_city").val(""),$("#stop_state_id").val(""),$("#stop_state_name").val(""),$("#stop_zip_code_id").val(""),$("#stop_zip_code_code").val(""),$("#stop_phone").val(""),$("#stop_fax").val(""))})
    });

    $("#stop_state_name").focus(function () {
        $("#stop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#stop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#stop_state_name_img").removeClass("img-none").addClass("img-display"),$("#stop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_state_name_img").removeClass("img-display").addClass("img-none"),$("#stop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_state_id").val(0)}).blur(function(){var e=$("#to_state_id").val();0==e&&$(this).val("")})
    });


    $("#stop_zip_code_code").focus(function () {
        $("#stop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#stop_zip_code_id").val(e.id),$(this).val(e.code),$("#stop_city").val(e.name),$("#stop_state_id").val(e.state_id),$("#stop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#stop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#stop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#stop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_zip_code_id").val(0)}).blur(function(){var e=$("#stop_zip_code_id").val();0==e&&($(this).val(""),$("#stop_city").val(""),$("#stop_state_id").val(0),$("#stop_state_name").val(""))})
    });

    $("#tmp_hazardous_uns_code").focus(function () {
        $("#tmp_hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#tmp_hazardous_uns_id").val(e.id),$(this).val(e.code),$('#tmp_hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#tmp_hazardous_uns_id").val(0),$("#tmp_hazardous_uns_desc").val(""))})
    });

    $("#cargo_cargo_type_code").focus(function () {
        $("#cargo_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#cargo_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#cargo_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#cargo_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_cargo_type_code_id").val(0))})
    });


    $("#cargo_location_name").focus(function () {
        $("#cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_id").val(0),$("#cargo_location_bin_id").val(0),$("#cargo_location_bin_name").val(""))})
    });

    $("#cargo_location_bin_name").focus(function () {
        $("#cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_location_bin_id").val(0))})
    });

    $("#part_info_commodity_name").focus(function () {
        $("#part_info_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#part_info_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#part_info_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#part_info_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#part_info_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#part_info_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#part_info_commodity_id").val(0),$("#part_info_commodity_id").val(0),$("#part_info_commodity_name").val(""))})
    });

    $("#eei_info_scheduleb_code").focus(function () {
        $("#eei_info_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +'|'+ e.value},onSelect:function(e,o){$("#eei_info_scheduleb_id").val(e.code),$(this).val(e.code), $("#eei_info_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#eei_info_scheduleb_id").val(0))})
    });

    $("#hazardous_un_code").focus(function () {
        $("#hazardous_un_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_un_id").val(e.id),$(this).val(e.code),$('#hazardous_un_description').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_un_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_un_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_un_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_un_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#hazardous_un_id").val(0),$("#hazardous_un_code").val(""))})
    });

    $("#item_item_name").focus(function () {
        $("#item_item_name").marcoPolo({url:"{{ route('items.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#item_item_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_item_name_img").removeClass("img-none").addClass("img-display"),$("#item_item_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_item_name_img").removeClass("img-display").addClass("img-none"),$("#item_item_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#item_item_id").val(0),$("#item_item_name").val(""))})
    });

    $("#item_vendor_name").focus(function () {
        $("#item_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#item_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#item_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#item_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#item_vendor_code").val(0))})
    });

    $("#reference_vendor_name").focus(function () {
        $("#reference_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#reference_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#reference_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#reference_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#reference_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#reference_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#reference_vendor_code").val(0))})
    });

    $("#other_department_name").focus(function () {
        $("#other_department_name").marcoPolo({url:"{{ route('departments.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+e.value},onSelect:function(e,o){$("#other_department_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#other_department_name_img").removeClass("img-none").addClass("img-display"),$("#other_department_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#other_department_name_img").removeClass("img-display").addClass("img-none"),$("#other_department_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#other_department_id").val(0))})
    });

    $("#other_ultimate_consignee_name").focus(function () {
        $("#other_ultimate_consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#other_ultimate_consignee_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#other_ultimate_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#other_ultimate_consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#other_ultimate_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#other_ultimate_consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#other_ultimate_consignee_id").val(0))})
    });

    $("#cargo_commodity_name").focus(function () {
        $("#cargo_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_commodity_id").val(0),$("#cargo_commodity_id").val(0),$("#cargo_commodity_name").val(""))})
    });

    $("#billing_unit_name").focus(function () {
        $("#billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).blur(function(){var e=$("#billing_unit_id").val()})
    });


    $("#billing_customer_name").focus(function () {
        $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_customer_id").val(0))})
    });

    $("#billing_vendor_name").focus(function () {
        $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_vendor_code").val(0))})
    });

    $("#cost_unit_name").focus(function () {
        $("#cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cost_unit_id").val(0)}).blur(function(){var e=$("#cost_unit_id").val()})
    });

    $("#transportation_service_name").focus(function () {
        $("#transportation_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transportation_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_service_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_service_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_service_id").val(0))})
    });

    $("#location_service_name").focus(function () {
        $("#location_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#location_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_service_name_img").removeClass("img-none").addClass("img-display"),$("#location_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_service_name_img").removeClass("img-display").addClass("img-none"),$("#location_service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#location_service_id").val(0))})
    });

    $("#transportation_loading_location_name").focus(function () {
        $("#transportation_loading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_loading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_loading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_loading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_loading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_loading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_loading_location_id").val(0)})
    });

    $("#transportation_unloading_location_name").focus(function () {
        $("#transportation_unloading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_unloading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_unloading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_unloading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_unloading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_unloading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_unloading_location_id").val(0)})
    });

    $("#transportation_carrier_name").focus(function() {
        $("#transportation_carrier_name").marcoPolo({
            url: "{{ route('carriers.autocomplete') }}",
            formatItem: function(e, o) {
                return e.id +' - '+ e.name
            },
            onSelect: function(e, o) {
                $("#transportation_carrier_id").val(e.id), $(this).val(e.name)
            },
            minChars: 3,
            param: "term",
            required: !0
        }).on("marcopolorequestbefore", function() {
            $("#transportation_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#transportation_carrier_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#transportation_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#transportation_carrier_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur", function() {
            "" == $(this).val().trim() && $("#transportation_carrier_id").val(0)
        })
    });

    $("#origin_from_shipper_name").focus(function () {
        var url = $("#origin_from_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#origin_from_shipper_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#origin_from_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#origin_from_type").val() === '01' ?  e.name :  e.value;
                $("#origin_from_shipper_id").val(e.id),
                        $(this).val(name),
                        $("#origin_from_address").val(e.address),
                        $("#origin_from_city").val(e.city),
                        $("#origin_from_state_id").val(e.state_id),
                        $("#origin_from_state_name").val(e.state_name),
                        $("#origin_from_zip_code_id").val(e.zip_code_id),
                        $("#origin_from_zip_code_code").val(e.zip_code_code)
                        $("#origin_from_phone").val(e.phone)
                        $("#origin_from_fax").val(e.fax)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#origin_from_shipper_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_shipper_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#origin_from_shipper_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_shipper_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#origin_from_shipper_id").val(0)})
    });

    $("#origin_from_state_name").focus(function () {
        $("#origin_from_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_state_id").val(0)}).blur(function(){var e=$("#origin_from_state_id").val();0==e&&$(this).val("")})
    });

    $("#origin_from_country_name").focus(function () {
        $("#origin_from_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_from_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_from_country_id").val(0)})
    });

    $("#origin_from_zip_code_code").focus(function () {
        $("#origin_from_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_from_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_from_city").val(e.name),$("#origin_from_state_id").val(e.state_id),$("#origin_from_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_from_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_from_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_zip_code_id").val(0)}).blur(function(){var e=$("#origin_from_zip_code_id").val();0==e&&($(this).val(""),$("#origin_from_city").val(""),$("#origin_from_state_id").val(0),$("#origin_from_state_name").val(""))})
    });


    $("#origin_to_consignee_name").focus(function () {
        var url = $("#origin_to_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#origin_to_consignee_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#origin_to_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#origin_to_type").val() === '01' ?  e.name :  e.value;
                $("#origin_to_consignee_id").val(e.id),
                        $(this).val(name),
                        $("#origin_to_address").val(e.address),
                        $("#origin_to_city").val(e.city),
                        $("#origin_to_state_id").val(e.state_id),
                        $("#origin_to_state_name").val(e.state_name),
                        $("#origin_to_zip_code_id").val(e.zip_code_id),
                        $("#origin_to_zip_code_code").val(e.zip_code_code)
                        $("#origin_to_phone").val(e.phone)
                        $("#origin_to_fax").val(e.fax)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#origin_to_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_consignee_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#origin_to_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_consignee_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#origin_to_consignee_id").val(0)})
    });

    $("#origin_to_state_name").focus(function () {
        $("#origin_to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_state_id").val(0)}).blur(function(){var e=$("#origin_to_state_id").val();0==e&&$(this).val("")})
    });

    $("#origin_to_country_name").focus(function () {
        $("#origin_to_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_to_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_to_country_id").val(0)})
    });

    $("#origin_to_zip_code_code").focus(function () {
        $("#origin_to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_to_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_to_city").val(e.name),$("#origin_to_state_id").val(e.state_id),$("#origin_to_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_zip_code_id").val(0)}).blur(function(){var e=$("#origin_to_zip_code_id").val();0==e&&($(this).val(""),$("#origin_to_city").val(""),$("#origin_to_state_id").val(0),$("#origin_to_state_name").val(""))})
    });

    $("#eei_info_hts_name").focus(function () {
        $("#eei_info_hts_name").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#eei_info_hts_id").val(e.id),$(this).val(e.id), $("#eei_info_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#eei_info_hts_name_img").removeClass("img-none").addClass("img-display"),$("#eei_info_hts_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_hts_name_img").removeClass("img-display").addClass("img-none"),$("#eei_info_hts_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#eei_info_hts_id").val(0)}).blur(function(){var e=$("#eei_info_hts_id").val();0==e&&$(this).val("")})
    });


    $("#transportation_billing_code").focus(function () {
        $("#transportation_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#transportation_billing_id").val(e.id),$(this).val(e.id), $("#transportation_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#transportation_billing_code_img").removeClass("img-none").addClass("img-display"),$("#transportation_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_billing_code_img").removeClass("img-display").addClass("img-none"),$("#transportation_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_billing_id").val(0),$("#transportation_description").val(""),$("#transportation_billing_code").val(""))})
    });

    $("#vehicle_eei_info_hts_code").focus(function () {
        $("#vehicle_eei_info_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#vehicle_eei_info_hts_id").val(e.id),$(this).val(e.id), $("#vehicle_eei_info_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_hts_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_hts_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_eei_info_hts_id").val(0)}).blur(function(){var e=$("#vehicle_eei_info_hts_id").val();0==e&&$(this).val("")})
    });

    $("#vehicle_eei_info_scheduleb_code").focus(function () {
        $("#vehicle_eei_info_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_scheduleb_id").val(e.code),$(this).val(e.code), $("#vehicle_eei_info_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_eei_info_scheduleb_id").val(0))})
    });

    $("#billing_billing_code").focus(function () {
        $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.id), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_billing_id").val(0),$("#billing_billing_description").val(""),$("#billing_billing_code").val(""))})
    });

    $("#vehicle_cargo_type_code").focus(function () {
        $("#vehicle_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#vehicle_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_cargo_type_id").val(0))})
    });

    $("#vehicle_location_name").focus(function () {
        $("#vehicle_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_location_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_location_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_location_id").val(0),$("#vehicle_location_bin_id").val(0),$("#vehicle_location_bin_name").val(""))})
    });

    $("#vehicle_location_bin_name").focus(function () {
        $("#vehicle_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_location_bin_id").val(0))})
    });

    $("#vehicle_state_province_name").focus(function () {
        $("#vehicle_state_province_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_state_province_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_state_province_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_state_province_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_state_province_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_state_province_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_state_province_id").val(0))})
    });

    $("currency_type").on('change',(function(){
        ($("#currency_type").val()== "USD") ? $("#third_value").val(1.00): $("#third_value").val(1.15);
        }));

    $("#equipment_type_code").focus(function () {
        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#equipment_type_id").val(0))})
    });

    $("#eei_info_export_code").focus(function () {
        $("#eei_info_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#eei_info_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_export_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_export_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#eei_info_export_id").val(0))})
    });

    $("#eei_info_license_type_code").focus(function () {
        $("#eei_info_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#eei_info_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#eei_info_license_type_id").val(0))})
    });

    $("#container_equipment_type_code").focus(function () {
        $("#container_equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#container_equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#container_equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#container_equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#container_equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#container_equipment_type_id").val(0))})
    });

    $("#vehicle_eei_info_export_code").focus(function () {
        $("#vehicle_eei_info_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_export_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_export_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_eei_info_export_id").val(0))})
    });

    $("#vehicle_eei_info_license_type_code").focus(function () {
        $("#vehicle_eei_info_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_eei_info_license_type_id").val(0))})
    });


    $("#warehouse_name").focus(function () {
        $("#warehouse_name").marcoPolo({url:"{{ route('warehouses.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#warehouse_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#warehouse_id").val(0)})
    });


    $("#pick_search_for_name").focus(function () {
        var  type= $("#pick_search_type").val();  $("#pick_search_for_name").marcoPolo({url:"{{ route('receipts_entries.autocomplete') }}",formatItem:function(e,o){return e.value +'|'+ e.date_in +'|'+ e.division_name + '|' + e.shipper_name + '|' + e.consignee_name + '|'+ e.third_party_name + '|' + e.agent_name},
            onSelect:function(e,o)
            {var r=$("#pick_cargo_details tbody tr").length + 1,  n = $("#pick_cargo_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + r + " data-toggle = collapse data-target= ."+ r +">");
                    $("#pick_search_for_id").val(e.id),
                    $(this).val(e.value),
                    p.append(createTableContent('pick_details_line', r, true, r))
                    .append('<td class="details-control sorting_1"></td>')
                    .append(createTableContent('pick_wr_number', e.value , false,r ))
                    .append(createTableContent('pick_date_in', e.date_in , false, r))
                    .append(createTableContent('pick_shipper_name', e.shipper_name , false, r))
                    .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
                    .append(createTableContent('pick_destination_name', '' , false, r))
                    .append(createTableContent('pick_qty','' , false, r))
                    .append(createTableContent('pick_weight', '' , false, r))
                    .append(createTableContent('pick_cubic', '', false, r))
                    .append(createTableContent('pick_unit', '' , false, r))
                    .append(createTableContent('pick_service', '' , false, r))
                    t.append(p);
                    p = $("<tr >");
                    p.append('<td> </td>')
                    p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
                    p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r + '</div></td>')
                    p.append('<td class="hiddenRow"><div class="collapse '+ r +'" >'+ r +'</div></td>')
                    t.append(p);

        },minChars:3, data: {
            "type_for": type,
        },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#pick_search_for_id").val(0)})
   });

    </script>