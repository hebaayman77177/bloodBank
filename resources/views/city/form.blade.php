
    <label for='name'>Name</label>
    <div class='form-group'>
        {!! Form::text('name',null,[
            'class'=>'form-control'
            ]) !!}
    </div>

    <?php
        use App\Models\Governorate;
        $options =Governorate::pluck('name', 'id');
        $selected=$model->governorate_id;
        
    ?>
    <label for='name'>Governorate</label>
    <div class='form-group'>
        {!! Form::select('governorate', $options, $selected ,['class'=>'form-control']) !!}
    </div>

    <div class='form-group'>
        <button class='btn btn-primary' type='submit'>Save</button>
    </div>
	
