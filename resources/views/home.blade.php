@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @for ($i = 1; $i <= 7; $i++)
                        @foreach($menus as $menu)
                        <h3>{{$days[$i]}} ({{$menu->}})</h3>

                        <div>
                            <h4>Oběd</h4>
                            <div>
                                <form action="" >
                                    @csrf
                                    <select class="form-control form-control-sm">

                                        @if($menu->week_day== $i)
                                            <option>{{$menu->meal->name}}</option>

                                        @endif
{{--                                        @if($menu->week_day == $i && $menu->type == 'lunch')--}}
{{--                                            <option>{{$menu->meal->name}}</option>--}}
{{--                                        @endif--}}
                                    @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>

                    @endfor


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
