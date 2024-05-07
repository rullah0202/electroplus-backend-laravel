@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">All Slider</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">All Slider</li>
				</ol>
			</nav>
		</div>
		<div class="ms-auto">
			<div class="btn-group">
				<a href="{{ route('add.slider') }}" class="btn btn-primary">Add Slider</a> 				 
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
							<th>Slider Title </th>
							<th>Short Title </th>
							<th>Slider Image </th>
							<th>Action</th> 
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $key => $item)		
								<tr>
									<td> {{ $key+1 }} </td>
									<td>{{ $item->slider_title }}</td>
									<td>{{ $item->short_title }}</td>
									<td> <img src="{{ asset($item->slider_image) }}" style="width: 70px; height:40px;" >  </td>
									<td>
										<a href="{{ route('edit.slider',$item->id) }}" class="btn btn-info">Edit</a>
										<a href="{{ route('delete.slider',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
									</td> 
								</tr>
								@endforeach
			
					</tbody>
					<tfoot>
						<tr>
							<th>Sl</th>
							<th>Slider Title </th>
							<th>Short Title </th>
							<th>Slider Image </th>
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
<script>
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            }) 
        });
    });
</script>
@endsection