<script type="text/javascript">
	$(document).ready(function(){
		@if(Session::has('success'))
			messageBox("", "The registration has been successfully completed", "success");
		@endif
		@if(Session::has('error'))
			messageBox("", "{{ Session::get('error') }}", "error");
		@endif
		function messageBox(title, content, type) {
			setTimeout(function () {
				Swal.fire(
					title,
					content,
					type
				);
			}, 1000);
		}
	});
</script>