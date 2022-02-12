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
import InputField from '@/js/components/InputField'
import FormDialog from '@/js/components/FormDialog'
import LabelFormDialog from '@/js/components/LabelFormDialog'
import LabelInput from '@/js/components/LabelInput'
import SelectNames from '@/js/Mock/SelectNames'
import DetailStates from '@/js/States/Items/DetailState'
import { InputTitles, Labels } from '@/js/Types/Pages/Item/Detail'

const Detail: React.VFC = () => {
  const inputTitleObject: InputTitles = {
    itemNameTitle: '商品名',
    statusTitle: 'ステータス',
    purchasePriceTitle: '仕入値',
    sellingPriceTitle: '売値',
    shopTitle: '販売先',
    supplierTitle: '購入元',
    brandTitle: 'ブランド',
    categoryTitle: 'カテゴリ',
    colorTitle: '色',
  }

  const [statesString, setStatesString] = useState(
    DetailStates.DetailStatesString,
  )
  const [statesNum, setStatesNum] = useState(DetailStates.DetailStatesNum)

  // labelの更新処理は後回し
  const statesArray = DetailStates.DetailStatesArray

  const handleItemNameChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setStatesString({ ...statesString, itemName: event.target.value })
  }

  const handleStatusChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, status: event.target.value })
  }

  const handleBrandChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, brand: event.target.value })
  }

  const handleCategoryChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, category: event.target.value })
  }

  const handleColorChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, color: event.target.value })
  }

  const handleSupplierChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, supplier: event.target.value })
  }

  const handleShopChange = (event: SelectChangeEvent) => {
    setStatesString({ ...statesString, shop: event.target.value })
  }

  const handleTemplateChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setStatesString({ ...statesString, template: event.target.value })
  }

  const handlePurChasePriceChange = (
    event: React.ChangeEvent<HTMLInputElement>,
  ) => {
    if (isNaN(Number(event.target.value))) return
    if (!Number.isSafeInteger(Number(event.target.value))) return
    setStatesNum({ ...statesNum, purchasePrice: Number(event.target.value) })
  }

  const handleSellingPriceChange = (
    event: React.ChangeEvent<HTMLInputElement>,
  ) => {
    if (isNaN(Number(event.target.value))) return
    if (!Number.isSafeInteger(Number(event.target.value))) return
    setStatesNum({ ...statesNum, sellingPrice: Number(event.target.value) })
  }

  return (
    <>
      <Button href="/item" startIcon={<KeyboardArrowLeftIcon />}>
        商品一覧
      </Button>
      <Grid container mt={2}>
        <Grid item xs={12} lg={6}>
          <Grid item xs={12} lg={10}>
            <Card>
              <CardMedia
                component="img"
                image="https://placehold.jp/150x150.png"
                alt="dammy-img"
              />
            </Card>
            <Box component="div" mt={5}>
              <SelectBox
                title={inputTitleObject.statusTitle}
                selectNames={SelectNames.statuses}
                state={statesString.status}
                onChange={handleStatusChange}
              />
            </Box>
          </Grid>
        </Grid>
        <Grid item xs={12} lg={6} sx={{ mt: { xs: 6, lg: 0 } }}>
          <Box component="div">
            <InputField
              title={inputTitleObject.itemNameTitle}
              state={statesString.itemName}
              onChange={handleItemNameChange}
              fontSize={20}
              fontWeight="bold"
            />
          </Box>
          <Box component="div" mt={5}>
            <InputField
              title={inputTitleObject.purchasePriceTitle}
              state={statesNum.purchasePrice}
              onChange={handlePurChasePriceChange}
              fontSize={16}
              fontWeight="normal"
            />
          </Box>
          <Box component="div" mt={5}>
            <InputField
              title={inputTitleObject.sellingPriceTitle}
              state={statesNum.sellingPrice}
              onChange={handleSellingPriceChange}
              fontSize={16}
              fontWeight="normal"
            />
          </Box>
          <Box component="div" mt={5}>
            <SelectBox
              title={inputTitleObject.shopTitle}
              selectNames={SelectNames.shops}
              state={statesString.supplier}
              onChange={handleSupplierChange}
            />
          </Box>
          <Box component="div" mt={5}>
            <SelectBox
              title={inputTitleObject.supplierTitle}
              selectNames={SelectNames.suppliers}
              state={statesString.shop}
              onChange={handleShopChange}
            />
          </Box>
          <Box component="div" mt={5}>
            <SelectBox
              title={inputTitleObject.brandTitle}
              selectNames={SelectNames.brands}
              state={statesString.brand}
              onChange={handleBrandChange}
            />
            <Box component="div" sx={{ textAlign: 'right' }} mt={1}>
              <FormDialog title={inputTitleObject.brandTitle} />
            </Box>
          </Box>
          <Box component="div" mt={2}>
            <SelectBox
              title={inputTitleObject.categoryTitle}
              selectNames={SelectNames.categories}
              state={statesString.category}
              onChange={handleCategoryChange}
            />
            <Box component="div" sx={{ textAlign: 'right' }} mt={1}>
              <FormDialog title={inputTitleObject.categoryTitle} />
            </Box>
          </Box>
          <Box component="div" mt={2}>
            <SelectBox
              title={inputTitleObject.colorTitle}
              selectNames={SelectNames.colors}
              state={statesString.color}
              onChange={handleColorChange}
            />
          </Box>
        </Grid>
      </Grid>
      <Grid container mt={5}>
        <Grid
          item
          sx={{
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
          }}
        >
          <LabelFormDialog title="ラベル" />
        </Grid>
        <Grid container mt={3} columnSpacing={4}>
          {statesArray.labels.map((label: Labels, index: number) => (
            <LabelInput
              key={index}
              label={label.label}
              labelValue={label.labelValue}
            />
          ))}
        </Grid>
      </Grid>
      <Grid container mt={5}>
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
          mt={5}
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
