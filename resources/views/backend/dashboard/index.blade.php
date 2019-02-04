@extends('adminpanel')


@section('breadcrumbs')

    <li class="active">
        <i class="icon-home home-icon"></i>
        Головна
    </li>
@stop

@section('content')
<div class="page-content">
    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">
                <h3 class="header smaller lighter blue">Панель керування PremiumClub</h3>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Увага!</strong>

                    Оберіть необхідний для редагування розділ в лівому меню.
                    <br>
                </div>
            </div>
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>


@stop