<script type="text/javascript">
    function container_detail () {
        var r=$("#load_warehouse_details tbody tr").length + 1,
            n = $("#load_warehouse_details"),
            type_for = $("#pick_search_type").val(),
            t = n.find("tbody"),
            x = 0,
            id = $("#pick_search_for_id").val();
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
                        .append(createTableContent('pick_shipper_address', e[x].shipper_address , true, r))
                        .append(createTableContent('pick_shipper_city', e[x].shipper_city, true, r))
                        .append(createTableContent('pick_shipper_state_id', e[x].shipper_state_id, true, r))
                        .append(createTableContent('pick_shipper_state_name', e[x].shipper_state_name , true, r))
                        .append(createTableContent('pick_shipper_zip_code_id', e[x].shipper_zip_code_id, true, r))
                        .append(createTableContent('pick_shipper_zip_code_code', e[x].shipper_zip_code_code, true, r))
                        .append(createTableContent('pick_shipper_phone', e[x].shipper_phone, true, r))
                        .append(createTableContent('pick_shipper_fax', e[x].shipper_fax, true, r))
                        .append(createTableContent('pick_consignee_id', e[x].consignee_id, true, r))
                        .append(createTableContent('pick_consignee_name', e[x].consignee_name , false, r))
                        .append(createTableContent('pick_consignee_address', e[x].consignee_address, true, r))
                        .append(createTableContent('pick_consignee_city', e[x].consignee_city, true, r))
                        .append(createTableContent('pick_consignee_state_id', e[x].consignee_state_id, true, r))
                        .append(createTableContent('pick_consignee_state_name', e[x].consignee_state_name , true, r))
                        .append(createTableContent('pick_consignee_zip_code_id', e[x].consignee_zip_code_id, true, r))
                        .append(createTableContent('pick_consignee_zip_code_code', e[x].consignee_zip_code_code, true, r))
                        .append(createTableContent('pick_consignee_phone', e[x].consignee_phone, true, r))
                        .append(createTableContent('pick_consignee_fax', e[x].consignee_fax, true, r))
                        .append(createTableContent('pick_destination_name', e[x].destination_name , true, r))
                        .append(createTableContent('pick_quantity',e[x].quantity , false, r))
                        .append(createTableContent('pick_weight', e[x].sum_weight , false, r))
                        .append(createTableContent('pick_cubic', e[x].sum_cubic, false, r))
                        .append(createTableContent('pick_unit', '' , true, r))
                        .append(createTableContent('pick_status', e[x].status, true, r))
                        .append(createTableContent('pick_service_name', e[x].service_name , true, r))
                        .append(createTableContent('pick_service_id', e[x].service_id , true, r))
                        .append(createTableContent('pick_volume_weight', e[x].volume_weight, true, r))
                        .append(createTableContent('pick_warehouse_id', e[x].warehouse_id, true, r))
                        .append(createTableContent('pick_warehouse_name', e[x].warehouse_name, true, r));
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
               container_detail();
               warehouse_details();

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
/*
$("#pick_search_for_name").focus(function () {
var  type= $("#pick_search_type").val();  $("#pick_search_for_name").marcoPolo({url:"{{ route('receipts_entries.autocomplete') }}",formatItem:function(e,o){return e.value +'|'+ e.date_in + '|' + e.shipper_name + '|' + e.consignee_name},
onSelect:function(e,o)
{var r=$("#load_warehouse_details tbody tr").length + 1,  n = $("#load_warehouse_details"),
        t = n.find("tbody"),
        p = $("<tr id=" + r + " data-toggle = collapse data-target= ."+ r +">");
        $("#pick_search_for_id").val(e.id),
                    $(this).val(e.value),
        p.append(createTableContent('pick_details_line', r, true, r))
        .append(createTableContent('pick_wr_id', e.id, true, r))
        .append("<td><input type='checkbox' name='pick_select[]' id='pick_select' value='" + e.id + "'></td>")
        .append(createTableContent('pick_wr_number', e.value , false,r ))
        .append(createTableContent('pick_date_in', e.date_in , false, r))
        .append(createTableContent('pick_shipper_id', e.shipper_id, true, r))
        .append(createTableContent('pick_shipper_name', e.shipper_name , false, r))
        .append(createTableContent('pick_shipper_address', e.shipper_address , true, r))
        .append(createTableContent('pick_shipper_city', e.shipper_city, true, r))
        .append(createTableContent('pick_shipper_state_id', e.shipper_state_id, true, r))
        .append(createTableContent('pick_shipper_state_name', e.shipper_state_name , true, r))
        .append(createTableContent('pick_shipper_zip_code_id', e.shipper_zip_code_id, true, r))
        .append(createTableContent('pick_shipper_zip_code_code', e.shipper_zip_code_code, true, r))
        .append(createTableContent('pick_shipper_phone', e.shipper_phone, true, r))
        .append(createTableContent('pick_shipper_fax', e.shipper_fax, true, r))

        .append(createTableContent('pick_consignee_id', e.consignee_id, true, r))
        .append(createTableContent('pick_consignee_name', e.consignee_name , false, r))
        .append(createTableContent('pick_consignee_address', e.consignee_address, true, r))
        .append(createTableContent('pick_consignee_city', e.consignee_city, true, r))
        .append(createTableContent('pick_consignee_state_id', e.consignee_state_id, true, r))
        .append(createTableContent('pick_consignee_state_name', e.consignee_state_name , true, r))
        .append(createTableContent('pick_consignee_zip_code_id', e.consignee_zip_code_id, true, r))
        .append(createTableContent('pick_consignee_zip_code_code', e.consignee_zip_code_code, true, r))
        .append(createTableContent('pick_consignee_phone', e.consignee_phone, true, r))
        .append(createTableContent('pick_consignee_fax', e.consignee_fax, true, r))

        .append(createTableContent('pick_destination_name', e.destination_name , true, r))
        .append(createTableContent('pick_quantity',e.quantity , false, r))
        .append(createTableContent('pick_weight', e.sum_weight , false, r))
        .append(createTableContent('pick_cubic', e.sum_cubic, false, r))
        .append(createTableContent('pick_unit', '' , true, r))
        .append(createTableContent('pick_status', e.status, true, r))
        .append(createTableContent('pick_service_name', e.service_name , true, r))
        .append(createTableContent('pick_service_id', e.service_id , true, r))
        .append(createTableContent('pick_volume_weight', e.volume_weight, true, r))
        .append(createTableContent('pick_warehouse_id', e.warehouse_id, true, r))
        .append(createTableContent('pick_warehouse_name', e.warehouse_name, true, r))
        t.append(p);
    warehouse_details();

    },minChars:3, data: {
    "type_for": type,
    },param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#pick_search_for_name_img").removeClass("img-none").addClass("img-display"),$("#pick_search_for_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#pick_search_for_name_img").removeClass("img-display").addClass("img-none"),$("#pick_search_for_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#pick_search_for_id").val(0)}).blur(function(){var e=$("#pick_search_for_id").val(); 0 == e && ($(this).val(""))});
    });
*/

    $("#hazardous_uns_code").marcoPolo({url:"{{ route('uns_codes.autocomplete') }}",formatItem:function(e,o){return e.code+' | '+e.name},onSelect:function(e,o){$("#hazardous_uns_id").val(e.id),$(this).val(e.code),$('#hazardous_uns_desc').val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#hazardous_uns_code_img").removeClass("img-none").addClass("img-display"),$("#hazardous_uns_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#hazardous_uns_code_img").removeClass("img-display").addClass("img-none"),$("#hazardous_uns_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#hazardous_uns_id").val(0)}).blur(function(){var e=$("#hazardous_uns_id").val(); 0 == e && ($(this).val(""))});



    $("#warehouse_code").marcoPolo({url:"{{ route('warehouses.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
    id:'{{ (isset($cargo_loader )? $cargo_loader->warehouse_id:"") }}',
    name:'{{ ((isset($cargo_loader ) and ($cargo_loader->warehouse_id > 0 ))? $cargo_loader->warehouse_id:"") }}',
    },onSelect:function(e,o){$("#warehouse_id").val(e.id),$(this).val(e.name)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#warehouse_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_id").val(0)}).blur(function(){var e=$("#warehouse_id").val(); 0 == e && ($(this).val(""))});


    $("#equipment_type_code").marcoPolo({url:"{{ route('cargo_types.autocomplete') }}",formatItem:function(e,o){return e.code},selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->equipment_type_id : "") }}',
        code: '{{ ((isset($cargo_loader) and ($cargo_loader->equipment_type_id > 0)) ? $cargo_loader->equipment_type->code : "") }}',
    },onSelect:function(e,o){$("#equipment_type_id").val(e.id),$(this).val(e.code)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#equipment_type_code_img").removeClass("img-none").addClass("img-display"),$("#equipment_type_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#equipment_type_code_img").removeClass("img-display").addClass("img-none"),$("#equipment_type_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#equipment_type_id").val(0)}).blur(function(){var e=$("#equipment_type_id").val(); 0 == e && ($(this).val(""))});


    $("#shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},
        selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_id : "") }}',
        value: '{{ ((isset($cargo_loader) and ($cargo_loader->shipper_id > 0)) ? $cargo_loader->shipper->name : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', (isset($cargo_loader) ? $cargo_loader->shipper_address : ""))) }}',
        city: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_city : "" ) }}',
        state_id: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_state_id : "") }}',
        state_name: '{{ ((isset($cargo_loader) and ($cargo_loader->shipper_state_id > 0)) ? $cargo_loader->shipper_state->name : "") }}',
        country_id: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_country_id : "") }}',
        country_name: '{{ ((isset($cargo_loader) and ($cargo_loader->shipper_country_id > 0)) ? $cargo_loader->shipper_country->name : "") }}',
        zip_code_id: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_zip_code_id : "") }}',
        zip_code_code: '{{ ((isset($cargo_loader) and ($cargo_loader->shipper_zip_code_id > 0)) ? $cargo_loader->shipper_zip_code->code : "") }}',
        phone: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_phone : "") }}',
        fax: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_fax : "") }}',
        },onSelect:function(e,o){$("#shipper_id").val(e.id),$(this).val(e.value),$("#shipper_address").val(e.address),$("#shipper_city").val(e.city),$("#shipper_country_id").val(e.country_id),$("#shipper_country_name").val(e.country_name), $("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name),$("#shipper_zip_code_id").val(e.zip_code_id),$("#shipper_zip_code_code").val(e.zip_code_code),$("#shipper_phone").val(e.phone),$("#shipper_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_id").val(0)}).blur(function(){var e=$("#shipper_id").val(); 0 == e && ($(this).val(""),$("#shipper_id").val(0),$("#shipper_address").val(""),$("#shipper_city").val(""),$("#shipper_state_id").val(""),$("#shipper_state_name").val(""),$("#shipper_country_id").val(""),$("#shipper_country_name").val(""),$("#shipper_zip_code_id").val(""),$("#shipper_zip_code_code").val(""),$("#shipper_phone").val(""),$("#shipper_fax").val(""))});



    $("#consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_id : "") }}',
        value: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_id > 0)) ? $cargo_loader->consignee->name : "") }}',
        state_id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_state_id : "") }}',
        state_name: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_state_id > 0)) ? $cargo_loader->consignee_state->name : "") }}',
        country_id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_country_id : "") }}',
        country_name: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_country_id > 0)) ? $cargo_loader->consignee_country->name : "") }}',
        zip_code_id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_zip_code_id : "") }}',
        zip_code_code: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_zip_code_id > 0)) ? $cargo_loader->consignee_zip_code->code : "") }}',
        phone: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_phone : "") }}',
        fax: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_fax : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($cargo_loader) ? $cargo_loader->consignee_address : ""))) }}',

    },onSelect:function(e,o){$("#consignee_id").val(e.id),$(this).val(e.value),$("#consignee_address").val(e.address),$("#consignee_city").val(e.city),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name),$("#consignee_country_id").val(e.country_id),$("#consignee_country_name").val(e.country_name),$("#consignee_zip_code_id").val(e.zip_code_id),$("#consignee_zip_code_code").val(e.zip_code_code),$("#consignee_phone").val(e.phone),$("#consignee_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_name_spn").removeClass("img-display").addClass("img-none")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_id").val(0)}).blur(function(){var e=$("#consignee_id").val(); 0 == e && ($(this).val(""),$("#consignee_id").val(0),$("#consignee_address").val(""),$("#consignee_city").val(""),$("#consignee_state_id").val(""),$("#consignee_state_name").val(""),$("#consignee_zip_code_id").val(""),$("#consignee_zip_code_code").val(""),$("#consignee_phone").val(""),$("#consignee_fax").val(""))});


    $("#notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->notify_id : "") }}',
        value: '{{ ((isset($cargo_loader) and ($cargo_loader->notify_id > 0)) ? $cargo_loader->notify->name : "") }}',
        state_id: '{{ (isset($cargo_loader) ? $cargo_loader->notify_state_id : "") }}',
        state_name: '{{ ((isset($cargo_loader) and ($cargo_loader->notify_state_id > 0)) ? $cargo_loader->notify_state->name : "") }}',
        country_id: '{{ (isset($cargo_loader) ? $cargo_loader->notify_country_id : "") }}',
        country_name: '{{ ((isset($cargo_loader) and ($cargo_loader->notify_country_id > 0)) ? $cargo_loader->notify_country->name : "") }}',
        zip_code_id: '{{ (isset($cargo_loader) ? $cargo_loader->notify_zip_code_id : "") }}',
        zip_code_code: '{{ ((isset($cargo_loader) and ($cargo_loader->notify_zip_code_id > 0)) ? $cargo_loader->notify_zip_code->code : "") }}',
        phone: '{{ (isset($cargo_loader) ? $cargo_loader->notify_phone : "") }}',
        fax: '{{ (isset($cargo_loader) ? $cargo_loader->notify_fax : "") }}',
        address: '{{ trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',(isset($cargo_loader) ? $cargo_loader->notify_address : ""))) }}',
    },onSelect:function(e,o){$("#notify_id").val(e.id),$(this).val(e.value),$("#notify_address").val(e.address),$("#notify_city").val(e.city),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name), $("#notify_country_id").val(e.country_id),$("#notify_country_name").val(e.country_name), $("#notify_zip_code_id").val(e.zip_code_id),$("#notify_zip_code_code").val(e.zip_code_code),$("#notify_phone").val(e.phone),$("#notify_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_name_img").removeClass("img-none").addClass("img-display"),$("#notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_name_img").removeClass("img-display").addClass("img-none"),$("#notify_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_id").val(0)}).blur(function(){var e=$("#notify_id").val(); 0 == e && ($(this).val(""),$("#notify_id").val(0),$("#notify_address").val(""),$("#notify_city").val(""),$("#notify_state_id").val(""),$("#notify_state_name").val(""),$("#notify_zip_code_id").val(""),$("#notify_zip_code_code").val(""),$("#notify_phone").val(""),$("#notify_fax").val(""))});



    $("#shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->shipper_state_id : "") }}',
        value: '{{ ((isset($cargo_loader) and ($cargo_loader->shipper_state_id > 0 )) ? $cargo_loader->shipper_state->name : "") }}',
    },onSelect:function(e,o){$("#shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_state_id").val(0)}).blur(function(){var e=$("#shipper_state_id").val();0==e&&$(this).val("")});


    $("#consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected: {
        id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_state_id : "") }}',
        value: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_state_id > 0)) ? $cargo_loader->consignee_state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_state_id").val(0)}).blur(function(){var e=$("#consignee_state_id").val();0==e&&$(this).val("")});



    $("#notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->notify_state_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->notify_state_id > 0)) ? $cargo_loader->notify_state->name : "") }}',
    },onSelect:function(e,o){$("#notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_state_id").val(0)}).blur(function(){var e=$("#notify_state_id").val();0==e&&$(this).val("")});


    $("#shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->shipper_zip_code_id : "") }}',
        code:'{{ ((isset($cargo_loader) and ($cargo_loader->shipper_zip_code_id > 0)) ? $cargo_loader->shipper_zip_code->code : "") }}',
        name:'{{ (isset($cargo_loader) ? $cargo_loader->shipper_city : "") }}',
        state_id:'{{ ((isset($cargo_loader) and ($cargo_loader->shipper_zip_code_id > 0)) ? $cargo_loader->shipper_zip_code->state_id : "") }}',
        state_name:'{{ ((isset($cargo_loader) and ($cargo_loader->shipper_zip_code_id > 0)) ? $cargo_loader->shipper_zip_code->state->name : "") }}',
    }, onSelect:function(e,o){$("#shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#shipper_city").val(e.name),$("#shipper_state_id").val(e.state_id),$("#shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_zip_code_id").val(0)}).blur(function(){var e=$("#shipper_zip_code_id").val();0==e&&($(this).val(""),$("#shipper_state_id").val(0),$("#shipper_state_name").val(""))});


    $("#consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
        id: '{{ (isset($cargo_loader) ? $cargo_loader->consignee_zip_code_id : "") }}',
        code: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_zip_code_id > 0)) ? $cargo_loader->consignee_zip_code->code : "") }}',
        name: '{{ (isset($cargo_loader)? $cargo_loader->consignee_city : "") }}',
        state_id: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_zip_code_id > 0)) ? $cargo_loader->consignee_zip_code->state_id : "") }}',
        state_name: '{{ ((isset($cargo_loader) and ($cargo_loader->consignee_zip_code_id > 0)) ? $cargo_loader->consignee_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#consignee_city").val(e.name),$("#consignee_state_id").val(e.state_id),$("#consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_zip_code_id").val(0)}).blur(function(){var e=$("#consignee_zip_code_id").val();0==e&&($(this).val(""),$("#consignee_state_id").val(0),$("#consignee_state_name").val(""))});


    $("#notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},selected:{
        id: ' {{ (isset($cargo_loader) ? $cargo_loader->notify_zip_code_id : "" ) }}',
        code: ' {{ ((isset($cargo_loader) and ($cargo_loader->notify_zip_code_id > 0))? $cargo_loader->notify_zip_code->code : "") }}',
        name: ' {{ (isset($cargo_loader)? $cargo_loader->notify_city : "") }}',
        state_id: ' {{ ((isset($cargo_loader) and ($cargo_loader->notify_zip_code_id > 0))? $cargo_loader->notify_zip_code->state_id : "") }}',
        state_name: ' {{ ((isset($cargo_loader) and ($cargo_loader->notify_zip_code_id > 0))? $cargo_loader->notify_zip_code->state->name : "") }}',
    },onSelect:function(e,o){$("#notify_zip_code_id").val(e.id),$(this).val(e.code),$("#notify_city").val(e.name),$("#notify_state_id").val(e.state_id),$("#notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_zip_code_id").val(0)}).blur(function(){var e=$("#notify_zip_code_id").val();0==e&&($(this).val(""),$("#notify_state_id").val(0),$("#notify_state_name").val(""))});

