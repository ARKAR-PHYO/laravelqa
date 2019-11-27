@if ($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURLSegment = 'questions';
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURLSegment = 'answers';
    @endphp
@endif

@php
    $FormId = $name . "-" . $model->id;
    $FormAction = "/{$firstURLSegment}/{$model->id}/vote"
@endphp

<div class="d-flex flex-column vote-controls">
    {{-- VOTE-UP --}}
    <a title="This {{ $name }} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('up-vote-{{ FormId }}').submit();"> <i class="fas fa-caret-up fa-3x"></i> </a>
    <form id="up-vote-{{ FormId }}" action="{{ $FormAction }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>

    {{-- VOTE-COUNT --}}
    <span class="votes-count">{{ $model->votes_count }}</span>

    {{-- VOTE-DOWN --}}
    <a title="This {{ $name }} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('down-vote-{{ FormId }}').submit();"><i class="fas fa-caret-down fa-3x"></i></a>
    <form id="down-vote-{{ FormId }}" action="{{ $FormAction }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Question)
        @include('shared._favorite', [
            'model' => $model
        ])
    @elseif($model instanceof App\Answer)
        @include('shared._accept', [
            'model' => $model
        ])
    @endif
</div>
