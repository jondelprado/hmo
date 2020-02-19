<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
      $(function(){
        Toast.fire({
          type: 'error',
          title: '{{$error}}'
        });
      });
  @endforeach
@endif

@if (session('success'))
    $(function(){
      Toast.fire({
        type: 'success',
        title: '{{session('success')}}'
      });
    });
@endif

@if (session('error'))
    $(function(){
      Toast.fire({
        type: 'error',
        title: '{{session('error')}}'
      });
    });
@endif


</script>
