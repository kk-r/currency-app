
@extends('backLayout.app')
@section('title')
Login
@stop

@section('style')

@stop
@section('content')

<div class="row tile_count">
    @if ($errors->any())
        {!!  implode('', $errors->all('<div class="form-group has-error"><div class="col-sm-6">
            <p class="help-block">:message</p>
        </div>')) !!}
    @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    <?php echo Form::open(['url' => 'exchange', 'class' => 'form-horizontal']); ?>

        <div class="form-group <?php echo e($errors->has('from') ? 'has-error' : ''); ?>">
        <?php echo Form::label('from', 'From', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-6">
            <?php echo Form::text('from', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('from', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="form-group <?php echo e($errors->has('to') ? 'has-error' : ''); ?>">
        <?php echo Form::label('to', 'To', ['class' => 'col-sm-3 control-label']); ?>

        <div class="col-sm-6">
            <?php echo Form::text('to', null, ['class' => 'form-control']); ?>

            <?php echo $errors->first('to', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>

        <div class="form-group <?php echo e($errors->has('amount') ? 'has-error' : ''); ?>">
            <?php echo Form::label('amount', 'amount', ['class' => 'col-sm-3 control-label']); ?>

            <div class="col-sm-6">
                <?php echo Form::text('amount', null, ['class' => 'form-control']); ?>

                <?php echo $errors->first('amount', '<p class="help-block">:message</p>'); ?>

            </div>
        </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            <?php echo Form::submit('Submit', ['class' => 'btn btn-success form-control']); ?>

        </div>
    </div>
</div>
</div>
<?php echo Form::close(); ?>
</div>

@endsection

@section('scripts')


@endsection