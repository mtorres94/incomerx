<!--suppress JSUnresolvedVariable -->
<!-- Autocomplete scripts -->
<script type="text/javascript">
        $("#division_name").marcoPolo({
            url:"{{ route('divisions.autocomplete') }}",
            formatItem:function(e,o){
                return e.value
            },
            selected:{
              id: '{{ (isset($order_entry)? $order_entry->division_id  : "")}}',
              value: '{{ ((isset($order_entry) and ($order_entry->division_id>0 ))? $order_entry->division->name : "")}}'
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
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#division_id").val(0)
        }).blur(function() {
            var e = $("#division_id").val();
            0 == e && $(this).val("")
        });


        $("#receiving_driver_name").marcoPolo({url:"{{ route('drivers.autocomplete') }}",formatItem:function(e,i){return e.name},selected: {
            id:'{{ (isset($order_entry)? $order_entry->receiving_driver_id : "") }}',
            name:'{{ ((isset($order_entry) and ($order_entry->receiving_driver_id > 0))? $order_entry->receiving_driver->name : "") }}',
        },onSelect:function(e,i){$("#receiving_driver_id").val(e.id),$(this).val(e.name),$("#receiving_driver_license").val(e.license)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#receiving_driver_name_img").removeClass("img-none").addClass("img-display"),$("#receiving_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#receiving_driver_name_img").removeClass("img-display").addClass("img-none"),$("#receiving_driver_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#receiving_driver_id").val(0)
        }).blur(function() {
            var e = $("#receiving_driver_id").val();
            0 == e && $(this).val("")
        });

        $("#carriers_carrier_name").marcoPolo({
            url: "{{ route('carriers.autocomplete') }}",
            formatItem: function(e, o) {
                return e.id +' - '+ e.name
            },
            selected:{
                id:'{{ (isset($order_entry)? $order_entry->carriers_carrier_id  : "")}}',
                name:'{{ ((isset($order_entry) and ($order_entry->carriers_carrier_id > 0 ))? $order_entry->carriers_carrier->name : "")}}',
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
        }).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#carriers_carrier_id").val(0)
        }).blur(function() {
            var e = $("#carriers_carrier_id").val();
            0 == e && $(this).val("")
        });


        $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
                id: '{{ (isset($order_entry)? $order_entry->shipper_id : "") }}',
                value: '{{ ((isset($order_entry) and ($order_entry->shipper_id > 0 ))? $order_entry->shipper->name : "") }}',
                address: '{{ (isset($order_entry)? $order_entry->shipper_address : "") }}',
                city: '{{ (isset($order_entry)? $order_entry->shipper_city: "") }}',
                zip_code_id: '{{ (isset($order_entry)? $order_entry->shipper_zip_code_id : "") }}',
                zip_code_code: '{{ ((isset($order_entry)and( $order_entry->shipper_zip_code_id > 0 ))? $order_entry->shipper_zip_code->code : "") }}',
                state_id: '{{ (isset($order_entry)? $order_entry->shipper_state_id : "") }}',
                state_name: '{{ ((isset($order_entry)and( $order_entry->shipper_state_id > 0 ))? $order_entry->shipper_state->code : "") }}',
                phone: '{{ (isset($order_entry)? $order_entry->shipper_phone : "") }}',
                fax: '{{ (isset($order_entry)? $order_entry->shipper_fax : "") }}',

            }
            ,onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e) {
            var o = e.keyCode ? e.keyCode : e.which;
            (8 == o || 46 == o) && $("#shipper_id").val(0)
        }).blur(function() {
            var e = $("#shipper_id").val();
            0 == e && ($(this).val(""), $("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))
        });

        $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},
            selected:{
            id:'{{ (isset($order_entry)? $order_entry->shipper_zip_code_id  : "")}}',
            code:'{{ ((isset($order_entry) and ($order_entry->shipper_zip_code_id >0 ))? $order_entry->shipper_zip_code->code  : "")}}',
            name:'{{ ((isset($order_entry) and ($order_entry->shipper_zip_code_id >0 ))? $order_entry->shipper_zip_code->city  : "")}}',
            state_id:'{{ ((isset($order_entry) and ($order_entry->shipper_zip_code_id >0 ))? $order_entry->shipper_zip_code->state_id  : "")}}',
            state_name:'{{ ((isset($order_entry) and ($order_entry->shipper_zip_code_id >0 ))? $order_entry->shipper_zip_code->state->name : "")}}',
            },onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});

        $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
            id: '{{ (isset($order_entry)? $order_entry->shipper_state_id : "") }}',
            value: '{{ ((isset($order_entry) and ($order_entry->shipper_state_id > 0 ))? $order_entry->shipper_state->name : "") }}'
            }
                ,onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});

        $("#consignee_name").marcoPolo({
            url: "{{ route('customers.autocomplete') }}",
            formatItem: function(e, o) {
                return e.value
            },

            selected:{

                id: '{{ (isset($receipt_entry )? $receipt_entry->consignee_id  : "")}}',
                value: '{{ ((isset($receipt_entry) and $receipt_entry->consignee_id >0) ? $receipt_entry->consignee->name : "") }}',
                address: "{{ trim(preg_replace('/\s\s+/', ' ', (isset($receipt_entry) ? $receipt_entry->consignee_address : null)) )}}",
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
                third_party_fax: '{{ (isset($receipt_entry )? $receipt_entry->third_party_fax : "")}}'
            },
            onSelect: function(e, o) {
                $("#consignee_id").val(e.id), $(this).val(e.value), $("#consignee_address").val(e.address), $("#consignee_city").val(e.city), $("#consignee_state_id").val(e.state_id), $("#consignee_state_name").val(e.state_name), $("#consignee_zip_code_id").val(e.zip_code_id), $("#consignee_zip_code_code").val(e.zip_code_code), $("#consignee_phone").val(e.phone), $("#consignee_fax").val(e.fax), $("#agent_id").val(e.agent_id), $('#agent_name').val(e.agent_name), $("#coloader_id").val(e.coloader_id), $('#coloader_name').val(e.coloader_name), $("#third_party_id").val(e.third_party_id), $("#third_party_name").val(e.third_party_name), $("#third_party_phone").val(e.third_party_phone), $("#third_party_fax").val(e.third_party_fax)
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
            id: '{{ (isset($order_entry) ? $order_entry->consignee_zip_code_id : "")}}',
            code: '{{ ((isset($order_entry) and ($order_entry->consignee_zip_code_id >0))? $order_entry->consignee_zip_code->code : "")}}',
            state_id: '{{ (isset($order_entry) ? $order_entry->consignee_state_id: "")}}',
            state_name: '{{ ((isset($order_entry) and ($order_entry->consignee_state_id >0 )) ? $order_entry->consignee_state->name: "")}}',
            }
                ,onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))})


        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected:{
                    id: '{{ (isset($order_entry) ? $order_entry->consignee_state_id : "") }}',
                    value: '{{ ((isset($order_entry) and ($order_entry->consignee_state_id > 0 )) ? $order_entry->consignee_state->name : "") }}',
                },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});


        $("#third_party_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected:{
            id:'{{ (isset($order_entry)? $order_entry->third_party_id : "") }}',
            value:'{{ ((isset($order_entry) and ($order_entry->third_party_id >0))? $order_entry->third_party->name : "") }}',
                    phone:'{{ (isset($order_entry)? $order_entry->third_party_phone : "") }}',
                    fax:'{{ (isset($order_entry)? $order_entry->third_party_fax : "") }}',
                }
                ,onSelect:function(e,o){$("#third_party_id").val(e.id),$(this).val(e.value),$("#third_party_phone").val(e.phone),$("#third_party_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#third_party_name_img").removeClass("img-none").addClass("img-display"),$("#third_party_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#third_party_name_img").removeClass("img-display").addClass("img-none"),$("#third_party_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#third_party_id").val(0)}).blur(function(){var e=$("#third_party_id").val();0==e&&$(this).val(""), $("#third_party_phone").val(""),$("#third_party_fax").val("")});

        $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected:{
                    id: '{{ (isset($order_entry) ?  $order_entry->agent_id : "") }}',
                    value: '{{ ((isset($order_entry) and ($order_entry->agent_id) ) ?  $order_entry->agent->name : "") }}',
                }
                ,onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&$(this).val("")});

        $("#payment_term_name").marcoPolo({url:"{{ route('payment_terms.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected:{
                    id: '{{ (isset($order_entry)? $order_entry->payment_term_id : "") }}',
                    value: '{{ ((isset($order_entry) and ($order_entry->payment_term_id > 0))? $order_entry->payment_term->name: "") }}',
                },onSelect:function(e,o){$("#payment_term_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#payment_term_name_img").removeClass("img-none").addClass("img-display"),$("#payment_term_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#payment_term_name_img").removeClass("img-display").addClass("img-none"),$("#payment_term_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#payment_term_id").val(0)}).blur(function(){var e=$("#payment_term_id").val();0==e&&$(this).val("")});

        $("#pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
            id: '{{ (isset($order_entry)? $order_entry->pickup_state_id : "")  }}',
            value: '{{ ((isset($order_entry) and ($order_entry->pickup_state_id >0 ))? $order_entry->pickup_state->name : "" )}}',
        }, onSelect:function(e,o){$("#pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pickup_state_id").val(0)}).blur(function(){var e=$("#pickup_state_id").val();0==e&&$(this).val("")})

        $("#pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},
                selected:{
                    id: '{{ (isset($order_entry) ? $order_entry->pickup_zip_code_id : "") }}',
                    code: '{{ ((isset($order_entry) and($order_entry->pickup_zip_code_id > 0))? $order_entry->pickup_zip_code->code : "") }}',
                    state_id: '{{ (isset($order_entry) ? $order_entry->pickup_state_id: "") }}',
                    state_name: '{{ ((isset($order_entry) and($order_entry->pickup_state_id> 0))? $order_entry->pickup_state->name : "") }}',
                }
                ,onSelect:function(e,o){$("#pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#pickup_city").val(e.name),$("#pickup_state_id").val(e.state_id),$("#pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pickup_zip_code_id").val(0)}).blur(function(){var e=$("#pickup_zip_code_id").val();0==e&&($(this).val(""),$("#pickup_city").val(""),$("#pickup_state_id").val(0),$("#pickup_state_name").val(""))});

        $("#delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},
                selected:{
                    id: '{{ (isset($order_entry)?  $order_entry->delivery_state_id : "" ) }}',
                    name: '{{ ((isset($order_entry) and ( $order_entry->delivery_state_id >0 ))? $order_entry->delivery_state->name : "") }}',
                },onSelect:function(e,o){$("#delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_state_id").val(0)}).blur(function(){var e=$("#delivery_state_id").val();0==e&&$(this).val("")});

        $("#delivery_zip_code_code").marcoPolo({
                    url: "{{ route('zip_codes.autocomplete') }}", formatItem: function (e, o) {
                        return e.code + " | " + e.name
                    },
                    selected: {
                        id:'{{ (isset($order_entry)? $order_entry->zip_cod_id :"")}}',
                        code :'{{ ((isset($order_entry) and ($order_entry->delivery_zip_code_id >0 ))? $order_entry->delivery_zip_code->code :"")}}',
                    state_id:'{{ (isset($order_entry)? $order_entry->delivery_state_id:"")}}',
                    state_name:'{{ ((isset($order_entry) and ($order_entry->delivery_state_id > 0 ))? $order_entry->delivery_state->name :"" )}}',
                }
            ,onSelect:function(e,o){$("#delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#delivery_city").val(e.name),$("#delivery_state_id").val(e.state_id),$("#delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_zip_code_id").val(0)}).blur(function(){var e=$("#delivery_zip_code_id").val();0==e&&($(this).val(""),$("#delivery_city").val(""),$("#delivery_state_id").val(0),$("#delivery_state_name").val(""))})

        $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
            id: '{{ (isset($order_entry) ? $order_entry->consignee_state_id : "") }}',
            value: '{{ ((isset($order_entry)and ($order_entry->consignee_state_id > 0)) ? $order_entry->consignee_state->name: "") }}',
        },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});


        $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},
            selected: {
             id: '{{ (isset($order_entry) ? $order_entry->consignee_zip_code_id : "") }}',
             code: '{{ ((isset($order_entry) and ($order_entry->consignee_zip_code_id >0 )) ? $order_entry->consignee_zip_code->code : "") }}',
             name: '{{ ((isset($order_entry) and ($order_entry->consignee_zip_code_id >0 )) ? $order_entry->consignee_zip_code->city: "") }}',
             state_id: '{{ ((isset($order_entry) and ($order_entry->consignee_zip_code_id >0 )) ? $order_entry->consignee_zip_code->state_id: "") }}',
             state_name: '{{ ((isset($order_entry) and ($order_entry->consignee_zip_code_id >0 )) ? $order_entry->consignee_zip_code->state->name: "") }}',

            }
            ,onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});

        $("#location_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},
            selected:{
                id: '{{ (isset($order_entry)? $order_entry->location_world_location_id : "") }}',
                value: '{{ ((isset($order_entry) and ($order_entry->location_world_location_id >0 ))? $order_entry->location_world_location->name : "") }}',
            }
                ,onSelect:function(e,o){$("#location_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#location_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#location_world_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_world_location_id").val(0)}).blur(function(){var e=$("#location_world_location_id").val();0==e&&($(this).val(""))});

        $("#destination_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($order_entry)? $order_entry->destination_world_location_id : "") }}',
            value: '{{ ((isset($order_entry) and ($order_entry->destination_world_location_id >0 ))? $order_entry->destination_world_location->name : "") }}',
        },onSelect:function(e,o){$("#destination_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#destination_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#destination_world_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_world_location_id").val(0)}).blur(function(){var e=$("#destination_world_location_id").val();0==e&&($(this).val(""))});

        $("#final_world_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
            id: '{{ (isset($order_entry)? $order_entry->final_world_location_id : "") }}',
            value: '{{ ((isset($order_entry) and ($order_entry->final_world_location_id >0 ))? $order_entry->final_world_location->name : "") }}',
        },onSelect:function(e,o){$("#final_world_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#final_world_location_name_img").removeClass("img-none").addClass("img-display"),$("#final_world_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#final_world_location_name_img").removeClass("img-display").addClass("img-none"),$("#final_world_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#final_world_location_id").val(0)}).blur(function(){var e=$("#final_world_location_id").val();0==e&&($(this).val(""))});

    $("#pickup_type").change(function () {
        var url = $("#pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#pickup_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
                return $("#pickup_type").val() === '01' ?  e.name : e.value ;
            },
            selected:{
                    id: '{{ (isset($order_entry)? $order_entry->pickup_id : "") }}',
                    value: '{{ ((isset($order_entry) and ($order_entry->pickup_id >0 ))? $order_entry->pickup_name->name : "") }}',
                    name: '{{ ((isset($order_entry) and ($order_entry->pickup_id >0 ))? $order_entry->pickup_name->name : "") }}',
                    address: '{{ ((isset($order_entry) and ($order_entry->pickup_id > 0))? $order_entry->pickup_name->address : "") }}',
                    city: '{{ ((isset($order_entry) and ($order_entry->pickup_id > 0))? $order_entry->pickup_name->city : "") }}',
                    state_id: '{{ (isset($order_entry) ? $order_entry->pickup_state_id: "") }}',
                    state_name: '{{ ((isset($order_entry) and ($order_entry->pickup_state_id >0 ))? $order_entry->pickup_state->name : "") }}',
                    zip_code_id: '{{ (isset($order_entry) ? $order_entry->pickup_zip_code_id : "" ) }}',
                    zip_code_code: '{{ ((isset($order_entry) and ($order_entry->pickup_zip_code_id >0 ))? $order_entry->pickup_zip_code->code : "") }}',
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
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pickup_id").val(0)}).blur(function(){var e=$("#pickup_id").val();0==e&&($(this).val(""), $("#pickup_city").val(""), $("#pickup_state_id").val(0), $("#pickup_state_name").val(""), $("#pickup_zip_code_id").val(0), $("#pickup_zip_code_code").val(""))});
    });

    $("#delivery_type").change(function () {
        var url = $("#delivery_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

        $("#delivery_name").marcoPolo({
            url:url,
            formatItem:function(e,o){
               return $("#delivery_type").val() === '01' ?  e.name :  e.value ;
               },
            selected:{
                id: '{{ (isset($order_entry)? $order_entry->delivery_id : "") }}',
                value: '{{ ((isset($order_entry) and ($order_entry->delivery_id >0 ))? $order_entry->delivery->name : "") }}',
                name: '{{ ((isset($order_entry) and ($order_entry->delivery_id >0 ))? $order_entry->delivery->name : "") }}',
                address: '{{ (isset($order_entry)? $order_entry->delivery->address : "") }}',
                city: '{{ (isset($order_entry)? $order_entry->delivery->city : "") }}',
                state_id: '{{ (isset($order_entry) ? $order_entry->delivery_state_id: "") }}',
                state_name: '{{ ((isset($order_entry) and ($order_entry->delivery_state_id >0 ))? $order_entry->delivery_state->name : "") }}',
                zip_code_id: '{{ (isset($order_entry) ? $order_entry->delivery_zip_code_id : "" ) }}',
                zip_code_code: '{{ ((isset($order_entry) and ($order_entry->delivery_zip_code_id >0 ))? $order_entry->delivery_zip_code_id ->code : "") }}',
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
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#delivery_id").val(0)}).blur(function(){var e=$("#delivery_id").val();0==e&&($(this).val(""), $("#delivery_city").val(""), $("#delivery_state_id").val(0), $("#delivery_state_name").val(""), $("#delivery_zip_code_id").val(0), $("#delivery_zip_code_code").val(""))});
    });

        $("#vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.code +'|'+e.name},selected:{
            id: '{{ (isset($order_entry)? $order_entry->vendor_code: "") }}',
            name: '{{ ((isset($order_entry) and ($order_entry->vendor_code>0 ))? $order_entry->vendor->name : "") }}',
        },onSelect:function(e,o){$("#vendor_code").val(e.id),$(this).val(e.name),$("#vendor_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vendor_name_img").removeClass("img-none").addClass("img-display"),$("#vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vendor_name_img").removeClass("img-display").addClass("img-none"),$("#vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vendor_code").val(0)}).blur(function(){var e=$("#vendor_code").val();0==e&&($(this).val(""))});

        $("#destination_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},
            selected:{
                id: '{{ (isset($order_entry)? $order_entry->destination_vendor_code: "") }}',
                name: '{{ ((isset($order_entry) and ($order_entry->destination_vendor_code>0 ))? $order_entry->destination_vendor->name : "") }}',
            },onSelect:function(e,o){$("#destination_vendor_code").val(e.id),$(this).val(e.name),$("#destination_vendor_phone").val(e.phone)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#destination_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#destination_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#destination_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#destination_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#destination_vendor_code").val(0)}).blur(function(){var e=$("#destination_vendor_code").val();0==e&&($(this).val(""))});

        $("#stop_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},
           onSelect:function(e,o){$("#stop_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#stop_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#stop_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#stop_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_cargo_type_id").val(0)}).blur(function(){var e=$("#stop_cargo_type_id").val();0==e&&($(this).val(""))});

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
        },minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#stop_customer_name_img").removeClass("img-none").addClass("img-display"),$("#stop_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_customer_name_img").removeClass("img-display").addClass("img-none"),$("#stop_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_cargo_type_id").val(0)}).blur(function(){var e=$("#stop_cargo_type_id").val();0==e&&($(this).val(""), $("#stop_customer_id").val(0),$("#stop_address").val(""),$("#stop_city").val(""),$("#stop_state_id").val(""),$("#stop_state_name").val(""),$("#stop_zip_code_id").val(""),$("#stop_zip_code_code").val(""),$("#stop_phone").val(""),$("#stop_fax").val(""))});


        $("#stop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#stop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#stop_state_name_img").removeClass("img-none").addClass("img-display"),$("#stop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_state_name_img").removeClass("img-display").addClass("img-none"),$("#stop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_state_id").val(0)}).blur(function(){var e=$("#stop_state_id").val();0==e&&$(this).val("")});


        $("#stop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#stop_zip_code_id").val(e.id),$(this).val(e.code),$("#stop_city").val(e.name),$("#stop_state_id").val(e.state_id),$("#stop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#stop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#stop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#stop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#stop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#stop_zip_code_id").val(0)}).blur(function(){var e=$("#stop_zip_code_id").val();0==e&&($(this).val(""),$("#stop_city").val(""),$("#stop_state_id").val(0),$("#stop_state_name").val(""))});

        $("#tmp_hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#tmp_hazardous_uns_id").val(e.id),$(this).val(e.code),$('#tmp_hazardous_uns_desc').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#tmp_hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#tmp_hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#tmp_hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#tmp_hazardous_uns_id").val(0)}).blur(function(){var e=$("#tmp_hazardous_uns_id").val();0==e&&$(this).val("")});


        $("#cargo_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#cargo_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#cargo_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#cargo_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cargo_cargo_type_id").val(0)}).blur(function(){var e=$("#cargo_cargo_type_id").val();0==e&&$(this).val("")});


        $("#cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cargo_location_id").val(0)}).blur(function(){var e=$("#cargo_location_id").val();0==e&&($(this).val(""))});

        $("#cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#argo_location_bin_id").val(0)}).blur(function(){var e=$("#argo_location_bin_id").val();0==e&&($(this).val(""))});

        $("#part_info_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#part_info_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#part_info_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#part_info_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#part_info_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#part_info_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#part_info_commodity_id").val(0)}).blur(function(){var e=$("#part_info_commodity_id").val();0==e&&($(this).val(""))});

        $("#eei_info_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +'|'+ e.value},onSelect:function(e,o){$("#eei_info_scheduleb_id").val(e.code),$(this).val(e.code), $("#eei_info_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#eei_info_scheduleb_id").val(0)}).blur(function(){var e=$("#eei_info_scheduleb_id").val();0==e&&($(this).val(""))});

        $("#hazardous_un_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_un_id").val(e.id),$(this).val(e.code),$('#hazardous_un_description').val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#hazardous_un_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_un_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_un_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_un_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#hazardous_un_id").val(0)}).blur(function(){var e=$("#hazardous_un_id").val();0==e&&($(this).val(""))});

        $("#item_item_name").marcoPolo({url:"{{ route('items.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#item_item_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_item_name_img").removeClass("img-none").addClass("img-display"),$("#item_item_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_item_name_img").removeClass("img-display").addClass("img-none"),$("#item_item_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#item_item_id").val(0)}).blur(function(){var e=$("#item_item_id").val();0==e&&($(this).val(""))});


        $("#item_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#item_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#item_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#item_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#item_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#item_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#item_vendor_code").val(0)}).blur(function(){var e=$("#item_vendor_code").val();0==e&&($(this).val(""))});


        $("#reference_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#reference_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#reference_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#reference_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#reference_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#reference_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#reference_vendor_code").val(0)}).blur(function(){var e=$("#reference_vendor_code").val();0==e&&($(this).val(""))});



        $("#other_department_name").marcoPolo({url:"{{ route('departments.autocomplete') }}",formatItem:function(e,o){return e.code + '|'+e.value},onSelect:function(e,o){$("#other_department_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#other_department_name_img").removeClass("img-none").addClass("img-display"),$("#other_department_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#other_department_name_img").removeClass("img-display").addClass("img-none"),$("#other_department_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#other_department_id").val(0)}).blur(function(){var e=$("#other_department_id").val();0==e&&($(this).val(""))});


        $("#other_ultimate_consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#other_ultimate_consignee_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#other_ultimate_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#other_ultimate_consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#other_ultimate_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#other_ultimate_consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#other_ultimate_consignee_id").val(0)}).blur(function(){var e=$("#other_ultimate_consignee_id").val();0==e&&($(this).val(""))});


        $("#cargo_commodity_name").marcoPolo({url:"{{ route('commodities.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cargo_commodity_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#cargo_commodity_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_commodity_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_commodity_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_commodity_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cargo_commodity_id").val(0)}).blur(function(){var e=$("#cargo_commodity_id").val();0==e&&($(this).val(""))});



        $("#billing_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_unit_name_img").removeClass("img-none").addClass("img-display"),$("#billing_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_unit_name_img").removeClass("img-display").addClass("img-none"),$("#billing_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_unit_id").val(0)}).blur(function(){var e=$("#billing_unit_id").val();0==e&&($(this).val(""))});


        $("#billing_customer_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#billing_customer_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_customer_name_img").removeClass("img-none").addClass("img-display"),$("#billing_customer_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_customer_name_img").removeClass("img-display").addClass("img-none"),$("#billing_customer_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_customer_id").val(0)}).blur(function(){var e=$("#billing_customer_id").val();0==e&&($(this).val(""))});



        $("#billing_vendor_name").marcoPolo({url:"{{ route('vendors.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#billing_vendor_code").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#billing_vendor_name_img").removeClass("img-none").addClass("img-display"),$("#billing_vendor_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_vendor_name_img").removeClass("img-display").addClass("img-none"),$("#billing_vendor_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_vendor_code").val(0)}).blur(function(){var e=$("#billing_vendor_code").val();0==e&&($(this).val(""))});



        $("#cost_unit_name").marcoPolo({url:"{{ route('units.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#cost_unit_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cost_unit_name_img").removeClass("img-none").addClass("img-display"),$("#cost_unit_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cost_unit_name_img").removeClass("img-display").addClass("img-none"),$("#cost_unit_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cost_unit_id").val(0)}).blur(function(){var e=$("#cost_unit_id").val();0==e&&($(this).val(""))});


        $("#transportation_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#transportation_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_service_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_service_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_service_id").val(0)}).blur(function(){var e=$("#transportation_service_id").val();0==e&&($(this).val(""))});


        $("#location_service_name").marcoPolo({url:"{{ route('services.autocomplete') }}",formatItem:function(e,o){return e.name},onSelect:function(e,o){$("#location_service_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#location_service_name_img").removeClass("img-none").addClass("img-display"),$("#location_service_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#location_service_name_img").removeClass("img-display").addClass("img-none"),$("#location_service_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#location_service_id").val(0)}).blur(function(){var e=$("#location_service_id").val();0==e&&($(this).val(""))});


        $("#transportation_loading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_loading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_loading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_loading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_loading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_loading_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_loading_location_id").val(0)}).blur(function(){var e=$("#transportation_loading_location_id").val();0==e&&($(this).val(""))});


        $("#transportation_unloading_location_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#transportation_unloading_location_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#transportation_unloading_location_name_img").removeClass("img-none").addClass("img-display"),$("#transportation_unloading_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_unloading_location_name_img").removeClass("img-display").addClass("img-none"),$("#transportation_unloading_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_unloading_location_id").val(0)}).blur(function(){var e=$("#transportation_loading_location_id").val();0==e&&($(this).val(""))});


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
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_carrier_id").val(0)}).blur(function(){var e=$("#transportation_carrier_id").val();0==e&&($(this).val(""))});

    $("#origin_from_type").change(function () {
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
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_shipper_id").val(0)}).blur(function(){var e=$("#origin_from_shipper_id").val();0==e&&($(this).val(""))});
    });


        $("#origin_from_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_state_id").val(0)}).blur(function(){var e=$("#origin_from_state_id").val();0==e&&$(this).val("")})



        $("#origin_from_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_from_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_from_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_from_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_from_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_country_id").val(0)}).blur(function(){var e=$("#origin_from_country_id").val();0==e&&($(this).val(""))});


        $("#origin_from_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_from_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_from_city").val(e.name),$("#origin_from_state_id").val(e.state_id),$("#origin_from_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_from_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_from_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_from_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_from_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_from_zip_code_id").val(0)}).blur(function(){var e=$("#origin_from_zip_code_id").val();0==e&&($(this).val(""),$("#origin_from_city").val(""),$("#origin_from_state_id").val(0),$("#origin_from_state_name").val(""))})



    $("#origin_to_type").change(function () {
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
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_consignee_id").val(0)}).blur(function(){var e=$("#origin_to_consignee_id").val();0==e&&($(this).val(""))});
    });


        $("#origin_to_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_state_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_state_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_state_id").val(0)}).blur(function(){var e=$("#origin_to_state_id").val();0==e&&$(this).val("")})



        $("#origin_to_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#origin_to_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#origin_to_country_name_img").removeClass("img-none").addClass("img-display"),$("#origin_to_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_country_name_img").removeClass("img-display").addClass("img-none"),$("#origin_to_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_country_id").val(0)}).blur(function(){var e=$("#origin_to_country_id").val();0==e&&($(this).val(""))});



        $("#origin_to_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#origin_to_zip_code_id").val(e.id),$(this).val(e.code),$("#origin_to_city").val(e.name),$("#origin_to_state_id").val(e.state_id),$("#origin_to_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#origin_to_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#origin_to_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#origin_to_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#origin_to_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#origin_to_zip_code_id").val(0)}).blur(function(){var e=$("#origin_to_zip_code_id").val();0==e&&($(this).val(""),$("#origin_to_city").val(""),$("#origin_to_state_id").val(0),$("#origin_to_state_name").val(""))});


        $("#eei_info_hts_name").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#eei_info_hts_id").val(e.id),$(this).val(e.id), $("#eei_info_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#eei_info_hts_name_img").removeClass("img-none").addClass("img-display"),$("#eei_info_hts_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_hts_name_img").removeClass("img-display").addClass("img-none"),$("#eei_info_hts_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#eei_info_hts_id").val(0)}).blur(function(){var e=$("#eei_info_hts_id").val();0==e&&$(this).val("")});

        $("#transportation_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#transportation_billing_id").val(e.id),$(this).val(e.id), $("#transportation_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#transportation_billing_code_img").removeClass("img-none").addClass("img-display"),$("#transportation_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#transportation_billing_code_img").removeClass("img-display").addClass("img-none"),$("#transportation_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#transportation_billing_code").val(0)}).blur(function(){var e=$("#transportation_billing_code").val();0==e&&$(this).val("")})

        $("#vehicle_eei_info_hts_code").marcoPolo({url:"{{ route('harmonized_codes.autocomplete') }}",formatItem:function(e,o){return e.id + ' ' + e.value},onSelect:function(e,o){$("#vehicle_eei_info_hts_id").val(e.id),$(this).val(e.id), $("#vehicle_eei_info_hts_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_hts_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_hts_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_hts_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_hts_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_eei_info_hts_id").val(0)}).blur(function(){var e=$("#vehicle_eei_info_hts_id").val();0==e&&$(this).val("")});



        $("#vehicle_eei_info_scheduleb_code").marcoPolo({url:"{{ route('schedule_bs.autocomplete') }}",formatItem:function(e,o){return e.code +' '+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_scheduleb_id").val(e.code),$(this).val(e.code), $("#vehicle_eei_info_scheduleb_description").val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_scheduleb_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_scheduleb_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_scheduleb_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_scheduleb_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_eei_info_scheduleb_id").val(0)}).blur(function(){var e=$("#vehicle_eei_info_scheduleb_id").val();0==e&&$(this).val("")})


        $("#billing_billing_code").marcoPolo({url:"{{ route('billing_codes.autocomplete') }}",formatItem:function(e,o){return e.id + '|'+ e.value},onSelect:function(e,o){$("#billing_billing_id").val(e.id),$(this).val(e.id), $("#billing_billing_description").val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#billing_billing_code_img").removeClass("img-none").addClass("img-display"),$("#billing_billing_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#billing_billing_code_img").removeClass("img-display").addClass("img-none"),$("#billing_billing_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#billing_billing_id").val(0)}).blur(function(){var e=$("#billing_billing_id").val();0==e&&$(this).val("")})



        $("#vehicle_cargo_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#vehicle_cargo_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_cargo_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_cargo_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_cargo_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_cargo_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_cargo_type_id").val(0)}).blur(function(){var e=$("#vehicle_cargo_type_id").val();0==e&&$(this).val("")})



        $("#vehicle_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_location_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_location_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_location_id").val(0)}).blur(function(){var e=$("#vehicle_location_id").val();0==e&&$(this).val("")})


    $("#vehicle_location_bin_name").focus(function () {
        $("#vehicle_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&($("#vehicle_location_bin_id").val(0))})
    });


        $("#vehicle_state_province_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#vehicle_state_province_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#vehicle_state_province_name_img").removeClass("img-none").addClass("img-display"),$("#vehicle_state_province_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_state_province_name_img").removeClass("img-display").addClass("img-none"),$("#vehicle_state_province_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_sate_province_id").val(0)}).blur(function(){var e=$("#vehicle_sate_province_id").val();0==e&&$(this).val("")})

    $("currency_type").on('change',(function(){
        ($("#currency_type").val()== "USD") ? $("#third_value").val(1.00): $("#third_value").val(1.15);
        }));


        $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},
            selected:{
             id: '{{ (isset($order_entry) ? $order_entry->equipment_type_id : "") }}',
             code: '{{ ((isset($order_entry) and ($order_entry->equipment_type_id > 0 )) ? $order_entry->equipment_type->code : "") }}'
            }
                ,onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#equipment_type_id").val(0)}).blur(function(){var e=$("#equipment_type_id").val();0==e&&$(this).val("")})


        $("#eei_info_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#eei_info_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_export_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_export_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_export_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#eei_info_export_id").val(0)}).blur(function(){var e=$("#eei_info_export_id").val();0==e&&$(this).val("")})


        $("#eei_info_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#eei_info_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#eei_info_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#eei_info_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#eei_info_license_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#eei_info_license_type_id").val(0)}).blur(function(){var e=$("#eei_info_license_type_id").val();0==e&&$(this).val("")})


        $("#container_equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},onSelect:function(e,o){$("#container_equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#container_equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#container_equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#container_equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_equipment_type_id").val(0)}).blur(function(){var e=$("#container_equipment_type_id").val();0==e&&$(this).val("")})


        $("#vehicle_eei_info_export_code").marcoPolo({url:"{{ route('export_codes.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_export_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#eei_info_export_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_export_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_export_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_export_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_eei_info_export_id").val(0)}).blur(function(){var e=$("#vehicle_eei_info_export_id").val();0==e&&$(this).val("")})


        $("#vehicle_eei_info_license_type_code").marcoPolo({url:"{{ route('license_types.autocomplete') }}",formatItem:function(e,o){return e.id +'|'+ e.value},onSelect:function(e,o){$("#vehicle_eei_info_license_type_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#vehicle_eei_info_license_type_code_img").removeClass("img-none").addClass("img-display"),$("#vehicle_eei_info_license_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#vehicle_eei_info_license_type_code_img").removeClass("img-display").addClass("img-none"),$("#vehicle_eei_info_license_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#vehicle_eei_info_license_type_id").val(0)}).blur(function(){var e=$("#vehicle_eei_info_license_type_id").val();0==e&&$(this).val("")})



        $("#warehouse_name").marcoPolo({url:"{{ route('warehouses.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
            id: '{{ (isset($order_entry) ? $order_entry->warehouse_id : "") }}',
            name: '{{ ((isset($order_entry) and ($order_entry->warehouse_id)) ? $order_entry->warehouse->name : "") }}'
        },onSelect:function(e,o){$("#warehouse_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_id").val(0)}).blur(function(){var e=$("#warehouse_id").val();0==e&&$(this).val("")})


    $("#pick_search_for_name").focus(function () {
        var  type= $("#pick_search_type").val();  $("#pick_search_for_name").marcoPolo({url:"{{ route('receipts_entries.autocomplete') }}",formatItem:function(e,o){return e.value +'|'+ e.date_in +'|'+ e.division_name + '|' + e.shipper_name + '|' + e.consignee_name + '|'+ e.third_party_name + '|' + e.agent_name},
            onSelect:function(e,o)
            {var r=$("#pick_cargo_details tbody tr").length + 1,  n = $("#pick_cargo_details"),
                    t = n.find("tbody"),
                    p = $("<tr id=" + r + " >");
                    $("#pick_search_for_id").val(e.id),
                    $(this).val(e.value),
                    p.append(createTableContent('pick_details_line', r, true, r))
                    .append("<td><input type='checkbox' name='pick_select[]' id='pick_select' value='" + e.id + "'></td>")
                    .append(createTableContent('pick_wr_number', e.value , false,r ))
                    .append(createTableContent('pick_date_in', e.date_in , false, r))
                    .append(createTableContent('pick_shipper_name', e.shipper_name , false, r))
                    .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
                    .append(createTableContent('pick_qty',e.quantity , false, r))
                    .append(createTableContent('pick_weight', e.sum_weight , false, r))
                    .append(createTableContent('pick_cubic', e.sum_cubic, false, r))
                    .append(createTableContent('pick_pieces', e.pieces, true, r))
                    .append(createTableContent('pick_service_id', e.service_id , true, r))
                    .append(createTableContent('pick_service_name', e.service_name , false, r))
                    .append(createTableContent('pick_service_name', e.id , false, r))
                    t.append(p);
                values_pick_cargo();

        },minChars:3, data: {
            "type_for": type,
        },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).on("marcopoloblur",function(){""==$(this).val().trim()&&$("#pick_search_for_id").val(0)})
   });

$("#pickup_type").val('{{ ( isset($order_entry)? $order_entry->pickup_type : "") }}').change();
$("#delivery_type").val('{{ ( isset($order_entry)? $order_entry->delivery_type : "") }}').change();

    </script>