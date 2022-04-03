@extends('layouts.app')

@section('content')
<div class="container">
<h3> List of customers</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($employees as $employee)
            <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->name}}</td>
                <td>
                    <a type='button' href="{{ route('employee.view',[$employee->id])}}" class='btn btn-primary'>Primary</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$employees->links()}}
    </div>
@endsection
