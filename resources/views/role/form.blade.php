@inject('perm', 'App\Models\Permission')


<label for='name'>Name</label>
<div class='form-group'>
    {!! Form::text('name',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='display_name'>Display name</label>
<div class='form-group'>
    {!! Form::text('display_name',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='description'>Description</label>
<div class='form-group'>
    {!! Form::textarea('description',null,[
        'class'=>'form-control'
        ]) !!}
</div>
<label for='Permission'>Permissions</label>
<div class='form-group'>
    <div class="row">
        @foreach ($perm->all() as $permission)
        <div class="col-md-3">
            <div class="input-group">
            <span class="input-group-addon">
                <input type="checkbox" id='{{$permission->name}}' name='permission_list[]' value='{{$permission->id}}'>
            </span>
            <label for='{{$permission->name}}' class="form-control" >{{$permission->name}}</label>
            </div><!-- /input-group -->
        </div>    
        @endforeach
    </div>
</div>
<div class='form-group'>
    <button class='btn btn-primary' type='submit'>Save</button>
</div>

