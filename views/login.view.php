<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

    <style>
        .text-center {
            text-align: center!important;
        }

        /*body {*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    padding-top: 40px;*/
        /*    padding-bottom: 40px;*/
        /*    background-color: #f5f5f5;*/
        /*}*/

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

<main class="form-signin text-center">
    <div class="container overflow-hidden content-space-t-4">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <form method="POST">
            <div class="form-floating">
                <label for="floatingInput">Login</label>
                <input type="text"
                       class="form-control"
                       id="floatingInput"
                       placeholder="Joe"
                       name="login"
                >
            </div>
            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="password"
                       class="form-control"
                       id="floatingPassword"
                       placeholder="Password"
                       name="password"
                >
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </div>
</main>

<?php require base_path('views/sections/footer.php'); ?>