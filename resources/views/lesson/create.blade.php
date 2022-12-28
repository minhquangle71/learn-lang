@extends('layouts.font')

@section('content')
    <form method="POST" action="{{ route('lesson.store') }}">
        @csrf
        <div class="card text-right">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <button class="btn btn-primary" type="submit" role="button">Create Lesson</button>
            </div>
        </div>

        <div class="container mt-2">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title">Create new lesson</h4>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Lesson name" required>
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
    </form>
@endsection
