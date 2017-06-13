@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} created a thread
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent