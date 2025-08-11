
<div class="banner">
    <x-main-menu/>
</div>

<div class="container-fluid p-0">
    <div class="banner">
        <img src="{{ asset('image/slider_1.webp') }}" alt="Slider 1" style ="padding-top: 90px;"class="full-width-banner">
        <img src="{{ asset('image/banner_top.webp') }}" alt="Banner Top" class="full-width-banner">
    </div>

    <div class="row m-0">
        <div class="col-lg-7 bg-white p-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('image\banner23.webp') }}" class="d-block w-100" alt="..." style="width: 732px; height: 370px;">
    
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image\banner24.webp') }}" class="d-block w-100" alt="..." style="width: 732px; height: 370px;">
    
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image\slide2.jpg') }}" class="d-block w-100" alt="..." style="width: 732px; height: 370px;">
    
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('image\slide3.jpg') }}" class="d-block w-100" alt="..." style="width: 732px; height: 370px;">
                        
                    </div>
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
        <div class="col-lg-5 bg-white p-3">
            <img src="{{ asset('image/qc1.jpg') }}" style="height:120px; width:100%;" alt="Quảng cáo 1">
            <img src="{{ asset('image/qc2.jpg') }}" style="height:120px; width:100%; margin-top:5px;" alt="Quảng cáo 2">
            <img src="{{ asset('image/qc3.jpg') }}" style="height:120px; width:100%; margin-top:5px;" alt="Quảng cáo 3">
        </div>
    </div>

    <div class="banner">
        <img src="{{ asset('image/banner1.webp')}}" alt="Banner 1" class="full-width-banner">
    </div>
</div>

<style>
.full-width-banner {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    display: block;
    
}

.carousel-img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

@media (max-width: 768px) {
    .full-width-banner {
        max-height: 300px;
    }
    .carousel-img {
        height: 250px;
    }
}
</style>