@extends('layouts.backend.admin-app')

@section('title', 'Reiss Edwards E-commerce Application')

@section('content')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">



                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Create New Category</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mx-auto">
                                            <form method="post" action="{{ route('admin.store.category') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="t-text" class="sr-only">Text</label>
                                                    <input id="t-text" type="text" name="category_name" placeholder="Category Name" class="form-control" required>
                                                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>






                </div>
            </div>
 @endsection
