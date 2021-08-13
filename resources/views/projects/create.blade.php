@extends('layouts.layout-bootstrap')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create a project') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

{{--                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
{{--                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}

                    <form method="POST" action="/projects">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-4 col-form-label">Title</label>
                            <div class="col-8">
                                <input id="title" name="title" placeholder="Project Title" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-4 col-form-label">Description</label>
                            <div class="col-8">
                                <textarea id="description" name="description" cols="40" rows="5" class="form-control" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-4">
                                <a href="/projects" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
