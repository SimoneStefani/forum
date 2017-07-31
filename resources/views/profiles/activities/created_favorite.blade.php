@component('profiles.activities.activity')
  @slot('heading')
    <div class="level">
      <a href="{{ $activity->subject->favorited->path() }}" class="flex">
        {{ $profileUser->name }} favorited a reply
      </a>
      <i class="fa fa-heart" aria-hidden="true"></i>
    </div>
  @endslot

  @slot('body')
    {{ $activity->subject->favorited->body }}
  @endslot
@endcomponent