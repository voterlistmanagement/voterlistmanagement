@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Prepare Voter List Booth Wise</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">    
                        <form action="{{ route('admin.voter.GenerateVoterListAll') }}" method="post" no-reset="true" class="add_form">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">  
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock',2) }}','block_select_box')">
                                            <option selected disabled>Select District</option>
                                            @foreach ($Districts as $District)
                                            <option value="{{ $District->id }}">{{ $District->code }}--{{ $District->name_e }}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Block MCS</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'{{ route('admin.Master.BlockWiseVillage') }}'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                        <option selected disabled>Select Block MCS</option> 
                                    </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label for="exampleInputEmail1">Village</label>
                                        <span class="fa fa-asterisk"></span>
                                        <select name="village" class="form-control select2" id="village_select_box" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.voter.VillageWiseWardMultiple') }}','value_div_id')">
                                            <option selected disabled>Select Village</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group"> 
                                    <label for="exampleInputEmail1">Ward No.</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="ward" class="form-control multiselect" id="value_div_id" onchange="callAjax(this,'{{ route('admin.Master.WardWiseBooth') }}'+'?ward_id='+this.value+'&village_id='+$('#village_select_box').val(),'booth_select_box')">
                                      <option selected disabled>Select Ward</option> 
                                    </select>
                                    </div>
                                    <div class="col-lg-6 form-group"> 
                                    <label for="exampleInputEmail1">Booth No.</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="booth" class="form-control multiselect" id="booth_select_box">
                                      <option selected disabled>Select Booth No.</option> 
                                    </select>
                                    </div>
                                    <div class="col-lg-12 form-group text-center">
                                         
                                    </div>
                                    <input type="hidden" name="proses_by" id="proses_by" value="0">
                                    <div class="col-lg-6 form-group">
                                       <input type="submit" class="btn btn-success form-control" value="Process And Lock" onclick="$('#proses_by').val(1)">
                                   </div>
                                   <div class="col-lg-6 form-group">
                                       <input type="submit" class="btn btn-danger form-control" value="Unlock" onclick="$('#proses_by').val(2)">
                                   </div> 
                                    </div>
                                </div> 
                        </form>
                    </div> 
                </div>
            </div>
      </div>
  </div>
</section>
@endsection
@push('scripts')
 
@endpush
 

