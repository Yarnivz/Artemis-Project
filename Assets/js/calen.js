const date = new Date();

// Render each months days in the calendar

const renderCalendar = () => {
  date.setDate(1);

  const monthDays = document.querySelector(".days");

  const lastDay = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDate();

  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  const firstDayIndex = date.getDay();

  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;


  //Months represented in fixed lenght
  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  document.querySelector(".date h1").innerHTML = months[date.getMonth()];
  document.querySelector(".date p").innerHTML = new Date().getFullYear();

  //Days Of Previous Month

  var days = "";

  for (var x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }

  //Days Of Previous Month

  for (var i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
  }

  //Days Of Next Month
  for (var j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
  }
  monthDays.innerHTML = days;
};

//Using to click previous button 
document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

//Using to click next button
document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

//To render the calendar after the function
renderCalendar();




















//Head Start 

window.Calendar = Calendar;

// Usage of the elements of HTML 
function theElements(idTags, classNames, innerTextUsage)
{
  var element = document.createElement(idTags);
  
  if(classNames)
  {
    element.classNames = classNames;
  }
  else if(innerTextUsage)
  {
    element.innerTextUsage = element.textContent = innerTextUsage;

  }

  return element;
}

var eventName = document.myForm.eventName.value



