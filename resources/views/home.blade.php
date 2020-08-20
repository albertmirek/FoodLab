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
                $('#form1_lunch').submit();
                $('#form1_dinner').submit();
                $('#form3_lunch').submit();
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
                @for($i = 1; $i <= 7; $i++)
                    <div class="card" id="card">
                        <div class="card-header" id="card-header">{{$days[$i]}}</div>

                        <div class="card-body" id="card-body">
                            <div class="card-subtitle" id="card-subtitle">Oběd</div>
                            <form action="{{route('orders.create')}}" method="post" enctype="multipart/form-data" id="form{{$i}}_lunch">
                                @csrf
                                <select class="form-control form-control-sm" id="card-select" name="menu_id">
                                    <option id="card-option" value=""></option>
                                    @foreach($menus as $menu)
                                        @if($menu->week_day== $i && $menu->meal_type == 'lunch')
                                            <option id="card-option" value="{{$menu->id}}">{{$menu->meal->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                            <div class="card-subtitle" id="card-subtitle">Večeře</div>
                            <form action="{{route('orders.create')}}" method="post" enctype="multipart/form-data" id="form{{$i}}_dinner">
                                @csrf
                                <select class="form-control form-control-sm" id="card-select" name="menu_id">
                                    <option id="card-option" value=""></option>
                                    @foreach($menus as $menu)
                                        @if($menu->week_day== $i && $menu->meal_type == 'dinner')
                                            <option id="card-option" value="{{$menu->id}}">{{$menu->meal->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </form>
                            </div>
                        </div>
                    @endfor
                        <button type="submit" class="btn btn-primary" id="submitBtn">Uložit</button>
            </div>
        </div>
    </div>
@endsection




@section('content2')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <form action="{{route('home.next')}}">--}}
{{--                    <button class="btn btn-primary" disabled>Předchozí týden</button>--}}
{{--                    <input type="submit" class="btn btn-primary" value="Následující týden"/>--}}
{{--                </form>--}}
                @for($i = 1; $i <= 7; $i++)
                    <div class="card" id="card">
                        <div class="card-header" id="card-header">{{$dates[$i-1][1]}} ({{$dates[$i-1][2]}}) </div>

                        <div class="card-body" id="card-body">
                            <div class="card-subtitle" id="card-subtitle">Oběd</div>
                            @foreach($orders as $order)
                                @if($order->menu->meal_type == 'lunch' && $order->menu->week_day == $i)
                                <label><b>{{$order->menu->meal->name}}</b></label>
                                @else
                                    <label><i>Objednávka na tento den nebyla vytvořena</i></label>
                                @endif
                            @endforeach
                            <div class="card-subtitle" id="card-subtitle">Večeře</div>
                            @foreach($orders as $order)
                                @if($order->menu->meal_type == 'dinner' && $order->menu->week_day == $i)
                                    <label><b>{{$order->menu->meal->name}}</b></label>
                                @else
                                    <label><i>Objednávka na tento den nebyla vytvořena</i></label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection
