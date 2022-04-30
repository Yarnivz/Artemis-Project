//Setting up the main date
var date = new Date();
var currentMonth = date.getMonth();
var currentYear = date.getFullYear();
var currentDay = date.getDate();
var daysOfMonth = document.querySelector(".days");

// Setting up months   
var months = 
[
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

//Setting The Date into the current month
document.querySelector(".month-name2").innerHTML = months[currentMonth];
document.querySelector(".year-name").innerHTML = currentYear;


//To have each day in the calendar
var days = "";
var lastDay = new Date(currentYear, currentMonth + 1 , 0).getDate();
var previousLastDays = new Date(currentYear, currentMonth,0).getDate();

//The days of previous month
var firstDayIndex = date.getDay();

for(var x = firstDayIndex; x > 0; x++)
{
   var previousDays = '<li class="previous-days">' + (previousLastDays - x + 1) + '</li>';
   days += previousDays;
}

//The days of the specific month
for(var i = 1; i <= lastDay; i++)
{
   var usageDays = '<li>' + i +'</li>';
   days += usageDays;
}
daysOfMonth.innerHTML = days;

//the days of next month
var lastDayIndex = new Date(currentYear, currentMonth + 1, 0).getDay();
var nextDays = 7 - lastDayIndex

for(var j = 1; j <= nextDays; j++)
{
   var usageDays = '<li class="next-days">' + j +'</li>';
   days += usageDays;
}
