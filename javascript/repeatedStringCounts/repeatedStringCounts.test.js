const repeatedStringCounts = require('./repeatedStringCounts')

/** forLoop tests */
test('repeatedStringCounts.forLoop (aba, 10, a) to equal 7', () => {
  expect(repeatedStringCounts.forLoop('aba', 10, 'a')).toBe(7)
})

test('repeatedStringCounts.forLoop (a, 1000000000000, a) to equal 1000000000000', () => {
  expect(repeatedStringCounts.forLoop('a', 1000000000000, 'a')).toBe(1000000000000)
})

test('repeatedStringCounts.forLoop (ababa, 3, a) to equal 2', () => {
  expect(repeatedStringCounts.forLoop('ababa', 3, 'a')).toBe(2)
})