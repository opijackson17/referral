@extends('referral.index')
@section('referrals')
<div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
    <span class="d-block text-muted text-uppercase fw-bolder text-center mx-2" style="font-size: 2em; margin-top: -1em;">All Referrals</span>
    <div class="bg-white col-sm-12 py-3 my-auto">
    	<div class="table-responsive mx-0">
    	    <table class="table table-bordered dataTable_user" id="dataTable_user" style="width: 98%;">
    	        <thead>
    	            <tr>
    	                <th>Referee</th>
    	                <th>Referred</th>
    	                <th>Business</th>
    	                <th>Date</th>
                        <th>Status</th>
    	            </tr>
    	        </thead>
    	        <tbody>
    	        </tbody>
    	    </table>
    	</div>
    
    </div>
</div>

<!-- You Modal -->
<div class="modal" id="youModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Referree</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="youModalBody">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Friend Modal -->
<div class="modal" id="friendModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Referred</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="friendModalBody">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Business Modal -->
<div class="modal" id="businessModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Business</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="businessModalBody">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feedback form Modal -->
<div class="modal" id="feedBack">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">FeedBack</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="feedBackBody">
                    
                </div>
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
            ajax: "{{ route('allReferrals') }}",

            columns: [
            {data: 'yfname', searchable: true, 'render': function(data, type, row){
                return '<a data-id="'+row.y_id+'" id="you" class="text-dark">'+row.yfname + ' ' + row.ylname+'</a>'}},
            {data: 'ffname', searchable: true, 'render': function(data, type, row){
                return '<a data-id="'+row.f_id+'" id="friend" class="text-dark">'+row.ffname+ ' '+row.flname+'</a>'
            }},
            {data: 'bname', searchable:true, 'render': function(data, type, row){
                return '<a data-id="'+row.b_id+'" id="business" class="text-dark">'+row.bname +'</a>'
            }},
            {data: 'date_created', searchable: true, 'render': function(data, type, row){
                return new Date(row.date_created).toLocaleDateString()
            }},
            {data: 'feedback', serachable:true, 'render': function(data, type, row){
                return row.feedback !== '' && row.feedback !== null ? "<span class='text-success'>Complete</span>":"<span class='text-dark d-inline mr-2'><a data-id='"+row.b_id+"' class='text-dark'>Incomp.</span></a><span class='d-inline btn btn-primary' id='fillFeedBack' data-id='"+row.b_id+"'>Fill Feedback</span>"
                
            }},
            ],

    })

     var id;
    var data = {!! $data !!}

    function tableDisplay(datafname,datalname,datamobile,dataemail) {

        table='<table class=" table table-bordered">'+
            '<thead>'+
                '<tr><th colspan=2 class="text-center">'+datafname+' '+datalname+'</th></tr>'+
            '</thead>'+
            '<tbody>'+
                '<tr>'+
                    '<td>'+dataemail+'</td>'+
                    '<td>'+datamobile+'</td>'+
                '</tr>'+
            '</tbody>'+
        '</table>';
        return table
    }

    function feedBackForm(business_id){
        return '<div class="col-sm-12" id="feedBackForm"><div class="alert alert-success" id="success">success</div><div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">                </div><input type="hidden" value="'+business_id+'" id="businessId"><textarea class="form-control summernote" id="textaAreaFeedBack" name="feedback"></textarea></div><button type="submit" class="btn btn-primary mt-2" id="feedBackNote">Save</button>';
    }


    // Get you
    $('.modelClose').on('click', function(){
        $('#youModal', ).hide();
    });


   
    $('body').on('click', '#you', function(e) {

        e.preventDefault();
        id = $(this).data('id');
        var result = data.filter(item => item.y_id == id);
        you = tableDisplay(result[0].yfname, result[0].ylname, result[0].yemail, result[0].ymobile);
       
        $('#youModalBody').html(you);
        $('#youModal').show();
         
    });

        // Get friend 
    $('.modelClose').on('click', function(){
        $('#friendModal').hide();
    });

    $('body').on('click', '#friend', function(e) {

        e.preventDefault();
        id = $(this).data('id');
        var result = data.filter(item => item.f_id == id);

        friend = tableDisplay(result[0].ffname, result[0].flname, result[0].femail, result[0].fmobile);
       
        $('#friendModalBody').html(friend);
        $('#friendModal').show();
         
    });

        // Get business 
    $('.modelClose').on('click', function(){
        $('#businessModal').hide();
    });

    $('body').on('click', '#business', function(e) {

        e.preventDefault();
        id = $(this).data('id');
        var result = data.filter(item => item.b_id == id);
        business = tableDisplay(result[0].bname, '', result[0].bemail, result[0].bmobile);
       
        $('#businessModalBody').html(business);
        $('#businessModal').show();
         
    });

    // fill feedback
    $('.modelClose').on('click', function(){
        $('#feedBack').hide();
    });
    $('body').on('click', '#fillFeedBack', function(e) {
        e.preventDefault()
        id = $(this).data('id');

        $('#feedBackBody').html(feedBackForm(id))
        $('#feedBack').show();
        $('#success').hide();
        $('.summernote').summernote();

    })
  
    $('body').on('click', '#feedBackNote', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({
            method: 'post',
            url: '{{ route("updateReferralStatus") }}',
            data: {id: $('#businessId').val(), feedback: $('#textaAreaFeedBack').val()},
            success: function(result){
                if (result.status == 300) {
                    $('#success').show();
                    table.ajax.reload();
                    setInterval(function(){ 
                    $('#success').hide();
                    $(this).hide();
                }, 2000);
                }
            },
            error: function(error){
                if (error.errors) {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                    });
                }
            }
        })
    })


</script>
@endpush