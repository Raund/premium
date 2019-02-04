@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="/admin30x5/">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    @if(isset($type))
    <li>
        <a href="#">{{$type}}</a>

        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    @endif

    @if(isset($admin_article))
        <li class="active">{{$admin_article->id}}</li>
    @else
        <li class="active">Додати нову</li>
    @endif
@stop

@section('content')

<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            @if (isset($admin_article))
                Редагувати
            @else
                Додати
            @endif
        </h1>
    </div><!--/.page-header-->

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <form class="form-horizontal" id="resource-form" method="POST" action="" />
                @if($admin_category->hasField('price'))
                    <div class="control-group">
                        <label class="control-label" for="form-field-1">Ціна</label>

                        <div class="controls">
                            <input type="text" id="form-field-1" name="price" @if(isset($admin_article)) value='{{$admin_article->price}}'@endif  />
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('quantity'))
                    <div class="control-group">
                        <label class="control-label" for="form-field-2">Кількість</label>

                        <div class="controls">
                            <input type="number" id="form-field-2" name="quantity" @if(isset($admin_article)) value='{{$admin_article->quantity}}' @endif  />
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('priority'))
                <div class="control-group">
                    <label class="control-label" for="form-field-2">Пріоритет</label>

                    <div class="controls">
                        <input type="number" id="form-field-2" name="priority" @if(isset($admin_article)) value='{{$admin_article->priority}}' @endif  />
                    </div>
                </div>
                @endif
                @if($admin_category->hasField('active'))
                    <div class="control-group">
                        <label class="control-label">Статус</label>
                        <div class="controls">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label>
                                        <input name='active' type='hidden' value='0'>
                                        <input name='active' class="ace-switch ace-switch-6" type="checkbox" value=1 @if(isset($admin_article) AND $admin_article->active) checked="checked" @endif />
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('date'))
                    <div class="control-group">
                        <label class="control-label" for="id-date-picker-1">Дата проведення</label>
                        <div class="controls">
                            <div class="row-fluid input-append">
                                <input class="span2 date-picker" name="date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" @if(isset($admin_article)) value='{{date('d-m-Y',strtotime($admin_article->date))}}' @endif/>
                                <span class="add-on">
                                    <i class="icon-calendar"></i>
                               </span>
                        </div>
                    </div>
                @endif
                <div class="space-12"></div>
                <div class="row-fluid">
                    <div class="span12">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab2">
                                    @foreach($langs as $lang)
                                        <li @if(($lang->lang) == 'ua') class="active" @endif >
                                            <a data-toggle="tab" href="#{{$lang->lang}}">{{$lang->lang}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="tab-content">
                                @foreach($langs as $lang)
                                    <div id="{{$lang->lang}}" @if(($lang->lang) == 'ua') class="tab-pane in active" @else class="tab-pane" @endif>
                                    @if($admin_category->hasField('title'))
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-3">Назва</label>

                                            <div class="controls">
                                                <input type="text" name="title_{{$lang->lang}}" value='@if(isset($admin_article)){{ $admin_article->getTranslate('title', $lang->lang) }}@endif' id="form-field-3" placeholder="Назва номеру,події,послуги" />
                                            </div>
                                        </div>
                                    @endif
                                        @if($admin_category->hasField('meta_title'))
                                            <h4 class="header blue clearfix">SEO</h4>


                                            <div class="control-group">
                                                <label class="control-label" for="form-field-4">META Title</label>

                                                <div class="controls">
                                                    <input type="text" id="form-field-4" name="meta_title_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_title',$lang->lang) }}@endif"/>

                                                </div>
                                            </div>
                                        @endif
                                        @if($admin_category->hasField('meta_description'))
                                            <div class="control-group">
                                                <label class="control-label" for="form-field-5">META Description</label>

                                                <div class="controls">
                                                    <input type="text" id="form-field-5" name="meta_description_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_description',$lang->lang)}}@endif"/>
                                                </div>
                                            </div>
                                        @endif
                                        @if($admin_category->hasField('meta_keywords'))
                                            <div class="control-group">
                                                <label class="control-label" for="form-field-tags">META Keywords</label>

                                                <div class="controls">
                                                    <input type="text" name="meta_keywords_{{$lang->lang}}" class="form-field-tags" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_keywords',$lang->lang)}}@endif" placeholder="Введіть ключові слова ..." />
                                                </div>
                                            </div>
                                        @endif
                                    @if($admin_category->hasField('description'))
                                        <h4 class="header blue clearfix">Текст</h4>
                                           <div class="control-group">
                                               <textarea name="description_{{$lang->lang}}"class="span12" id="form-field-8" placeholder="Опис номеру, події, послуги">@if(isset($admin_article)){{ $admin_article->getTranslate('description',$lang->lang) }}@endif</textarea>


                                            </div>
                                    @endif

                                    </div>
                                @endforeach
                                @if ($admin_category->hasField('gallery'))
                                    @if(isset($admin_article))
                                    <h4 class="header green clearfix">
                                        Gallery
                                    </h4>
                                    <iframe
                                        frameborder="0"
                                        src="/js/backend/kcfinder/browse.php?type=images&langCode=ru&homedir=/{{$admin_article->id}}/&config=articles"
                                        style="width: 100%; height: 400px"
                                        title="Визуальный файловый браузер"
                                        tabindex="0"
                                        allowtransparency="true"></iframe>
                                    @else
                                    <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="icon-remove"></i>
                                        </button>
                                        <strong>Увага!</strong>

                                        Форма завантаження файлів до галереї буде доступною після створення даного запису (при наступному редагуванні)
                                        <br>
                                    </div>
                                    @endif
                                @endif
                            </div>

                    </div>
                </div>
                <div class="space-4"></div>
                <input type="hidden" name="_method" value='{{$action_method}}'/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-actions">
                    <button class="btn btn-info resource-save" type="button">
                        <i class="icon-ok bigger-110"></i>
                        Сохранить
                    </button>
                </div><!--<input type="button" class='article-save' value="Сохранить">-->
            </form>
            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->
<div id="token" style="display: none">{{csrf_token()}}</div>
@stop
    {{--<h2>Редагування</h2>
    <div class="edit">
            <form id="article-form" method="POST" action="">
                <div class="list-items"> Ціна
                    <input type="number" name="price" @if(isset($admin_article)) value='{{$admin_article->price}}'@endif/>
                </div><br>
                <div class="list-items"> Кількість
                    <input type="number" name="quantity" @if(isset($admin_article)) value='{{$admin_article->quantity}}' @endif/>
                </div><br>

                <div class="list-items"> Виберіть зображення
                    <input type="file" name="img" @if(isset($admin_article)) value='{{$admin_article->img}}' @endif/>
                </div><br>
                @foreach($langs as $lang)
                    <h3>Мова {{$lang->lang}}</h3>
                    <div class="list-items">Назва
                        <input type="text" name="title_{{$lang->lang}}" value='@if(isset($admin_article)) {{ $admin_article->getTranslate('title', $lang->lang) }} @endif'/>
                    </div><br>
                    <div class="list-items">Опис
                        <textarea name="description_{{$lang->lang}}" rows='5' cols='40'>@if(isset($admin_article)){{ $admin_article->getTranslate('description',$lang->lang) }}@endif</textarea>
                    </div><br>

                    <div class="list-items">Мета-заголовок
                        <input type="text" name="meta_title_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_title',$lang->lang) }} @endif"/>
                    </div><br>
                    <div class="list-items">Мета-опис
                        <input type="text" name="meta_description_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_description',$lang->lang)}} @endif"/>
                    </div><br>
                    <div class="list-items">Мета ключові слова
                        <input type="text" name="meta_keywords_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_keywords',$lang->lang)}} @endif"/>
                    </div><br>
                @endforeach
                <div class="list-items">Активувати?
                    <input name='active' type='hidden' value='0'>
                    <input name='active'type='checkbox' value=1 @if(isset($admin_article) AND $admin_article->active) checked="checked" @endif  />

                </div><br>
                <input type="hidden" name="_method" value='{{$action_method}}'/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="button" class='article-save' value="Сохранить">
            </form>
    </div>--}}
