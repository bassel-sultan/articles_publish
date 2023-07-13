@extends('layouts.auth')


@section('title','Create Post | Admin Dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <!-- Masked Input -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Post</h2>




                <div class="card-body">
                    @if($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <form method="POST" action="{{ route('posts.update',$post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title',$post->title) }}" class="form-control"
                                placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3"
                                style="resize: none"
                                placeholder="Description">{{ old('description',$post->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Is Publish</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected></option>
                                <option @selected(old('status',$post->status)==1) value="1" >Publish</option>
                                <option @selected(old('status',$post->status)==0) value="2" >Draft</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Choose Option</option>
                                @if(count($categories)>0)


                                @foreach ($categories as $category)

                                <option @selected(old('category',$post->category)==$category->id) value="{{
                                    $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                                <option value=" disable selected"> Choose Option</option>

                                @if (count($tags)>0)
                                @foreach ($tags as $tag)
                                @foreach ($post->tags as $postTag)

                                    @if($tag->id==$postTag->id)
                                    @continue
                                    @else
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endif



                                @endforeach

                                @endforeach
                                @endif

                                @if(count($post->tags)>0)
                                @foreach ( $post->tags as $postTag )
                                <option @selected(old('tags',$postTag->id)==$postTag->id) value="{{ $postTag->id
                                    }}">{{ $postTag->name }}</option>
                                @endforeach


                                @else

                                @endif




                            </select>
                        </div>

                        <div class="form-group mb-5">
                            <label>Image</label>
                            <input type="file" name="file" value="{{ old('file') }}" class="form-control"
                              >
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{ asset('assets/auth/js/multi-dropdown.js') }}"></script>
    @endsection
