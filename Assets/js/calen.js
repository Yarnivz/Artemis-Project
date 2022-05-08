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

  // Header of the month

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






window.document.onload = myFunction();

function closeForm()
{
  var x = document.getElementById("formDiv");
  var y = document.getElementsByClassName("addBTN")[0];
  x.style.display = "none";
  y.style.transform = "rotate(90deg)";
}

function toggleForm()
{
  var x = document.getElementById("formDiv");
  var y = document.getElementsByClassName("addBTN")[0];
  
  if (x.style.display === "none")
  {
    x.style.display = "block";
    y.style.display = "rotate(45deg)";
  }
  else
  {
    x.style.display = "block";
    y.style.display = "rotate(90deg)";
  }
}

function myFunction(){
  
  
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

  var eventName = document.calendarForm.eventName.value;
  var eventType = document.calendarForm.eventType.value;
  var eventColor = "";
  var eventDate = document.calendarForm.eventDate.value


  //Different Colors of different event types

  switch(eventType)
  {

    case "Event":
      eventColor = "orange";
    break;

    case "Free Times":
      eventColor = "pink";
    break;

    case "Family Time":
      eventColor = "green";
    break;

    case "Birthday":
      eventColor = "red"
    break;

    default:
      eventColor = "blue";
    break;

  }

  //Storage data calendar
  var data = JSON.parse(localStorage.getItem("data"))

  if(data === null)
  {
    data = [];
  }

  else if(eventName != "" && eventType != "" && eventColor != "" && eventDate != "")
  {
    data.push(
      {
        eventName: eventName,
        calendar: eventType,
        color: eventColor,
        date: eventDate
      });
  }

  //To check if it's stored into the storage/data !

  for (var a of data)
  {
    console.log(a)
  }
  localStorage.setItem("data", JSON.stringify(data));


  //Deleting The Event

  function delEvent(events)
  {
    var a = data.indexOf(events);
    var b = confirm("Are you sure to remove this event ?");

    if(b)
    {
      var c = data.splice(a, 1);
    }

    localStorage.setItem("data", JSON.stringify(data));

  // To check if it's deleted from the storage/data !

    for(var a of data)
    {
      console.log(a);
    }

    var calendar = new Calendar("#calendar", data);

    document.calendarForm.eventName.value = "";
    document.calendarForm.eventType.value = "";
    document.calendarForm.eventDate.value = "";

    toggleForm();
  }
}