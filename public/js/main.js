function next() {
    var form1 = document.getElementById("login");
    var form2 = document.getElementById("login2");

    if (form1.style.display === "none") {
      form1.style.display = "block";
    } else {
      form1.style.display = "none";
      form2.style.display = "block";
      
    }
  }

  function back() {
    var form1 = document.getElementById("login");
    var form2 = document.getElementById("login2");

    if (form1.style.display === "block") {
      form1.style.display = "none";
    } else {
      form1.style.display = "block";
      form2.style.display = "none";
      
    }
  }

