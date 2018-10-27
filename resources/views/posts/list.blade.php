@extends('layouts.master')

@section('carousel')
  @include('layouts.carousel')
@endsection

@push('styles')
<!--alerts CSS -->
<link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">
  @isset($posts)
    @foreach($posts as $post)
    <!-- Blog Post -->
    <div class="card mb-4">
      @if($post->imglink)
      <a href="{{ url($post->link_rewrite)}}">
        <img class="card-img-top" src="{{asset($post->imglink)}}" alt="Card image cap">
      </a>
      @endif
      <div  class="ribbon ribbon-corner ribbon-right ribbon-danger" data-userid="{{$post->users->id}}" data-postid="{{$post->id}}" data-toggle="tooltip" title="Remove" style="cursor:pointer"><i class="fa fa-trash" data-toggle="tooltip" title="Remove"></i></div>
      <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text" style="text-align:justify">
          <?php
              $str = strip_tags($post->body);
              if( strlen( $str) > 100) {
                $str = explode( "\n", wordwrap( $str, 200));
                $str = $str[0] . '...';
              } ?>
          {{$str}}
         </p>
        <a href="{{ url($post->link_rewrite)}}" class="btn btn-primary">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted on {{$post->created_at->toFormattedDateString() }} by
        <a href="#">Start Bootstrap</a>
      </div>
    </div>
    @endforeach
  @endisset



</div>

@endsection

@push('scripts')
<!-- Sweet-Alert  -->
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>

<script>
$("body").on("click", ".ribbon", function (e){

  	var post_id = $(this).attr('data-postid');
    var user_id = $(this).attr('data-userid');
    console.log(post_id);
    console.log(user_id);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover deleted post!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function(){
        swal({
          title: "Deleted!",
          text: "Your post has been successfully deleted",
          type: "success" },
          function(){
            $.ajax({
              type: "POST",
              url: "{{ url('user/my-post/delete') }}"+"/"+ user_id +"",
              data: {id:user_id},
              headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){

                location.reload();
              }
            });

          });
    });
});

</script>
@endpush
