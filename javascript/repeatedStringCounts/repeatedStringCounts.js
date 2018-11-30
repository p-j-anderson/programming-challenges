/**
 * Duplicate a given string(str) N(n) times
 * and count the occurrences of character(x)
 *
 * HackerRank Challenge: https://www.hackerrank.com/challenges/repeated-string/problem
 *
 * str - String to be repeating
 * n   - Number of times to repeat the string
 * x   - Character to count
 */
const forLoop = (str, n, x) => {
  const regex = new RegExp(x, 'g')
  const counter = s => (s.match(regex) || []).length

  // Count the main str
  str = (str.length > n ? str.slice(0, n) : str)
  const mainCount = counter(str)
  const multiplier = Math.floor(n / str.length)

  // Check for a remainder
  let remainderCount = 0
  if (str.length < n) {
    remainderCount = counter(str.slice(0, n % str.length))
  }
  
  return (mainCount * multiplier) + remainderCount
}

module.exports = {
  forLoop
}