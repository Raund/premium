<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
	<meta charset="utf-8">
	<title>@if(isset($meta)){{ $meta ->getTranslate('meta_title') }}@else Premium Club @endif</title>
	@if(isset($meta))
		<meta name="description" content="{{ $meta ->getTranslate('meta_description') }}">
		<meta name="keywords" content="{{ $meta ->getTranslate('meta_keywords') }}">
	@endif
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="{{ asset('/img/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="apple-touch-icon" href="{{ asset('/img/favicon/apple-touch-icon.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/favicon/apple-touch-icon-114x114.png') }}">

	<link href="{{ asset('/css/main.css') }}?ver={{ $version }}" rel="stylesheet">
	<link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">
	<link href="{{ asset('/libs/unitegallery/dist/css/unite-gallery.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="{{ asset('/css/plugins/sweetalert.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">

		<div class="top-line clearfix">

			<div class="top-line_sub-block sub-block-booking">

				<div class="top-line_booking"></div>

				<a @if(Request::is('*/booking'))class="active"@endif href="/{{ App::getLocale() }}/booking">{{ trans('base.booking') }}</a>

			</div>

			<div class="top-line_sub-block sub-block-3dtour">

				<div class="top-line_3dtour"></div>

				<a @if(Request::is('*/3dtour'))class="active"@endif href="/{{ App::getLocale() }}/3dtour">{{ trans('base.tour') }}</a>

			</div>

			<div class="top-line_sub-block">

				<div class="top-line_address"></div>

				<div class="address">{{ $texts->get('header.address') }}</div>

			</div>

			<div class="top-line_sub-block sub-block-phones">

				<div class="top-line_phones"></div>

				<ul class="phones">

					<li>{!!$texts->get('header.tel')!!}</li>
					<li><span class="phone-desc">( {{ trans('base.booking') }} )</span></li>

				</ul>

			</div>

			<div class="top-line_sub-block sub-block-lang">


				<ul class="lang clearfix">
				@foreach($langs as $lang)
					<li><a href="{{str_replace(url(App::getLocale()), url($lang->lang), Request::url())}}">{{$lang -> lang}}</a></li>
				@endforeach
				</ul>

			</div>

		</div>

		<div class="mnu-block">

			<div id="menu">

				<div id="menu-name">{{ trans('base.menu') }}</div>
				<div id="menu-close"></div>

				<ul id="menu-list">
					<li><a href="/{{ App::getLocale() }}">{{ trans('base.hotel') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/rooms">{{ trans('base.rooms') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/services">{{ trans('base.services') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/events">{{ trans('base.events') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/gallery">{{ trans('base.gallery') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/contact">{{ trans('base.contacts') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/3dtour">{{ trans('base.tour') }}</a></li>
					<li><a href="/{{ App::getLocale() }}/booking">{{ trans('base.booking') }}</a></li>
				</ul>

			</div>


			<nav>

				<a @if(Request::is(App::getLocale())) class="active"@endif href="/{{ App::getLocale() }}">{{ trans('base.hotel') }}</a>
				<a @if(Request::is('*/rooms'))class="active"@endif href="/{{ App::getLocale() }}/rooms">{{ trans('base.rooms') }}</a>
				<a @if(Request::is('*/services'))class="active"@endif href="/{{ App::getLocale() }}/services">{{ trans('base.services') }}</a>
				<a @if(Request::is('*/events'))class="active"@endif href="/{{ App::getLocale() }}/events">{{ trans('base.events') }}</a>
				<a @if(Request::is('*/gallery'))class="active"@endif href="/{{ App::getLocale() }}/gallery">{{ trans('base.gallery') }}</a>
				<a @if(Request::is('*/contact'))class="active"@endif href="/{{ App::getLocale() }}/contact">{{ trans('base.contacts') }}</a>

			</nav>

			<div class="logo-wrap">

				<div class="logo"><a href="/{{ App::getLocale() }}"><img src="{{ asset('/img/logo-header.png') }}" alt="Premium Club"></a></div>

				<div class="flower-left"></div>
				<div class="hotel-name-wrap">
					<div class="hotel-name">{!!$texts->get('top_title')!!}</div>
					<div class="logo-title">{!!$texts->get('footer_title')!!}</div>
				</div>
				<div class="flower-right"></div>

			</div>

		</div>

	</header>

	@yield('content')

	<footer>

		<div class="grey-block clearfix">

			<div class="hotel-photo">

				<div class="photo"></div>

				<h1>{{ trans('base.hotelphoto') }}</h1>

				<div id="webstudio-bottom-gallery" style="display:none;">

					@foreach($hotel -> getImages() as $imgSrc)

						<img alt="" src="/{{ $imgSrc['min'] }}"
							 data-image="/{{ $imgSrc['full'] }}">

					@endforeach

				</div>

			</div>

			<div class="callback-form">

				<div class="letter"></div>
				<h1>{{ trans('base.callback') }}</h1>

				<form id="contactform" method="post">

					<input id="name" name="name" placeholder="{{ trans('base.name') }}" required type="text">

					<textarea name="message" id="comment"  required type="text" placeholder="{{ trans('base.message') }}"></textarea> <br>
					<input id="email" name="email" placeholder="{{ trans('base.email') }}" required type="email"> <br>

					<input name="submit" id="submit" tabindex="5" value="{{ trans('base.send') }}" type="submit">
					<div id="token" style="display: none">{{csrf_token()}}</div>
				</form>
				<!--<form  id="frm"  method="post">

					<label class="h6">Имя / Фамилия</label>
					<input type="text" name="name" required="required" class="form-control">
					<label class="h6">E-mail</label>
					<input type="email" name="email" required="required" class="form-control">
					<label class="h6">Сообщение</label>
					<textarea rows="7" name="message" required="required" class="form-control"></textarea><br />

					кнопка <button type="submit" class="btn btn-primary" ><span class="fui-mail"></span></button>
					<div id="token" style="display: none">{{csrf_token()}}</div>
				</form>-->
			</div>

		</div>

		<div class="footer-mnu-block">

			<div class="clearfix">

				<div class="logo-wrap">

					<div class="logo"><img src="{{ asset('/img/logo-footer.png') }}" alt="Premium Club"></div>

					<ul class="social-block">
						<li><a href="{!!$texts->get('social.fb')!!}" class="fb"></a></li>
						<li><a href="{!!$texts->get('social.od')!!}" class="od"></a></li>
						<li><a href="{!!$texts->get('social.vk')!!}" class="vk"></a></li>
					</ul>

{{--
					<div class="logo-title">LUXURY HOTEL</div>
--}}

				</div>

				<ul>
					<li><a href="/{{ App::getLocale() }}">{{ trans('base.hotel') }}</a></li>
				</ul>

				<ul>
					<li><a href="/{{ App::getLocale() }}/rooms">{{ trans('base.rooms') }}</a></li>

                    @foreach($rooms as $room)

                        <li><a href="/{{ App::getLocale() }}/rooms/#room-{{ $room -> id }}">{{ $room -> getTranslate('title') }}</a></li>

                    @endforeach

				</ul>

				<ul>
					<li><a href="/{{ App::getLocale() }}/services">{{ trans('base.services') }}</a></li>

                    @foreach($services as $service)

                        <li><a href="/{{ App::getLocale() }}/services/#service-{{ $service -> id }}">{{ $service -> getTranslate('title') }}</a></li>

                    @endforeach

                </ul>

				<ul>
					<li><a href="/{{ App::getLocale() }}/events">{{ trans('base.events') }}</a></li>
				</ul>

				<ul>
					<li><a href="/{{ App::getLocale() }}/gallery">{{ trans('base.gallery') }}</a></li>
				</ul>

				<ul>
					<li><a href="/{{ App::getLocale() }}/contact">{{ trans('base.contacts') }}</a></li>
				</ul>

			</div>

			<div class="ft-line"><div class="flower-right-dark"></div></div>

		</div>

		<div class="top-line clearfix">

			<div class="top-line_sub-block sub-block-phones">

				<div class="top-line_phones"></div>

				<ul class="phones">

                    <li>{!!$texts->get('header.tel')!!}<span class="phone-desc">( {{ trans('base.booking') }} )</span></li>

				</ul>

			</div>

			<div class="top-line_sub-block">

				<div class="top-line_address"></div>

                <div class="address">{{ $texts->get('header.address') }}</div>

			</div>

            <div class="top-line_sub-block sub-block-3dtour">

                <div class="top-line_3dtour"></div>

                <a href="/{{ App::getLocale() }}/3dtour">{{ trans('base.tour') }}</a>

            </div>

			<div class="top-line_sub-block sub-block-booking">

				<div class="top-line_booking"></div>

				<a href="/{{ App::getLocale() }}/booking">{{ trans('base.booking') }}</a>

			</div>

		</div>

	</footer>

</div>

<script src="{{ asset('/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/js/common.js') }}?ver={{ $version }}"></script>

<script src="{{ asset('/libs/unitegallery/dist/themes/default/ug-theme-default.js') }}"></script>
<script src="{{ asset('/libs/unitegallery/dist/themes/slider/ug-theme-slider.js') }}"></script>
<script src="{{ asset('/libs/unitegallery/dist/themes/tiles/ug-theme-tiles.js') }}"></script>
<script src="{{ asset('/libs/unitegallery/dist/themes/tilesgrid/ug-theme-tilesgrid.js') }}"></script>
<script src="{{ asset('/libs/unitegallery/dist/themes/compact/ug-theme-compact.js') }}"></script>
<script src="{{ asset('/libs/unitegallery/dist/js/unitegallery.min.js') }}"></script>
<script src="{{ asset('/js/plugins/sweetalert.min.js') }}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>