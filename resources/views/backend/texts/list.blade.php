@extends('adminpanel')
@section('breadcrumbs')
<li>
    <i class="icon-home home-icon"></i>
    <a href="/admin30x5/">Головна</a>

                                    <span class="divider">
                                        <i class="icon-angle-right arrow-icon"></i>
                                    </span>
</li>

<li class="active">Текстові блоки</li>
@stop
@section('content')
<div class="page-content">
    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">
                <h3 class="header smaller lighter blue">Текстові блоки</h3>

                <div class="table-header">
                    Список записів в тестових полях
                    <a href="/admin30x5/texts/create">
                        <button class="btn btn-warning">
                            <i class="icon-plus"></i>
                            Додати елемент
                        </button>
                    </a>
                </div>
                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="center">
                            ID
                        </th>
                        <th class="hidden-phone center">
                            Поле
                        </th>
                        <th class="hidden-phone center">
                            Значення
                        </th>
                        <th class="hidden-phone center">
                            Тип поля
                        </th>
                        <th class="hidden-phone center">
                            Альтерн. назва
                        </th>
                        <th class="center">
                            Пр-т
                        </th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                @foreach($admin_texts as $admin_text)
                    <tr>
                        <td class="center">
                            <label>
                                <span class="lbl">{{ $admin_text->id }}</span>
                            </label>
                        </td>
                        <td><a href="/admin30x5/texts/{{$admin_text->id}}">{{ $admin_text->getTranslate('title') }}</a></td>
                        <td>{{ str_limit($admin_text->getTranslate('description'), 80, '...') }}</td>
                        <td>{{ $admin_text->type }}</td>
                        <td>{{ $admin_text->name }}</td>
                        <td class="center">{{ $admin_text->priority }}</td>
                        <td class="td-actions">
                            <div class="visible-phone visible-desktop action-buttons">
                                <a class="green" href="/admin30x5/texts/{{$admin_text->id}}">
                                    <i class="icon-pencil bigger-130"></i>
                                </a>
                                <a href='/admin30x5/texts/{{$admin_text->id}}' data-id='{{$admin_text->id}}' class='resource-delete'>
                                <i class="icon-trash bigger-130"></i>
                                </a>
                            </div>

                        </td>

                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>

        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>
<div id="token" style="display: none">{{csrf_token()}}</div>
<script>
    $(function(){
        var oTable1 = $('#sample-table-2').dataTable( {
            "aaSorting": [[5,'desc']],
            "aoColumns": [
                { "bSortable": true,  "sWidth": "30px" },
                null, null,
                { "bSortable": false,  "sWidth": "90px" },
                { "bSortable": true,  "sWidth": "60px" },
                { "bSortable": true,  "sWidth": "60px" },
                { "bSortable": false,  "sWidth": "60px" }
            ] } );
    });
</script>
@stop