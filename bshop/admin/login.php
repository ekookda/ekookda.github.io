<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>BShop Login Page</title>
    <!-- Bootstrap CSS v5.1.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .toast-container {
            position: fixed;
            right: 25px;
            top: 10px;
            z-index: 11;
        }

        .toast:not(.showing):not(.show) {
            display: none !important;
        }
    </style>

</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <!-- Toast -->
            <div class="toast-container">
                <div class="toast d-flex align-items-center text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form action="query_login.php?f=login" method="POST" id="form_login" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                        <a href="forgot.html" class="float-end">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" id="btn_login" class="btn btn-primary ms-auto">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2017- <?= date('Y'); ?> &mdash; BShop
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Login
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        $(document).ready(function() {
            // Login
            $('#form_login').submit(function(e) {
                let url = $(this).attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: $('#form_login').serialize(),
                    success: function(response) {
                        let d = $.parseJSON(response);

                        // console.log(d.status);
                        if (d.status == 1) {
                            $('.toast').removeClass('bg-danger');
                            $('.toast').addClass('bg-success').html(`<div class="toast-body">Login Berhasil!</div>`);
                            $('.toast').toast('show');
                            window.setTimeout(
                                function() {
                                    window.location = '/ppkdju/ppkdju.github.io/bshop/admin';
                                },
                                3000
                            );
                        } else {
                            $('.toast').addClass('bg-danger').html('<div class="toast-body">Login Gagal!</div>').toast('show');
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
                e.preventDefault();
            });
        });
    </script>
</body>

</html>