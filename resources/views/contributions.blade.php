@extends ('layouts.main')
@section('content')
    <div class="col-lg-12">
        <caption>
            <h3>{{ $data['title'] }}</h3>
        </caption>
        <h3> <span class="notification-badge">Total: kes{{ $totalAmount }}/=</span></h3>
        <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Filter
            Contributions</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <form action="#" method="get">
                        @csrf
                        <div class="container">
                            <h3>Filter here</h3>
                            <label class="form-label" for="google-icons">Month</label>
                            <select id="month" name="month" class="form-control">
                                <option value="">Select Month</option>
                                <option value="Jan">January</option>
                                <option value="feb">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="Sep">September</option>
                                <option value="Oct">October</option>
                                <option value="Nov">November</option>
                                <option value="Dec">December</option>
                            </select>
                        </div>
                        <div class="container">
                            <label for="year">Year:</label>
                            <input type="number" id="year" class="form-control" name="year" min="2023"
                                max="2100">
                        </div>
                        <div class="container">
                            <label for="year">Welfare Number:</label>
                            <input type="text" id="reg_number" class="form-control" name="reg_number"><br>
                        </div>
                        <div class="container">
                            <a href="#"><button class="btn btn btn-success btn-sm" type="submit">Filter</button>
                        </div>
                    </form>
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

                    {{-- @include('contributions_table') --}}
                </div>
            </div>
        </div>

        <a href="{{ route('my-contributions') }}"><button class="btn btn btn-success btn-sm">My Contributions</button>
        </a>
        <a href="{{ route('contribute') }}"><button class="btn btn btn-danger btn-sm">Contribute</button>
        </a><br><br>
        <table class="table table-sm   table-bordered table-stripe" width="100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scoop="col">Welfare Number</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone Number </th>
                    <th scope="col">Month</th>
                    <th scope="col">P.Number</th>
                    <th scope="col">P.Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Code</th>
                    <th scope="col">D.O.P</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data['contributions'] as $contribution)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contribution->reg_number }}</td>
                        <td>{{ $contribution->first_name }}</td>
                        <td>{{ $contribution->last_name }}</td>
                        <td>{{ $contribution->phone_number }}</td>
                        <td>{{ $contribution->month }}</td>
                        <td>{{ $contribution->p_number }}</td>
                        <td>{{ $contribution->p_name }}</td>
                        <td>{{ $contribution->p_amount }}</td>
                        <td>{{ $contribution->p_code }}</td>
                        <td>{{ $contribution->created_at }}</td>

                        <td>
                            @if ($contribution->confirmation_status == 1)
                                <button class="btn btn-success"> <i class="fa fa-check-circle"></i> Confirmed</button>
                            @else
                                <form action="{{ route('confirm-action') }}" method="post"
                                    onclick="return confirm('Do you really want to confirm this payment?')">
                                    @method('post')
                                    @csrf
                                    <input type="hidden" name="contribution_id" value="{{ $contribution->id }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i> Confirm

                                    </button>
                                </form>
                            @endif

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#confirmButton').on('click', function() {
                    $.ajax({
                        url: '{{ route('confirm-action') }}',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                $('#confirmButton').hide();
                                $('#confirmationTick').show();
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>

    </div>
@endsection
