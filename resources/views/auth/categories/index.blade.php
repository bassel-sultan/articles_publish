@extends('layouts.auth')

@section('title','Posts')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />


@endsection

@section('content')

<div class="content-wrapper">
    <div class="content">
        <!-- Masked Input -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Show Categories</h2>
            </div>





                <div  class="card-body" >
                    @if(count($categories)>0)
                    <table class="table" id="category">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category )
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>{{ $category->name }}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                    <h3 class="text-center text-danger">There is no categories</h3>
                    @endif


                </div>
            </div>
        </div>
    </div>
    @endsection


    @section('scripts')
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
    $('#posts').DataTable({
        "bLengthChange": false
    });
});
    </script>
    @endsection
