<!--suppress JSUnresolvedVariable -->
<!-- Autocomplete scripts -->
<script type="text/javascript">

    $("#mode").change(function () {
        var holder = $("#mode").val() === 'A' || $("#mode").val() === 'W' ? "airports" :
                        $("#mode").val() === 'R' || $("#mode").val() === 'T' ? "zip codes" :
                        $("#mode").val() === 'O' ? "ocean ports" : "";

        $("#location_origin_id").attr("value", 0);
        $("#location_destination_id").attr("value", 0);
        $("#location_origin_name").attr("value", "");
        $("#location_destination_name").attr("value", "");

        $("#location_origin_name").attr("placeholder", holder);
        $("#location_destination_name").attr("placeholder", holder);

        var url = $("#mode").val() === 'A' || $("#mode").val() === 'W' ? "{{ route('airports.autocomplete') }}" :
                $("#mode").val() === 'R' || $("#mode").val() === 'T' ? "{{ route('zip_codes.autocomplete') }}" :
                        $("#mode").val() === 'O' ? "{{ route('ocean_ports.autocomplete') }}" : "";

        $("#location_origin_name").marcoPolo({

            url: url,
            formatItem: function(e, o) {
                return e.code + ' | ' + e.name
            },
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->location_origin_id : "")}}',
                name: '{{ ((isset($receipt_entry) and $receipt_entry->location_origin_id > 0) ? $receipt_entry->origin->name : null)}}',
                code: '{{ ((isset($receipt_entry) and $receipt_entry->location_origin_id > 0) ? $receipt_entry->origin->code : null)}}',
            },
            onSelect: function(e, o) {
                $("#location_origin_id").val(e.id), $(this).val(e.name), $("#location_destination_code").val(e.code)
            },
            minChars: 3,
            param: "term"
        }).on("marcopolorequestbefore", function() {
            $("#location_origin_name_img").removeClass("img-none").addClass("img-display"), $("#location_origin_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#location_origin_name_img").removeClass("img-display").addClass("img-none"), $("#location_origin_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#location_origin_id").val(0)
        }).blur(function() {
            var e = $("#location_origin_id").val();
            0 == e && $(this).val("")
        }),
        $("#location_destination_name").marcoPolo({
            url: url,
            formatItem: function(e, o) {
                return e.code + ' | ' + e.name
            },
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->location_destination_id : "")}}',
                name: '{{ ((isset($receipt_entry) and $receipt_entry->location_destination_id > 0) ? $receipt_entry->destination->name : null)}}',
                code: '{{ ((isset($receipt_entry) and $receipt_entry->location_destination_id > 0) ? $receipt_entry->destination->code : null)}}',
                country_id: '{{ ((isset($receipt_entry) and $receipt_entry->location_country_id > 0) ? 
$receipt_entry->country_id: null)}}',
                country_name: '{{ ((isset($receipt_entry) and $receipt_entry->location_country_id > 0) ? 
