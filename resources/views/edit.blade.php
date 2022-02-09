@include('layout')

<div class="user-login task-form-container">
        <h4 class="form-title">Update your task</h4>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <span class="error-message">{{$error}}</span>
            @endforeach
        @endif

        <form action="{{url('/tasks/update')}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="task-id" value="{{$task->id}}"/>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" minlength="5" value="{{$task->name}}">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <textarea   rows="4" cols="50" name="description"></textarea>
                <label for="floatingInput">{{$task->description}}</label>
            </div>
            <div class="form-floating mb-3">
            <select class='form-dropdown' name='task-state'>
                @foreach(\App\Task::TASK_STATES as $state)
                    @if($task->status == $state)
                    <option value="{{$task->status}}"  name="status" selected>{{$task->status}}</option>
                        @else
                        <option value="{{$state}}"  name="status">{{$state}}</option>
                    @endif
                @endforeach
            </select>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-submit text-uppercase fw-bold" type="submit">Update</button>
            </div>

        </form>
    </div>
{{--@endsection--}}


