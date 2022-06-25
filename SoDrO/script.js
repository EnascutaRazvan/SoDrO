function menu() {
    const bar = document.getElementById('bar');
    const nav = document.getElementById('navbar');


    if (bar) {
        bar.addEventListener('click', () => {
            nav.classList.add('active');
        })
    }

    if (nav) {
        nav.addEventListener('click', () => {
            nav.classList.remove('active');
        })
    }
}

function menu2() {
    const img = document.getElementById('avatar-img');
    const menu = document.getElementById('avatar-menu-id');

    if (img) {
        img.addEventListener('click', () => {
            menu.classList.add('active');
        })
    }

    if (menu) {
        menu.addEventListener('click', () => {
            menu.classList.remove('active');
        })
    }
}


// vars
let result = document.querySelector('.result'),
    img_result = document.querySelector('.img-result'),
    img_w = document.querySelector('.img-w'),
    img_h = document.querySelector('.img-h'),
    options = document.querySelector('.options'),
    save = document.querySelector('.save'),
    cropped = document.querySelector('.cropped'),
    dwn = document.querySelector('.download'),
    upload = document.querySelector('#file-input'),
    cropper = ''; // on change show image with crop options

upload.addEventListener('change', e => {
    if (e.target.files.length) {
        // start file reader
        const reader = new FileReader();

        reader.onload = e => {
            if (e.target.result) {
                // create new image
                let img = document.createElement('img');
                img.id = 'image';
                img.src = e.target.result; // clean result before

                result.innerHTML = ''; // append new image

                result.appendChild(img); // show save btn and options

                save.classList.remove('hide');
                options.classList.remove('hide'); // init cropper

                cropper = new Cropper(img);
            }
        };

        reader.readAsDataURL(e.target.files[0]);
    }
}); // save on click

save.addEventListener('click', e => {
    e.preventDefault(); // get result to data uri

    let imgSrc = cropper.getCroppedCanvas({
        width: img_w.value // input value

    }).toDataURL(); // remove hide class of img

    cropped.classList.remove('hide');
    img_result.classList.remove('hide'); // show image cropped

    cropped.src = imgSrc;
    dwn.classList.remove('hide');
    dwn.download = 'imagename.png';
    dwn.setAttribute('href', imgSrc);
});






function RegisterValidation() {
    var name =
        document.forms.registerform.username.value;
    var password =
        document.forms.registerform.password.value;
    var passwordrepeat =
        document.forms.registerform.passwordrepeat.value;
    var email =
        document.forms.registerform.email.value;
    var emailrepeat =
        document.forms.registerform.emailrepeat.value;

    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  //Javascript reGex for Email Validation.
    var regName = /\d+$/g;                                    // Javascript reGex for Name validation

    if (name == "" || regName.test(name)) {
        window.alert("Please enter your name properly.");
        name.focus();
        return false;
    }

    if (email == "" || !regEmail.test(email)) {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (password == "") {
        alert("Please enter your password");
        password.focus();
        return false;
    }

    if (password.length < 6) {
        alert("Password should be atleast 6 character long");
        password.focus();
        return false;

    }

    if (password != passwordrepeat) {
        alert("The passwords are not the same");
        passwordrepeat.focus();
        return false;
    }

    if (email != emailrepeat) {
        alert("The passwords are not the same");
        email.focus();
        return false;
    }

    return true;
}