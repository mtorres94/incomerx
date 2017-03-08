{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Abbreviation', 'abbreviation', null, 'Enter the abbreviation for the payment term') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the payment term') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Net days', 'net_days', null, 'Enter the net days for the payment term') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Discount', 'discount', null, 'Enter the discount for the payment term') !!}
@section('scripts')
    <script>
    </script>
    @include('maintenance.customers.payment_terms.partials.scripts.init')
@stop