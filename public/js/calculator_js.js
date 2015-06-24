"use strict";
// var buttons = document.getElementsByClassName("btn");
var numerals = document.getElementsByClassName("numeral");
var operators = document.getElementsByClassName("operator");

// This is iterating through the array of numeral buttons, and then adding a click event
// listener to each, and then adding whatever the value stored in the numeral button into
// the inner html of the input.

for (var i = 0; i < numerals.length; i++) {
	numerals[i].addEventListener('click', numeralClick, false);
}

function numeralClick () {
	if (document.getElementById("operator").value == "") {
		document.getElementById("initialdisplay").value += this.innerHTML;
	} else {
		document.getElementById("secondaryinput").value += this.innerHTML;
	}
}

// This is iterating an array of operator values, adding an click event listener to each
// operator button, and then assigning a function call to take the value of the operator
// and add it to the inner HTML of the operator input.

for (var i = 0; i < operators.length; i++) {
	operators[i].addEventListener('click', operatorClick, false);
}

function operatorClick () {
	document.getElementById("operator").value = this.innerHTML;
}

// This is a clear function that resets the values of my inputs back to null.

var clear = function () {
	document.getElementById("initialdisplay").value = "";
	document.getElementById("secondaryinput").value = "";
	document.getElementById("operator").value = "";
}
document.getElementById("clear").addEventListener('click', clear, false);

// this should run a function that parses' the input values from the button click events, converts them into
// numbers and the evaluates a solution based on the mathematical operator being used. It should simultaneously
// clear the secondary input value, while entering the resultant value into the primary input field, leaving
// operator value in place, allowing you to then increment with a new secondary operand value.

var equals = function () {
	var inputOne = document.getElementById("initialdisplay").value;
	var inputTwo = document.getElementById("secondaryinput").value;
	var evaluate = (parseFloat(inputOne) + parseFloat(inputTwo));
	var subtract = (parseFloat(inputOne) - parseFloat(inputTwo));
	var multiply = (parseFloat(inputOne) * parseFloat(inputTwo));
	var division = (parseFloat(inputOne) / parseFloat(inputTwo));

	if (document.getElementById("secondaryinput").value !== "") {
		if (document.getElementById("operator").value == "+") {
			document.getElementById("initialdisplay").value = evaluate;
			document.getElementById("secondaryinput").value = "";
		} else if (document.getElementById("operator").value == "-") {
			document.getElementById("initialdisplay").value = subtract;
			document.getElementById("secondaryinput").value = "";
		} else if (document.getElementById("operator").value == "*") {
			document.getElementById("initialdisplay").value = multiply;
			document.getElementById("secondaryinput").value = "";
		} else if (document.getElementById("operator").value == "/") {
			document.getElementById("initialdisplay").value = division;
			document.getElementById("secondaryinput").value = "";
		}
	} else {
		clear();
	}
}
document.getElementById("equal").addEventListener('click', equals, false);