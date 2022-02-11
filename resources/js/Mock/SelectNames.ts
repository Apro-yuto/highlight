interface SlectNames {
  statuses: Array<string>
  brands: Array<string>
  categories: Array<string>
  colors: Array<string>
  suppliers: Array<string>
  shops: Array<string>
}

// バックエンドから値を取得するが一旦、手入力
const SlectNames: SlectNames = {
  statuses: ['入荷済', '出荷済'],
  brands: ['アディダス', 'ナイキ'],
  categories: ['上着', '下着'],
  colors: ['黒', '白'],
  suppliers: ['HandM', 'Wego'],
  shops: ['ユニクロ', 'GU'],
}

export default SlectNames
