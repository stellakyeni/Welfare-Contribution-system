@extends ('layouts.main')
@section('content')
    <div class="col-lg-12">
        <caption>
            <h3>{{ $data['title'] }}</h3>
        </caption>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="table-responsive">

            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scoop="col">Welfare Number</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender </th>
                        <th scope="col">ID Number</th>
                        <th scope="col">Phone Number </th>
                        <th scope="col">County</th>
                        <th scope="col">Ward</th>
                        <th scope="col">Location</th>
                        <th scoop="col">Joined</th>

                        <th scope="col">Kin Name</th>
                        <th scope="col">Kin Number</th>
                        <th scope="col">Kin Id</th>
                        <th scope="col">Kin Relationship </th>

                        <th scope="col">Payment Number</th>
                        <th scope="col">Payment Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Code</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['members'] as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->reg_number }}</td>
                            <td>{{ $member->first_name }}</td>
                            <td>{{ $member->last_name }}</td>
                            <td>{{ $member->gender }}</td>
                            <td>{{ $member->id_number }}</td>
                            <td>{{ $member->phone_number }}</td>
                            <td>{{ $member->county }}</td>
                            <td>{{ $member->ward }}</td>
                            <td>{{ $member->location }}</td>
                            <td>{{ $member->created_at }}</td>

                            <td>{{ $member->kin_name }}</td>
                            <td>{{ $member->kin_number }}</td>
                            <td>{{ $member->kin_id }}</td>
                            <td>{{ $member->kin_relationship }}</td>

                            <td>{{ $member->payment_number }}</td>
                            <td>{{ $member->payment_name }}</td>
                            <td>{{ $member->amount }}</td>
                            <td>{{ $member->code }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
