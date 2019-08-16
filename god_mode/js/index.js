window.mapinit=false;
var markersArray = [];
function initMap() {
    google.maps.Map.prototype.clearOverlays = function() {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    };

    if (window.mapinit) {

    } else {
        window.mapinit = true;
        window.map1 = new google.maps.Map(
            document.getElementById('map1'),
            {
                center: {lat:0, lng: 150.644},
                zoom: 16
            }
        );

        window.map3 = new google.maps.Map(
            document.getElementById('map1'),
            {
                center: {lat:0, lng: 150.644},
                zoom: 16
            }
        );
    }
}

var appf = {
    curr_driver:-1,
    driver_data: {},
    user_data: {},
    driver: function () {
        $.getJSON("http://YOUR_IP/dropandrun/backend/god_mode/index.php/api/getDriver", {}, function (ee) {
            if (ee.data.length == 0) {
                $(".driver_row_con").text("No Drivers Found");
            }
            else {
                $.each(ee.data, function (e, l) {
                    appf.driver_data[l.id] = l;

                    var s = `<div class="dt"><h6 align="center" class="driver_title" yy="${l.id}">${l.phone}</h6></div>`;
                    var elem = appf.render(s, "driver_row", appf.driver_row_click);
                    elej = $(elem);
                    $(".driver_row_con").append(elem);
                });
            }
        })
    },
    driver_row_click: function (e) {
        map1.clearOverlays();
        var id = ($(e.target)[0].getAttribute("yy"));
        data = appf.driver_data[id];
        var last_l=data["last_location"];
        var ssd=last_l.split("::");
        window.map1.setCenter({
            lat:parseFloat(ssd[0]),
            lng:parseFloat(ssd[1])
        });
        var marker=new google.maps.Marker({
            position:{
                lat: parseFloat(ssd[0]),
                lng: parseFloat(ssd[1])
            },
            map : window.map1
        });
        markersArray.push(marker);
        $("#driver_name").text(data.name);
        $("#driver_status").text(data.status);
        $("#driver_online").text(data.online);
        $("#driver_truck_type").text(data.car_type);
        $("#driver_token").text(data.fcm_id);
    },
    render: function (e, class1, handler) {
        var div = document.createElement("div");
        div.setAttribute("class", class1);
        div.innerHTML = e;
        $(div).click(handler);
        return div;
    },
    user: function () {
        $.getJSON("http://YOUR_IP/dropandrun/backend/god_mode/index.php/api/getUser", {}, function (ee) {
            if (ee.data.length == 0) {
                $(".user_row_con").text("No Users Found");
            }
            else {
                $.each(ee.data, function (e, l) {
                    appf.user_data[l.id] = l;
                    var s = `<div class="ut"><h6 align="center" class="user_title" yy="${l.id}">${l.phone}</h6></div>`;
                    var elem = appf.render(s, "user_row", appf.row_row_click);
                    elej = $(elem);
                    $(".user_row_con").append(elem);
                });
            }
        })
    },
    row_row_click: function (e) {
        map2.clearOverlays()
        var id = ($(e.target)[0].getAttribute("yy"));
        data = appf.user_data[id];
        $("#user_name").text(data.name);
        $("#user_status").text(data.status);
        $("#user_online").text(data.email);
        $("#user_token").text(data.fcm_token);
    },
    trip: function () {
        $.getJSON("http://YOUR_IP/dropandrun/backend/god_mode/index.php/api/getTrip", {}, function (ee) {
            if (ee.data.length == 0) {
                $(".trip_row_con").text("No Trips Found");
            }
            else {
                $.each(ee.data, function (e, l) {
                    appf.user_data[l.id] = l;
                    var s = `<div class="tt"><h6 align="center" class="trip_title" yy="${l.id}">${l.user_id}</h6></div>`;
                    var elem = appf.render(s, "trip_row", appf.trip_row_click);
                    elej = $(elem);
                    $(".trip_row_con").append(elem);
                });
            }
        })
    },
    trip_row_click: function (e) {
        var id = ($(e.target)[0].getAttribute("yy"));
        var data = appf.user_data[id];
        $("#trip_id").text(data.id);
        $("#trip_booking_time").text(data.time_created);
        $("#trip_pin").text(data.pin);
        $("#trip_recipient_phone").text(data.reciepient_phone);
        $("#trip_status").text(data.status);
        $("#trip_type").text(data.car_type);
        $("#trip_user_phone").text(data.user_id);
        $("#trip_weight").text(data.weight + " KG(s)");
    },
    appl: function () {
        $.getJSON("http://YOUR_IP/dropandrun/backend/god_mode/index.php/api/getApplication", {}, function (ee) {
            console.log(ee);
            if (ee.data.length == 0) {
                $(".appl_row_con").text("No Trips Found");
            }
            else {
                $.each(ee.data, function (e, l) {
                    appf.user_data[l.id] = l;
                    console.log(l);
                    var s = `<div class="appt"><h6 align="center" class="application_title" yy="${l.id}">${l.mobile}</h6></div>`;
                    var elem = appf.render(s, "appl_row", appf.appl_row_click);
                    elej = $(elem);
                    $(".appl_row_con").append(elem);
                });
            }
        })
    },
    appl_row_click: function (e) {
        var id = ($(e.target)[0].getAttribute("yy"));
        var data = appf.user_data[id];
        appf.curr_driver=id;
        $("#appl_id").text(data.id);
        $("#appl_fname").text(data.fname);
        $("#appl_lname").text(data.lname);
        $("#appl_pass").text(data.pass);
        $("#appl_country").text(data.country);
        $("#appl_postal").text(data.postal);
        $("#appl_dob").text(data.dob);
        $("#appl_mobile").text(data.mobile);
        $("#appl_province").text(data.province);
        $("#appl_city").text(data.city);
        $("#appl_model").text(data.model);
        $("#appl_make").text(data.make);
        $("#appl_year").text(data.year);
        $("#appl_color").text(data.color);
        $("#appl_type").text(data.type);
        $("#appl_license").text(data.valid_license);
        $("#appl_lift").text(data.lift_condition);
        $("#appl_phone").text(data.phone_condition);
        $("#appl_dui").text(data.dui_condition);
        $("#appl_crime").text(data.crime_condition);
        $("#appl_insurance").text(data.insurance_condition);
        $("#appl_lic").text(Boolean(data.file3)?"DOWNLOAD":"NOT UPLOADED");
        $("#appl_lic").click(function () {
           if (Boolean(data.file3)) {
               console.log("file3");
           }
        });
        $("#appl_in").text(Boolean(data.file2)?"DOWNLOAD":"NOT UPLOADED");
        $("#appl_reg").text(Boolean(data.file1)?"DOWNLOAD":"NOT UPLOADED");
    }
};
$(".lin").click(
    function (e) {
        $(".con").hide();
        console.log($(e.target.childNodes)[1]);
        ee = ($(e.target.childNodes))[1];
        e = ee.nodeValue;
        $("#" + e.toLowerCase()).show();
    }
);
$("#approve").click(function () {
    if (appf.curr_driver!=-1) {
        $.getJSON("http://YOUR_IP/dropandrun/backend/god_mode/index.php/api/approveDriver/"+appf.curr_driver.toString(),{},function (e) {
            if (e.success) {
                alert("Driver Approved!");
                $("[yy='"+appf.curr_driver.toString()+"']").remove();
                $("#appl_id").text("");
                $("#appl_fname").text("");
                $("#appl_lname").text("");
                $("#appl_pass").text("");
                $("#appl_country").text("");
                $("#appl_postal").text("");
                $("#appl_dob").text("");
                $("#appl_mobile").text("");
                $("#appl_province").text("");
                $("#appl_city").text("");
                $("#appl_model").text("");
                $("#appl_make").text("");
                $("#appl_year").text("");
                $("#appl_color").text("");
                $("#appl_type").text("");
                $("#appl_license").text("");
                $("#appl_lift").text("");
                $("#appl_phone").text("");
                $("#appl_dui").text("");
                $("#appl_crime").text("");
                $("#appl_insurance").text("");
                $("#appl_lic").text("");

                $("#appl_in").text("");
                $("#appl_reg").text("");

            }
            else {
                alert(e.message);
            }
        })
    }
});
appf.driver();
appf.user();
appf.trip();
appf.appl();