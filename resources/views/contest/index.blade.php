@extends('layouts.font')

@section('content')
    <script>
        const LOAD_QA_ROUTE = '{{ route('contest.load-qa', ['lesson_id' => $lesson->id]) }}';
    </script>


    <div class="card text-right">
        <div class="row m-2">
            <div class="col-12 mx-auto text-center">
                Contest for lesson {{ $lesson->name }}
            </div>
            <div class="col-4 mx-auto text-center">
                <a name="" id="" class="btn btn-success btn-start-contest" href="#"
                    role="button">Start</a>
            </div>
        </div>
    </div>

    <div class="main-contest mt-5 mx-2">
    </div>

    <div class="submit-content text-right m-5">
        <a class="btn btn-primary btn-next-answer d-none" href="#" role="button">Next</a>
        <a class="btn btn-primary btn-submit-answer d-none" href="#" role="button">Submit</a>
    </div>
@endsection


@section('js')
    <script src="{{ mix('js/contest/contest.js') }}"></script>
@endsection
