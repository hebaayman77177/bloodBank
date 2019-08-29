<?php
    use App\Models\City;
    use App\Models\BloodType;

    $optionsCity =City::pluck('name', 'id');
    $selectedCity=$model->city_id;

    $optionsBloodType =BloodType::pluck('name', 'id');
    $selectedBloodType=$model->blood_type_id;      
?>


<label for='name'>Name</label>
<div class='form-group'>
    {!! Form::text('name',null,[
        'class'=>'form-control'
        ]) !!}
</div>
{{-- <label for='password'>Password</label>
<div class='form-group'>
    {!! Form::text('password',null,[
        'class'=>'form-control'
        ]) !!}
</div> --}}
<label for='email'>Email</label>
<div class='form-group'>
    {!! Form::text('email',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='phone'>Phone</label>
<div class='form-group'>
    {!! Form::text('phone',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='date_of_birth'>Date of birth</label>
<div class='form-group'>
    {{ Form::date('date_of_birth', new \DateTime(), ['class' => 'form-control']) }}
</div>
<label for='date_of_last_donation'>Date of last donation</label>
<div class='form-group'>
    {{ Form::date('date_of_last_donation', new \DateTime(), ['class' => 'form-control']) }}
</div>
<label for='blood_type_id'>Blood type</label>
<div class='form-group'>
        {!! Form::select('blood_type_id', $optionsBloodType, $selectedBloodType ,['class'=>'form-control']) !!}
</div>
<label for='city_id'>City</label>
<div class='form-group'>
        {!! Form::select('city_id', $optionsCity, $selectedCity ,['class'=>'form-control']) !!}
</div>
<label for='status'>Status</label>
<div class='form-group'>
    {!! Form::text('status',null,[
        'class'=>'form-control'
        ]) !!}
</div>

<div class='form-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
</div>

