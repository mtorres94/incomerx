<script type="text/javascript">
    $(document).ready(function () {

        $('#date_order').on('change', function(e) { $('#data').formValidation('revalidateField', 'date_order'); });

        $("#consignee_name").blur(function(e){
            $('#data').formValidation('revalidateField', 'consignee_address');
            $('#data').formValidation('revalidateField', 'consignee_city');
        });
        $("#shipper_name").blur(function(e){
            $('#data').formValidation('revalidateField', 'shipper_address');
            $('#data').formValidation('revalidateField', 'shipper_city');
        });

        $("#data").formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                shipper_name: {
                    validators: {
                        notEmpty: { message: "The shipper name is required" },
                    }
                },
                shipper_address: {
                    validators: {
                        notEmpty: { message: "The shipper address is required" },
                    }
                },
                shipper_city: {
                    validators: {
                        notEmpty: { message: "The shipper city is required" },
                    }
                },
                consignee_name: {
                    validators: {
                        notEmpty: { message: "The consignee name is required" },
                    }
                },
                consignee_address: {
                    validators: {
                        notEmpty: { message: "The consignee address is required" },
                    }
                },
                consignee_city: {
                    validators: {
                        notEmpty: { message: "The consignee city is required" },
                    }
                },
                pd_type: {
                    validators: {
                        notEmpty: { message: "The order type is required" },
                    }
                },
                pd_dispatch_status: {
                    validators: {
                        notEmpty: { message: "The dispatch status is required" },
                    }
                },
                carriers_carrier_name: {
                    validators: {
                        notEmpty: { message: "The carrier name is required" },
                    }
                },
                date_order: {
                    validators: {
                        notEmpty: { message: "The order date is required" },
                    }
                },
                location_world_location_name: {
                    validators: {
                        notEmpty: { message: "Origin is required" },
                    }
                },
                destination_world_location_name: {
                    validators: {
                        notEmpty: { message: "Destination is required" },
                    }
                },
                cargo_cargo_type_id: {
                    validators: {
                        notEmpty: { message: "Cargo type is required" },
                    }
                },
                container_equipment_type_code: {
                    validators: {
                        notEmpty: { message: "Equipment type is required" },
                    }
                },
                dr_cargo_marks: {
                    validators: {
                        notEmpty: { message: "Marks and Numbers are required" },
                    }
                },
                dr_cargo_pieces: {
                    validators: {
                        notEmpty: { message: "Number of pieces are required" },
                    }
                },
                billing_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" },
                    }
                },
                transportation_amount: {
                    validators: {
                        notEmpty: { message: "Amount is required" },
                    }
                },
                transportation_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" },
                    }
                },
                transportation_carrier_name: {
                    validators: {
                        notEmpty: { message: "Carrier name is required" },
                    }
                },
            }
        }).on('success.field.fv', function(e, data) {
            // $(e.target)  --> The field element
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            var $parent = data.element.parents('.form-group');

            // Remove the has-success class
            $parent.removeClass('has-success');

            // Hide the success icon
            data.element.data('fv.icon').hide();

        }).on('err.field.fv', function(e, data) {
            // $(e.target)  --> The field element
            // data.fv      --> The FormValidation instance
            // data.field   --> The field name
            // data.element --> The field element

            // Hide the success icon
            data.element.data('fv.icon').hide();
        })
    })
</script>