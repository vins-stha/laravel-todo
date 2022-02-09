@include('layout')

<div class="user-login task-form-container">
        <h4 class="form-title">Change your password</h4>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <span class="error-message">{{$error}}</span>
            @endforeach
        @endif

        <form action="{{url('/changePassword')}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="new-password" required>
                <label for="floatingPassword">New Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="re-password" required>
                <label for="floatingPassword">Re-type Password</label>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-submit text-uppercase fw-bold" type="submit">Update</button>
            </div>

        </form>
    </div>
{{--@endsection--}}


