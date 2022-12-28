@extends('layouts.font')

@section('content')
    <form method="POST" action="{{ route('lesson-vocabulary.update', ['lesson_id' => $lesson_id, 'id' => $id]) }}">
        @method('PUT')
        @csrf
        <div class="card text-right">
            <div class="card-body">
                <button class="btn btn-primary" type="submit" role="button">Save Vocabulary</button>
            </div>
        </div>

        <div class="container mt-2">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title">Create new vocabulary</h4>
                    <div class="form-group">
                        <label for="">Value</label>
                        <input type="text" name="value" class="form-control" placeholder="Value" required
                            value="{{ $vocabulary->value }}">
                    </div>
                    <div class="form-group">
                        <label for="">Explain</label>
                        <input type="text" name="explain" class="form-control" placeholder="Explain"
                            value="{{ $vocabulary->explain }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kanji</label>
                        <input type="text" name="Kanji" class="form-control" placeholder="Kanji"
                            value="{{ $vocabulary->kanji }}">
                    </div>
                    <div class="form-group">
                        <label for="">Mean</label>
                        <input type="text" name="mean" class="form-control" placeholder="Mean" required
                            value="{{ $vocabulary->mean }}">
                    </div>
                    <div class="form-group">
                        <label for="">Example</label>
                        <input type="text" name="example" class="form-control" placeholder="Example"
                            value="{{ $vocabulary->example }}">
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
