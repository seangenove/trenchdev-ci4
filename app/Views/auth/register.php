<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Register - Trenchdev</title>
    <link href="/sb-admin-pro/css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="/sb-ui-kit-pro/assets/img/favicon.png"/>
    <script data-search-pseudo-elements defer
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create
                                    Account</h3></div>
                            <div class="card-body">
                                <?php if (session()->get('errorMessage')) : ?>
                                    <div class="row justify-content-center">
                                        <p class="text-danger">
                                            <?= session()->get('errorMessage') ?>
                                        </p>
                                    </div>
                                <?php elseif (isset($validation)) : ?>
                                    <div class="row text-danger">
                                        <p class="pl-1 mb-1">Something went wrong with your registration credentials</p>
                                        <?= $validation->listErrors() ?>
                                    </div>
                                <?php endif; ?>

                                <form action="/create_user" method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input
                                                class="form-control py-4"
                                                name="email"
                                                type="email"
                                                placeholder="Enter email address"
                                                required
                                                value="<?= old('email') ?>"
                                        />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" type="password"
                                                       placeholder="Enter password" required/></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">Confirm
                                                    Password</label>
                                                <input class="form-control py-4" name="confirmPassword" type="password"
                                                       placeholder="Confirm password" required/></div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary btn-block" href="login-basic.html">
                                            Create Account
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">
                                    <a href="/login">Have an account? Go to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer mt-auto footer-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Trenchdev 2020</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="/sb-admin-pro/js/scripts.js"></script>
</body>
</html>
