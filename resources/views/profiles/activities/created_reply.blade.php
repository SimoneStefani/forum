@component('profiles.activities.activity')
  @slot('heading')
    <div class="level">
      {{ $profileUser->name }} replied to
      <a href="{{ $activity->subject->thread->path() }}" class="flex">
        {{ $activity->subject->thread->title }}
      </a>
      <i class="fa fa-reply" aria-hidden="true"></i>
    </div>
  @endslot

  @slot('body')
    {{ $activity->subject->body }}
  @endslot
@endcomponent