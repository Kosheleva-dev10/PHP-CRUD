"use strict";

var state = 0; // Add Record

function addStaff() {
  // get values
  var staff_id = $("#staff_id").val();
  staff_id = staff_id.trim();
  var password = $("#userpwd").val();
  password = password.trim();
  var first_name = $("#first_name").val();
  first_name = first_name.trim();
  var last_name = $("#last_name").val();
  last_name = last_name.trim();
  var email_address = $("#email_address").val();
  email_address = email_address.trim();
  var mobile_number = $("#mobile_number").val();
  mobile_number = mobile_number.trim();

  if (staff_id == "") {
    alert("Staff ID field is required!");
  }

  if (staff_id == "") {
    alert("Password field is required!");
  } else if (first_name == "") {
    alert("First name field is required!");
  } else if (last_name == "") {
    alert("Last name field is required!");
  } else if (email_address == "") {
    alert("Email field is required!");
  } else {
    // Add record
    $.post("ajax/CreateNewStaff.php", {
      staff_id: staff_id,
      password: password,
      first_name: first_name,
      last_name: last_name,
      email_address: email_address,
      mobile_number: mobile_number
    }, function (data, status) {
      // close the popup
      $("#add_new_record_modal").modal("hide"); // read records again

      readStaff(); // clear fields from the popup

      $("#staff_id").val("");
      $("#first_name").val("");
      $("#last_name").val("");
      $("#email_address").val("");
      $("#mobile_number").val("");
    });
  }
}

function searchStaff() {
  // get hidden field value
  var search_text = $("#search_text").val();

  if (search_text == "") {
    readStaff();
  } else {
    $.get("ajax/GetSearchStaff.php", {
      search_text: search_text
    }, function (data, status) {
      $(".records_content").html(data);
    });
  }
}

function verifyStaffFiles() {
  $.get("ajax/VerifyStaffFiles.php", {}, function (data, status) {
    $(".file_list").html(data);
  });
}

function resetSearch() {
  $.get("ajax/GetAllStaff.php", {}, function (data, status) {
    $(".records_content").html(data);
    $("#search_text").val('');
  });
}

function CreateAllAccounts() {
  if (confirm("Do you want to create accounts for all files?")) {
    $.post("ajax/CreateAllAccounts.php", {}, function (data, status) {
      // read records again
      verifyStaffFiles();
    });
  }
}

function CreateAccount(staff_id) {
  $.post("ajax/CreateNewAccount.php", {
    staff_id: staff_id
  }, function (data, status) {
    // read records again
    verifyStaffFiles();
  });
}

function setAnnouncementStatus(index) {
  if (index == 0) {
    state = 0;
  }

  if (index == 1) {
    state = 1;
  }

  if (index == 2) {
    state = 2;
  }
}

function addAnnouncement() {
  // get values
  var valid_from = $("#valid_from_date").val();
  valid_from = valid_from.trim();
  var valid_to = $("#valid_to_date").val();
  valid_to = valid_to.trim();
  var title = $("#ann_title").val();
  title = title.trim();
  var status = state;
  var content = $("#ann_content").val();
  content = content.trim(); //alert(status);

  if (valid_from == "") {
    alert("Valid From Date field is required!");
  } else if (valid_to == "") {
    alert("Valid To Date field is required!");
  } else if (title == "") {
    alert("Title field is required!");
  } else if (content == "") {
    alert("Content field is required!");
  } else {
    // Add record
    //alert("Here");
    $.post("ajax/CreateNewAnnouncement.php", {
      valid_from: valid_from,
      valid_to: valid_to,
      title: title,
      content: content,
      status: status
    }, function (data, status) {
      // close the popup
      $("#add_new_record_modal").modal("hide"); // read records again

      readAnnouncements(); // clear fields from the popup

      $("#valid_from_date").val("");
      $("#valid_to_date").val("");
      $("#ann_title").val("");
      $("#ann_content").val("");
      $("#announcement_status1").prop("checked", false);
      $("#announcement_status2").prop("checked", false);
      $("#announcement_status3").prop("checked", false);
    });
  }
}

function searchAnnouncement() {
  // get hidden field value
  var search_text = $("#search_text").val();

  if (search_text == "") {
    readAnnouncements();
  } else {
    $.get("ajax/GetSearchAnnouncement.php", {
      search_text: search_text
    }, function (data, status) {
      $(".announcement_content").html(data);
    });
  }
}

