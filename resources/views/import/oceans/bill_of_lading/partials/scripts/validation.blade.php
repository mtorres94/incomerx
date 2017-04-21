<script type="text/javascript">
    $(document).ready(function () {

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
                        notEmpty: { message: "Departure date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            max: 'arrival_date',
                            message: "Departure date is invalid"
                        }
                    }
                },
                arrival_date: {
                    validators: {
                        notEmpty: { message: "Arrival date is invalid" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: 'departure_date',
                            message: "Arrival date is invalid"
                        }
                    }
                },
                code: {
                    validators: {
                        notEmpty: { message: "The HBL code is required" },
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
                notify_name: {
                    validators: {
                        notEmpty: { message: "The notify name is required" },
                    }
                },
                notify_address: {
                    validators: {
                        notEmpty: { message: "The notify address is required" },
                    }
                },
                notify_city: {
                    validators: {
                        notEmpty: { message: "The notify city is required" },
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
                    tmp_marks: {
                        validators: {
                            notEmpty: { message: "The Marks is required" }
                        }
                    },
                    tmp_pieces: {
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

        $("#OriginModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                origin_billing_code: {
                    validators: {
                        notEmpty: { message: "Billing code is required" }
                    }
                },
                origin_bill_quantity: {
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

        $("#ContainerModal").formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                tmp_equipment_type_code: {
                    validators: {
                        notEmpty: { message: "Equipment code is required" }
                    }
                },
                tmp_number: {
                    validators: {
                        notEmpty: { message: "Container Number is required" }
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
    })
</script>