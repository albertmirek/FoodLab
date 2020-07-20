<x-admin-master>
    @section('content')

        <h1>Všechna jídla</h1>

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
                            <th>User_id</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>User_id</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($meals as $meal)
                            <tr>
                                <th>{{$meal->id}}</th>
                                <th>{{$meal->user_id}}</th>
                                <th>{{$meal->name}}</th>
                                <th>{{$meal->price}}</th>
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
