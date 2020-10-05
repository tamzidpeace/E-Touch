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
     <form action="{{ route('admin.product.make-confirm') }}" method="post" enctype="multipart/form-data">
          @csrf
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
                              <select name="category" class="form-control">
                                   @foreach ($categories as $item)
                                   <option value="{{ $item->id }}">{{ $item->name }}</option>
                                   @endforeach
                              </select>
                         </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                         <div class="form-group">
                              <label for="files">Select Images</label>
                              <input class="form-control" type="file" id="pImages" name="p_images[]" multiple>
                         </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                         <div class="form-group">
                              <label>Select File</label>
                              <input class="form-control" type="file" name="file" id="pFile">
                         </div>
                    </div>

                    <div class="col-md-12">
                         <div style="" class="form-group">

                              <div class="mb-3">
                                   <textarea name="description" id="pDescription" class="textarea"
                                        placeholder="Place some text here" style=""></textarea>
                              </div>


                         </div>
                         <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>



               </div>
               <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>

     </form>
</div>


@endsection

@section('scripts')

<script src="{{ asset('js/product.js') }}"></script>


@endsection