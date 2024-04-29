@extends('layout.admin.layout')
@section('prospects_view')
 <div class="card">
    <div class="card-body">
        <div id="main-property-section" class="container">
            <div class="card">
                <div class="card-body">
                    <p class="fs-4"> <span class="me-3 "><i class="fa-solid fa-list"></i></span>List of Prospects</p>
                        <div class="table-prospects-container">

         </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary mb-2" id="add-land-prospects-btn">Add Prospects</button>
</div>
    </div>
    
 </div>
</div>

@include('layout.admin.modals.prospects')

<script src="{{asset('js/admin/prospects.js')}}"></script>
<script>
    $(document).ready(function () {
ProspectsBtn()
Create_Prospects()
ProspectsTable()
    });
</script>
@endsection