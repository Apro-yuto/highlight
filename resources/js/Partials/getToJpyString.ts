const getToJpyString = (beforeFormatNumber: number) => {
  const formatter = new Intl.NumberFormat('ja-JP', {
    style: 'currency',
    currency: 'JPY',
  })

  return formatter.format(beforeFormatNumber)
}

export default getToJpyString
