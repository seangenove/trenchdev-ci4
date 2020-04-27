<nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
    <div class="container">
        <a class="navbar-brand text-primary" href="/">Trenchdev</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    data-feather="menu"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-lg-5">
                <li class="nav-item"><a class="nav-link" href="/">Home </a></li>


                <?php if (!\App\Helpers\Auth::user()) : ?>

                    <li class="nav-item dropdown no-caret">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Community <i class="fas fa-chevron-right dropdown-arrow"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated--fade-in-up"
                             aria-labelledby="navbarDropdownDocs">

                            <a class="dropdown-item py-3" href="/register" target="_blank">
                                <div class="icon-stack bg-primary-soft text-primary mr-4"><i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <div class="small text-gray-500">Register</div>
                                    Be part of the community!
                                </div>
                            </a>
                            <div class="dropdown-divider m-0"></div>
                            <a class="dropdown-item py-3" href="/login">
                                <div class="icon-stack bg-primary-soft text-primary mr-4">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <div>
                                    <div class="small text-gray-500">Login</div>
                                    Login to your account
                                </div>
                            </a>
                        </div>
                    </li>

                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/login/logout">
                            Logout <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>

                <?php endif; ?>


            </ul>
        </div>
    </div>
</nav>