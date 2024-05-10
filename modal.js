
// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("addButton");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

$(document).ready(function(){
  // Get the modal
  var addModal = $("#myModal");
  var updateModal = $("#updateModal");

  // Get the button that opens the modal
  var addButton = $("#addButton");

  // Get the <span> element that closes the modal
  var closeSpan = $(".close");

  // When the user clicks the "Add" button, open the add modal
  addButton.click(function() {
      addModal.css("display", "block");
  });

  // When the user clicks on <span> (x), close the add modal
  closeSpan.click(function() {
      addModal.css("display", "none");
  });

  // When the user clicks anywhere outside of the add modal, close it
  window.onclick = function(event) {
      if (event.target == addModal[0]) {
          addModal.css("display", "none");
      }
  };

  // Add similar functionalities for update modal
  var updateButton = $(".updateButton");
  var updateCloseSpan = $("#updateClose");

  updateButton.click(function() {
      updateModal.css("display", "block");
  });

  updateCloseSpan.click(function() {
      updateModal.css("display", "none");
  });

  window.onclick = function(event) {
      if (event.target == updateModal[0]) {
          updateModal.css("display", "none");
      }
  };
});

