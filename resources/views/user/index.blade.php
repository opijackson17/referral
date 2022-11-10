@extends('home')
@section('admin')
<div class="bg-light rounded-3 py-5 px-0 px-md-5 mb-5">
    <span class="d-block text-muted text-uppercase fw-bolder text-center mx-2" style="font-size: 2em; margin-top: -1em;">User</span>
    <div class="bg-white col-sm-12 py-3 my-auto">
    	<button style="float: right; font-weight: 900;" class="btn btn-info btn-sm mb-2" type="button"  data-toggle="modal" data-target="#createUserModal">Create User</button>
    	<div class="table-responsive mx-0">
    	    <table class="table table-bordered dataTable_user" id="dataTable_user" style="">
    	        <thead>
    	            <tr>
    	                <th>Name</th>
    	                <th>Email</th>
    	                <th>Mobile</th>
    	                <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
    	            </tr>
    	        </thead>
    	        <tbody>
    	        </tbody>
    	    </table>
    	</div>
    
    </div>
</div>

<!-- Create Funder Modal -->
<div class="modal" id="createUserModal">
    <div class="modal-dialog">
        <div class="modal-content text-black">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success! </strong>User was created.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required placeholder="{{ __('First name') }}">

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required placeholder="{{ __('Last name') }}">

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                  <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="{{ __('Email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="mobile" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required placeholder="Mobile">

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                

                <div class="form-group row">
                    <label for="gender">Gender</label>
                    <div class="col-sm-12">
                        <div class="d-inline">
                            <input id="gender" type="radio" name="gender" value="Male" class="form-group @error('gender') is-invalid @enderror"><span class="ml-2">Male</span> 
                        </div>
                        <div class="d-inline ml-4 pl-4">
                            <input id="gender" type="radio" name="gender" value="Female" class="form-group @error('gender') is-invalid @enderror">
                            <span class="ml-2">Female</span>   
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="SubmitCreateUserForm">Create User</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal" id="EditUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success! </strong>User was edited.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditUserModalBody">
                    
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditUserForm">Update</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

    table = $('.dataTable_user').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('user') }}",

            columns: [
            {data: 'firstname', searchable: true, 'render': function(data, type, row){
            return row.firstname + ' ' + row.lastname}},
            {data: 'email'},
            {data: 'mobile'},
            {data: 'gender'},
            {data: 'status', 'render': function(data, type, row){
                return row.status=='1' ? "<span class='text-success text-uppercase'>Active</span>":"<span class='text-warning text-uppercase'>Not active</span>"
            }},
            {data: 'Actions', name: 'Actions',orderable:false,serachable:false},
            ],
    })


    $('#SubmitCreateUserForm').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('store') }}",
                method: 'post',
                data: {
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    gender: $('#gender').val(),
                    password: $('#password').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        table.ajax.reload();
                        setInterval(function(){ 
                            $('.alert-success').hide();
                            $('#createUserModal').modal('hide');
                            location.reload();
                        }, 3000);
                    }
                }
            });
        });

    // Get single user
    $('.modelClose').on('click', function(){
        $('#EditUserModal').hide();
    });

    var id;
    $('body').on('click', '#getEditUserData', function(e) {

        // e.preventDefault();
        $('.alert-danger').html('');
        $('.alert-danger').hide();
        id = $(this).data('id');
        $.ajax({
            url: "user/"+id,
            method: 'GET',
            success: function(result) {
                $('#EditUserModalBody').html(result.html);
                $('.summernote').summernote();
                $('#EditUserModal').show();
            }
        });
    });

    // Update User Ajax request.
$('#SubmitEditUserForm').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('update') }}",
        method: 'post',
        data: {
            firstname: $('#edit_firstname').val(),
            lastname: $('#edit_lastname').val(),
            email: $('#edit_email').val(),
            mobile: $('#edit_mobile').val(),
            gender: $('#edit_gender').val(),
            status: $('#edit_status').val(),
            id: $('#edit_id').val(),
        },
        success: function(result) {
            if(result.errors) {
                $('.alert-danger').html('');
                $.each(result.errors, function(key, value) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                });
            } else {
                $('.alert-danger').hide();
                $('.alert-success').show();
                table.ajax.reload();
                setInterval(function(){ 
                    $('.alert-success').hide();
                    $('#createUserModal').hide();
                }, 2000);
            }
        }
    });
});
</script>
@endpush