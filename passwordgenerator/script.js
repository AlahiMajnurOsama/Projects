// Selecting elements for each of the input and out tags----------->

const symbolsElement = document.getElementById("includeSymbols");
const numbersElement = document.getElementById("includeNumbers");
const uppercaseElement = document.getElementById("includeUppercase");
const charLengthElement = document.getElementById("charLength");
const showPass = document.getElementById("showPassword");

// Creating an array for each different character and storing in a const variable------------>

const UPPERCASE_LETTER_CODES = charArrayFromLowToHigh(65, 90); // for uppercase letter
const LOWERCASE_LETTER_CODES = charArrayFromLowToHigh(97, 122); // for lowercase letters
const NUMBER_CODES = charArrayFromLowToHigh(48, 57); // for numbers
const SYMBOL_CODES = charArrayFromLowToHigh(33, 47)
  .concat(charArrayFromLowToHigh(58, 64))
  .concat(charArrayFromLowToHigh(91, 96))
  .concat(charArrayFromLowToHigh(123, 126)); // for all special character

//function to copy the Password---------------------->

function copyPassword() {
  const copyText = document.getElementById("showPassword");
  navigator.clipboard.writeText(copyText.innerText);
  launch_notification();
  event.preventDefault();
}

//function to update the range slider value--------------->

function rangeSlider(value) {
  document.getElementById("lengthValue").innerHTML = value;
}

//function to generate random password---------------------->

function generatedPass() {
  var charLength = charLengthElement.value;
  //   console.log(charLength);
  var charCodes = LOWERCASE_LETTER_CODES;
  if (symbolsElement.checked) charCodes = charCodes.concat(SYMBOL_CODES);
  if (numbersElement.checked) charCodes = charCodes.concat(NUMBER_CODES);
  if (uppercaseElement.checked) {
    charCodes = charCodes.concat(UPPERCASE_LETTER_CODES);
  }
  //   console.log(charCodes);
  const Password = [];

  for (let i = 0; i < charLength; i++) {
    const character = charCodes[Math.floor(Math.random() * charCodes.length)];
    // console.log(character);
    console.log(String.fromCharCode(character));
    Password.push(String.fromCharCode(character));
  }

  showPass.innerText = Password.join("");

  //   console.log(Password);
}

// Function to generate array from low value to high ------------>

function charArrayFromLowToHigh(low, high) {
  const array = [];
  for (let i = low; i <= high; i++) {
    array.push(i);
  }
  return array;
}

// Toast (Notification) show function

launch_notification = () => {
  let notification = document.getElementById("toast");
  notification.className = "show";
  setTimeout(() => {
    notification.className = notification.className.replace("show", "");
  }, 4000);
};
