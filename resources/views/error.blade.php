@include('layout')

{{--@section('content')--}}

    <div class="user-login login-form-container">

        @if($error)
            <h1>Error : {{$code}}</h1>
           {{$error}}

        @endif

    </div>

{{--@endsection--}}


