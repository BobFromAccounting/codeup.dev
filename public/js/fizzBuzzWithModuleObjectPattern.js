"use strict";

var myFizzBuzz = (function () {
    
    var counter = 1;

    var limit = 100;

    return {
        incrementCounter: function () {
            counter += 1
            return myFizzBuzz.displayCounter();
        },
        displayCounter: function () {
            if (counter < limit) {
                if (counter % 5 == 0 && counter % 3 == 0) {
                    console.log("fizzbuzz");
                } else if (counter % 5 == 0) {
                    console.log("buzz");
                } else if (counter % 3 == 0) {
                    console.log("fizz");
                } else {
                    console.log(counter);
                }
                myFizzBuzz.incrementCounter();
            }
        }
    };
})();