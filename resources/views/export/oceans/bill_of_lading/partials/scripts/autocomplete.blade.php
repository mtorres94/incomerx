<script type="text/javascript">
    $("#division_name").focus(function () {$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#division_id").val(0)})
    });

    $("#loading_port_name").focus(function () {
        $("#loading_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#loading_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#loading_port_name_img").removeClass("img-none").addClass("img-display"),$("#loading_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#loading_port_name_img").removeClass("img-display").addClass("img-none"),$("#loading_port_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#loading_port_id").val(0))})
    });

    $("#unloading_port_name").focus(function () {
        $("#unloading_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#unloading_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#unloading_port_name_img").removeClass("img-none").addClass("img-display"),$("#unloading_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#unloading_port_name_img").removeClass("img-display").addClass("img-none"),$("#unloading_port_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#unloading_port_id").val(0))})
    });


    $("#port_carrier_name").focus(function() {$("#port_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#port_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#port_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#port_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#port_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#port_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#port_carrier_id").val(0)})
    });

    $("#origin_country_name").focus(function () {
        $("#origin_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#origin_country_id").val(0)})
    });

    $("#forwarding_agent_name").focus(function () {
        $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#forwarding_agent_id").val(0))})
    });

    $("#coloader_name").focus(function () {
        $("#coloader_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#coloader_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#coloader_name_img").removeClass("img-none").addClass("img-display"),$("#coloader_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#coloader_name_img").removeClass("img-display").addClass("img-none"),$("#coloader_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#coloader_id").val(0))})
    });

    $("#shipper_name").focus(function () {
        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))})
    });

    $("#shipper_country_name").focus(function () {
        $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#shipper_country_id").val(0)})
    });

    $("#shipper_zip_code_code").focus(function () {
        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name), $("#shipper_country_id").val(e.country_id), $("#shipper_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))})
    });

    $("#shipper_state_name").focus(function () {
        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")})
    });

    $("#notify_name").focus(function () {
        $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name),$("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))})
    });


    $("#consignee_name").focus(function () {
        $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))})
    });


    $("#consignee_state_name").focus(function () {
        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")})
    });

    $("#consignee_country_name").focus(function () {
        $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#consignee_country_id").val(0)})
    });

    $("#consignee_zip_code_code").focus(function () {
        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name), $("#consignee_country_id").val(e.country_id), $("#consignee_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#origin_from_state_name").val(""))})
    });

    $("#agent_name").focus(function () {
        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_address").val(e.address),$("#agent_city").val(e.city),$("#agent_state_id").val(e.state_id),$("#agent_state_name").val(e.state_name),$("#agent_zip_code_id").val(e.zip_code_id),$("#agent_zip_code_code").val(e.zip_code_code),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#agent_id").val(0),$("#agent_address").val(""),$("#agent_city").val(""),$("#agent_state_id").val(""),$("#agent_state_name").val(""),$("#agent_zip_code_id").val(""),$("#agent_zip_code_code").val(""),$("#agent_phone").val(""),$("#agent_fax").val(""))})
    });

    $("#agent_state_name").focus(function () {
        $("#agent_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_state_name_img").removeClass("img-none").addClass("img-display"),$("#agent_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_state_name_img").removeClass("img-display").addClass("img-none"),$("#agent_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_state_id").val(0)}).blur(function(){var e=$("#agent_state_id").val();0==e&&$(this).val("")})
    });



    $("#agent_country_name").focus(function () {
        $("#agent_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#agent_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_country_name_img").removeClass("img-none").addClass("img-display"),$("#agent_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_country_name_img").removeClass("img-display").addClass("img-none"),$("#agent_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#agent_country_id").val(0)})
    });

    $("#agent_zip_code_code").focus(function () {
        $("#agent_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#agent_zip_code_id").val(e.id),$(this).val(e.code),$("#agent_city").val(e.name),$("#agent_state_id").val(e.state_id),$("#agent_state_name").val(e.state_name), $("#agent_country_id").val(e.country_id), $("#agent_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#agent_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#agent_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_zip_code_id").val(0)}).blur(function(){var e=$("#agent_zip_code_id").val();0==e&&($(this).val(""),$("#agent_city").val(""),$("#agent_state_id").val(0),$("#agent_state_name").val(""))})
    });

    $("#notify_country_name").focus(function () {
        $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#notify_country_id").val(0)})
    });

    $("#notify_state_name").focus(function () {
        $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")})
    });

    $("#notify_zip_code_code").focus(function () {
        $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name), $("#notify_country_id").val(e.country_id), $("#notify_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_city").val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))})
    });

    $("#inland_carrier_name").focus(function() {$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#inland_carrier_id").val(0)})
    });

    $("#third_country_name").focus(function () {
        $("#third_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_country_name_img").removeClass("img-none").addClass("img-display"),$("#third_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_country_name_img").removeClass("img-display").addClass("img-none"),$("#third_country_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#third_country_id").val(0)})
    });

    $("#third_state_name").focus(function () {
        $("#third_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#third_state_name_img").removeClass("img-none").addClass("img-display"),$("#third_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_state_name_img").removeClass("img-display").addClass("img-none"),$("#third_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_state_id").val(0)}).blur(function(){var e=$("#third_state_id").val();0==e&&$(this).val("")})
    });

    $("#third_zip_code_code").focus(function () {
        $("#third_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#third_zip_code_id").val(e.id),$(this).val(e.code),$("#third_city").val(e.name),$("#third_state_id").val(e.state_id),$("#third_state_name").val(e.state_name), $("#third_country_id").val(e.country_id), $("#third_country_name").val(e.country_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#third_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#third_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#third_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_zip_code_id").val(0)}).blur(function(){var e=$("#third_zip_code_id").val();0==e&&($(this).val(""),$("#third_city").val(""),$("#third_state_id").val(0),$("#third_state_name").val(""))})
    });

    $("#third_name").focus(function () {
        $("#third_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#third_id").val(e.id),$(this).val(e.value),$("#third_address").val(e.address),$("#third_city").val(e.city),$("#third_state_id").val(e.state_id),$("#third_state_name").val(e.state_name),$("#third_zip_code_id").val(e.zip_code_id),$("#third_zip_code_code").val(e.zip_code_code),$("#third_phone").val(e.phone),$("#third_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_name_img").removeClass("img-none").addClass("img-display"),$("#third_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_name_img").removeClass("img-display").addClass("img-none"),$("#third_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#third_id").val(0),$("#third_address").val(""),$("#third_city").val(""),$("#third_state_id").val(""),$("#third_state_name").val(""),$("#third_zip_code_id").val(""),$("#third_zip_code_code").val(""),$("#third_phone").val(""),$("#third_fax").val(""))})
    });

    $("#transhipment_port_name").focus(function () {
        $("#transhipment_port_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transhipment_port_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transhipment_port_name_img").removeClass("img-none").addClass("img-display"),$("#transhipment_port_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transhipment_port_name_img").removeClass("img-display").addClass("img-none"),$("#transhipment_port_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transhipment_port_id").val(0))})
    });

    $("#total_commodity_name").focus(function () {
        $("#total_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#total_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#total_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#total_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#total_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#total_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#total_commodity_id").val(0),$("#total_commodity_name").val(""))})
    });

    $("#broker_name").focus(function () {
        $("#broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#broker_code").val(e.id),$(this).val(e.name), $("#broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#broker_name_img").removeClass("img-none").addClass("img-display"),$("#broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#broker_name_img").removeClass("img-display").addClass("img-none"),$("#broker_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#broker_code").val(0))})
    });

    $("#destination_broker_name").focus(function () {
        $("#destination_broker_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#destination_broker_code").val(e.id),$(this).val(e.name), $("#destination_broker_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_broker_name_img").removeClass("img-none").addClass("img-display"),$("#destination_broker_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_broker_name_img").removeClass("img-display").addClass("img-none"),$("#destination_broker_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#destination_broker_code").val(0))})
    });

    $("#cargo_type_code").focus(function () {
        $("#cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_type_id").val(0))})
    });

    $("#cargo_commodity_name").focus(function () {
        $("#cargo_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#cargo_commodity_id").val(0),$("#cargo_commodity_id").val(0),$("#cargo_commodity_name").val(""))})
    });



    $("#box_commodity_name").focus(function () {
        $("#box_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#box_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#box_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#box_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_commodity_id").val(0),$("#box_commodity_id").val(0),$("#box_commodity_name").val(""))})
    });

    $("#box_scheduleb_code").focus(function () {
        $("#box_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#box_scheduleb_id").val(e.code),$(this).val(e.code), $("#box_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#box_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#box_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_scheduleb_id").val(0))})
    });

    $("#box_hts_code").focus(function () {
        $("#box_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#box_hts_id").val(e.id),$(this).val(e.id), $("#box_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#box_hts_code_img").removeClass("img-none").addClass("img-display"),$("#box_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_hts_code_img").removeClass("img-display").addClass("img-none"),$("#box_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#box_hts_id").val(0)}).blur(function(){var e=$("#box_hts_id").val();0==e&&$(this).val("")})
    });

    $("#box_license_type_code").focus(function () {
        $("#box_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#box_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#box_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_license_type_id").val(0))})
    });

    $("#box_export_code").focus(function () {
        $("#box_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#box_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_export_code_img").removeClass("img-none").addClass("img-display"),$("#box_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_export_code_img").removeClass("img-display").addClass("img-none"),$("#box_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_export_id").val(0))})
    });

    $("#box_uns_code").focus(function () {
        $("#box_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#box_uns_id").val(e.id),$(this).val(e.code),$('#box_uns_description').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#box_uns_code_img").removeClass("img-none").addClass("img-display"),$("#box_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#box_uns_code_img").removeClass("img-display").addClass("img-none"),$("#box_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#box_uns_id").val(0),$("#box_uns_description").val(""))})
    });

    $("#vehicle_scheduleb_code").focus(function () {
        $("#vehicle_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#vehicle_scheduleb_id").val(e.code),$(this).val(e.code), $("#vehicle_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_scheduleb_id").val(0))})
    });

    $("#vehicle_hts_code").focus(function () {
        $("#vehicle_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#vehicle_hts_id").val(e.id),$(this).val(e.id), $("#vehicle_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_hts_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_hts_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_hts_id").val(0)}).blur(function(){var e=$("#vehicle_hts_id").val();0==e&&$(this).val("")})
    });

    $("#vehicle_license_type_code").focus(function () {
        $("#vehicle_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_license_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_license_type_id").val(0))})
    });

    $("#vehicle_export_code").focus(function () {
        $("#vehicle_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_export_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_export_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_export_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_export_id").val(0))})
    });

    $("#vehicle_state_province_name").focus(function () {
        $("#vehicle_state_province_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_state_province_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_state_province_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_state_province_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_state_province_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_state_province_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_state_province_id").val(0)}).blur(function(){var e=$("#vehicle_state_province_id").val();0==e&&$(this).val("")})
    });

    $("#vehicle_cargo_type_code").focus(function () {
        $("#vehicle_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#vehicle_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_cargo_type_id").val(0))})
    });

    $("#hazardous_uns_code").focus(function () {
        $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#hazardous_uns_id").val(0),$("#hazardous_uns_desc").val(""))})
    });

    $("#equipment_type_code").focus(function () {
        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#equipment_type_id").val(0))})
    });

    $("#container_commodity_name").focus(function () {
        $("#container_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#container_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#container_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#container_commodity_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#container_commodity_id").val(0),$("#container_commodity_id").val(0),$("#container_commodity_name").val(""))})
    });

    $("#container_carrier_name").focus(function() {$("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#container_carrier_id").val(0)})
    });

    $("#container_pickup_state_name").focus(function () {
        $("#container_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_state_id").val(0)}).blur(function(){var e=$("#container_pickup_state_id").val();0==e&&$(this).val("")})
    });

    $("#container_delivery_state_name").focus(function () {
        $("#container_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_state_id").val(0)}).blur(function(){var e=$("#container_delivery_state_id").val();0==e&&$(this).val("")})
    });

    $("#container_drop_state_name").focus(function () {
        $("#container_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_drop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_state_id").val(0)}).blur(function(){var e=$("#container_drop_state_id").val();0==e&&$(this).val("")})
    });

    $("#container_pickup_zip_code_code").focus(function () {
        $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_city").val(e.name),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_city").val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))})
    });

    $("#container_delivery_zip_code_code").focus(function () {
        $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#container_delivery_city").val(e.name),$("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_city").val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))})
    });

    $("#container_drop_zip_code_code").focus(function () {
        $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_city").val(e.name),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_city").val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))})
    });

    $("#container_pickup_name").focus(function () {
        var url = $("#container_pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_pickup_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_pickup_type").val() === '01' ?  e.name :  e.value;
                $("#container_pickup_id").val(e.id),
                        $(this).val(name),
                        $("#container_pickup_address").val(e.address),
                        $("#container_pickup_city").val(e.city),
                        $("#container_pickup_state_id").val(e.state_id),
                        $("#container_pickup_state_name").val(e.state_name),
                        $("#container_pickup_zip_code_id").val(e.zip_code_id),
                        $("#container_pickup_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_pickup_id").val(0)})
    });

    $("#container_delivery_name").focus(function () {
        var url = $("#container_delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_delivery_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_delivery_type").val() === '01' ?  e.name :  e.value;
                $("#container_delivery_id").val(e.id),
                        $(this).val(name),
                        $("#container_delivery_address").val(e.address),
                        $("#container_delivery_city").val(e.city),
                        $("#container_delivery_state_id").val(e.state_id),
                        $("#container_delivery_state_name").val(e.state_name),
                        $("#container_delivery_zip_code_id").val(e.zip_code_id),
                        $("#container_delivery_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_delivery_id").val(0)})
    });

    $("#container_drop_name").focus(function () {
        var url = $("#container_drop_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#container_drop_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#container_drop_type").val() === '01' ?  e.name : e.value ;
            },
            onSelect:function(e,o){
                var name = $("#container_drop_type").val() === '01' ?  e.name :  e.value;
                $("#container_drop_id").val(e.id),
                        $(this).val(name),
                        $("#container_drop_address").val(e.address),
                        $("#container_drop_city").val(e.city),
                        $("#container_drop_state_id").val(e.state_id),
                        $("#container_drop_state_name").val(e.state_name),
                        $("#container_drop_zip_code_id").val(e.zip_code_id),
                        $("#container_drop_zip_code_code").val(e.zip_code_code)
            },
            minChars:3,
            param:"term",
            required:!0
        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur",function(){
            ""==$(this).val().trim()&&$("#container_drop_id").val(0)})
    });

    $("#billing_billing_code").focus(function () {
        $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.id), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_billing_id").val(0),$("#billing_billing_description").val(""),$("#billing_billing_code").val(""))})
    });


    $("#billing_customer_name").focus(function () {
        $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_customer_id").val(0))})
    });

    $("#cost_unit_name").focus(function () {
        $("#cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cost_unit_id").val(0)}).blur(function(){var e=$("#cost_unit_id").val()})
    });

    $("#billing_unit_name").focus(function () {
        $("#billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_unit_id").val(0)}).blur(function(){var e=$("#billing_unit_id").val()})
    });


    $("#billing_vendor_name").focus(function () {
        $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#billing_vendor_code").val(0))})
    });
    $("#transportation_service_name").focus(function () {
        $("#transportation_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transportation_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_service_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_service_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_service_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_service_id").val(0))})
    });

    $("#transportation_billing_code").focus(function () {
        $("#transportation_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#transportation_billing_id").val(e.id),$(this).val(e.id), $("#transportation_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#transportation_billing_code_img").removeClass("img-none").addClass("img-display"),$("#transportation_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_billing_code_img").removeClass("img-display").addClass("img-none"),$("#transportation_billing_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#transportation_billing_id").val(0),$("#transportation_description").val(""),$("#transportation_billing_code").val(""))})
    });

    $("#transportation_loading_location_name").focus(function () {
        $("#transportation_loading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_loading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_loading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_loading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_loading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_loading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_loading_location_id").val(0)})
    });

    $("#transportation_unloading_location_name").focus(function () {
        $("#transportation_unloading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_unloading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_unloading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_unloading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_unloading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_unloading_location_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#transportation_unloading_location_id").val(0)})
    });

    $("#transportation_carrier_name").focus(function() {$("#transportation_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.id +' - '+ e.name},onSelect: function(e, o) {$("#transportation_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term",required: !0}).on("marcopolorequestbefore", function() {$("#transportation_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#transportation_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#transportation_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#transportation_carrier_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur", function() {"" == $(this).val().trim() && $("#transportation_carrier_id").val(0)})
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
                        $("#origin_to_zip_code_code").val(e.zip_code_code),
                $("#origin_to_phone").val(e.phone),
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

    $("#customer_name").focus(function () {
        $("#customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#customer_name_img").removeClass("img-none").addClass("img-display"),$("#customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#customer_name_img").removeClass("img-display").addClass("img-none"),$("#customer_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#customer_id").val(0))})
    });

    $("#item_name").focus(function () {
        $("#item_name").marcoPolo({url:"{{ route('items.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#item_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_name_img").removeClass("img-none").addClass("img-display"),$("#item_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_name_img").removeClass("img-display").addClass("img-none"),$("#item_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#item_id").val(0),$("#item_name").val(""))})
    });

    $("#item_type_name").focus(function () {
        $("#item_type_name").marcoPolo({
            url: "{{ route('cargo_types.autocomplete') }}", formatItem: function (e, o) {
                return e.code
            }, onSelect: function (e, o) {
                $("#item_type_code").val(e.id), $(this).val(e.code)
            }, minChars: 3, param: "term", required: !0
        }).on("marcopolorequestbefore", function () {
            $("#item_type_name_img").removeClass("img-none").addClass("img-display"), $("#item_type_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function () {
            $("#item_type_name_img").removeClass("img-display").addClass("img-none"), $("#item_type_name_spn").removeClass("img-none").addClass("img-display")
        }).on("marcopoloblur", function () {
            "" == $(this).val().trim() && ($("#item_type_code").val(0))
        })
    });


    $("#shipment_code").focus(function () {
        $("#shipment_code").marcoPolo({url:"{{ route('shipment_entries.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){
            $("#shipment_id").val(e.id),
                    $(this).val(e.code),
                    $("#shipment_type").val(e.type).change(),
                    $("#bl_status").val(e.bl_status).change(),
                    $("#port_vessel").val(e.vessel),
                    $("#port_voyage").val(e.voyage),
                    $("#port_carrier_id").val(e.carrier_id),
                    $("#port_carrier_name").val(e.carrier_name),
                    $("#departure").val(e.departure),
                    $("#arrival").val(e.arrival),

                    $("#loading_port_id").val(e.loading_port_id),
                    $("#loading_port_name").val(e.loading_port_name),
                    $("#unloading_port_id").val(e.unloading_port_id),
                    $("#unloading_port_name").val(e.unloading_port_name),
                    $("#place_receipt_id").val(e.location_origin_id),
                    $("#place_receipt_name").val(e.location_origin_name),
                    $("#place_delivery_id").val(e.location_destination_id),
                    $("#place_delivery_name").val(e.location_destination_name),
                    $("#place_receipt").val(e.location_origin_name),
                    $("#place_delivery").val(e.location_destination_name),
                    $("#port_loading").val(e.loading_port_name),
                    $("#foreign_port").val(e.unloading_port_name),

                    $("#shipper_id").val(e.shipper_id),
                    $("#shipper_name").val(e.shipper_name),
                    $("#shipper_address").val(e.shipper_address),
                    $("#shipper_city").val(e.shipper_city),
                    $("#shipper_phone").val(e.shipper_phone),
                    $("#shipper_state_id").val(e.shipper_state_id),
                    $("#shipper_state_name").val(e.shipper_state_name),
                    $("#shipper_zip_code_id").val(e.shipper_zip_code_id),
                    $("#shipper_zip_code_code").val(e.shipper_zip_code_code),

                    $("#consignee_id").val(e.consignee_id),
                    $("#consignee_name").val(e.consignee_name),
                    $("#consignee_address").val(e.consignee_address),
                    $("#consignee_city").val(e.consignee_city),
                    $("#consignee_phone").val(e.consignee_phone),
                    $("#consignee_state_id").val(e.consignee_state_id),
                    $("#consignee_state_name").val(e.consignee_state_name),
                    $("#consignee_zip_code_id").val(e.consignee_zip_code_id),
                    $("#consignee_zip_code_code").val(e.consignee_zip_code_code),

                    $("#agent_name").val(e.agent_name),
                    $("#agent_id").val(e.agent_id),
                    $("#agent_state_id").val(e.agent_state_id),
                    $("#agent_zip_code_id").val(e.agent_zip_code_id),
                    $("#agent_country_id").val(e.agent_country_id),
                    $("#agent_country_name").val(e.agent_country_name),
                    $("#agent_state_name").val(e.agent_state_name),
                    $("#agent_zip_code").val(e.agent_zip_code),
                    $("#agent_phone").val(e.agent_phone),
                    $("#agent_fax").val(e.agent_fax),
                    $("#agent_contact").val(e.agent_contact),
                    $("#agent_commission").val(e.agent_commission),
                    $("#spotting_amount").val(e.agent_amount)
        },
            minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipment_code_img").removeClass("img-none").addClass("img-display"),$("#shipment_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipment_code_img").removeClass("img-display").addClass("img-none"),$("#shipment_code_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#shipment_id").val(0),$("#shipment_code").val(""))})
    });


</script>