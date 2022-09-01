function checkCourseTitle() {
    courseName = $("#courseName");
    courseName_msg = $("#invalid-course-name");
    error = false;
    courseId = $("#courseId");

    if (courseName.val().trim() == "") {
        courseName_msg.html("The course name must not be empty");
        courseName.focus();
        error = true;
    }

    if (!error) {
        $.ajax({
            type: 'GET',
            url: '/ajaxCourse',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            data: { name: courseName.val(), id: courseId.val() },
            success: function (data) {
                if (data.found) {
                    error = true;
                    courseName_msg.html("The course name already exists");
                    courseName.focus();
                } else {
                    $('form[name=course]').submit();
                }
            }
        });
    }
}

function checkUserEdit() {
    fullName = $("#full_name");
    username = $("#username");
    email = $("#email");
    major = $("#major");
    error = false;

    fullName_msg = $("#invalid-full-name");
    username_msg = $("#invalid-username");
    email_msg = $("#invalid-email");
    major_msg = $("#invalid-major");


    if (fullName.val().trim() == "") {
        fullName_msg.html("The name must not be empty");
        fullName.focus();
        error = true;
    }

    if (username.val().trim() == "") {
        username_msg.html("The username must not be empty");
        username.focus();
        error = true;
    }

    if (email.val().trim() == "") {
        email_msg.html("The email must not be empty");
        email.focus();
        error = true;
    }

    if (major.val().trim() == "") {
        major_msg.html("The major must not be empty");
        major.focus();
        error = true;
    }

    const toCheckFor = ["@", "."]
    const text = email.val().trim()
    let flag = true

    toCheckFor.forEach(e => {
        flag &= text.includes(e)
    })

    if (!flag && email.val().trim() != "") {
        email_msg.html("Email is not valid");
        email.focus()
        error = true;
    }

    /*
    if (!error) {
        $('form[name=user]').submit();
    }
    */

    if (!error) {
        $.ajax({
            type: 'GET',
            url: '/ajaxUser',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            data: { username: username.val().trim(), email: email.val().trim() },
            success: function (data) {
                if (data.foundEmail) {
                    error = true;
                    email_msg.html("This email is already registered");
                    email.focus();
                }
                if (data.foundUser) {
                    error = true;
                    username_msg.html("The username already exists");
                    username.focus();
                }
                if (!error) {
                    $('form[name=user]').submit();
                }
            }
        });
    }
}

function checkUni() {
    uni = $("#uni");
    uniOld = $("#uniOld");

    uni_msg = $("#uni-warning");

    if (uni.val() != uniOld.val()) {
        uni_msg.html("ATTENZIONE: se si cambia universitá, tutti i post e commenti verranno eliminati");
    } else {
        uni_msg.html("");
    }
}

function checkPost() {
    content = $("#content");

    content_msg = $("#invalid-content");

    error = false;

    if (content.val().trim() == "") {
        content_msg.html("The post content must not be empty");
        content.focus();
        error = true;
    }

    if (!error) {
        $('form[name=post]').submit();
    }
}

function checkPostHome() {
    content = $("#content");
    course = $("#course");

    content_msg = $("#invalid-content");
    course_msg = $("#invalid-course");

    error = false;

    if (course.val() === "selectCourse") {
        course_msg.html("Select a course");
        course.focus();
        error = true;
    } else {
        course_msg.html("");
    }

    if (content.val().trim() == "") {
        course_msg.html("");
        content_msg.html("The post content must not be empty");
        content.focus();
        error = true;
    } else {
        content_msg.html("");
    }

    if (!error) {
        $('form[name=post]').submit();
    }
}

function checkComment() {
    content = $("#content");

    content_msg = $("#invalid-content");

    error = false;

    if (content.val().trim() == "") {
        content_msg.html("The comment content must not be empty");
        content.focus();
        error = true;
    }

    if (!error) {
        $('form[name=comment]').submit();
    }
}

function checkPicture() {
    picture = $("#picture");

    picture_msg = $("#invalid-picture");

    error = false;

    if (picture.val().trim() == "") {
        picture_msg.html("A file must be uploaded");
        picture.focus();
        error = true;
    }

    if (!error) {
        $('form[name=picture]').submit();
    }
}

