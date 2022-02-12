import React from 'react'
import { Input, Grid, Box } from '@mui/material'

interface Props {
  title: string
  state: string | number
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void
  fontSize: number
  fontWeight: string
}

const InputField: React.VFC<Props> = (props) => {
  return (
    <Grid container>
      <Grid item lg={3} xs={12}>
        <Box
          my={1}
          sx={{
            fontSize: props.fontSize,
            fontWeight: props.fontWeight,
            color: '#333333',
          }}
        >
          {props.title} :
        </Box>
      </Grid>
      <Grid item lg={9} xs={12} sx={{ display: 'flex', alignItems: 'center' }}>
        {typeof props.state === 'number' ? (
          <Input
            sx={{ '& > input': { textAlign: 'right', direction: 'rtl' } }}
            value={props.state}
            onChange={props.onChange}
            fullWidth
          />
        ) : (
          <Input value={props.state} onChange={props.onChange} fullWidth />
        )}
        <Box ml={2}>{typeof props.state === 'number' ? '円' : ''}</Box>
      </Grid>
    </Grid>
  )
}

export default InputField
