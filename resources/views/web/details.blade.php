

@extends('web.layout.app')

@section('main')
<!-- details__redesign__hero -->
<section class="details__redesign__hero">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-2 order-sm-2 order-md-2 order-lg-1">
                <div class="hero-text">
                    <h3 class="">Here is the Right Place to
                        Find Perfect Services</h3>
                        <form action="{{url("servicepage")}}" method="post">
                            @csrf
                            <div class="input-search">
                                <input type="text" name="search" placeholder="Find Services">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    <p class="popular__tags">Popular search: App Development;  Website Development; Graphics Design; Icon</p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 order-1 order-sm-1 order-md-1 order-lg-2">
                <div class="hero-img">
                    <img src="{{asset('/assets/web/img')}}/banner-image_choice-01.png" class="w-100" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- details__redesign__hero./ -->

<!-- details__redesign__imgcard -->
<section class="details__redesign__imgcard">
    <div class="container">
        <div class="card">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="card__image">
                        <img src="{{url($service->image)}}" alt="img">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                  <div class="card__text p-4">
                      <h4 class="card__text__title">{{$service->title}}</h4>
                       <div class="card__review d-flex my-3">
                           <p class="mr-2">Customer Reviews: </p>
                           <div class="stars mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                           </div>
                           <div class="ratings">
                               (120/5)
                           </div>
                       </div>
                       <p class="card__text__details__text">{{$service->description}}</p>
                       @php
                           function getTagsArr($tags){
                               $tags_arr = explode(',',$tags);
                               return $tags_arr;
                           }
                       @endphp
                       <div class="reated__tags">
                           <p>Related Tags:</p>
                           @forelse (getTagsArr($service->tags) as $item)

                           <span>{{$item}}</span>
                           @empty
                             {{ "no tags" }}
                           @endforelse

                      </div>
                      <div class="buttons">
                          <a href="{{url("place-order/".$service->id)}}">Place Order</a>
                          <a href="{{route("contact")}}" class="ml-4">Contact us</a>
                      </div>
                      <div class="share">
                          <span>Share:</span>
                          <span class="share__icons">
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                              <a href=""><i class="fab fa-twitter"></i></a>
                              <a href=""><i class="fab fa-youtube"></i></a>
                              <a href=""><i class="fab fa-linkedin-in"></i></a>
                              <a href=""><i class="fab fa-pinterest-p"></i></a>
                          </span>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- details__redesign__imgcard./ -->

<!-- details__redesign__tabs -->
<section class="details__redesign__tabs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    @forelse (['Description','Information','Vendor','Reviews'] as $item)
                        <a style=" cursor :pointer;" class="active_tab">
                            <span id="tab" data-id="{{$service->id}}">{{$item}}</span>
                        </a>
                    @empty

                    @endforelse

                </div>
                <div class="tabs__details shadow">
                    <p id="tab_data">
                        {{$service->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- details__redesign__tabs./ -->

<!-- details__redesign__slider -->
<section class="details__redesign__slider">
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="popular__service">Populer Services</div>
            </div>
        </div>
        <div class="row details__redesign__slider__container">
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-canva-studio-3194518.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-designecologist-1779487.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-39284.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" alt="img">
                </a>
            </div>
            <div class="col-3">
                <a href="#">
                    <img src="{{asset('/assets/web/img')}}/pexels-pixabay-461064.jpg" alt="img">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- details__redesign__slider./ -->
@endsection

@push('js')

 <script>
     $(document).ready(function(){
        //  console.log('hello')
         $(document).on('click','#tab',function(){


             let tab = $(this).text().toLowerCase();
             let service_id = $(this).data('id');


            //making active tab
             let tabs = document.getElementsByClassName('active_tab');
             console.log( tabs[0]);
             for(let i=0;i<tabs.length;i++){
                tabs[i].innerText.toLowerCase() == tab ? tabs[i].classList.add('active') : tabs[i].classList.remove('active');
             }


             $.ajax({
                 url: `{{url('get_tabdata/${tab}/${service_id}')}}`,
                 method:'get',
                 success:function(res){
                     console.log(res);
                     if(typeof res.tab == 'object'){
                         let {name,email,company_name,phone} = res.tab
                         $('#tab_data').html(`

                         <p>verndor name: ${name}</p> <br>
                         <p>verndor email: ${email}</p> <br>
                         <p>verndor email: ${email}</p> <br>
                         <p>verndor phone: ${phone}</p> <br>
                         <p>company name: ${company_name}</p> <br>

                         `)
                     } else{

                       $('#tab_data').text(res.tab)
                     }
                 }
             })
         })
     })
 </script>
@endpush


