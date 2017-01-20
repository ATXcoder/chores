@extends('app')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
@endsection

@section('script')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="{{asset('js/countUp.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {

            var numAnim = new CountUp("tokenCount", 0, <?php echo $data[0]['tokens']?>, 0, 6);
            numAnim.start();

            $('.rewards').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2> You have
                    <span id="tokenCount" style="font-size: 3.5em; color: #ffd700;"></span>
                    tokens!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Some of the rewards you can buy</h2>
                <div class="col-md-10 col-md-offset-1">
                    <div class="rewards">
                        @foreach($rewards as $reward)
                            <div>
                                <span class="text-center"><img src="{{asset('/img/reward.png')}}"></span>
                                <a href="#">{{$reward->name}}</a>
                                <h2>{{$reward->token_cost}} tokens</h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection