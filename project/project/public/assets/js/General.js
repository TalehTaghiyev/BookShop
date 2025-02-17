const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

const UserUpdateView = (id) => {

    $.ajax({
        type: "POST",
        url: "/user/view",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if(data){
                console.log(data);
                document.getElementById("edit_id").value = id;
                document.getElementById("edit_name").value = data.name;
                document.getElementById("edit_email").value = data.email;
                document.getElementById("edit_position").value = data.position;
                document.getElementById("edit_roles").value = data.roles;
                document.getElementById("edit_status").value = data.status;
                $('#edit').modal('show');
            }
        },
        error: function () {
            alert('Error... 5011');
        }
    })
};

const SliderUpdateView = (id, url) => {

    $.ajax({
        type: "POST",
        url: "/settings/slider/view",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if(data){
                console.log(data);
                console.log(url);
                document.getElementById("edit_id_slider").value = id;
                document.getElementById("edit_name_slider").value = data.name;
                document.getElementById("edit_url").value = data.url;
                document.getElementById("edit_status_slider").value = data.status;
                document.getElementById("slider_img").innerHTML = `<img style="height: 150px; width: auto;" src="${url + data.img}">`;
                $('#slider_edit').modal('show');
            }
        },
        error: function () {
            alert('Error... 5011');
        }
    })
};

const CustomerView = (id, url) => {

    $.ajax({
        type: "POST",
        url: "/customer/view",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if(data){
                console.log(data);
                if (data.status) {
                    document.getElementById("img").innerHTML = `<img style="height: 150px; width: auto;" src="${url + data.user.img}">`;
                    document.getElementById("name").innerHTML = data.user.name;
                    document.getElementById("email").innerHTML = data.user.email;
                    document.getElementById("phone").innerHTML = data.customer.phone;
                    document.getElementById("address").innerHTML = data.customer.address;
                    document.getElementById("date").innerHTML = data.customer.birthday;
                    document.getElementById("status").innerHTML = data.customer.status === "1" ? "VIP" :
                        data.customer.status === "2" ? "Standart" : "İstənməyən müştəri";
                    $('#customerView').modal('show');
                }
                else {
                    alert("İnformasiya Yoxdur")
                }
            }
        },
        error: function () {
            alert('Error... 5011');
        }
    })
};

const CustomerUpdateView = (id, url) => {
    $.ajax({
        type: "POST",
        url: "/customer/view",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if(data){
                console.log(data);
                if (data.status) {
                    document.getElementById("edit_id_customer").value = id;
                    document.getElementById("img_edit").innerHTML = `<img class="mb-2" style="height: 150px; width: auto;" src="${url + data.user.img}" \>`;
                    document.getElementById("edit_name_customer").value = data.user.name;
                    document.getElementById("edit_email_customer").value = data.user.email;
                    document.getElementById("edit_phone_customer").value = data.customer.phone;
                    document.getElementById("edit_address_customer").value = data.customer.address;
                    document.getElementById("edit_birthday_customer").value = data.customer.birthday;
                    document.getElementById("edit_status_customer").value = data.customer.status;
                    $('#customerEdit').modal('show');
                }
                else {
                    alert("İnformasiya Yoxdur");
                }
            }
        },
        error: function () {
            alert('Error... 5011');
        }
    })
}

const CategoryUpdateView = (id) => {
    $.ajax({
        type: "POST",
        url: "/products/category-view",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if(data){
                console.log(data);
                if (data) {
                    document.getElementById("edit_id_category").value = data.id;
                    document.getElementById("edit_name_category").value = data.name;
                    document.getElementById("edit_main_category").value = data.main_category == "0" ? "0" : data.main_category;
                    document.getElementById("edit_status_category").value = data.status;
                    $('#categoryEdit').modal('show');
                }
                else {
                    alert("İnformasiya Yoxdur");
                }
            }
        },
        error: function () {
            alert('Error... 5011');
        }
    })
}

const makePassword = () =>{
    document.getElementById("edit_password").value = generatePassword(8);
};

const makePassword_add = () =>{
    document.getElementById("add_password").value = generatePassword(8);
};

const generatePassword = (length) => {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%!';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
};

const SliderDelete = (id) => {
    let check = confirm("Silinən slider geri qaytarılmır!");

    if (check) {
        location.href = `/settings/slider/delete/${id}`;
    } else {
        alert("İmtina edildi");
    }
}
