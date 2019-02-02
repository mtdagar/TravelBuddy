var navList = document.getElementById("navList");
var loginLinkItem = document.getElementById("loginLinkItem");
var logoutLinkItem = document.createElement("li");
var logoutLink = document.createElement("a");

navList.removeChild(loginLinkItem);

logoutLinkItem.setAttribute("class", "nav-item");

logoutLink.setAttribute("class", "nav-link");
logoutLink.setAttribute("id", "logoutLink");
logoutLink.setAttribute("href", "includes/classes/Logout.php");
logoutLink.appendChild(document.createTextNode("LOG OUT"));


navList.appendChild(logoutLinkItem);
logoutLinkItem.appendChild(logoutLink);

//var loginLink = document.getElementById("loginLink");
//loginLink.innerHTML = "LOG OUT";