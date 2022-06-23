@extends('layouts.admin')

@section('content')


@include('partials.session_message')
@include('partials.errors')
<div class="container">
<h1 class="my-3">All Categories</h1>

    <div class="row">
        <div class="col">
            <form action="" method="post" class="d-flex align-center">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="front-end" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cats as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td>
                            <form id="category-{{$category->id}}" action="{{route('admin.categories.update', $category->slug)}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{$category->name}}">
                            </form>
                        </td>
                        <td>

                            {{$category->name}}
                 
                        </td>
                        <td>{{$category->slug}}</td>
                        <td><span class="badge badge-dark">{{count($category->posts)}}</span></td>
                        <td>
                            <button form="category-{{$category->id}}" type="submit" class="btn btn-primary">Update</button>
                            <form action="{{route('admin.categories.destroy', $category->slug)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td>No category found!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection