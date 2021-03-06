


@extends('web.layout.app')

@push('css')
<style>
    .service__redesign__slider .slick-prev {
    background: #E9E9E9;
    padding: 20px;
    left: -64px;
    border-radius: 50%;
}
[dir="rtl"] .slick-prev {
    right: 102%;
    left: auto;
}
</style>
@endpush

@section('main')
@php
    $locale = app()->getLocale();
@endphp
<!-- service__main__hero -->
<section class="service__main__hero">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-2 order-sm-2 order-md-2 order-lg-1">
                <div class="hero-text">
                    <h3 style="{{$locale == 'ar'?'text-align: right':''}}">{{$locale == 'ar'?' هذا هو المكان المناسب للعثور ما تحتاج إليه من خدمات بمختلف المجالات والانشطة':'Here is the Right Place to
                        Find Perfect Services'}}</h3>
                        <form action="{{url("servicepage")}}" method="post">
                            @csrf
                        <div class="input-search">
                           <input type="text" name="search" placeholder="{{$locale=='ar'?'البحث عن خدمات':'Find Services'}}">
                           <button type="submit" style="{{$locale=='ar'?'margin-left: 10px;
                           padding: 10px 41px;':''}}">{{$locale == 'ar'?'  بحث':'Search'}}</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-1 order-sm-1 order-md-1 order-lg-2">
                <div class="hero-img">
                    <img src="{{asset('/assets/web/img')}}/banner-image_choice-01.png" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service__main__hero./ -->

<!-- service__redesign__slider -->
<section class="service__redesign__slider">
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="popular__service" style="{{$locale=='ar'?'text-align: right':''}}">{{$locale=='ar'?'الخدمات المتاحة':'Available Services'}}</div>
            </div>
        </div>
        <div class="row slider__container">
            @forelse ($service_sliders as $item)

            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{url($item->image)}}" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>{{$locale == "ar"?$item->title_ar:$item->title}}</h4>
                        <h6>{{$locale == "ar"?$item->sub_title_ar:$item->sub_title}}</h6>
                    </div>
                </a>
            </div>
            @empty
                {{ "no data" }}
            @endforelse
            {{-- <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-canva-studio-3194518.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>Web Design</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div> --}}
            {{-- <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-designecologist-1779487.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>Online Marketing</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-negative-space-34600.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>Business Consulting</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-39284.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>Business Consulting</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>App Development</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-tranmautritam-326501.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>App Development</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="image__holder">
                    <img src="{{asset('/assets/web/img')}}/pexels-tranmautritam-326503.jpg" class="w-100" alt="img">
                    <div class="img__overlay">
                        <h4>App Development</h4>
                        <h6>Make your own app</h6>
                    </div>
                </a>

            </div> --}}
        </div>
    </div>
</section>
<!-- slider./ -->

<!-- service__redesign__main -->
<section class="service__redesign__main">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <div class="category__links">
                    <a href="#">
                        <p>{{$locale == 'ar'?'فئة البحث':' '}}</p>
                    </a>
                    <form action="{{url('/servicepage')}}" method="post">
                        @csrf
                        <div class="category__search" class="w-100">
                            <input type="text" name="cat_search">
                            <button style="outline: none;border:none;background:transparent;" type="submit"><i class="fas fa-search" style="{{$locale=='ar'?'padding:0px':''}}"></i></button>
                        </div>
                   </form>
                    @forelse ($categories as $item)

                        <a href="{{url('/servicepage')}}/{{$item->id}}">
                            <p>{{$locale=='ar'?$item->name_ar??'':$item->name}}</p>
                            @php
                               echo $item->id== $cat_id? '<i class="fas fa-chevron-right"></i>':'';
                            @endphp
                        </a>
                    @empty
                        {{ "no category" }}
                    @endforelse

                </div>
            </div>
            <div class="col-12 col-sm-1 col-md-12 col-lg-9">
                <div class="row">

                    @forelse ($services as $item)

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 cards my-4">
                            <a href="{{route('service.details',['id'=>$item->id])}}">
                                <img src="{{url($item->image)}}" class="w-100" height="248"  alt="img">
                                <h4 style="{{$locale=='ar'? 'text-align:right;':''}}">{{$locale=='ar'?$item->title_ar??'':$item->title}}</h4>
                                <p style="{{$locale=='ar'? 'text-align:right;':''}}">{{getDotStr($locale=='ar'?$item->description_ar:$item->description)}}</p>
                                <a href="{{route('service.details',['id'=>$item->id])}}" class="place__order__btn">{{$locale=='ar'?'عرض التفاصيل':'View Details'}}</a>
                            </a>
                        </div>
                    @empty
                       {{ "no services are available in this category" }}
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>
<!-- service__redesign__main./ -->
@endsection

@push('js')

@endpush


