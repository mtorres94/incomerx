<script type="text/javascript">
    $(document).ready(function () {
        $('#date_in').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'date_in'); });
        $('#expire_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'expire_date'); });

        $('#shipper_name').blur(function (e) {
            $('#data').formValidation('revalidateField', 'shipper_address');
            $('#data').formValidation('revalidateField', 'shipper_city');
        });

        $('#consignee_name').blur(function (e) {
            $('#data').formValidation('revalidateField', 'consignee_address');
            $('#data').formValidation('revalidateField', 'consignee_city');
        });

        $("#data").formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                date_in: {
                        validators: {
                            notEmpty: { message: "The date in is required" },
                            date: {
                                format: "YYYY-MM-DD",
                                max: 'expire_date',
                                message: "The date in is invalid"
                            }
                        }
                    },
                    expire_date: {
                        validators: {
                            notEmpty: { message: "The expire date is required" },
                            date: {
                                format: "YYYY-MM-DD",
                                min: "date_in",
                                message: "The expire date is invalid"
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
                mode: {
                    validators: {
                        notEmpty: { message: "The mode is required" },
                    }
                },
                location_origin_name: {
                    validators: {
                        notEmpty: { message: "The origin location is required" },
                    }
                },
                location_destination_name: {
                    validators: {
                        notEmpty: { message: "The destination location is required" },
                    }
                }
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

        $("#CargoModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                tmp_cargo_type_code: {
                    validators: {
                        notEmpty: { message: "Cargo type is required" }
                    }
                },
                tmp_cargo_quantity: {
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
                tmp_billing_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" }
                    }
                },
                tmp_billing_quantity: {
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
        });

    });

    preventHighNumber($('#tmp_cargo_length'), 100);
    preventHighNumber($('#tmp_cargo_width'), 100);
    preventHighNumber($('#tmp_cargo_height'), 100);
    preventHighNumber($('#tmp_multiline_cargo_length'), 100);
    preventHighNumber($('#tmp_multiline_cargo_width'), 100);
    preventHighNumber($('#tmp_multiline_cargo_height'), 100);
</script>