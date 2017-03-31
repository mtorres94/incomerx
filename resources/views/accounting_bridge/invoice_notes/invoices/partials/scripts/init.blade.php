<script type="text/javascript">
    window.onload = (function () {
        updateAccess($('#dataTableBuilder'), $('#data'), '{{ route('invoices.close') }}');
        openTab($("#data"));

        if ($("#open_status").val() == "1" || $("#status").val() == "P") {
            disableFields('data');
        }

        $('#printer').change(function () {
            var _type = $('.select-header .dropdown-menu .selected').data('original-index');
            var _id = $('.btn-print[data-id]').data('id');
            var _token = '{{ str_random(120) }}';

            var url = $('.btn-print[data-id]').data('route');
            $('.btn-print[data-id]').attr('href', url + '?_token=' + _token + '&_type=' + _type + '&_id=' + _id);
        });


        $("#code").attr("readonly", true);
        if($("#date").val() == ''){
            initDate($("#date"), 0);
        }

        $("#period").val('{{ isset($invoice) ? $invoice->period : date('m/Y') }}');

        for (var t2 = $("#charges-tabs").find("div"), l2 = 0; l2 < t2.length  ; l2++) {
            var a2 = t2[l2];
            var e2 = $(a2).attr("style");
            if (e2 === undefined) {
            } else {var n2 = e2.indexOf("display: block;"),
                o2 = e2.indexOf("display: none;");
                $(a2).removeAttr("style"), n2 >= 0 && $(a2).attr("style", "display: block;"), o2 >= 0 && $(a2).attr("style", "display: none;")}
        }

        removeEmptyNodes('charge_table');
        removeEmptyNodes('cargo_table');
        removeEmptyNodes('container_table');

        values_charges();
        $("#equipment_type_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('cargo_types.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#equipment_type_code").val(e[0].code);

                }
            });
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


        $("#billing_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#billing_unit_name").val(e[0].code);

                }
            });
        });

        $("#cost_unit_id").change(function () {
            var id = $(this).val();
            $.ajax({
                url: "{{ route('units.get') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    $("#cost_unit_name").val(e[0].code);

                }
            });
        });
        $("#user_id").attr("readonly", true);

        $("#carrier_type").val('{{ isset($invoice) ? $invoice->carrier_type : "A" }}').change();
        $("#status").val('{{ isset($invoice) ? $invoice->status : "O" }}').change();
        $("#type").val('{{ isset($invoice) ? $invoice->type : "I" }}').change();
        $("#source").val('{{ isset($invoice) ? $invoice->source : "MI" }}').change();
        $("#class").val('{{ isset($invoice) ? $invoice->class : "MI" }}').change();

        $("#billing_rate").change(function(){ charges_details(); });
        $("#billing_increase").change(function(){ charges_details(); });
        $("#billing_quantity").change(function(){ charges_details(); });
        $("#cost_rate").change(function(){ charges_details(); });
        $("#cost_quantity").change(function(){ charges_details(); });

        $("#tmp_cargo_quantity").change(function () { calculate() });
        $("#tmp_cargo_length").change(function () { calculate() });
        $("#tmp_cargo_width").change(function () { calculate() });
        $("#tmp_cargo_height").change(function () { calculate() });
        $("#tmp_cargo_metric_unit_measurement_id").change(function () { calculate() });
        $("#tmp_cargo_weight_unit_measurement_id").change(function () { calculate() });
        $("#tmp_cargo_dim_fact").change(function () { calculate() });
        $("#tmp_cargo_unit_weight").change(function () { calculate() });



    });

$("#btn_transfer").click(function(){
    var id= $("#invoice_id").val();
    swal({
        title: "",
        text: "Do you want to transfer this invoice to accounting?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#3c8dbc",
        confirmButtonText: "¡Yes, I want !",
        cancelButtonText: "No...",
        closeOnConfirm: false
    }).then(function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: "{{ route('invoices.transfer') }}",
                data: { id: id },
                type: 'GET',
                success: function (e) {
                    swal({
                        title: "Transference successful",
                        text: "Invoice posted",
                        type: "success",
                        confirmButtonText: "Ok"
                    });
                }
            });
        }
    });
});

    $("#source").change(function(){
        var s= $("#source").val();
       s == 'MI' ? $("#class").val('MI').change() : (s== 'PI' ? $("#class").val('PI').change() : (s == 'AI'? $("#class").val('HO').change() : $("#class").val('HO').change())) ;
    });

</script>