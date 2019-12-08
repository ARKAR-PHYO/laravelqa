{{-- @if ($answersCount > 0) --}}

{{-- $answersCount  DIDN'T WORK  //$answersCount ရရင်အအပေါ်က if ကိုဖွင့်လို့ရပီ --}}
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>

                @include('layouts._messages')

                @foreach ($answers as $answer)
                    @include('answers._answer')
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}



