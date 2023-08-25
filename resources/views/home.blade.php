@extends('layout.layout')
@section('content')

    <div class="main">
        <!-- Slider -->
        <div class="main-slider position-relative">
            @if ($slide->isEmpty())
                <p>Không có dữ liệu slide.</p>
            @else
                <div class="swiper SwiperSlide">
                    <div class="swiper-wrapper">
                        @foreach($slide as $item)
                        <div class="swiper-slide">
                            <img class="img-fluid w-100" src="{{ asset('storage/images/slides/'. $item->image) }}" alt="Slide Image">
                            <div class="slide-container container">
                                <div class="main-slider__content">
                                    <h1 class="title">{{ $item->title }}</h1>
                                    <p class="desc">
                                        {{ $item->short_desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-button">
                        <div class="swiper-button-next">
                            <img src="/temp/images/icon/arrow-right.png" alt="">
                        </div>
                        <div class="swiper-button-prev">
                            <img src="/temp/images/icon/arrow-left.png" alt="">
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <!-- Content -->
        <div class="main-content">

            <!--  -->
            <div class=" main-content__mission container">
                @if ($mission->isEmpty())
                    <p>Không có dữ liệu sứ mệnh.</p>
                @else
                    @foreach($mission as $item)
                    <div class="top d-flex position-relative">
                        <div class="left flex-column">
                            <img src="{{ asset('storage/images/mission/logo/'. $item->logo) }}" class="img-aboutus" alt="">
                            <h3 class="title">
                                {{$item->subtitle}}
                            </h3>
                            <h1 class="quotes">
                                {{$item->title}}
                            </h1>
                            <div class="desc">
                                {!! $item->desc !!}
                            </div>
                            <button class="mission-btn">Xem thêm</button>
                        </div>
                        <div class="right flex-center">
                            @foreach(json_decode($item->image) as $image)
                                <img class="img-fluid" width="247" height="247" src="{{ asset('storage/images/mission/' . $image) }}" alt="">
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="bottom swiper slide-mission">
                    <div class="swiper-wrapper">
                        @if ($missionChildren->isEmpty())
                            <p>Không có dữ liệu sứ mệnh.</p>
                        @else
                            @foreach ($missionChildren as $missionChild)
                            <div class="swiper-slide">
                                <div class="mission-item text-center">
                                    <img width="78" height="78" src="{{ asset('storage/images/listMissions/' . $missionChild->thumb) }}" class="icon" alt="">
                                    <h2 class="title">{{ $missionChild->title }}</h2>
                                    <p class="desc">
                                        {{ $missionChild->desc }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
                <!--  -->
            <div class="main-content__service">
                @foreach($service as $item)
                    <div class="container d-flex  position-relative">
                        <img src="{{asset('storage/images/sections/'. $item->thumb)}}" alt="" class="service-img position-absolute">
                        <div class="left w-100">
                            <h1 class="title">
                                {{ $item->title }}
                            </h1>
                        </div>
                        <div class="right w-100 flex-column">
                            <p>{{ $item->desc }}</p>
                            <span class="bar"></span>
                        </div>
                    </div>
                @endforeach
                <div class="list-service">
                   <div class="container d-flex position-relative">
                       @if ($serviceChildren->isEmpty())
                           <p>Không có dữ liệu dịch vụ.</p>
                       @else
                           @foreach($serviceChildren as $item)
                               <div class="list-service__item text-center">
                                   <img src="{{ asset('storage/images/listServices/' . $item->thumb) }}" alt="" class="icon">
                                   <h2 class="title">{{$item->title}}</h2>
                                   <p class="desc">
                                       {{$item->desc}}
                                   </p>
                               </div>
                           @endforeach
                       @endif
                   </div>
                </div>
            </div>

            <!--  -->
            <div class="main-content__testimonial container position-relative">
                @foreach($testimo as $item)
                    <img src="{{asset('storage/images/sections/' . $item->thumb)}}" class="position-absolute testimonial-logo" alt="">
                    <img src="temp/images/icon/quote-icon.png" class="testimonial-logoQuote position-absolute" alt="">
                    <div class="content">
                        <h1 class="title text-center">
                            {{$item->title}}
                        </h1>
                @endforeach
                   <div class="swiper slide-review">
                       <div class="swiper-wrapper">
                           @if ($testimoChildren->isEmpty())
                               <p>Không có dữ liệu sứ mệnh.</p>
                           @else
                               @foreach ($testimoChildren as $testimoChild)
                                   <div class="swiper-slide">
                                       <div class="testimonial-review">
                                           <div class="info d-flex">
                                               <img src="{{asset('storage/images/testimonials/' . $testimoChild->thumb)}}" width="66" alt="" class="avatar">
                                               <div class="info-detail">
                                                   <h4 class="name">
                                                       {{$testimoChild->name}}
                                                   </h4>
                                                   <p class="level">
                                                       {{$testimoChild->position}}
                                                   </p>
                                               </div>
                                           </div>
                                           <p class="review">
                                               {{$testimoChild->comment}}
                                           </p>
                                       </div>
                                   </div>
                               @endforeach
                           @endif
                       </div>
                       <div class="swiper-pagination"></div>
                   </div>
               </div>
            </div>

            <!--  -->
            <div class="main-content__customer">
                <div class="container position-relative">
                    @foreach($customer as $item)
                        <img src="{{asset('storage/images/sections/' . $item->thumb)}}" class="customer-logo position-absolute" alt="">
                        <h1 class="title text-center">{{$item->title}}</h1>
                    @endforeach

                    <div class="swiper slide-customer">
                        <div class="swiper-wrapper">
                            @if ($customerChildren->isEmpty())
                                <p>Không có dữ liệu sứ mệnh.</p>
                            @else
                                @foreach($customerChildren as $item)
                                    <div class="swiper-slide">
                                        <div class="customer-list__item">
                                            <img src="{{asset('storage/images/customers/' . $item->thumb)}}" alt="" class="customer-img">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <!--  -->
            <div class="main-content__news container position-relative">
                @foreach($cate as $item)
                    <img src="{{asset('storage/images/sections/' . $item->thumb)}}" alt="" class="logo-blog position-absolute">
                    <h1 class="title">{{$item->title}}</h1>
                @endforeach
                <div class="news d-flex">
                    <div class="news-left">
                            <h3 class="d-flex news-left__title">
                                <p></p>
                                Tin nội bộ
                            </h3>
                        <div class="top">
                            <a href="">
                                <img src="temp/images/new1.jpg" alt="" class="news-left__img">
                            </a>
                            <h2 class="news-left__subtitle">
                                <a href="">Danh mục thiết bị bắt buộc phải kiểm định an toàn</a>
                            </h2>
                            <p class="news-left__date">02.03.2021</p>
                        </div>
                        <ul class="bottom">
                            <li class="news-left__list">
                                <a href="">
                                    Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                </a>
                            </li>
                            <li class="news-left__list">
                                <a href="">
                                    Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                </a>
                            </li>
                            <li class="news-left__list">
                                <a href="">
                                    Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="news-right">
                        <h3 class="d-flex news-right__title">
                            <p></p>
                            Tin ngành
                        </h3>
                        <div class="list">
                            <div class="news-right__item d-flex">
                                <a href="">
                                    <img src="temp/images/newright1.jpg" alt="">
                                </a>
                               <div class="content">
                                   <a href="" class="title">
                                       Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                   </a>
                                   <p class="date">
                                       02.03.2021
                                   </p>
                                   <p class="desc">
                                       Theo quy định của Nhà nước đối với các thiết bị máy móc có nguy cơ gây mất an toàn lao động khi vận hành và ảnh hưởng …
                                   </p>
                               </div>
                            </div>
                            <div class="news-right__item d-flex">
                                <a href="">
                                    <img src="temp/images/newright2.jpg" alt="">
                                </a>
                                <div class="content">
                                    <a href="" class="title">
                                        Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                    </a>
                                    <p class="date">
                                        02.03.2021
                                    </p>
                                    <p class="desc">
                                        Theo quy định của Nhà nước đối với các thiết bị máy móc có nguy cơ gây mất an toàn lao động khi vận hành và ảnh hưởng …
                                    </p>
                                </div>
                            </div>
                            <div class="news-right__item d-flex">
                                <a href="">
                                    <img src="temp/images/newright3.jpg" alt="">
                                </a>
                                <div class="content">
                                    <a href="" class="title">
                                        Danh mục thiết bị bắt buộc phải kiểm định an toàn
                                    </a>
                                    <p class="date">
                                        02.03.2021
                                    </p>
                                    <p class="desc">
                                        Theo quy định của Nhà nước đối với các thiết bị máy móc có nguy cơ gây mất an toàn lao động khi vận hành và ảnh hưởng …
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
