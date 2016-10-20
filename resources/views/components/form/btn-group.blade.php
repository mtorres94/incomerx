<div class="btn-group" role="group" style="padding-bottom: 15px;">
    @foreach($array as $item)
        <a href="{{ route($item['route'], [str_random(60), $obj]) }}" target="_blank" type="button" class="btn btn-lg btn-default"><i class="{{ $item['class'] }}" aria-hidden="true"></i>{{ $item['value'] }}</a>
    @endforeach
</div>