@extends('admin.pages.master2')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@endsection

@section('content')

<div style="width:100%;" class="card card-default">
     <div class="card-header">
          <h4 class="card-title"><strong>Add New Product</strong></h4>

          <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                         class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                         class="fas fa-times"></i></button>
          </div>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
          <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" type="text" name="name" id="pId">
                    </div>

               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div class="form-group">
                         <label>Select Category</label>
                         <select class="form-control">
                              @foreach ($categories as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div style="margin-top:5%;" class="form-group">
                         <label>  Image</label>

                         <fieldset class="form-group">
                              <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                              <input type="file" id="pro-image" name="pro-image" style="display: none;"
                                   class="form-control" multiple>
                         </fieldset>
                         {{-- <div class="preview-images-zone">
                              <div class="preview-image preview-show-1">
                                   <div class="image-cancel" data-no="1">x</div>
                                   <div class="image-zone"><img id="pro-img-1"
                                             src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw==">
                                   </div>
                                   <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1"
                                             class="btn btn-light btn-edit-image">edit</a></div>
                              </div>
                              {{-- <div class="preview-image preview-show-2">
                                   <div class="image-cancel" data-no="2">x</div>
                                   <div class="image-zone"><img id="pro-img-2"
                                             src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg">
                                   </div>
                                   <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2"
                                             class="btn btn-light btn-edit-image">edit</a></div>
                              </div>
                              <div class="preview-image preview-show-3">
                                   <div class="image-cancel" data-no="3">x</div>
                                   <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg">
                                   </div>
                                   <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3"
                                             class="btn btn-light btn-edit-image">edit</a></div>
                              </div> --}}
                         {{-- </div> --}}

                    </div>
               </div>
               <!-- /.col -->
               <div class="col-md-6">
                    <div style="margin-top:5%;" class="form-group">
                         <label>Select File</label>
                         <input type="file" name="file" id="pFile">
                    </div>
               </div>

               <div class="col-md-12">
                    <div style="" class="form-group">

                         <div class="mb-3">
                              <textarea name="description" id="pDescription" class="textarea" placeholder="Place some text here"
                                   style=""></textarea>
                         </div>


                    </div>
               </div>
          </div>
          <!-- /.row -->
     </div>
     <!-- /.card-body -->
     <div class="card-footer">
     </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('js/product.js') }}"></script>

@endsection