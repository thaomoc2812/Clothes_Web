var count = 0;

var elementStaff;
var elementRoom;
var elementDevice;
var elementPackage;
var elementMem;

function collapseSidebar() {
  if (count == 0) {
    initializeMember();
    var element = document.getElementById("navbarcollapse");
    element.className = element.className.replace(
      "page-container sidebar-collapsed",
      "page-container"
    );
    if (staffcount == 0)
      elementStaff.className = elementStaff.className.replace("", "has-sub");
    else if (staffcount == 1) {
      elementStaff.className = elementStaff.className.replace(
        "",
        "has-sub opened"
      );
    }

    if (roomcount == 0)
      elementRoom.className = elementRoom.className.replace("", "has-sub");
    else if (roomcount == 1)
      elementRoom.className = elementRoom.className.replace(
        "",
        "has-sub opened"
      );

    if (devicecount == 0)
      elementDevice.className = elementDevice.className.replace("", "has-sub");
    else if (devicecount == 1)
      elementDevice.className = elementDevice.className.replace(
        "",
        "has-sub opened"
      );

    if (packagecount == 0)
      elementPackage.className = elementPackage.className.replace(
        "",
        "has-sub"
      );
    else if (packagecount == 1)
      elementPackage.className = elementPackage.className.replace(
        "",
        "has-sub opened"
      );

    if (membercount == 0)
      elementMem.className = elementMem.className.replace("", "has-sub");
    else if (membercount == 1)
      elementMem.className = elementMem.className.replace("", "has-sub opened");

    count = 1;
  } else if (count == 1) {
    var element = document.getElementById("navbarcollapse");
    element.className = element.className.replace(
      "page-container",
      "page-container sidebar-collapsed"
    );

    if (staffcount == 0)
      elementStaff.className = elementStaff.className.replace("has-sub", "");
    else if (staffcount == 1) {
      elementStaff.className = elementStaff.className.replace(
        "has-sub opened",
        ""
      );
    }

    if (roomcount == 0)
      elementRoom.className = elementRoom.className.replace("has-sub", "");
    else if (roomcount == 1)
      elementRoom.className = elementRoom.className.replace(
        "has-sub opened",
        ""
      );

    if (devicecount == 0)
      elementDevice.className = elementDevice.className.replace("has-sub", "");
    else if (devicecount == 1)
      elementDevice.className = elementDevice.className.replace(
        "has-sub opened",
        ""
      );

    if (packagecount == 0)
      elementPackage.className = elementPackage.className.replace(
        "has-sub",
        ""
      );
    else if (packagecount == 1)
      elementPackage.className = elementPackage.className.replace(
        "has-sub opened",
        ""
      );

    if (membercount == 0)
      elementMem.className = elementMem.className.replace("has-sub", "");
    else if (membercount == 1)
      elementMem.className = elementMem.className.replace("has-sub opened", "");

    count = 0;
  }
}

function initializeMember() {
  elementStaff = document.getElementById("staffhassubopen");
  elementRoom = document.getElementById("roomhassubopen");
  elementDevice = document.getElementById("devicehassubopen");
  elementPackage = document.getElementById("packagehassubopen");
  elementMem = document.getElementById("memberhassubopen");
}

var staffcount = 0;
var roomcount = 0;
var devicecount = 0;
var packagecount = 0;
var membercount = 0;

