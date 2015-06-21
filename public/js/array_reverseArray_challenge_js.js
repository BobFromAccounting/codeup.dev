"use strict";
(function () {
	function reverseArray(array) {
		for (var i = 0; i < array.length; i++) {
			array.splice(0, 0, array[i]);
			array.splice((i + 1), 1);
		};
		console.log(array);
		
	}

	var test1 = ['a', 'b', 'c'];

	var test1Reverse = reverseArray(test1)
})();