<script type="text/javascript">
    $(document).ready(function () {
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
                },
                shipper_contact: {
                    validators: {
                        notEmpty: { message: "Shipper RUC is required" }
                    }
                },
                consignee_contact: {
                    validators: {
                        notEmpty: { message: "Consignee RUC is required" }
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