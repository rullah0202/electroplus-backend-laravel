@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

                <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
                
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Category Image </th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td><img src="{{ asset($item->category_image) }}" style="width: 70px; height:40px;" ></td>
                            <td>
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr> 
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Category Image </th>
                            <th>Action</th> 
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
     
        table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script src="{{ asset('adminbackend/assets/js/code.js') }}"></script>
@endsection