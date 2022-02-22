import React from 'react'
import CardMedia from '@mui/material/CardMedia'
import { DEFAULT_IMAGE_PATH } from '@/js/Constants/Item/Card'

const ItemCardImage: React.VFC<{ imagePath?: string }> = (props) => {
  return (
    <CardMedia
      component="img"
      image={props.imagePath ? props.imagePath : DEFAULT_IMAGE_PATH}
      alt="Sample"
      sx={{ height: { lg: 200, xs: 150 } }}
    />
  )
}

export default ItemCardImage
