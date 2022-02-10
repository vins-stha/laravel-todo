@include('layout')

    <div class="user-login task-form-container">
        <h4 class="form-title">Add new task</h4>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <span class="error-message">{{$error}}</span>
            @endforeach
        @endif

        <form method="post" action="{{route('create-task')}}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" minlength="5">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control text-area" name="description" rows="10" cols="50"></textarea>
                <label for="floatingInput">A short description</label>
            </div>
            <div class="form-floating mb-3">
            <select class='form-contro form-dropdown' name='task-state'>
                @foreach(\App\Task::TASK_STATES as $state)
                    <option value="{{$state}}">{{$state}}</option>
                @endforeach
            </select>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-submit text-uppercase fw-bold" type="submit">Add new task</button>
            </div>

        </form>
    </div>



