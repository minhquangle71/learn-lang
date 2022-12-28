@extends('layouts.font')

@section('content')
    <div class="card text-right">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <a class="btn btn-primary" href="{{ route('lesson.create') }}" role="button">Create Lesson</a>
        </div>
    </div>

    <div class="row p-2">
        @if (isset($lessons) && count($lessons) > 0)
            @foreach ($lessons as $lesson)
                <div class="col-3">
                    <div class="card">
                        <img class="card-img-top" src="https://via.placeholder.com/100x70" alt="">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title">{{ $lesson['name'] }}</h4>
                                </div>
                                <div class="col-4 mr-auto"><a
                                        href="{{ route('contest.index', ['lesson_id' => $lesson['id']]) }}"
                                        class="btn btn-danger">Start</a>
                                </div>
                                <div class="col-4 ml-auto"><a href="{{ route('lesson.edit', ['id' => $lesson['id']]) }}"
                                        class="btn btn-warning">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
