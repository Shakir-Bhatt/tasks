@extends('layouts.app')

@section('content')
    <div class="container">
        <h5> Employee Information</h5>
        <div class="jumbotron">
            @if ($employee)
                <p>
                    <h4>Name: {{$employee->name}}</h4>
                </p>
                <p>
                    @if ($employee->assigned_shifts)
                        <h5>Assigned Shifts</h5>
                        <ul class="list-group">
                            @forelse ($employee->assigned_shifts as $shift )
                                <li class="list-group-item">
                                    Date: {{$shift->created_at}} ||
                                    Shift: {{$shift->getShift()}}  ||
                                    <a type='button' href="{{ route('employee.view',[$shift->shift_id])}}" class='btn btn-primary'>Edit</a>

                                </li>
                            @empty
                                <li class="list-group-item">No shifts assigned</li>
                            @endforelse
                         </ul>
                        
                    @endif
                </p>
                
            @else
                <h3>No Data Avaialble</h3>
            @endif
            
        </div>


        <div class="jumbotron">
            <h5 >Shifts</h5>
            @forelse ($shifts as $shift )

                <span class="badge badge-primary">{{$shift->from }} to {{ $shift->to}}</span>
                
            @empty
                <h3>No shifts avaialble</h3>
            @endforelse
            
        </div>

    </div>
@endsection
