@extends("layout")

@section("pageTitle")
    Create Job
@endsection

@section("content")
@php
    use App\Models\Job;
@endphp

<form action="{{route('job.create')}}" method="post">
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
            <p>Setting Type</p>
            <select name="setting_type" id="">
                @foreach (Job::ALLOWED_SETTING_TYPES as $type)
                    <option>{{$type}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <p>Weekly hours</p>
            <div>
                <input type="number" name="weekly_hours" id="">
            </div>
        </div>

        <div>
            <p>Date of hiring</p>
            <div>
                <input type="date" name="start_date" id="">
            </div>
        </div>

        <div>
            <p>Duration</p>
            <input type="number" name="duration" id="">
        </div>
    </div>

    <div>

        <div>
            <p>Job description</p>
            <textarea name="description" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Expectation</p>
            <textarea name="expectation" id="" cols="50" rows="5"></textarea>
        </div>

        <div>
            <p>Offer</p>
            <textarea name="offer" id="" cols="50" rows="5"></textarea>
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

@endsection