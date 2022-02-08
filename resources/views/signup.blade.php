@include('layout')


<section class="user-login">
    <h1>Login forms</h1>

    <div class="login-form-container">
        <h5 class="form-title">Sign Up</h5>
        <span class="error-message">{{session('message')}}</span>
    <form method="post" action="{{route('signup')}}">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" placeholder="Please enter your user name" minlength="5">
            <label for="floatingInput">User Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" placeholder="name@example.com" minlength="10">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" minlength="8">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="re-password" placeholder="Confirm password" minlength="8">
            <label for="floatingPassword">Confirm Password</label>
        </div>


        <div class="d-grid">
            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Register</button>
        </div>


    </form>
    </div>

</section>

@include('footer')
