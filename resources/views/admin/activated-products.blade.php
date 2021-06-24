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
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Child Category</th>
                                            <th>Vendor</th>
                                            <th>Qty Supplied</th>
                                            <th>Old Price</th>
                                            <th>New Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($products) > 0)
                                            @foreach($products as $key => $product)
                                                <tr>
                                                    <td>
                                                        <div class="text-center user-info">
                                                            <img src="{{ asset('backend') }}/assets/img/profile-3.jpg" alt="avatar">
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->category->cat_name }}</td>
                                                    <td>{{ $product->subcategory->sub_cat_name }}</td>
                                                    <td>{{ $product->children->child_name }}</td>
                                                    <td>{{ $product->user->lastname }} {{ $product->user->firstname }}</td>
                                                    <td>{{ $product->quantity_supplied }}</td>
                                                    <td>$ {{ number_format($product->old_price, 2)  }}</td>
                                                    <td>$ {{ number_format($product->new_price, 2) }}</td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary">View</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>No Record Found</p>
                                        @endif

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Child Category</th>
                                            <th>Vendor</th>
                                            <th>Qty Supplied</th>
                                            <th>Old Price</th>
                                            <th>New Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

 @endsection