$("#carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},selected:{
    id: '{{ (isset($cargo_loader) ? $cargo_loader->carrier_id : "") }}',
    name: '{{ ((isset($cargo_loader) and ($cargo_loader->carrier_id > 0)) ? $cargo_loader->carrier->name : "") }}',
},onSelect: function(e, o) {$("#carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#carrier_name_img").removeClass("img-none").addClass("img-display"), $("#carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#carrier_name_img").removeClass("img-display").addClass("img-none"), $("#carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#carrier_id").val(0)}).blur(function(){var e=$("#carrier_id").val();0==e&&($(this).val(""))});

$("#inland_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return  e.name},selected:{
    id:'{{ (isset($cargo_loader) ? $cargo_loader->inland_carrier_id : "") }}',
    name:'{{ ((isset($cargo_loader) and ($cargo_loader->inland_carrier_id > 0)) ? $cargo_loader->inland_carrier->name : "") }}',
},onSelect: function(e, o) {$("#inland_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#inland_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#inland_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#inland_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#inland_carrier_id").val(0)}).blur(function(){var e=$("#inland_carrier_id").val();0==e&&($(this).val(""))});


$("#inland_driver_name").marcoPolo({url: "{{ route('drivers.autocomplete') }}",formatItem: function(e, o) {return  e.name},selected: {
        id:'{{ (isset($cargo_loader) ? $cargo_loader->inland_driver_id : "") }}',
        name:'{{ ((isset($cargo_loader) and ($cargo_loader->inland_driver_id )) ? $cargo_loader->inland_driver->name : "") }}',
        license:'{{ ((isset($cargo_loader) and ($cargo_loader->inland_driver_id )) ? $cargo_loader->inland_driver->driver_license : "") }}',
},onSelect: function(e, o) {$("#inland_driver_id").val(e.id), $(this).val(e.name), $("#inland_lic_number").val(e.license)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#inland_driver_name_img").removeClass("img-none").addClass("img-display"), $("#inland_driver_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#inland_driver_name_img").removeClass("img-display").addClass("img-none"), $("#inland_driver_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#inland_driver_id").val(0)}).blur(function(){var e=$("#inland_driver_id").val();0==e&&($(this).val(""), $("#inland_lic_number").val(""))});


    $("#agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->agent_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->agent_id)) ? $cargo_loader->agent->name : "") }}',
        phone:'{{ ((isset($cargo_loader) and ($cargo_loader->agent_id)) ? $cargo_loader->agent->phone : "") }}',
        fax:'{{ ((isset($cargo_loader) and ($cargo_loader->agent_id)) ? $cargo_loader->agent->fax : "") }}',
    },onSelect:function(e,o){$("#agent_id").val(e.id),$(this).val(e.value),$("#agent_phone").val(e.phone),$("#agent_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#agent_name_img").removeClass("img-none").addClass("img-display"),$("#agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#agent_name_img").removeClass("img-display").addClass("img-none"),$("#agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#agent_id").val();0==e&&($(this).val(""), $("#agent_phone").val(""), $("#agent_fax").val(""))});


    $("#forwarding_agent_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->forwarding_agent_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->forwarding_agent_id > 0)) ? $cargo_loader->forwarding_agent->name : "") }}',
        phone:'{{ ((isset($cargo_loader) and ($cargo_loader->forwarding_agent_id > 0)) ? $cargo_loader->forwarding_agent->phone : "") }}',
        fax:'{{ ((isset($cargo_loader) and ($cargo_loader->forwarding_agent_id > 0)) ? $cargo_loader->forwarding_agent->fax : "") }}',
    },onSelect:function(e,o){$("#forwarding_agent_id").val(e.id),$(this).val(e.value),$("#forwarding_agent_phone").val(e.phone),$("#forwarding_agent_fax").val(e.fax)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#forwarding_agent_name_img").removeClass("img-none").addClass("img-display"),$("#forwarding_agent_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#forwarding_agent_name_img").removeClass("img-display").addClass("img-none"),$("#forwarding_agent_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#agent_id").val(0)}).blur(function(){var e=$("#forwarding_agent_id").val();0==e&&($(this).val(""), $("#forwarding_agent_phone").val(""), $("#agent_fax").val(""))});


    $("#place_receipt_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($cargo_loader)? $cargo_loader->place_receipt_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->place_receipt_id > 0))? $cargo_loader->receipt->name : "") }}',
    },onSelect:function(e,o){$("#place_receipt_id").val(e.id),$(this).val(e.value), $("#place_receipt").val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_receipt_name_img").removeClass("img-none").addClass("img-display"),$("#place_receipt_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_receipt_name_img").removeClass("img-display").addClass("img-none"),$("#place_receipt_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_receipt_id").val(0)}).blur(function(){var e=$("#place_receipt_id").val();0==e&&($(this).val(""))});


    $("#place_delivery_name").marcoPolo({url:"{{ route('world_locations.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->place_delivery_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->place_delivery_id > 0 )) ? $cargo_loader->delivery->name : "") }}',
            }
    ,onSelect:function(e,o){$("#place_delivery_id").val(e.id),$(this).val(e.value), $("#place_delivery").val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#place_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#place_delivery_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#place_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#place_delivery_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#place_delivery_id").val(0)}).blur(function(){var e=$("#place_delivery_id").val();0==e&&($(this).val(""))});


    $("#port_loading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
    id:'{{ (isset($cargo_loader) ? $cargo_loader->port_loading_id : "") }}',
    name:'{{ ((isset($cargo_loader) and ($cargo_loader->port_loading_id > 0)) ? $cargo_loader->loading->name : "") }}',
    },onSelect:function(e,o){$("#port_loading_id").val(e.id),$(this).val(e.name), $("#port_loading").val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_loading_name_img").removeClass("img-none").addClass("img-display"),$("#port_loading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_loading_name_img").removeClass("img-display").addClass("img-none"),$("#port_loading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_loading_id").val(0)}).blur(function(){var e=$("#port_loading_id").val();0==e&&($(this).val(""))});


    $("#port_unloading_name").marcoPolo({url:"{{ route('ocean_ports.autocomplete') }}",formatItem:function(e,o){return e.name},selected:{
        id:'{{ (isset($cargo_loader) ? $cargo_loader->port_unloading_id : "") }}',
        name:'{{ ((isset($cargo_loader) and ($cargo_loader->port_unloading_id > 0 )) ? $cargo_loader->unloading->name : "") }}',
    },onSelect:function(e,o){$("#port_unloading_id").val(e.id),$(this).val(e.name), $("#foreign_port").val(e.name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#port_unloading_name_img").removeClass("img-none").addClass("img-display"),$("#port_unloading_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#port_unloading_name_img").removeClass("img-display").addClass("img-none"),$("#port_unloading_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#port_unloading_id").val(0)}).blur(function(){var e=$("#port_unloading_id").val();0==e&&($(this).val(""))});

$("#division_name").marcoPolo({url:"{{ route('divisions.autocomplete') }}", formatItem:function(e,o){return e.value},selected:{
    id:' {{ (isset($cargo_loader) ? $cargo_loader->division_id : "") }}',
    name:' {{ ((isset($cargo_loader) and ($cargo_loader->division_id > 0)) ? $cargo_loader->division->name : "") }}',
},onSelect:function(e,o){$("#division_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term",required:!0}).on("marcopolorequestbefore",function(){$("#division_name_img").removeClass("img-none").addClass("img-display"), $("#division_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#division_name_img").removeClass("img-display").addClass("img-none"),$("#division_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#division_id").val(0)}).blur(function(){var e=$("#division_id").val();0==e&&($(this).val(""))});


    $("#shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
        id:'{{ (isset($cargo_loader)? $cargo_loader->shipper_country_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->shipper_country_id > 0))? $cargo_loader->shipper_country->name: "") }}',
    },onSelect:function(e,o){$("#shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#shipper_country_id").val(0)}).blur(function(){var e=$("#shipper_country_id").val();0==e&&($(this).val(""))});


    $("#consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value}, selected:{
        id:'{{ (isset($cargo_loader)? $cargo_loader->consignee_country_id : "") }}',
        value:'{{ ((isset($cargo_loader) and ($cargo_loader->consignee_country_id > 0))? $cargo_loader->consignee_country_id : "") }}',
    },onSelect:function(e,o){$("#consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#consignee_country_id").val(0)}).blur(function(){var e=$("#consignee_country_id").val();0==e&&($(this).val(""))});


    $("#notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},selected:{
     id:'{{ (isset($cargo_loader) ? $cargo_loader->notify_country_id : "") }}',
     value:'{{ ((isset($cargo_loader) and ($cargo_loader->notify_country_id)) ? $cargo_loader->notify_country->name : "") }}',
    },onSelect:function(e,o){$("#notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#notify_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#notify_country_id").val(0)}).blur(function(){var e=$("#notify_country_id").val();0==e&&($(this).val(""))});


    $("#cargo_location_name").marcoPolo({url:"{{ route('locations.autocomplete') }}",formatItem:function(e,o){return e.value}, onSelect:function(e,o){$("#cargo_location_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cargo_location_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cargo_location_id").val(0)}).blur(function(){var e=$("#cargo_location_id").val();0==e&&($(this).val(""))});


    $("#cargo_location_bin_name").marcoPolo({url:"{{ route('locations_bins.autocomplete') }}",formatItem:function(e,o){return e.value}, onSelect:function(e,o){$("#cargo_location_bin_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#cargo_location_bin_name_img").removeClass("img-none").addClass("img-display"),$("#cargo_location_bin_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#cargo_location_bin_name_img").removeClass("img-display").addClass("img-none"),$("#cargo_location_bin_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#cargo_location_bin_id").val(0)}).blur(function(){var e=$("#cargo_location_bin_id").val();0==e&&($(this).val(""))});


    $("#warehouse_shipper_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_country_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_country_id").val();0==e&&($(this).val(""))});


    $("#warehouse_consignee_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_country_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_country_id").val();0==e&&($(this).val(""))});


    $("#warehouse_notify_country_name").marcoPolo({url:"{{ route('countries.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_country_id").val(e.id),$(this).val(e.value)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_country_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_country_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_country_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_country_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_notify_country_id").val(0)}).blur(function(){var e=$("#warehouse_notify_country_id").val();0==e&&($(this).val(""))});

    $("#warehouse_shipper_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_id").val(e.id),$(this).val(e.value),$("#warehouse_shipper_address").val(e.address),$("#warehouse_shipper_city").val(e.city),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name),$("#warehouse_shipper_zip_code_id").val(e.zip_code_id),$("#warehouse_shipper_zip_code_code").val(e.zip_code_code),$("#warehouse_shipper_phone").val(e.phone),$("#warehouse_shipper_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_id").val();0==e&&($(this).val(""), $("#warehouse_shipper_id").val(0),$("#warehouse_shipper_address").val(""),$("#warehouse_shipper_city").val(""),$("#warehouse_shipper_state_id").val(""),$("#warehouse_shipper_state_name").val(""),$("#warehouse_shipper_zip_code_id").val(""),$("#warehouse_shipper_zip_code_code").val(""),$("#warehouse_shipper_phone").val(""),$("#warehouse_shipper_fax").val(""))});

    $("#warehouse_consignee_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_id").val(e.id),$(this).val(e.value),$("#warehouse_consignee_address").val(e.address),$("#warehouse_consignee_city").val(e.city),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name),$("#warehouse_consignee_zip_code_id").val(e.zip_code_id),$("#warehouse_consignee_zip_code_code").val(e.zip_code_code),$("#warehouse_consignee_phone").val(e.phone),$("#warehouse_consignee_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_id").val();0==e&&($(this).val(""), $("#warehouse_consignee_id").val(0),$("#warehouse_consignee_address").val(""),$("#warehouse_consignee_city").val(""),$("#warehouse_consignee_state_id").val(""),$("#warehouse_consignee_state_name").val(""),$("#warehouse_consignee_zip_code_id").val(""),$("#warehouse_consignee_zip_code_code").val(""),$("#warehouse_consignee_phone").val(""),$("#warehouse_consignee_fax").val(""))});



    $("#warehouse_notify_name").marcoPolo({url:"{{ route('customers.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_id").val(e.id),$(this).val(e.value),$("#warehouse_notify_address").val(e.address),$("#warehouse_notify_city").val(e.city),$("#warehouse_notify_state_id").val(e.state_id),$("#warehouse_notify_state_name").val(e.state_name),$("#warehouse_notify_zip_code_id").val(e.zip_code_id),$("#warehouse_notify_zip_code_code").val(e.zip_code_code),$("#warehouse_notify_phone").val(e.phone),$("#warehouse_notify_fax").val(e.fax)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_id").val();0==e&&($(this).val(""), $("#warehouse_notify_id").val(0),$("#warehouse_notify_address").val(""),$("#warehouse_notify_city").val(""),$("#warehouse_notify_state_id").val(""),$("#warehouse_notify_state_name").val(""),$("#warehouse_notify_zip_code_id").val(""),$("#warehouse_notify_zip_code_code").val(""),$("#warehouse_notify_phone").val(""),$("#warehouse_notify_fax").val(""))});



    $("#warehouse_shipper_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_shipper_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_state_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_state_id").val();0==e&&$(this).val("")});


    $("#warehouse_consignee_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_consignee_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_state_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_state_id").val();0==e&&$(this).val("")});


    $("#warehouse_notify_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#warehouse_notify_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_state_name_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_state_name_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_notify_state_id").val(0)}).blur(function(){var e=$("#warehouse_notify_state_id").val();0==e&&$(this).val("")});


    $("#warehouse_shipper_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_shipper_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_shipper_city").val(e.name),$("#warehouse_shipper_state_id").val(e.state_id),$("#warehouse_shipper_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_shipper_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_shipper_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_shipper_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_shipper_zip_code_id").val();0==e&&($(this).val(""), $("#warehouse_shipper_state_id").val(0),$("#warehouse_shipper_state_name").val(""))});


    $("#warehouse_consignee_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_consignee_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_consignee_city").val(e.name),$("#warehouse_consignee_state_id").val(e.state_id),$("#warehouse_consignee_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_consignee_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_consignee_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_consignee_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_consignee_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_consignee_state_id").val(0),$("#warehouse_consignee_state_name").val(""))});


    $("#warehouse_notify_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#warehouse_notify_zip_code_id").val(e.id),$(this).val(e.code),$("#warehouse_notify_city").val(e.name),$("#warehouse_notify_state_id").val(e.state_id),$("#warehouse_notify_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#warehouse_notify_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#warehouse_notify_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#warehouse_notify_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#warehouse_notify_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#warehouse_notify_zip_code_id").val(0)}).blur(function(){var e=$("#warehouse_notify_zip_code_id").val();0==e&&($(this).val(""),$("#warehouse_notify_city").val(""),$("#warehouse_notify_state_name").val(""))});



