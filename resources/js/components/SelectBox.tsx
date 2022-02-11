import React from 'react'
import { Select, MenuItem, SelectChangeEvent, Grid, Box } from '@mui/material'

interface Props {
  title: string
  selectNames: Array<string>
  state: string
  onChange: (event: SelectChangeEvent) => void
}

const SelectBox: React.VFC<Props> = (props) => {
  return (
    <Grid container>
      <Grid item lg={3} xs={12}>
        <Box sx={{ mt: { xs: 0, lg: 2 }, mb: { xs: 2 } }}>{props.title} : </Box>
      </Grid>
      <Grid item lg={9} xs={12}>
        <Select value={props.state} onChange={props.onChange} fullWidth>
          {props.selectNames.map((selectName, index) => (
            <MenuItem key={index} value={selectName}>
              {' '}
              {selectName}{' '}
            </MenuItem>
          ))}
        </Select>
      </Grid>
    </Grid>
  )
}

export default SelectBox
