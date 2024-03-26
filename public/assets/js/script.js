var btn_today_agent_asuransi = document.getElementById("btn_today_agent_asuransi");
var btn_tweek_agent_asuransi = document.getElementById("btn_tweek_agent_asuransi");
var btn_tmonth_agent_asuransi = document.getElementById("btn_tmonyh_agent_asuransi");

// Javascript untuk ganti2 halaman dibawah ini.
// function clickButton1() {
//     document.getElementById("nav-button-1").click();
//   }

// function clickButton2() {
// document.getElementById("nav-button-2").click();
// }

// function alternateClicks() {
//     clickButton1();
//     setTimeout(clickButton2, 8000); // Click button2 after 8 seconds
// }

// setInterval(alternateClicks, 16000); // Repeat the cycle every 16 seconds


// js for dropdown menu

// const dropdownMenu = document.querySelector('.dropdown-menu');
// const dropdownToggle = document.querySelector('.dropdown-toggle');

// dropdownMenu.addEventListener('click', function(event) {
//   const selectedItem = event.target.textContent;  // Get text content of clicked item
//   dropdownToggle.textContent = `Current: ${selectedItem}`;  // Update button text
//   dropdownToggle.classList.add('active');  // Add "active" class for styling (optional)
// });


//v2
// const dropdownToggle = document.getElementById("the-dropdown-menu");

// dropdownToggle.addEventListener('click', function(event) {
//   // Get the clicked dropdown item element
//   const clickedItem = event.target.nextElementSibling; // Assuming the item is the next sibling
//   if (clickedItem && clickedItem.classList.contains('dropdown-item')) {
//     const selectedItem = clickedItem.textContent;
//     dropdownToggle.textContent = `Current: ${selectedItem}`;
//     // dropdownToggle.classList.add('active');
//   }
// });

// v3
const dropdownMenu = document.getElementById('the-dropdown-menu');

dropdownMenu.addEventListener('click', function(event) {
    const clickedItem = event.target;
    if (clickedItem.classList.contains('dropdown-item')) {
      const selectedPartner = clickedItem.dataset.partner;
      // Call a function to handle filtering based on partner (explained later)
      handlePartnerFilter(selectedPartner);
    }
  });
