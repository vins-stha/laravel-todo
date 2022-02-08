@include('layout')


<section class="user-login">
    <h1>Login forms</h1>

    <div class="login-form-container">
        <h5 class="form-title">Sign In</h5>
        <span class="error-message" style="color: red">{{session('message')}}</span>
        <span class="error-message" style="color: red">{{session('message-success')}}</span>

        <form method="post" action="{{route('login')}}">
       @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                in</button>
        </div>
        <hr class="my-4">

    </form>
    </div>

</section>

@include('footer')