function resetSearchAnnouncements() {
  $.get("ajax/GetAllAnnouncements.php", {}, function (data, status) {
    $(".announcement_content").html(data);
    $("#search_text").val('');
  });
}

function getCurrentAnnouncements() {
  $.get("ajax/GetCurrentAnnouncement.php", {}, function (data, status) {
    $(".get_announcement_content").html(data);
  });
} // READ records


function readAnnouncements() {
  $.get("ajax/GetAllAnnouncements.php", {}, function (data, status) {
    $(".announcement_content").html(data);
  });
} // READ records


function readStaff() {
  $.get("ajax/GetAllStaff.php", {}, function (data, status) {
    $(".records_content").html(data);
  });
}

function GetStaffProfile(id) {
  // Add User ID to the hidden field
  $("#hidden_staff_id").val(id);
  $.post("ajax/GetStaffProfile.php", {
    id: id
  }, function (data, status) {
    // PARSE json data
    var staff = JSON.parse(data); // Assign existing values to the modal popup fields

    $("#hidden_staff_id").val(staff.id);
    $("#profile_staff_id").val(staff.staff_id);
    $("#profile_userpwd").val(staff.userpwd);
    $("#profile_first_name").val(staff.first_name);
    $("#profile_last_name").val(staff.last_name);
    $("#profile_email_address").val(staff.email_address);
    $("#profile_mobile_number").val(staff.mobile_number); //alert(staff.is_active);
  }); // Open modal popup

  $("#update_staffprofile_modal").modal("show");
}

function GetStaffDetails(id) {
  // Add User ID to the hidden field
  $("#hidden_staff_id").val(id);
  $.post("ajax/GetStaffDetails.php", {
    id: id
  }, function (data, status) {
    // PARSE json data
    var staff = JSON.parse(data); // Assign existing values to the modal popup fields

    $("#id").val(staff.id);
    $("#update_staff_id").val(staff.staff_id);
    $("#update_userpwd").val(staff.userpwd);
    $("#update_first_name").val(staff.first_name);
    $("#update_last_name").val(staff.last_name);
    $("#update_email_address").val(staff.email_address);
    $("#update_mobile_number").val(staff.mobile_number);

    if (staff.is_active == 1) {
      $("#update_is_active").prop("checked", true);
    }

    if (staff.is_active == 0) {
      $("#update_is_active").prop("checked", false);
    } //alert(staff.is_active);

  }); // Open modal popup

  $("#update_staff_modal").modal("show");
}

function GetAdminDetails() {
  $.post("ajax/GetAdminDetails.php", {}, function (data, status) {
    // PARSE json data
    var admin = JSON.parse(data); // Assign existing values to the modal popup fields

    $("#hidden_admin_id").val(admin.id);
    $("#update_admin_username").val(admin.username);
    $("#update_admin_password").val(admin.userpwd);
    $("#update_admin_first_name").val(admin.first_name);
    $("#update_admin_last_name").val(admin.last_name);
    $("#update_admin_email_address").val(admin.email_address);
    $("#update_admin_mobile_number").val(admin.mobile_number);
  }); // Open modal popup

  $("#update_admin_proifle").modal("show");
}

function GetAnnouncementDetails(id) {
  $.post("ajax/GetAnnouncementDetails.php", {
    id: id
  }, function (data, status) {
    // PARSE json data
    var announcement = JSON.parse(data); // Assign existing values to the modal popup fields

    $("#hidden_announcement_id").val(announcement.id);
    $("#update_valid_from_date").val(announcement.valid_from_date);
    $("#update_valid_to_date").val(announcement.valid_to_date);
    $("#update_ann_title").val(announcement.ann_title);
    $("#update_ann_content").val(announcement.ann_content); //alert(announcement.ann_status);

    if (announcement.ann_status == 0) {
      $("#update_announcement_status1").prop("checked", true);
      $("#update_announcement_status2").prop("checked", false);
      $("#update_announcement_status3").prop("checked", false);
    }

    if (announcement.ann_status == 1) {
      $("#update_announcement_status1").prop("checked", false);
      $("#update_announcement_status2").prop("checked", true);
      $("#update_announcement_status3").prop("checked", false);
    }

    if (announcement.ann_status == 2) {
      $("#update_announcement_status1").prop("checked", false);
      $("#update_announcement_status2").prop("checked", false);
      $("#update_announcement_status3").prop("checked", true);
    }
  }); // Open modal popup

  $("#update_announcement_modal").modal("show");
}

