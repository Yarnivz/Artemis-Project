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

// To change the month

//Setting The Date into the current month
document.querySelector(".month-name2").innerHTML = months[currentMonth];
document.querySelector(".year-name").innerHTML = currentYear;


//To have each day in the calendar
var days = "";
var lastDay = new Date(currentYear, currentMonth + 1, 0).getDate();
var previousLastDays = new Date(currentYear, currentMonth ,0).getDate();


//The days of previous month
var firstDayIndex = date.getDay() + 6;

for(var x = firstDayIndex; x > 0; x--)
{
   var previousDays = '<li class="previous-days">' + (previousLastDays - x) + '</li>';
   days += previousDays;
}



//The days of the specific month
for(var i = 1; i <= lastDay; i++)
{
   if(i === new Date().getDate() && date.getMonth() === new Date().getMonth())
   {  
      var usageDaysToday = '<li class = "today-day" >' + i +'</li>';
      days += usageDaysToday;
   }
   else
   {
      var usageDays = '<li>' + i +'</li>';
      days += usageDays;
   }
}


//the days of next month
var lastDayIndex = new Date(currentYear, currentMonth + 1, 0).getDay();
var nextDays = 7 - lastDayIndex

for(var j = 1; j <= nextDays; j++)
{
   var usageDays = '<li class="next-days">' + j +'</li>';
   days += usageDays;
}
daysOfMonth.innerHTML = days;







var previousButton =  document.querySelector(".previous-button");

previousButton.addEventListener('click', () => {
   if(months[currentMonth - 1] < currentMonth)
   {
      document.querySelector(".month-name2").innerHTML = months[currentMonth - 1];      
   }
   else
   {
      document.querySelector(".month-name2").innerHTML = months[currentMonth];      
   }
})



var nextButton = document.querySelector(".next-button");

var i = 0;

// Previous Button

function prev()
{
   if(i == 0)
   {
      document.getElementsByClassName('prev').disabled = true;
      document.getElementsByClassName('next').disabled = false;
   }
   else
   {
      i--;
      return changeNum();

   }
}

function next()
{
   if(i == 11)
   {
      document.getElementById('prev').disabled = false;
      document.getElementById('next').disabled = true;
   }
   else
   {
      i++;
      return changeNum();
   }
}

function changeNum()
{

   return document.querySelector(".month-name2").innerHTML = months[i];

}

nextButton.addEventListener('click', () => {
   if(months[currentMonth + 1] > currentMonth)
   {
      document.querySelector(".month-name2").innerHTML = months[currentMonth + 1];      
   }
   else
   {
      document.querySelector(".month-name2").innerHTML = months[currentMonth];      
   }
})

