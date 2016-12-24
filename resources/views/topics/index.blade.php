@extends('layouts.default')

@section('title')
{{ lang('Topic List') }} @parent
@stop

@section('content')

<div class="col-md-9 topics-index main-col">
    <div class="panel panel-default">

        <div class="panel-heading">

          <ul class="list-inline topic-filter">
                <li class="popover-with-html" data-content="default"><a {!! app(App\Models\Topic::class)->present()->topicFilter('default') !!}>Default</a></li>
                <li class="popover-with-html" data-content="excellent"><a {!! app(App\Models\Topic::class)->present()->topicFilter('excellent') !!}>{{ lang('Excellent') }}</a></li>
                <li class="popover-with-html" data-content="vote"><a {!! app(App\Models\Topic::class)->present()->topicFilter('vote') !!}>{{ lang('Vote') }}</a></li>
                <li class="popover-with-html" data-content="recent"><a {!! app(App\Models\Topic::class)->present()->topicFilter('recent') !!}>{{ lang('Recent') }}</a></li>
                <li class="popover-with-html" data-content="noreply"><a {!! app(App\Models\Topic::class)->present()->topicFilter('noreply') !!}>{{ lang('Noreply') }}</a></li>
            </ul>

          <div class="clearfix"></div>
        </div>

        @if ( ! $topics->isEmpty())

            <div class="panel-body remove-padding-horizontal">
                @include('topics.partials.topics')
            </div>

            <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                <!-- Pager -->
                {!! $topics->appends(Request::except('page', '_pjax'))->render() !!}
            </div>

        @else
            <div class="panel-body">
                <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
            </div>
        @endif

    </div>

    <!-- Nodes Listing -->
    @include('nodes.partials.list')

</div>

@include('layouts.partials.sidebar')

@stop