$("#container_carrier_name").marcoPolo({url: "{{ route('carriers.autocomplete') }}",formatItem: function(e, o) {return e.name},onSelect: function(e, o) {$("#container_carrier_id").val(e.id), $(this).val(e.name)},minChars: 3,param: "term"}).on("marcopolorequestbefore", function() {$("#container_carrier_name_img").removeClass("img-none").addClass("img-display"), $("#container_carrier_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter", function() {$("#container_carrier_name_img").removeClass("img-display").addClass("img-none"), $("#container_carrier_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_carrier_id").val(0)}).blur(function(){var e=$("#container_carrier_id").val();0==e&&($(this).val(""))});


    $("#container_pickup_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_pickup_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_state_id").val(0)}).blur(function(){var e=$("#container_pickup_state_id").val();0==e&&$(this).val("")});


    $("#container_delivery_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_delivery_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_state_id").val(0)}).blur(function(){var e=$("#container_delivery_state_id").val();0==e&&$(this).val("")});


    $("#container_drop_state_name").marcoPolo({url:"{{ route('states.autocomplete') }}",formatItem:function(e,o){return e.value},onSelect:function(e,o){$("#container_drop_state_id").val(e.id),$(this).val(e.value)},minChars:2,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_state_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_state_name_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_state_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_state_name_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_state_id").val(0)}).blur(function(){var e=$("#container_drop_state_id").val();0==e&&$(this).val("")});


    $("#container_pickup_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_pickup_zip_code_id").val(e.id),$(this).val(e.code),$("#container_pickup_city").val(e.name),$("#container_pickup_state_id").val(e.state_id),$("#container_pickup_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_pickup_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_pickup_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_zip_code_id").val(0)}).blur(function(){var e=$("#container_pickup_zip_code_id").val();0==e&&($(this).val(""),$("#container_pickup_state_id").val(0),$("#container_pickup_state_name").val(""))});



    $("#container_delivery_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_delivery_zip_code_id").val(e.id),$(this).val(e.code),$("#container_delivery_city").val(e.name),$("#container_delivery_state_id").val(e.state_id),$("#container_delivery_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_delivery_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_delivery_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_zip_code_id").val(0)}).blur(function(){var e=$("#container_delivery_zip_code_id").val();0==e&&($(this).val(""),$("#container_delivery_state_id").val(0),$("#container_delivery_state_name").val(""))});


    $("#container_drop_zip_code_code").marcoPolo({url:"{{ route('zip_codes.autocomplete') }}",formatItem:function(e,o){return e.code+" | "+e.name},onSelect:function(e,o){$("#container_drop_zip_code_id").val(e.id),$(this).val(e.code),$("#container_drop_city").val(e.name),$("#container_drop_state_id").val(e.state_id),$("#container_drop_state_name").val(e.state_name)},minChars:3,param:"term"}).on("marcopolorequestbefore",function(){$("#container_drop_zip_code_code_img").removeClass("img-none").addClass("img-display"),$("#container_drop_zip_code_code_spn").removeClass("img-display").addClass("img-none")}).on("marcopolorequestafter",function(){$("#container_drop_zip_code_code_img").removeClass("img-display").addClass("img-none"),$("#container_drop_zip_code_code_spn").removeClass("img-none").addClass("img-display")}).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_zip_code_id").val(0)}).blur(function(){var e=$("#container_drop_zip_code_id").val();0==e&&($(this).val(""),$("#container_drop_state_id").val(0),$("#container_drop_state_name").val(""))});

