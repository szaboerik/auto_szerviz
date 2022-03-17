class MyAjax {

    getAdat(apivegpont, tomb, myCallback) {
        tomb.splice(0, tomb.length);

        $.ajax({
            url: apivegpont,
            type: "GET",
            success: function (result) {
                console.log("result");
                result.forEach((element) => {
                    tomb.push(element);
                });

                myCallback(tomb);
            },
        });
    }

}

/*
$.ajax({
    url: 'http://127.0.0.1:8000/mvezeto/feladatok',
    headers: {
        'Content-Type': 'http://127.0.0.1:8000'
    },
    type: "GET"
    dataType: "json",
    data: {
    },
    success: function (result) {
        console.log(result);
    },
    error: function () {
        console.log("error");
    }
});
*/

