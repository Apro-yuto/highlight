import React from 'react'
import { Input, Grid, Box } from '@mui/material'

interface Props {
  title: string
  state: string | number
  onChange: (
    inputType: string,
    event: React.ChangeEvent<HTMLTextAreaElement | HTMLInputElement>,
  ) => void
  inputType: string
  fontSize?: number
  fontWeight?: string
}

const defaultProps = { fontSize: 14, fontWeight: 'normal' }

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
            letterSpacing: '0.08rem',
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
            onChange={(e) => props.onChange(props.inputType, e)}
            fullWidth
          />
        ) : (
          <Input
            value={props.state}
            onChange={(e) => props.onChange(props.inputType, e)}
            fullWidth
          />
        )}
        <Box ml={2}>{typeof props.state === 'number' ? '円' : ''}</Box>
      </Grid>
    </Grid>
  )
}

InputField.defaultProps = defaultProps

export default InputField
