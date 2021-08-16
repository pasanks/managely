@extends('layouts.layout-bootstrap')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All projects') }}
    </h2>

@endsection

@section('content')

    <div class="py-12 mx-3">
        <div class="flex flex-wrap">
            @forelse ($projects as $project)
                <div class="w-1/3 px-3 pb-3">
                    <div class="bg-white p-3 rounded shadow">
                        <h3 class="font-normal text-xl py-4 -ml-4 mb-3 border-l-4 border-blue-600 pl-4">
                            {{$project->title}}
                        </h3>

                        <div class="text-gray-500">
                            {{$project->description}}
                        </div>
                        <div class="text-gray-500 ">
                            <a class="no-underline" href="{{$project->path()}}">See more</a></li>
                        </div>
                    </div>
                </div>

            @empty
                <div>No Projects yet</div>
            @endforelse
        </div>
    </div>
@endsection
