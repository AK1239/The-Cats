let i = 5;
let secondElement = document.getElementById("timeSec");
console.log(secondElement);

function decreaseValue() {
  secondElement.innerHTML = i;

  console.log(secondElement.innerHTML);

  i--;
  if (i > -1) {
    setTimeout(decreaseValue, 1000); // 1000 milliseconds = 1 second
  }
  if (i == -1) {
    window.location.href = "home.php";
  }
}

decreaseValue();

console.log(secondElement.innerHTML);
