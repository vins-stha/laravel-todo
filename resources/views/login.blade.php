@include('layout')

<div class="user-login login-form-container">
    <h4 class="form-title">Sign In</h4>
    @if (session('message') !=='' && strlen(session('message'))>0 )
    <span class="error-message">{{session('message')}}</span>
    @endif
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                   name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                in
            </button>
        </div>

    </form>
</div>


