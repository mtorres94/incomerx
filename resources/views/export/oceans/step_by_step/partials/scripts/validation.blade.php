<script type="text/javascript">
    $(document).ready(function () {
//=============================================================
        $('#date_today').on('change', function(e) { $('#data').formValidation('revalidateField', 'date_today'); });
        $('#departure_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'departure_date'); });
        $('#arrival_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'arrival_date'); });
        $('#cut_off_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'cut_off_date'); });

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

        $('#data')
            .formValidation({
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
                cut_off_date: {
                    validators: {
                        notEmpty: { message: "Cut off date is required" },
                        date: {
                            format: "YYYY-MM-DD",
                            min: "departure_date",
                            message: "The cut off date is invalid"
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
                inland_carrier_name: {
                    validators: {
                        notEmpty: { message: "Carrier name is required" },
                    }
                },
                carrier_name: {
                    validators: {
                        notEmpty: { message: "Carrier name is required" },
                    }
                },
                insured_value: {
                    validators: {
                        notEmpty: { message: "Insured value is required" },
                    }
                },
                declared_value: {
                    validators: {
                        notEmpty: { message: "Declared value is required" },
                    }
                },
                amount: {
                    validators: {
                        notEmpty: { message: "Total Amount is required" },
                    }
                },
                booking_code: {
                    validators: {
                        notEmpty: { message: "Booking number is required" },
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
        }).bootstrapWizard({
            tabClass: 'nav step',
            onTabClick: function(tab, navigation, index) {
                return validateTab(index);
            },
            onNext: function(tab, navigation, index) {
                var numTabs    = $('#data').find('.tab-pane').length,
                    isValidTab = validateTab(index - 1);
                if (!isValidTab) {
                    return false;
                }

                if (index === numTabs) {
                    // We are at the last tab

                    // Uncomment the following line to submit the form using the defaultSubmit() method
                    // $('#data').formValidation('defaultSubmit');

                    // For testing purpose
                    $('#completeModal').modal();
                }

                return true;
            },
            onPrevious: function(tab, navigation, index) {
                return validateTab(index + 1);
            },
            onTabShow: function(tab, navigation, index) {
                // Update the label of Next button when we are at the last tab
                var numTabs = $('#data').find('.tab-pane').length;
                $('#data')
                    .find('.next')
                    .removeClass('disabled')    // Enable the Next button
                    .find('a')
                    .html(index === numTabs - 1 ? 'Install' : 'Next');
            }
        });

        function validateTab(index) {
            var fv   = $('#data').data('formValidation'), // FormValidation instance
                // The current tab
                $tab = $('#data').find('.tab-pane').eq(index);

            // Validate the container
            fv.validateContainer($tab);

            var isValidStep = fv.isValidContainer($tab);
            if (isValidStep === false || isValidStep === null) {
                // Do not jump to the target tab
                return false;
            }

            return true;
        }
    })
</script>