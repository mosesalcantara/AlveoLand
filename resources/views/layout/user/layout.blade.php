<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/user/index.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://kit.fontawesome.com/a051b84b57.js" crossorigin="anonymous"></script>



</head>

<body>
    {{-- 
    <div id="loader" class="p-5 bg-white p-3 w-100" style="height: 100vh; position: fixed; z-index:">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="h1">ALVEO LAND</div>
        </div>
    </div> --}}



    <div class="offcanvas offcanvas-end w-25" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header text-center">

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center">
            </div>
            <form id="calculator-form" class="">
                <h3 class="text-dark">Housing Loan Calculator</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control loan-selling-price" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Selling Price</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating w-100">
                            <select class="form-select loan-property-type" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Choose</option>
                                <option value="House & Lot">House & Lot</option>
                                <option value="Residential Condominium">Residential Condominium</option>
                                <option value="Lot Purchase">Lot Purchase</option>
                                <option value="Property Acquisition (OFW)">Property Acquisition (OFW)
                                </option>
                            </select>
                            <label for="floatingSelect">Property Type</label>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control loan-interest-rate" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Interst Rate</label>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating w-100">
                            <select class="form-select loan-downpayment" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Choose</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                >
                            </select>
                            <label for="floatingSelect">Downpayment</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating w-100">
                            <select class="form-select loan-term" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Choose</option>
                                <option value="1">1 Year</option>
                                <option value="2">2 Years</option>
                                <option value="3">3 Years</option>
                                <option value="4">4 Years</option>
                                <option value="5">5 Years</option>
                                <option value="6">6 Years</option>
                                <option value="7">7 Years</option>
                                <option value="8">8 Years</option>
                                <option value="9">9 Years</option>
                                <option value="10">10 Years</option>
                                <option value="11">11 Years</option>
                                <option value="12">12 Years</option>
                                <option value="13">13 Years</option>
                                <option value="14">14 Years</option>
                                <option value="15">15 Years</option>
                                <option value="16">16 Years</option>
                                <option value="17">17 Years</option>
                                <option value="18">18 Years</option>
                                <option value="19">19 Years</option>
                                <option value="20">20 Years</option>

                            </select>
                            <label for="floatingSelect">Payment Term</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary w-100 mt-3 loan-calculate me-3">Calculate</button>
                    <button type="button" class="btn btn-primary w-100 mt-3 loan-calculate-clear">Clear</button>
                </div>
            </form>
            <div class=" mt-3 border p-3">
                <div id="loan-results" class="row w-100 d-none">

                </div>


            </div>

        </div>
    </div>
    <div class="bg-light text-end px-3">
        <small>Here is where you can reach us!</small>
    </div>
    <div class="top-navbar pt-1 lh-2 text-center">
        <div class="d-flex justify-content-center align-items-center">
            <a href="#" class="me-2 nav-link  ">
                <abbr title="Viber">
                    <h5><i class="me-2 fa-brands fa-viber"></i></h5>
                </abbr>
            </a>
            <a href="" class="me-2 nav-link ">
                <abbr title="Whatsapp">
                    <h5><i class="fa-brands fa-whatsapp"></i></h5>
                </abbr>
            </a>
            <a href="" class="me-2 nav-link ">
                <abbr title="Telegram">
                    <h5><i class="me-2 fa-brands fa-telegram"></i></h5>
                </abbr>
            </a>
            <a href="tel:09108707822" class="me-2 nav-link ">
                <abbr title="Call Us">
                    <h5><i class="me-2 fa-solid fa-phone"></i></h5>
                </abbr>
            </a>
            <a href="" class="me-2 nav-link ">
                <abbr title="Messenger">
                    <h5><i class="me-2 fa-brands fa-facebook-messenger"></i></h5>
                </abbr>
            </a>

        </div>
        <div class="">
        </div>
    </div>

    <div id="navbar" class="navbar py-2 w-100 ">

        <button type="button" id="openNavigationMenu" class="btn d-sm-block d-lg-none text-white"><i
                class="fa-solid fa-bars"></i></button>
        <button type="button" id="closeNavigationMenu" class="btn d-sm-none d-lg-none text-white"><i
                class="fa-solid fa-xmark"></i></button>
        <div id="mobileSizeNavigation" class="w-100 d-sm-none d-lg-none align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <div class="mb-3">
                        <a href="{{ url('/') }}" class="text-decoration-none"><img src="/static/ALVEO.svg"
                                alt="" height="30"></a>
                    </div>
                    <div>
                        <a href="{{ '/about' }}" class="btn text-light">ABOUT US</a>
                    </div>
                    <div>
                        <a href="{{ '/our-properties/sale' }}" class="btn text-light">FOR SALE</a>
                    </div>
                    <div>
                        <a href="{{ '/our-properties/lease' }}" class="btn text-light">FOR LEASE</a>
                    </div>

                    <div class="dropdown">
                        <button class="btn text-light btn text-light rounded-0 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">LOCATIONS</button>
                        <ul class="dropdown-menu rounded-0 locations-city-list"></ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn text-light rounded-0 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">CONTACT US</button>
                        <ul class="dropdown-menu rounded-0">

                            <li><a class="dropdown-item" href="{{ url('/inquiry') }}"><span><i
                                            class="me-2 fa-solid fa-message"></i></span><span>Send us a
                                        message</span></a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="{{ '/send-property' }}" class="btn text-light">SUBMIT PROPERTY</a>
                    </div>
                    <div>
                        <a href="{{ '/schedule-viewing' }}" class="btn text-light">SCHEDULE A VIEWING</a>
                    </div>
                    <div>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                            aria-controls="staticBackdrop" class="btn text-light">LOAN CALCULATOR</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-lg-none d-sm-none text-center">
            <a href="{{ url('/') }}" class="text-decoration-none"><img src="/static/ALVEO.svg" alt=""
                    height="20"></a>
        </div>

        <div class="w-100 d-sm-none d-lg-flex align-items-center justify-content-center">
            <div>
                <a href="{{ url('/') }}" class="text-decoration-none text-light me-5 fs-3 fw-bold"><img
                        src="/static/ALVEO.svg" alt="" height="20"></a>
            </div>
            <div>
                <a href="{{ '/about' }}"
                    class="btn text-light {{ Request::url() == url('/about') ? 'active' : '' }}">ABOUT US</a>
            </div>
            <div>
                <a href="{{ '/projects' }}"
                    class="btn text-light {{ Request::url() == url('/projects') ? 'active' : '' }}">PROJECTS</a>
            </div>
            <div>
                <a href="{{ '/our-properties/sale' }}"
                    class="btn text-light {{ Request::url() == url('/our-properties/sale') ? 'active' : '' }}">FOR
                    SALE</a>
            </div>
            <div>
                <a href="{{ '/our-properties/lease' }}"
                    class="btn text-light {{ Request::url() == url('/our-properties/lease') ? 'active' : '' }}">FOR
                    LEASE</a>
            </div>
            <div class="dropdown">
                <button
                    class="btn text-light rounded-0 dropdown-toggle {{ Request::url() == url('/property-locations') ? 'active' : '' }}"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">LOCATIONS</button>
                <ul class="dropdown-menu rounded-0 locations-city-list"></ul>
            </div>
            <div class="dropdown">
                <button
                    class="btn text-light rounded-0 dropdown-toggle {{ Request::url() == url('/send-property') ? 'active' : '' }}  {{ Request::url() == url('/inquiry') ? 'active' : '' }} "
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">OTHERS </button>
                <ul class="dropdown-menu rounded-0">
                    <li><a class="dropdown-item" href="{{ url('/inquiry') }}"><span class=""><i
                                    class="me-2 fa-solid fa-message"></i></span><span>Send us a message</span></a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"
                            class="btn text-light"><span class="me-2"><i
                                    class="fa-solid fa-calculator"></i></span><span>Loan
                                Calculator</span></a></li>

                    <li><a class="dropdown-item" href="{{ '/send-property' }}""><span class="me-2"><i
                                    class="fa-solid fa-paper-plane"></i></span><span>Submit Property</span></a></li>
                </ul>
            </div>
            <div>


            </div>
        </div>


        <div class="section" id="section">
            @yield('index')
            @yield('about')
            @yield('lease')
            @yield('sale')
            @yield('viwe_units_data')
            @yield('user_projects')
            @yield('project_units')
            @yield('prospects')
            @yield('our_properties')
            @yield('send_inquiry')
            @yield('property_view')
            @yield('submit_property_form')
            @yield('schedule_viewing')
        </div>

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toasMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto" id="toast-header"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <span id="toast-content"></span>
                </div>
            </div>
        </div>

        @include('pages.chat')
        <script src="{{ asset('js/user/index.js') }}"></script>
        <script src="{{ asset('js/user/location.js') }}"></script>
        <script src="{{ asset('js/user/logo.js') }}"></script>
        <script src="{{ asset('js/user/search.js') }}"></script>
        <script src="{{ asset('js/user/calculator.js') }}"></script>


        <script>
            $(document).ready(function() {
                // Loader()
                Calculator()




                $('#openNavigationMenu').click(function(e) {
                    e.preventDefault();
                    $('#logomobile').addClass('d-none')
                    $('#closeNavigationMenu').removeClass('d-sm-none')
                    $('#openNavigationMenu').removeClass('d-sm-block')
                    $('#openNavigationMenu').addClass('d-sm-none')
                    $('#mobileSizeNavigation').removeClass('d-sm-none')
                    // $('#openNavigationMenu').addClass('d-none')

                });
                $('#closeNavigationMenu').click(function(e) {
                    e.preventDefault();
                    $('#logomobile').removeClass('d-none')
                    $('#closeNavigationMenu').addClass('d-sm-none')
                    $('#openNavigationMenu').addClass('d-sm-block')
                    $('#openNavigationMenu').removeClass('d-sm-none')
                    $('#mobileSizeNavigation').addClass('d-sm-none')

                    // $('#openNavigationMenu').addClass('d-none')

                });
                tagline()
                // property_cards()
                LocationsList()
                LocationReloader()

                viewlogo()

                // $('#loader').fadeIn(3000)




                $('.subscribe-btn').click(function(e) {
                    e.preventDefault();

                    $('#subscribe-modal').modal('show')

                });
                $('#subscriber-form').submit(function(e) {
                    e.preventDefault();
                    var formdata = new FormData($(this)[0])
                    $.ajax({
                        type: "POST",
                        url: "/newsletter/subscribe",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status == 200) {
                                $('#subscriber-form')[0].reset()
                            } else {

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseTxt)
                        }
                    });

                });


            });
        </script>


</body>

</html>
