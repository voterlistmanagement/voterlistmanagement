<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add Ward</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.ward.store') }}" method="post" class="add_form" select-triger="block_select_box" button-click="btn_close">
        {{ csrf_field() }}
        <div class="card-body row">
          <div class="col-lg-6 form-group">
            <h3>{{ $Village->name_e }}</h3> 
          </div>
          <div class="col-lg-12 form-group">
            <label for="exampleInputEmail1">How Many Ward To Create</label>
            <span class="fa fa-asterisk"></span>
            <input type="text" name="states" class="form-control" placeholder="" hidden maxlength="5" value="{{ $Village->states_id }}">
            <input type="text" name="district" class="form-control" placeholder="" hidden maxlength="5" value="{{ $Village->districts_id }}">
            <input type="text" name="block" class="form-control" placeholder="" hidden maxlength="5" value="{{ $Village->blocks_id }}">
            <input type="text" name="village" class="form-control" placeholder="" hidden maxlength="5" value="{{ $Village->id }}">
            <input type="text" name="ward" class="form-control" placeholder="" maxlength="5">
        </div>
        </div> 
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success form-control">Save</button>
          {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
        </div>
      </form>
    </div>
  </div>
</div>

