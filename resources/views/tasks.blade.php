@include('layout')
<div class="task-table-container">
    <h4 class="form-title">Your tasks lists</h4>
    <p>Filter your tasks by
    <form action="{{url('/tasks?status=')}}" method="GET">
        <span class="error-message" style="visibility: hidden"></span>
        <select class='form-dropdown' name='task-state'
                onchange="filterOnChange()">
            <option value="">Select status</option>
            @foreach(\App\Task::TASK_STATES as $state)
                <option value="{{$state}}">{{$state}}</option>
            @endforeach
        </select>
    </form>
    </p>
    <table class="table table-dark">

        <thead>
        <tr>
            <th scope="col">Task name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Update</th>
        </tr>
        </thead>
        <tbody id="tasks_list">
        @if(count($tasks) > 0)
            @foreach($tasks as $task)
                <tr id="task-{{$task->id}}">
                    <th scope="row">{{$task->name}}</th>
                    <td class="task-descriptions">
                        @if(strlen($task->descriptions) > 40)
                            {{substr($task->descriptions, 0 , 30)}}...
                            @else
                            {{ $task->descriptions}}
                            @endif

                    </td>
                    <td>{{$task->status}}</td>
                    <td class="actions">
                        <a href="{{ url('/tasks/edit/'.$task->id) }}" class="btn btn-primary btn-update"
                           name="btn-update">Update</a>
                        <form action="{{ route('Task.destroy', ['id' => $task->id]) }}" method="post">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure ?')"
                                    name="btn-delete" type="submit">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>


