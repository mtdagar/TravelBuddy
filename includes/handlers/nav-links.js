//wtf is this I should have written ejs or AJAX but fuck it

var firstName = "user";

var navList = document.getElementById("navList");

var loginLinkItem = document.getElementById("loginLinkItem");

var userLinkItem = document.createElement("li");
var userLink = document.createElement("a");
var dropdownDiv = document.createElement("div");
var dropdownDivider = document.createElement("div");
var profileLink = document.createElement("a");
var logoutLink = document.createElement("a");

navList.removeChild(loginLinkItem);

userLinkItem.setAttribute("class", "nav-item");
userLinkItem.setAttribute("class", "dropdown");
navList.appendChild(userLinkItem);

userLink.setAttribute("class", "nav-link");
userLink.setAttribute("class", "dropdown-toggle");
userLink.setAttribute("href", "#");
userLink.setAttribute("id", "navbarDropdown");
userLink.setAttribute("role", "button");
userLink.setAttribute("data-toggle", "dropdown");
userLink.setAttribute("aria-haspopup", "true");
userLink.setAttribute("aria-expanded", "false");
userLink.setAttribute("style", "background-image: url('../../assets/icons/user_white_32px.png'); background-repeat: no-repeat; background-position: 0px 8px; padding-left: 40px; display: block;");
userLink.appendChild(document.createTextNode(firstName));
userLinkItem.appendChild(userLink);

dropdownDiv.setAttribute("class", "dropdown-menu");
dropdownDiv.setAttribute("aria-labelledby", "navbarDropdown");
userLinkItem.appendChild(dropdownDiv);

profileLink.setAttribute("class", "dropdown-item");
profileLink.setAttribute("href", "#");
profileLink.appendChild(document.createTextNode("Your profile"));
dropdownDiv.appendChild(profileLink);

dropdownDivider.setAttribute("class", "dropdown-divider");
dropdownDiv.appendChild(dropdownDivider);

logoutLink.setAttribute("class", "dropdown-item");
logoutLink.setAttribute("href", "includes/classes/Logout.php");
logoutLink.appendChild(document.createTextNode("Sign out"));
dropdownDiv.appendChild(logoutLink);