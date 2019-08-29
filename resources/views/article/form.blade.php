
    <label for='name'>Header</label>
    <div class='form-group'>
        {!! Form::text('header',null,[
            'class'=>'form-control'
            ]) !!}
    </div>
    <label for='name'>Content</label>
    <div class='form-group'>
            {!! Form::textarea('content', null, ['class'=>'form-control' ]) !!}
    </div>
    <label for='name'>Photo</label>
    <div class='form-group'>
            {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        <button class='btn btn-primary' type='submit'>Save</button>
    </div>
	
