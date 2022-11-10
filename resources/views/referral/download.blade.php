@extends('home')
@section('admin')
<div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
    <span class="d-block text-muted text-uppercase fw-bolder text-center mx-2" style="font-size: 2em; margin-top: -1em;">Downloads</span>
    <div class="bg-white col-sm-12 py-3 my-auto">
        <div class="row mb-3">

            <div class="col-sm-10">
                <label>Download referral status</label>
                <select id="referral" class="form-control @error('referral') referral is-invalid @enderror" name="referral" required>
                    <option value="">Select referral status</option>
                    <option value="1">Complete</option>
                    <option value="0">Incomplete</option>
                </select>
            </div>
        </div>    	        
    </div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">

    $('#referral').on('change', function(){

        valuePlace = $(this).children('option:selected').val();
        console.log(valuePlace);
        window.location.href = 'download/'+valuePlace; 
    })

</script>
@endpush