function memberExpand(passvalue) {
  if (passvalue == 1) {
    if (staffcount == 0) {
      if (roomcount == 1) {
        elementRoom.className = elementRoom.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("roomExpand");
        element.className = element.className.replace("visible", "");
        roomcount = 0;
      }
      if (devicecount == 1) {
        elementDevice.className = elementDevice.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("deviceExpand");
        element.className = element.className.replace("visible", "");
        devicecount = 0;
      }
      if (packagecount == 1) {
        elementPackage.className = elementPackage.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("packageExpand");
        element.className = element.className.replace("visible", "");
        packagecount = 0;
      }
      if (membercount == 1) {
        elementMem.className = elementMem.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("memExpand");
        element.className = element.className.replace("visible", "");
        membercount = 0;
      }

      elementStaff.className = elementStaff.className.replace(
        "has-sub",
        "has-sub opened"
      );

      var element = document.getElementById("staffExpand");
      element.className = element.className.replace("", "visible");
      staffcount = 1;
    } else if (staffcount == 1) {
      elementStaff.className = elementStaff.className.replace(
        "has-sub opened",
        "has-sub"
      );

      var element = document.getElementById("staffExpand");
      element.className = element.className.replace("visible", "");
      staffcount = 0;
    }
  } else if (passvalue == 2) {
    if (roomcount == 0) {
      if (staffcount == 1) {
        elementStaff.className = elementStaff.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("staffExpand");
        element.className = element.className.replace("visible", "");
        staffcount = 0;
      }
      if (devicecount == 1) {
        elementDevice.className = elementDevice.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("deviceExpand");
        element.className = element.className.replace("visible", "");
        devicecount = 0;
      }
      if (packagecount == 1) {
        elementPackage.className = elementPackage.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("packageExpand");
        element.className = element.className.replace("visible", "");
        packagecount = 0;
      }
      if (membercount == 1) {
        elementMem.className = elementMem.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("memExpand");
        element.className = element.className.replace("visible", "");
        membercount = 0;
      }

      elementRoom.className = elementRoom.className.replace(
        "has-sub",
        "has-sub opened"
      );

      var element2 = document.getElementById("roomExpand");
      element2.className = element2.className.replace("", "visible");
      roomcount = 1;
    } else if (roomcount == 1) {
      elementRoom.className = elementRoom.className.replace(
        "has-sub opened",
        "has-sub"
      );

      var element2 = document.getElementById("roomExpand");
      element2.className = element2.className.replace("visible", "");
      roomcount = 0;
    }
  } else if (passvalue == 3) {
    if (devicecount == 0) {
      if (staffcount == 1) {
        elementStaff.className = elementStaff.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("staffExpand");
        element.className = element.className.replace("visible", "");
        staffcount = 0;
      }
      if (roomcount == 1) {
        elementRoom.className = elementRoom.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("roomExpand");
        element.className = element.className.replace("visible", "");
        roomcount = 0;
      }
      if (packagecount == 1) {
        elementPackage.className = elementPackage.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("packageExpand");
        element.className = element.className.replace("visible", "");
        packagecount = 0;
      }
      if (membercount == 1) {
        elementMem.className = elementMem.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("memExpand");
        element.className = element.className.replace("visible", "");
        membercount = 0;
      }

      elementDevice.className = elementDevice.className.replace(
        "has-sub",
        "has-sub opened"
      );

      var element3 = document.getElementById("deviceExpand");
      element3.className = element3.className.replace("", "visible");
      devicecount = 1;
    } else if (devicecount == 1) {
      elementDevice.className = elementDevice.className.replace(
        "has-sub opened",
        "has-sub"
      );

      var element3 = document.getElementById("deviceExpand");
      element3.className = element3.className.replace("visible", "");
      devicecount = 0;
    }
  } else if (passvalue == 4) {
    if (packagecount == 0) {
      if (staffcount == 1) {
        elementStaff.className = elementStaff.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("staffExpand");
        element.className = element.className.replace("visible", "");
        staffcount = 0;
      }
      if (roomcount == 1) {
        elementRoom.className = elementRoom.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("roomExpand");
        element.className = element.className.replace("visible", "");
        roomcount = 0;
      }
      if (devicecount == 1) {
        elementDevice.className = elementDevice.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("deviceExpand");
        element.className = element.className.replace("visible", "");
        devicecount = 0;
      }
      if (membercount == 1) {
        elementMem.className = elementMem.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("memExpand");
        element.className = element.className.replace("visible", "");
        membercount = 0;
      }

      elementPackage.className = elementPackage.className.replace(
        "has-sub",
        "has-sub opened"
      );

      var element4 = document.getElementById("packageExpand");
      element4.className = element4.className.replace("", "visible");
      packagecount = 1;
    } else if (packagecount == 1) {
      elementPackage.className = elementPackage.className.replace(
        "has-sub opened",
        "has-sub"
      );

      var element4 = document.getElementById("packageExpand");
      element4.className = element4.className.replace("visible", "");
      packagecount = 0;
    }
  } else if (passvalue == 5) {
    if (membercount == 0) {
      if (staffcount == 1) {
        elementStaff.className = elementStaff.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("staffExpand");
        element.className = element.className.replace("visible", "");
        staffcount = 0;
      }
      if (roomcount == 1) {
        elementRoom.className = elementRoom.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("roomExpand");
        element.className = element.className.replace("visible", "");
        roomcount = 0;
      }
      if (devicecount == 1) {
        elementDevice.className = elementDevice.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("deviceExpand");
        element.className = element.className.replace("visible", "");
        devicecount = 0;
      }
      if (packagecount == 1) {
        elementPackage.className = elementPackage.className.replace(
          "has-sub opened",
          "has-sub"
        );

        var element = document.getElementById("memExpand");
        element.className = element.className.replace("visible", "");
        packagecount = 0;
      }

      elementMem.className = elementMem.className.replace(
        "has-sub",
        "has-sub opened"
      );

      var element4 = document.getElementById("memExpand");
      element4.className = element4.className.replace("", "visible");
      membercount = 1;
    } else if (membercount == 1) {
      elementMem.className = elementMem.className.replace(
        "has-sub opened",
        "has-sub"
      );

      var element4 = document.getElementById("memExpand");
      element4.className = element4.className.replace("visible", "");
      membercount = 0;
    }
  }
}
