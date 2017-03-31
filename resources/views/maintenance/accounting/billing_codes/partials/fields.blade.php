<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
<div class="col-md-12">
    @include('maintenance.accounting.billing_codes.partials.sections.general')
</div>
<div class="row">
    @include('maintenance.accounting.billing_codes.partials.sections.account_setup')
</div>
<div class="row">
    @include('maintenance.accounting.billing_codes.partials.sections.export_routing')
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsMemo(null, null, 'Comments', 'comments', null, null) !!}</div>
</div>

<!-- Modal forms section -->
@section('modals')
    @include('maintenance.accounting.billing_codes.partials.modal.gl_account')
    @include('maintenance.accounting.billing_codes.partials.modal.customer_mapping')

@stop

<!-- Scripts sections -->
@section('scripts')
    <script>

    </script>

    @include('maintenance.accounting.billing_codes.partials.scripts.init')
    @include('maintenance.accounting.billing_codes.partials.scripts.tables')
    @include('maintenance.accounting.billing_codes.partials.scripts.autocomplete')


@stop
