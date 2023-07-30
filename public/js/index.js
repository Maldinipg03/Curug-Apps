// side bar
function handleFavorite(e) {
  const btnFav = e.closest(".btn-fav");
  btnFav.classList.toggle("active");
}

function handleBuy(e) {
  const btnBuy = e.closest(".buy-product");
  btnBuy.classList.toggle("active");
}

function handleFollow(e) {
  const btnFollow = e.closest(".btn-follow");
  btnFollow.classList.toggle("active");

  if (btnFollow.classList.contains("active")) {
    btnFollow.innerText = "Following";
  } else {
    btnFollow.innerText = "+Follow";
  }
}

function handleClickMenu(e) {
  const navItem = document.querySelectorAll(".item-menu");
  navItem.forEach(function (v) {
    v.classList.remove("active");
  });
  e.closest(".item-menu").classList.add("active");
}

// calender
const currentDate = document.querySelector(".current-date"),
  daysTag = document.querySelector(".days"),
  prevNextIcon = document.querySelectorAll(".icons span");

let date = new Date(),
  currYear = date.getFullYear(),
  currMonth = date.getMonth();

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "Octocber", "November", "December"];

const renderCalender = () => {
  let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
  let liTag = "";

  for (let i = firstDayofMonth; i > 0; i--) {
    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
  }

  for (let i = 1; i <= lastDateofMonth; i++) {
    let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
    liTag += `<li class="${isToday}">${i}</li>`;
  }

  for (let i = lastDayofMonth; i < 6; i++) {
    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
  }
  currentDate.innerText = `${months[currMonth]} ${currYear}`;
  daysTag.innerHTML = liTag;
};

renderCalender();

prevNextIcon.forEach((icon) => {
  icon.addEventListener("click", () => {
    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

    if (currMonth < 0 || currMonth > 11) {
      date = new Date(currYear, currMonth);
      currYear = date.getFullYear();
      currMonth = date.getMonth();
    } else {
      date = new Date();
    }
    renderCalender();
  });
});
