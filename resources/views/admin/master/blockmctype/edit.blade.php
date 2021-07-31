<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.BlockMCSTypeUpdate',$BlockMCType->id) }}" method="post" class="add_form" content-refresh="gender_table" button-click="btn_close">
        {{ csrf_field() }}  
          <div class="form-group">
            <label for="exampleInputPassword1">Block MSC Type (English)</label>
            <span class="fa fa-asterisk"></span>
            <input type="text" name="block_mc_type_e" class="form-control" placeholder="Enter Gender (English)" maxlength="50" value="{{ $BlockMCType->block_mc_type_e }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Block MSC Type (Local Language)</label>
            <span class="fa fa-asterisk"></span>
            <input type="text" name="block_mc_type_l" class="form-control" placeholder="Enter Gender (Local Language)" maxlength="50" value="{{ $BlockMCType->block_mc_type_l }}">
          </div> 
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

