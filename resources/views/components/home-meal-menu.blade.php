 @section('content')

        <h1>Objednávky</h1>

        <form action="{{route('meal.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nazev</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="title"
                       aria-describedby=""
                       placeholder="Enter name">

            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="file">File</label>--}}
            {{--                <input type="file"--}}
            {{--                       name="post_image"--}}
            {{--                       class="form-control-file"--}}
            {{--                       id="post_image"--}}
            {{--                       placeholder="">--}}

            {{--            </div>--}}


            {{--            <div class="form-group">--}}
            {{--                <textarea--}}
            {{--                    name="body"--}}
            {{--                    class="form-control"--}}
            {{--                    id="body"--}}
            {{--                    cols="30"--}}
            {{--                    rows="10"></textarea>--}}

            {{--            </div>--}}


        </form>
        <button type="submit" class="btn btn-primary">Uložit</button>
 @endsection

