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
                <input type="text" placeholder="Job Title">
            </div>
        </div>

        <div>
            <p>Location</p>
            <div>
                <input type="text" placeholder="City">
            </div>
        </div>

        <div>
            <p>How many moving helpers?</p>
            <div>
                <input type="number" name="" id="">
            </div>
        </div>

        <div>
            <p>Helper wage per person</p>
            <div>
                <input type="number" name="" id="">
            </div>
        </div>

        <div>
            <p>Deployment date</p>
            <div>
                <input type="date" name="" id="">
            </div>
        </div>

        <div>
            <p>Deployment time</p>
            <p>From</p>
            <input type="time" name="" id="">
            <p>To</p>
            <input type="time">
        </div>
    </div>

    <div>
        <p>Job Details</p>

        <div>
            <p>Description</p>
            <textarea name="" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Tasks</p>
            <textarea name="" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Requirements</p>
            <textarea name="" id="" cols="50" rows="5"></textarea>
        </div>
    </div>
</form>

@endsection