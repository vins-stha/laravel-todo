@include('layout')

    <div class="user-login login-form-container">
        <h5 class="form-title">Sign Up</h5>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <span class="error-message">{{$error}}</span>
            @endforeach
        @endif

        <form method="post" action="{{route('signup')}}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" placeholder="Please enter your user name"
                       minlength="5">
                <label for="floatingInput">User Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" minlength="10">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" minlength="4">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="re-password" placeholder="Confirm password"
                       minlength="4">
                <label for="floatingPassword">Confirm Password</label>
            </div>


            <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Register</button>
            </div>


        </form>
    </div>

