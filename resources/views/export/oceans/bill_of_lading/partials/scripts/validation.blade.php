<script type="text/javascript">
    $(document).ready(function () {

        $('#bl_date').on('change', function(e) { $('#data').formValidation('revalidateField', 'bl_date'); });
        $('#departure_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'departure_date'); });
        $('#arrival_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'arrival_date'); });


        $("#consignee_name").blur(function(e){
            $('#data').formValidation('revalidateField', 'consignee_address');
            $('#data').formValidation('revalidateField', 'consignee_city');
        });
        $("#shipper_name").blur(function(e){
            $('#data').formValidation('revalidateField', 'shipper_address');
            $('#data').formValidation('revalidateField', 'shipper_city');
        });
        $("#customer_name").blur(function(e){
            $('#data').formValidation('revalidateField', 'customer_address');
            $('#data').formValidation('revalidateField', 'customer_city');
        });

        $("#data").formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                departure_date: {
                    validators: {
                        notEmpty: { message: "Departure date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'bl_date',
                            max: 'arrival_date',
                            message: "The departure date is invalid"
                        }
                    }
                },
                arrival_date: {
                    validators: {
                        notEmpty: { message: "Arrival date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "departure_date",
                            message: "The arrival date is invalid"
                        }
                    }
                },

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
                place_receipt_name: {
                    validators: {
                        notEmpty: { message: "Place of receipt name is required" },
                    }
                },
                place_delivery_name: {
                    validators: {
                        notEmpty: { message: "Place of delivery name is required" },
                    }
                },
                port_loading_name: {
                    validators: {
                        notEmpty: { message: "A loading port is required" },
                    }
                },
                port_unloading_name: {
                    validators: {
                        notEmpty: { message: "An unloading port is required" },
                    }
                },
                carrier_name: {
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
        });

        $("#ContainerModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                equipment_type_code: {
                    validators: {
                        notEmpty: { message: "Equipment type is required" }
                    }
                },
                container_number: {
                    validators: {
                        notEmpty: { message: "Pieces is required" }
                    }
                }
            }
        }).on('success.field.fv', function (e, data) {
            var $parent = data.element.parents('.form-group');
            $parent.removeClass('has-success');
            data.element.data('fv.icon').hide();

        }).on('err.field.fv', function (e, data) {
            data.element.data('fv.icon').hide();
        });

        $("#ChargeModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                billing_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" }
                    }
                },
                billing_quantity: {
                    validators: {
                        notEmpty: { message: "Quantity is required" }
                    }
                }
            }
        }).on('success.field.fv', function (e, data) {
            var $parent = data.element.parents('.form-group');
            $parent.removeClass('has-success');
            data.element.data('fv.icon').hide();

        }).on('err.field.fv', function (e, data) {
            data.element.data('fv.icon').hide();
        })
    })
</script>