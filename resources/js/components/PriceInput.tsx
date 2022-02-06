import React from 'react'
import { Input, InputAdornment, Grid, Box } from '@mui/material'
import Styles from '@/sass/Layout/PriceInput.module.scss'

interface Props {
  title: string
  price: number
  handleChange: (event: React.ChangeEvent<HTMLInputElement>) => void
}

const PriceInput: React.VFC<Props> = (props) => {
  return (
    <Grid container>
      <Grid item lg={3} xs={12}>
        <Box my={1}>{props.title} : </Box>
      </Grid>
      <Grid item lg={9} xs={12}>
        <Input
          className={Styles.price_input}
          value={props.price}
          onChange={props.handleChange}
          endAdornment={<InputAdornment position="end">円</InputAdornment>}
          fullWidth
        />
      </Grid>
    </Grid>
  )
}

export default PriceInput
