  @extends ('layouts.main')
  @section('content')
      {{-- End Of Model --}}
      <div class="col-lg-12">
          <caption>
              <p>Total Contributions: Kes{{ $totalAmount }}/=</p>
          </caption>
          @if (session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
          <a href="{{ route('contribute') }}"><button class="btn btn btn-success btn-sm">Contribute</button> </a><br>
          <table class="table table-sm   table-bordered table-stripe" width="100%">

              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Month</th>
                      <th scoop="col">Payment Name</th>
                      <th scope="col">Payment Number</th>
                      <th scope="col">Amount</th>
                      <th scope="col">payment Code</th>
                      <th scope="col">D.O.P</th>
                      <th scope="col">Action</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach ($data['contributions'] as $contribution)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $contribution->month }}</td>
                          <td>{{ $contribution->p_name }}</td>
                          <td>{{ $contribution->p_number }}</td>
                          <td>{{ $contribution->p_amount }}</td>
                          <td>{{ $contribution->p_code }}</td>
                          <td>{{ $contribution->created_at }}</td>
                          <td><a href="#"><button class="btn btn btn-success">Edit</button></a></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  @endsection
