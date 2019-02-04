@extends('ws-app')

@section('content')

    <div class="content-rooms">

        <div class="content-title">

            <span class="category-name">{{ trans('base.roomscontenttitle') }}</span>

            <div class="content-title-line"><div class="flower-right"></div></div>

        </div>
        @foreach($rooms as $room)

            <div id="room-{{ $room -> id }}" class="rooms-block clearfix">

                <div class="clearfix">

                    @if(count($room -> getImages()) > 0)

                        <div class="img-block">

                            <div id="webstudio-gallery-id-{{ $room -> id }}" class="webstudio-gallery-rooms" style="display:none;">

                                @foreach($room -> getImages() as $imgSrc)

                                    <img alt="" src="/{{ $imgSrc['min'] }}"
                                         data-image="/{{ $imgSrc['full'] }}">

                                @endforeach

                            </div>

                        </div>

                    @else

                        <div class="img-block" style="border: 1px solid #E5AF51; background-image: url({{ asset('/img/no-img.png') }}); background-repeat: no-repeat; background-position: center;"></div>

                    @endif

                    <div class="describe-block">

                        <h1>{{ $room -> getTranslate('title') }}</h1>

                        <span>{{ trans('base.quantity') }}:<span class="qnty">{{ $room -> quantity }}</span></span>

                        <div class="describe-room">

                            {!! $room -> getTranslate('description') !!}

                        </div>

                    </div>

                    <div class="price-block">

                        <span>{{ trans('base.cost') }}:<span class="price">{{ $room -> price }} {{ trans('base.currency') }}</span></span>

                        <a class="booking-btn-in-rooms" href="/{{ App::getLocale() }}/booking">{{ trans('base.booking') }}</a>

                    </div>

                </div>

                <div class="r-tab conveniences-line">

                    <span>{{ trans('base.conveniences') }}</span>

                    <div class="arrow-conveniences"></div>

                </div>

                <div class="conveniences-block clearfix"></div>

            </div>

        @endforeach

    </div>




@stop