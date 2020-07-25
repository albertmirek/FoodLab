<x-admin-master>
    @section('content')

        <h1>Vytváření nabídek</h1>

        <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Jídlo</label>
                <select id="meals" name="meals" class="form-control">
                    @foreach($meals as $meal)
                        <option value="{{$meal->id}}">{{$meal->name}}</option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
{{--            <input type="radio" id="breakfast" name="meal_type" value="breakfast">--}}
{{--                <label for="breakfast">Breakfast</label><br>--}}
            <input type="radio" id="lunch" name="meal_type" value="lunch">
                <label for="lunch">Oběd</label><br>
            <input type="radio" id="dinner" name="meal_type" value="dinner">
                <label for="lunch">Večeře</label><br>

            <div class="form-group">
                <input type="date" name="date" value="" />

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            </div>



        </form>

    @endsection


</x-admin-master>
