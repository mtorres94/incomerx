<script type="text/javascript">
    $(document).ready(function () {

        $('#date_today').on('change', function(e) { $('#data').formValidation('revalidateField', 'date_today'); });
        $('#booked_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'booked_date'); });
        $('#loading_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'loading_date'); });
        $('#equipment_cut_off_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'equipment_cut_off_date'); });
        $('#documents_cut_off_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'documents_cut_off_date'); });
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
                booked_date: {
                    validators: {
                        notEmpty: { message: "Booked on date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            max: "loading_date",
                            message: "Booked on date is invalid"
                        }
                    }
                },
                loading_date: {
                    validators: {
                        notEmpty: { message: "Loading date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "booked_date",
                            message: "Loading date is invalid"
                        }
                    }
                },
                equipment_cut_off_date: {
                    validators: {
                        notEmpty: { message: "Equipment cut off date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "loading_date",
                            message: "Equipment cut off date is invalid"
                        }
                    }
                },
                documents_cut_off_date: {
                    validators: {
                        notEmpty: { message: "Documents cut off date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "equipment_cut_off_date",
                            message: "Documents cut off date is invalid"
                        }
                    }
                },
                departure_date: {
                    validators: {
                        notEmpty: { message: "Departure date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "documents_cut_off_date",
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
                        notEmpty: { message: "The Container number is required" }
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