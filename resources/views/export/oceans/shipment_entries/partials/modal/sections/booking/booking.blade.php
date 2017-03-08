<div id="BookingModal" class="modal fade" role="dialog" data-backdrop-limit="1" class="modal modal-child" data-keyboard="false">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Booking</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    {!! Form::hidden('booking_line', null, ['id' => 'booking_line', 'class' => 'form-control input-sm']) !!}
                    {!! Form::hidden('tmp_shipment_id', null, ['id' => 'tmp_shipment_id', 'class' => 'form-control input-sm']) !!}
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Booking#', 'tmp_booking_code', null, ' ') !!}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Shipment#', 'tmp_shipment_code', null, null) !!}</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default btn-footer" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </a>
                <a id="booking_save" class="btn btn-primary btn-footer" href="javascript:void(0)">
                    <i class="icon ion-android-done-all"></i> Save data
                </a>
            </div>
        </div>
    </div>
</div>