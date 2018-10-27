@extends('layouts.master')
@section('content')
  <!-- Blog Entries Column -->
  <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$posts->title}}</h1>
        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Start Bootstrap</a>
        </p>
        <hr>
        <!-- Date/Time -->
        <p>postsed on {{$posts->created_at->toFormattedDateString() }} at {{$posts->created_at->format('h:i A')}}</p>
        <hr>

        <div class="card">
            @if($posts->biglink)
            <img class="card-img-top img-responsive" src="{{asset($posts->biglink)}}" alt="Card image cap">
            @endif
            <div class="card-body">
                <p class="card-text store" style="text-align:justify"> {{ $posts->body}}</p>
            </div>
        </div>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Recent Comments</h4>
              <h6 class="card-subtitle">Latest Comments on users from Material</h6> </div>
          <!-- ============================================================== -->
          <!-- Comment widgets -->
          <!-- ============================================================== -->
          <div class="comment-widgets">
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                  <div class="p-2"><span class="round"><img src="{{asset('images/user-1.png')}}" alt="user" width="50"></span></div>
                  <div class="comment-text w-100">
                      <h5>James Anderson</h5>
                      <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                      <div class="comment-footer"> <span class="text-muted pull-right">April 14, 2016</span></div>
                  </div>
              </div>
              <!-- Comment Row -->
              <div class="d-flex flex-row comment-row">
                  <div class="p-2"><span class="round"><img src="{{asset('images/user-2.png')}}" alt="user" width="50"></span></div>
                  <div class="comment-text active w-100">
                      <h5>Michael Jorden</h5>
                      <p class="m-b-5">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry..</p>
                      <div class="comment-footer "> <span class="text-muted pull-right">April 14, 2016</span></div>
                  </div>
              </div>

          </div>
      </div>
      </div>
@endsection
