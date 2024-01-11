@extends ('layouts.main')
@section('content')
    <!-- Displaying user profile information in a view -->
    <title> my profile</title>

    <form class="mt-3 mb-3">
        @foreach ($data['members'] as $member)
            <div class="container">
                <div class="col-lg-4 row">
                    <h3>personal Details</h3>
                    <p>Welfare Number: {{ $member->reg_number }}</p>
                    <p>Name: {{ $member->first_name }}</p>
                    <p>Gender: {{ $member->gender }}</p>
                    <p>Id Number: {{ $member->id_number }}</p>
                    <p>Phone Number: {{ $member->phone_number }}</p>
                    {{-- <p>Email: {{ $user->email }}</p> --}}
                    <p>County: {{ $member->county }}</p>
                    <p>Ward: {{ $member->ward }}</p>
                    <p>Location: {{ $member->location }}</p>
                    <p>Joined: {{ $member->created_at }}</p>
                    <a href="{{ route('edit', $member->id) }}"><button type="button" class="btn btn-info"> Update
                            Profile</button></a>
                </div>

                <div class="col-lg-4 row">
                    <h3>Next of Kin Details</h3>
                    <p>Kin Name: {{ $member->kin_name }}</p>
                    <p>Kin Number: {{ $member->kin_number }}</p>
                    <p>Kin Id: {{ $member->kin_id }}</p>
                    <p>Relationship: {{ $member->kin_relationship }}</p>
                </div>
                <div class="col-lg-4 row">
                    <h3>Registraion Details
                    </h3>
                    <p>Payment Number: {{ $member->payment_number }}</p>
                    <p>Payment Name: {{ $member->payment_name }}</p>
                    <p>Amount: {{ $member->amount }}</p>
                    <p>Code: {{ $member->_code }}</p>
                </div>
        @endforeach

        </div>
    @endsection
