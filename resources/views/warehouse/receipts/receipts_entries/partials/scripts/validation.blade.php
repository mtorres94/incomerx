<script type="text/javascript">
    $(document).ready(function () {
        $('#date_in').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'date_in'); });
        $('#expire_date').on('changeDate', function(e) { $('#data').formValidation('revalidateField', 'expire_date'); });

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
            }
        })
    })
</script>