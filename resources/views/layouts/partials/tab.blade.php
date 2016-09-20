<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div id="tt" class="easyui-tabs"  style="width:100%;height:100%;">
        <div title="{{ trans('panel.home') }}" style="margin:0px;padding-top: 0">
            <iframe scrolling="auto" frameborder="0" src="{{ url('/panel') }}" style="width:100%; height:100%;"></iframe>
        </div>
    </div>
</div><!-- /.content-wrapper -->

@section('scripts')
    <script>
        $(window).load(function () {
            $('#tt').tabs('add',{
                title:'_',
                content: '',
            });

            $("#tt").tabs('close', '_');
        })
    </script>
@stop