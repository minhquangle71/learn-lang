@extends('layouts.font')

@section('content')
    <div class="card text-right">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title text-left">Vocabularies of lesson {{ $lesson->name }}</h4>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary" href="{{ route('lesson-vocabulary.create', ['lesson_id' => $lesson->id]) }}"
                        role="button">Create vocabulary</a>
                </div>
            </div>

        </div>
    </div>

    <div class="container mt-2">
        <div class="card text-left">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Value</th>
                            <th>Mean</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vocabularies as $vocabulary)
                            <tr>
                                <td>{{ $vocabulary->id }}</td>
                                <td scope="row">
                                    <span data-toggle="tooltip" title="{{ $vocabulary->explain }}">
                                        {{ $vocabulary->value }}
                                    </span>
                                </td>
                                <td>{{ $vocabulary->mean }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('lesson-vocabulary.edit', ['lesson_id' => $lesson->id, 'id' => $vocabulary->id]) }}"
                                                class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        {{ $vocabularies->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
