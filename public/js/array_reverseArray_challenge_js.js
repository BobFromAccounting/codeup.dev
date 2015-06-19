"use strict";
(function () {
	var array = [];

	function reverseArray() {
			
		for (var i = 0; i < 6; i++) {
			var number = i;
			function init(i) {
				var initArray = (i % 2 == 0) ? "Array:" : "Reverse Array:";				
				console.log(initArray)
			}
			function arrayRev(number) {
				// var Splice = array.splice(0, 3, "c", "b", "a");

				if (number == 0) {
					array.unshift("a");
					console.log(array);
				} else if (number == 1) {
					console.log(array);
				} else if (number == 2) {
					array.push("b", "c");
					console.log(array);
				} else if (number == 3) {
					array.shift();
					array.pop();
					array.push("a");
					array.unshift("c");
					console.log(array);
				} else if (number == 4) {
					array.shift();
					array.pop();
					array.unshift("a")
					array.push("c", "d", "e")
					console.log(array);
				} else if (number == 5) {
					array.splice(array.indexOf("a"), 5, "e", "d", "c", "b", "a");
					console.log(array);
				}
			}

			init(i);
			arrayRev(i);
			}
	}

	reverseArray()
})();