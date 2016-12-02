$(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
    $("#body").show();
});

$("#wrapper-content").slimScroll({
    height: "100%"
});

$('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    orientation: "bottom auto",
    autoclose: true,
    todayHighlight: true
});

$('.selectpicker').selectpicker();

$('.collapse').collapse();

// Automatically trigger the loading animation on click
Ladda.bind('button[type=submit]');

function getSelectedTab() {
    var gtab = window.parent.$('#tt');
    var htab = gtab.find('.tabs-header');
    var wtab = htab.find('.tabs-wrap');
    var ttab = wtab.find('.tabs');
    var stab = ttab.find('.tabs-selected');

    var id  = stab[0].textContent.replace(/ /g, "_");
    var _id = '#st_' + id.toLocaleLowerCase();

    return _id;
}

function getSelectedTabName(_id) {
    var gtab = window.parent.$('#tt').find(_id);
    var htab = gtab.find('.tabs-header');
    var wtab = htab.find('.tabs-wrap');
    var ttab = wtab.find('.tabs');
    var stab = ttab.find('.tabs-selected');

    var id  = stab[0].textContent;
    return id;
}



function closeTab(_main, _tab) {
    var stab  = window.parent.$('#tt').find(_main);
    stab.tabs('close', _tab)
}

$("div.tab-menu>div.list-group>a").click(function(e) {
    e.preventDefault();
    $(this).siblings('a.active').removeClass("active");
    $(this).addClass("active");
    var index = $(this).index();
    $("div.tab>div.tab-content").removeClass("active");
    $("div.tab>div.tab-content").eq(index).addClass("active");
});

function initDate(id, days) {
    var date = new Date();
    date.setDate(date.getDate() + days);

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    id.attr("value", today);
}

function createTableContent(name, content, hidden, line) {
    return $("<td " + ((hidden) ? "hidden" : "") + ">" + content + "<input hidden type='text' id='" + name + "[" + line + "]' name='" + name + "[" + line + "]' value='" + content + "'></td>");
}

function createTableBtns() {
    return $("<td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default'><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>");
}

function removeEmptyNodes(tableHTML){
    for (var row=0;row<$("#"+ tableHTML +" tbody tr").length;row++) {
        for (var i = 0; i < $("#"+ tableHTML +" tbody tr")[row].childNodes.length; i++) {
            var node = $("#"+ tableHTML +" tbody tr")[row].childNodes[i];
            if (node.nodeType == 3 && !/\S/.test(node.nodeValue))
                node.parentNode.removeChild(node);
        }
    }
}

function addTab(main, id, title, url){
    var _id = id.replace(/ /g, "_");
    id = "st_" + _id.toLocaleLowerCase();
    // console.log(id);
    if ($('#tt').tabs('exists', title)) {
        $('#tt').tabs('select', title);
    } else {
        var content =
            '<div id="' + id + '" class="easyui-tabs" data-options="fit:true,plain:true">' +
                '<div title="' + main + '" id="_main">' +
                    '<iframe id="_frame" scrolling="auto" frameborder="0" src="' + url + '" style="width:100%; height:100%;"></iframe>' +
                '</div>' +
            '</div>';
        $('#tt').tabs('add',{
            title: title,
            content: content,
            closable: true,
        });
    }
}

function openTab(f) {
    f.on('click', 'a[data-route]', function () {
        var a = $(this);
        var main  = a.data('main');
        var id    = a.data('id');
        var title = a.data('title');
        var url   = a.data('route');

        var _id = id.replace(/ /g, "_");
        id = "st_" + _id.toLocaleLowerCase();

        if (url.trim() !== '') {
            var tt = window.parent.$('#tt');
            if (tt.tabs('exists', title)) {
                tt.tabs('select', title);
            } else {
                var content =
                    '<div id="' + id + '" class="easyui-tabs" data-options="fit:true,plain:true">' +
                    '<div title="' + main + '" id="_main">' +
                    '<iframe id="_frame" scrolling="auto" frameborder="0" src="' + url + '" style="width:100%; height:100%;"></iframe>' +
                    '</div>' +
                    '</div>';
                tt.tabs('add',{
                    title: title,
                    content: content,
                    closable: true,
                });
            }
        }
    });
}

