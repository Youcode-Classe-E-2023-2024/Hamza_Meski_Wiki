/* login form */
const loginForm = document.getElementById('login-form');
if(loginForm){
    const loginEmailErr = document.getElementById('login-email-err');
    const loginPasswordErr = document.getElementById('login-password-err');

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/users/login', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                loginEmailErr.textContent = '';
                loginPasswordErr.textContent = '';
                if(data[0] == '' && data[1] == '' && data[2] == 0){
                    location.href = URLROOT + '/home/index';
                }
                if(data[0] == '' && data[1] == '' && data[2] == 1){
                    location.href = URLROOT + '/dashboard/index';
                }

                if(data[0] != ''){
                    loginEmailErr.textContent = data[0]; 
                }
                if(data[1] != ''){
                    loginPasswordErr.textContent = data[1];
                }
            })
    })
}

/* register form */
const registerForm = document.getElementById('register-form'); 
if(registerForm){
    const nameErr = document.getElementById('name_err'); 
    const emailErr = document.getElementById('email_err'); 
    const passwordErr = document.getElementById('password_err'); 
    const confirmPasswordErr = document.getElementById('confirm_password_err');
    console.log(nameErr);
    console.log(emailErr); 
    console.log(passwordErr); 
    console.log(confirmPasswordErr);

    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/users/register', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                nameErr.textContent = '';
                emailErr.textContent = '';
                passwordErr.textContent = ''; 
                confirmPasswordErr.textContent = '';

                if(data[0] == '' && data[1] == '' && data[2] == '' && data[3] == ''){
                    location.href = URLROOT + '/users/login';
                }
                if(data[0] != ''){
                    nameErr.textContent = data[0];
                }
                if(data[1] != ''){
                    emailErr.textContent = data[1];
                }
                if(data[2] != ''){
                    passwordErr.textContent = data[2];
                }
                if(data[3] != ''){
                    confirmPasswordErr.textContent = data[3];
                }
                console.log(data);
            })
    })
}

/* add post form  */
const addPostForm = document.getElementById('add-post-form'); 
if(addPostForm) {
    addPostForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/posts/addPost', {
            method: 'POST',
            body: formData
        })
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Post added successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}

/* udpate post form  */
const updatePostForm = document.getElementById('update-post-form'); 
if(updatePostForm) {
    updatePostForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/posts/updatePost', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => console.log(data))
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Post updated successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}

/* add category form */
const addcategoryForm = document.getElementById('add-category-form'); 
if(addcategoryForm) {
    addcategoryForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/manageCategories/addCategory', {
            method: 'POST',
            body: formData
        })
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Category added successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}

/* udpate category form  */
const updateCategoryForm = document.getElementById('update-category-form'); 
if(updateCategoryForm) {
    updateCategoryForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/manageCategories/updateCategory', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => console.log(data))
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Category updated successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}

/* add tag form */ 
const addTagForm = document.getElementById('add-tag-form'); 
if(addTagForm) {
    addTagForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/manageTags/addTag', {
            method: 'POST',
            body: formData
        })
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Tag added successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}

/* update tag form */ 
const updateTagForm = document.getElementById('update-tag-form'); 
if(updateTagForm) {
    updateTagForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/manageTags/updateTag', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => console.log(data))
        .then(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Tag updated successfully",
                showConfirmButton: false,
                timer: 2500
              });
        })
    })
}