<script>
    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      this.toaster;
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
            break;
          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
            break;
          case 'success':
              Command: toastr["success"]("{{ Session::get('message') }}")
            break;
          case 'error':
              toastr.error("{{ Session::get('message') }}");
            break;
        }
    @endif
</script>