$receipt_entry->country->name : null)}}'
            },
            onSelect: function(e, o) {
                $("#location_destination_id").val(e.id), $(this).val(e.name), $("#location_country_name").val(e.country_name), $("#location_country_id").val(e.country_id)
            },
            minChars: 3,
            param: "term",
            required: !0
        }).on("marcopolorequestbefore", function() {
            $("#location_destination_name_img").removeClass("img-none").addClass("img-display"), $("#location_destination_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter", function() {
            $("#location_destination_name_img").removeClass("img-display").addClass("img-none"), $("#location_destination_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#location_destination_id").val(0)
        }).blur(function() {
            var e = $("#location_destination_id").val();
            0 == e && ($(this).val(""), $("#location_country_id").val(0), $("#location_country_name").val(""))
        })
    });
    $("#mode").val('{{ (isset($receipt_entry) ? $receipt_entry->mode : "") }}').change();

        $("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->division_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->division_id > 0) ? $receipt_entry->division->name : null)}}'
            },
            onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"),$("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#division_id").val(0)
        }).blur(function() {
            var e = $("#division_id").val();
            0 == e && $(this).val("")
        });




        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_id > 0) ? $receipt_entry->shipper->name : null)}}',
                address: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_address : null)}}',
                city: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_city: null) }}',
                state_id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_state_id: null)}}',
                state_name: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_state_id > 0) ? $receipt_entry->shipper_state->name : null)}}',
                zip_code_id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_zip_code_id: null)}}',
                zip_code_code: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_zip_code_id> 0) ? $receipt_entry->shipper_zip_code->code: null)}}',
                phone: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_phone: null)}}',
                fax: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_fax: null)}}',
            },
            onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#shipper_id").val(0)
        }).blur(function() {
            var e = $("#shipper_id").val();
            0 == e && ($(this).val(""), $("#shipper_address").val(""), $("#shipper_city").val(""), $("#shipper_state_id").val(0), $("#shipper_state_name").val(""), $("#shipper_zip_code_id").val(0), $("#shipper_zip_code_code").val(""), $("#shipper_phone").val(""), $("#shipper_fax").val(""))
        });

        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_zip_code_id: "")}}',
                code: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_zip_code_id > 0) ? $receipt_entry->shipper_zip_code->code : null)}}',
                name: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_city: null)}}',
                state_id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_state_id: null)}}',
                state_name: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_state_name > 0) ? $receipt_entry->shipper_state->name : null) }}'
            },
            onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e &&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});



        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},   selected: {
            id: '{{ (isset($receipt_entry) ? $receipt_entry->shipper_state_id: "")}}',
            value: '{{ ((isset($receipt_entry) and $receipt_entry->shipper_state_id > 0) ? $receipt_entry->shipper_state->name: null)}}',
        },
            onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});

    $("#consignee_name").marcoPolo({
        url: "{{ route('customers.autocomplete') }}",
        formatItem: function(e, o) {
            return e.value
        },

        selected:{

            id: '{{ (isset($receipt_entry )? $receipt_entry->consignee_id  : "")}}',
            value: '{{ ((isset($receipt_entry) and $receipt_entry->consignee_id >0) ? $receipt_entry->consignee->name : "") }}',
            address: "{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($receipt_entry) ? $receipt_entry->consignee_address : null)) )}}",
            city: '{{ (isset($receipt_entry )? $receipt_entry->consignee_city : "")}}',
            state_id: '{{ (isset($receipt_entry )? $receipt_entry->consignee_state_id: "")}}',
            state_name: '{{ ((isset($receipt_entry )and  $receipt_entry->consignee_state_id >0 )? $receipt_entry->consignee_state->name: "")}}',
            zip_code_id: '{{ (isset($receipt_entry )? $receipt_entry->consignee_zip_code_id: "")}}',
            zip_code_code: '{{ ((isset($receipt_entry )and  $receipt_entry->consignee_zip_code_id >0) ? $receipt_entry->consignee_zip_code->code: "")}}',
            coloader_id: '{{ (isset($receipt_entry )? $receipt_entry->coloader_id: "")}}',
            coloader_name: '{{ ((isset($receipt_entry ) and  $receipt_entry->coloader_id) ?  $receipt_entry->coloader->name: "")}}',
            agent_id: '{{ (isset($receipt_entry )? $receipt_entry->agent_id: "")}}',
            agent_name: '{{ ((isset($receipt_entry ) and  $receipt_entry->agent_id) ?  $receipt_entry->agent->name : "" )}}',
            third_party_id: '{{ (isset($receipt_entry )? $receipt_entry->third_party_id : "")}}',
            third_party_name: '{{ ((isset($receipt_entry ) and  $receipt_entry-> third_party_id) ?  $receipt_entry->third_party->name: "")}}',
            third_party_phone: '{{ (isset($receipt_entry )? $receipt_entry->third_party_phone : "")}}',
            third_party_fax: '{{ (isset($receipt_entry )? $receipt_entry->third_party_fax : "")}}',
        },
        onSelect: function(e, o) {
            $("#consignee_id").val(e.id), $(this).val(e.value), $("#consignee_address").val(e.address), $("#consignee_city").val(e.city), $("#consignee_state_id").val(e.state_id), $("#consignee_state_name").val(e.state_name), $("#consignee_zip_code_id").val(e.zip_code_id), $("#consignee_zip_code_code").val(e.zip_code_code), $("#consignee_phone").val(e.phone), $("#consignee_fax").val(e.fax), $("#agent_id").val(e.agent_id).change(), $('#agent_name').val(e.agent_name), $("#coloader_id").val(e.coloader_id), $('#coloader_name').val(e.coloader_name), $("#third_party_id").val(e.third_party_id).change(), $("#third_party_name").val(e.third_party_name), $("#third_party_phone").val(e.third_party_phone), $("#third_party_fax").val(e.third_party_fax)
        },
        minChars: 3,
        param: "term",
        required: !0
    }).on("marcopolorequestbefore", function() {
        $("#consignee_name_img").removeClass("img-none").addClass("img-display"), $("#consignee_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter", function() {
        $("#consignee_name_img").removeClass("img-display").addClass("img-none"), $("#consignee_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e) {
        var o = e.keyCode ? e.keyCode : e.which;
        (8 == o || 46 == o) && $("#consignee_id").val(0)
    }).blur(function() {
        var e = $("#consignee_id").val();
        0 == e && ($(this).val(""), $("#consignee_id").val(0), $("#consignee_address").val(""), $("#consignee_state_id").val(""), $("#consignee_state_name").val(""), $("#consignee_city").val(""), $("#consignee_zip_code_id").val(""), $("#consignee_zip_code_code").val(""), $("#consignee_phone").val(""), $("#consignee_fax").val(""), $("#agent_id").val(""), $('#agent_name').val(""), $("#coloader_id").val(""), $('#coloader_name').val(""), $("#third_party_id").val(""), $("#third_party_name").val(""), $("#third_party_phone").val(""), $("#third_party_fax").val(""))
    });


        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->consignee_zip_code_id : "")}}',
                code: '{{ ((isset($receipt_entry) and $receipt_entry->consignee_zip_code_id > 0) ? $receipt_entry->consignee_zip_code->code : null)}}',
                state_id: '{{ (isset($receipt_entry) ? $receipt_entry->consignee_state_id: "")}}',
                state_name: '{{ ((isset($receipt_entry) and $receipt_entry->consignee_state_id> 0) ? $receipt_entry->consignee_state->code : null)}}',
                name: '{{ (isset($receipt_entry) ? $receipt_entry->consignee_city: "")}}',

            }
            ,onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});



        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->consignee_state_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->consignee_state_id > 0) ? $receipt_entry->consignee_state->name: null)}}',
            },
            onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});



        $("#third_party_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected: {
                id: '{{ (isset($receipt_entry )? $receipt_entry->third_party_id : "")}}',
                value: '{{ ((isset($receipt_entry ) and  $receipt_entry-> third_party_id) ?  $receipt_entry->third_party->name: "")}}',
                phone: '{{ (isset($receipt_entry )? $receipt_entry->third_party_phone : "")}}',
                fax: '{{ (isset($receipt_entry )? $receipt_entry->third_party_fax : "")}}',
            },
            onSelect:function(e,o){$("#third_party_id").val(e.id),$(this).val(e.value),$("#third_party_phone").val(e.phone),$("#third_party_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#third_party_name_img").removeClass("img-none").addClass("img-display"),$("#third_party_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_party_name_img").removeClass("img-display").addClass("img-none"),$("#third_party_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){
            var o=e.keyCode?e.keyCode:e.which;
            (8==o||46==o )&& $("#third_party_id").val(0)})
                .blur(function(){
                    var e=$("#third_party_id").val();
                    0==e&& ($(this).val(""))});



        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected: {
                id: '{{ (isset($receipt_entry) ? $receipt_entry->agent_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->agent_id> 0) ? $receipt_entry->agent->name: null)}}',
            }
            ,onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&$(this).val("")});



        $("#coloader_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
                id: '{{ (isset($receipt_entry) ? $receipt_entry->coloader_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->coloader_id> 0) ? $receipt_entry->coloader->name: null)}}',
            }
            ,onSelect:function(e,o){$("#coloader_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#coloader_name_img").removeClass("img-none").addClass("img-display"),$("#coloader_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#coloader_name_img").removeClass("img-display").addClass("img-none"),$("#coloader_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#coloader_id").val(0)}).blur(function(){var e=$("#coloader_id").val();0==e&&$(this).val("")});



        $("#warehouse_name").marcoPolo({url:"{{ route('warehouses.autocomplete') }}",formatItem:function(e,o){return e.name},

            onSelect:function(e,o){$("#warehouse_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_id").val(0)}).blur(function(){var e=$("#warehouse_id").val();0==e&&$(this).val("")});



        $("#location_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
                id: '{{ (isset($receipt_entry) ? $receipt_entry->location_country_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->location_country_id > 0) ? $receipt_entry->country->name: null)}}',
            }
                ,onSelect:function(e,o){$("#location_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#location_country_name_img").removeClass("img-none").addClass("img-display"),$("#location_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_country_name_img").removeClass("img-display").addClass("img-none"),$("#location_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_country_id").val(0)}).blur(function(){var e=$("#location_country_id").val();0==e&&$(this).val("")});




        $("#location_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
                id: '{{ (isset($receipt_entry) ? $receipt_entry->location_world_location_id : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->location_world_location_id> 0) ? $receipt_entry->world_location->name: null)}}',
            }
            ,onSelect:function(e,o){$("#location_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#location_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#location_world_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_world_location_id").val(0)}).blur(function(){var e=$("#location_world_location_id").val();0==e&&$(this).val("")});


        $("#location_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},
            selected:{
                id: '{{ (isset($receipt_entry) ? $receipt_entry->location_service_id : "")}}',
                name: '{{ ((isset($receipt_entry) and $receipt_entry->location_service_id> 0) ? $receipt_entry->service->name: null)}}',
            }
                ,onSelect:function(e,o){$("#location_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_service_name_img").removeClass("img-none").addClass("img-display"),$("#location_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_service_name_img").removeClass("img-display").addClass("img-none"),$("#location_service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_service_id").val(0)}).blur(function(){var e=$("#location_service_id").val();0==e&&$(this).val("")});


        $("#tmp_hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},
            onSelect:function(e,o){$("#tmp_hazardous_uns_id").val(e.id),$(this).val(e.code),$('#tmp_hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_hazardous_uns_id").val(0)}).blur(function(){var e=$("#tmp_hazardous_uns_id").val();0==e&&$(this).val("")});



        $("#receiving_carrier_name").marcoPolo({url:"{{ route('carriers.autocomplete') }}",formatItem:function(e,r){return e.name},selected:{
            id: '{{ (isset($receipt_entry) ? $receipt_entry->receiving_carrier_id : "")}}',
            name: '{{ ((isset($receipt_entry) and $receipt_entry->receiving_carrier_id> 0) ? $receipt_entry->carrier->name: null)}}'
        },onSelect:function(e,r){$("#receiving_carrier_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#receiving_carrier_name_img").removeClass("img-none").addClass("img-display"),$("#receiving_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#receiving_carrier_name_img").removeClass("img-display").addClass("img-none"),$("#receiving_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#receiving_carrier_id").val(0)}).blur(function(){var e=$("#receiving_carrier_id").val();0==e&&$(this).val("")});

        $("#receiving_driver_name").marcoPolo({url:"{{ route('drivers.autocomplete') }}",formatItem:function(e,i){return e.name},selected:{
            id: '{{ (isset($receipt_entry) ? $receipt_entry->receiving_driver_id : "")}}',
            name: '{{ ((isset($receipt_entry) and $receipt_entry->receiving_driver_id> 0) ? $receipt_entry->driver->name: null)}}',
            license: '{{ (isset($receipt_entry) ? $receipt_entry->receiving_driver_license: null)}}'
        },onSelect:function(e,i){$("#receiving_driver_id").val(e.id),$(this).val(e.name),$("#receiving_driver_license").val(e.license)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#receiving_driver_name_img").removeClass("img-none").addClass("img-display"),$("#receiving_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#receiving_driver_name_img").removeClass("img-display").addClass("img-none"),$("#receiving_driver_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#receiving_driver_id").val(0)}).blur(function(){var e=$("#receiving_driver_id").val();0==e&&$(this).val("")});

        $("#tmp_cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_cargo_location_id").val(0)}).blur(function(){var e=$("#tmp_cargo_location_id").val();0==e&&$(this).val("")});

        $("#tmp_cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_cargo_location_bin_id").val(0)}).blur(function(){var e=$("#tmp_cargo_location_bin_id").val();0==e&&$(this).val("")});

        $("#tmp_billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.code + ' ' + e.value},onSelect:function(e,o){$("#tmp_billing_billing_id").val(e.id),$(this).val(e.code), $("#tmp_billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_billing_billing_id").val(0)}).blur(function(){var e=$("#tmp_billing_billing_id").val();0==e&&$(this).val("")});

        $("#tmp_billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_billing_unit_id").val(0)}).blur(function(){var e=$("#tmp_billing_unit_id").val();0==e&&$(this).val("")});

        $("#tmp_billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_billing_customer_id").val(e.id).change(),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_billing_customer_id").val(0)}).blur(function(){var e=$("#tmp_billing_customer_id").val();0==e&&$(this).val("")});

        $("#tmp_billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#tmp_billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_billing_vendor_id").val(0)}).blur(function(){var e=$("#tmp_billing_vendor_id").val()});

        $("#tmp_cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#tmp_cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#tmp_cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#tmp_cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#tmp_cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_cost_unit_id").val(0)}).blur(function(){var e=$("#tmp_cost_unit_id").val()});
</script>
