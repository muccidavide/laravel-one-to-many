@extends('layouts.admin')

@section('content')
dd($content)
<div class="container">
  <h2 class="py-4">Create a new Post</h2>
  @include('partials.errors')
  <form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Learn php article" aria-describedby="titleHelper" value="{{old('title')}}">
      <small id="titleHelper" class="text-muted">Type the post title, max: 150 carachters</small>
    </div>
    <!-- TODO: Change to input type file -->
    <div class="form-group">
      <label for="cover_image">cover_image</label>
      <input type="text" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" placeholder="Learn php article" aria-describedby="cover_imageHelper" value="{{old('cover_image')}}">
      <small id="cover_imageHelper" class="text-muted">Type the post cover_image</small>
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content" rows="4">
      {{old('content')}}
      </textarea>
    </div>
    <div class="form-group">
      <label for="category_id">Categories</label>
      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        <option value=""> Select Category:</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{ old($category->id) == $category->id ? 'selected' : '' }} >{{$category->name}}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Add Post</button>

  </form>

</div>


@endsection