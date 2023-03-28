function next() {
    var form1 = document.getElementById("login");
    var form2 = document.getElementById("login2");

    if (form1.style.display === "none") {
      form1.style.display = "flex";
    } else {
      form1.style.display = "none";
      form2.style.display = "flex";
      
    }
  }

  function back() {
    var form1 = document.getElementById("login");
    var form2 = document.getElementById("login2");

    if (form1.style.display === "flex") {
      form1.style.display = "none";
    } else {
      form1.style.display = "flex";
      form2.style.display = "none";
      
    }
  }

