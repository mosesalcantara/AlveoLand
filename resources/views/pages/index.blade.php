@extends('layout.user.layout')
@section('title', 'Alveo')
@section('index')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <div class="ps-lg-5 position-fixed">
        <div class="bg-light rounded-bottom">
            <div class="row pt-5"></div>
            <div class="row ps-5 index-size">
                <div class="col-lg-4 px-lg-3 col-sm-12">
                    <div class="d-sm-flex d-lg-block justify-content-center">
                        <img src="https://www.alveoland.com.ph/static/alveo-land-home.svg" height="30" alt="">
                    </div>
                    <div class="lh-1">
                        <p style="font-size:4rem"><span style=" color:rgb(9, 161, 255)">Innovating </span><span>the way you
                                live</span></p>
                    </div>
                    <form id="index_search_properties_available">
                        @csrf
                        <div class="bg-none">
                            <div
                                class="input-group input-group-md mb-3 border-secondary border-opacity-10 border-1 text-secondary">
                                <select name="searchby" id=""
                                    class="form-control w-25 border-secondary border-opacity-10 border-1 text-secondary"
                                    style="outline: none">
                                    <option class="text-secondary p-3" value="">Search by</option>
                                    <option class="text-secondary p-3" value="city">City</option>
                                    <option class="text-secondary p-3" value="projectname">Project name</option>
                                </select>
                                <input name="tosearch" type="text"
                                    class="form-control w-50 mr-2 border-secondary border-opacity-10 border-1"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                <button type="submit" class="btn btn-secondary border-secondary fs-6">
                                    <div class="">
                                        <span><i class="fa-solid fa-magnifying-glass me-3"></i></span><span>Search</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="m-1">
                                <select name="type" class="form-control rounded-1 p-2 text-secondary me-3"
                                    id="">
                                    <option value="all">All Types</option>
                                    <option value="Condominium">Condominium</option>
                                    <option value="Lots">Lots</option>
                                    <option value="Office">office</option>
                                    <option value="Commercial">Commercial</option>
                                </select>
                            </div>
                            <input type="hidden" name="origin" value="main">
                            <div class="w-100 m-1">
                                <select name="price_range" class="form-control rounded-1 p-2 text-secondary me-3"
                                    id="">
                                    <option value="all">All Prices</option>
                                    <option value="5M-10M"><span>PHP</span>5M-10M</option>
                                    <option value="11M-15M"><span>PHP</span>11M-15M</option>
                                    <option value="16M-20M"><span>PHP</span>16M-20M</option>
                                    <option value="21M-Above"><span>PHP</span>21M-Above</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="d-lg-block d-sm-none">
                        <p>
                            Alveo Land Corp. is the Philippines’ leading innovative developer of vibrant communities and
                            groundbreaking living solutions.
                        </p>
                        <a class="btn text-primary fs-6" href="">Find out more</a>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12 d-lg-block d-sm-none">
                    <div class="container my-3 mt-5" id="featureContainer">
                        <div class="row mx-auto my-auto justify-content-center">
                            <div id="featureCarousel" class="carousel slide" data-bs-ride="carousel">
                                <!-- Carousel Controls. OPTIONAL -->
                                <div class="float-end pe-md-4">
                                    <a class="indicator" href="#featureCarousel" role="button" data-bs-slide="prev">
                                        <i class="fa-solid fa-less-than"></i>
                                    </a> &nbsp;&nbsp;
                                    <a class="w-aut indicator" href="#featureCarousel" role="button" data-bs-slide="next">
                                        <i class="fa-solid fa-greater-than"></i>
                                    </a>
                                </div>
                                <!-- Add Slides To The Carousel -->
                                <div class="carousel-inner" role="listbox">
                                    @if ($status == 200)
                                        @foreach ($projects as $project)
                                            @php
                                                $active = '';
                                                if ($projects[0]) {
                                                    $active = 'active';
                                                } else {
                                                    $active = '';
                                                }
                                            @endphp
                                            <div class=" carousel-item {{ $active }}">
                                                <div class="col-md-4">
                                                    <div data-id="{{ $project->id }}"
                                                        class="card display-units  rounded-2 property-view-btn"
                                                        style='cursor:pointer;background: linear-gradient(to top, rgba(7, 148, 236, 0.7), rgba(255, 255, 255, 0.001)), url("{{ asset('project/snapshots') }}/{{ $project->project_banner }}");
                                                                height:25rem; background-size:cover;'>

                                                        <div class="featured-city bg-light rounded-end px-3 py-2 h5">
                                                            {{ $project->city }}
                                                        </div>
                                                        <div
                                                            class="featured-property-name  border-bottom text-light py-2 h5">
                                                            {{ $project->project_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-sm-block d-lg-none px-sm-5 text-center">
                <p class="text-secondary">
                    Alveo Land Corp. is the Philippines’ leading innovative developer of vibrant communities and
                    groundbreaking living solutions.
                </p>
                <a class="btn text-primary fs-6" href="">Find out more</a>
            </div>
            <div class="d-flex justify-content-center-sm">
                <div class="">
                    <a href="" class="text-dark btn">Privacy</a>
                </div>
                <div class="">
                    <a href="" class="text-dark btn">Terms and Condition</a>
                </div>
                <div class="">
                    <a href="" class="text-dark btn">Property Listing</a>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('/js/user/search.js') }}"></script>
    <script>
        $(document).ready(function() {
            SearchProperty()
            PropertyViewBtn()
            DisplaySaleUnitEvent()
            // featuredProperties()
            $('#page-title').attr('title', 'Home')
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    {{-- 
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script> --}}
    <script>
        let myCarousel = document.querySelectorAll('#featureContainer .carousel .carousel-item');
        myCarousel.forEach((el) => {
            const minPerSlide = 3
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = myCarousel[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>



@endsection
