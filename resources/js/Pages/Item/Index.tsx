import React from 'react'
import Grid from '@mui/material/Grid'
import ItemCard from '@/js/components/ItemCard'
import { mockItems } from '@/js/Mock/item'

const Reg: React.VFC = () => {
  return (
    <>
      <Grid
        container
        rowSpacing={{ lg: 6, xs: 2 }}
        columnSpacing={{ lg: 3, xs: 2 }}
        mt={{ lg: 2, xs: 6 }}
      >
        {mockItems.map((item, index) => {
          return <ItemCard key={index} item={item} />
        })}
      </Grid>
    </>
  )
}

export default Reg
