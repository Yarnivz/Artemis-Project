var data = [];
var eventNameElement = document.querySelectorAll(".eventName");
var eventTypeElement = document.querySelectorAll(".eventType");
var eventDateElement = document.querySelectorAll(".eventDate");


for(var i = 0; i < eventNameElement.length; i++) {
    var eventName = eventNameElement[i].innerHTML;
    var eventType = eventTypeElement[i].innerHTML;
    var eventColor = "";
    var eventDate = eventDateElement[i].innerHTML;
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
    data.push({
        eventName: eventName,
        calendar: eventType,
        color: eventColor,
        date: eventDate
    });
}

localStorage.setItem("data", JSON.stringify(data));
window.location.href = "calendar.php";