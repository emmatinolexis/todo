"use strict";
var app = {
    main: function() {
        "use strict";

        app.execute();
    },
    execute: function() {

        // alert("hi");

        let table = new DataTable('#todo_table');
        $(document).on('click', '#updateTask', function() {

            var data = JSON.parse($(this).attr('data-data'));
            var url = $(this).attr('data-route');
            // console.log(url);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#start_date').val(data.start_date);
            $('#end_date').val(data.end_date);
            $('#route').val(url);

        });

        //submit task form ajax
        $("#create_task_form").submit(function(event) {
            alert
            event.preventDefault();
            // Hide all error messages
            // $('#name_error').text('')

            //show preloader and disable send button
            $('#create_task_form').preloader();
            $("#sendbtn").prop("disabled", true);

            //get form data
            var formData = $('#create_task_form').serialize();

            //send ajax request to server
            axios.post($('#create_task_form').attr('action'), formData)
                .then(function(response) {
                    // console.log(response);
                    //display success message
                    Swal.fire(
                        "Success!",
                        "" + response.data.msg + "",
                        "success"
                    );

                    //reload datatable
                    $('#task_table').DataTable().ajax.reload();

                    //remove preloader and disable submit button
                    $('#create_task_form').preloader('remove');
                    $("#sendbtn").prop("disabled", false);

                    //reset form
                    document.getElementById("create_task_form").reset();

                    //hide modal
                    $("#updateModal").modal('hide');

                })
                .catch(function(error) {
                    console.log(error.response);

                    Swal.fire(
                            "Error!",
                            "" + error.response.statusText + "",
                            "error"
                        );
                    $('#create_task_form').preloader('remove');
                    $("#sendbtn").prop("disabled", false);
                });

        });

        //update task form ajax
        $("#industry_form_update").submit(function(event) {
            event.preventDefault();

            console.log($('#route').val());


            //show preloader and disable send button
            $('#pdate_task_form').preloader();
            $("#updatebtn").prop("disabled", true);

            //get form data
            var formData = $('#pdate_task_form').serialize();
            console.log(formData);
            //send ajax request to server
            axios.post($('#route').val(), formData)
                .then(function(response) {

                    //display success message
                    Swal.fire(
                        "Success!",
                        "" + response.data.msg + "",
                        "success"
                    );

                    //reload datatable
                    $('#task_table').DataTable().ajax.reload();

                    //remove preloader and disable submit button
                    $('#pdate_task_form').preloader('remove');
                    $("#updatebtn").prop("disabled", false);

                    //hide modal
                    $("#updateModal").modal('hide');

                })
                .catch(function(error) {
                    console.log(error.response);

                    Swal.fire(
                            "Error!",
                            "" + error.response.msg + "",
                            "error"
                        );

                    $('#pdate_task_form').preloader('remove');
                    $("#updatebtn").prop("disabled", false);
                });
        });
    },
};
window.addEventListener('load', function() {
    app.main();
});
