@component('profiles.activities.activity')
  @slot('heading')
    <div class="level">
      {{ $profileUser->name }} published
      <a href="{{ $activity->subject->path() }}" class="flex">
        {{ $activity->subject->title }}
      </a>
      <i class="fa fa-comments" aria-hidden="true"></i>
    </div>
  @endslot

  @slot('body')
    {{ $activity->subject->body }}
  @endslot
@endcomponent