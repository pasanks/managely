@extends('layouts.layout-bootstrap')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of {{$project->title}}
    </h2>
@endsection

@section('content')

   <div class="py-12 mx-3">
        <div class="flex">
            <div class="lg:w-3/4 px-3">
                <h2 class="text-gray-500 text-lg font-normal">Tasks</h2>
                <div class="bg-white rounded shadow">
                    @forelse($project->tasks as $task)
                        <form method="POST" action="{{$task->path()}}">
                            @csrf
                            @method('patch')
                            <div class="form-group row p-1.5" >
                                <div class="col-12 flex">
                                    <input id="body" name="body" value="{{$task->body}}"
                                           type="text" class="w-full border-none {{$task->completed ? 'text-gray-500': ''}}" required="required">
                                    <input type="checkbox" class="form-checkbox"
                                         value=1  name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked': ''}}>
                                </div>
                            </div>
                        </form>
{{--                        <div>{{$task->body}}</div>--}}
                    @empty
                        <div>No tasks available</div>
                    @endforelse
                    <div class="mt-3  p-1.5">
                        <form method="POST" action="{{$project->path().'/tasks'}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="body" name="body" placeholder="Add a new Task" type="text" class="form-control" required="required">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-3 ">
                    <h2 class="text-gray-500 text-lg  font-normal">General Notes</h2>

                    <div class="bg-white rounded shadow  p-1.5">
                        <form method="POST" action="{{$project->path()}}">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <div class="col-12">
                                                    <textarea id="notes" name="notes" placeholder="Add notes" type="text"
                                                              class="form-control">{{$project->notes}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                <div class="bg-white rounded shadow p-2.5">

                    <h3 >{{$project->title}}</h3>

                    <div >{{$project->description}}</div>


                </div>
            </div>

        </div>

    </div>


@endsection


{{--<div class="overflow-hidden p-3.5">--}}
{{--    <div class="">--}}
{{--        <h5>Tasks : </h5>--}}
{{--        @forelse($project->tasks as $task)--}}
{{--            <div>{{$task->body}}</div>--}}
{{--        @empty--}}
{{--            <div>No tasks available</div>--}}
{{--        @endforelse--}}
{{--        <form method="POST" action="{{$project->path().'/tasks'}}">--}}
{{--            @csrf--}}
{{--            <div class="form-group row">--}}
{{--                <div class="col-8">--}}
{{--                    <input id="body" name="body" placeholder="Add a new Task" type="text" class="form-control" required="required">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--    <div class="border-b border-gray-200">--}}
{{--        <form method="POST" action="{{$project->path()}}">--}}
{{--            @csrf--}}
{{--            @method('patch')--}}
{{--            <div class="form-group row">--}}
{{--                <label for="description" class="col-4 col-form-label">General Notes</label>--}}
{{--            </div>--}}
{{--            <div class="form-group row">--}}
{{--                <div class="col-8">--}}
{{--                                <textarea id="notes" name="notes" placeholder="Add notes" type="text"--}}
{{--                                          class="form-control">{{$project->notes}}</textarea>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group row">--}}
{{--                <div class="col-4">--}}
{{--                    <button name="submit" type="submit" class="btn btn-primary">Save</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}

{{--</div>--}}
