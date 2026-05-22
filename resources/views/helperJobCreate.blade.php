@extends("layout")

@section("pageTitle")
    Create Job
@endsection

@section("content")
<form action="{{route('job.helper.create')}}" method="post">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif
    @csrf
    <div>
        <p>Booking details</p>

        <div>
            <p>Title / Your booking</p>
            <div>
                <input type="text" name="title" placeholder="Job Title">
            </div>
        </div>

        <div>
            <p>Location</p>
            <div>
                <input type="number" name="location_id" placeholder="City">
            </div>
        </div>

        <div>
            <p>Address</p>
            <div>
                <input type="text" name="address" placeholder="Street address, house number (optional)">
            </div>
        </div>

        <div>
            <p>How many moving helpers?</p>
            <div>
                <input type="number" name="employee_amount" id="">
            </div>
        </div>

        <div>
            <p>Helper wage per person</p>
            <div>
                <input type="number" name="wage" id="">
            </div>
        </div>

        <div>
            <p>Deployment date</p>
            <div>
                <input type="date" name="start_date" id="">
            </div>
        </div>

        <div>
            <p>Deployment time</p>
            <p>From</p>
            <input type="time" name="from" id="">
            <p>To</p>
            <input type="time" name="to">
        </div>
    </div>

    <div>
        <p>Job Details</p>

        <div>
            <p>Description</p>
            <textarea name="description" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Tasks</p>
            <textarea name="tasks" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Expectetion</p>
            <textarea name="expectetion" id="" cols="50" rows="5"></textarea>
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

@endsection