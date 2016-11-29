<div id="errorBlock" class="help-block"></div>

@include('export.oceans.quotes.partials.sections.general')
<div class="row">
    <div class="col-md-6">@include('export.oceans.quotes.partials.sections.customer')</div>
    <div class="col-md-6"> @include('export.oceans.quotes.partials.sections.loading_details')</div>
</div>
<div class="row">
    <div class="col-md-6">@include('export.oceans.quotes.partials.sections.from')</div>
    <div class="col-md-6">@include('export.oceans.quotes.partials.sections.to')</div>
</div>
<div class="row">
    <div class="col-md-6">@include('export.oceans.quotes.partials.sections.instructions')</div>
    <div class="col-md-6">@include('export.oceans.quotes.partials.sections.agent_information')</div>
</div>
<div class="row">
   <div class="col-md-12"> @include('export.oceans.quotes.partials.sections.cargo_details')</div>
</div>
<div class="row">
    <div class="col-md-12">@include('export.oceans.quotes.partials.sections.weight_totals')</div>
</div>
<div class="row">
    <div class="col-md-12">@include('export.oceans.quotes.partials.sections.charge_details')</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsMemo(null, null, '', 'quotes_comments', null, ' ') !!}</div>
</div>

@section('modals')
    @include('export.oceans.quotes.partials.modal.container_details')
    @include('export.oceans.quotes.partials.modal.cargo_details')
    @include('export.oceans.quotes.partials.modal.charge_details')
@endsection

@section('scripts')
    <script>

    </script>

    @include('export.oceans.quotes.partials.scripts.init')
    @include('export.oceans.quotes.partials.scripts.compute')
    @include('export.oceans.quotes.partials.scripts.autocomplete')
    @include('export.oceans.quotes.partials.scripts.tables')

@stop