$("#container_pickup_type").change(function () {
    var url = $("#container_pickup_type").val() === '01' ? "{{ route('carriers.autocomplete') }}" : "{{ route('customers.autocomplete') }}" ;

    $("#container_pickup_name").marcoPolo({
        url:url,
        formatItem:function(e,o){
            return $("#container_pickup_type").val() === '01' ?  e.name : e.value ;
        },
        onSelect:function(e,o){
            var name = $("#container_pickup_type").val() === '01' ?  e.name :  e.value;
            $("#container_pickup_id").val(e.id), $(this).val(name),
                    $("#container_pickup_address").val(e.address),
                    $("#container_pickup_city").val(e.city),
                    $("#container_pickup_state_id").val(e.state_id),
                    $("#container_pickup_state_name").val(e.state_name),
                    $("#container_pickup_zip_code_id").val(e.zip_code_id),
                    $("#container_pickup_zip_code_code").val(e.zip_code_code)
        },
        minChars:3,
        param:"term",

    }).on("marcopolorequestbefore",function(){
        $("#container_pickup_name_img").removeClass("img-none").addClass("img-display"),$("#container_pickup_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter",function(){
        $("#container_pickup_name_img").removeClass("img-display").addClass("img-none"),$("#container_pickup_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_pickup_id").val(0)}).blur(function(){var e=$("#container_pickup_id").val();0==e&&($(this).val(""))});
});

$("#container_delivery_type").change(function () {
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
        param:"term"
    }).on("marcopolorequestbefore",function(){
        $("#container_delivery_name_img").removeClass("img-none").addClass("img-display"),$("#container_delivery_name_spn").removeClass("img-display").addClass("img-none")
    }).on("marcopolorequestafter",function(){
        $("#container_delivery_name_img").removeClass("img-display").addClass("img-none"),$("#container_delivery_name_spn").removeClass("img-none").addClass("img-display")
    }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_delivery_id").val(0)}).blur(function(){var e=$("#container_delivery_id").val();0==e&&($(this).val(""))});
});

    $("#container_drop_type").change(function () {
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
            param:"term"
        }).on("marcopolorequestbefore",function(){
            $("#container_drop_name_img").removeClass("img-none").addClass("img-display"),$("#container_drop_name_spn").removeClass("img-display").addClass("img-none")
        }).on("marcopolorequestafter",function(){
            $("#container_drop_name_img").removeClass("img-display").addClass("img-none"),$("#container_drop_name_spn").removeClass("img-none").addClass("img-display")
        }).keydown(function(e){var o=e.keyCode?e.keyCode:e.which;(8==o||46==o)&&$("#container_drop_id").val(0)}).blur(function(){var e=$("#container_drop_id").val();0==e&&($(this).val(""))});
    });
</script>