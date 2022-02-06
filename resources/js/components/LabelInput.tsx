import React from 'react'
import { Grid, TextField } from '@mui/material'

interface Props {
  label: string
  labelValue: string
}

const LabelInput: React.VFC<Props> = (props) => {
  return (
    <Grid
      item
      sx={{ display: 'flex', justifyContent: 'space-between' }}
      xs={12}
      mt={3}
      lg={3}
    >
      <Grid item xs={4}>
        <TextField
          label="ラベル名"
          variant="outlined"
          value={props.label}
          fullWidth
        />
      </Grid>
      <Grid item xs={7.9}>
        <TextField
          label="値"
          variant="outlined"
          value={props.labelValue}
          fullWidth
        />
      </Grid>
    </Grid>
  )
}

export default LabelInput
