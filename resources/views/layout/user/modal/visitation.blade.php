<!-- Button trigger modal -->
<div class="modal fade" id="schedule_visit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-primary">Schedule A Visit (Complete the form)</h4>
                <form id="schedule_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="full_name" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="contact" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Contact</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="date" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="time" name="time" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Time</label>
                    </div>
                    <input type="hidden" name="unit_id">
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
