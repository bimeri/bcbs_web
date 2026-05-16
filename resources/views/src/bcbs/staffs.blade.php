@extends('welcome')
@section('bcbs_title', trans('bcbs.staffs'))
@section('bcbs_content')
<div class="row">
    <h2 class="center font bold italic">Instructors</h2>
    <div class="col s12 m12">
        <div class="row">
            <div class="col s12 m7">
                <div class="row w3-light-gray w3-round-medium w3-padding animate__animated animate__bounce">
                    <h6 class="font"><b>Instructors of:</b> Buea College of Biblical Studies (BCBS) 
                    <i class="fa fa-graduation-cap teal-text w3-large w3-margin-left"></i>
                     <a href="{{route('bcbs.director')}}" class="right blue-text"><i class="fa fa-arrow-right blue-text"></i> Visit the Director</a>
                </h6>
                </div>
                <div class="row w3-border w3-round-medium w3-padding justify">
                    <h5 class="text-uppercase font green-text">Train Faithful Men who will train others in the service of the Lord <label>| 2Tim2:2</label></h5>
                    <div class="row"><hr class="double"></div>
                    @foreach($staffs as $key => $staff)
                        <div class="row">
                            <img src="{{ $staff->profile }}" class="left circles-big" alt="" style="border-radius: 50%;
                            height: 200px;
                            width: 200px;
                            object-fit: cover !important;
                            object-position: center;
                            shape-outside: circle(50%);
                            margin-right: 1.5rem" />
                            <div class="w3-padding">
                                <h3 class="font bold">{{$staff->name}}</h3><hr>
                                <p class="justify">{{ $staff->str_describe }}</p>
                                <p class="right w3-padding"><b>Email</b>: <a href="mailto:{{ $staff->email }}" class="w3-text-blue">{{ $staff->email }}</a></p>
                            </div>
                        </div>
                        <div class="row"><hr></div>
                    @endforeach
                </div>
                <div class="row">
                    <label>Introduction to Biblical Studies</label>
                    <!-- <iframe width="100%" height="420" src="https://www.youtube.com/embed/jeDWOasrLEA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        <div class="w3-padding w3-border w3-round-medium blue blue-text lighten-5 center">Stay tune for more introduction information about our staff</div>
                </div>
                <div class="row">

                </div>
            </div>

{{-- left side --}}
            <div class="col s12 m3 push-m1">
                <div class="row">
                    <label for="">Our Top partners (Sunset International)</label>
                    <div class="w3-light-grey w3-round-medium">
                        <iframe width="100%" height="300px" src="https://www.youtube.com/embed/3Xjq6-qX-a0" title="Sunset Team" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row"> <hr class="double"></div>
                <div class="row w3-light-gray w3-round-medium">
                    <legend class="w3-padding">
                        <h6 class="center w3-medium bold font">Contact General Administration</h6>
                        <p class="w3-small justify">For any inquiries about student profile infomation or validation, please contact the administrator</p>
                        <small>provide you full identification</small>
                        <h3 class="right bold w3-medium">Call: <a href="tel:+237678678947"><i class="fa fa-phone green-text w3-small fa-rotate-270"></i> +237677218585</a></h3>
                    </legend>
                </div><hr>
                <h3 class="font bold">Block Post</h3><br>
                <div class="row w3-light-gray w3-round-medium w3-padding">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
