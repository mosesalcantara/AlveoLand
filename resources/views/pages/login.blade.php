<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alveo | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>
    <div class="row my-auto h-100 pt-5">
        <div class="col-lg-7 col-sm-0"></div>
        <div class="col-lg-4 col-sm-0  pt-5 px-sm-5 px-lg-0">
            <div class="card">
                <div class="card-body">
                    <form id="login-account" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-primary">Greetings!</h6>
                        <p>Welcome to Alveo, please login your account to get in touch. Thank you</p>
                        <h5 class="text-primary">
                            Sign In here
                        </h5>
                        <div class="">
                            <div class="form-floating mb-3">
                                <input name="username" type="text" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class=" text-center">
                                <button type="submit" class="btn btn-primary px-5">Login</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-0 col-lg-1"></div>
    </div>
    <script>
        $(document).ready(function() {

            $('#login-account').submit(function(e) {
                e.preventDefault();
                var formdata = new FormData($(this)[0])
                $('#login-account span').remove()
                $.ajax({
                    type: "POST",
                    url: "/login-account",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log((response));
                        if (response.status == 200) {
                            $('#login-account')[0].reset()
                            window.location.href = "/admin/dashboard"
                        } else if (response.status == 400) {

                            $.each(response.errors, function(errorIndex, errorData) {
                                $('<span class="text-danger">' + errorData + '</span>')
                                    .insertAfter($('input[name=' + errorIndex + ']'));
                            });

                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseTxt)
                    }
                });

            });



        });

        function showtoastMessage(toastColor, toastHeader, toastContent) {
            $("#toast-header").removeClass(toastColor);
            $("#toast-header").addClass(toastColor);
            $("#toast-header").text(toastHeader);
            $("#toast-content").text(toastContent);
            const toastBootstrap = new bootstrap.Toast("#toasMessage");
            toastBootstrap.show();
        }
    </script>
</body>

</html>
