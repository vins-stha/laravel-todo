@include('layout')


<section class="user-login">
    <div class="login-form-container">
        <h4 class="form-title">Add new Task</h4>
        <form>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Name your task">
                <label for="task-name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Some words for your task">
                <label for="task-description">Description</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Add new task</button>
            </div>
            <hr class="my-4">

        </form>
    </div>

</section>

@include('footer')
