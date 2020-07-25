<x-admin-master>
    @section('content')

        <h1>Úprava jídla</h1>

        <form action="{{route('meal.update', $meal->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nazev</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter name"
                        value="{{$meal->name}}"
                >

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>




        </form>

    @endsection


</x-admin-master>
