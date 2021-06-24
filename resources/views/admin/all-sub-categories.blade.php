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
                                            <th>Sub Category Name</th>
                                            <th>Category Name</th>
                                            <th>Creator</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($subCategories) > 0)
                                            @foreach($subCategories as $key => $subcategory)
                                                <tr>
                                                    <td>{{ $subcategory->sub_cat_name }}</td>
                                                    <td>{{ $subcategory->category->cat_name }}</td>
                                                    <td>{{ $subcategory->creator->lastname }} {{ $subcategory->creator->firstname }}</td>
                                                    <td>
                                                        @if ($subcategory->is_active == 1)
                                                        <span class="btn btn-success">Active</span>
                                                        @else
                                                            <span class="btn btn-warning">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="post" action="{{ route('admin.delete.subcategories', $subcategory->id) }}">
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
                                            <th>Sub Category Name</th>
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
