const reduce = str => str.split('').reduceRight((acc, cur) => acc + cur)

const recursive = str => {
  const letter = str.slice(-1)
  const remainder = str.slice(0, -1)
  if (letter) return letter + recursive(remainder)
  return ''
}

const whileLoop = str => {
  let newStr = ''
  while (str.length > 0) {
    newStr += str.slice(-1)
    str = str.slice(0, -1)
  }
  return newStr
}

const forLoop = str => {
  let newStr = ''
  for (let i = str.length - 1; i >= 0; i--) {
    newStr += str.charAt(i)
  }
  return newStr
}

module.exports = {
  reduce,
  recursive,
  whileLoop,
  forLoop
}
