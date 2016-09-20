<div class="row">
    <div class="col-md-1">
        <a class="btn btn-default" href="#" role="button" onclick="addSubtab('{{ trans('panel.new') }}', '{{ route($route) }}')">
            <i class="fa ion-folder"></i> {{ trans('panel.new') }}
        </a>
    </div>
    <div id="refresh" class="pull-right">
        <a class="btn btn-success" href="{{ route($index) }}" role="button">
            <i class="fa fa-refresh"></i> {{ trans('panel.refresh') }}
        </a>
    </div>
</div>