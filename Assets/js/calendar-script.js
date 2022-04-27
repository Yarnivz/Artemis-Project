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
document.querySelector(".month-name2").innerHTML = months[currentMonth];

document.querySelector(".year-name").innerHTML = currentYear;


//button element for switching the date
var previousButton = document.querySelector(".previous-button");
var nextButton = document.querySelector(".next-button");

var monthNum = 0;

function prev()
{
   if(i == 0)
   {
      document.getElementsByClassName('prev').disabled = fales;
      document.getElementsByClassName('next')

   }


}


previousButton.addEventListener("click",function(){
   date.setMonth(currentMonth - 1);
});

   
nextButton.addEventListener("click",function(){
   date.setMonth(currentMonth + 1);
});


