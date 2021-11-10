
/* Reload page after success */
var responseMessage = (response) => {
    
    if(response.status == 'success')
    {
        Swal.fire({
            title: "Congratulation!",
            text: response.message,
            type: "success",
            confirmButtonText: "OK",
            confirmButtonClass: "btn btn-success mt-2",
        }).then(function(result) {
            if (result.value) {
                location.reload();
            }
        });
    }

    if(response.status == 'error')
    {
        responseError(response);
    }
}

var responseError = (response) => {
    Swal.fire({
        title: "Sorry!",
        text: response.message,
        type: "error"
    });
}

var responseServerError = () => {
    Swal.fire({
        title: "Sorry!",
        text: "External server error, Please contact to Administrator!",
        type: "error"
    });
}

var responseDelete = (url) => {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to delete this record?",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-success mt-2",
        cancelButtonClass: "btn btn-danger ml-2 mt-2",
        buttonsStyling: !1
    }).then(function(result) {
        if(result.value){
            $.ajax({
                url:  url,
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    responseMessage(response);
                },
                error:function(data) {
                    responseServerError();
                }
            });
        }
    });
}

