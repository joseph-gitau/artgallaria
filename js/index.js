$(document).ready(function () {

    var current_effect = 'roundBounce';
    $('#register_user').click(function () {
        console.log("register_user");
        event.preventDefault();
        run_waitMe(current_effect);

        // make ajax call to register user
        var form = $('#register_form');
        $.ajax({
            url: '../reg_exe.php',
            type: 'POST',
            data: {
                register_user: true,
                name: $('#name').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password_1: $('#password_1').val(),
                password_2: $('#password_2').val(),
                phone: $('#phone').val(),
                role: $('#role').val()
            },
            success: function (data) {
                $('#container').waitMe('hide');
                if (data == "success") {
                    // swal success
                    swal({
                        title: "Success",
                        text: "You have been registered successfully",
                        icon: "success",
                        button: "OK",
                    }).then(function () {
                        window.location = "../admin/index.php";
                    });
                    // reset form
                    form[0].reset();
                } else {
                    console.log(data);
                    // swal error
                    swal("Error", data, "error", {
                        button: "OK",
                    });
                }

            }

        });
    });
    function run_waitMe(effect) {
        $('#container').waitMe({

            //none, rotateplane, stretch, orbit, roundBounce, win8, 
            //win8_linear, ios, facebook, rotation, timer, pulse, 
            //progressBar, bouncePulse or img
            effect: 'roundBounce',

            //place text under the effect (string).
            text: 'please wait...',

            //background for container (string).
            bg: 'rgba(255,255,255,0.7)',

            //color for background animation and text (string).
            color: '#000',

            //max size
            maxSize: '',

            //wait time im ms to close
            waitTime: -1,

            //url to image
            source: '',

            //or 'horizontal'
            textPos: 'vertical',

            //font size
            fontSize: '',

            // callback
            onClose: function () { }

        });
    }
});

function run_waitMe(effect) {
    $('#container, #job-post, #msg_submit').waitMe({

        //none, rotateplane, stretch, orbit, roundBounce, win8, 
        //win8_linear, ios, facebook, rotation, timer, pulse, 
        //progressBar, bouncePulse or img
        effect: 'roundBounce',

        //place text under the effect (string).
        text: 'please wait...',

        //background for container (string).
        bg: 'rgba(255,255,255,0.7)',

        //color for background animation and text (string).
        color: '#000',

        //max size
        maxSize: '',

        //wait time im ms to close
        waitTime: -1,

        //url to image
        source: '',

        //or 'horizontal'
        textPos: 'vertical',

        //font size
        fontSize: '',

        // callback
        onClose: function () { }

    });
}
// custom run_waitMe
function run_waitMe_custom(effect, container, text, textPos) {
    effect = effect || 'roundBounce';
    container = container || '#container';
    $(container).waitMe({
        //place text under the effect (string).
        text: text || 'please wait...',

        //background for container (string).
        bg: 'rgba(255,255,255,0.7)',

        //color for background animation and text (string).
        color: '#000',

        //max size
        maxSize: '',

        //wait time im ms to close
        waitTime: -1,

        //url to image
        source: '',

        //or 'horizontal'
        textPos: textPos || 'vertical',

        //font size
        fontSize: '',

        // callback
        onClose: function () { }
    });
}
// edit_profile_pic preview
function showPreview(event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("profile_pic_preview");
        preview.src = src;
        preview.style.display = "block";
    }
}
// update_details
$("#update_details").click(function () {
    event.preventDefault();
    run_waitMe();
    var file = $('#image')[0].files[0];
    var formData = new FormData();
    formData.append('update_details', true);
    formData.append('name', $('#name').val());
    formData.append('username', $('#username').val());
    formData.append('email', $('#email').val());
    formData.append('phone', $('#phone').val());
    formData.append('county', $('#county').val());
    formData.append('address', $('#address').val());
    formData.append('gender', $('#gender').val());
    formData.append('m_status', $('#marital_status').val());
    formData.append('dob', $('#dob').val());
    formData.append('password', $('#password').val());
    formData.append('image', file);
    $.ajax({
        url: '../reg_exe.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#container').waitMe('hide');
            if (data == "success") {
                // swal success
                swal({
                    title: "Success",
                    text: "Details updated successfully",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                console.log(data);
                // swal error
                swal("Error", data, "error", {
                    button: "OK",
                });
            }

        }

    });
});

// login 
$(function () {
    var current_effect = 'roundBounce';
    $('#login').click(function () {
        event.preventDefault();
        run_waitMe(current_effect);
        // console.log(referer_page);
        // submit form via ajax
        $.ajax({
            url: '../reg_exe.php',
            type: 'POST',
            data: {
                login: true,
                username: $('#username').val(),
                password: $('#password').val(),
            },
            success: function (data) {
                $('#container').waitMe('hide');
                if (data.indexOf('success') > -1) {
                    // console.log(referer_page);
                    // swal with redirect to login page
                    swal({
                        title: "Success",
                        text: "You have been logged in successfully, redirecting to dashboard",
                        icon: "success",
                        button: "OK",
                    }).then(function () {
                        // Redirect the user to referer page
                        window.location = "../admin/index.php";
                    });
                    /* swal("Success", "You have been registered successfully", "success", {
                        button: "OK",
                    }); */
                    // $('#registerForm')[0].reset();
                } else {
                    swal("Error", data, "error", {
                        button: "OK",
                    });
                }
            }
        });
    });
});

