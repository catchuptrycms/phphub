<div class="col-md-3 side-bar">

    @if (isset($topic))
        <div class="panel panel-default corner-radius">

            <div class="panel-heading text-center">
                <h3 class="panel-title">Author：{{ $topic->user->name }}</h3>
            </div>

            <div class="panel-body text-center topic-author-box">
                @include('topics.partials.topic_author_box')


                @if(Auth::check() && $currentUser->id != $topic->user->id)
                    <span class="text-white">
                    <?php $isFollowing = $currentUser && $currentUser->isFollowing($topic->user->id) ?>
                    <hr>
                    <a data-method="post" class="btn btn-{{ !$isFollowing ? 'warning' : 'default' }} btn-block"
                    href="javascript:void(0);" data-url="{{ route('users.doFollow', $topic->user->id) }}"
                    id="user-edit-button">
                    <i class="fa {{!$isFollowing ? 'fa-plus' : 'fa-minus'}}"></i> {{ !$isFollowing ? lang('Follow') : lang('Unfollow') }}
                    </a>
                    </span>
                @endif
            </div>

        </div>
    @endif


    @if (isset($userTopics) && count($userTopics))
        <div class="panel panel-default corner-radius">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ $topic->user->name }} Other Topics</h3>
            </div>
            <div class="panel-body">
                @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $userTopics])
            </div>
        </div>
    @endif


    @if (isset($categoryTopics) && count($categoryTopics))
        <div class="panel panel-default corner-radius">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('Topics in the same category') }}</h3>
            </div>
            <div class="panel-body">
                @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $categoryTopics])
            </div>
        </div>
    @endif

    @if (Route::currentRouteName() == 'topics.index')

        <div class="panel panel-default corner-radius">
            <div class="panel-body text-center">
                <div class="btn-group">
                    <a href="{{ URL::route('topics.create') }}" class="btn btn-primary btn-lg btn-inverted">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ lang('New Topic') }}
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="panel panel-default corner-radius" style="text-align: center; background-color: transparent; border: none;">
        empty panel
    </div>

    <div class="panel panel-default corner-radius" style="
    text-align: center;
    background-color: transparent;
    border: none;
">
        empty panel
    </div>


    @if(isset($banners['sidebar-resources']))
        <div class="panel panel-default corner-radius sidebar-resources">
            <div class="panel-heading text-center">
                <h3 class="panel-title">Resources</h3>
            </div>
            <div class="panel-body">
                <ul class="list list-group ">
                    @foreach($banners['sidebar-resources'] as $banner)
                        <li class="list-group-item">
                            Banner
                        </li>
                        <li class="list-group-item">
                            Banner
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (Route::currentRouteName() == 'topics.index')
        <div class="panel panel-default corner-radius panel-active-users">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('Active Users') }}（<a href="{{ route('hall_of_fame') }}"><i
                                class="fa fa-star" aria-hidden="true"></i> {{ lang('Hall of Fame') }}</a>）</h3>
            </div>
            <div class="panel-body">
                @include('topics.partials.active_users')
            </div>
        </div>

        <div class="panel panel-default corner-radius panel-hot-topics">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('Hot Topics') }}</h3>
            </div>
            <div class="panel-body">
                @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $hot_topics])
            </div>
        </div>
    @endif

    @if (isset($randomExcellentTopics) && count($randomExcellentTopics))

        <div class="panel panel-default corner-radius panel-hot-topics">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('Recommend Topics') }}</h3>
            </div>
            <div class="panel-body">
                @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $randomExcellentTopics])
            </div>
        </div>

    @endif

    @if (Route::currentRouteName() == 'topics.index')

        <div class="panel panel-default corner-radius">
            <div class="panel-heading text-center">
                <h3 class="panel-title">{{ lang('App Download') }}</h3>
            </div>
            <div class="panel-body text-center" style="padding: 7px;">
                <a href="https://laravel-china.org/topics/1531" target="_blank" rel="nofollow" title="">
                    <img src="https://dn-phphub.qbox.me/uploads/images/201512/08/1/cziZFHqkm8.png" style="width:240px;">
                </a>
            </div>
        </div>

    @endif
</div>
<div class="clearfix"></div>
