const factorial = require('./factorial')

/** recursive tests */
test('factorial.recursive 5 to equal 120', () => {
  expect(factorial.recursive(5)).toBe(120)
})

test('factorial.recurise 10 to equal 3628800', () => {
  expect(factorial.recursive(10)).toBe(3628800)
})

/** whileLoop tests */
test('factorial.whileLoop 5 to equal 120', () => {
  expect(factorial.whileLoop(5)).toBe(120)
})

test('factorial.while 10 to equal 3628800', () => {
  expect(factorial.whileLoop(10)).toBe(3628800)
})

/** forLoop tests */
test('factorial.forLoop 5 to equal 120', () => {
  expect(factorial.whileLoop(5)).toBe(120)
})

test('factorial.forLoop 10 to equal 3628800', () => {
  expect(factorial.whileLoop(10)).toBe(3628800)
})