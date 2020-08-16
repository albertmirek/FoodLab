@extends('layouts.app')

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @for ($i = 1; $i <= 7; $i++)--}}
{{--                        @foreach($menus as $menu)--}}
{{--                        <div class="card-title">{{$days ?? '' ?? ''[$i]}}</div>--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="card-subtitle">Oběd</div>--}}
{{--                            <div>--}}
{{--                                <form action="" >--}}
{{--                                    @csrf--}}
{{--                                    <select class="form-control form-control-sm">--}}
{{--                                        <option value="" selected disabled hidden>Vyberte zde</option>--}}
{{--                                        @if($menu->week_day== $i && $menu->meal_type == 'lunch')--}}
{{--                                            <option>{{$menu->meal->name}}</option>--}}

{{--                                        @endif--}}
{{--                                    </select>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <div class="card-subtitle">Večeře</div>--}}
{{--                            <div>--}}
{{--                                <form action="" >--}}
{{--                                    @csrf--}}
{{--                                    <select class="form-control form-control-sm">--}}
{{--                                        <option value="" selected disabled hidden>Vyberte zde</option>--}}
{{--                                        @if($menu->week_day== $i && $menu->meal_type == 'dinner')--}}
{{--                                            <option value="{{$menu->meal->id}}">{{$menu->meal->name}}</option>--}}

{{--                                        @endif--}}

{{--                                    </select>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}

{{--                    @endfor--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@section('content')
    <script language="javascript">
        $(document).ready(function(){
            $('#submitBtn').on('click',function(){
                $('#form0').submit();
                // $('#form2').submit();
                // $('#form3').submit();
                // $('#form4').submit();
                // $('#form5').submit();
                // $('#form6').submit();
                // $('#form7').submit();
            });

        });
    </script>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @for($i = 0; $i <= 6; $i++)
                    <form action="{{route('orders.create')}}" method="post" enctype="multipart/form-data" id="form{{$i}}">
                        @csrf
                        <div class="card" id="card">
                            <div class="card-header" id="card-header">{{$days[$i]}}</div>

                            <div class="card-body" id="card-body">
                                <div class="card-subtitle" id="card-subtitle">Oběd</div>
                                <select class="form-control form-control-sm" id="card-select" name="menu_id">
                                    @foreach($menus as $menu)
                                        @if($menu->week_day== $i && $menu->meal_type == 'lunch')
                                            <option id="card-option" value="{{$menu->id}}">{{$menu->meal->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="card-subtitle" id="card-subtitle">Večeře</div>
                                <select class="form-control form-control-sm">
                                    @foreach($menus as $menu)
                                        @if($menu->week_day== $i && $menu->meal_type == 'dinner')
                                            <option id="card-option">{{$menu->meal->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    @endfor
                        <button type="submit" class="btn btn-primary" id="submitBtn">Uložit</button>
            </div>
        </div>
    </div>
@endsection
