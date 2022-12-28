const { default: axios } = require("axios");

$(document).ready(function () {
    let success_id = 0;

    $(".btn-start-contest").on("click", function (e) {
        e.preventDefault();
        console.log("click start");

        loadAnswer(0);
    });

    $(".btn-submit-answer").on("click", function (e) {
        e.preventDefault();

        if (
            $("input[name='answer']").length &&
            $("input[name='answer']:checked").length
        ) {
            let parent = $("input[name='answer']:checked").parent();

            if ($("input[name='answer']:checked").val() != 0) {
                success_id = $("input[name='answer']:checked").val();
                parent.addClass("success-answer");
            } else {
                parent.addClass("fail-answer");
            }

            $("input[name='answer']").each((index, element) => {
                $(element).attr("disabled", true);
            });

            $(this).addClass("disabled");
            $(".btn-next-answer").removeClass("d-none");
        }
    });

    $(".btn-next-answer").on("click", function (e) {
        e.preventDefault();
        $(this).addClass("d-none");
        loadAnswer();
    });

    function loadAnswer() {
        axios
            .get(LOAD_QA_ROUTE, {
                params: {
                    success_id,
                },
            })
            .then((res) => {
                if (res.status == 200) {
                    $(".main-contest").html(res.data.view);
                    if (res.data.is_done) {
                        $(".btn-submit-answer").addClass("d-none");
                        $(".btn-start-contest").removeClass("d-none");

                        return;
                    }

                    $(".btn-submit-answer")
                        .removeClass("d-none")
                        .removeClass("disabled");

                    $(".btn-start-contest").addClass("d-none");
                }
            });
    }
});
