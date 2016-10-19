<legend>Container Details</legend>
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTable('hazardous_details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details'), clearTable('hazardous_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="container_details">
                    <thead>
                    <tr>
                        <th data-override="container_line" hidden></th>
                        <th width="10%" data-override="equipment_type">Equipment type</th>
                        <th width="10%" data-override="equipment_number">Equipment number.</th>
                        <th width="10%" data-override="equipment_seal" >Equip. Seal</th>
                        <th width="10%" data-override="container_unit">Unit</th>
                        <th width="10%" data-override="container_status">Status ID</th>
                        <th width="10%" data-override="container_weight"> Weight</th>

                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table class="table hidden" id="hzd_details">
                    <tbody>
                    </tbody>
                </table>