function addSubtab(title, url) {
    var gtab = window.parent.$('#tt');
    var htab = gtab.find('.tabs-header');
    var wtab = htab.find('.tabs-wrap');
    var ttab = wtab.find('.tabs');
    var stab = ttab.find('.tabs-selected');
    // console.log(stab);

    var id  = stab[0].textContent.replace(/ /g, "_");
    var _id = '#st_' + id.toLocaleLowerCase();
    // console.log(_id);

    // var frame = window.parent.$('#_frame');
    // console.log(frame.parent().parent().parent().parent().parent());

    var stab  = window.parent.$('#tt').find(_id);
    if (stab.tabs('exists', title)){
        stab.tabs('select', title);
    } else {
        var content = '<iframe scrolling="auto" frameborder="0" src="' + url + '" style="width:100%; height:100%;"></iframe>';
        stab.tabs('add', {
            title: title,
            content: content,
            closable: false,
        });
    }
}

function ajaxDelete(f) {
    f.on('click', '.btn-delete[data-remote]', function (e) {
        e.preventDefault();
        var url = $(this).data('remote');
        swal({
            title: "Are you sure?",
            text: "You'll permanently delete this information",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "¡Yes, I want to delete!",
            cancelButtonText: "No!!!",
            closeOnConfirm: false
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: { _method: 'DELETE', _token: $('meta[name="csrf-token"]').attr('content') },
                }).always(function (data) {
                    f.DataTable().draw(false);
                });
            }
        });
    })
}

function preventOpen(f, _url, actual_user) {
    f.on('click', '.btn-edit[data-remote]', function (e) {
        var _id = $(this).data('id');
        var title = $(this).data('title');
        var remote = $(this).data('remote');
        $.ajax({
            url: _url,
            type: 'POST',
            dataType: 'json',
            data: {_method: 'POST', _token: $('meta[name="csrf-token"]').attr('content'), id: _id },
            success: function (rtn) {
                if (rtn.id > 0 && rtn.id != actual_user)
                {
                    swal({
                        title: "Attention",
                        text: "The user {{" + rtn.name + "}} is using this transaction, so it'll open in read-only mode!. Do you want to proceed?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            addSubtab(title, remote);
                        }
                    });
                }
                else
                {
                    if (rtn.id == 0 || rtn.id == actual_user)
                    {
                        addSubtab(title, remote);
                    }
                }
            }
        }).always(function (data) {
            f.DataTable().draw(false);
        });
    })
}

function updateAccess(m, f, _url) {
    f.on('click', '.btn-close[data-size]', function (e) {
        var _id = $(this).data('id');
        $.ajax({
            url: _url,
            type: 'POST',
            dataType: 'json',
            data: {_method: 'POST', _token: $('meta[name="csrf-token"]').attr('content'), id: _id },
            success: function (rtn) {
                var main = getSelectedTab();
                var name = getSelectedTabName(main);
                console.log(main, name);
                closeTab(main, name);
            }
        }).always(function (data) {
            m.DataTable().draw(false);
        });
    });
}

function cleanModalFields(modal) {
    var _input  = '#' + modal + ' input';
    var _text   = '#' + modal + ' textarea';
    var _select = '#' + modal + ' select';
    
    $(_input).each(
        function(index){
            var input = $(this);
            var _type = input.attr('type');
            switch (_type) {
                case 'text':
                    input.prop('value', '');
                    break;
                case 'number':
                    input.prop('value', '');
                    break;
                case 'hidden':
                    input.prop('value', '');
                    break;
            }
        }
    );
    $(_text).each(
        function(index){
            var input = $(this);
            input.prop('value', '');
        }
    );
    $(_select).each(
        function(index){
            var input = $(this);
            input.prop('value', 0);
        }
    );
}

function disableFields(form) {
    var _input  = '#' + form + ' input';
    var _text   = '#' + form + ' textarea';
    var _select = '#' + form + ' select';
    var _button = '#' + form + ' button';

    $(_input).each(
        function(index){
            var input = $(this);
            var _type = input.attr('type');
            switch (_type) {
                case 'text':
                    input.prop('disabled', true);
                    break;
                case 'number':
                    input.prop('disabled', true);
                    break;
                case 'hidden':
                    input.prop('disabled', true);
                    break;
                case 'checkbox':
                    input.prop('disabled', true);
                    break;
            }
        }
    );
    $(_text).each(
        function(index){
            var input = $(this);
            input.prop('disabled', true);
        }
    );
    $(_select).each(
        function(index){
            var input = $(this);
            input.prop('disabled', true);
        }
    );
    $(_button).each(
        function(index){
            var input = $(this);
            input.prop('disabled', true);
        }
    );
}Z

function clearTable(table) {
    var _table = '#' + table + ' tbody';
    $(_table).html("");
}