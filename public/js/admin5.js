var API, Controllers = {}, Services = {};

API = function () {
  var request = function (type, endpoint, data, callback) {
    var url = endpoint;
    $.ajax({
        type: type,
        url: url,
        data: data,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },       
        complete: function (data) {            
            callback(JSON.parse(data.responseText));
        }
    });
  }

  var users = function (action, endpoint, data, callback, rootUrl) {
    var url = "users/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };

  var services = function (action, endpoint, data, callback, rootUrl) {
    var url = "services/" + endpoint;
    request(action, url, data, callback, rootUrl);
  };

  return {
    login: function (user, callback) {        
      users("POST", "authenticate", user, callback, "/");
    },
    signup: function (user, callback) {   
      users("POST", "signup", user, callback, "/");
    },
    searchUser: function (user, callback) {        
      users("POST", "search", user, callback, "/");
    },
    searchLang: function (user, callback) {        
      users("POST", "search_lang", user, callback, "/");
    },
    changeLang: function (user, callback) {        
      services("POST", "lang", user, callback, "/");
    },
    ChangeCustomerState: function (data, callback) {        
      services("POST", "firebase_update", data, callback, "/");
    }
  };
};

Controllers.Login = function () {
  $("#password").keyup(function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {        
        $("#login").click();
    }
  });
  var onLoginComplete = function (response) {  
    if (response.check) {
      $(".alert-message").html('Login is successed!');
      $(".alert-message").attr('style', 'background-color:#4CAF50; display:block');
      TweenMax.from(".alert-message", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to(".alert-message", .4, { scale: 1, ease:Sine.easeInOut});
      setTimeout(function () { window.location = "dashboard" }, 900);            
    } else {
      $(".alert-message").attr('style', 'display:block');
      $(".alert-message").fadeIn();
      TweenMax.from(".alert-message", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to(".alert-message", .4, { scale: 1, ease:Sine.easeInOut});
    }
  };
  $("#login").click(function (e) {
    e.preventDefault();
    var user = {
      user_name: $("#username").val(),
      email: $("#email").val(),
      password: $("#password").val()
    };
    Adminpanel.API.login(user, onLoginComplete);
  });

  $(".close-btn").click(function () {
    TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container, #forgotten-container").fadeOut(300, function(){
      $('#login-button').fadeIn();   
    });
  });
  
  $(".closebtn-message").click(function () {
    TweenMax.from(".alert-message", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to(".alert-message", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#.alert-message").fadeOut(300);
  });

  $('#forgotten').click( function() {
    $("#container").fadeOut(function () {
      $("#forgotten-container").fadeIn();
    });
  });

  $('#login-button').click(function () {
    $('#login-button').fadeOut("slow",function () {
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });
  // register content
  $('.register_button').click(function () {
    TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container, #forgotten-container").fadeOut(0, function(){
      $("#container_register").fadeIn();
      TweenMax.from("#container_register", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container_register", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });

  $("#register-password").keyup(function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {        
        $("#login").click();
    }
  });
  var onRegisterComplete = function (response) {   
    TweenMax.from("#container_register", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container_register", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container_register").fadeOut(0, function(){
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
    $("#alert-message").fadeOut(0);
  };
  $('.signup_button').click(function (e) {
    e.preventDefault();
    var user = {
      name: $("#register-username").val(),
      email: $("#register-email").val(),
      password: $("#register-password").val()
    };    
    Adminpanel.API.signup(user, onRegisterComplete);
  });
  $(".register-close-btn").click(function () {
    TweenMax.from("#container_register", .4, { scale: 1, ease:Sine.easeInOut});
    TweenMax.to("#container_register", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
    $("#container_register, #forgotten-container").fadeOut(0, function(){
      $("#container").fadeIn();
      TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
      TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
    });
  });
  var init = function () {
  }
  init();
};

Controllers.Dashboard = function () {
  var init = function () {
    
  }
  init();
};

Controllers.UserManagement = function () {
  var image = "";
  $(".edit").click(function (e){
    $data = $(this).data('info');  
    image = $data.image;
    $("#gender").val($data.gender);
    $("#region").val($data.region);
    $("#user_name").val($data.name);
    $("#hobby").val($data.interest);
    $("#account").val($data.membership);
    $("#gem").val($data.diamonds);
    $("#language").val($data.language);
    $("#age").val($data.age);
    $("#open_date").val($data.openDate);
    $("#close_date").val($data.endDate);
    $("#modal-user").modal('show');
  });

  var onComplete = function (response) {
    $("#modal-user").modal('hide');
    setTimeout(function () { window.location = "manage_users" }, 300);  
  };

  $("#save").click(function (e) {
    var data = {
      "name":  $("#user_name").val(),
      "membership": $("#account").val(),
      "gender": $("#gender").val(),
      "region": $("#region").val(),
      "openDate": $("#open_date").val(),
      "interest": $("#hobby").val(),
      "diamonds": $("#gem").val(),
      "language": $("#language").val(),
      "age": $("#age").val(),
      "endDate": $("#close_date").val(),
      "image": image
    };
    Adminpanel.API.ChangeCustomerState(data, onComplete);
  });
  var init = function() {

  };
  init();
};

Controllers.Notice = function () {
  var image = "";
  var selected_user = {};
  var onImageUploadSuccess = function (file, response) {    
    image = response;
  };
  var onSendingImage = function (file, xhr, formData) {     
    formData.append("id", selected_user.id);     
  };
  
  var onSelectedComplete = function (response) {
    selected_user = response[0];
    var dropzone = new Dropzone("#image-uploader", {
      url: '/mail-image',
      acceptedFiles: 'image/png, image/jpeg',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    dropzone.on("sending", onSendingImage);
    dropzone.on("success", onImageUploadSuccess);      
  };

  $("#users").change(function(event) {
    var search = { user: $("#users").val() };    
    Adminpanel.API.searchUser(search, onSelectedComplete);
  });

  var onSearchComplete = function (response) {    
    var results = document.getElementById('users');
    if (response == "nothing") {
      alert("The user isn't registered!");
    } else {
        var opt = document.createElement('option');
        opt.innerHTML = response;
        opt.value = response;
        results.appendChild(opt);
    }  
  };
  
  $("#search").keyup(function(event) {
    var search = { user: $("#search").val() };
    if (event.keyCode === 13) {                 
      Adminpanel.API.searchUser(search, onSearchComplete);
    }
  });

  $("#save").click(function (e) {
    e.preventDefault();
    var send_data = {
      user_name: selected_user.user_name,
      email: selected_user.email,
      phone: selected_user.phone,
      image: image
    };
  });

  $("#cancel").click(function (e) {
    e.preventDefault();

  });
  var init = function() {
    Dropzone.autoDiscover = false;
  };
  init();
};

Controllers.Settings = function () {
  var onChangeComplete = function (response) {};

  $('#default').change( function (e) {
    e.preventDefault();
    var lang = {
      cr_lang : $('#locale').val(),
      df_lang : "",
      user_id: user.id
    };
    if ($("#default").is(":checked")) {
      lang.df_lang = lang.cr_lang;
    } 
    Adminpanel.API.changeLang(lang, onChangeComplete);
  });

  var init = function () {
  };
  init();
};

var Adminpanel = {
  API: new API(),
  Controllers: Controllers
};