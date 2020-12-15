console.log('Hello world!');

let lucky: number;
lucky = 23;

interface Person {
    first: string;
    last: string;
}

const person: Person = {
    first: 'Jeff',
    last: 'Bridges'
}

function pow(x: number, y: number): number {
    return Math.pow(x, y);
}

function pow2(x: number, y: number): void {
    Math.pow(x, y);
}

const arr:number[] = [];

document.addEventListener('DOMContentLoaded', function(event: Event) { 
    console.log(event);

    document.addEventListener('dblclick', function(e: MouseEvent) {
        console.log(e);        
    });
});

