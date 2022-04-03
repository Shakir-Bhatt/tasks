@extends('layouts.app')

@section('content')
    <div class="container jumbotron">
        <h1>
            <center>Todo List App</center>
        </h1>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done !!! </strong>{{ session()->get('message') }}
            </div>
        @endif
        <div class="col-md-12">
            <h4>Add Task</h4>
            <form method="POST" action={{ route('todo.store') }} class="form-inline">
                {{ csrf_field() }}
                <div class="form-group col-md-6">
                    <input type="text" class="form-control col-md-12" name="todo" placeholder="Enter Task">
                </div>
                <div class="form-group  col-md-6">
                    <button type="submit" class="btn btn-success col-md-6">Add</button>
                </div>
            </form>
            <hr>
            <h4>Added Tasks</h4>
            <ol>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->task }}</td>
                                <td class="date-time">{{ $task->created_at }}</td>
                                <td><a href={{ url('todo/' . $task->id . '/complete') }} class="text-success">Mark
                                        Completed</a></td>
                            </tr>

                        @empty
                            <tr>
                                <th colspan="4">
                                    <center>No Task</center>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </ol>
            <h4>Completed</h4>
            <ol>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($completedTasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->task }}</td>
                                <td class="date-time">{{ $task->created_at }}</td>
                                <td><a href={{ url('todo/' . $task->id . '/delete') }} class="text-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="4">
                                    <center>No Task</center>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </ol>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            let dateTimes = $('.date-time');
            if (dateTimes.length > 0) {
                $('.date-time').each(function(i, obj) {
                    let localDateTime = convertUTCDateToLocalDate(new Date($(obj).text()));
                    $(obj).text(localDateTime);
                });
            }

        })

        function convertUTCDateToLocalDate(date) {
            var newDate = new Date(date.getTime() - date.getTimezoneOffset() * 60 * 1000);
            return newDate.toLocaleString();
        }
    </script>
@endsection
