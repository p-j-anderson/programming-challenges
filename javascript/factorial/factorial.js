const recursive = x => {
  if (x > 1) return x * recursive(x - 1)
  return x
}

const whileLoop = x => {
  let factorial = 1

  while (x > 1) {
    factorial *= x
    x--
  }

  return factorial
}

const forLoop = x => {
  let factorial = 1

  for (x; x > 1; x--) {
    factorial *= x
  }

  return factorial
}

module.exports = {
  recursive,
  whileLoop,
  forLoop
}
