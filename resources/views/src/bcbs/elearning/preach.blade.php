@extends('src.bcbs.elearning')
@section('learning')
    <div class="row"><br>
        <h3 class="font center bold italic w3-margin-top" id="preach">{{ trans('bcbs.preach_the_word') }}</h3>
        <div class="row w3-margin-top w3-padding">
            <div class="col s12 m7">
                <div class="row blue lighten-5 blue-text w3-round-medium w3-padding animate__animated animate__bounce">
                    <h5 class="font">
                        The Number one task of every believer is to preach God's Word
                        <i class="fa fa-microphone blue-text right w3-xlarge w3-margin-left"></i>
                    </h5>
                </div>
                <div class="w3-border w3-round-large w3-padding">
                    <b>Tips and Technique to preach the Word</b><br>
                    <p class="justify">
                        preaching the word of God...
                </div>
            </div>


            <div class="col s12 m4 push-m1">
                <h4 class="font w3-margin-top bold">Preach the Word in season and out of season</h4>
                <div class="row w3-round-medium">
                    <p class="justify">
                        <img src="{{ URL::asset('image/res/preach.jpg')  }}" alt="" class="w3-circle-m w3-padding" width="100%">
                    </p>
                </div>
            </div>

        </div>
    </div>
    <script>
        $("html, body").animate({ scrollTop: $("#preach").offset().top - 100}, 1000);
    </script>
@endsection
