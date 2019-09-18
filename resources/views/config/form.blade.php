<?php
    use App\Models\City;
    use App\Models\BloodType;

    $optionsCity =City::pluck('name', 'id');
    $selectedCity=$model->city_id;

    $optionsBloodType =BloodType::pluck('name', 'id');
    $selectedBloodType=$model->blood_type_id;      
?>


<label for='android_app_url'>Android app url</label>
<div class='form-group'>
    {!! Form::text('android_app_url',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='fb'>Face book</label>
<div class='form-group'>
    {!! Form::text('fb',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='twitter'>Twitter</label>
<div class='form-group'>
    {!! Form::text('twitter',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='twitter'>Twitter</label>
<div class='form-group'>
    {!! Form::text('twitter',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='inst'>Instgram</label>
<div class='form-group'>
    {!! Form::text('inst',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='google'>Google</label>
<div class='form-group'>
    {!! Form::text('google',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='whats'>Whats up</label>
<div class='form-group'>
    {!! Form::text('whats',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='phone'>Phone</label>
<div class='form-group'>
    {!! Form::text('phone',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='about'>About text</label>
<div class='form-group'>
    {!! Form::text('about',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='home'>Home text</label>
<div class='form-group'>
    {!! Form::text('home',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='notification_config'>notification config</label>
<div class='form-group'>
    {!! Form::text('notification_config',null,[
        'class'=>'form-control'
        ]) !!}
</div>


<div class='form-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
</div>