// upload_qualification
$("#upload_qualification").click(function () {
    event.preventDefault();
    run_waitMe();
    var file = $('#resume')[0].files[0];
    // console.log(file);
    // if resume is not selected 
    if (file == '' || file == null || file == 'undefined') {
        // resume = 'no_file' pass dummy value
        file = 'no_file';
        place = 'no_file';
    } else {
        place = 'resume';
    }
    var formData = new FormData();
    formData.append('upload_qualification', true);
    formData.append('cv', $('#cv').val());
    formData.append('file', file);
    formData.append('place', place);
    $.ajax({
        url: '../reg_exe.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#container').waitMe('hide');
            if (data == "success") {
                // swal success
                swal({
                    title: "Success",
                    text: "Qualification uploaded successfully",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                console.log(data);
                // swal error
                swal("Error", data, "error", {
                    button: "OK",
                });
            }

        }

    });
});
// add-jobps
$("#add-jobps").click(function () {
    event.preventDefault();
    run_waitMe();
    var file = $('#job-attachment')[0].files[0];
    if (file == '' || file == null || file == 'undefined') {
        place = 'no_file';
    } else {
        place = 'Yes';
    }
    var formData = new FormData();
    formData.append('add-jobps', true);
    formData.append('title', $('#job-title').val());
    formData.append('description', $('#job-description').val());
    formData.append('type', $('#job-type').val());
    formData.append('category', $('#job-category').val());
    formData.append('location', $('#job-location').val());
    formData.append('salary', $('#job-salary').val());
    formData.append('image', file);
    formData.append('place', place)
    $.ajax({
        url: '../reg_exe.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#container, #job-post').waitMe('hide');
            if (data == "success") {
                // swal success
                swal({
                    title: "Success",
                    text: "Job posted successfully",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                // console.log(data);
                // swal error
                swal("Error", data, "error", {
                    button: "OK",
                });
            }

        }

    });

});
//delete-posting 
$('.delete-posting').click(function () {
    // get id
    var id = $(this).attr('id');
    // swal confirm
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this job posting!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            // run waitme
            run_waitMe();
            // ajax delete
            $.ajax({
                url: '../reg_exe.php',
                type: 'POST',
                data: {
                    delete_posting: true,
                    id: id,
                },
                success: function (data) {
                    $('#container').waitMe('hide');
                    if (data == "success") {
                        // swal success
                        swal({
                            title: "Success",
                            text: "Job posting deleted successfully",
                            icon: "success",
                            button: "OK",
                        }).then(function () {
                            // reload page
                            location.reload();
                        });
                    } else {
                        // swal error
                        swal("Error", data, "error", {
                            button: "OK",
                        });
                    }
                }
            });
        } else {
            swal("Your job posting is safe!");
        }
    });
});
// edit-posting
$('.edit-posting-d').click(function () {
    // get id
    var id = $(this).attr('id');
    // open edit modal with data


});
// contact employer
$('.contact-employer').click(function () {
    //id
    var id = $(this).attr('id');
    // get title of job from .title class
    var title = $(this).parent().parent().find('.title').text();
    // console.log(title);
    // append title to modal with .msg-dny-hd class
    $('.msg-dny-hd').text('Contact Employer for ' + title);
    // append id to modal with .msg_id class
    $('.msg_id').val(id);
});

// msg_submit
$('#msg_submit').click(function () {
    event.preventDefault();
    // run_waitMe_custom
    run_waitMe_custom('stretch', '.msg_submit', 'Sending message...', 'horizontal');
    // check if file is selected
    if ($('#msg_attachment')[0].files[0] == '' || $('#msg_attachment')[0].files[0] == null || $('#msg_attachment')[0].files[0] == 'undefined') {
        // resume = 'no_file' pass dummy value
        place = 'no_file';
    } else {
        // resume = 'Yes' pass dummy value
        place = 'Yes';
    }
    var formData = new FormData();
    formData.append('msg_submit', true);
    formData.append('msg', $('#msg_body').val());
    formData.append('post_id', $('#msg_id').val());
    formData.append('title', $('#msg_title').val());
    formData.append('file', $('#msg_attachment')[0].files[0]);
    formData.append('place', place);
    // ajax
    $.ajax({
        url: '../reg_exe.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            // hide run_waitMe_custom
            $('.msg_submit').waitMe('hide');
            if (data == "success") {
                // swal success
                swal({
                    title: "Success",
                    text: "Message sent successfully",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                // swal error
                swal("Error", data, "error", {
                    button: "OK",
                });
            }
        }
    });
});