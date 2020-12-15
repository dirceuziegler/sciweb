"use strict";
require('jquery');
console.log('Hello world!');
let lucky;
lucky = 23;
const person = {
    first: 'Jeff',
    last: 'Bridges'
};
function pow(x, y) {
    return Math.pow(x, y);
}
function pow2(x, y) {
    Math.pow(x, y);
}
const arr = [];
document.addEventListener('DOMContentLoaded', function (event) {
    console.log(event);
    document.addEventListener('dblclick', function (e) {
        console.log(e);
    });
    $('div').on('click', () => {
        console.log('Click');
    });
});
