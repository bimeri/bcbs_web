
<div style="padding: 10px; margin: 4px; ">
    <p>Hello <b>{{$name}}</b>,  thank for you interest in joining BCBS,
        your registration was successful, your activation code is: <b>{{$code}}</b><br>
    </p>
    <p>Activation code expire after 30 minutes. To proceed with your registration process, please follow the link below to activate you account</p>
    <a href="{{route('bcbs.admission.signIn', ['val' => ''])}}" target="_blank">Visit the link to activate your account</a>
</div>