function UpdateAnnouncement() {
  // get values
  var valid_from = $("#update_valid_from_date").val();
  valid_from = valid_from.trim();
  var valid_to = $("#update_valid_to_date").val();
  valid_to = valid_to.trim();
  var title = $("#update_ann_title").val();
  title = title.trim();
  var content = $("#update_ann_content").val();
  content = content.trim();
  var status = $("#hidden_update_announcement_status").val();
  status = status.trim(); //alert(status);

  if (status == "") {
    status = "0";
  }

  if (valid_from == "") {
    alert("Valid From Date field is required!");
  } else if (valid_to == "") {
    alert("Valid To Date field is required!");
  } else if (title == "") {
    alert("Title field is required!");
  } else if (content == "") {
    alert("Content field is required!");
  } else {
    var id = $("#hidden_announcement_id").val(); // Add record

    $.post("ajax/UpdateAnnouncement.php", {
      id: id,
      valid_from: valid_from,
      valid_to: valid_to,
      title: title,
      content: content,
      status: status
    }, function (data, status) {
      // close the popup
      $("#update_announcement_modal").modal("hide"); // read records again

      readAnnouncements(); // clear fields from the popup

      $("#update_valid_from_date").val("");
      $("#update_valid_to_date").val("");
      $("#update_ann_title").val("");
      $("#update_ann_content").val("");
      $("#hidden_update_announcement_status").val("");
    });
  }
}

function UpdateStaffDetails() {
  // get values
  var staff_id = $("#update_staff_id").val();
  staff_id = staff_id.trim();
  var first_name = $("#update_first_name").val();
  first_name = first_name.trim();
  var last_name = $("#update_last_name").val();
  last_name = last_name.trim();
  var email_address = $("#update_email_address").val();
  email_address = email_address.trim();
  var mobile_number = $("#update_mobile_number").val();
  mobile_number = mobile_number.trim();
  var is_active = $("#hidden_update_is_active").val();
  is_active = is_active.trim();
  var is_change_pwd = $("#update_change_userpwd").val();
  is_change_pwd = is_change_pwd.trim();
  var password1 = $("#update_userpwd").val();
  password1 = password1.trim();
  var password2 = $("#update_confirm_userpwd").val();
  password2 = password2.trim();

  if (is_active == "") {
    is_active = 0;
  }

  if (staff_id == "") {
    alert("Staff ID field is required!");
  } else if (first_name == "") {
    alert("First name field is required!");
  } else if (last_name == "") {
    alert("Last name field is required!");
  } else if (email_address == "") {
    alert("Email field is required!");
  } else if (is_change_pwd == 1) {
    if (password1 != password2) {
      alert("Passwords don't match");
    } else {
      // get hidden field value
      var id = $("#hidden_staff_id").val(); //alert(id);
      // Update the details by requesting to the server using ajax

      $.post("ajax/UpdateStaff.php", {
        id: id,
        staff_id: staff_id,
        password1: password1,
        first_name: first_name,
        last_name: last_name,
        email_address: email_address,
        mobile_number: mobile_number,
        is_active: is_active
      }, function (data, status) {
        // hide modal popup
        $("#update_staff_modal").modal("hide"); // reload Users by using readRecords();

        readStaff();
      });
    }
  } else {
    // get hidden field value
    var id = $("#hidden_staff_id").val(); // alert(id);
    // Update the details by requesting to the server using ajax

    $.post("ajax/UpdateStaff.php", {
      id: id,
      staff_id: staff_id,
      password1: password1,
      first_name: first_name,
      last_name: last_name,
      email_address: email_address,
      mobile_number: mobile_number,
      is_active: is_active
    }, function (data, status) {
      // hide modal popup
      $("#update_staff_modal").modal("hide"); // reload Users by using readRecords();

      readStaff();
    });
  }
} //Update Staff Profile


