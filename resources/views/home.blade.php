@extends('layouts.app')
@section('content2')
    <script language="javascript">
        $(document).ready(function(){
            $('#submitBtn1').on('click',function(){
                $('#form1lunch').submit();
                $('#form1dinner').submit();

            });
            $('#submitBtn2').on('click',function(){
                $('#form2lunch').submit();
                $('#form2dinner').submit();
            });
            $('#submitBtn3').on('click',function(){
                $('#form3lunch').submit();
                $('#form3dinner').submit();
            });
            $('#submitBtn4').on('click',function(){
                $('#form4lunch').submit();
                $('#form4dinner').submit();
            });
            $('#submitBtn5').on('click',function(){
                $('#form5lunch').submit();
                $('#form5dinner').submit();
            });
            $('#submitBtn6').on('click',function(){
                $('#form6lunch').submit();
                $('#form6dinner').submit();
            });
            $('#submitBtn7').on('click',function(){
                $('#form7lunch').submit();
                $('#form7dinner').submit();
            });
        });
    </script>
    <!-- Modal -->
    @foreach($dates as $date)
    <div class="modal fade" id="{{$date[1]}}Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$date[1]}} ({{$date[2]}})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">Oběd</div>
                            <form action="{{route('orders.create')}}" method="post" enctype="multipart/form-data" id="form{{$date[0]}}lunch">
                                @csrf
                                <div class="form-group">
                                    <select name="menu_id" id="menu_id">
                                        <option value=""></option>
                                        @foreach($orders as $order)
                                            @if($order->meal_type == 'lunch' && $order->week_day == $date[0])
                                                <option value="{{$order->id}}">{{$order->name}}</option>
                                                @break
                                            @endif
                                        @endforeach
                                        @foreach($menus as $menu)
                                            @if($menu->meal_type == 'lunch' && $menu->week_day == $date[0])
                                                <option value="{{$menu->id}}">{{$menu->meal->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </form>
                    <div class="modal-title">Večeře</div>
                    <form action="{{route('orders.create')}}" method="post" enctype="multipart/form-data" id="form{{$date[0]}}dinner">
                        @csrf
                        <div class="form-group">
                            <select name="menu_id" id="menu_id">
                                <option value=""></option>
                                @foreach($orders as $order)
                                    @if($order->meal_type == 'dinner' && $order->week_day == $date[0])
                                        <option value="{{$order->id}}">{{$order->name}}</option>
                                        @break
                                    @endif
                                @endforeach
                                @foreach($menus as $menu)
                                    @if($menu->meal_type == 'dinner' && $menu->week_day == $date[0])
                                        <option value="{{$menu->id}}">{{$menu->meal->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submitBtn{{$date[0]}}">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <form action="{{route('home.next')}}">--}}
{{--                    <button class="btn btn-primary" disabled>Předchozí týden</button>--}}
{{--                    <input type="submit" class="btn btn-primary" value="Následující týden"/>--}}
{{--                </form>--}}
                @foreach($dates as $date)
                    <div class="card" id="card">
                        <div class="card-header" id="card-header">{{$date[1]}} ({{$date[2]}}) </div>

                        <div class="card-body" id="card-body">
                            <div class="card-subtitle" id="card-subtitle">Oběd</div>
                            @foreach($orders as $order)
                                @if($order->meal_type == 'lunch' && $order->week_day == $date[0])
                                <label id="{{$order->id}}"><b>{{$order->name}}</b></label>
                                    @break
                                @elseif($order->id == "")
                                    <label><i>Objednávka na tento den nebyla vytvořena</i></label>
                                    @break
                                @endif
                            @endforeach
                            <div class="card-subtitle" id="card-subtitle">Večeře</div>
                            @foreach($orders as $order)
                                @if($order->meal_type == 'dinner' && $order->week_day == $date[0])
                                    <label><b>{{$order->name}}</b></label>
                                    @break
                                @else
                                    <label><i>Objednávka na tento den nebyla vytvořena</i></label>
                                    @break
                                @endif
                            @endforeach
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$date[1]}}Modal">
                                Objednat
                            </button>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
