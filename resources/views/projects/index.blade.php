@extends('layouts.layout-bootstrap')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All projects') }}
    </h2>

@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($projects->chunk(3) as $set)
                        <div class="row">
                        @foreach($set as $project)
                                <div class="col-sm-4" style="margin-top: 10px">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$project->title}}</h5>
                                            <p class="card-text">{{$project->description}}</p>
                                            <a href="{{$project->path()}}">more</a></li>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                        @endforeach






                </div>
            </div>
        </div>
    </div>
@endsection
