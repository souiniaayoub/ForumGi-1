var anime_login = anime({
  targets: ".login",
  left: "0",
  duration: 900,
});
var anime_signup = anime({
  targets: ".signup",
  right: "0",
  duration: 900,
});
var anime_logo_details2 = anime({
  targets: ".logo-details",
  translateX: "-150%",
  duration: 800,
});
var anime_logo_details1 = anime({
  targets: ".logo-details",
  translateX: "150%",
  duration: 800,
});
anime({
  targets: ".logo-details",
  translateX: "0%",
  duration: 800,
}); //! this when loding the page so its not 150% traslated
$(".signup-btn").click(() => {
  if ($(window).width() > 390) {
    console.log("signup");
    anime_logo_details2.play();
    $(".logo-details").css("left", "60%");
  }
  anime_signup.play();
  $(".signup").css("display", "flex");
  $(".login").css("display", "none");
});

$(".login-btn").click(() => {
  if ($(window).width() > 390) {
    console.log("login");
    anime_logo_details1.play();
    $(".logo-details").css("left", "0");
  }
  anime_login.play();
  $(".signup").css("display", "none");
  $(".login").css("display", "flex");
});