function UpdateStaffProfile() {
  //alert("Fire!")
  // get values
  var staff_id = $("#profile_staff_id").val();
  staff_id = staff_id.trim();
  var first_name = $("#profile_first_name").val();
  first_name = first_name.trim();
  var last_name = $("#profile_last_name").val();
  last_name = last_name.trim();
  var email_address = $("#profile_email_address").val();
  email_address = email_address.trim();
  var mobile_number = $("#profile_mobile_number").val();
  mobile_number = mobile_number.trim();
  var is_change_pwd = $("#profile_change_userpwd").val();
  is_change_pwd = is_change_pwd.trim();
  var password1 = $("#profile_userpwd").val();
  password1 = password1.trim();
  var password2 = $("#profile_confirm_userpwd").val();
  password2 = password2.trim();

  if (staff_id == "") {
    alert("Staff ID field is required!");
  } else if (first_name == "") {
    alert("First name field is required!");
  } else if (last_name == "") {
    alert("Last name field is required!");
  } else if (email_address == "") {
    alert("Email field is required!");
  } else if (is_change_pwd == 1) {
    if (password1 != password2) {
      alert("Passwords don't match");
    } else {
      //alert("Pull");
      // get hidden field value
      var id = $("#hidden_staff_id").val(); //alert(id);
      // Update the details by requesting to the server using ajax

      $.post("ajax/UpdateStaffProfile.php", {
        id: id,
        staff_id: staff_id,
        password1: password1,
        first_name: first_name,
        last_name: last_name,
        email_address: email_address,
        mobile_number: mobile_number
      }, function (data, status) {
        // hide modal popup
        //alert("Erro");
        $("#update_staffprofile_modal").modal("hide");
      });
    }
  } else {
    //alert("Give");
    // get hidden field value
    var id = $("#hidden_staff_id").val(); // alert(id);
    // Update the details by requesting to the server using ajax

    $.post("ajax/UpdateStaffProfile.php", {
      id: id,
      staff_id: staff_id,
      password1: password1,
      first_name: first_name,
      last_name: last_name,
      email_address: email_address,
      mobile_number: mobile_number
    }, function (data, status) {
      // hide modal popup
      $("#update_staffprofile_modal").modal("hide");
    });
  }
} //Update Admin Profile


function UpdateAdminProfile() {
  // get values
  //var admin_id = $("#hidden_admin_id").val();
  //admin_id = admin_id.trim();
  var first_name = $("#update_admin_first_name").val();
  first_name = first_name.trim();
  var last_name = $("#update_admin_last_name").val();
  last_name = last_name.trim();
  var email_address = $("#update_admin_email_address").val();
  email_address = email_address.trim();
  var mobile_number = $("#update_admin_mobile_number").val();
  mobile_number = mobile_number.trim();
  var is_change_pwd = $("#update_admin_change_password").val();
  is_change_pwd = is_change_pwd.trim();
  var password1 = $("#update_admin_password").val();
  password1 = password1.trim();
  var password2 = $("#update_admin_confirm_password").val();
  password2 = password2.trim(); //alert($("#update_admin_change_password").val());

  if (first_name == "") {
    alert("First name field is required!");
  } else if (last_name == "") {
    alert("Last name field is required!");
  } else if (email_address == "") {
    alert("Email field is required!");
  } else if (is_change_pwd == 1) {
    if (password1 != password2) {
      alert("Passwords don't match");
    }
  } else {
    // get hidden field value
    var id = $("#hidden_admin_id").val(); // Update the details by requesting to the server using ajax

    $.post("ajax/UpdateAdmProfile.php", {
      id: id,
      first_name: first_name,
      last_name: last_name,
      email_address: email_address,
      mobile_number: mobile_number,
      password1: password1
    }, function (data, status) {
      // hide modal popup
      $("#update_admin_proifle").modal("hide"); // reload Users by using readRecords();
      // readStaff();
    });
  }
}

function DeleteAnnouncement(id) {
  var conf = confirm("Are you sure, do you really want to delete Announcement?");

  if (conf == true) {
    $.post("ajax/DeleteAnnouncement.php", {
      id: id
    }, function (data, status) {
      // reload Users by using readRecords();
      readAnnouncements();
    });
  }
}

function DeleteStaff(id) {
  var conf = confirm("Are you sure, do you really want to delete Staff?");

  if (conf == true) {
    $.post("ajax/DeleteStaff.php", {
      id: id
    }, function (data, status) {
      // reload Users by using readRecords();
      readStaff();
    });
  }
}

function reload() {
  setTimeout(function () {
    window.location.reload();
  }, 500);
}
//# sourceMappingURL=script.dev.js.map
