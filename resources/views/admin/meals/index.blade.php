<x-admin-master>
    @section('content')

        <h1>Všechna jídla</h1>

        @if (\Illuminate\Support\Facades\Session::has('message'))

        <div class="alert alert-danger">{{session('message')}}</div>

        @elseif (session('meal-created-message'))
            <div class="alert alert-success">{{session('meal-created-message')}}</div>

        @elseif(session('meal-updated-message'))
            <div class="alert alert-success">{{session('meal-updated-message')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabulka vytvořených jídel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($meals as $meal)
                            <tr>
                                <td>{{$meal->id}}</td>
                                <td><a href="{{route('meal.edit', $meal->id)}}">{{$meal->name}}</a></td>
                                <td>{{$meal->price}}</td>
                                <td>{{$meal->created_at}}</td>
                                <td>{{$meal->updated_at}}</td>
                                <td>
                                    <form method="post" action="{{route('meal.destroy', $meal->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection


    @section('scripts')

    <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection


</x-admin-master>
