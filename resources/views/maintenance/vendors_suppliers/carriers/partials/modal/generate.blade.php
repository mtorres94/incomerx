<div id="generate_codes" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Generate AWB codes</h4>
            </div>
            <div class="modal-body">
                {!! Form::hidden('line', null, ['id' => 'line', 'class' => 'form-control input-sm']) !!}
                {!! Form::hidden('file_number', null, ['id' => 'file_number', 'class' => 'form-control input-sm']) !!}
                <div class="row">
                    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Dom/ Intl', 'carrier_type', array('1' => '1 INTERNATIONAL','2' => '2 DOMESTIC'), '') !!}
                    </div>
                    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Type', 'type', array('1' => '1 CHECK DIGIT','2' => '2 SEQUENTIAL'), '') !!}
                    </div>
                    <div class="col-md-4">{!! Form::bsSelect(null, null, 'Status', 'status', array('1' => '1 AVAILABLE','2' => '2 BOOKED', '3'=>'3 CANCELLED', '4'=>'4 USED', '5'=>'5 VOID'), 'Type') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Division', 'division_id', Sass\Division::all()->lists('name', 'id'), 'Divisions...') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Starting AWB Number', 'starting', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Ending AWB Number', 'ending', null, '') !!}</div>
                    <div class="col-md-3">{!! Form::bsText(null, null, 'Total', 'total_codes', null, '') !!}</div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::bsComplete(null, null, 'Agent', 'agent_id', 'agent_name', Request::get('term'), null, 'State') !!}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="generate-save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Generate
                </a>
            </div>
        </div>
    </div>
</div>