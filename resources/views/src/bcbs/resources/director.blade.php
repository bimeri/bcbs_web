@extends('welcome')
@section('bcbs_title', trans('bcbs.about'))
<style>
    td, th, tr{
        border-collapse: collapse !important;
        border: 1px solid #1e1e25 !important;
        font-size: 14px !important;
        text-align: center !important;
    }
</style>
@section('bcbs_content')
<div class="row" id="about">
    <div class="row w3-margin-top">
        <div class="col s12 w3-padding m5 l5">
            <img src="{{ URL::asset('image/resources/director_bcbs.jpg') }}" alt="{{ trans('bcbs.director_of_bcbs') }}" width="100%" height="350px" class="ml-l w3-round-medium">
            <h2 class="center bold">Mr. ARRON ESSOH OTIA</h2>
        </div>
        <div class="col s12 w3-padding m6 l6 ml-l">
            <h4 class="center">{{trans('bcbs.welcome_to_the')}} <label class="blue-text w3-large font">{!! trans('bcbs.school_name') !!}</label></h4>
            <label class="w3-small justify">{{ $director->intro }}</label>
            <p class="justify w3-small w3-margin-top">{!! $director->speech !!}</p>
        </div>
    </div>
</div>
<div class="row w3-margin-top" id="directors">
    <div class="col s8 m4 offset-m4 offset-s1 pointer blue-text">
        <a>
            <div class="div w3-btn w3-border w3-padding w3-round-large" onclick="showDirectors()">{{ trans('bcbs.click_here_to_list_of_directors') }}</div>
        </a>
    </div>
</div><br>
<div class="row" id="biography"></div>
<script>
    function showDirectors(){
        $('#bcbs_loader').show();
        $.ajax({
            method: "post",
            url: "{{ route('director.gettables') }}",
            data: {
                '_token': '{{ csrf_token() }}',
            },
            success: function(res){
                $("#directors").empty();
                $("#directors").append(res);
                $('#bcbs_loader').hide();
            },
            error: function(error){
                console.log(error);
                $('#bcbs_loader').hide();
            }
        });
    }

    function showDirectorsDetail(id){
        $('#bcbs_loader').show();
        $.ajax({
            method: "post",
            url: "{{ route('director.getDetail') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            },
            success: function(res){
                $("#biography").empty();
                $("#biography").append(res);
                $('#bcbs_loader').hide();
                $("html, body").animate({ scrollTop: $("#table").offset().top + 600 }, 1000);
            },
            error: function(error){
                console.log(error);
                $('#bcbs_loader').hide();
            }
        });
    }
</script>
@endsection
