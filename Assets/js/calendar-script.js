//Setting up the main date
var date = new Date();
var currentMonth = date.getMonth();
var currentYear = date.getFullYear();

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
]

// To change the month

document.querySelector(".month-name2").innerHTML = months[currentMonth]
document.querySelector(".year-name").innerHTML = currentYear;


//button element for switching the date
var previousButton = document.querySelector(".previous-button");
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