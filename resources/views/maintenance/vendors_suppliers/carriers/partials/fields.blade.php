{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
    <div class="row">
        <div class="col-md-6">
            {!! Form::bsText('col-md-2', 'col-md-10', 'Code', 'code', null, 'Enter the code for the carrier') !!}
            {!! Form::bsText('col-md-2', 'col-md-10', 'Name', 'name', null, 'Enter the name for the carrier') !!}
            {!! Form::bsMemo('col-md-2', 'col-md-10', 'Address', 'address', null, 2, 'Enter the address for this carrier') !!}
            {!! Form::bsText('col-md-2', 'col-md-10', 'City', 'city', null, 'Enter the city for the carrier') !!}
            {!! Form::bsSelect('col-md-2', 'col-md-10', 'State', 'state_id', Sass\State::all()->lists('name', 'id'), 'Choose one of the following states...') !!}
            {!! Form::bsText('col-md-2', 'col-md-10', 'ZIP', 'zip', null, 'Enter the postal code for the carrier') !!}
            {!! Form::bsSelect('col-md-2', 'col-md-10', 'Country', 'country_id', Sass\Country::all()->lists('name', 'id'), 'Choose one of the following countries...') !!}
        </div>
       <div class="col-md-6">
           <legend>Contact Details</legend>
           <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-2', 'col-md-10', 'Contact', 'contact', null, '') !!}</div></div>
           <div class="row">
               <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Phone', 'phone', null, '') !!}</div>
               <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Fax', 'fax', null, '') !!}</div>
           </div>
           <div class="row"><div class="col-md-12">{!! Form::bsText('col-md-2', 'col-md-10', 'Email', 'email', null, '') !!}</div></div>
           <div class="row"><div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Account Number', 'account_number', null, '') !!}</div></div>
           <div class="row">
               <div class="col-md-12">{!! Form::bsMemo('col-md-2', 'col-md-10', 'Comments', 'comments', null, 2, '') !!}</div>
           </div>
       </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="form-horizontal">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <a type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#generate_codes" onclick="cleanModalFields('generate_codes')" id="btn_generate"><span>Generate AWB</span></a>
            <button type="button" class="btn btn-danger"  onclick="clearTable('details')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>

        <table class="table table-bordered table-condensed" id="details">
            <thead>
            <tr>
                <th hidden></th>
                <th width="15%" >AWB#</th>
                <th width="10%" >AWB Type</th>
                <th width="5%" >Status</th>
                <th width="10%" >File#</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($carrier))
                @foreach($carrier->awb_number as $key => $detail)
                    <tr id="{{ $key + 1 }}">
                    {!! Form::bsRowTd($key + 1 , 'line', $key + 1, true) !!}
                    {!! Form::bsRowTd($key + 1, 'division_id', $detail->division_id, true) !!}
                    {!! Form::bsRowTd($key + 1, 'division_name', ($detail->division_id > 0 ? $detail->division->name : ""), true) !!}
                    {!! Form::bsRowTd($key + 1, 'awb_number', $detail->awb_number, false) !!}
                    {!! Form::bsRowTd($key + 1, 'awb_type', $detail->awb_type, true) !!}
                    {!! Form::bsRowTd($key + 1, 'awb_type_text', ($detail->awb_type == '1'? "INTERNATIONAL" : "DOMESTIC"), false) !!}
                    {!! Form::bsRowTd($key + 1, 'sequence_type', $detail->sequence_type, true) !!}
                    {!! Form::bsRowTd($key + 1, 'agent_id', $detail->agent_id, true) !!}
                    {!! Form::bsRowTd($key + 1, 'agent_name', strtoupper($detail->agent_id > 0 ? $detail->agent->name : "" ), true) !!}
                    {!! Form::bsRowTd($key + 1, 'status', $detail->awb_status, true) !!}
                    {!! Form::bsRowTd($key + 1, 'status_text', ($detail->awb_status == '1' ? "AVAILABLE" : ($detail->awb_status == '2' ? "BOOKED": ($detail->awb_status == '3'? "CANCELLED" : ($detail->awb_status == '4'? "USED": "VOID")))), false) !!}
                    {!! Form::bsRowTd($key + 1, 'starting',$detail->awb_number, true) !!}
                    {!! Form::bsRowTd($key + 1, 'ending', "", true) !!}
                    {!! Form::bsRowTd($key + 1, 'file_number', $detail->file_number, false) !!}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>
</div>


    @section('modals')
        @include('maintenance.vendors_suppliers.carriers.partials.modal.generate')
        @include('maintenance.vendors_suppliers.carriers.partials.modal.contact')

    @endsection
    @section('scripts')
        @include('maintenance.vendors_suppliers.carriers.partials.scripts.init')
        @include('maintenance.vendors_suppliers.carriers.partials.scripts.autocomplete')
        @include('maintenance.vendors_suppliers.carriers.partials.scripts.tables')

    @endsection