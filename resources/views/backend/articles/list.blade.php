@extends('adminpanel')


@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="/admin30x5/">Головна</a>

                                    <span class="divider">
                                        <i class="icon-angle-right arrow-icon"></i>
                                    </span>
    </li>

    <li class="active">{{$type}}</li>
@stop

@section('content')
<div class="page-content">
    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">
                <h3 class="header smaller lighter blue">{{$admin_category->name}}</h3>

                <div class="table-header">
                    Список в категорії {{$admin_category->name}}
                    <a href="/admin30x5/articles/{{$type}}/create">
                        <button class="btn btn-warning">
                            <i class="icon-plus"></i>
                                Додати елемент в категорію {{$admin_category->name}}
                        </button>
                    </a>
                </div>
                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            ID
                        </th>
                        <th class="center">Назва</th>
                        <th class="hidden-phone center">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Дата створення
                        </th>
                        <th class="hidden-phone center">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Дата оновлення
                        </th>

                       <!-- <th class="hidden-phone">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Update
                        </th>-->
                        <th class="hidden-480">Ціна</th>
                        <th>Статус</th>
                        <th>Пріоритет</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($admin_articles as $admin_article)
                            <tr>
                                <td class="center">
                                    <label>
                                        <span class="lbl">{{ $admin_article->id }}</span>
                                    </label>
                                </td>

                                <td>
                                    <a href="/admin30x5/articles/{{$type}}/{{$admin_article->id}}">{{ $admin_article->getTranslate('title') }}</a>
                                </td>
                                <td>{{ $admin_article->created_at }}</td>
                                <td class="hidden-480">{{ $admin_article->updated_at }}</td>
                                <td class="hidden-phone">{{ $admin_article->price }}</td>

                                <td class="hidden-480">
                                    @if($admin_article->active)
                                        <span class="label label-success">Активно</span>
                                    @else
                                        <span class="label label-inverse arrowed-in">Неактивно</span>
                                    @endif
                                </td>

                                <td class="hidden-phone">{{ $admin_article->priority }}</td>

                                <td class="td-actions">
                                    <div class="hidden-phone visible-desktop action-buttons">
                                        <a class="green" href="/admin30x5/articles/{{$type}}/{{$admin_article->id}}">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>

                                        <a href='/admin30x5/articles/{{$type}}/{{$admin_article->id}}' data-id='{{$admin_article->id}}' class='resource-delete'">
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>

                                    <div class="hidden-desktop visible-phone">
                                        <div class="inline position-relative">
                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-caret-down icon-only bigger-120"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                <span class="blue">
                                                                                    <i class="icon-zoom-in bigger-120"></i>
                                                                                </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                <span class="green">
                                                                                    <i class="icon-edit bigger-120"></i>
                                                                                </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                                <span class="red">
                                                                                    <i class="icon-trash bigger-120"></i>
                                                                                </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
         <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>
<div id="token" style="display: none">{{csrf_token()}}</div>
<script>
    $(function(){
        var oTable1 = $('#sample-table-2').dataTable( {
            "aaSorting": [[6,'desc']],
            "aoColumns": [
                { "bSortable": false },
                null, null,null, null,null, null,
                { "bSortable": false }
            ] } );
    });
</script>
@stop