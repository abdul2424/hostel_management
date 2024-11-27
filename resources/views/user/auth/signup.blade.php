<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Sign In | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome</h5>
                                    <p class="text-muted">Register Yourself</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('user.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" required id="name"
                                                name="name" placeholder="Enter Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" required id="email"
                                                name="email" placeholder="Enter Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" required id="phone"
                                                name="phone" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" required id="occupation"
                                                name="occupation" placeholder="Enter Occupation">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" required name="address" rows="3" placeholder="Enter Address"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-input" class="form-label">Password</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5 password-input"
                                                    name="password" minlength="6" required placeholder="Enter Password"
                                                    id="password-input">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm-password" class="form-label">Confirm Password</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5 password-input"
                                                    name="confirm_password" minlength="6" required placeholder="Confirm Password"
                                                    id="confirm-password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="confirm-password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit" id="submit-btn">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                    <div class="text-center mt-3">
                                        <p class="text-muted">If you are registered, <a
                                                href="{{ route('user.login') }}" class="text-primary">click here to
                                                Sign In</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script>
        document.getElementById("submit-btn").addEventListener("click", function(event) {
            const password = document.getElementById("password-input").value;
            const confirmPassword = document.getElementById("confirm-password").value;

            if (password !== confirmPassword) {
                event.preventDefault();
                alert("Passwords do not match. Please check again!");
            }
        });

        // Toggle Password Visibility
        const togglePassword = (id, addon) => {
            const input = document.getElementById(id);
            const icon = document.querySelector(`#${addon} i`);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("ri-eye-fill", "ri-eye-off-fill");
            } else {
                input.type = "password";
                icon.classList.replace("ri-eye-off-fill", "ri-eye-fill");
            }
        };

        document.getElementById("password-addon").addEventListener("click", () => {
            togglePassword("password-input", "password-addon");
        });

        document.getElementById("confirm-password-addon").addEventListener("click", () => {
            togglePassword("confirm-password", "confirm-password-addon");
        });
    </script>
</body>

</html>
