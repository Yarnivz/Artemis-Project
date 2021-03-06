//Loading in the calendar function
window.document.onload = theFunction();


//Function of Close Form
function closeForm() {
  var x = document.getElementById("formDiv");
  var y = document.getElementsByClassName("addBTN")[0];
  x.style.display = "none";
  y.style.transform = "rotate(90deg)";
}



//Switch function of The Toggle
function toggleForm() {
  var x = document.getElementById("formDiv");
  var y = document.getElementsByClassName("addBTN")[0];
  if (x.style.display == "none") {
    x.style.display = "block";
    y.style.transform = "rotate(45deg)";
  } else {
    x.style.display = "none";
    y.style.transform = "rotate(90deg)";
  }
}




//Display Value of the form 

//Here you can still change/add events into the calendar

function displayEventSelection() {
  var eventType = document.myForm.eventType.value;
  var eventColor = "";
  switch (eventType) {
    
    case "Birthday":
      eventColor = "rgba(255, 10, 120, 1)";
      break;
  
    case "Wedding":
      eventColor = "rgba(0, 149, 255, 1)";
      break;
    
    case "Event":
      eventColor = "rgba(247, 167, 0, 1)";
      break;
    
    case "Party":
      eventColor = "rgba(249, 233, 0, 1)";
      break;

    default:
    eventColor = "rgba(153, 198, 109, 1)";
      break;
  }
  $("#eventColor").css("background", eventColor);
}





