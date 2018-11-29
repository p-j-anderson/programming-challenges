const reverse = require('./stringReverse')

/** reduce tests */
test('reverse.reduce "hello world" to "dlrow olleh"', () => {
  expect(reverse.reduce('hello world')).toBe('dlrow olleh')
})

/** recursive tests */
test('reverse.recursive "hello world" to "dlrow olleh"', () => {
  expect(reverse.recursive('hello world')).toBe('dlrow olleh')
})

/** whileLoop tests */
test('reverse.whileLoop "hello world" to "dlrow olleh"', () => {
  expect(reverse.whileLoop('hello world')).toBe('dlrow olleh')
})

/** forLoop tests */
test('reverse.forLoop "hello world" to "dlrow olleh"', () => {
  expect(reverse.forLoop('hello world')).toBe('dlrow olleh')
})