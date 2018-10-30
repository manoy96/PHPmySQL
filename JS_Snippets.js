/* Variables - containers that store values */

var myVariable  // declared a variable, but not initialized

let thisVariable = 'Thor' // declared AND initialized a variable

//var ANSWER = 42 old way of doing 'constants'.  Don't do this.

const ANSWER = 42

// String

let string1 = 'Hello World!' // look up the difference betwen string literals and using a constructor

let string2 = new String('Hello World!')

// Number

let thisNum = 3.14159

// Boolean

let thisBool = true;

// Equality vs Strict Equality == or ===

let result = ANSWER + 84 + false + '9000'  // example of type coercion

'1' == 1 // true *don't use this type of equality checking
'1' === 1 // false *This is the equality checking I want

// Array

let minArray = []

let myArray = [42, 'Bob', result, thisBool, false] // arrays hold most anything

// Object

let minimalObject = {}

let myCar = {
  make: 'Chevrolet',
  color: 'Red',
  year: '1965',
  vin: '298734981238731h283udis',
}

const anotherObject = {
  list: ['foo', 'boo', 'bar'],
  car: 'McLaren',
}

// Arrow functions

const carColor = () => myCar.color // minimal arrow function with no parameters and implied return

const carColor2 = () => { // this one uses the explicit return statement inside curly braces
  return myCar.color
}

const carColor3 = (foo) => foo.car // example using single parameter with parentheses

// Array Helper method 'map'

let films = [
		"https://swapi.co/api/films/",
		"https://swapi.co/api/films/5/",
		"https://swapi.co/api/films/4/this one is longer",
		"https://swapi.co/api/films/6/",
		"https:",
		"https://swapi.co/api/films/1/"
	]



const filmLengths = films.map(film => film.length) // new array created holding all of the lengths of the strings in the films array
//map functions return an array

let nums = [45, 32, 12, 59, 23]

const numsBy2 = nums.map(num => num * 2) // new array contains the nums values all multiplied by 2

// Reduce example

const pilots = [
  {
    id: 10,
    name: "Poe Dameron",
    years: 14,
  },
  {
    id: 2,
    name: "Temmin 'Snap' Wexley",
    years: 30,
  },
  {
    id: 41,
    name: "Tallissan Lintra",
    years: 16,
  },
  {
    id: 99,
    name: "Ello Asty",
    years: 22,
  }
]

const totalYears = pilots.reduce((acc, pilot) => acc + pilot.years, 0)  // Reduce adding up the years into the accumulator
//acc "accumulator" 
//"0" is the value that "acc" begins at


const mostExpPilot = pilots.reduce((oldest, pilot) => {  
  return (oldest.years || 0) > pilot.years ? oldest : pilot
}, {}) // This is the real power of reduce to return any type of data you want
//ternary value
//"?" means 

// Filter method example

const pilots2 = [
  {
    id: 2,
    name: "Wedge Antilles",
    faction: "Rebels",
  },
  {
    id: 8,
    name: "Ciena Ree",
    faction: "Empire",
  },
  {
    id: 40,
    name: "Iden Versio",
    faction: "Empire",
  },
  {
    id: 66,
    name: "Thane Kyrell",
    faction: "Rebels",
  }
]

const rebels = pilots2.filter(pilot => pilot.faction === "Rebels");
const empire = pilots2.filter(pilot => pilot.faction === "Empire");

// Now we combine map, reduce, and filter

var personnel = [
  {
    id: 5,
    name: "Luke Skywalker",
    pilotingScore: 98,
    shootingScore: 56,
    isForceUser: true,
  },
  {
    id: 82,
    name: "Sabine Wren",
    pilotingScore: 73,
    shootingScore: 99,
    isForceUser: false,
  },
  {
    id: 22,
    name: "Zeb Orellios",
    pilotingScore: 20,
    shootingScore: 59,
    isForceUser: false,
  },
  {
    id: 15,
    name: "Ezra Bridger",
    pilotingScore: 43,
    shootingScore: 67,
    isForceUser: true,
  },
  {
    id: 11,
    name: "Caleb Dume",
    pilotingScore: 71,
    shootingScore: 85,
    isForceUser: true,
  },
]

// Our objective: get the total score of force users only
// First, we need to filter out the personnel who can’t use the force:

let jediPersonnel = personnel.filter(person => person.isForceUser)

// We now need to create an array containing the total score of each Jedi.
let jediScores = jediPersonnel.map(jedi => jedi.pilotingScore + jedi.shootingScore)

// And let’s use reduce to get the total:
let totalJediScore = jediScores.reduce((acc, score) => acc + score, 0)
//filter: takes a function that returns true or false. if true it's added t a new array. returns a new 
//map: creates new array
//reduce: accumulates a value based on what was returned from the provide function. 


// All of these separate statements can be chained together with dot notation
const totalJediScoreChained = personnel
  .filter(person => person.isForceUser)
  .map(jedi => jedi.pilotingScore + jedi.shootingScore)
  .reduce((acc, score) => acc + score, 0)

// or, made even more concise with just the reduce function and the ternary operator:

const totalJediScoreReduced = personnel.reduce((acc, person) => person.isForceUser ? acc + person.pilotingScore + person.shootingScore : acc, 0)