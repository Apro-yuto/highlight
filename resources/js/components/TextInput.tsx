import React from 'react'
import { TextField, Grid, Box } from '@mui/material'

interface Props {
  title: string
  state: string
  handleChange: (event: React.ChangeEvent<HTMLInputElement>) => void
}

const TextInput: React.VFC<Props> = (props) => {
  return (
    <Grid container>
      <Grid item lg={3} xs={12}>
        <Box my={1}>{props.title} : </Box>
      </Grid>
      <Grid item lg={9} xs={12}>
        <TextField
          value={props.state}
          onChange={props.handleChange}
          variant="standard"
          fullWidth
        />
      </Grid>
    </Grid>
  )
}

export default TextInput
