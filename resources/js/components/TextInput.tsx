import React from 'react'
import { TextField, Grid, Box } from '@mui/material'

interface Props {
  title: string
  state: string
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void
  fontSize: number
  fontWeight: string
}

const TextInput: React.VFC<Props> = (props) => {
  return (
    <Grid container>
      <Grid item lg={3} xs={12}>
        <Box sx={{ fontSize: props.fontSize, fontWeight: props.fontWeight }}>
          {props.title} :
        </Box>
      </Grid>
      <Grid item lg={9} xs={12}>
        <TextField
          value={props.state}
          onChange={props.onChange}
          variant="standard"
          fullWidth
        />
      </Grid>
    </Grid>
  )
}

export default TextInput
