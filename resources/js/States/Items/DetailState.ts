interface DetailStates {
    status: string,
    brand: string,
    category: string,
    color: string,
    template: string,
    supplier: string,
    shop: string,
    labels: Array<object>,
    purChasePrice: number,
    sellingPrice: number,
}


// 一旦表示確認のためにラベルを仮代入
const DetailStates = {
    status: '',
    brand: '',
    category: '',
    color: '',
    template: '',
    supplier: '',
    shop: '',
    labels: [
      { label: 'ラベル1', labelValue: '値2' },
      { label: 'ラベル2', labelValue: '値2' },
      { label: 'ラベル3', labelValue: '値3' },
      { label: 'ラベル4', labelValue: '値4' },
      { label: 'ラベル5', labelValue: '値5' },
      { label: 'ラベル6', labelValue: '値6' },
      { label: 'ラベル7', labelValue: '値7' },
      { label: 'ラベル8', labelValue: '値8' },
    ],
    purChasePrice: 0,
    sellingPrice: 0,
  }

  export default DetailStates