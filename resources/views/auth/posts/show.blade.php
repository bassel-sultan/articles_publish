@extends('layouts.auth')


@section('title','Edit Post | Admin Dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <!-- Masked Input -->
        <div class="card card-default">
            <div class="card-header">
                <h2>View Post</h2>

            </div>

            <table class="table">

                    <tr>

                           <th>Title</th>
                           <td>{{ $post->title }}</td>


                    </tr>
                    <tr>


                    </tr>
                    <tr>
                        <th scope="col" >Is Publish</th>
                        <th scope="col">Category</th>

                        <th scope="col">Usrname</th>
                    </tr>
                    <tr>
                        <td >{{ $post->status===1 ? 'Published':'Draft' }}</td>
                        <td >{{ $post->category->name }}</td>

                        <td >{{ $post->user->name }}</td>
                    </tr>
                </table>



                <table class="table">
                    <tr scope="col">
                        <th scope="col" >Description</th>

                     </tr>
                     <td>
                         <textarea name="description" class="form-control" id="" readonly cols="30" rows="3"
                         style="resize: none"  placeholder="Description">{{ $post->description }}</textarea>
                     </td>
                </table>






        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/auth/js/multi-dropdown.js') }}"></script>
@endsection
