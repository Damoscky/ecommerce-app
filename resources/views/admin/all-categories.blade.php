@extends('layouts.backend.admin-app')

@section('title', 'Reiss Edwards E-commerce Application')

@section('content')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Creator</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($categories) > 0)
                                            @foreach($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $category->cat_name }}</td>
                                                    <td>{{ $category->creator->lastname }} {{ $category->creator->firstname }}</td>
                                                    <td>
                                                        @if ($category->is_active == 1)
                                                        <span class="btn btn-success">Active</span>
                                                        @else
                                                            <span class="btn btn-warning">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="post" action="{{ route('admin.delete.category', $category->id) }}">
                                                            @csrf
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>No Record Found</p>
                                        @endif

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Creator</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

 @endsection
