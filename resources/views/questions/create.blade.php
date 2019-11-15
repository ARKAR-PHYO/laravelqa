@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Go back to All Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="question-title">Question Title</label>
                          <input type="text" name="question-title" id="question-title" class="form-control {{ $errors->has('title')?'is-invalid' : '' }} " placeholder="Question Title">

                          @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                          @endif

                        </div>

                        <div class="form-group">
                          <label for="question-body">Explain Your Question</label>
                          <textarea class="form-control {{ $errors->has('title')?'is-invalid' : '' }} " name="question-body" id="question-body" rows="10"></textarea>

                          @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                          @endif

                        </div>

                        <button type="submit" class="btn btn-outline-secondary btn-lg">Ask this question</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
