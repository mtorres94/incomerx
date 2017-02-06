<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
        renameTab();
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('receipts_entries.close') }}')

        if ($("#open_status").val() == "1") {
            disableFields('data');
        }

        var unique_str = $("#unique_str").val();
        openTab($("#data"));


        for (var t = $("#cargo-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {

            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {

            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        for (var t = $("#charges-tabs").find("div"), l = 0; l < t.length  ; l++) {
            var a = t[l];
            var e = $(a).attr("style");
            if (e === undefined) {

            } else {
                var n = e.indexOf("display: block;"),
                        o = e.indexOf("display: none;");
                $(a).removeAttr("style"), n >= 0 && $(a).attr("style", "display: block;"), o >= 0 && $(a).attr("style", "display: none;")
            }
        }

        function renameTab() {
            if ('edit' == '{{ \Request::segment(5) }}') {
                var gtab = window.parent.$('#tt');
                var htab = gtab.find('.tabs-header');
                var wtab = htab.find('.tabs-wrap');
                var ttab = wtab.find('.tabs');
                var stab = ttab.find('.tabs-selected');
                var itab = stab.find('.tabs-inner');
                var etab = itab.find('.tabs-title');
                var span = '{{ isset($receipt_entry) ? "Edit ".$receipt_entry->code : "New" }}';

                etab[1] = span
            }
        }

        $("#tmp_cargo_quantity").change(function () { calculate() });
        $("#tmp_cargo_length").change(function () { calculate() });
        $("#tmp_cargo_width").change(function () { calculate() });
        $("#tmp_cargo_height").change(function () { calculate() });
        $("#tmp_cargo_metric_unit_measurement_id").change(function () { calculate() });
        $("#tmp_cargo_weight_unit_measurement_id").change(function () { calculate() });
        $("#tmp_cargo_dim_fact").change(function () { calculate() });
        $("#tmp_cargo_unit_weight").change(function () { calculate() });

        $("#tmp_billing_quantity").change(function () { calculate_individual_charges() });
        $("#tmp_billing_rate").change(function () { calculate_individual_charges() });
        $("#tmp_billing_increase").change(function () { calculate_individual_charges() });
        $("#tmp_cost_quantity").change(function () { calculate_individual_charges() });
        $("#tmp_cost_rate").change(function () { calculate_individual_charges() });

        $("#tmp_billing_quantity").change(function () { calculate_individual_charges() });
        $("#tmp_billing_rate").change(function () { calculate_individual_charges() });
        $("#tmp_cost_quantity").change(function () { calculate_individual_charges() });
        $("#tmp_cost_rate").change(function () { calculate_individual_charges() });

        $("#multiline_cargo_quantity").change(function () { multiline_calculate() });
        $("#multiline_cargo_length").change(function () { multiline_calculate() });
        $("#multiline_cargo_width").change(function () { multiline_calculate() });
        $("#multiline_cargo_height").change(function () { multiline_calculate() });
        $("#multiline_cargo_metric_unit_measurement_id").change(function () { multiline_calculate() });
        $("#multiline_cargo_weight_unit_measurement_id").change(function () { multiline_calculate() });
        $("#multiline_cargo_dim_fact").change(function () { multiline_calculate() });
        $("#multiline_cargo_unit_weight").change(function () { multiline_calculate() });

        $.ajax({
            url: "{{ route('receipts_entries.get', !empty($unique_str) ? $unique_str : "_") }}",
            type: "GET",
            dataType: "json",
            async: true,
            success: function (rtn) {
                var _initialPreview = [];
                var _initialPreviewConfig = [];

                $.each(rtn.files, function (key, value) {
                    var tmp = {};
                    _initialPreview.push(value.route);

                    if (value.type == "pdf"  ||
                        value.type == "txt"  ||
                        value.type == "html" ||
                        value.type == "video")
                        tmp['type'] = (value.type) == "txt" ? "text" : value.type;
                    tmp['size'] = value.size;
                    tmp['caption'] = value.original_name;
                    tmp['url'] = "{{ route('receipts_entries.delete') }}";
                    tmp['key'] = value.key;
                    _initialPreviewConfig.push(tmp);
                });

                $("#file").fileinput({
                    fileActionSettings: {
                        removeIcon: '<i class="fa fa-trash-o text-danger" aria-hidden="true"></i>',
                        removeClass: 'btn btn-default',
                        zoomIcon: '<i class="fa fa-search-plus" aria-hidden="true"></i>',
                        zoomClass: 'btn btn-default',
                        uploadIcon: '<i class="fa fa-upload" aria-hidden="true"></i>',
                        uploadClass: 'btn btn-default',
                    },
                    /**otherActionButtons: '<button type="button" class="kv-file-download btn btn-default" title="Download file"><i class="fa fa-download" aria-hidden="true"></i></button>',*/
                    initialPreview: _initialPreview,
                    initialPreviewAsData: true,
                    initialPreviewFileType: 'image',
                    initialPreviewConfig: _initialPreviewConfig,
                    overwriteInitial: false,
                    uploadUrl: "{{ route('receipts_entries.upload') }}",
                    maxFilePreviewSize: 10240,
                    uploadExtraData: { _token: $('meta[name="csrf-token"]').attr('content'), unique_str: unique_str },
                    deleteExtraData: { _token: $('meta[name="csrf-token"]').attr('content') }
                });
            }
        });

        $("#tmp_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    var act = $("#tmp_cargo_type_code").val()
                    $("#tmp_cargo_type_code").val(e[0].code);
                    var flag = (act === e[0].code);
                    if (e[0].length > 0 || e[0].width > 0 || e[0].height > 0) {
                        if (!flag) {
                            swal({
                                title: "",
                                text: "Do you want to update the screen with the cargo type details?",
                                type: "question",
                                showCancelButton: true,
                                confirmButtonColor: "#3c8dbc",
                                confirmButtonText: "¡Yes, I want to update!",
                                cancelButtonText: "No...",
                                closeOnConfirm: false
                            }).then(function (isConfirm) {
                                if (isConfirm) {
                                    $("#tmp_cargo_length").val(e[0].length), $("#tmp_cargo_width").val(e[0].width), $("#tmp_cargo_height").val(e[0].height);
                                    calculate();
                                }
                            });
                        }
                    }
                }
            });
        });

        $("#multiline_cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    var act = $("#multiline_cargo_type_code").val()
                    $("#multiline_cargo_type_code").val(e[0].code);
                    var flag = (act === e[0].code);
                    if (e[0].length > 0 || e[0].width > 0 || e[0].height > 0) {
                        if (!flag) {
                            swal({
                                title: "",
                                text: "Do you want to update the screen with the cargo type details?",
                                type: "question",
                                showCancelButton: true,
                                confirmButtonColor: "#3c8dbc",
                                confirmButtonText: "¡Yes, I want to update!",
                                cancelButtonText: "No...",
                                closeOnConfirm: false
                            }).then(function (isConfirm) {
                                if (isConfirm) {
                                    $("#multiline_cargo_length").val(e[0].length), $("#multiline_cargo_width").val(e[0].width), $("#multiline_cargo_height").val(e[0].height);
                                    multiline_calculate();
                                }
                            })
                        }
                    }
                }
            });
        });
        //=================================================================
        $("#tmp_billing_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#tmp_billing_unit_name").val(e[0].code);

                }
            });
        });

        $("#tmp_cost_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#tmp_cost_unit_name").val(e[0].code);

                }
            });
        });

        $("#tmp_cargo_location_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('locations.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#tmp_cargo_location_name").val(e[0].code);

                }
            });
        });

        $("#tmp_cargo_location_bin_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('locations_bins.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#tmp_cargo_location_bin_name").val(e[0].code);

                }
            });
        });

        $("#multiline_cargo_location_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('locations.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#multiline_cargo_location_name").val(e[0].code);

                }
            });
        });

        $("#multiline_cargo_location_bin_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('locations_bins.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#multiline_cargo_location_bin_name").val(e[0].code);

                }
            });
        });

        $("#tmp_billing_bill_party").change(function () {
            var a= $("#tmp_billing_bill_party").val();
            switch(a){
                case "S":   $("#tmp_billing_customer_name").val( $("#shipper_name").val() );
                    $("#tmp_billing_customer_id").val( $("#shipper_id").val() ).change();
                    $("#tmp_billing_customer_name").attr("disabled", true);
                    break;

                case "C":   $("#tmp_billing_customer_name").val( $("#consignee_name").val() );
                    $("#tmp_billing_customer_id").val( $("#consignee_id").val() ).change();
                    $("#tmp_billing_customer_name").attr("disabled", true);
                    break;

                case "T":   $("#tmp_billing_customer_name").val( $("#third_party_name").val() );
                    $("#tmp_billing_customer_id").val( $("#third_party_id").val() ).change();
                    $("#tmp_billing_customer_name").attr("disabled", true);
                    break;

                case "O":   $("#tmp_billing_customer_name").val("");
                    $("#tmp_billing_customer_id").val(0).change();
                    $("#tmp_billing_customer_name").attr("disabled", false);
                    break;
            }

        });


        //=================================================================




        $("#warehouse_id").val("1");
        $("#warehouse_name").val("VECO MIAMI");
        $("#warehouse_name option[value="+ 1 +"]").attr("selected", true);

        if($("#status").val() == ''){
            $("#status").val("O").change();
        }

        if($("#currency_id").val() == ''){
            $("#currency_id").val("1").change();
        }
        if($("#status").val() == ''){
            $("#status").val("O").change();
        }

        if($("#currency_id").val() == ''){
            $("#currency_id").val("1").change();
        }

        if($("#mode").val() == ''){
            $("#mode").val("A").change();
        }
    });

    if ($("#date_in").val() == '') {
        initDate($("#date_in"), 0);
        initDate($("#expire_date"), 30);
    }

    $("#warehouse_name").attr("readonly", true);

    $('#commercial_inv').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#extra_length').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#pallets').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#packing_list').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#extra_width').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#improper_document').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#heat_treated').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#extra_height').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#inbond').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#hazardous').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#extra_heavy').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#glass').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#haz_documents').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#driver_licenses').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#pieces_discrepancy').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#hazardous_labels').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#fragile').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#weight_discrepancy').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#cargo_screened').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });
    $('#ippc').change(function() {
        ((this.checked)? $(this).val("1"): $(this).val("0"))
    });

    $("#code").attr("readonly", true);
    $("#tmp_billing_exchange_rate").attr("readonly", true);
    $("#tmp_cost_exchange_rate").attr("readonly", true);
    $("#shipping_number").attr("readonly", true);
    $("#pd_order").attr("readonly", true);
    $("#po_number").attr("readonly", true);
    $("#user_id").attr("readonly", true);
    $("#tmp_cargo_total_weight").attr("readonly", true);
    $("#multiline_cargo_total_weight").attr("readonly", true);

    $("#sum_bill").attr("readonly", true).number(true, 2);
    $("#sum_cost").attr("readonly", true).number(true, 2);
    $("#sum_profit").attr("readonly", true).number(true, 2);
    $("#sum_profit_percent").attr("readonly", true).number(true, 3);



    $("#references_invoice_amount").number(true, 2);

    $("#cargo_quantity").number(true);
    $("#cargo_pieces").number(true);
    $("#cargo_length").number(true, 3);
    $("#cargo_width").number(true, 3);
    $("#cargo_height").number(true, 3);
    $("#cargo_unit_weight").number(true, 3);
    $("#cargo_total_weight").number(true, 3);
    $("#cargo_cubic").number(true, 3);
    $("#cargo_volume_weight").number(true, 3);
    $("#cargo_tare_weight").number(true, 3);
    $("#cargo_net_weight").number(true, 3);
    $("#cargo_sq_foot").number(true, 3);

    $("#tmp_billing_quantity").number(true, 0);
    $("#tmp_billing_rate").number(true, 3);
    $("#tmp_billing_increase").number(true, 3);
    $("#tmp_billing_amount").number(true, 3);
    $("#tmp_billing_exchange_rate").number(true, 3);

    $("#tmp_cost_quantity").number(true, 0);
    $("#tmp_cost_rate").number(true, 3);
    $("#tmp_cost_amount").number(true, 3);
    $("#tmp_cost_exchange_rate").number(true, 3);

   /* $("#charges_bill").number(true, 2);
    $("#charges_cost").number(true, 2);
    $("#charges_profit").number(true, 2);
    $("#charges_profit_percent").number(true, 3);*/

    $("#ippc_number").attr("readonly", !0), $("#ippc").change(function() {
        $("#ippc_number").attr("readonly", !this.checked), $("#ippc_number").val("")
    });

    removeEmptyNodes('receiving-details');
    removeEmptyNodes('references-details');
    removeEmptyNodes('hazardous-details');
    removeEmptyNodes('warehouse-details');
    removeEmptyNodes('charge-details');

    calculate_warehouse_details();

</script>