// The Full Calendar Function
function theFunction() {


  //Calling out the day of today
  var today = moment();
  

  //The calendar shows the moment of today
  function Calendar(selector, events) {
    this.el = document.querySelector(selector);
    this.events = events;
    this.current = moment().date(1);
    if (this.el.innerHTML != "") {
      this.el.innerHTML = "";
      this.draw();
    } else {
      this.draw();
    }



    var current = document.querySelector(".today");

    if (current) {
      var self = this;
      window.setTimeout(function() {
        self.openDay(current);
      }, 500);
    }
  }



  // Draw the Usage Event add in the calendar
  Calendar.prototype.draw = function() {
    
    //Draw Header
    this.drawHeader();

    //Draw Month
    this.drawMonth();
    
    //Draw Button
    this.drawButton();
    
    //Draw Legend
    this.drawLegend();
  };


  //Function of Header
  Calendar.prototype.drawHeader = function() {
    var self = this;
    if (!this.header) {




      //To create header elements
      this.header = createElement("div", "header");
      this.header.className = "header";
      this.title = createElement("h1");




      //Right Cursor
      var right = createElement("div", "right");
      right.addEventListener("click", function() {
        self.nextMonth();
      });





      //Left Cursor
      var left = createElement("div", "left");
      left.addEventListener("click", function() {
        self.prevMonth();
      });





      //Append the Elements Of Header, Title, Left & Right
      this.header.appendChild(this.title);
      this.header.appendChild(right);
      this.header.appendChild(left);
      this.el.appendChild(this.header);



    }

    this.title.innerHTML = this.current.format("MMMM YYYY");
  };




  // Function of the month
  Calendar.prototype.drawMonth = function() {
    var self = this;
    this.events.forEach(function(ev) {
      ev.date = moment(ev.date, "YYYY-MM-DD");
    });

    if (this.month) {
      this.oldMonth = this.month;
      this.oldMonth.className = "month out " + (self.next ? "next" : "prev");
      this.oldMonth.addEventListener("webkitAnimationEnd", function() {
        self.oldMonth.parentNode.removeChild(self.oldMonth);
        self.month = createElement("div", "month");
        self.backFill();
        self.currentMonth();
        self.fowardFill();
        self.el.appendChild(self.month);
        window.setTimeout(function() {
          self.month.className = "month in " + (self.next ? "next" : "prev");
        }, 16);
      });
    }
    else 
    {
      this.month = createElement("div", "month");
      this.el.appendChild(this.month);
      this.backFill();
      this.currentMonth();
      this.fowardFill();
      this.month.className = "month new";
    }

  };

  // Day Of the Week display into the days
  Calendar.prototype.backFill = function() {
    var clone = this.current.clone();
    var dayOfWeek = clone.day();
    if (!dayOfWeek) {
      return;
    }

    clone.subtract(dayOfWeek + 1, "days");
    for (var i = dayOfWeek; i > 0; i--) {
      this.drawDay(clone.add(1, "days"));
    }
  };








  //The Functionality of the month 
  Calendar.prototype.fowardFill = function() {
    var clone = this.current
      .clone()
      .add(1, "months")
      .subtract(1, "days");
    var dayOfWeek = clone.day();

    if (dayOfWeek === 6) {
      return;
    }

    for (var i = dayOfWeek; i < 6; i++) {
      this.drawDay(clone.add(1, "days"));
    }
  };

  








  // Function for the current month
  Calendar.prototype.currentMonth = function() {
    var clone = this.current.clone();
    while (clone.month() === this.current.month()) {
      this.drawDay(clone);
      clone.add(1, "days");
    }
  };








  // Function for the day of the week
  Calendar.prototype.getWeek = function(day) {
    if (!this.week || day.day() === 0) {
      this.week = createElement("div", "week");
      this.month.appendChild(this.week);
    }
  };













  // Function for the days
  Calendar.prototype.drawDay = function(day) {
    var self = this;
    this.getWeek(day);

    //Outer Day
    var outer = createElement("div", this.getDayClass(day));

    if (outer.className.indexOf("other") == -1) {
      outer.addEventListener("click", function() {
        self.openDay(this);
      });
    }













    //Day Name
    var name = createElement("div", "day-name", day.format("ddd"));

    //Day Number
    var number = createElement("div", "day-number", day.format("DD"));

    //Events
    var events = createElement("div", "day-events");

    this.drawEvents(day, events);
    outer.appendChild(name);
    outer.appendChild(number);
    outer.appendChild(events);
    this.week.appendChild(outer);
  };
















  Calendar.prototype.drawEvents = function(day, element) {
    if (day.month() === this.current.month()) {
      var todaysEvents = this.events.reduce(function(memo, ev) {
        if (ev.date.isSame(day, "day")) {
          memo.push(ev);
        }
        return memo;
      }, []);




      todaysEvents.forEach(function(ev) {
        var evSpan = createElement("span", ev.color);
        element.appendChild(evSpan);
      });
    }
  };















  Calendar.prototype.getDayClass = function(day) {
    var classes = ["day"];
    if (day.month() !== this.current.month()) {
      classes.push("other");
    } else if (today.isSame(day, "day")) {
      classes.push("today");
    }

    return classes.join(" ");
  };
















  Calendar.prototype.openDay = function(el) {
    var details, arrow;
    var dayNumber =
      +el.querySelectorAll(".day-number")[0].innerText ||
      +el.querySelectorAll(".day-number")[0].textContent;
    var day = this.current.clone().date(dayNumber);
    var currentOpened = document.querySelector(".details");

      
      if (currentOpened) {
        currentOpened.addEventListener("webkitAnimationEnd", function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });

        currentOpened.addEventListener("oanimationend", function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });

        currentOpened.addEventListener("msAnimationEnd", function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });

        currentOpened.addEventListener("animationend", function() {
          currentOpened.parentNode.removeChild(currentOpened);
        });

        currentOpened.className = "details out";
      }










      //Create the Details Container
      //Shows what detail is added to the calendar
      details = createElement("div", "details in");

      var group1 = createElement("div", "detailsHeader");
      var todayDate = createElement("div", "todayDate", el.innerText);
      group1.appendChild(todayDate);
      details.appendChild(group1);
      el.parentNode.parentNode.insertBefore(
        details,
        el.parentNode.parentNode.childNodes[0]
      );
    // }





    var todaysEvents = this.events.reduce(function(memo, ev) {
      if (ev.date.isSame(day, "day")) {
        memo.push(ev);
      }

      return memo;
    }, []);

    this.renderEvents(todaysEvents, details);

    // arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + "px";
  };









  // Calendar Render

  Calendar.prototype.renderEvents = function(events, ele) {
    //Remove any events in the current details element
    var currentWrapper = ele.querySelector(".events");
    var wrapper = createElement(
      "div",
      "events in" + (currentWrapper ? " new" : "")
    );

    events.forEach(function(ev) {
      var div = createElement("div", "event");
      var group1 = createElement("div", "eventgroup");
      var group2 = createElement("div", "eventgroup");
      var square = createElement("div", "event-category " + ev.color);
      var span = createElement("span", "", ev.eventName);
      var del = createElement("button", "delBTN", "x");
      group1.appendChild(square);
      group1.appendChild(span);
      group2.appendChild(del);
      div.appendChild(group1);
      div.appendChild(group2);
      del.addEventListener("click", function() {
        delEvent(ev);
      });
      wrapper.appendChild(div);
    });

    if (!events.length) {
      var div = createElement("div", "event empty");
      var span = createElement("span", "", "No Events");
      div.appendChild(span);
      wrapper.appendChild(div);
    }

    if (currentWrapper) {
      currentWrapper.className = "events out";
      currentWrapper.addEventListener("webkitAnimationEnd", function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });

      currentWrapper.addEventListener("animationend", function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });

      currentWrapper.addEventListener("msAnimationEnd", function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });

      currentWrapper.addEventListener("animationend", function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
    } else {
      ele.appendChild(wrapper);
    }
  };









  //Calling Function of Legend

  Calendar.prototype.drawLegend = function() {
    
    
    
    var legend = createElement("div", "legend");
    var calendars = this.events
      .map(function(e) {
        return e.calendar + "|" + e.color;
      })
      .reduce(function(memo, e) {
        if (memo.indexOf(e) === -1) {
          memo.push(e);
        }
        return memo;
      }, [])


      .forEach(function(e) {
        var parts = e.split("|");
        var entry = createElement("span", "entry " + parts[1], parts[0]);
        legend.appendChild(entry);
      });



    var legendDOM = document.getElementsByClassName("legend");
    if (legendDOM.length != 0) {
      this.el.replaceChild(legend, legendDOM[0]);
    } else {
      this.el.appendChild(legend);
    }
  };


  //Calling The Button Function 
  Calendar.prototype.drawButton = function() {
    var addBTN = document.querySelector(".addBTN");
    if (addBTN == null) {
      addBTN = createElement("div", "addBTN");
      addBTN.addEventListener("click", function() {
        toggleForm();
      });
    }
    this.el.appendChild(addBTN);
  };






  //Calling The Next Month Function
  Calendar.prototype.nextMonth = function() {
    this.current.add(1, "months");
    this.next = true;

    this.draw();
    closeForm();

    var self = this;
    window.setTimeout(function() {
      var today = document.querySelector(".today");
      var first = document.querySelector(".day:not(.other)");
      if (today) {
        window.setTimeout(function() {
          self.openDay(today);
        }, 500);
      } else {
        window.setTimeout(function() {
          self.openDay(first);
        }, 500);
      }
    }, 500);
  };




  //Calling The Previous Month Function
  Calendar.prototype.prevMonth = function() {
    this.current.subtract(1, "months");
    this.next = false;

    this.draw();
    closeForm();
    var self = this;
    window.setTimeout(function() {
      var today = document.querySelector(".today");
      var first = document.querySelector(".day:not(.other)");
      if (today) {
        window.setTimeout(function() {
          self.openDay(today);
        }, 500);
      } else {
        window.setTimeout(function() {
          self.openDay(first);
        }, 500);
      }
    }, 500);
  };



  // Head Start
  window.Calendar = Calendar;


  // calling out the classes, id's and innerText
  function createElement(tagName, className, innerText) {
    var ele = document.createElement(tagName);
    if (className) {
      ele.className = className;
    }

    if (innerText) {
      ele.innerText = ele.textContent = innerText;
    }
 
    return ele;
  }
  
  // Usage for the event category
  var eventName = document.myForm.eventName.value;
  var eventType = document.myForm.eventType.value;
  var eventColor = "";
  var eventDate = document.myForm.eventDate.value;



  //Each Time into the color
  switch (eventType) {

    case "Event":
      eventColor = "orange";
      break;
    
    case "Wedding":
      eventColor = "blue";
      break;
    
    case "Party":
      eventColor = "yellow";
      break;

    case "Birthday":
        eventColor = "red";
      break;

    default:
      eventColor = "green";
      break;
  
  }
  

  // Storing each category into the local data
  //UPDATE --> Connect it with SQL/ JSON 

  var data = JSON.parse(localStorage.getItem("data"));


  //When the data is null --> nothing will be stored in there ! 

  if (data === null) 
  {
    data = [];
    window.location.href = "localstorage.php";
  }
  
  //Only the required data will be stored under these conditions !
  //Within the object  
  if (eventName != "" && eventType != "" && eventColor != "" && eventDate != "")
  {
    data.push({
      eventName: eventName,
      calendar: eventType,
      color: eventColor,
      date: eventDate
  });
  }
  



  for (var a of data) 
  {
    console.log(a);
  }

  //localStorage.setItem("data", JSON.stringify(data));


  //An example of 

  /*var data = [
		    	{eventName: 'Chill Wedding', calendar: 'Wedding', color: 'blue', date: '2019-06-25'}
		    ];*/

  function delEvent(events) {
    var a = data.indexOf(events);
    var b = confirm(
      "Confirm to remove event with information: \nTitle: " +
        events.eventName +
        "\nType: " +
        events.calendar +
        "\nDate: " +
        events.date._i +
        "?"
    );

    if (b) {
      var c = data.splice(a, 1);
    
      /*for(var z in data)
      {
        console.log(z);
      }
      */

    localStorage.setItem("data", JSON.stringify(data));
          

    //Confirmation of the deleted details

      for (var a of data) {
        console.log(a);
      }
          var calendar = new Calendar("#calendar", data);
          if (c) {
            alert("Event deleted successfully !");
          } else {
            alert("Failed to delete event !");
          }
        } else {
          //alert("Cancelled deletion");
        }
      }

      var calendar = new Calendar("#calendar", data);

      // document.myForm.eventName.value = "";
      // document.myForm.eventType.value = "";
      // document.myForm.eventDate.value = "";

      toggleForm();
    }













// Getting the Customer from the database

function showUser()
{ 
  var xhttp;

  if(string == "")
  {
    document.getElementById("").innerHTML = "";
    return;
  }

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
      document.getElementById("").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", ".php?q="+string,true);
  xhttp.send();

}

// Inserting the Events to the database

// $("").submit(function(e){
//     e.preventDefault();

//     $.post(
//         'calendar-insert-data.php',
//           $("form : input").serializeArray(),
//         function(result)
//         {
//           if(result === "success")
//           {
//             $("#result").html("Successful Entry");
//           }
//           else
//           {

//           }

//         }

//     )

// })

// Adding event to database

function addEventsToData()
{
  var valueEventName = document.getElementById("eventName").value;
  var valueEventType = document.getElementById("eventType").value;
  var valueDate = document.getElementById("eventDate").value;
  
  var xhttpr = new XMLHttpRequest();
  
  xhttpr.onreadystatechange = function()
  {
       if(this.readyState == 4 && this.status == 200)
       {
         document.getElementById("").innerHTML = this.responseText;
       }
  };
  
  xhttpr.open("POST", "calendar-insert-data.php",true);
  xhttpr.send();


}



