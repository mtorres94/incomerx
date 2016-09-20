<!-- Init fields -->
<!--suppress ALL -->
<script type="text/javascript">
    window.onload = (function () {
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

        $("#cargo_quantity").change(function () { calculate() });
        $("#cargo_length").change(function () { calculate() });
        $("#cargo_width").change(function () { calculate() });
        $("#cargo_height").change(function () { calculate() });
        $("#cargo_metric_unit_measurement_id").change(function () { calculate() });
        $("#cargo_weight_unit_measurement_id").change(function () { calculate() });
        $("#cargo_dim_fact").change(function () { calculate() });
        $("#cargo_unit_weight").change(function () { calculate() });

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

                {{--$('.file-footer-buttons').on('click', '.kv-file-download', function (e) {
                    e.preventDefault();
                    var key = $(this).parent().find(".kv-file-remove").data("key");

                    var url = "{{ route('receipts_entries.download') }}";
                    $.ajax({
                        url: url,
                        data: { _token: $('meta[name="csrf-token"]').attr('content'), key: key },
                        type: 'GET',
                        success: function (response) {
                            window.location = response;
                        },
                        error: function (errors) {
                            console.log(errors);
                        }
                    });
                });--}}
            }
        });

        $("#cargo_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    var act = $("#cargo_type_code").val()
                    $("#cargo_type_code").val(e[0].code);
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
                                    $("#cargo_length").val(e[0].length), $("#cargo_width").val(e[0].width), $("#cargo_height").val(e[0].height);
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
    });

    initDate($("#date_in"), 0);
    initDate($("#expire_date"), 30);

    $("#shipping_number").attr("disabled", true);
    $("#pd_order").attr("disabled", true);
    $("#po_number").attr("disabled", true);
    $("#user_id").attr("disabled", true);
    $("#cargo_total_weight").attr("disabled", true);

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

    $("#ippc_number").attr("disabled", !0), $("#ippc").change(function() {
        $("#ippc_number").attr("disabled", !this.checked), $("#ippc_number").val("")
    });
</script>