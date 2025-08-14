<script src="../../plugins/jquery/jquery.min.js"></script>
<script>
  let date = new Date();
  $(document).ready(() => {
    localStorage.setItem("loginFlag", "guest");
    localStorage.setItem("loginUserName", "GUEST");
    localStorage.setItem("lastLogin", date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate());
    localStorage.setItem("loginToken", "ZZSX" + Math.floor(100000 + Math.random() * 900000) + "BBVC");
    window.location.href="../../index.html";
  });
</script>

