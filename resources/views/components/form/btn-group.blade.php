<select name="printer" id="printer" class="selectpicker select-header" title="Choose..." data-width="auto">
    @foreach($array as $item)
        <option data-icon="{{ $item['class'] }}" data-index="{{ $item['index'] }}">{{ $item['value'] }}</option>
    @endforeach
</select>
<a href="javascript:void(0)" class="btn btn-default btn-lg btn-print" data-id="{{ $obj->id }}" data-route="{{ route($route, [0, str_random(60)]) }}"><span class="fa fa-print fa-lg" aria-hidden="true"></span></a>