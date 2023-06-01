@extends('layouts.guest')

@section('content')
<!-- carousel -->
<div class="container-fluid carousel-full">
    <div class="carousel slide carousel-slide" id="carouselID" data-bs-ride="carousel" data-interval="50">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/H-img/3.jpg') }}" alt="" class="d-block w-100">
                <div class="carousel-caption">
                    <h6 class="text-dark"><small>Norochcholai Coal Power Plant</small></h6>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/6.jpg') }}" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/4.jpg') }}" alt="" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/5.jpg') }}" alt="" class="d-block w-100">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselID" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselID" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="carousel-text text-center" style="background-color: rgba(0, 0, 0, 0.9);">
        <h1 class="text-warning fw-bold">ENRICH LIFE THROUGH POWER</h1>
        <H3 class="text-light">ILLUMINATING THE MOTHERLAND</H3>
    </div>

</div>


<hr class="hr" />
<div class="container">
    <div class="ceb-about">
        <div class="row">
            <div class="col-md-6" style="padding: 10px;">
                <h1 class="lead fw-bold">Ceylon Electrical Board</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus,
                    ea? Provident dignissimos possimus numquam ut nulla. Quas eaque
                    nemo doloribus autem. Deserunt voluptatibus temporibus autem dicta
                    fugiat animi corporis molestiae.</p>
                <div class="button">
                    <a href="" class="btn btn-warning">Read More</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/back-img/ceb-h.jpg') }}" alt="" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="text-center row">
            <h1 class="lead fw-bold mb-3">OUR SERVICE'S</h1>
        </div>
        <div class="col-md-6">
            <div class="features">
                <div class="card-wrp">
                    <div class="card-body text-center">
                        <h1 class="fw-bold lead">ONLINE PAYMENT</h1>
                        <p class="card-text">Settle your bill by credit card through the CEB Quick Payment Mode.
                            Just Enter your CEB Account Number and you are good to Pay ! CEB Quick Payment Mode.</p>
                        <div class="button">
                            <a href="" class="btn btn-warning w-25">Go</a>
                        </div>
                    </div>
                    <div class="img-wrp">
                        <img src="{{ asset('img/back-img/on-pay.jpg') }}" alt="" class="card-img rounded">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="features">
                <div class="card-wrp">
                    <div class="card-body text-center">
                        <h1 class="lead fw-bold">ONLINE BILL</h1>
                        <p class="card-text">Settle your bill by credit card through the CEB Quick Payment Mode.
                            Just Enter your CEB Account Number and you are good to Pay ! CEB Quick Payment Mode.</p>
                        <div class="button">
                            <a href="" class="btn btn-warning w-25">Go</a>
                        </div>
                    </div>
                    <div class="img-wrp">
                        <img src="{{ asset('img/back-img/on-pay.jpg') }}" alt="" class="card-img rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="text-center">
            <h1 class="lead fw-bold">OUR COVERAGE</h1>
        </div>
        <div class="c-img text-center">
            <img src="{{ asset('img/back-img/ceb_map.jpg')}}" alt="" class="w-50">
        </div>
    </div>
    <div class="row mt-5">
        <div class="text-center row">
            <h1 class="lead fw-bold">OUR CUSTOMER'S SAY</h1>
        </div>
        <div class="row mt-2">
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/back-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h6 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis
                                .......</small></h6>

                        <div class="button">
                            <a href="" class="btn btn-warning">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/back-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h6 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis 
                                .......</small></h6>

                        <div class="button">
                            <a href="" class="btn btn-warning">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/back-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h6 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis
                                .......</small></h6>

                        <div class="button">
                            <a href="" class="btn btn-warning">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="contact-us">
            <h1 class="text-center lead fw-bold">Contact Us</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="ceb-details mt-3">
                        <div class="web d-flex">
                            <button type="button" class="btn btn-dark rounded-circle floating btn me-2"><i class="bi bi-globe"></i></button>
                            <a href="" class="mt-2">www.CEB.com</a>
                        </div>
                        <div class="address d-flex mt-4">
                            <button type="button" class="btn btn-dark rounded-circle floating btn me-2"><i class="bi bi-geo-alt-fill"></i></button>
                            <h6 class="mt-2">No 3, Galle Road, Colombo</h6>
                        </div>
                        <div class="mail d-flex mt-4">
                            <button type="button" class="btn btn-dark rounded-circle floating btn me-2"><i class="bi bi-envelope"></i></button>
                            <a href="" class="mt-2">infoCEB@gmail.com</a>
                        </div>
                        <div class="mail d-flex mt-4">
                            <button type="button" class="btn btn-dark rounded-circle floating btn me-2"><i class="bi bi-phone"></i></button>
                            <h6 class="mt-2">091-5678548</h6>
                        </div>

                        <div class="follow-icon d-flex mt-5 justify-content-center">
                            <div class="facebook">
                                <a href="" class="btn btn-link floating btn"><img src="{{ asset('img/icon-img/facebook.png')}}" class="img-fluid" /></a>
                            </div>
                            <div class="youtube">
                                <a href="" class="btn btn-link floating btn"><img src="{{ asset('img/icon-img/youtube.png')}}" class="img-fluid" /></a>
                            </div>
                            <div class="instagram">
                                <a href="" class="btn btn-link floating btn"><img src="{{ asset('img/icon-img/instagram.png')}}" class="img-fluid" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="">
                        <div class="form-outline mb-2">
                            <label for="" class="form-label">Name:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-outline mb-2">
                            <label for="" class="form-label">E-mail:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-outline mb-2">
                            <label for="" class="form-label">Message:</label>
                            <textarea name="" id="" class="form-control" rows="5" cols="10"></textarea>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-success">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection