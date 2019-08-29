@inject('role', 'App\Models\Role')

<label for='name'>Name</label>
<div class='form-group'>
    {!! Form::text('name',null,[
        'class'=>'form-control'
        ]) !!}
</div>

<label for='email'>Email</label>
<div class='form-group'>
    {!! Form::text('email',null,[
        'class'=>'form-control'
        ]) !!}
</div>

<label for='password'>Password</label>
<div class='form-group'>
    {!! Form::text('password',null,[
        'class'=>'form-control'
        ]) !!}
</div>



<label for='role_list'>Roles</label>
<div class='form-group'>
    <div class="row">
        @foreach ($role->all() as $rolei)
        <div class="col-md-3">
            <div class="input-group">
            <span class="input-group-addon">
                <input type="checkbox" id='{{$rolei->name}}' name='role_list[]' value='{{$rolei->id}}'>
            </span>
            <label for='{{$rolei->name}}' class="form-control" >{{$rolei->name}}</label>
            </div><!-- /input-group -->
        </div>    
        @endforeach
    </div>
</div>
<div class='form-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
</div>

