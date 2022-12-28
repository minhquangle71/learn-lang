@extends('layouts.font')

@section('content')
    <div class="card text-right">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <button class="btn btn-primary" type="submit" role="button">Create Lesson</button>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card text-left">
            <div class="card-body">
                <h4 class="card-title">Lesson Description</h4>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Lesson name"
                        value="{{ $lesson['name'] }}" required>
                </div>
                <div class="form-group">
                    <label for="">Language</label>
                    <select class="form-control" name="lang">
                        @foreach (LANGUAGE_OPTIONS as $key => $lang)
                            <option value="{{ $key }}">{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="card text-left mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Vocabularies</h4>
                </div>
                <div class="col-4 ml-auto text-right">
                    <a href="{{ route('lesson-vocabulary.create', ['lesson_id' => $lesson['id']]) }}"
                        class="btn btn-danger">Add</a>
                    <a href="{{ route('lesson-vocabulary.index', ['lesson_id' => $lesson['id']]) }}"
                        class="btn btn-warning">Detail</a>
                </div>

            </div>
        </div>
    </div>
    <div class="card text-left mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Kanji</h4>
                </div>
                <div class="col-4 ml-auto text-right">
                    <a href="" class="btn btn-warning">Detail</a>
                </div>

            </div>
        </div>
    </div>
    <div class="card text-left mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Grammar</h4>
                </div>
                <div class="col-4 ml-auto text-right">
                    <a href="" class="btn btn-warning">Detail</a>
                </div>

            </div>
        </div>
    </div>
@endsection
