import React, { useState } from 'react'
import {
  Typography,
  Box,
  Card,
  CardMedia,
  Button,
  Grid,
  SelectChangeEvent,
  TextField,
} from '@mui/material'
import KeyboardArrowLeftIcon from '@mui/icons-material/KeyboardArrowLeft'
import KeyboardArrowRightIcon from '@mui/icons-material/KeyboardArrowRight'
import SelectBox from '@/js/components/SelectBox'
import PriceInput from '@/js/components/PriceInput'
import FormDialog from '@/js/components/FormDialog'
import LabelFormDialog from '@/js/components/LabelFormDialog'
import LabelInput from '@/js/components/LabelInput'

interface Props {
  id: number
}

interface Labels {
  label: string
  labelValue: string
}

const Detail: React.VFC<Props> = (props) => {
  const statusTitle = 'ステータス'
  const purchasePriceTitle = '仕入れ値'
  const sellingPriceTitle = '売値'
  const shopTitle = '販売先'
  const supplierTitle = '購入元'
  const brandTitle = 'ブランド'
  const categoryTitle = 'カテゴリ'
  const colorTitle = '色'

  // バックエンドから値を取得するが一旦、手入力
  const statusNames: Array<string> = ['入荷済', '出荷済']

  // バックエンドから値を取得するが一旦、手入力
  const brandNames: Array<string> = ['アディダス', 'ナイキ']

  // バックエンドから値を取得するが一旦、手入力
  const categoryNames: Array<string> = ['上着', '下着']

  // バックエンドから値を取得するが一旦、手入力
  const colorNames: Array<string> = ['黒', '白']

  const suppliers: Array<string> = ['HandM', 'Wego'];

  const shops: Array<string> = ['ユニクロ', 'GU'];

  const [states, setStates] = useState({
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
  })

  // 追加機能は別ブランチ対応だが、書いてしまったのでとりあえず残しておく
  // const addLabels = (event:any) => {
  //     setStates({...states, labels:[
  //         ...states.labels,
  //         {
  //             label: event.target.value,
  //             labelValue: event.target.value
  //         }
  //     ]})
  // }

  const handleStatusChange = (event: SelectChangeEvent) => {
    setStates({ ...states, status: event.target.value })
  }

  const handleBrandChange = (event: SelectChangeEvent) => {
    setStates({ ...states, brand: event.target.value })
  }

  const handleCategoryChange = (event: SelectChangeEvent) => {
    setStates({ ...states, category: event.target.value })
  }

  const handleColorChange = (event: SelectChangeEvent) => {
    setStates({ ...states, color: event.target.value })
  }

  const handleTemplateChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setStates({ ...states, template: event.target.value })
  }

  const handleSupplierChange = (event: SelectChangeEvent) => {
    setStates({ ...states, supplier: event.target.value })
  }

  const handleShopChange = (event: SelectChangeEvent) => {
    setStates({ ...states, shop: event.target.value })
  }

  const handlePurChasePriceChange = (
    event: React.ChangeEvent<HTMLInputElement>,
  ) => {
    if (isNaN(Number(event.target.value))) return
    if (!Number.isSafeInteger(Number(event.target.value))) return
    setStates({ ...states, purChasePrice: Number(event.target.value) })
  }

  const handleSellingPriceChange = (
    event: React.ChangeEvent<HTMLInputElement>,
  ) => {
    if (isNaN(Number(event.target.value))) return
    if (!Number.isSafeInteger(Number(event.target.value))) return
    setStates({ ...states, sellingPrice: Number(event.target.value) })
  }

  return (
    <>
      <Button href="/item" startIcon={<KeyboardArrowLeftIcon />}>
        商品一覧
      </Button>
      <Grid container mt={2}>
        <Grid item xs={12} lg={6}>
          <Grid item xs={12} lg={11}>
            <Card>
              <CardMedia
                component="img"
                image="https://placehold.jp/150x150.png"
                alt="dammy-img"
              />
            </Card>
            <Box component="div" mt={2}>
              <SelectBox
                title={statusTitle}
                selectNames={statusNames}
                state={states.status}
                onChange={handleStatusChange}
              />
            </Box>
          </Grid>
        </Grid>
        <Grid item xs={12} lg={6} sx={{ mt: { xs: 6, lg: 0 } }}>
          <Typography
            variant="h5"
            component="h3"
            pb={1}
            sx={{ borderBottom: '1px solid' }}
          >
            商品名{props.id}
          </Typography>
          <Box component="div" mt={3}>
            <PriceInput
              title={purchasePriceTitle}
              price={states.purChasePrice}
              onChange={handlePurChasePriceChange}
            />
          </Box>
          <Box component="div" mt={3}>
            <PriceInput
              title={sellingPriceTitle}
              price={states.sellingPrice}
              onChange={handleSellingPriceChange}
            />
          </Box>
          <Box component="div" mt={3}>
            <SelectBox
              title={shopTitle}
              selectNames={shops}
              state={states.supplier}
              onChange={handleSupplierChange}
            />
          </Box>
          <Box component="div" mt={3}>
            <SelectBox
              title={supplierTitle}
              selectNames={suppliers}
              state={states.shop}
              onChange={handleShopChange}
            />
          </Box>
          <Box component="div" mt={4}>
            <SelectBox
              title={brandTitle}
              selectNames={brandNames}
              state={states.brand}
              onChange={handleBrandChange}
            />
            <Box component="div" sx={{ textAlign: 'right' }}>
              <FormDialog title={brandTitle} />
            </Box>
          </Box>
          <Box component="div">
            <SelectBox
              title={categoryTitle}
              selectNames={categoryNames}
              state={states.category}
              onChange={handleCategoryChange}
            />
            <Box component="div" sx={{ textAlign: 'right' }}>
              <FormDialog title={categoryTitle} />
            </Box>
          </Box>
          <Box component="div">
            <SelectBox
              title={colorTitle}
              selectNames={colorNames}
              state={states.color}
              onChange={handleColorChange}
            />
          </Box>
        </Grid>
      </Grid>
      <Grid container mt={6}>
        <Grid
          item
          sx={{
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
          }}
        >
          <Typography variant="h5" component="h2" mr={2}>
            ラベル
          </Typography>
          <LabelFormDialog title="ラベル" />
        </Grid>
        <Grid container mt={3} columnSpacing={1}>
          {states.labels.map((label: Labels, index: number) => (
            <LabelInput
              key={index}
              label={label.label}
              labelValue={label.labelValue}
            />
          ))}
        </Grid>
      </Grid>
      <Grid container mt={6}>
        <Grid item xs={12}>
          <Typography variant="h5" component="h2">
            商品紹介文
          </Typography>
        </Grid>
        <Grid item xs={12} sx={{ textAlign: 'right' }} mt={3}>
          <Button href="/item" endIcon={<KeyboardArrowRightIcon />}>
            ベーステンプレートを確認する
          </Button>
        </Grid>
        <Grid item xs={12}>
          <TextField
            multiline
            rows={10}
            fullWidth
            onChange={handleTemplateChange}
          />
        </Grid>
        <Grid
          item
          xs={12}
          sx={{ display: 'flex', justifyContent: 'right' }}
          mt={3}
        >
          <Box component="div">
            <Button variant="contained">紹介文をコピー</Button>
          </Box>
          <Box ml={2} component="div">
            <Button variant="outlined">編集する</Button>
          </Box>
        </Grid>
      </Grid>
    </>
  )
}

export default Detail
