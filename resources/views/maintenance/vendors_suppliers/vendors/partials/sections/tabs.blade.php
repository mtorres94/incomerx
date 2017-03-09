<div class="col-md-12">
    <div class="easyui-tabs">
        <div title="Accounting">
            @include('maintenance.vendors_suppliers.vendors.partials.sections.tabs.accounting')
        </div>
        <div title="Air & Ocean"></div>
        <div title="Contacts">
            @include('maintenance.vendors_suppliers.vendors.partials.sections.tabs.contacts')
        </div>
        <div title="Comments">
            <div class="col-md-12">
                {!! Form::bsMemo(null, null, '', 'comments', null, 15, '') !!}
            </div>
        </div>
    </div>
</div>