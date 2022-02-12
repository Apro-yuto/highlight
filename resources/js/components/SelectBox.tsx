import React from 'react'
import { Select, MenuItem, SelectChangeEvent, Grid, Box } from '@mui/material'

interface Props {
  title: string
  selectNames: Array<string>
  state: string
  onChange: (
    inputType: string,
    event: SelectChangeEvent | React.ChangeEvent<HTMLInputElement>,
  ) => void
  inputType: string
}

const SelectBox: React.VFC<Props> = (props) => {
  const statusTitleXs = props.title === 'ステータス' ? 4 : 12
  const statusSelectBoxXs = props.title === 'ステータス' ? 8 : 12

  return (
    <Grid container sx={{ alignItems: 'center' }}>
      <Grid item lg={3} xs={statusTitleXs} sx={{ mb: { xs: 1, lg: 0 } }}>
        <Box
          sx={{ color: '#333333', letterSpacing: '0.08rem', fontSize: '14px' }}
        >
          {props.title} :
        </Box>
      </Grid>
      <Grid item lg={9} xs={statusSelectBoxXs}>
        <Select
          value={props.state}
          onChange={(e) => props.onChange(props.inputType, e)}
          fullWidth
          sx={{ height: '50px' }}
        >
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
