@extends('layouts.master')

@section('carousel')
  @include('layouts.carousel')
@endsection

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


  <!-- Pagination -->
  @if(count($posts))
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul>
  @else
    <div class="row">
      <div class="col-12">
          <div class="card my-4">
              <div class="card-body">
                  <h4 class="card-title">No result found for "{{ (Session::has('search') ? Session::get('search') : '')  }}"</h4>
              </div>
          </div>
      </div>
  </div>
  @endif

</div>

@endsection
