interface DetailStatesString {
    status: string,
    brand: string,
    category: string,
    color: string,
    template: string,
    supplier: string,
    shop: string,
}

interface DetailStatesNum {
    purchasePrice: number,
    sellingPrice: number,
}

interface DetailStatesArray {
    labels:{
        label: string
        labelValue: string
    }[]
}

// 一旦表示確認のためにラベルを仮代入
const DetailStatesString: DetailStatesString = {
    status: '',
    brand: '',
    category: '',
    color: '',
    template: '',
    supplier: '',
    shop: '',
}

const DetailStatesNum: DetailStatesNum = {
    purchasePrice: 0,
    sellingPrice: 0,
}

const DetailStatesArray: DetailStatesArray = {
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
}

export default {
    DetailStatesString,
    DetailStatesNum,
    DetailStatesArray
}

