@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="carousel slide" id="carouselID" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/H-img/3.jpg') }}" alt="" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/6.jpg') }}" alt="" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/4.jpg') }}" alt="" class="d-block w-100 rounded">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/H-img/5.jpg') }}" alt="" class="d-block w-100 rounded">
            </div>
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
    <hr class="hr" />
    <div class="row">
        <div class="cards-info col-sm-12 col-lg-3">
            <div class="card text-center">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <a href="" class="btn btn-link "><i class="bi bi-person-circle"></i></a>
                <div class="card-body">
                    <h1 class="card-title">NEW CUSTOMER</h1>
                    <a href="" class="btn btn-warning">SEE MORE</a>
                </div>
            </div>
        </div>
        <div class="cards-info col-sm-12 col-lg-3">
            <div class="card text-center">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <a href="" class="btn btn-link "><i class="bi bi-person-circle"></i></a>
                <div class="card-body">
                    <h1 class="card-title">EXPLORE CEB</h1>
                    <a href="" class="btn btn-warning">SEE MORE</a>
                </div>
            </div>
        </div>
        <div class="cards-info col-sm-12 col-lg-3">
            <div class="card text-center">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <a href="" class="btn btn-link "><i class="bi bi-person-circle"></i></a>
                <div class="card-body">
                    <h1 class="card-title">ABOUT US</h1>
                    <a href="" class="btn btn-warning">SEE MORE</a>
                </div>
            </div>
        </div>
        <div class="cards-info col-sm-12 col-lg-3">
            <div class="card text-center">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <a href="" class="btn btn-link "><i class="bi bi-person-circle"></i></a>
                <div class="card-body">
                    <h1 class="card-title">CONTACT</h1>
                    <a href="" class="btn btn-warning">SEE MORE</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="col-info" style="padding: 10px;">
                <h2 class="h4 lead fw-bold">ONLINE PAYMENT</h2>
                <p class="h5 lead">Settle your bill by credit card through the CEB Quick Payment Mode.
                    Just Enter your CEB Account Number and you are good to Pay ! CEB Quick Payment Mode.
                </p>
            </div>
        </div>
        
        <div class="col-md-6">
            <img src="{{ asset('img/H-img/e-img.jpg') }}" alt="" class="img-fluid rounded">
        </div>
    </div>

    <div class="row mt-3">
        <div class="text-center row">
            <h2 class="fw-bold">OUR CUSTOMER'S SAY</h2>
        </div>
        <div class="row">
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/H-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h5 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis,
                                spernatur iste adipisci necessitatibus.</small></h5>
                    </div>
                </div>
            </div>
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/H-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h5 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis,
                                spernatur iste adipisci necessitatibus.</small></h5>
                    </div>
                </div>
            </div>
            <div class="customer-say col-sm-12 col-xl-4">
                <div class="card-wrp">
                    <div class="img-wrp">
                        <img src="{{ asset('img/H-img/person.jpg') }}" alt="" class="card-img rounded">
                    </div>
                    <div class="card-body">
                        <h5 class="lead card-text"><small>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi similique rem libero voluptate
                                autem quibusdam aliquid dolorum suscipit, rerum perferendis,
                                spernatur iste adipisci necessitatibus.</small></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection