<script type="text/javascript">
    $(document).ready(function () {

        $('#date_today').on('change', function(e) { $('#data').formValidation('revalidateField', 'date_today'); });
        $('#starting_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'starting_date'); });
        $('#starting_process_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'starting_process_date'); });
        $('#ending_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'ending_date'); });
        $('#approved_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'approved_date'); });
        $('#closed_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'closed_date'); });

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
                starting_date: {
                    validators: {
                        notEmpty: { message: "Starting date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'date_today',
                            message: "Starting date is invalid"
                        }
                    }
                },
                starting_process_date: {
                    validators: {
                        notEmpty: { message: "Starting process date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'starting_date',
                            message: "Starting process date is invalid"
                        }
                    }
                },
                approved_date: {
                    validators: {
                        notEmpty: { message: "Approved date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'starting_process_date',

                            message: "Approved date is invalid"
                        }
                    }
                },
                closed_date: {
                    validators: {
                        notEmpty: { message: "Closed date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'approved_date',

                            message: "Closed date is invalid"
                        }
                    }
                },
                ending_date: {
                    validators: {
                        notEmpty: { message: "Ending date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'closed_date',
                            message: "Ending date is invalid"
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
                customer_name: {
                    validators: {
                        notEmpty: { message: "The customer name is required" },
                    }
                },
                customer_address: {
                    validators: {
                        notEmpty: { message: "The customer address is required" },
                    }
                },
                customer_city: {
                    validators: {
                        notEmpty: { message: "The customer city is required" },
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
                quote_type: {
                    validators: {
                        notEmpty: { message: "Quote type is required" },
                    }
                },
                type: {
                    validators: {
                        notEmpty: { message: "Type is required" },
                    }
                },
                quote_status: {
                    validators: {
                        notEmpty: { message: "Quote status is required" },
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

        $("#CargoModal").find('[name="box_cargo_type_id"]')
            .selectpicker()
            .change(function(e) {
                $('#CargoModal').formValidation('revalidateField', 'box_cargo_type_id');
            }).end()
            .formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                },
                fields: {
                    box_cargo_type_id: {
                        validators: {
                            notEmpty: { message: "Cargo Type is required" }
                        }
                    },
                    box_quantity: {
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

        $("#OriginModal").formValidation({
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
        });

        $("#DestinationModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                dest_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" }
                    }
                },
                dest_billing_quantity: {
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