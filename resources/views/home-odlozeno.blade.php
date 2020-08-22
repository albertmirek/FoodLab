@extends('layouts.app')

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
