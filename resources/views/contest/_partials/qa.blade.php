<div class="card question">
    <div class="row my-2 mx-2 question-content text-center">
        Question: {{ $question_type == QUESTION_TRANSLATE ? $main_question->mean : $main_question->value }}
    </div>
</div>

<div class="row p-2 mx-auto mt-5 justify-content-center answer-content">
    @foreach ($questions as $question)
        <div class="col-5 my-2">
            <div class="form-check w-100">
                <label class="form-check-label w-100">
                    <div class="card">
                        <div class="card-body pl-5">
                            <input type="radio" class="form-check-input" name="answer"
                                value="{{ $question->id == $main_question->id ? $main_question->id : 0 }}">
                            <span class="answer_key"></span>
                            <span
                                class="answer_value">{{ $question_type == QUESTION_TRANSLATE ? $question->value : $question->mean }}</span>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    @endforeach
</div>