function checkEditPassword() {
    oldPassword = $("#oldPassword");
    newPassword = $("#newPassword");
    confirmPassword = $("#confirmPassword");
    oldPassword_msg = $("#invalid-old-password");
    invalid_oldPassword_msg = $("#invalid-old-pwd");
    newPassword_msg = $("#invalid-new-password");
    confirmPassword_msg = $("#invalid-confirm-password");
    error = false;

    invalid_oldPassword_msg.html("")

    if (confirmPassword.val().length === 0) {
        confirmPassword_msg.html("The confirm password must not be empty");
        confirmPassword.focus();
        error = true;
    } else {
        confirmPassword_msg.html("");
    }

    if (newPassword.val().length === 0) {
        newPassword_msg.html("The new password must not be empty");
        newPassword.focus();
        error = true;
    } else {
        newPassword_msg.html("");
    }

    if (newPassword.val() !== confirmPassword.val()) {
        confirmPassword_msg.html("The new password and the confirm password must be the same");
        confirmPassword.focus();
        error = true;
    }

    if (newPassword.val() === oldPassword.val()) {
        newPassword_msg.html("The old password and the new password can not be the same");
        newPassword.focus();
        error = true;
    }

    if (oldPassword.val().length === 0) {
        oldPassword_msg.html("The old password must not be empty");
        oldPassword.focus();
        error = true;
    } else {
        oldPassword_msg.html("");
    }

    /*
        if (!error) {
            $('form[name=editPassword]').submit();
        }
    */

    $.ajax({
        type: 'GET',
        url: '/ajaxPassword',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        dataType: 'json',
        data: { password: oldPassword.val() },
        success: function (data) {
            if (!data.correctPassword) {
                error = true;
                oldPassword_msg.html("Wrong password");
                oldPassword.focus();
            } else if (!error) {
                $('form[name=editPassword]').submit();
            }
        }
    });
}



function checkRegistration() {
    fullName = $("#full_name");
    username = $("#username");
    email = $("#email");
    major = $("#major");
    uni = $("#uni");
    role = $("#role");
    password = $("#password");
    error = false;

    fullName_msg = $("#invalid-fullname");
    username_msg = $("#invalid-username");
    email_msg = $("#invalid-email");
    major_msg = $("#invalid-major");
    uni_msg = $("#invalid-uni");
    role_msg = $("#invalid-role");
    password_msg = $("#invalid-password");

    if (password.val().length === 0) {
        password_msg.html("The password must not be empty");
        password.focus();
        error = true;
    } else {
        password_msg.html("");
    }

    if (major.val().trim() == "") {
        major_msg.html("The major must not be empty");
        major.focus();
        error = true;
    } else {
        major_msg.html("");
    }

    if (username.val().trim() == "") {
        username_msg.html("The username must not be empty");
        username.focus();
        error = true;
    } else {
        username_msg.html("");
    }

    const toCheckFor = ["@", "."]
    const text = email.val().trim()
    let flag = true

    toCheckFor.forEach(e => {
        flag &= text.includes(e)
    })

    if (!flag && email.val().trim() != "") {
        email_msg.html("Email is not valid");
        email.focus()
        error = true;
    } else {
        email_msg.html("");
    }

    if (email.val().trim() == "") {
        email_msg.html("The email must not be empty");
        email.focus();
        error = true;
    }

    if (fullName.val().trim() == "") {
        fullName_msg.html("The name must not be empty");
        fullName.focus();
        error = true;
    } else {
        fullName_msg.html("");
    }

    if (uni.val().trim() == "selectUni") {
        uni_msg.html("You must select a university");
        uni.focus();
        error = true;
    } else {
        uni_msg.html("");
    }

    if (role.val().trim() == "selectRole") {
        role_msg.html("You must select a role");
        role.focus();
        error = true;
    } else {
        role_msg.html("");
    }


    if (!error) {
        $('form[name=register]').submit();
    }

/*
    if (!error) {
        $.ajax({
            type: 'POST',
            url: '/ajaxRegister',
            data: { username: username.val().trim() },
            success: function (data) {
                if (data.found) {
                    error = true;
                    username_msg.html("The username already exists");
                    username.focus();
                } else {
                    $('form[name=register]').submit();
                }
            }
        });
    }
    */
}

function checkLogin() {
    username = $("#username");
    password = $("#password");

    username_msg = $("#invalid-username");
    password_msg = $("#invalid-password");

    error = false;
    if (password.val().length === 0) {
        password_msg.html("The password must not be empty");
        password.focus();
        error = true;
    } else {
        password_msg.html("");
    }

    if (username.val().trim() == "") {
        username_msg.html("The username must not be empty");
        username.focus();
        error = true;
    } else {
        username_msg.html("");
    }

    if (!error) {
        $.ajax({
            type: 'GET',
            url: '/ajaxLogin',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            data: { password: password.val(), username: username.val() },
            success: function (data) {
                if (data.logged) {
                    $('form[name=login]').submit();
                } else {
                    error = true;
                    username_msg.html("");
                    password_msg.html("Wrong credentials");
                }
            }
        });
    }
}

function deleteWarningCourse() {
    if (confirm("WARNING: the course will be deleted and all the posts and comments related to it will be lost, are you sure you want to proceed?")) {
        return true;
    } else {
        return false;
    }
}

function quitWarningCourse() {
    if (confirm("WARNING: if you leave this course all your post and comments in this course will be lost, are you sure you want to proceed?")) {
        return true;
    } else {
        return false;
    }
}