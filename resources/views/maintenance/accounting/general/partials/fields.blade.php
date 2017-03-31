<div id="errorBlock" class="help-block"></div>
{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}

<div class="col-md-12">
    <div class="row">
        <legend>General Ledger Account</legend>
    </div>
</div>
<div class="row">
    @include('maintenance.accounting.general.partials.sections.general')
</div>
<div class="col-md-12">
    <div class="row">
    {!! Form::bsMemo(null, null, 'Comments', 'comments', null, null) !!}
    </div>
</div>
@section('modals')


@stop

<!-- Scripts sections -->
@section('scripts')
    @include('maintenance.accounting.general.partials.scripts.init')
@stop
