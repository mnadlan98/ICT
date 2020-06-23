function forgetpass() {
    var txt;
    var email = prompt("Masukkan email anda untuk reset password", "Email");
    if (email == null || email == "") {
        window.alert("Reset Password dibatalkan");
    } else {
        window.alert("Email telah dikirimkan, silakan cek kotak masuk email anda!");;
    }
  }