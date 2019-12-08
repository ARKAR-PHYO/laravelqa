<div class="media post">
    @include('shared._vote', [
    'model' => $answer
    ])

    {{-- MEDIA-BODY --}}
    <div class="media-body">
        {!! $answer->body_html !!}
        <div class="row">
            {{-- EDIT, DELETE BUTTON --}}
            <div class="col-4">
                <div class="ml-auto">
                    @can ('update', $answer)
                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-small btn-outline-info">Edit</a>
                    @endcan

                    @can ('delete', $answer)
                    <form class="form-delete" method="POST" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-small btn-outline-danger" onclick="return confirm('Are you sure?')">DEL</button>
                    </form>
                    @endcan
                </div>
            </div>
            {{-- EDIT, DELETE BUTTON END --}}

            <div class="col-4"></div>

            {{-- AUTHOR-INFO --}}
            <div class="col-4">
                @include('shared._author' , [
                'model' => $answer,
                'lable' => 'answered'
                ])
            </div>
            {{-- AUTHOR-INFO END --}}
        </div>
    </div>
    {{-- MEDIA-BODY END --}}
</div>
