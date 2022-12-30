const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
});

let eye = document.getElementById("eye");
let passwordField = document.getElementById("password");

if (eye != null && passwordField != null) {
    eye.addEventListener("click", e => {
        let inputType = passwordField.getAttribute("type");
        if (inputType == "password") {
            passwordField.setAttribute("type", "text");
            eye.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">' +
                '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />' +
                '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />' +
                '</svg>'
        } else if (inputType == "text") {
            passwordField.setAttribute("type", "password");
            eye.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">' +
                '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />' +
                '</svg>'
        }
    })
}

// home/detail

let barang_viewport = document.getElementById("barang-viewport");
if (barang_viewport != null) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () {
        barang_viewport.innerHTML = this.responseText;
    }
    xmlhttp.open("GET", barang_viewport.dataset.target);
    xmlhttp.send();
}

let listImageProduct = document.querySelectorAll("#img-product-list");
if (listImageProduct != null) {
    for (const imageProduct of listImageProduct) {
        imageProduct.addEventListener("mouseover", e => {
            let activeElement = document.querySelector("div#img-product.active");
            let index = imageProduct.dataset.index;
            let targetElement = document.querySelector(`div[data-index="${index}"]`);
            if (activeElement.dataset.index != index) {
                activeElement.classList.remove("active");
                targetElement.classList.add("active");
            }
        })
    }
}

function modal(message, display = "flex") {
    console.log(message);
    let elm = document.getElementById("modal");
    let content = document.getElementById("modal-content")
    content.innerHTML = message;
    elm.style.display = display;
}

let btnAddToCart = document.getElementById("add-to-cart");
if (btnAddToCart != null) {
    btnAddToCart.addEventListener("click", e => {
        let cartIcon = document.getElementById("cart-notif");
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                cartIcon.classList.remove('invisible');
                modal(this.responseText);
            }
            if (this.readyState == 4 && this.status == 301) {
                window.location.href = btnAddToCart.dataset.target.replace(new RegExp("\/cart\/add\/.*"), "/login");
            }
        };
        xhttp.open("GET", btnAddToCart.dataset.target);
        xhttp.send();
    })
}




//cart

let qty = document.querySelectorAll("#qty-val");
let qty_min = document.querySelectorAll("#qty-min");
let qty_plus = document.querySelectorAll("#qty-plus");
let priceBefore = document.querySelectorAll("h2#price-before");
let priceAfter = document.querySelectorAll("h2#price-after");
let priceAfterInput = document.querySelectorAll("h2#price-after+input");
let total = document.querySelector("#total-all-selected");
let totalInput = document.querySelector("#total-all-selected+input");


function updateHarga(i) {
    let newPrice = priceBefore[i].dataset.price * qty[i].value;
    priceAfter[i].innerHTML = formatter.format(newPrice);
    priceAfter[i].dataset.price = newPrice;
    priceAfterInput[i].value = newPrice;
}

function updateTotalHarga(i, checked = undefined) {
    let element = document.querySelectorAll("input#checkbox-produk:checked+div+h2+div+h2#price-after");
    let sum = 0;
    for (const elm of element) {
        sum += parseInt(elm.dataset.price);
    }
    total.innerHTML = formatter.format(sum);
    totalInput.value = sum;
    if (checked) {
        qty[i].setAttribute("name", `jumlah-${i + 1}`);
        priceAfterInput[i].setAttribute("name", `harga-${i + 1}`);
    }
    if (checked = false) {
        qty[i].removeAttribute("name");
        priceAfterInput[i].removeAttribute("name");
    }
}

for (let i = 0; i < qty.length; i++) {
    if (qty_min[i] != null && qty_plus[i] != null) {
        qty_min[i].addEventListener("click", e => {
            if (qty[i].value > 1) {
                qty[i].value--;
            }
            updateHarga(i);
            updateTotalHarga(i);
        })
        qty_plus[i].addEventListener("click", e => {
            if (qty[i].value < 10) {
                qty[i].value++;
            }
            updateHarga(i);
            updateTotalHarga(i);
        })
    }
}


let checkboxList = document.querySelectorAll("input#checkbox-produk");
let checkboxAll = document.querySelector("input#select-all");
let countSelected = document.querySelector("span#count-selected");

if (checkboxAll != null) {
    checkboxAll.addEventListener("change", function () {
        for (let i = 0; i < checkboxList.length; i++) {
            if (this.checked) {
                checkboxList[i].checked = true;
                countSelected.innerHTML = checkboxList.length;
                countSelected.dataset.count = checkboxList.length;
                updateTotalHarga(i, true);
            } else {
                checkboxList[i].checked = false;
                countSelected.innerHTML = 0;
                countSelected.dataset.count = 0;
                updateTotalHarga(i, false);
            }
        }
    })
}
if (checkboxList != null) {
    for (let i = 0; i < checkboxList.length; i++) {
        checkboxList[i].addEventListener("change", function () {
            if (this.checked) {
                countSelected.dataset.count++;
                updateTotalHarga(i, true);
            } else {
                countSelected.dataset.count--;
                checkboxAll.checked = false;
                updateTotalHarga(i, false);
            }
            countSelected.innerHTML = countSelected.dataset.count;
        })
    }
}


let pp = document.getElementById("profile-picture");
let input_foto = document.querySelector("#profile-picture+label>input#foto")
if (pp != null && input_foto != null) {
    input_foto.addEventListener("change", function (e) {
        if (input_foto.files.length > 0) {
            console.log(input_foto.files);
            var reader = new FileReader();
            reader.onloadend = function () {
                pp.src = reader.result;
            }

            if (input_foto.files[0]) {
                reader.readAsDataURL(input_foto.files[0]);
            } else {
                pp.src = "";
            }
        }
    })
}


let new_pw = document.getElementById("new_pw");
let confirm_pw = document.getElementById("confirm_pw");
let error = document.getElementById("error_message");
if (new_pw != null && confirm_pw != null) {
    confirm_pw.addEventListener("input", function (e) {
        if (confirm_pw.value == new_pw.value) {
            error.classList.add("hidden");
            confirm_pw.classList.remove("outline-red-500");
        }
        else {
            error.classList.remove("hidden");
            error.innerHTML = "password tidak sama"
            confirm_pw.classList.add("outline-red-500");
        }
    })
}

let listAddress = document.querySelectorAll("#selected_addrs");
if (selected_addrs[0] != null) {
    for (const selected_addrs of listAddress) {
        selected_addrs.addEventListener("change", function () {
            console.log(this.dataset.id_address);
        })
    }
}