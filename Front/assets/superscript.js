$(document).ready(function () {
    function alertSweet(message, type, title) {
        Swal.fire({
            icon: `${type}`,
            title: `${title}`,
            text: `${message}`
        })
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }
    function RequestAlert(distance) {
        alert(getCookie('user_id'));
        Swal.fire({
            title: `Cost:${Math.trunc((distance / 1000) * 20)} KES`,
            text: `Distance in KMS:${Math.trunc(distance / 1000)} 
            <br>
            ${$("#startoff").val()} -> ${$("#endpoint").val()}
            `,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm Request'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.mixin({
                    input: 'text',
                    confirmButtonText: 'Next &rarr;',
                    showCancelButton: true,
                    progressSteps: ['1', '2']
                }).queue([
                    {
                        title: 'Recipient Name',
                        text: 'Chaining swal2 modals is easy'
                    },
                    'Recipient Contact'
                ]).then((result) => {
                    if (result.value) {
                        const answers = JSON.stringify(result.value)
                        $.post("requests.php",
                        //JS Object to be posted to the orders.php file
                        { user_id: getCookie('user_id'), origin: $("#startoff").val(), destination: $("#endpoint").val(), distance: Math.trunc(distance / 1000), price: Math.trunc((distance / 1000) * 20), recipient_name: result.value[0], type:'orderPOST',recipient_contact: result.value[1], status:'PENDING' },
                        //Callback
                        function (result) {
                            var p = JSON.parse(result);
                            //console.log(result);
                            //alert(p.response);
                            if (p.response == "ok") {
                                alertSweet('Successfully Signed Up', 'success', 'Welcome');
                            } else if (p.response == "error") {
                                alertSweet('That email already exists', 'error', 'Failed');
                            }
                        });
                    }
                })
            }
        })
    }
    $("#clientRequest").on('click', function (e) {
        e.preventDefault();
        var startoff = $("#startoff").val();
        var endpoint = $("#endpoint").val();
        getCoord(startoff, endpoint);
    });

    function getCoord(name, name2) {
        var lat1 = lat2 = lon1 = lon2 = 0;
        $.ajax({
            url: 'http://api.positionstack.com/v1/forward',
            data: {
                access_key: '9a1d0d1235fe7c22f56e1298059b1c58',
                query: name,
                limit: 1
            }
        }).done(function (data) {
            lat1 = data.data[0].latitude;
            lon1 = data.data[0].longitude;
            console.log(`Latitude1: ${lat1} -> Longitude: ${lon1}`);
            $.ajax({
                url: 'http://api.positionstack.com/v1/forward',
                data: {
                    access_key: '9a1d0d1235fe7c22f56e1298059b1c58',
                    query: name2,
                    limit: 1
                }
            }).done(function (datax) {
                lat2 = datax.data[0].latitude;
                lon2 = datax.data[0].longitude;
                console.log(`Latitude2: ${lat2} -> Longitude2: ${lon2}`);
                var rad = function (x) {
                    return x * Math.PI / 180;
                };

                var R = 6378137; // Earth’s mean radius in meter
                var dLat = rad(lat2 - lat1);
                var dLong = rad(lon2 - lon1);
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(rad(lat1)) * Math.cos(rad(lat2)) *
                    Math.sin(dLong / 2) * Math.sin(dLong / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                RequestAlert(d);
                console.log(d)
            });
        });
    }

    $("#signInBTN").on('click', function (e) {
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        if (email == "" || password == "") {
            alertSweet('Enter the correct email or password', 'warning', 'Missing Input');
            return false;
        } else {
            $.post("requests.php",
                //JS Object to be posted to the orders.php file
                { email: email, password: password, type: 'clientSignIn' },
                //Callback
                function (result) {
                    var p = JSON.parse(result);
                    //alert(p.response);
                    if (p.response == "success") {
                        alertSweet('Successfully Signed In', 'success', 'Welcome');
                        document.cookie = `fname=${p.firstName}`;
                        document.cookie = `lname=${p.lastName}`;
                        document.cookie = `email=${p.email}`;
                        document.cookie = `phone=${p.phone}`;
                        document.cookie = `role=${p.role}`;
                        document.cookie = `image=${p.image}`;
                        document.cookie = `user_id=${p.userid}`;
                        window.location.href = './home.php';
                    } else if (p.response == "error") {
                        alertSweet('Invalid Login Credentials', 'error', 'Failed');
                    }
                });
        }
    });
    $("#signInBTNDriver").on('click', function (e) {
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        if (email == "" || password == "") {
            alertSweet('Enter the correct email or password', 'warning', 'Missing Input');
            return false;
        } else {
            $.post("requests.php",
                //JS Object to be posted to the orders.php file
                { email: email, password: password, type: 'clientSignIn' },
                //Callback
                function (result) {
                    var p = JSON.parse(result);
                    //alert(p.response);
                    if (p.response == "success") {
                        alertSweet('Successfully Signed In', 'success', 'Welcome');
                        document.cookie = `fname=${p.firstName}`;
                        document.cookie = `lname=${p.lastName}`;
                        document.cookie = `email=${p.email}`;
                        document.cookie = `phone=${p.phone}`;
                        document.cookie = `role=${p.role}`;
                        document.cookie = `image=${p.image}`;
                        document.cookie = `user_id=${p.userid}`;
                        window.location.href = './index.php';
                    } else if (p.response == "error") {
                        alertSweet('Invalid Login Credentials', 'error', 'Failed');
                    }
                });
        }
    });
    $("#signUpBTN").on('click', function (e) {
        e.preventDefault();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var confirmPassword = $("#confirmPassword").val();
        var password = $("#password").val();

        if (firstName == "") {
            alertSweet('Input first Name', 'error', 'Missing Input');
            return false;
        }
        else if (lastName == "") {
            alertSweet('Input Last Name', 'error', 'Missing Input');
            return false;
        }
        else if (phone == "") {
            alertSweet('Input phone number', 'error', 'Missing Input');
            return false;
        }
        else if (email == "") {
            alertSweet('Input valid email', 'error', 'Missing Input');
            return false;
        }
        else if (confirmPassword == "") {
            alertSweet('Input confirm password field', 'error', 'Missing Input');
            return false;
        }
        else if (password == "") {
            alertSweet('Input password', 'error', 'Missing Input');
            return false;
        }
        else if (password !== confirmPassword) {
            alertSweet('Passwords Do not Mach', 'error', 'Password Error');
            return false;
        } else {
            $.post("requests.php",
                //JS Object to be posted to the orders.php file
                { firstName: firstName, lastName: lastName, email: email, phone: phone, password: confirmPassword, type: 'clientSignUp', role: 'CLIENT' },
                //Callback
                function (result) {
                    var p = JSON.parse(result);
                    //console.log(result);
                    //alert(p.response);
                    if (p.response == "ok") {
                        alertSweet('Successfully Signed Up', 'success', 'Welcome');
                    } else if (p.response == "error") {
                        alertSweet('That email already exists', 'error', 'Failed');
                    }
                });
        }
    });

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}