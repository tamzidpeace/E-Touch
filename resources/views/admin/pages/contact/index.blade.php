@extends('admin.pages.master2')

@section('content')
<div class="card">
     <div class="col-md-12 col-xl-12">
          @if ($errors->any())
          <div class="alert alert-danger">
               <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
               </ul>
          </div>
          @endif

          @if (!$errors == 123 )
          <div class="alert alert-success">
               <ul>
                    <li>New Category Added!</li>
               </ul>
          </div>
          @endif
          <div class="card-header">
               <h3 class="card-title">Contact Message Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
               <table style="text-align: center;" id="myTable" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Message</th>
                              <th>Manage</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $x = 1?>
                         @foreach ($messages as $item)
                         <tr>
                              <td>{{ $x++ }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->email }}</td>
                              <td>{{ substr($item->message, 0, 30) }}...</td>
                              <td>
                                   <a onclick="viewMessage({{ $item->id }})" data-toggle="modal"
                                        data-target="#viewModal" id="viewMessage"
                                        class="btn btn-primary btn-sm rounded-pill">
                                        <i class="far fa-eye"></i>
                                        </i>
                                        View
                                   </a>

                                   <a onclick="giveFeedback({{ $item->id }})" href="javascript:;" data-toggle="modal"
                                        data-target="#feedbackModal" id="feedback"
                                        class="btn btn-info btn-sm rounded-pill">
                                        <i class="far fa-check-circle"></i>
                                        Feedback</a>

                                   <a onclick="deleteMessage({{ $item->id }})" id="deleteMessage"
                                        class="btn btn-danger btn-sm rounded-pill" href="#" data-toggle="modal"
                                        data-target="#deleteModal">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                   </a>
                              </td>
                         </tr>
                         @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
               </table>
          </div>
     </div>

     <!-- /.card-body -->


     <!-- add,edit Modal -->
     <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Message Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         {{-- Name:<p id="messageName"></p>
                         Email:<p id="messageEmail"></p>
                         Message:<p id="messageBody"></p> --}}

                         <div class="card-body">

                              <strong><i class="fas fa-user mr-1"></i> Name</strong>

                              <p class="text-muted" id="messageName"></p>

                              <hr>

                              <strong><i class="fas fa-at mr-1"></i>Email</strong>

                              <p class="text-muted" id="messageEmail">

                              </p>

                              <hr>

                              <strong><i class="far fa-file-alt mr-1"></i>Message</strong>

                              <p class="text-muted" id="messageBody"></p>
                         </div>

                         <input type="hidden" name="viewMessageID" id="viewMessageID" value="0">
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>

     {{-- end modal  --}}

     {{-- feedback modal --}}
     <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Give Feedback</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <form action="{{ route('admin.contact.feedback') }}" method="GET">
                              @csrf
                              <input type="hidden" name="contact_id" id="contactID">
                              <div class="form-group row">
                                   <label for="feebackEmail" class="col-sm-2 col-form-label">To</label>
                                   <div class="col-sm-10">
                                        <input type="email" name="feeback_email" class="form-control" id="feedbackEmail"
                                             placeholder="email@example.com">
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label for="feeback" class="col-sm-2 col-form-label">Feedback</label>
                                   <div class="col-sm-10">
                                        <textarea class="form-control" name="feedback" id="feedback" cols="30"
                                             rows="10"></textarea>
                                   </div>
                              </div>
                         
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    </div>
               </div>
          </div>
     </div>
     {{-- end::feedback modal --}}

     {{-- delete modal --}}
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this Message?</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="{{ route('admin.contact.destroy') }}" method="POST">
                         @csrf

                         <input type="hidden" name="messageID" id="messageID" value="0">
                         <div class="modal-footer">
                              <button type="submit" id="deleteSubmit" class="btn btn-primary">YES</button>
                              <button type="button" id="deleteNo" class="btn btn-secondary"
                                   data-dismiss="modal">NO</button>
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection

@section('scripts')
<script>
     $('#myTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });

    function viewMessage(id) {
         //console.log(id);
         $('#viewMessageID').val(id);
         $.ajax({
              url: 'view-message-ajax',
              type: 'GET',
              data: {id:id},
              dataType: 'JSON',
              success: function(result) {
               //console.log(result);
               $('#messageName').append(result.name);
               $('#messageEmail').text(result.email);
               $('#messageBody').text(result.message);
              },
         });
    }

    function deleteMessage(id) {
          event.preventDefault();
          $('#messageID').val(id);
          //console.log($('#dID').val());
          //swal("Done", "", "success");
               
     }

     function giveFeedback(id) {
          console.log(id);
          
          $('#contactID').val(id);

          $.ajax({
               'url' : 'get_feedback_eamil',
               'type' : 'get',
               data : {id:id},
               dataType: 'json',
               success: function(result) {
                    console.log(result);
                    $('#feedbackEmail').val(result.email);
               },
               error: function(error) {
                    console.log(error);
               }
          });
     }
</script>


@endsection