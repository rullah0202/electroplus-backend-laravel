
	<!-- Bootstrap JS -->
	<script src="{{ asset('adminbackend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('adminbackend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('adminbackend/assets/js/validate.min.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>

	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>

		<!--Password show & hide js -->
		<script>
			$(document).ready(function () {
				$("#show_hide_password a").on('click', function (event) {
					event.preventDefault();
					if ($('#show_hide_password input').attr("type") == "text") {
						$('#show_hide_password input').attr('type', 'password');
						$('#show_hide_password i').addClass("bx-hide");
						$('#show_hide_password i').removeClass("bx-show");
					} else if ($('#show_hide_password input').attr("type") == "password") {
						$('#show_hide_password input').attr('type', 'text');
						$('#show_hide_password i').removeClass("bx-hide");
						$('#show_hide_password i').addClass("bx-show");
					}
				});
			});
		</script>
		@if(Session::has('message'))
		<script>
			
			var type = "{{ Session::get('alert-type','info') }}"
			switch(type){
			   case 'info':
			   toastr.info(" {{ Session::get('message') }} ");
			   break;
			   case 'success':
			   toastr.success(" {{ Session::get('message') }} ");
			   break;
			   case 'warning':
			   toastr.warning(" {{ Session::get('message') }} ");
			   break;
			   case 'error':
			   toastr.error(" {{ Session::get('message') }} ");
			   break; 
			}
			
		</script>
		@endif
	<script src="{{ asset('adminbackend/assets/js/index.js') }}"></script>
  <!--app JS-->
  <script src="{{ asset('adminbackend/assets/js/app.js') }}"></script>