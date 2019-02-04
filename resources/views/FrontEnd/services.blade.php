@extends('ws-app')

@section('content')

    <div class="content">

        <div class="content-title">

            <span class="category-name">{{ trans('base.servicescontenttitle') }}</span>

            <div class="content-title-line"><div class="flower-right"></div></div>

        </div>

        @foreach($services as $service)

           <div class="services-block" id="service-{{ $service -> id }}">

            <div class="services-title">{{ $service -> getTranslate('title') }}</div>

            <div class="service-title-line"></div>

            <div class="services-arrow-wrap">
                <div class="services-arrow"></div>
            </div>

            <div class="services-hide">

                <div class="clearfix">

                    <div class="services-price">

							<span class="services-price-name">{{ trans('base.cost') }}:
								<span class="services-price-value">

									<span class="price">{{ $service -> price }}</span>
                                    {{ trans('base.currency') }}
								</span>

							</span>

                    </div>

                    <div class="services-description">

                        {!! $service -> getTranslate('description') !!}

                    </div>

                </div>
                @if(count($service -> getImages()) > 0)

                    <div id="services-photo-id-{{ $service -> id }}" class="webstudio-gallery" style="display:none;">

                        @foreach($service -> getImages() as $imgSrc)

                            <img alt="" src="/{{ $imgSrc['min'] }}"
                                 data-image="/{{ $imgSrc['full'] }}">

                        @endforeach

                    </div>

                @endif

            </div>

        </div>

        @endforeach

    </div>

@stop