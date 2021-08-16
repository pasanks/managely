@extends('layouts.layout-bootstrap')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create a project') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 mx-3">
            <div class="bg-white shadow rounded">
                <div class="p-6 bg-white border-b border-gray-200">
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
                        <div class="form-group row flex">
                            <div class="w-full">
                                <button name="submit" type="submit" class="btn btn-primary">Create Project</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>
@endsection
