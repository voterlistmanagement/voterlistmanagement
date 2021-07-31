 @extends('front.layout.base')
 @push('links')
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
   <style type="text/css" media="screen">
       .fa-asterisk{
        color:red;
       }
   </style>
 @endpush
 
@section('body')
   <section class="content-header">
         <h1>
           Registration Form List
           <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Dashboard</li>
         </ol>
       </section>

     <!-- Main content -->
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">  
                <div class="col-md-12">
                    <table class="table"> 
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Registration No</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Model\ParentRegistration::where('parent_id',Auth::user()->id)->get() as $parent)
                           
                           
                            <tr>
                                <td>{{ $parent->id }}</td>
                                <td>{{ $parent->registration_no }}</td>
                                
                                <td>
                                  @if ($parent->active_status == 0)
                                      <span   data-parent="tr" class="label btn-info btn btn-xs">{{ 'Pending' }} </span>
                                  @elseif($parent->active_status == 1)
                                   <span   data-parent="tr" class="label btn-success btn btn-xs">{{ 'Approved' }} </span>
                                  @elseif($parent->active_status == 2)
                                  <span   data-parent="tr" class="label btn-warning btn btn-xs">{{ 'Cancel' }} </span>
                                  @elseif($parent->active_status == 3)
                                  <span   data-parent="tr" class="label btn-danger btn btn-xs">{{ 'Reject' }} </span>
                                  @endif

                                </td>
                                <td>
                                    <a href="{{ route('student.resitration.resitrationForm',Crypt::encrypt($parent->id)) }}" class="btn btn-success" title="">Go to Form</a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    
                </div>

                 
            </div>
        </div> 

     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
  
@endsection
@push('scripts')
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
       $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
   </script>
@endpush
