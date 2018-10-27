@extends('layouts.master')

@section('content')
  <!-- Blog Entries Column -->
  <div class="col-lg-8">
    <div class="card my-4">
          <div class="card-body">
              <h4 class="card-title"><i class="fa fa-edit p-r-10"></i>Create New Post</h4>
              <!-- <h6 class="card-subtitle"></h6> -->
              <form method="post" action="{{(route('posts.store'))}}">
                @csrf
                <div class="form-group m-t-30 {{ $errors->has('title') ? ' has-danger' : '' }}">
                      <label>Title</label>
                      <input type="text" name="title" value="{{ old('email') }}" class="form-control" required>
                      @if ($errors->has('body'))
                          <small class="form-control-feedback"> {{ $errors->first('title') }}</small>
                      @endif
                  </div>
                  <div class="form-group {{ $errors->has('body') ? ' has-danger' : '' }}">
                    <label>Body</label>
                    <textarea class="form-control" name="body" rows="10" style="resize:none" required></textarea>
                    @if ($errors->has('body'))
                        <small class="form-control-feedback"> {{ $errors->first('body') }}</small>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </form>
          </div>
      </div>
  </div>

@endsection
