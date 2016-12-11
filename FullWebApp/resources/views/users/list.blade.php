@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <br/>
        <br/>
        <br/>
        <br/>
            <div class="panel panel-primary">
                <div class="panel-heading"> List of users </div>
                <div class="panel-body">
                    {!! $filter->open !!}

                    <div class="input-group custom-search-form pull-right">

                        {!! $filter->field('src') !!}

                        <span class="input-group-btn">
                            <button class="btn btn-default search_bar" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            <a href="{{ url('/list') }}" class="btn btn-default search_bar">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
                        </span>

                    </div>

                    {!! $filter->close !!}
                    {!! $grid !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
